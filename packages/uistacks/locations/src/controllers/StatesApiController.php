<?php

namespace Uistacks\Locations\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Uistacks\Locations\Models\State;
use Uistacks\Locations\Models\StateTrans;
use Illuminate\Support\Facades\Input;
use Auth;

class StatesApiController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Uistacks States API Controller
      |--------------------------------------------------------------------------
      |
     */

    /**
     * @param
     * @return
     */
    public function validatation($request) {

        $languages = config('uistacks.locales');
        if (count($languages)) {
            foreach ($languages as $key => $language) {
                $code = $language['code'];
                if ($request->language) {
                    foreach ($request->language as $lang) {
                        $rules['name_' . $code . ''] = 'required|max:255';
                        $rules['description_' . $code . ''] = 'required|max:500';
                    }
                }
            }
        }
        $rules['language'] = 'required';

        if ($request->segment(2) === 'api') {
            $rules['author'] = 'required|integer';
        }
        $messages = [
            'name_en.required' => 'Please enter state name.'
        ];
        return \Validator::make($request->all(), $rules,$messages);
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function listItems(Request $request) {
        $states = State::FilterName()->FilterStatus()->orderBy('id', 'ASC')->paginate($request->get('paginate'));
        $states->appends(Input::except('page'));
        return $states;
    }

    public function listItemsFront(Request $request) {
        $states = State::StateName()->CategoriesName()->CountryName()->CityName()->where(array('created_by'=> $request->get('author')))->orderBy('id', 'DESC')->paginate($request->get('paginate'));
        $states->appends(Input::except('page'));
        return $states;
    }
    public function listItemsFrontSearch(Request $request) {
        $states = State::StateName()->CategoriesName()->CountryName()->CityName()->where(array('active'=> true))->orderBy('id', 'DESC')->paginate($request->get('paginate'));
        $states->appends(Input::except('page'));
        return $states;
    }
    /**
     *
     *
     * @param
     * @return
     */
    public function createState(Request $request) {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
//dd($request);
        $cn = StateTrans::where('name', ucfirst(strtolower($request->name_ar)))->first();

        if (isset($cn->name)) {
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message', trans('duplicate_state_msg'));
            $state = "Duplicate Entry Present";
            return $state;
        }

        $state = new State;
        $author = auth()->user()->id;

        $state->created_by = $author;
        $state->updated_by = $author;

        $state->active = false;
        if ($request->active) {
            $state->active = true;
        }
        $state->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;
            $description = 'description_' . $langCode;

            $stateTrans = new StateTrans;
            $stateTrans->state_id = $state->id;
            $stateTrans->name = $request->$name;
            $stateTrans->description = $request->$description;
            $stateTrans->active = false;
            if ($request->active) {
                $stateTrans->active = true;
            }
            $stateTrans->lang = $langCode;
            $stateTrans->save();
            $stateTrans->order_id = $stateTrans->id;
            $stateTrans->save();
        }

        $response = ['message' => trans('Locations::locations.saved_successfully')];
        return response()->json($response, 201);
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function updateState(Request $request, $apiKey = '', $id) {
        $state = State::find($id);
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = auth()->user()->id;
        }

        $state->updated_by = $author;

        $state->active = false;
        if ($request->active) {
            $state->active = true;
        }
        $state->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;
            $description = 'description_' . $langCode;

            $stateTrans = StateTrans::where('state_id', $state->id)->where('lang', $langCode)->first();
            if (empty($stateTrans)) {
                $stateTrans = new StateTrans;
                $stateTrans->state_id = $state->id;
                $stateTrans->lang = $langCode;
            }
            $stateTrans->name = $request->$name;
            $stateTrans->description = $request->$description;
            $stateTrans->active = false;
            if ($request->active) {
                $stateTrans->active = true;
            }
            $stateTrans->save();
        }
        $response = ['message' => trans('Locations::locations.updated_successfully')];
        return response()->json($response, 201);
    }

}
