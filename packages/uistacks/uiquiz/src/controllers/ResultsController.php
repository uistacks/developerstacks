<?php

namespace UiStacks\Tutorials\Controllers;

use Illuminate\Http\Request;
use UiStacks\Tutorials\Controllers\CoursesApiController as API;
use UiStacks\Tutorials\Models\Course;
use UiStacks\Tutorials\Models\CourseTrans;
use UiStacks\Tutorials\Models\Tutorial;
use UiStacks\Tutorials\Models\TutorialTrans;
use UiStacks\Tutorials\Models\Comment;
use UiStacks\Tutorials\Models\CommentTrans;
use UiStacks\Settings\Models\Setting;
use Lang;

//use UiStacks\Tutorials\Models\Section;

class CoursesController extends CoursesApiController {
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
//        $sections = Section::get();
        return view('Tutorials::tutorials.courses', compact('items', 'sections'));
    }

    /**
     * @param
     * @return
     */
    public function show(Request $request, $id) {
        $repo = Tutorial::where('id', $id)->first();
        $contact_request = TutorialTrans::where('contact_id', $id)->first();
//        $contact_request->is_read = "1";
//        $contact_request->save();
        $name = Setting::find(1)->value;
        $contact_email = Setting::find(3)->value;

        return view('Tutorials::tutorials.show', ['request' => $contact_request, 'contact_email' => $contact_email]);
    }

    /**
     *create tutorials
     */
    public function create() {
        return view('Tutorials::tutorials.courses-create-edit', compact('sections'));
    }

    /**
     *store contact
     */
    public function store(Request $request) {
        $store = $this->api->storeCourse($request);
        $store = $store->getData();

        if (isset($store->errors)) {
            return back()->withInput()->withErrors($store->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $store->message);

        if ($request->back) {
            return back();
        }
        return redirect(action('\UiStacks\Tutorials\Controllers\CoursesController@index'));
    }
    /**
     * @param
     * @return
     */
    public function edit($id) {
        $item = Course::findOrFail($id);
        $trans = CourseTrans::where('course_id', $id)->get()->keyBy('lang')->toArray();
//        $sections = Section::get();
        return view('Tutorials::tutorials.courses-create-edit', compact('item', 'trans'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function update(Request $request, $id) {
        $update = $this->api->updateCourse($request, '', $id);
        $update = $update->getData();

        if (isset($update->errors)) {
            return back()->withInput()->withErrors($update->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $update->message);

        if ($request->back) {
            return back();
        }
        return redirect(action('\UiStacks\Tutorials\Controllers\CoursesController@index'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function confirmDelete($id) {
        $item = Course::findOrFail($id);
        return view('Tutorials::ads.confirm-delete', compact('item'));
    }

    public function bulkOperations(Request $request) {
        if ($request->ids) {
//            $items = Tutorials::whereIn('id', $request->ids)->get();
            $items = CourseTrans::whereIn('contact_id', $request->ids)->get();
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
//            $repo = Tutorials::where('id', $id)->first();
            $repo = CourseTrans::where('contact_id', $id)->first();
            if($repo->is_read == "1"){
                $repo->is_read = 0;
            }else{
                $repo->is_read = 1;
            }
            $repo->save();
            \Session::flash('alert-class', 'alert-success');
            \Session::flash('message', trans('Tutorials::tutorials.status_changed_successfully'));
            return back();
        } else {
            return back();
        }
    }

}
