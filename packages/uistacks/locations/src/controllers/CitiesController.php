<?php

namespace Uistacks\Locations\Controllers;

use Illuminate\Http\Request;
use Uistacks\Locations\Controllers\CitiesApiController as API;
use Uistacks\Locations\Models\Country;
use Uistacks\Locations\Models\State;
use Uistacks\Locations\Models\City;
use Uistacks\Locations\Models\CityTrans;

class CitiesController extends CitiesApiController {
    /*
      |--------------------------------------------------------------------------
      | Uistacks Cities Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles Cities for the application.
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
        $countries = Country::where('active', 1)->get();
        return view('Locations::cities.index', compact('items', 'countries'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function create() {
        $countries = Country::where('active', 1)->get();
//        $states = State::where('active', 1)->get();
//        dd($countries);
        return view('Locations::cities.create-edit', compact('countries'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function store(Request $request) {
        $store = $this->api->storeCity($request);

        if ($store == "Duplicate Entry Present")
            return back();
        $store = $store->getData();

        if (isset($store->errors)) {
            return back()->withInput()->withErrors($store->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $store->message);

        if ($request->back) {
            return back();
        }
        return redirect(action('\Uistacks\Locations\Controllers\CitiesController@index'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function edit($id) {
        $item = City::findOrFail($id);
        $trans = CityTrans::where('city_id', $id)->get()->keyBy('lang')->toArray();
        $countries = Country::where('active', 1)->get();
        $states = State::where('active', 1)->get();
        return view('Locations::cities.create-edit', compact('item', 'trans', 'countries', 'states'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function update(Request $request, $id) {
        $update = $this->api->updateCity($request, '', $id);
        
         if($update == "Duplicate Entry Present")
         return back();  
        $update = $update->getData();

        if (isset($update->errors)) {
            return back()->withInput()->withErrors($update->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $update->message);

        if ($request->back) {
            return back();
        }
        return redirect(action('\Uistacks\Locations\Controllers\CitiesController@index'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function confirmDelete($id) {
        $item = City::findOrFail($id);
        return view('Cities::countries.confirm-delete', compact('item'));
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function bulkOperations(Request $request) {
        if ($request->ids) {
            $items = City::whereIn('id', $request->ids)->get();
            if ($items->count()) {
                foreach ($items as $item) {
                    // Do something with your model by filter operation
                    if ($request->operation && $request->operation === 'activate') {
                        $item->active = true;
                        $item->save();
                        \Session::flash('message', trans('Core::operations.activated_successfully'));
                    } elseif ($request->operation && $request->operation === 'deactivate') {
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

}
