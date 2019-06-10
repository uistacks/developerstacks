<?php
namespace UiStacks\Tutorials\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use UiStacks\Tutorials\Models\Section;
use UiStacks\Tutorials\Models\SectionTrans;
use Illuminate\Support\Facades\Input;
use Auth;
use Lang;
use UiStacks\Settings\Models\Setting;
use Validator;
use Illuminate\Support\Facades\URL;
use Config;
use Illuminate\Support\Facades\Mail;

class SectionsApiController extends Controller
{
    /*
   |--------------------------------------------------------------------------
   | UiStacks Pages API Controller
   |--------------------------------------------------------------------------
   |
   */

    /**
     *
     *
     * @param
     * @return
     */
    public function validatation($request)
    {
        $languages = config('uistacks.locales');
        $rules['slug'] = 'unique:tutorials';
        $rules = [];
        if(count($languages)) {
            foreach ($languages as $key => $language) {
                $code = $language['code'];
                if($request->language){
                    foreach($request->language as $lang){
                        $rules['title_'.$code.''] = 'required|max:100';
                        $rules['description_'.$code.''] = 'required';
                    }
                }
            }
        }
        return \Validator::make($request->all(), $rules);
    }

    /**
     *list item
     */
    public function listItems(Request $request, $id)
    {
        $courseSection = Section::where('course_id',$id)->FilterStatus()->orderBy('order_id', 'ASC')->paginate($request->get('paginate'));
        return $courseSection;
    }
    /**
     * @param
     * @return
     */
    public function storeSection(Request $request,$id)
    {
//        dd($id);
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $ar_name = SectionTrans::where('title', ucfirst(strtolower($request->name_ar)))->first();
        $en_name = SectionTrans::where('title', ucfirst(strtolower($request->name_en)))->first();

        if (isset($ar_name->name) || isset($en_name->name)) {
            $response = ['alert-class'=>'alert-danger','message' => trans('Tutorials::tutorials.duplicate_section_msg')];
            return response()->json($response, 201);
        }

        $sections = new Section();
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }

        $sections->created_by = $author;
        $sections->updated_by = $author;
        $sections->course_id = $id;
        $sections->active = false;
        if ($request->active) {
            $sections->active = true;
        }
        $sections->slug = $this->seoUrl($request->name_en);
        $sections->save();
        $sections->order_id = $sections->id;
        $sections->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'title_' . $langCode;
            $body = 'description_' . $langCode;
            $sectionTrans = new SectionTrans;
            $sectionTrans->section_id = $sections->id;
            $sectionTrans->title = ucwords(strtolower($request->$name));
            $sectionTrans->description = $request->$body;
            $sectionTrans->lang = $langCode;
            $sectionTrans->save();
        }

        $response = ['message' => trans('Tutorials::tutorials.saved_successfully')];
        return response()->json($response, 201);
    }
// Get SEO URL function here
    function seoUrl($string) {
        //Unwanted:  {UPPERCASE} ; / ? : @ & = + $ , . ! ~ * ' ( )
        $string = strtolower($string);
        //Strip any unwanted characters
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
    }
    public function updateSection(Request $request, $apiKey = '', $id) {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $section = Section::find($id);
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }
        $section->updated_by = $author;
        $section->active = false;
        if ($request->active) {
            $section->active = true;
        }
        $section->slug = $this->seoUrl($request->name_en);
        $section->save();
        // Translation
        foreach ($request->language as $langCode) {
            $name = 'title_' . $langCode;
            $body = 'description_' . $langCode;
            $sectionTrans = SectionTrans::where('section_id', $section->id)->where('lang', $langCode)->first();
            if (empty($sectionTrans)) {
                $sectionTrans = new SectionTrans;
                $sectionTrans->section_id = $section->id;
                $sectionTrans->lang = $langCode;
            }
            $sectionTrans->title = ucwords(strtolower($request->$name));
            $sectionTrans->description = $request->$body;
            $sectionTrans->save();
        }

        $response = ['message' => trans('Tutorials::tutorials.updated_successfully')];
        return response()->json($response, 201);
    }

    public function setMailSettings() {
        Config::set('mail.driver', Setting::find(5)->value);
        Config::set('mail.host', Setting::find(6)->value);
        Config::set('mail.port', Setting::find(7)->value);
        Config::set('mail.username', Setting::find(8)->value);
        Config::set('mail.password', Setting::find(9)->value);
        Config::set('mail.from.address', Setting::find(10)->value);
        Config::set('mail.from.name', Setting::find(11)->value);
        Config::set('mail.encryption', Setting::find(12)->value);
    }

}