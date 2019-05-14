<?php

namespace Uistacks\Blogs\Controllers;
use Illuminate\Http\Request;
use Uistacks\Blogs\Controllers\BlogsApiController as API;
use Uistacks\Blogs\Models\Blog;
use Uistacks\Blogs\Models\BlogTrans;
use Uistacks\Blogs\Models\Comment;
use Uistacks\Blogs\Models\CommentTrans;
use Uistacks\Settings\Models\Setting;
use Lang;

//use Uistacks\Blogs\Models\Section;

class BlogsController extends BlogsApiController {
    /*
      |--------------------------------------------------------------------------
      | Uistacks Blogs Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles Blogs for the application.
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
        return view('Blogs::blogs.index', compact('items', 'sections'));
    }

    public function sectionIndex(Request $request) {
        $request->request->add(['paginate' => 20]);
        $items = $this->api->listSectionItems($request);
        return view('Blogs::blogs.section-index', compact('items', 'sections'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function show(Request $request, $id) {
        $repo = Blog::where('id', $id)->first();
        $contact_request = BlogTrans::where('contact_id', $id)->first();
//        $contact_request->is_read = "1";
//        $contact_request->save();
        $name = Setting::find(1)->value;
        $contact_email = Setting::find(3)->value;

        return view('Blogs::blogs.show', ['request' => $contact_request, 'contact_email' => $contact_email]);
    }

    /**
     *create blogs
     */
    public function create() {
        return view('Blogs::blogs.create-edit', compact('sections'));
    }

    /**
     *store contact
     */
    public function store(Request $request) {
        $store = $this->api->storeBlog($request);
        $store = $store->getData();

        if (isset($store->errors)) {
            return back()->withInput()->withErrors($store->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $store->message);

        if ($request->back) {
            return back();
        }
        return redirect(action('\Uistacks\Blogs\Controllers\BlogsController@index'));
    }
    /**
     * @param
     * @return
     */
    public function edit($id) {
        $item = Blog::findOrFail($id);
        $trans = BlogTrans::where('post_id', $id)->get()->keyBy('lang')->toArray();
//        $sections = Section::get();
        return view('Blogs::blogs.create-edit', compact('item', 'trans'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function update(Request $request, $id) {
        $update = $this->api->updateBlog($request, '', $id);
        $update = $update->getData();

        if (isset($update->errors)) {
            return back()->withInput()->withErrors($update->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $update->message);

        if ($request->back) {
            return back();
        }
        return redirect(action('\Uistacks\Blogs\Controllers\BlogsController@index'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function confirmDelete($id) {
        $item = Blog::findOrFail($id);
        return view('Blogs::ads.confirm-delete', compact('item'));
    }

    public function bulkOperations(Request $request) {
        if ($request->ids) {
//            $items = Blogs::whereIn('id', $request->ids)->get();
            $items = BlogTrans::whereIn('contact_id', $request->ids)->get();
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
//            $repo = Blogs::where('id', $id)->first();
            $repo = BlogTrans::where('contact_id', $id)->first();
            if($repo->is_read == "1"){
                $repo->is_read = 0;
            }else{
                $repo->is_read = 1;
            }
            $repo->save();
            \Session::flash('alert-class', 'alert-success');
            \Session::flash('message', trans('Blogs::blogs.status_changed_successfully'));
            return back();
        } else {
            return back();
        }
    }

}
