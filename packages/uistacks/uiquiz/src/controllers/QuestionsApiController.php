<?php
namespace UiStacks\Uiquiz\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use UiStacks\Uiquiz\Models\Question;
use UiStacks\Uiquiz\Models\QuestionTrans;
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

class QuestionsApiController extends Controller
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
//        dd($request);
        $languages = config('uistacks.locales');
        $rules['topic_id'] = 'required';
//        $rules['slug'] = 'unique:questions';

        $rules = [];
        if(count($languages)) {
            foreach ($languages as $key => $language) {
                $code = $language['code'];
                if($request->language){
                    foreach($request->language as $lang){
                        $rules['question_text_'.$code.''] = 'required';
                        $rules['answer_explanation_'.$code.''] = 'required';
                        $rules['more_info_link_'.$code.''] = 'url';
                    }
                }
            }
        }
        Validator::extend('topic_required', function($attribute, $value, $parameters, $validator) {
            if ($value == "00") {
                return false;
            } else {
                return true;
            }
        });
        $messages = array(
            'topic_required' => 'Please select topic.'
        );

        return \Validator::make($request->all(), $rules,$messages);
    }

    /**
     *list item
     */
    public function listItems(Request $request)
    {
        $questions = Question::FilterName()->FilterTopic()->FilterStatus()->orderBy('id', 'DESC')->paginate($request->get('paginate'));
        return $questions;
    }
    /**
     * @param
     * @return
     */
    public function storeQuestion(Request $request)
    {
//        dd($request->input());
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $question = new Question();
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }

        $question->created_by = $author;
        $question->updated_by = $author;
        $question->topic_id = $request->topic_id;
        $question->active = false;
        if ($request->active) {
            $question->active = true;
        }
        $question->slug = $this->seoUrl($request->question_text_en);
        $question->save();
        $question->order_id = $question->id;
        $question->save();

        // Translation
        foreach ($request->language as $langCode) {
            $question_text = 'question_text_' . $langCode;
            $code_snippet = 'code_snippet_' . $langCode;
            $answer_explanation = 'answer_explanation_' . $langCode;
            $more_info_link = 'more_info_link_' . $langCode;
            $questionTrans = new QuestionTrans;
            $questionTrans->question_id = $question->id;
            $questionTrans->question_text = $request->$question_text;
            $questionTrans->code_snippet = $request->$code_snippet;
            $questionTrans->answer_explanation = $request->$answer_explanation;
            $questionTrans->more_info_link = $request->$more_info_link;
            $questionTrans->lang = $langCode;
            $questionTrans->save();
        }
        foreach ($request->input() as $key => $value) {
//                $optionKey = 'question_text_' . $langCode;
            if(strpos($key, 'option') !== false && $value != '') {
                $correctOpt = str_replace("_en","",$key);
//                $status = $request->input('correct') == $key ? 1 : 0;
                $status = $request->input('correct') == $correctOpt ? 1 : 0;
                $questionOptions = new QuestionsOption();
                $questionOptions->question_id = $question->id;
                $questionOptions->created_by = $author;
                $questionOptions->updated_by = $author;
                $questionOptions->active = false;
                if ($request->active) {
                    $questionOptions->active = true;
                }
                $questionOptions->save();
                /*QuestionsOption::create([
                    'question_id' => $question->id,
                    'option'      => $value,
                    'correct'     => $status
                ]);*/

                // Translation question options
                foreach ($request->language as $langCode) {
                    $questionTrans = new QuestionsOptionTrans();
                    $questionTrans->questions_option_id = $questionOptions->id;
                    $questionTrans->option = $value;
                    $questionTrans->correct = $status;
                    $questionTrans->lang = $langCode;
                    $questionTrans->save();
                }
            }
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
    public function updateQuestion(Request $request, $apiKey = '', $id) {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $question = Question::find($id);
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }
        $question->updated_by = $author;
        $question->active = false;
        if ($request->active) {
            $question->active = true;
        }
        $question->slug = $this->seoUrl($request->question_text_en);
        $question->save();
        // Translation
        foreach ($request->language as $langCode) {
            $question_text = 'question_text_' . $langCode;
            $code_snippet = 'code_snippet_' . $langCode;
            $answer_explanation = 'answer_explanation_' . $langCode;
            $more_info_link = 'more_info_link_' . $langCode;
            $questionTrans = QuestionTrans::where('question_id', $question->id)->where('lang', $langCode)->first();
            if (empty($questionTrans)) {
                $questionTrans = new QuestionTrans;
                $questionTrans->question_id = $question->id;
                $questionTrans->lang = $langCode;
            }
            $questionTrans->question_text = $request->$question_text;
            $questionTrans->code_snippet = $request->$code_snippet;
            $questionTrans->answer_explanation = $request->$answer_explanation;
            $questionTrans->more_info_link = $request->$more_info_link;
            $questionTrans->save();
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