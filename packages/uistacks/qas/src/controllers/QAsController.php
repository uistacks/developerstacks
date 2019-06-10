<?php

namespace UiStacks\Qas\Controllers;
use Illuminate\Http\Request;
use UiStacks\Qas\Controllers\QAsApiController as API;
use UiStacks\Qas\Models\QA;
use UiStacks\Qas\Models\QATrans;
use UiStacks\Qas\Models\Comment;
use UiStacks\Qas\Models\CommentTrans;
use UiStacks\Settings\Models\Setting;
use Lang;

//use UiStacks\Qas\Models\Section;

class QAsController extends QAsApiController {
    /*
      |--------------------------------------------------------------------------
      | UiStacks Qas Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles Qas for the application.
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
        return view('Qas::qas.index', compact('items'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function show(Request $request, $id) {
        $repo = QA::where('id', $id)->first();
        $contact_request = QATrans::where('qna_id', $id)->first();
//        $contact_request->is_read = "1";
//        $contact_request->save();
        $name = Setting::find(1)->value;
        $contact_email = Setting::find(3)->value;

        return view('Qas::qas.show', ['request' => $contact_request, 'contact_email' => $contact_email]);
    }

    /**
     *create qas
     */
    public function create() {
        return view('Qas::qas.create-edit', compact('sections'));
    }

    /**
     *store contact
     */
    public function store(Request $request) {
        $store = $this->api->storeQA($request);
        $store = $store->getData();

        if (isset($store->errors)) {
            return back()->withInput()->withErrors($store->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $store->message);

        if ($request->back) {
            return back();
        }
        return redirect(action('\UiStacks\Qas\Controllers\QAsController@index'));
    }
    /**
     * @param
     * @return
     */
    public function edit($id) {
        $item = QA::findOrFail($id);
        $trans = QATrans::where('qna_id', $id)->get()->keyBy('lang')->toArray();
//        $sections = Section::get();
        return view('Qas::qas.create-edit', compact('item', 'trans'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function update(Request $request, $id) {
        $update = $this->api->updateQA($request, '', $id);
        $update = $update->getData();

        if (isset($update->errors)) {
            return back()->withInput()->withErrors($update->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $update->message);

        if ($request->back) {
            return back();
        }
        return redirect(action('\UiStacks\Qas\Controllers\QAsController@index'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function confirmDelete($id) {
        $item = QA::findOrFail($id);
        return view('Qas::ads.confirm-delete', compact('item'));
    }

    public function bulkOperations(Request $request) {
        if ($request->ids) {
            $items = QA::whereIn('id', $request->ids)->get();
            if ($items->count()) {
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
//            $repo = Qas::where('id', $id)->first();
            $repo = QATrans::where('qna_id', $id)->first();
            if($repo->is_read == "1"){
                $repo->is_read = 0;
            }else{
                $repo->is_read = 1;
            }
            $repo->save();
            \Session::flash('alert-class', 'alert-success');
            \Session::flash('message', trans('Qas::qas.status_changed_successfully'));
            return back();
        } else {
            return back();
        }
    }

}
