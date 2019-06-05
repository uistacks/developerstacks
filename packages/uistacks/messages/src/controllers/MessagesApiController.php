<?php

namespace UiStacks\Messages\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use UiStacks\Messages\Models\Ad;
use UiStacks\Messages\Models\AdTrans;
use Illuminate\Support\Facades\Input;
use Auth;

class MessagesApiController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | UiStacks Messages API Controller
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

//        $rules['name'] = 'unique:messages_trans';
        if (count($languages)) {
            foreach ($languages as $key => $language) {
                $code = $language['code'];
                if ($request->language) {
                    foreach ($request->language as $lang) {
                        $rules['name_' . $code . ''] = 'required|max:255';
                        $rules['position'] = 'required';
                        $rules['scripts'] = 'required';
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
        $messages = Ad::FilterName()->FilterStatus()->orderBy('id', 'DESC')->paginate($request->get('paginate'));
        $messages->appends(Input::except('page'));
        return $messages;
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function storeAd(Request $request) {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }


        $cn = AdTrans::where('name', ucfirst(strtolower($request->name_ar)))->first();

        if (isset($cn->name)) {
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message', trans('duplicate_ad_msg'));
            $store = "Duplicate Entry Present";
            return $store;
        }


        $ad = new Ad;
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }

        $ad->created_by = $author;
        $ad->updated_by = $author;

        $ad->active = false;
        if ($request->active) {
            $ad->active = true;
        }
        $ad->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;

            $adTrans = new AdTrans;
            $adTrans->position = false;
            if ($request->position) {
                $adTrans->position = $request->position;
            }
            $adTrans->ad_id = $ad->id;
            $adTrans->name = ucfirst(strtolower($request->$name));
            $adTrans->scripts = $request->scripts;
            $adTrans->start_at = date("Y-m-d H:i:s", strtotime($request->start_at));
            $adTrans->end_at = date("Y-m-d H:i:s", strtotime($request->end_at));
            $adTrans->lang = $langCode;
            $adTrans->save();
        }

        $response = ['message' => trans('Messages::messages.saved_successfully')];
        return response()->json($response, 201);
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function updateAd(Request $request, $apiKey = '', $id) {
        $ad = Ad::find($id);
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }

        $ad->updated_by = $author;

        $ad->active = false;
        if ($request->active) {
            $ad->active = true;
        }
        $ad->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;

            $adTrans = AdTrans::where('ad_id', $ad->id)->where('lang', $langCode)->first();
            if (empty($adTrans)) {
                $adTrans = new AdTrans;
                $adTrans->ad_id = $ad->id;
                $adTrans->lang = $langCode;
            }
            $adTrans->name = ucfirst(strtolower($request->$name));
            $adTrans->scripts = $request->scripts;
            $adTrans->start_at = date("Y-m-d H:i:s", strtotime($request->start_at));
            $adTrans->end_at = date("Y-m-d H:i:s", strtotime($request->end_at));
            $adTrans->save();
        }

        $response = ['message' => trans('Messages::messages.updated_successfully')];
        return response()->json($response, 201);
    }

}
