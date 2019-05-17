<?php

namespace Uistacks\Locations\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Uistacks\Locations\Models\City;
use Uistacks\Locations\Models\CityTrans;
use Illuminate\Support\Facades\Input;
use Auth;

class CitiesApiController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Uistacks Cities API Controller
      |--------------------------------------------------------------------------
      |
     */

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function validatation($request) {

        $languages = config('uistacks.locales');

        $rules['language'] = 'required';
        $rules['country'] = 'required|numeric';

        if (count($languages)) {
            foreach ($languages as $key => $language) {
                $code = $language['code'];
                if ($request->language) {
                    foreach ($request->language as $lang) {
                        $rules['name_' . $code . ''] = 'required|max:255';
                    }
                }
            }
        }

        if ($request->segment(2) === 'api') {
            $rules['author'] = 'required|integer';
        }

        return \Validator::make($request->all(), $rules);
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function listItems(Request $request) {
        $cities = City::FilterName()->FilterCountry()->FilterStatus()->orderBy('id', 'DESC')->paginate($request->get('paginate'));
        $cities->appends(Input::except('page'));
        return $cities;
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function storeCity(Request $request) {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }


        $cn = CityTrans::where('name', ucfirst(strtolower($request->name_ar)))->first();

        if (isset($cn->name)) {
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message', 'Duplicate entry present.');
            $store = "Duplicate Entry Present";
            return $store;
        }

        $city = new City;
        $city->country_id = $request->country;
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = auth()->user()->id;
        }

        $city->created_by = $author;
        $city->updated_by = $author;

        $city->active = false;
        if ($request->active) {
            $city->active = true;
        }
        $city->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;

            $cityTrans = new CityTrans;
            $cityTrans->city_id = $city->id;
            $cityTrans->name = ucfirst(strtolower($request->$name));
            $cityTrans->lang = $langCode;
            $cityTrans->save();
        }

        $response = ['message' => trans('Countries::countries.saved_successfully')];
        return response()->json($response, 201);
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function updateCity(Request $request, $apiKey = '', $id) {
//        $validator = $this->validatation($request);
//        if ($validator->fails()) {
//            return response()->json(['errors' => $validator->errors()], 422);
//        }

        $city = City::find($id);

        $city->country_id = $request->country;
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = auth()->user()->id;
        }

        $city->updated_by = $author;

        $city->active = false;
        if ($request->active) {
            $city->active = true;
        }
        $city->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;

            $cityTrans = CityTrans::where('city_id', $city->id)->where('lang', $langCode)->first();
            if (empty($cityTrans)) {
                $cityTrans = new CityTrans;
                $cityTrans->city_id = $city->id;
                $cityTrans->lang = $langCode;
            }
            $cityTrans->name = ucfirst(strtolower($request->$name));
            $cityTrans->save();
        }

        $response = ['message' => trans('Countries::countries.updated_successfully')];
        return response()->json($response, 201);
    }

}
