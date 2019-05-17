<?php

namespace Uistacks\Categories\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Uistacks\Categories\Models\Category;
use Uistacks\Categories\Models\CategoryTrans;
use Illuminate\Support\Facades\Input;
use Auth;

class CategoriesApiController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Uistacks Categories API Controller
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

//        if (count($languages)) {
//            foreach ($languages as $key => $language) {
//                $code = $language['code'];
//                if ($request->language) {
//                    foreach ($request->language as $lang) {
//                        $rules['name_' . $code . ''] = 'required|max:255';
//                        $rules['description_' . $code . ''] = 'required|max:1000';
//                    }
//                }
//            }
//        }

        $rules['name_en'] = 'required|max:255';
        $rules['description_en'] = 'required|max:1000';
        if ($request->segment(2) === 'api') {
            $rules['author'] = 'required|integer';
        }

        $messages = [
            'name_en.required' => 'Please enter name.',
            'description_en.required' => 'Please enter description.'
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
        $categories = Category::FilterName()->FilterStatus()->orderBy('id', 'DESC')->paginate($request->get('paginate'));
        $categories->appends(Input::except('page'));
        return $categories;
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function storeCategory(Request $request) {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }


        $cn = CategoryTrans::where('name', ucfirst(strtolower($request->name_en)))->first();

        if (isset($cn->name)) {
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message', trans('duplicate_category_msg'));
            $store = "Duplicate Entry Present";
            return $store;
        }


        $category = new Category;
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = auth()->user()->id;
        }
        $category->slug = $this->seoUrl($request->name_en);
        $category->created_by = $author;
        $category->updated_by = $author;
        $category->parent_id = $request->parent_id;

        $category->active = false;
        if ($request->active) {
            $category->active = true;
        }
        $category->class_name = $request->class_name;
        // Media
        $options['media']['main_image_id'] = $request->main_image_id;
        $category->options = $options;

        $category->is_featured = false;
        if ($request->is_featured) {
            $category->is_featured = true;
        }
        $category->save();
        $category->order_id = $category->id;
        $category->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;
            $description = 'description_' . $langCode;
            $page_seo_title = 'page_seo_title_'.$langCode;
            $page_meta_keywords = 'page_meta_keywords_'.$langCode;
            $page_meta_description = 'page_meta_description_'.$langCode;

            $categoryTrans = new CategoryTrans;

            $categoryTrans->category_id = $category->id;
            $categoryTrans->name = $request->$name;
            $categoryTrans->description = $request->$description;
            $categoryTrans->page_seo_title = $request->$page_seo_title;
            $categoryTrans->page_meta_keywords = $request->$page_meta_keywords;
            $categoryTrans->page_meta_descriptions = $request->$page_meta_description;
            $categoryTrans->lang = $langCode;
            $categoryTrans->save();
        }

        $response = ['message' => trans('Categories::categories.saved_successfully')];
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
    public function updateCategory(Request $request, $id) {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $category = Category::find($id);
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = auth()->user()->id;
        }
//dd($request);
        $category->updated_by = $author;
        $category->parent_id = $request->parent_id;

        $category->slug = $this->seoUrl($request->name_en);
        $category->active = false;
        if ($request->active) {
            $category->active = true;
        }
        $category->class_name = $request->class_name;
        // Media
        $options['media']['main_image_id'] = $request->main_image_id;
        $category->options = $options;

        $category->is_featured = false;
        if ($request->is_featured) {
            $category->is_featured = true;
        }
        $category->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;
            $description = 'description_' . $langCode;
            $page_seo_title = 'page_seo_title_'.$langCode;
            $page_meta_keywords = 'page_meta_keywords_'.$langCode;
            $page_meta_description = 'page_meta_description_'.$langCode;

            $categoryTrans = CategoryTrans::where('category_id', $category->id)->where('lang', $langCode)->first();
            if (empty($categoryTrans)) {
                $categoryTrans = new CategoryTrans;
                $categoryTrans->category_id = $category->id;
                $categoryTrans->lang = $langCode;
            }

            $categoryTrans->name = $request->$name;
            $categoryTrans->description = $request->$description;
            $categoryTrans->page_seo_title = $request->$page_seo_title;
            $categoryTrans->page_meta_keywords = $request->$page_meta_keywords;
            $categoryTrans->page_meta_descriptions = $request->$page_meta_description;
            $categoryTrans->save();
        }

        $response = ['message' => trans('Categories::categories.updated_successfully')];
        return response()->json($response, 201);
    }

}
