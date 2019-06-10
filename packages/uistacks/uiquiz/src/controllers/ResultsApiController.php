<?php
namespace UiStacks\Tutorials\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use UiStacks\Tutorials\Models\Course;
use UiStacks\Tutorials\Models\CourseTrans;
use Auth;
use Lang;
use UiStacks\Settings\Models\Setting;
use Validator;
use Illuminate\Support\Facades\URL;
use Config;
use Illuminate\Support\Facades\Mail;

class CoursesApiController extends Controller
{
    /*
   |--------------------------------------------------------------------------
   | UiStacks Courses API Controller
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
                        $rules['name_'.$code.''] = 'required|max:100';
//                        $rules['short_desc_'.$code.''] = 'required|max:500';
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
    public function listItems(Request $request)
    {
        $contactrequest = Course::FilterStatus()->orderBy('id', 'DESC')->paginate($request->get('paginate'));
        return $contactrequest;
    }
    /**
     * @param
     * @return
     */
    public function storeCourse(Request $request)
    {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $ar_name = CourseTrans::where('name', ucfirst(strtolower($request->name_ar)))->first();
        $en_name = CourseTrans::where('name', ucfirst(strtolower($request->name_en)))->first();

        if (isset($ar_name->name) || isset($en_name->name)) {
            $response = ['alert-class'=>'alert-danger','message' => trans('Tutorials::tutorials.duplicate_section_msg')];
            return response()->json($response, 201);
        }

        $course = new Course();
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }

        $course->created_by = $author;
        $course->updated_by = $author;
        $course->active = false;
        if ($request->active) {
            $course->active = true;
        }
        $course->slug = $this->seoUrl($request->name_en);
        // Media
        $options['media']['main_image_id'] = $request->main_image_id;
        $course->options = $options;
        $course->save();
        $course->order_id = $course->id;
        $course->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;
            $short_desc = 'short_desc_' . $langCode;
            $body = 'description_' . $langCode;
            $seo_title = 'seo_title_'.$langCode;
            $meta_keywords = 'meta_keywords_'.$langCode;
            $meta_description = 'meta_description_'.$langCode;
            $courseTrans = new CourseTrans;
            $courseTrans->course_id = $course->id;
            $courseTrans->name = $request->$name;
            $courseTrans->short_desc = $request->$short_desc;
            $courseTrans->description = $request->$body;
            $courseTrans->seo_title = $request->$seo_title;
            $courseTrans->meta_keywords = $request->$meta_keywords;
            $courseTrans->meta_description = $request->$meta_description;
            $courseTrans->lang = $langCode;
            $courseTrans->save();
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
    public function updateCourse(Request $request, $apiKey = '', $id) {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $course = Course::find($id);
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }
        $course->updated_by = $author;
        $course->active = false;
        if ($request->active) {
            $course->active = true;
        }
        $course->slug = $this->seoUrl($request->name_en);
        // Media
        $options['media']['main_image_id'] = $request->main_image_id;
        $course->options = $options;
        $course->save();
//        $course->order_id = $course->id;
//        $course->save();
        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;
            $body = 'description_' . $langCode;
            $seo_title = 'seo_title_'.$langCode;
            $meta_keywords = 'meta_keywords_'.$langCode;
            $meta_description = 'meta_description_'.$langCode;
            $courseTrans = CourseTrans::where('course_id', $course->id)->where('lang', $langCode)->first();
            if (empty($courseTrans)) {
                $courseTrans = new CourseTrans;
                $courseTrans->course_id = $course->id;
                $courseTrans->lang = $langCode;
            }
            $courseTrans->name = $request->$name;
            $courseTrans->description = $request->$body;
            $courseTrans->seo_title = $request->$seo_title;
            $courseTrans->meta_keywords = $request->$meta_keywords;
            $courseTrans->meta_description = $request->$meta_description;
            $courseTrans->save();
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