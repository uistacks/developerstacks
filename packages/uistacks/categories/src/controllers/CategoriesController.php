<?php
namespace Uistacks\Categories\Controllers;

use Illuminate\Http\Request;
use Uistacks\Categories\Controllers\CategoriesApiController as API;
use Uistacks\Categories\Models\Category;
use Uistacks\Categories\Models\CategoryTrans;

class CategoriesController extends CategoriesApiController
{

 	/*
    |--------------------------------------------------------------------------
    | Uistacks Categories Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles Categories for the application.
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
        $items = $this->api->listItems($request);
//        dd($items);
        return view('Categories::categories.index', compact('items'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function create(Request $request)
    {
        $categories = Category::where('active',1)->get();
        // dd($categories);
        return view('Categories::categories.create-edit', compact('categories'));
    }


    /**
     * 
     *
     * @param  
     * @return 
     */
    public function store(Request $request)
    {
//        $this->validate($request, [
//            'name' => 'required|unique:categories_trans'
//        ]);
        $store = $this->api->storeCategory($request);
        
        if($store == "Duplicate Entry Present")
         return back();   
            
            
        $store = $store->getData();
        
        if(isset($store->errors)){
            return back()->withInput()->withErrors($store->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $store->message);

        if($request->back){
            return back();
        } 
        return redirect(action('\Uistacks\Categories\Controllers\CategoriesController@index'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function edit($id)
    {
        $item = Category::findOrFail($id);
        $trans = CategoryTrans::where('category_id', $id)->get()->keyBy('lang')->toArray();
        $categories = Category::where('active',1)->get();
        return view('Categories::categories.create-edit', compact('item', 'trans','categories'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function update(Request $request,$id)
    {
        $update = $this->api->updateCategory($request, $id);
        
         if($update == "Duplicate Entry Present")
         return back();
        $update = $update->getData();

        if(isset($update->errors)){
            return back()->withInput()->withErrors($update->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $update->message);
        
        if($request->back){
            return back();
        } 
        return redirect(action('\Uistacks\Categories\Controllers\CategoriesController@index'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function confirmDelete($id)
    {
        $item = Category::findOrFail($id);
        return view('Categories::categories.confirm-delete', compact('item'));
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
            $items = Category::whereIn('id', $request->ids)->get();
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