<?php

namespace UiStacks\Uiquiz\Controllers;

use Illuminate\Http\Request;
use UiStacks\Uiquiz\Controllers\QuestionsApiController as API;
use UiStacks\Uiquiz\Models\Topic;
use UiStacks\Uiquiz\Models\Question;
use UiStacks\Uiquiz\Models\QuestionTrans;
use UiStacks\Uiquiz\Models\Tutorial;
use UiStacks\Uiquiz\Models\TutorialTrans;
use UiStacks\Uiquiz\Models\Comment;
use UiStacks\Uiquiz\Models\CommentTrans;
use UiStacks\Settings\Models\Setting;
use Lang;

use App\Http\Requests\StoreQuestionsRequest;
use App\Http\Requests\UpdateQuestionsRequest;
//use UiStacks\Uiquiz\Models\Question;

class QuestionsController extends QuestionsApiController {
    /*
      |--------------------------------------------------------------------------
      | UiStacks Tutorials Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles Tutorials for the application.
      |
     */

    public function __construct() {
        $this->api = new API;
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function index(Request $request) {
        $request->request->add(['paginate' => 20]);
        $items = $this->api->listItems($request);
//        dd($items);
        return view('Quiz::quiz.questions', compact('id','items', 'questions'));
    }


    /**
     *create question
     */
    public function create(Request $request) {
        $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4',
            'option5' => 'Option #5'
        ];

        $topics = Topic::where("active",1)->get();
        return view('Quiz::quiz.question-create-edit', compact('topics','correct_options'));
    }

    /**
     *store question
     */
    public function store(Request $request) {
        $store = $this->api->storeQuestion($request);
        $store = $store->getData();

        if (isset($store->errors)) {
            return back()->withInput()->withErrors($store->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $store->message);

        if ($request->back) {
            return back();
        }
        return redirect(action('\UiStacks\Uiquiz\Controllers\QuestionsController@index'));
    }
    /**
     * @param
     * @return
     */
    public function edit(Request $request, $question_id) {
//        dd("S");
        $item = Question::findOrFail($question_id);
        $trans = QuestionTrans::where('question_id', $question_id)->get()->keyBy('lang')->toArray();
        $topics = Topic::where("id",$item->topic_id)->get();
//        dd($topics);
//        $questions = Question::get();
        return view('Quiz::quiz.question-create-edit', compact('id','item', 'trans','topics'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function update(Request $request, $id) {
        $update = $this->api->updateQuestion($request, '',$id);
        $update = $update->getData();
        if (isset($update->errors)) {
            return back()->withInput()->withErrors($update->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $update->message);

        if ($request->back) {
            return back();
        }
        return redirect(action('\UiStacks\Uiquiz\Controllers\QuestionsController@index', $request->topic));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function confirmDelete($id) {
        $item = Question::findOrFail($id);
        return view('Tutorials::ads.confirm-delete', compact('item'));
    }

    public function bulkOperations(Request $request) {
        if ($request->ids) {
            $items = Question::whereIn('id', $request->ids)->get();
            if($items->count()){
                foreach ($items as $item) {
                    // Do something with your model by filter operation
                    if($request->operation && $request->operation === 'activate'){
                        $item->active = true;
                        $item->save();
                        \Session::flash('message', trans('Core::operations.activated_successfully'));
                    }elseif($request->operation && $request->operation === 'deactivate'){
                        $item->active = false;
                        $item->save();
                        \Session::flash('message', trans('Core::operations.deactivated_successfully'));
                    }

                }
            }
            \Session::flash('alert-class', 'alert-success');
        } else {
            \Session::flash('alert-class', 'alert-warning');
            \Session::flash('message', trans('Core::operations.nothing_selected'));
        }
        return back();
    }
    //contact us
    public function changeStatus($id = "") {
        if ($id != "") {
//            $repo = Tutorials::where('id', $id)->first();
            $repo = TutorialTrans::where('contact_id', $id)->first();
            if($repo->is_read == "1"){
                $repo->is_read = 0;
            }else{
                $repo->is_read = 1;
            }
            $repo->save();
            \Session::flash('alert-class', 'alert-success');
            \Session::flash('message', trans('Quiz::quiz.status_changed_successfully'));
            return back();
        } else {
            return back();
        }
    }

}
