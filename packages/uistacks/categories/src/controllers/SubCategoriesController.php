<?php
namespace Uistacks\Categories\Controllers;

use Illuminate\Http\Request;
use Uistacks\Categories\Controllers\CategoriesApiController as API;
use Uistacks\Categories\Controllers\SubCategoriesApiController as SubCatAPI;
use Uistacks\Categories\Models\Category;
use Uistacks\Categories\Models\CategoryTrans;
use Uistacks\Categories\Models\SubCategory;
use Uistacks\Categories\Models\SubCategoryTrans;

class SubCategoriesController extends CategoriesApiController
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
        $this->SubCatAPI = new SubCatAPI;
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function index(Request $request,$catId)
    {
        $request->request->add(['paginate' => 20]);
        $items = $this->SubCatAPI->listItems($request,$catId);
        return view('Categories::categories.sub-category-index', compact('items','catId'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function create(Request $request,$catId)
    {
        $category = Category::find($catId);
        return view('Categories::categories.sub-category-create-edit', compact('catId','category'));
    }


    /**
     * 
     *
     * @param  
     * @return 
     */
    public function store(Request $request,$catId)
    {
//        $this->validate($request, [
//            'name' => 'required|unique:categories_trans'
//        ]);
        $store = $this->SubCatAPI->storeSubCategory($request,$catId);
        
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
        return redirect(action('\Uistacks\Categories\Controllers\SubCategoriesController@index',$catId));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function edit(Request $request,$catId, $id)
    {
        $item = SubCategory::findOrFail($id);
        $trans = SubCategoryTrans::where('sub_category_id', $id)->get()->keyBy('lang')->toArray();
        $category = Category::find($catId);
        return view('Categories::categories.sub-category-create-edit', compact('item', 'trans','category','catId'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function update(Request $request, $catId, $id)
    {
        $update = $this->SubCatAPI->updateSubCategory($request, $catId, $id);
        
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
        return redirect(action('\Uistacks\Categories\Controllers\SubCategoriesController@index',$catId));
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
    public function bulkOperations(Request $request,$catId)
    {
        if($request->ids){
            $items = SubCategory::whereIn('id', $request->ids)->get();
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