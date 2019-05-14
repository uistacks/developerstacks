<?php
namespace Uistacks\Blogs\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Uistacks\Blogs\Models\Blog;
use Uistacks\Blogs\Models\BlogTrans;
use Uistacks\Blogs\Models\Comment;
use Uistacks\Blogs\Models\CommentTrans;
use Illuminate\Support\Facades\Input;
use Auth;
use Lang;
use Uistacks\Settings\Models\Setting;
use Validator;
use Illuminate\Support\Facades\URL;
use Config;
use Illuminate\Support\Facades\Mail;

class BlogsApiController extends Controller
{
    /*
   |--------------------------------------------------------------------------
   | Uistacks Pages API Controller
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
        $contactrequest = Blog::FilterStatus()->orderBy('id', 'DESC')->paginate($request->get('paginate'));
        return $contactrequest;
    }
    /**
     * @param
     * @return
     */
    public function storeBlog(Request $request)
    {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $ar_name = BlogTrans::where('name', ucfirst(strtolower($request->name_ar)))->first();
        $en_name = BlogTrans::where('name', ucfirst(strtolower($request->name_en)))->first();

        if (isset($ar_name->name) || isset($en_name->name)) {
            $response = ['alert-class'=>'alert-danger','message' => trans('Blogs::blogs.duplicate_section_msg')];
            return response()->json($response, 201);
        }

        $blogs = new Blog();
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }

        $blogs->created_by = $author;
        $blogs->updated_by = $author;
        $blogs->active = false;
        if ($request->active) {
            $blogs->active = true;
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
            $blogTrans = new BlogTrans;
            $blogTrans->post_id = $blogs->id;
            $blogTrans->name = ucwords(strtolower($request->$name));
            $blogTrans->body = $request->$body;
            $blogTrans->seo_title = $request->$seo_title;
            $blogTrans->meta_keywords = $request->$meta_keywords;
            $blogTrans->meta_description = $request->$meta_description;
            $blogTrans->lang = $langCode;
            $blogTrans->save();
        }

        $response = ['message' => trans('Blogs::blogs.saved_successfully')];
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
    public function updateBlog(Request $request, $apiKey = '', $id) {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $blog = Blog::find($id);
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
            $blogTrans = BlogTrans::where('post_id', $blog->id)->where('lang', $langCode)->first();
            if (empty($blogTrans)) {
                $blogTrans = new BlogTrans;
                $blogTrans->post_id = $blog->id;
                $blogTrans->lang = $langCode;
            }
            $blogTrans->name = ucwords(strtolower($request->$name));
            $blogTrans->body = $request->$body;
            $blogTrans->seo_title = $request->$seo_title;
            $blogTrans->meta_keywords = $request->$meta_keywords;
            $blogTrans->meta_description = $request->$meta_description;
            $blogTrans->save();
        }

        $response = ['message' => trans('Blogs::blogs.updated_successfully')];
        return response()->json($response, 201);
    }

    public function postReply(Request $request, $id) {
        $contact_request = BlogTrans::where('contact_id', $id)->first();
        if ($contact_request) {
            // validate request
            $data = $request->all();
            $validate_response = Validator::make($data, array(
                'email' => 'required|email',
                //                        'subject' => 'required',
                'message' => 'required',
            ));

            if ($validate_response->fails()) {
                return redirect(URL::previous())->withErrors($validate_response)->withInput();
            } else {
                $arr_request_data = array();

                BlogTrans::where('contact_id', $id)->update(array('is_reply'=>'1'));

                $obj=new BlogReplyTrans();
                $obj->reply_email = $request->email;

                $obj->reply_subject = '';
                $obj->from_user_id = Auth::user()->id;
                $obj->reply_message = $request->message;
                $obj->contact_request_id = $id;
                $obj->lang= Lang::getlocale();
                $obj->save();

                // Send email
                $name = Setting::find(1)->value;
                $email = Setting::find(3)->value;

                $this->setMailSettings();
                $arr_keyword_values = array();
                $arr_keyword_values['userName'] = $contact_request->store_name;
                $arr_keyword_values['messageContent'] = $request->message;
//                dd($arr_keyword_values);
                /*try {
                    Mail::send('emails.contact-request-reply', $arr_keyword_values, function ($msg) use ($request,  $contact_request,$name,$email) {
                        $msg->from($email, $name);
                        $msg->to($contact_request->contact_email);
                        $msg->subject(trans('Blogs::blogs.admin_reply'));
                    });
                } catch (\Exception $e) {
                    dd($e);
                }*/
                $emailtemplateAdmin = EmailTemplateTrans::where(array('template_key'=> 'admin-contacted', 'lang'=>Lang::getlocale()))->first();
                try {
                    Mail::send('emails.admin-contacted'.'-'.Lang::getlocale(), $arr_keyword_values, function ($msg) use ($request, $contact_request, $name,$email, $emailtemplateAdmin) {
                        $msg->from($email, $name);
                        $msg->to($contact_request->contact_email);
                        $msg->subject($emailtemplateAdmin->subject);
                    });
                } catch (\Exception $e) {
                    dd($e->getMessage());
                }
                \Session::flash('alert-class', 'alert-success');
                \Session::flash('message', trans('Blogs::blogs.reply_post_msg'));
                return redirect(URL::previous())->with('status', 'Reply posted successfully!');
            }
        } else {
            return redirect(URL::previous());
        }
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