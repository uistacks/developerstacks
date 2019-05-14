<?php
namespace Uistacks\Pages\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Uistacks\Pages\Models\Page;
use Uistacks\Pages\Models\PageTrans;
use Illuminate\Support\Facades\Input;
use Auth;

class PagesApiController extends Controller
{
    /*
   |--------------------------------------------------------------------------
   | uistacks Pages API Controller
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
//        $rules['page_status'] = 'required';
        $rules['page_url'] = 'unique:pages';
        $rules = [];
        if(count($languages)) {
            foreach ($languages as $key => $language) {
                $code = $language['code'];
                if($request->language){
                    foreach($request->language as $lang){
                        $rules['name_'.$code.''] = 'required|max:40';
                        $rules['description_'.$code.''] = 'min:10';
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
        $pages = Page::FilterName()->FilterCategory()->FilterSection()->FilterStatus()->orderBy('id', 'DESC')->where('id','<',5)->paginate($request->get('paginate'));
        $pages->appends(Input::except('page'));
        return $pages;
    }

    
      public function listItems(Request $request)
    {
        $pages = Page::FilterName()->FilterCategory()->FilterSection()->FilterStatus()->orderBy('id', 'DESC')->paginate($request->get('paginate'));
        $pages->appends(Input::except('page'));
        return $pages;
    }
    
    
    /**
     *
     *
     * @param
     * @return
     */
    public function storePage(Request $request)
    {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $page = new Page;
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }
        $page->page_url = $this->seoUrl($request->name_en);
        $page->active = false;
        if ($request->active) {
            $page->active = true;
        }
        $page->static = true;
        $page->published = true;
        $page->created_by = $author;
        $page->updated_by = $author;
        $page->save();

        foreach ($request->language as $langCode) {
            $name = 'name_'.$langCode;
            $description = 'description_'.$langCode;
            $page_seo_title = 'page_seo_title_'.$langCode;
            $page_meta_keywords = 'page_meta_keywords_'.$langCode;
            $page_meta_description = 'page_meta_description_'.$langCode;
            //transaction entry
            $pageTrans = new PageTrans;
            $pageTrans->page_id = $page->id;
            $pageTrans->title = $request->$name;
            $pageTrans->body = $request->$description;
            $pageTrans->page_seo_title = $request->$page_seo_title;
            $pageTrans->page_meta_keywords = $request->$page_meta_keywords;
            $pageTrans->page_meta_descriptions = $request->$page_meta_description;
            $pageTrans->lang = $langCode;
            $pageTrans->save();
        }

        $response = ['message' => trans('Pages::pages.saved_successfully')];
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
    public function updatePage(Request $request, $apiKey = '', $id)
    {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $page = Page::find($id);
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }
//        $page->page_url = strtolower($request->name_en);
        $page->active = false;
        if ($request->active) {
            $page->active = true;
        }
        $page->static = true;
        $page->published = true;
        $page->updated_by = $author;
        $page->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;
            $description = 'description_' . $langCode;
            $page_seo_title = 'page_seo_title_' . $langCode;
            $page_meta_keywords = 'page_meta_keywords_' . $langCode;
            $page_meta_description = 'page_meta_description_' . $langCode;
            $pageTrans = PageTrans::where('page_id', $page->id)->where('lang', $langCode)->first();
            if (empty($pageTrans)) {
                $pageTrans = new ActivityTrans;
                $pageTrans->page_id = $page->id;
                $pageTrans->lang = $langCode;
            }
            $pageTrans->title = $request->$name;
            $pageTrans->body = $request->$description;
            $pageTrans->page_seo_title = $request->$page_seo_title;
            $pageTrans->page_meta_keywords = $request->$page_meta_keywords;
            $pageTrans->page_meta_descriptions = $request->$page_meta_description;
            $pageTrans->save();
        }
        $response = ['message' => trans('Pages::pages.updated_successfully')];
        return response()->json($response, 201);
    }

}