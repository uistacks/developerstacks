<?php 
namespace Uistacks\Locations\Controllers;

use Illuminate\Http\Request;
use Uistacks\Locations\Controllers\CountriesApiController as API;
use Uistacks\Locations\Models\Country;
use Uistacks\Locations\Models\CountryTrans;

class CountriesController extends CountriesApiController
{

 	/*
    |--------------------------------------------------------------------------
    | Uistacks Countries Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles Countries for the application.
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
        return view('Locations::countries.index', compact('items'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function create()
    {
        return view('Locations::countries.create-edit');
    }


    /**
     * 
     *
     * @param  
     * @return 
     */
    public function store(Request $request)
    {
        $this->validate($request, [
//            'name' => 'required|unique:countries_trans',
//            'phone_code' => 'required|unique:countries_trans',
            'iso_code' => 'required|min:2|max:2|unique:countries_trans',
            'flag' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $store = $this->api->storeCountry($request);
        
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
        return redirect(action('\Uistacks\Locations\Controllers\CountriesController@index'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function edit($id)
    {
        $item = Country::findOrFail($id);
        $trans = CountryTrans::where('country_id', $id)->get()->keyBy('lang')->toArray();
        return view('Locations::countries.create-edit', compact('item', 'trans'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function update(Request $request, $id)
    {
        $update = $this->api->updateCountry($request, '', $id);
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
        return redirect(action('\Uistacks\Locations\Controllers\CountriesController@index'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function confirmDelete($id)
    {
        $item = Country::findOrFail($id);
        return view('Locations::countries.confirm-delete', compact('item'));
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
            $items = Country::whereIn('id', $request->ids)->get();
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