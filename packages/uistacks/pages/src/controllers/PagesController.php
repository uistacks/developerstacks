<?php 
namespace Uistacks\Pages\Controllers;

use Illuminate\Http\Request;
use Uistacks\Pages\Controllers\PagesApiController as API;
use Uistacks\Pages\Models\Page;
use Uistacks\Pages\Models\PageTrans;
use Illuminate\Support\Facades\Lang;
//use Uistacks\Pages\Models\Section;

class PagesController extends PagesApiController
{

 	/*
    |--------------------------------------------------------------------------
    | uistacks Pages Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles Pages for the application.
    |
    */
    public function __construct()
    {
        $this->api = new API;
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function index(Request $request)
    {
        $request->request->add(['paginate' => 20]);
        $items = $this->api->listStaticItems($request);
//        $sections = Section::get();
//        dd($items);
        return view('Pages::pages.index', compact('items'));
    }

     public function dynamic(Request $request)
    {
        $request->request->add(['paginate' => 20]);
        $items = $this->api->listItems($request);
//        $sections = Section::get();
        return view('Pages::pages.dynamic-index', compact('items', 'sections'));
    }
    
    
    /**
     * 
     *
     * @param  
     * @return 
     */
    public function create()
    {
//        $sections = Section::get();
        return view('Pages::pages.create-edit', compact('sections'));
    }


    /**
     * 
     *
     * @param  
     * @return 
     */
    public function store(Request $request)
    {
        $store = $this->api->storePage($request);
        $store = $store->getData();
        
        if(isset($store->errors)){
            return back()->withInput()->withErrors($store->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $store->message);

        if($request->back){
            return back();
        } 
        return redirect(Lang::getlocale() . "/" . 'admin/pages/dynamic');
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function edit($id)
    {
        $item = Page::findOrFail($id);
        $trans = PageTrans::where('page_id', $id)->get()->keyBy('lang')->toArray();
//        $sections = Section::get();
        return view('Pages::pages.create-edit', compact('item', 'trans'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function update(Request $request, $id)
    {
        $update = $this->api->updatePage($request, '', $id);
        $update = $update->getData();
        
        if(isset($update->errors)){
            return back()->withInput()->withErrors($update->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $update->message);
        
        if($request->back){
            return back();
        } 
        //return redirect(action('\Uistacks\Pages\Controllers\PagesController@dynamic-pages'));
    return redirect(Lang::getlocale() . "/" . 'admin/pages/dynamic');
        }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function confirmDelete($id)
    {
        $item = Page::findOrFail($id);
        return view('Pages::ads.confirm-delete', compact('item'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function bulkOperations(Request $request)
    {
        if($request->ids){
            $items = Page::whereIn('id', $request->ids)->get();
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
            
        }else{
            \Session::flash('alert-class', 'alert-warning');
            \Session::flash('message', trans('Core::operations.nothing_selected')); 
        }
        return back();
    }
}