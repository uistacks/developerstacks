<?php
namespace Uistacks\Faqs\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Uistacks\Faqs\Models\Faq;
use Uistacks\Faqs\Models\FaqTrans;
use Illuminate\Support\Facades\Input;
use Auth;

class FaqsApiController extends Controller
{
    /*
   |--------------------------------------------------------------------------
   | uistacks Faqs API Controller
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

//        $rules['name'] = 'required';
//        $rules['description'] = 'required';
//        $rules['faq_status'] = 'required';
        $rules['faq_url'] = 'unique:faqs';
        $rules = [];
        if(count($languages)) {
            foreach ($languages as $key => $language) {
                $code = $language['code'];
                if($request->language){
                    foreach($request->language as $lang){
                        $rules['name_'.$code.''] = 'required|max:40';
                        $rules['description_'.$code.''] = 'required|min:10';
                    }
                }
            }
        }
        return \Validator::make($request->all(), $rules);
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function listStaticItems(Request $request)
    {
        $faqs = Faq::FilterName()->FilterCategory()->FilterSection()->FilterStatus()->orderBy('id', 'DESC')->where('id','<',5)->paginate($request->get('paginate'));
        $faqs->appends(Input::except('faq'));
        return $faqs;
    }

    
      public function listItems(Request $request)
    {
        $faqs = Faq::FilterName()->FilterCategory()->FilterSection()->FilterStatus()->orderBy('id', 'DESC')->paginate($request->get('paginate'));
        $faqs->appends(Input::except('faq'));
        return $faqs;
    }
    
    
    /**
     *
     *
     * @param
     * @return
     */
    public function storeFaq(Request $request)
    {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $faq = new Faq;
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }
        $faq->faq_url = $this->seoUrl($request->name_en);
        $faq->active = false;
        if ($request->active) {
            $faq->active = true;
        }
        $faq->published = true;
        $faq->faq_type = false;
        if ($request->faq_type) {
            $faq->faq_type = true;
        }
        $faq->created_by = $author;
        $faq->updated_by = $author;
        $faq->save();

        foreach ($request->language as $langCode) {
            $name = 'name_'.$langCode;
            $description = 'description_'.$langCode;
            $faq_seo_title = 'faq_seo_title_'.$langCode;
            $faq_meta_keywords = 'faq_meta_keywords_'.$langCode;
            $faq_meta_description = 'faq_meta_description_'.$langCode;
            //transaction entry
            $faqTrans = new FaqTrans;
            $faqTrans->faq_id = $faq->id;
            $faqTrans->name = $request->$name;
            $faqTrans->description = $request->$description;
            $faqTrans->faq_seo_title = $request->$faq_seo_title;
            $faqTrans->faq_meta_keywords = $request->$faq_meta_keywords;
            $faqTrans->faq_meta_descriptions = $request->$faq_meta_description;
            $faqTrans->lang = $langCode;
            $faqTrans->save();
        }

        $response = ['message' => trans('Faqs::faqs.saved_successfully')];
        return response()->json($response, 201);
    }
// Get SEO URL function here
    function seoUrl($text) {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // trim
        $text = trim($text, '-');
        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);
        // lowercase
        $text = strtolower($text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function updateFaq(Request $request, $apiKey = '', $id)
    {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $faq = Faq::find($id);
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }
//        $faq->faq_url = strtolower($request->name_en);
        $faq->active = false;
        if ($request->active) {
            $faq->active = true;
        }
        $faq->published = true;
        $faq->faq_type = false;
        if ($request->faq_type) {
            $faq->faq_type = true;
        }
        $faq->updated_by = $author;
        $faq->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;
            $description = 'description_' . $langCode;
            $faq_seo_title = 'faq_seo_title_' . $langCode;
            $faq_meta_keywords = 'faq_meta_keywords_' . $langCode;
            $faq_meta_description = 'faq_meta_description_' . $langCode;
            $faqTrans = FaqTrans::where('faq_id', $faq->id)->where('lang', $langCode)->first();
            if (empty($faqTrans)) {
                $faqTrans = new ActivityTrans;
                $faqTrans->faq_id = $faq->id;
                $faqTrans->lang = $langCode;
            }
            $faqTrans->name = $request->$name;
            $faqTrans->description = $request->$description;
            $faqTrans->faq_seo_title = $request->$faq_seo_title;
            $faqTrans->faq_meta_keywords = $request->$faq_meta_keywords;
            $faqTrans->faq_meta_descriptions = $request->$faq_meta_description;
            $faqTrans->save();
        }
        $response = ['message' => trans('Faqs::faqs.updated_successfully')];
        return response()->json($response, 201);
    }

}