<?php

namespace App\Http\Controllers\Auth;

//use App\User;
use App\Helpers\GeneralHelper;
use App\Http\Controllers\Controller;
use App\Mail\ActivateAccount;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Uistacks\Media\Controllers\MediaApiController;
use Uistacks\Settings\Models\Setting;
use Uistacks\Users\Models\User;
use Uistacks\Users\Models\UserRole;
use Illuminate\Support\Facades\Mail;

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

        $emaiUsername = explode('@', strtolower($request->email));
        $activation_code = GeneralHelper::generateReferenceNumber();
        $user = new User;
        $user->name = $request->name;
        $user->username = $emaiUsername[0];
//        $user->username = $request->username;
//        $user->country_id = $request->country;
//        $user->area_id = $request->area;
//        $user->iso2 = $request->iso2;
        $user->email = strtolower($request->email);
        $user->phone = $request->phone;

        $user->password = bcrypt($request->password);
//        $user->email_code = rand(pow(10, 4 - 1), pow(10, 4) - 1);
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

        $user->subject = "Hello $user->username, Please activate your account.";
        $user->activation_link = route('verify-user-email', $user->confirmation_code);
        $mail = Mail::to($user->email)->send(new ActivateAccount($user));

        request()->session()->flash('alert-class', 'alert-success');
//        request()->session()->flash('message', "Registration Successful! A confirmation email has been sent to " . '"' . strtolower($request->email) . '"' . " , If you don't receive this confirmation email in your email inbox within a few minutes, please check your email's spam folder and then click on the Activation link in the email, to activate your UiStacks account");
        request()->session()->flash('message', "We sent you an activation code. Check your email and click on the link to verify.");
//        return redirect(action('WebsiteController@verifyUserAccount', [$user->id, $user->username, 'confirm_account']));
        return redirect(action('Auth\LoginController@login'));
    }

    /**
     * Confirm email
     */
    public function verifyUserEmail($activation_code) {
        $user_informations = User::where(array('confirmation_code'=> $activation_code))->first();
        if (isset($user_informations)) {
            if ($user_informations->active == "0") {
                //updating the user status to active
                $user_informations->active = true;
                $user_informations->confirmed = true;
                $user_informations->confirmation_code = '';
                $user_informations->email_verified_at = date('Y-m-d H:i:s');
                $user_informations->save();
                request()->session()->flash('alert-class', 'alert-success');
                $successMsg = trans('project.account_confirmed_successfully');
//                auth()->logout();
                request()->session()->flash('message', $successMsg);
                return redirect(action('Auth\LoginController@login'));
            } else {
                $user_informations->confirmation_code = '';
                $user_informations->save();
                request()->session()->flash('alert-class', 'alert-danger');
                request()->session()->flash('message', trans('project.confirmation_link_invalid'));
                return redirect(action('Auth\LoginController@login'));
            }
        } else {
            request()->session()->flash('alert-class', 'alert-danger');
            request()->session()->flash('message', trans('project.confirmation_link_invalid'));
            return redirect(action('Auth\LoginController@login'));
        }
    }

}



