<?php

namespace Uistacks\Locations\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Uistacks\Locations\Models\Country;
use Uistacks\Locations\Models\CountryTrans;
use Illuminate\Support\Facades\Input;
use Auth;

class CountriesApiController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Uistacks Countries API Controller
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

//        $rules['name'] = 'unique:countries_trans';
        if (count($languages)) {
            foreach ($languages as $key => $language) {
                $code = $language['code'];
                if ($request->language) {
                    foreach ($request->language as $lang) {
                        $rules['name_' . $code . ''] = 'required|max:255';
                        $rules['phone_length'] = 'required';
                        $rules['phone_starting_number'] = 'required';
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
//        $countries = Country::FilterName()->FilterStatus()->orderBy('id', 'DESC')->paginate($request->get('paginate'));
        $countries = Country::FilterName()->FilterStatus()->paginate($request->get('paginate'));
        $countries->appends(Input::except('page'));
        return $countries;
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function storeCountry(Request $request) {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $ar_name = CountryTrans::where(array('name'=> ucfirst(strtolower($request->name_ar)), 'lang'=> 'ar'))->first();
        $en_name = CountryTrans::where(array('name'=> ucfirst(strtolower($request->name_en)), 'lang'=> 'en'))->first();

        if (isset($ar_name->name) || isset($en_name->name)) {
            $response = ['alert-class'=>'alert-danger','message' => trans('Countries::countries.duplicate_country_msg')];
            return response()->json($response, 201);
        }

        $country = new Country;
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }

        $country->created_by = $author;
        $country->updated_by = $author;

        $country->active = false;
        if ($request->active) {
            $country->active = true;
        }
        $country->save();

        if($request->hasFile('flag')){
            $destinationPath = 'uploads/countries-flag';
//            $file = $request->file('flag');
//            $file->move($destinationPath, $file->getClientOriginalName());

            $imageName = strtolower($request->iso).'.'.$request->flag->getClientOriginalExtension();
            $request->flag->move($destinationPath, $imageName);
        }else{
            $imageName = "";
        }

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;

            $countryTrans = new CountryTrans;
            $countryTrans->country_id = $country->id;
            $countryTrans->iso_code = $request->iso_code;
            $countryTrans->phone_code = $request->phone_code;
            $countryTrans->phone_length = $request->phone_length;
            $countryTrans->phone_starting_number = $request->phone_starting_number;
            $countryTrans->flag = $imageName;
            $countryTrans->name = ucfirst(strtolower($request->$name));
            $countryTrans->lang = $langCode;
            $countryTrans->save();
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
    public function updateCountry(Request $request, $apiKey = '', $id) {
//        $validator = $this->validatation($request);
//        if ($validator->fails()) {
//            return response()->json(['errors' => $validator->errors()], 422);
//        }

        $country = Country::find($id);


//        $cn = CountryTrans::where('name', ucfirst(strtolower($request->name_ar)))->first();
//
//        if (isset($cn->name) && !($cn->id == $country->id)) {
//            \Session::flash('alert-class', 'alert-danger');
//            \Session::flash('message', 'لا يسمح بالدخول المكرر');
//            $store = "Duplicate Entry Present";
//            return $store;
//        }



        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }

        $country->updated_by = $author;

        $country->active = false;
        if ($request->active) {
            $country->active = true;
        }
        $country->save();

        if($request->hasFile('flag')){
            $destinationPath = 'uploads/countries-flag';
            $imageName = strtolower($request->iso).'.'.$request->flag->getClientOriginalExtension();
            $request->flag->move($destinationPath, $imageName);
        }else{
            $countryTransData = CountryTrans::where('country_id', $country->id)->where('lang', \Lang::getLocale())->first();
            $imageName = $countryTransData->flag;
        }
        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;

            $countryTrans = CountryTrans::where('country_id', $country->id)->where('lang', $langCode)->first();
            if (empty($countryTrans)) {
                $countryTrans = new CountryTrans;
                $countryTrans->country_id = $country->id;
                $countryTrans->lang = $langCode;
            }
            $countryTrans->iso_code = $request->iso_code;
            $countryTrans->phone_code = $request->phone_code;
            $countryTrans->phone_length = $request->phone_length;
            $countryTrans->phone_starting_number = $request->phone_starting_number;
            $countryTrans->flag = $imageName;
            $countryTrans->name = ucfirst(strtolower($request->$name));
            $countryTrans->save();
        }

        $response = ['message' => trans('Countries::countries.updated_successfully')];
        return response()->json($response, 201);
    }

}
