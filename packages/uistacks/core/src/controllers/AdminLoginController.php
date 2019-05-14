<?php 
namespace Uistacks\Core\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Uistacks\Core\Requests\LoginRequest;
use Auth;
use Uistacks\Users\Models\User;
use Lang;
use League\Flysystem\Exception;

class AdminLoginController extends Controller
{

 	/*
    |--------------------------------------------------------------------------
    | Uistacks Admin login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles Admin login for the application.
    |
    */

    use AuthenticatesUsers;

    /**
     * Show the application login form.
     *
     * @return Response
     */
    public function getAdmin()
    {
        return view('Core::admin.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  LoginRequest  $request
     * @return Response
     */
    public function postAdmin(LoginRequest $request)
    {
        $this->validate($request, [
            $this->username() => 'required', 'password' => 'required',
        ]);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        // $throttles = $this->isUsingThrottlesLoginsTrait();

        // if ($throttles && $this->hasTooManyLoginAttempts($request)) {
        if ($this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        // $credentials = $this->getCredentials($request);
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'confirmed' => 1,
            'active' => 1
        ];

     //   dd($credentials);
        /*try{
            $abc = Auth::attempt($credentials, $request->has('remember'));
        }
        catch (Exception $e){
            echo $e->getMessage(); die;
        }*/



        if (Auth::attempt($credentials, $request->has('remember'))) {
//            return redirect(Lang::getLocale().'/admin');
            return redirect('admin');
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.

        // if ($throttles) {
        //     $this->incrementLoginAttempts($request);
        // }

//        return redirect(Lang::getLocale().'/admin/login')
        return redirect('admin/login')
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => $this->getFailedLoginMessage(),
            ]);
    }

    /**
     * Log the user out of the application.
     *
     * @return Response
     */
    public function getAdminLogout()
    {
        Auth::logout();
//        return redirect(Lang::getLocale().'/admin')->withErrors(['User' => 'This user has been logged out']);
        return redirect('admin')->withErrors(['User' => 'This user has been logged out']);
    }

    /**
     * Log the user out of the application.
     *
     * @return Response
     */
    public function getFailedLoginMessage()
    {
        $message = trans('admin.auth_problem');
 
        return $message;
    }
}