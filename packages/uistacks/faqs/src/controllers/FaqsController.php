<?php 
namespace Uistacks\Faqs\Controllers;

use Illuminate\Http\Request;
use Uistacks\Faqs\Controllers\FaqsApiController as API;
use Uistacks\Faqs\Models\Faq;
use Uistacks\Faqs\Models\FaqTrans;
use Illuminate\Support\Facades\Lang;
//use Uistacks\Faqs\Models\Section;

class FaqsController extends FaqsApiController
{

 	/*
    |--------------------------------------------------------------------------
    | uistacks Faqs Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles Faqs for the application.
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
        return view('Faqs::faqs.index', compact('items'));
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
        return view('Faqs::faqs.create-edit', compact('sections'));
    }


    /**
     * 
     *
     * @param  
     * @return 
     */
    public function store(Request $request)
    {
        $store = $this->api->storeFaq($request);
        $store = $store->getData();
        
        if(isset($store->errors)){
            return back()->withInput()->withErrors($store->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $store->message);

        if($request->back){
            return back();
        } 
        return redirect(Lang::getlocale() . "/" . 'admin/faqs');
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function edit($id)
    {
        $item = Faq::findOrFail($id);
        $trans = FaqTrans::where('faq_id', $id)->get()->keyBy('lang')->toArray();
//        $sections = Section::get();
        return view('Faqs::faqs.create-edit', compact('item', 'trans'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function update(Request $request, $id)
    {
        $update = $this->api->updateFaq($request, '', $id);
        $update = $update->getData();
        
        if(isset($update->errors)){
            return back()->withInput()->withErrors($update->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $update->message);
        
        if($request->back){
            return back();
        } 
        //return redirect(action('\Uistacks\Faqs\Controllers\FaqsController@dynamic-faqs'));
    return redirect(Lang::getlocale() . "/" . 'admin/faqs');
        }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function confirmDelete($id)
    {
        $item = Faq::findOrFail($id);
        return view('Faqs::ads.confirm-delete', compact('item'));
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
            $items = Faq::whereIn('id', $request->ids)->get();
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