<?php

namespace UiStacks\Tutorials\Controllers;

use Illuminate\Http\Request;
use UiStacks\Tutorials\Controllers\SectionsApiController as API;
use UiStacks\Tutorials\Models\Course;
use UiStacks\Tutorials\Models\Section;
use UiStacks\Tutorials\Models\SectionTrans;
use UiStacks\Tutorials\Models\Tutorial;
use UiStacks\Tutorials\Models\TutorialTrans;
use UiStacks\Tutorials\Models\Comment;
use UiStacks\Tutorials\Models\CommentTrans;
use UiStacks\Settings\Models\Setting;
use Lang;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
//use UiStacks\Tutorials\Models\Section;

class SectionsController extends SectionsApiController {
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
    public function index(Request $request,$id) {
        $request->request->add(['paginate' => 20]);
        $course = Course::findOrFail($id);
        if(!isset($course->trans)){
            return back()->withInput()->withErrors("Course not found, please try again.");
        }
        $items = $this->api->listItems($request,$id);
//        dd($items);
        return view('Tutorials::tutorials.sections', compact('id','items', 'sections'));
    }


    /**
     *create section
     */
    public function create(Request $request, $id) {
        $course = Course::findOrFail($id);
        if(!isset($course->trans)){
            return back()->withInput()->withErrors("Record not found, please try again.");
        }
        return view('Tutorials::tutorials.section-create-edit', compact('id','course'));
    }

    /**
     *store section
     */
    public function store(Request $request,$id) {
        $store = $this->api->storeSection($request,$id);
        $store = $store->getData();

        if (isset($store->errors)) {
            return back()->withInput()->withErrors($store->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $store->message);

        if ($request->back) {
            return back();
        }
        return redirect(action('\UiStacks\Tutorials\Controllers\SectionsController@index',$id));
    }
    /**
     * @param
     * @return
     */
    public function edit(Request $request, $id,$section_id) {
//        dd("S");
        $item = Section::findOrFail($section_id);
        $trans = SectionTrans::where('section_id', $section_id)->get()->keyBy('lang')->toArray();
        $course = Course::findOrFail($id);
//        $sections = Section::get();
        return view('Tutorials::tutorials.section-create-edit', compact('id','item', 'trans','course'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function update(Request $request, $id) {
        $update = $this->api->updateSection($request, '',$id);
        $update = $update->getData();
        if (isset($update->errors)) {
            return back()->withInput()->withErrors($update->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $update->message);

        if ($request->back) {
            return back();
        }
        return redirect(action('\UiStacks\Tutorials\Controllers\SectionsController@index', $request->course));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function confirmDelete($id) {
        $item = Section::findOrFail($id);
        return view('Tutorials::ads.confirm-delete', compact('item'));
    }

    public function bulkOperations(Request $request) {
        if ($request->ids) {
            $items = Section::whereIn('id', $request->ids)->get();
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
            \Session::flash('message', trans('Tutorials::tutorials.status_changed_successfully'));
            return back();
        } else {
            return back();
        }
    }

    function sectionReposition(Request $request){
        if(Input::has('item'))
        {
            $i = 0;
            foreach(Input::get('item') as $id)
            {
                $i++;
                $item = Section::find($id);
                $item->order_id = $i;
                $item->save();
            }
            return Response::json(array('success' => true));
        }
        else
        {
            return Response::json(array('success' => false));
        }
    }

}
