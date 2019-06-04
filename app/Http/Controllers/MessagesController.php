<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index()
    {
        // All threads, ignore deleted/archived participants
//        $threads = Thread::getAllLatest()->get();
        // All threads that user is participating in
        $threads = Thread::forUser(Auth::id())->latest('updated_at')->get();
        // All threads that user is participating in, with new messages
        // $threads = Thread::forUserWithNewMessages(Auth::id())->latest('updated_at')->get();

        $firstMsg = [];
        if(isset($threads[0]) && \Request::Segment(2) == '') {
            $userId = Auth::id();
            $firstMsg = Thread::findOrFail($threads[0]->id);
            $firstMsg->markAsRead($userId);
//            echo $threads[0]->id;
//            dd($firstMsg->messages);
        }

        return view('website.messenger.index', compact('threads', 'firstMsg'));
    }
    /**
     * Shows a message thread.
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect()->route('messages');
        }
        // show current user in list if not a current participant
        // $users = User::whereNotIn('id', $thread->participantsUserIds())->get();
        // don't show the current user in list
        $threads = Thread::forUser(Auth::id())->latest('updated_at')->get();
        $userId = Auth::id();
        $users = User::whereNotIn('id', $thread->participantsUserIds($userId))->get();
        $thread->markAsRead($userId);
//        dd($thread);
        return view('website.messenger.show', compact('threads','thread', 'users'));
    }
    /**
     * Creates a new message thread.
     *
     * @return mixed
     */
    public function create($id)
    {
        $users = User::where('id', '!=', Auth::id())->get();
        try {
            $bid = ProjectBid::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message', 'The bid with ID: ' . $id . ' was not found.');
            return redirect(action('UserController@index'));
        }
        try {
            $project = Project::findOrFail($bid->project_id);
        } catch (ModelNotFoundException $e) {
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message', 'The bid with ID: ' . $bid->project_id . ' was not found.');
            return redirect(action('UserController@index'));
        }
        return view('website.messenger.create', compact('users', 'bid', 'project'));
    }
    /**
     * Stores a new message thread.
     *
     * @return mixed
     */
    public function store()
    {
        $input = Input::all();
        $validator = Validator::make($input,
            [
                'subject'            => 'required',
                'message'             => 'required'
            ],
            [
                'subject.required'   => 'Please enter message subject.',
                'message.required'    => 'Please enter message content.'
            ]
        );
        if ($validator->fails()) {
            return redirect(URL::previous())
                ->withErrors($validator)
                ->withInput();
        }
        $thread = Thread::create([
            'project_id' => $input['project_id'],
            'bid_id' => $input['bid_id'],
            'subject' => $input['subject'],
        ]);
        /*$thread = Thread::firstOrCreate([
            'project_id' => $input['project_id'],
            'bid_id' => $input['bid_id'],
            'subject' => $input['subject']
        ]);*/
        // Message
        Message::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'body' => $input['message'],
        ]);
        // Sender
        Participant::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'last_read' => new Carbon,
        ]);
        // Recipients
        if (isset($input['user_id'])) {
            $thread->addParticipant(array($input['user_id']));
        }
        /*if (Input::has('recipients')) {
            $thread->addParticipant($input['recipients']);
        }*/
        return redirect()->route('messages');
    }
    /**
     * Adds a new message to a current thread.
     *
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
//        dd($request->filename);
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect()->route('messages');
        }
        $thread->activateAllParticipants();
        // Message
        /*Message::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'body' => Input::get('message'),
        ]);*/
        $message = new Message;
        $message->thread_id = $thread->id;
        $message->user_id = Auth::id();
        $message->body = Input::get('message');
        if(isset($request->filename)) {
            $target_dir = 'uploads/message-files/'; // add the specific path to save the file
//            $uniqueFileName = uniqid() . Input::file('filename')->getClientOriginalName() . '.' . Input::file('filename')->getClientOriginalExtension();

            $imageName = uniqid().'.'.$request->filename->getClientOriginalExtension();
            $request->filename->move(public_path($target_dir), $imageName);
            $message->file_name = $imageName;
        }
        $message->save();

        // Add replier as a participant
        $participant = Participant::firstOrCreate([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
        ]);
        $participant->last_read = new Carbon;
        $participant->save();
        // Recipients
        if (Input::has('recipients')) {
            $thread->addParticipant(Input::get('recipients'));
        }
        return redirect()->route('messages.show', $id);
    }
}
