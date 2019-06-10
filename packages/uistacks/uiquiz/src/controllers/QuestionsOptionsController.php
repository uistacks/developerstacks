<?php

namespace UiStacks\Uiquiz\Controllers;

use Illuminate\Http\Request;
use UiStacks\Uiquiz\Controllers\QuestionsOptionsApiController as API;
use UiStacks\Uiquiz\Models\Question;
use UiStacks\Uiquiz\Models\QuestionTrans;
use UiStacks\Uiquiz\Models\QuestionsOption;
use UiStacks\Uiquiz\Models\QuestionsOptionTrans;
use UiStacks\Settings\Models\Setting;
use Lang;

//use UiStacks\Uiquiz\Models\QuestionsOption;

class QuestionsOptionsController extends QuestionsOptionsApiController {
    /*
      |--------------------------------------------------------------------------
      | UiStacks Uiquiz Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles Uiquiz for the application.
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
        return view('Quiz::quiz.question-options', compact('id','items', 'questions'));
    }


    /**
     *create question
     */
    public function create(Request $request) {
        $questions = Question::where('active','1')->get();
        return view('Quiz::quiz.question-option-create-edit', compact('id','questions'));
    }

    /**
     *store question
     */
    public function store(Request $request) {
        $store = $this->api->storeQuestionsOption($request);
        $store = $store->getData();

        if (isset($store->errors)) {
            return back()->withInput()->withErrors($store->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $store->message);

        if ($request->back) {
            return back();
        }
        return redirect(action('\UiStacks\Uiquiz\Controllers\QuestionsOptionsController@index'));
    }
    /**
     * @param
     * @return
     */
    public function edit(Request $request, $id) {
        $item = QuestionsOption::findOrFail($id);
        $trans = QuestionsOptionTrans::where('questions_option_id', $item->id)->get()->keyBy('lang')->toArray();
        $questions = Question::where('active',1)->get();
        return view('Quiz::quiz.question-option-create-edit', compact('id','item', 'trans','questions'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function update(Request $request, $id) {
        $update = $this->api->updateQuestionsOption($request, '',$id);
        $update = $update->getData();
        if (isset($update->errors)) {
            return back()->withInput()->withErrors($update->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $update->message);

        if ($request->back) {
            return back();
        }
        return redirect(action('\UiStacks\Uiquiz\Controllers\QuestionsOptionsController@index', $request->course));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function confirmDelete($id) {
        $item = QuestionsOption::findOrFail($id);
        return view('Uiquiz::ads.confirm-delete', compact('item'));
    }

    public function bulkOperations(Request $request) {
        if ($request->ids) {
            $items = QuestionsOption::whereIn('id', $request->ids)->get();
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
//            $repo = Uiquiz::where('id', $id)->first();
            $repo = QuestionsOption::where('question_id', $id)->first();
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
