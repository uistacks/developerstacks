<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Uistacks\Users\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Auth login
     *
     * @var view
     */
    public function login(Request $request) {
//        $request->session()->put('url.intended',url()->previous());
        return view('website.auth.login');
    }

    /*
     * Login Action
     */

    public function postLogin(Request $request) {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
//        rsingh2@katalysttech.com
        //using username
        $credentials1 = [
            'username' => $request->email,
            'password' => $request->password,
            /*'confirmed' => 1,
            'active' => 1*/
        ];
        // using email
        $credentials2 = [
            'email' => $request->email,
            'password' => $request->password,
            /*'confirmed' => 1,
            'active' => 1*/
        ];
        if (auth()->attempt($credentials1, $request->has('remember'))) {
            request()->session()->flash('alert-class', 'alert-success');
            request()->session()->flash('message', 'You are logged in successfully.');
            if (auth()->user()->userRole->role_id < 2) {
                return redirect('/' . app()->getlocale() . '/admin');
            }
            $user = auth()->user();
            $userCategories = UserCategory::where('user_id', $user->id)->get()->count();
            if($user->user_type == '2' && $userCategories == 0) {
                return redirect(action('UserController@completeProfile', $user->username));
            }
            return redirect()->intended('/' . app()->getlocale() .'/users');
        }
        elseif (auth()->attempt($credentials2, $request->has('remember'))) {
            request()->session()->flash('alert-class', 'alert-success');
            request()->session()->flash('message', 'You are logged in successfully.');
            if (auth()->user()->userRole->role_id < 2) {
                return redirect('/' . app()->getlocale() . '/admin');
            }
            $user = auth()->user();
            $userCategories = UserCategory::where('user_id', $user->id)->get()->count();
            if($user->user_type == '2' && $userCategories == 0) {
                return redirect(action('UserController@completeProfile', $user->username));
            }
            return redirect()->intended('/' . app()->getlocale() .'/users');
        }
        else {
            $user = auth()->user();

            if(isset($user) && (auth()->user()->confirmed !== '1' || auth()->user()->active !== '1')) {
                request()->session()->flash('alert-class', 'alert-danger');
                request()->session()->flash('message', 'Your account is inactive Please contact your webmaster.');
            } else {
                request()->session()->flash('alert-class', 'alert-danger');
                request()->session()->flash('message', 'Email/Username or password not matched with our record.');
            }
            return back()->withInput();
        }
    }

    public function checkEmailAvailability(Request $request){
        $email = $request->get('email');
        $username = User::where('email', '=', $email)->first();
        if(!$username){
//            return ['valid'=>true];
            echo 'true';
        } else {
//            return ['valid'=>false];
            echo 'false';
        }
    }

}
