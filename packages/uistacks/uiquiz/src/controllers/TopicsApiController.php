<?php
namespace UiStacks\Uiquiz\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use UiStacks\Uiquiz\Models\Topic;
use UiStacks\Uiquiz\Models\TopicTrans;
use Auth;
use Lang;
use UiStacks\Settings\Models\Setting;
use Validator;
use Illuminate\Support\Facades\URL;
use Config;
use Illuminate\Support\Facades\Mail;

class TopicsApiController extends Controller
{
    /*
   |--------------------------------------------------------------------------
   | UiStacks Topics API Controller
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
        $rules['slug'] = 'unique:topics';
        $rules = [];
        if(count($languages)) {
            foreach ($languages as $key => $language) {
                $code = $language['code'];
                if($request->language){
                    foreach($request->language as $lang){
                        $rules['title_'.$code.''] = 'required|max:100';
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
        $contactrequest = Topic::FilterStatus()->orderBy('id', 'DESC')->paginate($request->get('paginate'));
        return $contactrequest;
    }
    /**
     * @param
     * @return
     */
    public function storeTopic(Request $request)
    {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $ar_name = TopicTrans::where('title', ucfirst(strtolower($request->title_ar)))->first();
        $en_name = TopicTrans::where('title', ucfirst(strtolower($request->title_en)))->first();

        if (isset($ar_name->title) || isset($en_name->title)) {
            $response = ['alert-class'=>'alert-danger','message' => trans('Core::operations.duplicate_section_msg')];
            return response()->json($response, 201);
        }

        $topic = new Topic();
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }

        $topic->created_by = $author;
        $topic->updated_by = $author;
        $topic->active = false;
        if ($request->active) {
            $topic->active = true;
        }
        $topic->slug = $this->seoUrl($request->title_en);
        // Media
        $options['media']['main_image_id'] = $request->main_image_id;
        $topic->options = $options;
        $topic->save();
        $topic->order_id = $topic->id;
        $topic->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'title_' . $langCode;
            $topicTrans = new TopicTrans;
            $topicTrans->topic_id = $topic->id;
            $topicTrans->title = $request->$name;
            $topicTrans->lang = $langCode;
            $topicTrans->save();
        }

        $response = ['message' => trans('Core::operations.saved_successfully')];
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
    public function updateTopic(Request $request, $apiKey = '', $id) {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $topic = Topic::find($id);
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }
        $topic->updated_by = $author;
        $topic->active = false;
        if ($request->active) {
            $topic->active = true;
        }
        $topic->slug = $this->seoUrl($request->title_en);
        // Media
        $options['media']['main_image_id'] = $request->main_image_id;
        $topic->options = $options;
        $topic->save();
//        $topic->order_id = $topic->id;
//        $topic->save();
        // Translation
        foreach ($request->language as $langCode) {
            $name = 'title_' . $langCode;
            $topicTrans = TopicTrans::where('topic_id', $topic->id)->where('lang', $langCode)->first();
            if (empty($topicTrans)) {
                $topicTrans = new TopicTrans;
                $topicTrans->topic_id = $topic->id;
                $topicTrans->lang = $langCode;
            }
            $topicTrans->title = $request->$name;
            $topicTrans->save();
        }

        $response = ['message' => trans('Core::operations.updated_successfully')];
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