<?php
namespace UiStacks\Uiquiz\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use UiStacks\Uiquiz\Models\QuestionsOption;
use UiStacks\Uiquiz\Models\QuestionsOptionTrans;
use Illuminate\Support\Facades\Input;
use Auth;
use Lang;
use UiStacks\Settings\Models\Setting;
use Validator;
use Illuminate\Support\Facades\URL;
use Config;
use Illuminate\Support\Facades\Mail;

class QuestionsOptionsApiController extends Controller
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
        $rules['question_id'] = 'required';
        $rules = [];
        if(count($languages)) {
            foreach ($languages as $key => $language) {
                $code = $language['code'];
                if($request->language){
                    foreach($request->language as $lang){
                        $rules['option_'.$code.''] = 'required|max:255';
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
        $questionsOptions = QuestionsOption::FilterName()->FilterQuestion()->FilterStatus()->orderBy('id', 'ASC')->paginate($request->get('paginate'));
        return $questionsOptions;
    }
    /**
     * @param
     * @return
     */
    public function storeQuestionsOption(Request $request)
    {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $ar_name = QuestionsOptionTrans::where('option', ucfirst(strtolower($request->option_ar)))->first();
        $en_name = QuestionsOptionTrans::where('option', ucfirst(strtolower($request->option_en)))->first();

        if (isset($ar_name->option) || isset($en_name->option)) {
            $response = ['alert-class'=>'alert-danger','message' => trans('Core::operations.duplicate_section_msg')];
            return response()->json($response, 201);
        }

        $questionsOption = new QuestionsOption();
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }

        $questionsOption->created_by = $author;
        $questionsOption->updated_by = $author;
        $questionsOption->question_id = $request->question_id;
        $questionsOption->active = false;
        if ($request->active) {
            $questionsOption->active = true;
        }
        $questionsOption->save();
        $questionsOption->order_id = $questionsOption->id;
        $questionsOption->save();

        // Translation
        foreach ($request->language as $langCode) {
            $option = 'option_' . $langCode;
            $questionsOptionTrans = new QuestionsOptionTrans;
            $questionsOptionTrans->questions_option_id = $questionsOption->id;
            $questionsOptionTrans->option = $request->$option;
            $questionsOptionTrans->correct = false;
            if ($request->correct) {
                $questionsOptionTrans->correct = true;
            }
            $questionsOptionTrans->lang = $langCode;
            $questionsOptionTrans->save();
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
    public function updateQuestionsOption(Request $request, $apiKey = '', $id) {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $questionsOption = QuestionsOption::find($id);
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }
        $questionsOption->updated_by = $author;
        $questionsOption->active = false;
        if ($request->active) {
            $questionsOption->active = true;
        }
        $questionsOption->save();
        // Translation
        foreach ($request->language as $langCode) {
            $option = 'option_' . $langCode;
            $questionsOptionTrans = QuestionsOptionTrans::where('questions_option_id', $questionsOption->id)->where('lang', $langCode)->first();
            if (empty($questionsOptionTrans)) {
                $questionsOptionTrans = new QuestionsOptionTrans;
                $questionsOptionTrans->questions_option_id = $questionsOption->id;
                $questionsOptionTrans->lang = $langCode;
            }
            $questionsOptionTrans->option = $request->$option;
            $questionsOptionTrans->correct = false;
            if ($request->correct) {
                $questionsOptionTrans->correct = true;
            }
            $questionsOptionTrans->save();
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