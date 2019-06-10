<?php
namespace UiStacks\Qas\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use UiStacks\Qas\Models\QA;
use UiStacks\Qas\Models\QATrans;
use UiStacks\Qas\Models\Comment;
use UiStacks\Qas\Models\CommentTrans;
use Illuminate\Support\Facades\Input;
use Auth;
use Lang;
use UiStacks\Settings\Models\Setting;
use Validator;
use Illuminate\Support\Facades\URL;
use Config;
use Illuminate\Support\Facades\Mail;

class QAsApiController extends Controller
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
        $rules['slug'] = 'unique:blogs';
        $rules = [];
        if(count($languages)) {
            foreach ($languages as $key => $language) {
                $code = $language['code'];
                if($request->language){
                    foreach($request->language as $lang){
                        $rules['name_'.$code.''] = 'required|max:100';
                        $rules['body_'.$code.''] = 'required';
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
        $contactrequest = QA::FilterStatus()->orderBy('id', 'DESC')->paginate($request->get('paginate'));
        return $contactrequest;
    }
    /**
     * @param
     * @return
     */
    public function storeQA(Request $request)
    {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
//        $ar_name = QATrans::where('name', ucfirst(strtolower($request->name_ar)))->first();
        $en_name = QATrans::where('name', ucfirst(strtolower($request->name_en)))->first();

        if (isset($ar_name->name) || isset($en_name->name)) {
            $response = ['alert-class'=>'alert-danger','message' => trans('Qas::qas.duplicate_section_msg')];
            return response()->json($response, 201);
        }

        $blogs = new QA();
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }
        $blogs->created_by = $author;
        $blogs->updated_by = $author;
        if(Auth::user()->userRole->role_id == "5"){
            $blogs->active = false;
        }else{
            $blogs->active = false;
            if ($request->active) {
                $blogs->active = true;
            }
        }
        $blogs->slug = $this->seoUrl($request->name_en);
        // Media
        $options['media']['main_image_id'] = $request->main_image_id;
        $blogs->options = $options;
        $blogs->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;
            $body = 'body_' . $langCode;
            $seo_title = 'seo_title_'.$langCode;
            $meta_keywords = 'meta_keywords_'.$langCode;
            $meta_description = 'meta_description_'.$langCode;
            $blogTrans = new QATrans;
            $blogTrans->qna_id = $blogs->id;
            $blogTrans->name = $request->$name;
            $blogTrans->body = $request->$body;
            $blogTrans->seo_title = $request->$seo_title;
            $blogTrans->meta_keywords = $request->$meta_keywords;
            $blogTrans->meta_description = $request->$meta_description;
            $blogTrans->lang = $langCode;
            $blogTrans->save();
        }

        $response = ['message' => trans('Qas::qas.saved_successfully')];
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
    public function updateQA(Request $request, $apiKey = '', $id) {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $blog = QA::find($id);
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }
        $blog->updated_by = $author;
        $blog->active = false;
        if ($request->active) {
            $blog->active = true;
        }
        $blog->slug = $this->seoUrl($request->name_en);
        // Media
        $options['media']['main_image_id'] = $request->main_image_id;
        $blog->options = $options;
        $blog->save();
        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;
            $body = 'body_' . $langCode;
            $seo_title = 'seo_title_'.$langCode;
            $meta_keywords = 'meta_keywords_'.$langCode;
            $meta_description = 'meta_description_'.$langCode;
            $blogTrans = QATrans::where('qna_id', $blog->id)->where('lang', $langCode)->first();
            if (empty($blogTrans)) {
                $blogTrans = new QATrans;
                $blogTrans->qna_id = $blog->id;
                $blogTrans->lang = $langCode;
            }
            $blogTrans->name = $request->$name;
            $blogTrans->body = $request->$body;
            $blogTrans->seo_title = $request->$seo_title;
            $blogTrans->meta_keywords = $request->$meta_keywords;
            $blogTrans->meta_description = $request->$meta_description;
            $blogTrans->save();
        }

        $response = ['message' => trans('Qas::qas.updated_successfully')];
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

    /**
     *list item
     */
    public function listItemsFront(Request $request)
    {
        $contactrequest = QA::FilterStatus()->where(array('created_by'=> $request->get('author')))->orderBy('id', 'DESC')->paginate($request->get('paginate'));
        return $contactrequest;
    }
}