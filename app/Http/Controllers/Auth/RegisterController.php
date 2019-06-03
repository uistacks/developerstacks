<?php

namespace App\Http\Controllers\Auth;

//use App\User;
use App\Http\Controllers\Controller;
use App\Mail\ActivateAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Uistacks\Media\Controllers\MediaApiController;
use Uistacks\Users\Models\User;
use Uistacks\Users\Models\UserRole;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Auth register
     *
     * @var view
     */
    public function register() {
//        $countries = Country::where('active', 1)->orderBy('id', 'ASC')->get();
        return view('website.auth.register');
    }

    protected function validateRegister(Request $request)
    {
        $validator = $this->validate($request,
            [
//                'first_name'            => 'required',
//                'last_name'             => 'required',
                'name'                  => 'required',
                'phone'                 => 'required|numeric',
                'email'                 => 'required|email|unique:users',
                'password'              => 'required|min:6|max:20',
                'password_confirmation' => 'required|same:password',
//                'g-recaptcha-response'  => 'required',
//                'captcha'               => 'required|min:1'
            ],
            [
//                'first_name.required'   => 'First name is required',
//                'last_name.required'    => 'Last name is required',
                'name.required'         => 'Please enter your full name.',
                'email.required'        => 'Please enter your email address.',
                'email.email'           => 'Please enter a valid email address.',
//                'phone.required'        => 'Please enter your mobile number.',
                'password.required'     => 'Please enter your password.',
//                'password.min'          => 'Password needs to have at least 6 characters',
//                'password.max'          => 'Password maximum length is 20 characters',
//                'g-recaptcha-response.required' => 'Please verify that you are not a robot.',
//                'captcha.min'           => 'Wrong captcha, please try again.'
            ]
        );
        return $validator;
    }

    /**
     * Auth register
     *
     * @var view
     */
    public function postRegister(Request $request) {
        $validator = $this->validateRegister($request);
        if ($validator->fails()) {
            return redirect(URL::previous())
                ->withErrors($validator)
                ->withInput();
        }
        $emaiUsername = explode('@', strtolower($request->email));
        $activation_code = $this->generateReferenceNumber();
        $user = new User;
//        $user->first_name = $request->first_name;
//        $user->last_name = $request->last_name;
        $user->name = $request->name;
//        $user->name = $request->first_name.' '.$request->last_name;
        $user->user_type = $request->user_type;
        $user->username = $emaiUsername[0];
//        $user->username = $request->username;
//        $user->country_id = $request->country;
//        $user->area_id = $request->area;
//        $user->iso2 = $request->iso2;
        $user->email = strtolower($request->email);
        $user->phone = $request->phone;

        $user->password = bcrypt($request->password);
        $user->email_code = rand(pow(10, 4 - 1), pow(10, 4) - 1);
        $user->confirmation_code = $activation_code;
        $user->save();
        $user_id = $user->id;

        if ($request->avatar) {
            // $request->avatar = $request->avatar->productAs('avatars', $request->phone.'-'.date('Y-m-d-h:i:sa').'.jpg');
            $request->request->add(['files' => $request->avatar]);
            $media = new MediaApiController();
            $media = $media->uploadFiles($request, $user_id);
            $options['media']['main_image_id'] = $media[0]->id;
            $user->options = $options;
            $user->save();
        }

        // User role
        $userRole = new UserRole;
        $userRole->user_id = $user->id;
        $userRole->role_id = 3; // member
        $userRole->save();

        $user->activation_link = route('verify-user-email', $user->activation_code);
        Mail::to($user->email)->send(new ActivateAccount($user));

        /*try {
            Mail::send('emails.active-user'.'-'.Lang::getlocale(), $arr_keyword_values, function ($message) use ($request, $email, $name, $emailtemplateUser) {
//                    $message->from($email, $name);
                $message->from($email, $name);
                $message->to(strtolower($request->email));
                $message->subject($emailtemplateUser->subject);
            });
        } catch (\Exception $e) {
//            dd($e->getMessage());
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message', $e->getMessage());
            return redirect(action('WebsiteController@authentication'));
        }*/
        try {
            $this->sendEmail($user);
        } catch (\Exception $e) {
//            dd($e->getMessage());
//            \Session::flash('alert-class', 'alert-danger');
//            \Session::flash('message', $e->getMessage());
//            return redirect(action('Auth\LoginController@login'));
        }
//        dd("Hello");
        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', "Registration Successful! A confirmation email has been sent to " . '"' . strtolower($request->email) . '"' . " , If you don't receive this confirmation email in your email inbox within a few minutes, please check your email's spam folder and then click on the Activation link in the email, to activate your UiStacks account");
//        return redirect(action('WebsiteController@verifyUserAccount', [$user->id, $user->username, 'confirm_account']));
        return redirect(action('Auth\LoginController@login'));
    }

    private function sendEmail($user)
    {
        // Send email
        $name = Setting::find(1)->value;
        $email = Setting::find(3)->value;
        //Assign values to all macros
        //Assign values to all macros
        $arr_keyword_values = array();
        //Assign values to all macros
        $arr_keyword_values['username'] = $user->name;
        $arr_keyword_values['email'] = $user->email;
//        $arr_keyword_values['password'] = $user->password;
        $arr_keyword_values['VERIFICATION_LINK'] = action('Auth\RegisterController@verifyUserEmail',$user->confirmation_code);
        $arr_keyword_values['SITE_TITLE'] = Setting::find(1)->value;
        $arr_keyword_values['SITE_PATH'] = url('/').'/';

        $this->setMailSettings();
        //user mail setting
        $emailtemplateUser = EmailTemplateTrans::where(array('template_key'=> 'registration-successful', 'lang'=>Lang::getlocale()))->first();

        Mail::send('emails.registration-successful', $arr_keyword_values, function ($message) use ($user, $name, $email, $emailtemplateUser) {
            $message->from($email, $name);
            $message->to($user->email);
//                    $message->cc($admin_user->email);
//            $message->subject($emailtemplateUser->subject);
            $message->subject("Hello $user->username, Please activate your account.");
        });
    }


    private function generateReferenceNumber() {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x', mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0x0fff) | 0x4000, mt_rand(0, 0x3fff) | 0x8000, mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff));
    }

    /**
     * Confirm email
     */
    public function verifyUserEmail($activation_code) {
        $user_informations = User::where(array('confirmation_code'=> $activation_code))->first();
        if (isset($user_informations)) {
            if ($user_informations->active == "0") {
//                dd("1st");
                //updating the user status to active
                $user_informations->active = true;
                $user_informations->confirmed = true;
                $user_informations->confirmation_code = '';
                $user_informations->save();
                \Session::flash('alert-class', 'alert-success');
                $successMsg = trans('project.account_confirmed_successfully');
//                auth()->logout();
                \Session::flash('message', $successMsg);
                return redirect(action('Auth\LoginController@login'));
            } else {
//                dd("2nd");
                $user_informations->confirmation_code = '';
                $user_informations->save();
                \Session::flash('alert-class', 'alert-danger');
                \Session::flash('message', trans('project.confirmation_link_invalid'));
//                auth()->logout();
                return redirect(action('Auth\LoginController@login'));
            }
        } else {
//            dd("3rd");
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message', trans('project.confirmation_link_invalid'));
//            auth()->logout();
            return redirect(action('Auth\LoginController@login'));
        }
    }

}
