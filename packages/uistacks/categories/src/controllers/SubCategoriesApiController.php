<?php

namespace Uistacks\Categories\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Uistacks\Categories\Models\Category;
use Uistacks\Categories\Models\CategoryTrans;
use Uistacks\Categories\Models\SubCategory;
use Uistacks\Categories\Models\SubCategoryTrans;
use Illuminate\Support\Facades\Input;
use Auth;

class SubCategoriesApiController extends Controller {
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

//        $rules['name'] = 'unique:categories_trans';
        if (count($languages)) {
            foreach ($languages as $key => $language) {
                $code = $language['code'];
                if ($request->language) {
                    foreach ($request->language as $lang) {
                        $rules['name_' . $code . ''] = 'required|max:255';
                        $rules['description_' . $code . ''] = 'required|max:1000';
                    }
                }
            }
        }

        if ($request->segment(2) === 'api') {
            $rules['author'] = 'required|integer';
        }

        return \Validator::make($request->all(), $rules);
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function listItems(Request $request,$catId) {
        $categories = SubCategory::where(array('category_id'=>$catId))->FilterName()->FilterStatus()->orderBy('id', 'ASC')->paginate($request->get('paginate'));
//        dd($categories);
        $categories->appends(Input::except('page'));
        return $categories;
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function storeSubCategory(Request $request,$catId) {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
//        dd($request);
        $cn = SubCategoryTrans::where('name', $request->name_ar)->first();

        if (isset($cn->name)) {
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message', trans('duplicate_category_msg'));
            $store = "Duplicate Entry Present";
            return $store;
        }


        $category = new SubCategory;
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = auth()->user()->id;
        }
        $category->slug = $this->seoUrl($request->name_en);
        $category->category_id = $catId;
        $category->created_by = $author;
        $category->updated_by = $author;

        $category->active = false;
        if ($request->active) {
            $category->active = true;
        }
        $category->cat_type = $catId;
        // Media
        $options['media']['main_image_id'] = $request->main_image_id;
        $category->options = $options;
        $category->size = isset($request->size) ? $request->size : "";

        $category->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;
            $description = 'description_' . $langCode;

            $categoryTrans = new SubCategoryTrans;
            $categoryTrans->is_featured = false;
            if ($request->is_featured) {
                $categoryTrans->is_featured = true;
            }
            $categoryTrans->active = false;
            if ($request->active) {
                $categoryTrans->active = true;
            }
            $categoryTrans->sub_category_id = $category->id;
            $categoryTrans->name = $request->$name;
            $categoryTrans->description = $request->$description;
            $categoryTrans->lang = $langCode;
            $categoryTrans->save();
            $categoryTrans->order_id = $categoryTrans->id;
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
    public function updateSubCategory(Request $request, $catId, $id) {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $category = SubCategory::find($id);
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = auth()->user()->id;
        }

        $category->updated_by = $author;
        $category->category_id = $catId;
        $category->slug = $this->seoUrl($request->name_en);
        $category->active = false;
        if ($request->active) {
            $category->active = true;
        }
        $category->cat_type = $catId;
        // Media
        $options['media']['main_image_id'] = $request->main_image_id;
        $category->options = $options;
        $category->size = isset($request->size) ? $request->size : "";

        $category->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;
            $description = 'description_' . $langCode;

            $categoryTrans = SubCategoryTrans::where('sub_category_id', $category->id)->where('lang', $langCode)->first();
            if (empty($categoryTrans)) {
                $categoryTrans = new SubCategoryTrans;
                $categoryTrans->sub_category_id = $category->id;
                $categoryTrans->lang = $langCode;
            }
            $categoryTrans->is_featured = false;
            if ($request->is_featured) {
                $categoryTrans->is_featured = true;
            }
            $categoryTrans->active = false;
            if ($request->active) {
                $categoryTrans->active = true;
            }
            $categoryTrans->name = $request->$name;
            $categoryTrans->description = $request->$description;
            $categoryTrans->save();
        }

        $response = ['message' => trans('Categories::categories.updated_successfully')];
        return response()->json($response, 201);
    }

}
