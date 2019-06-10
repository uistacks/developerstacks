<?php

namespace UiStacks\Tutorials\Controllers;

use Illuminate\Http\Request;
use UiStacks\Tutorials\Controllers\TutorialsApiController as API;
use UiStacks\Tutorials\Models\Course;
use UiStacks\Tutorials\Models\Section;
use UiStacks\Tutorials\Models\Tutorial;
use UiStacks\Tutorials\Models\TutorialTrans;
use UiStacks\Tutorials\Models\Comment;
use UiStacks\Tutorials\Models\CommentTrans;
use UiStacks\Settings\Models\Setting;
use Lang;

//use UiStacks\Tutorials\Models\Section;

class TestsController extends TutorialsApiController {
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
        return view('Tutorials::tutorials.index', compact('items', 'sections'));
    }

    /**
     *create tutorials
     */
    public function create(Request $request) {
        $courses = Course::where("active","1")->get();
        return view('Tutorials::tutorials.create-edit', compact('courses'));
    }

    /**
     *store contact
     */
    public function store(Request $request) {
        $store = $this->api->storeTutorial($request);
        $store = $store->getData();

        if (isset($store->errors)) {
            return back()->withInput()->withErrors($store->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $store->message);

        if ($request->back) {
            return back();
        }
        return redirect(action('\UiStacks\Tutorials\Controllers\TutorialsController@index'));
    }
    /**
     * @param
     * @return
     */
    public function edit($id) {
        $item = Tutorial::findOrFail($id);
        $trans = TutorialTrans::where('content_id', $id)->get()->keyBy('lang')->toArray();
        $courses = Course::where("active","1")->get();
        $sections = Section::where("active","1")->where("course_id",$item->course_id)->get();
        return view('Tutorials::tutorials.create-edit', compact('courses','sections','item', 'trans'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function update(Request $request, $id) {
        $update = $this->api->updateTutorial($request, '', $id);
        $update = $update->getData();

        if (isset($update->errors)) {
            return back()->withInput()->withErrors($update->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $update->message);

        if ($request->back) {
            return back();
        }
        return redirect(action('\UiStacks\Tutorials\Controllers\TutorialsController@index'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function confirmDelete($id) {
        $item = Tutorial::findOrFail($id);
        return view('Tutorials::ads.confirm-delete', compact('item'));
    }

    public function bulkOperations(Request $request) {
        if ($request->ids) {
//            $items = Tutorials::whereIn('id', $request->ids)->get();
            $items = TutorialTrans::whereIn('contact_id', $request->ids)->get();
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
            $repo = TutorialTrans::where('contact_id', $id)->first();
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

    /**
     * Auth register country areas
     *
     * @var view
     */
    public function courseSection($id) {
        $sections = Section::where('course_id', $id)->where('active', 1)->get();
        $response = ['sections' => $sections];
        return response()->json($response, 201);
    }

}
