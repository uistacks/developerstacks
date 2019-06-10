<?php

namespace UiStacks\Uiquiz\Controllers;

use Illuminate\Http\Request;
use UiStacks\Uiquiz\Controllers\TopicsApiController as API;
use UiStacks\Uiquiz\Models\Topic;
use UiStacks\Uiquiz\Models\TopicTrans;
use UiStacks\Settings\Models\Setting;
use Lang;

//use UiStacks\Uiquiz\Models\Section;

class TopicsController extends TopicsApiController {
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
//        $sections = Section::get();
        return view('Quiz::quiz.topics', compact('items', 'sections'));
    }

    /**
     *create quiz
     */
    public function create(Request $request) {
        return view('Quiz::quiz.topics-create-edit', compact('sections'));
    }

    /**
     *store contact
     */
    public function store(Request $request) {
        $store = $this->api->storeTopic($request);
        $store = $store->getData();

        if (isset($store->errors)) {
            return back()->withInput()->withErrors($store->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $store->message);

        if ($request->back) {
            return back();
        }
        return redirect(action('\UiStacks\Uiquiz\Controllers\TopicsController@index'));
    }
    /**
     * @param
     * @return
     */
    public function edit($id) {
        $item = Topic::findOrFail($id);
        $trans = TopicTrans::where('topic_id', $id)->get()->keyBy('lang')->toArray();
//        $sections = Section::get();
        return view('Quiz::quiz.topics-create-edit', compact('item', 'trans'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function update(Request $request, $id) {
        $update = $this->api->updateTopic($request, '', $id);
        $update = $update->getData();

        if (isset($update->errors)) {
            return back()->withInput()->withErrors($update->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $update->message);

        if ($request->back) {
            return back();
        }
        return redirect(action('\UiStacks\Uiquiz\Controllers\TopicsController@index'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function confirmDelete($id) {
        $item = Topic::findOrFail($id);
        return view('Quiz::ads.confirm-delete', compact('item'));
    }

    public function bulkOperations(Request $request) {
        if ($request->ids) {
//            $items = Quiz::whereIn('id', $request->ids)->get();
            $items = TopicTrans::whereIn('contact_id', $request->ids)->get();
//            dd($items);
            if ($items->count()) {
                foreach ($items as $item) {
                    // Do something with your model by filter operation
                    if ($request->operation && $request->operation === 'read') {
                        $item->is_read = true;
                        $item->save();
//                        \Session::flash('message', trans('Core::operations.activated_successfully'));
                    } elseif ($request->operation && $request->operation === 'unread') {
                        $item->is_read = false;
                        $item->save();
//                        \Session::flash('message', trans('Core::operations.deactivated_successfully'));
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
//            $repo = Quiz::where('id', $id)->first();
            $repo = TopicTrans::where('contact_id', $id)->first();
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
