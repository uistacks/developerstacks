<?php 
namespace Uistacks\Users\Controllers;
 
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Uistacks\Users\Models\User;
use Uistacks\Users\Models\UserRole;
use Uistacks\Users\Models\Account;
use Uistacks\Settings\Models\Setting;

use Uistacks\Settings\Controllers\SmsController;

use Auth;
use Lang;
use Mail;
use Config;
use Response;

class __UsersApiController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Uistacks Users API Controller
    |--------------------------------------------------------------------------
    |
    */

    /**
     * Refine Phone Function.
     *
     * @return \Illuminate\Http\Response
     */
    public function addCountryCodeToPhone($countryId, $phone)
    {
        if($phone == ""){
            return $phone;
        }
        $country = Country::find($countryId);
        if($country){
            $countryCode = $country->code;
            if(strpos($countryCode, '+') == false) {
                $countryCode = str_replace('+', '', $countryCode);
            }
            $phone = $countryCode.$phone;
        } else {
            $phone = $phone;
        }
        return $phone;
    }

    /**
     * Refine Phone Function.
     *
     * @return \Illuminate\Http\Response
     */
    public function refinePhone($phone)
    {
        $countries = Country::all();
        foreach($countries as $key => $country){
            // Check if country code is set with plus.
            if(substr($phone, 0, strlen($country->code)) == $country->code){
                $phone = str_replace($country->code, '', $phone);
                if(substr($phone, 0, 1) != 0){
                    $phone = '0'.$phone;
                }
                break;
            } else {
                if(strpos($phone, '+') == false) {
                    $countryCodeWithoutPlus = str_replace('+', '', $country->code);
                    if(substr($phone, 0, strlen($countryCodeWithoutPlus)) == $countryCodeWithoutPlus){
                        $pos = strpos($phone, $countryCodeWithoutPlus);
                        if ($pos !== false) {
                            $phone = substr_replace($phone, '', $pos, strlen($countryCodeWithoutPlus));
                        }
                        if(substr($phone, 0, 1) != 0){
                            $phone = '0'.$phone;
                        }
                        break;
                    } else {
                        if(substr($phone, 0, strlen($countryCodeWithoutPlus)+2) == '00'+$countryCodeWithoutPlus){
                            $pos = strpos($phone, '00'.$countryCodeWithoutPlus);
                            if ($pos !== false) {
                                $phone = substr_replace($phone, '', $pos, strlen('00'.$countryCodeWithoutPlus));
                            }
                            if(substr($phone, 0, 1) != 0){
                                $phone = '0'.$phone;
                            }
                            break;
                        }
                    }
                } 
            }
        }
        if(substr($phone, 0, 1) != 0){
            $phone = '0'.$phone;
        }
        return $phone;
    }

    /**
     * Overide Defualt Mail Settings.
     *
     * @return Response
     */
    public function setMailSettings()
    {
        Config::set('mail.driver', Setting::find(5)->value);
        Config::set('mail.host', Setting::find(6)->value);
        Config::set('mail.port', Setting::find(7)->value);
        Config::set('mail.username', Setting::find(8)->value);
        Config::set('mail.password', Setting::find(9)->value);
        Config::set('mail.from.address', Setting::find(10)->value);
        Config::set('mail.from.name', Setting::find(11)->value);
        Config::set('mail.encryption', Setting::find(12)->value);
    }

    /**
     * User Best Format.
     *
     * @return \App\User
     */
    public function userFactory($userId)
    {
        $user = User::find($userId);

        if($user->userRole->role_id == '4'){
            $user->type = 'consumer';
        } else if($user->userRole->role_id == '5'){
            $user->type = 'seller';
        } else if($user->userRole->role_id == '6'){
            $user->type = 'transporter';
        } else if($user->userRole->role_id == '7'){
            $user->type = 'vendor';
        }
        $userRelation = User::find($userId);
        if($user->country){
            $user->country->name = $userRelation->countryTrans->name;
        }
        if($user->area){
            $user->area->name = $userRelation->areaTrans->name;
        }
        if($user->province){
            $user->province->name = $userRelation->provinceTrans->name;
        }
        if($user->city){
            $user->city->name = $userRelation->cityTrans->name;
        }
        if($user->district){
            $user->district->name = $userRelation->districtTrans->name;
        }
        if($userRelation->image){
            $user->image = $userRelation->image;
        } else {
            $user->image = "";
        }
        return $user;
    }

    /**
     * Login Validation
     *
     * @param $request
     *
     * @return $validator
     */
    public function loginValidatation($request)
    {
        $rules['username'] = 'required';
        $rules['password'] = 'required';

        return \Validator::make($request->all(), $rules);
    }

    /**
     * Login Service.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $loginValidator = $this->loginValidatation($request);
        if ($loginValidator->fails()) {
            return response()->json(['status' => '2', 'response' => $registrationValidator->errors()->all()[0], 'errors' => $loginValidator->errors()->all()], 422);
        }

        $user = false;
        $username = $request->get('username');
        $password = $request->get('password');
        
        if(is_numeric($username)){
            $phone = $this->refinePhone($username);
        }
        
        if(is_numeric($username)){
            $credentials = [
                'phone' => $phone,
                'password' => $password,
                'confirmed' => 1,
                'active' => 1
            ];
            if (Auth::attempt($credentials, $request->has('remember'))) {
                $user = User::where('phone', $phone)
                ->where('active', 1)
                ->where('confirmed', 1)
                ->first();
            } else {
                $user = User::where('phone', $phone)->first();
                if($user && $user->active != '1'){
                    $result = array('status' => '4', 'user_id' => $user->id, 'response' => trans('Users::users.user_not_active'));
                    return Response::json($result);
                }
            }
        } else {
            $credentials = [
                'email' => $username,
                'password' => $password,
                'confirmed' => 1,
                'active' => 1
            ];
            if (Auth::attempt($credentials, $request->has('remember'))) {
                $user = User::where('email', $username)
                ->where('active', 1)
                ->where('confirmed', 1)
                ->first();
            } else {
                $user = User::where('email', $username)->first();
                if($user && $user->active != '1'){
                    $result = array('status' => '4', 'user_id' => $user->id, 'response' => trans('Users::users.user_not_active'));
                    return Response::json($result);
                }
            }
        }

        if(!$user){
            $result = array('status' => '3', 'response' => trans('Users::users.invalid_login_data'));
        } else {
            $result = array('status' => '1', 'user' => $this->userFactory($user->id));
        }
        
        return Response::json($result);
    }

    /**
     * Login Validation
     *
     * @param $request
     *
     * @return $validator
     */
    public function registrationValidatation($request)
    {
        $rules['name'] = 'required';
        $rules['email'] = 'required|email';
        $rules['country_id'] = 'required|numeric';
        $rules['phone'] = 'required|numeric';
        $rules['password'] = 'required|min:6|confirmed';
        $rules['password_confirmation'] = 'required';

        return \Validator::make($request->all(), $rules);
    }

    /**
     * Registration Service.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $registrationValidator = $this->registrationValidatation($request);
        if ($registrationValidator->fails()) {
            return response()->json(['status' => '2', 'response' => $registrationValidator->errors()->all()[0], 'errors' => $registrationValidator->errors()->all()], 422);
        }

        $name = $request->get('name');
        $countryId = $request->get('country_id');
        $password = $request->get('password');
        $passwordConfirmation = $request->get('password_confirmation');
        $email = $request->get('email');
        $phone = $this->refinePhone($request->get('phone'));

        if($email != ""){
            $confirmedUser = User::where('email', '=', $email)->first();
            if($confirmedUser){
                $result = array('status' => '3', 'response' => trans('Users::users.email_exists'));
                return Response::json($result);
            }
        }
        if($phone != ""){
            $confirmedUser = User::where('phone', '=', $phone)->first();
            if($confirmedUser){
                $result = array('status' => '4', 'response' => trans('Users::users.phone_exists'));
                return Response::json($result);
            }
        }
        
        // Save User Data
        $digits = 5;
        $code = rand(pow(10, $digits-1), pow(10, $digits)-1);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->country_id = $request->country_id;
        $user->password = bcrypt($request->password);
        $user->active = 2;
        $user->confirmed = 0;
        $user->confirmation_code = bcrypt($code);
        $user->sms_confirmation_code = $code;
        $user->save();

        // User role
        $userRole = new UserRole;
        $userRole->user_id = $user->id;
        $userRole->role_id = '4';
        $userRole->save();

        // Create Account
        $account = new Account;
        $account->user_id = $user->id;
        $account->balance = '0';
        $account->save();

        // Send Activation Email
        $this->setMailSettings();
        try {
            Mail::send('emails.active_user', ['user' => $user], function ($msg) use ($user) {
                $msg->from('matrash@uistacks.com', 'Matrash');
                $msg->to($user->email);
                $msg->subject(trans('Users::users.confirmation_email_title'));
            });
        } catch (\Exception $e) {}

        // Send Confirmation SMS
        $phone = $this->addCountryCodeToPhone($user->country_id, $user->phone);
        $message = trans('Users::users.matrash_activation_code').$user->sms_confirmation_code;
        try {
            $sms = new SmsController;
            $send_sms = $sms->SendSMS($phone, $message);
        }
        catch (\Exception $e) {}

        $result = array('status' => '1', 'response' => 'لقد تم التسجيل بنجاح.', 'user' => $this->userFactory($user->id));
        return Response::json($result);
    }

    /**
     * User Validation
     *
     * @param $request
     *
     * @return $validator
     */
    public function userActivationValidatation($request)
    {
        $rules['user_id'] = 'required|numeric';
        $rules['code'] = 'required|numeric';

        return \Validator::make($request->all(), $rules);
    }

    /**
     * User Activation Service.
     *
     * @return \Illuminate\Http\Response
     */
    public function userActivation(Request $request)
    {
        $userActivationValidatation = $this->userActivationValidatation($request);
        if ($userActivationValidatation->fails()) {
            return response()->json(['status' => '2', 'response' => $userActivationValidatation->errors()->all()[0], 'errors' => $userActivationValidatation->errors()->all()], 422);
        }
        $userId = $request->get('user_id');
        $code = $request->get('code');
        // Update User Data
        $user = User::find($userId);
        if(!$user){
            $result = array('status' => '3', 'response' => trans('Users::users.invalid_user'));
            return Response::json($result);
        }
        if($user->active == '1'){
            $result = array('status' => '4', 'response' => trans('Users::users.user_already_active'));
            return Response::json($result);
        }
        if($code != $user->sms_confirmation_code){
            $result = array('status' => '5', 'response' => trans('Users::users.code_is_wrong'));
            return Response::json($result);
        }
        $user->active = '1';
        $user->confirmed = '1';
        $user->email_confirmed = '1';
        $user->phone_confirmed = '1';
        $user->save();

        $result = array('status' => '1', 'response' => trans('Users::users.activation_done_successfully'), 'user' => $this->userFactory($userId));
        return Response::json($result);
    }

    /**
     * User Resend Activation Code Service.
     *
     * @return \Illuminate\Http\Response
     */
    public function resendUserActivationCode(Request $request)
    {
        $userValidatation = $this->userValidatation($request);
        if ($userValidatation->fails()) {
            return response()->json(['status' => '2', 'response' => $userValidatation->errors()->all()[0], 'errors' => $userValidatation->errors()->all()], 422);
        }
        $userId = $request->get('user_id');
        // Update User Data
        $user = User::find($userId);
        if(!$user){
            $result = array('status' => '3', 'response' => trans('Users::users.invalid_user'));
            return Response::json($result);
        }
        $digits = 5;
        $code = rand(pow(10, $digits-1), pow(10, $digits)-1);
        $user->confirmation_code = bcrypt($code);
        $user->sms_confirmation_code = $code;
        $user->save();

        // Send SMS
        $phone = $this->addCountryCodeToPhone($user->country_id, $user->phone);
        $message = trans('Users::users.matrash_activation_code').': '.$user->sms_confirmation_code;
        try {
            $sms = new SmsController;
            $send_sms = $sms->SendSMS($phone, $message);
        }
        catch (\Exception $e) {}

        $result = array('status' => '1', 'response' => trans('Users::users.confirmation_code_sent_successfully'));
        return Response::json($result);
    }

    /**
     * User Validation
     *
     * @param $request
     *
     * @return $validator
     */
    public function userValidatation($request)
    {
        $rules['user_id'] = 'required|numeric';

        return \Validator::make($request->all(), $rules);
    }

    /**
     * User Profile Data Service.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request)
    {
        $userValidatation = $this->userValidatation($request);
        if ($userValidatation->fails()) {
            return response()->json(['status' => '2', 'response' => $userValidatation->errors()->all()[0], 'errors' => $userValidatation->errors()->all()], 422);
        }
        $userId = $request->get('user_id');
        $result = array('status' => '1', 'user' => $this->userFactory($userId));
        return Response::json($result);
    }

    /**
     * User Validation
     *
     * @param $request
     *
     * @return $validator
     */
    public function profileValidatation($request)
    {
        $rules['user_id'] = 'required|numeric';
        $rules['name'] = 'required';
        $rules['email'] = 'required|email';
        $rules['country_id'] = 'required|numeric';
        $rules['phone'] = 'required|numeric';
        $rules['password'] = 'min:6|confirmed';

        return \Validator::make($request->all(), $rules);
    }

    /**
     * Update Profile Service.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {
        $profileValidatation = $this->profileValidatation($request);
        if ($profileValidatation->fails()) {
            return response()->json(['status' => '2', 'response' => $profileValidatation->errors()->all()[0], 'errors' => $profileValidatation->errors()->all()], 422);
        }
        $userId = $request->get('user_id');
        $name = $request->get('name');
        $countryId = $request->get('country_id');
        $areaId = $request->get('area_id');
        $provinceId = $request->get('province_id');
        $cityId = $request->get('city_id');
        $districtId = $request->get('district_id');
        $email = $request->get('email');
        $phone = $this->refinePhone($request->get('phone'));
        $password = $request->get('password');
        $passwordConfirmation = $request->get('password_confirmation');
        if($email != ""){
            $confirmedUser = User::where('email', '=', $email)->where('id', '!=', $userId)->first();
            if($confirmedUser){
                $result = array('status' => '3', 'response' => trans('Users::users.email_exists'));
                return Response::json($result);
            }
        }
        if($phone != ""){
            $confirmedUser = User::where('phone', '=', $phone)->where('id', '!=', $userId)->first();
            if($confirmedUser){
                $result = array('status' => '4', 'response' => trans('Users::users.phone_exists'));
                return Response::json($result);
            }
        }
        
        // Save User Data
        $user = User::find($userId);
        $options = array();
        $emailUpdated = 0;
        $phoneUpdated = 0;
        $digits = 5;
        $code = rand(pow(10, $digits-1), pow(10, $digits)-1);
        if($user->phone != $phone){
            // Phone Changed
            $phoneUpdated = 1;
            // $user->confirmed = 0;
            $user->confirmation_code = bcrypt($code);
            $user->sms_confirmation_code = $code;
            $user->phone_confirmed = '0';
            $options['phone'] = $request->phone;
            // $user->temp = $options;
            // Send Confirmation SMS
            $phone = $this->addCountryCodeToPhone($countryId, $phone);
            $message = trans('Users::users.matrash_activation_code').$user->sms_confirmation_code;
            try {
                $sms = new SmsController;
                $send_sms = $sms->SendSMS($phone, $message);
            }
            catch (\Exception $e) {}
        }
        if($user->email != $request->email){
            // Email Changed
            $emailUpdated = 1;
            // $user->confirmed = 0;
            $user->confirmation_code = bcrypt($code);
            $user->sms_confirmation_code = $code;
            $user->email_confirmed = '0';
            $options['email'] = $request->email;
            // $user->temp = $options;
            // Send Confirmation Email
            $this->setMailSettings();
            $lang = Lang::getLocale();
            try {
                Mail::send('emails.active_user', ['user' => $user, 'lang' => $lang], function ($msg) use ($user) {
                    $msg->from('matrash@uistacks.com', 'Matrash');
                    $msg->to($user->email);
                    $msg->subject(trans('Users::users.confirmation_email_title'));
                });
            } catch (\Exception $e) {
                // dd($e->getMessage());
            }
        }
        // Email and phone changed from phone and email confirmation services
        $user->options = $options;
        $user->name = $request->name;
        $user->country_id = $countryId;
        $user->area_id = $areaId;
        $user->province_id = $provinceId;
        $user->city_id = $cityId;
        $user->district_id = $districtId;
        if($password != ""){
            $user->password = bcrypt($request->password);
        }
        $user->save();
        $result = array('status' => '1', 'response' => trans('Users::users.profile_update_done_successfully'), 'phone_updated' => $phoneUpdated, 'email_updated' => $emailUpdated);
        return Response::json($result);
    }

    /**
     * Activate User After Update Service.
     *
     * @return \Illuminate\Http\Response
     */
    public function phoneConfirmation(Request $request)
    {
        $userValidatation = $this->userValidatation($request);
        if ($userValidatation->fails()) {
            return response()->json(['status' => '2', 'response' => $userValidatation->errors()->all()[0], 'errors' => $userValidatation->errors()->all()], 422);
        }
        $userId = $request->get('user_id');
        // Update User Data
        $user = User::find($userId);
        if(!$user){
            $result = array('status' => '3', 'response' => trans('Users::users.invalid_user'));
            return Response::json($result);
        }
        if($user->phone_confirmed == "1"){
            $result = array('status' => '4', 'response' => trans('Users::users.user_phone_already_confirmed'));
            return Response::json($result);
        }
        if(!empty($user->options) && isset($user->options['phone'])){
            $user->phone = $user->options['phone'];
        }
        $user->phone_confirmed = '1';
        $user->save();

        $result = array('status' => '1', 'response' => trans('Users::users.phone_confirmation_done_successfully'), 'user' => $this->userFactory($userId));
        return Response::json($result);
    }

    /**
     * User Account Service.
     *
     * @return \Illuminate\Http\Response
     */
    public function account(Request $request)
    {
        $userValidatation = $this->userValidatation($request);
        if ($userValidatation->fails()) {
            return response()->json(['status' => '2', 'response' => $userValidatation->errors()->all()[0], 'errors' => $userValidatation->errors()->all()], 422);
        }
        $userId = $request->get('user_id');
        $account = Account::where('user_id', $userId)
        // ->with('transactions.author.user_role')
        ->first();
        $result = array('status' => '1', 'data' => $account);
        return Response::json($result);
    }

    /**
     * Username Validation
     *
     * @param $request
     *
     * @return $validator
     */
    public function usernameValidatation($request)
    {
        $rules['username'] = 'required';
        return \Validator::make($request->all(), $rules);
    }

    /**
     * Forget Password Service.
     *
     * @return \Illuminate\Http\Response
     */
    public function forgetPassword(Request $request)
    {
        $usernameValidatation = $this->usernameValidatation($request);
        if ($usernameValidatation->fails()) {
            return response()->json(['status' => '2', 'response' => $usernameValidatation->errors()->all()[0], 'errors' => $usernameValidatation->errors()->all()], 422);
        }
        $digits = 5;
        $code = rand(pow(10, $digits-1), pow(10, $digits)-1);
        $username = $request->get('username');

        if(is_numeric($username)){
            $phone = $this->refinePhone($username);
            $user = User::where('phone', $phone)->first();
        } else {
            $user = User::where('email', $username)->first();
            if(!$user){
                $result = array('status' => '3', 'response' => trans('Users::users.invalid_user'));
                return Response::json($result);
            }
            $user->confirmation_code = bcrypt($code);
            $user->sms_confirmation_code = $code;
            $user->save();
            // Send Confirmation Email
            $this->mail_setting();
            $lang = Lang::getLocale();
            try {
                Mail::send('emails.reset_password', ['user' => $user], function ($msg) use ($user) {
                    $msg->from('mala3eb@uistacks.com', 'Mala3eb');
                    $msg->to($user->email);
                    $msg->subject(trans('Users::users.reset_password_email_title'));
                });
            } catch (\Exception $e) {}
            $result = array('status' => '4', 'response' => trans('Users::users.email_sent_to_change_password'));
            return Response::json($result);
        }
        // username is phone
        if(!$user){
            $result = array('status' => '3', 'response' => trans('Users::users.invalid_user'));
            return Response::json($result);
        }
        $user->confirmation_code = bcrypt($code);
        $user->sms_confirmation_code = $code;
        $user->save();

        // Send SMS
        $phone = $user->phone;
        $phone = $this->addCountryCodeToPhone($user->country_id, $user->phone);
        $message = trans('Users::users.reset_password_code').': '.$user->sms_confirmation_code;
        try {
            $sms = new SmsController;
            $send_sms = $sms->SendSMS($phone, $message);
        }
        catch (\Exception $e) {}

        $result = array('status' => '1', 'response' => trans('Users::users.please_insert_code_to_continue_changing_password'), 'user' => $this->userFactory($user->id) );
        return Response::json($result);
    }

    /**
     * Verify User SMS Code.
     *
     * @return \Illuminate\Http\Response
     */
    public function userCodeVerification(Request $request)
    {
        $userActivationValidatation = $this->userActivationValidatation($request);
        if ($userActivationValidatation->fails()) {
            return response()->json(['status' => '2', 'response' => $userActivationValidatation->errors()->all()[0], 'errors' => $userActivationValidatation->errors()->all()], 422);
        }
        $userId = $request->get('user_id');
        $code = $request->get('code');
        $user = User::find($userId);
        if(!$user){
            $result = array('status' => '3', 'response' => trans('Users::users.invalid_user'));
            return Response::json($result);
        }
        if($code != $user->sms_confirmation_code){
            $result = array('status' => '4', 'response' => trans('Users::users.code_is_wrong'));
            return Response::json($result);
        }
        $result = array('status' => '1', 'response' => trans('Users::users.correct_code'), 'user' => $this->userFactory($userId));
        return Response::json($result);
    }

    /**
     * Username Validation
     *
     * @param $request
     *
     * @return $validator
     */
    public function updateUserPasswordValidatation($request)
    {
        $rules['user_id'] = 'required|numeric';
        $rules['password'] = 'required|min:6|confirmed';
        $rules['password_confirmation'] = 'required';
        return \Validator::make($request->all(), $rules);
    }

    /**
     * Change Password Service.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateUserPassword(Request $request)
    {
        $updateUserPasswordValidatation = $this->updateUserPasswordValidatation($request);
        if ($updateUserPasswordValidatation->fails()) {
            return response()->json(['status' => '2', 'response' => $updateUserPasswordValidatation->errors()->all()[0], 'errors' => $updateUserPasswordValidatation->errors()->all()], 422);
        }
        $userId = $request->get('user_id');
        $password = $request->get('password');
        $user = User::find($userId);
        if(!$user){
            $result = array('status' => '3', 'response' => trans('Users::users.invalid_user'));
            return Response::json($result);
        }
        $user->password = bcrypt($request->password);
        $user->save();
        $result = array('status' => '1', 'response' => trans('Users::users.password_updated_successfully'));
        return Response::json($result);
    }
}