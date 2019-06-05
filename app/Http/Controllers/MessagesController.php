<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use UiStacks\Messages\Models\Message;
use UiStacks\Messages\Models\Participant;
use UiStacks\Messages\Models\Thread;
use Uistacks\Users\Models\User;

class MessagesController extends Controller
{
    public function index()
    {
        // All threads, ignore deleted/archived participants
//        $threads = Thread::getAllLatest()->get();
        // All threads that user is participating in
        $threads = Thread::forUser(auth()->id())->latest('updated_at')->get();
        // All threads that user is participating in, with new messages
        // $threads = Thread::forUserWithNewMessages(auth()->id())->latest('updated_at')->get();

        $firstMsg = [];
        if(isset($threads[0]) && request()->segment(2) == '') {
            $userId = auth()->id();
            $firstMsg = Thread::findOrFail($threads[0]->id);
            $firstMsg->markAsRead($userId);
//            echo $threads[0]->id;
//            dd($firstMsg->messages);
        }

        return view('website.messages.index', compact('threads', 'firstMsg'));
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
            request()->session()->flash('alert-class', 'alert-danger');
            request()->session()->flash('message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect()->route('messages');
        }
        // show current user in list if not a current participant
        // $users = User::whereNotIn('id', $thread->participantsUserIds())->get();
        // don't show the current user in list
        $threads = Thread::forUser(auth()->id())->latest('updated_at')->get();
        $userId = auth()->id();
        $users = User::whereNotIn('id', $thread->participantsUserIds($userId))->get();
        $thread->markAsRead($userId);
//        dd($thread);
        return view('website.messages.show', compact('threads','thread', 'users'));
    }
    /**
     * Creates a new message thread.
     *
     * @return mixed
     */
    public function create()
    {
        $users = User::where('id', '!=', auth()->id())->get();
        return view('website.messages.create', compact('users'));
    }
    /**
     * Stores a new message thread.
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $validator = $this->validate($request,
            [
                'subject'            => 'required',
                'message'             => 'required',
                'recipients' => 'required',
            ],
            [
                'subject.required'   => 'Please enter message subject.',
                'message.required'    => 'Please enter message content.'
            ]
        );

        $thread = Thread::create([
            'subject' => $request->subject,
        ]);
        /*$thread = Thread::firstOrCreate([
            'project_id' => $input['project_id'],
            'bid_id' => $input['bid_id'],
            'subject' => $input['subject']
        ]);*/
        // Message
        Message::create([
            'thread_id' => $thread->id,
            'user_id' => auth()->id(),
            'body' => $request->message,
        ]);
        // Sender
        Participant::create([
            'thread_id' => $thread->id,
            'user_id' => auth()->id(),
            'last_read' => new Carbon(),
        ]);
        // Recipients
        /*if (isset($input['user_id'])) {
            $thread->addParticipant(array($request->user_id));
        }*/
        if (isset($request->recipients) && count($request->recipients) > 0) {
            $thread->addParticipant($request->recipients);
        }
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
            request()->session()->flash('alert-class', 'alert-danger');
            request()->session()->flash('message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect()->route('messages');
        }
        $thread->activateAllParticipants();
        // Message
        /*Message::create([
            'thread_id' => $thread->id,
            'user_id' => auth()->id(),
            'body' => Input::get('message'),
        ]);*/
        $message = new Message;
        $message->thread_id = $thread->id;
        $message->user_id = auth()->id();
        $message->body = $request->message;
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
            'user_id' => auth()->id(),
        ]);
        $participant->last_read = new Carbon;
        $participant->save();
        // Recipients
        if (isset($request->recipients) && count($request->recipients) > 0) {
            $thread->addParticipant($request->recipients);
        }
        return redirect()->route('messages.show', $id);
    }
}
