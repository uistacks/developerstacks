<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Uistacks\Locations\Models\Country;
use Uistacks\Users\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if (isset(auth()->user()->id)) {
            $item = User::findOrFail(auth()->user()->id);
            $webmeta['title'] = "Dashboard";
            $webmeta['keywords'] = "Dashboard";
            $webmeta['description'] = "Dashboard";
            return view('website.users.dashboard', compact('ads_count', 'favourite_count', 'comment_count', 'user_fav', 'item', 'ad', 'comment', 'user_comments'));
        } else {
            return redirect('/');
        }
    }

    /**
     * User profile
     *
     * @var view
     */
    public function profile(Request $request) {
        $user = auth()->user();

        if (isset(auth()->user()->id)) {
//            $item = User::findOrFail(auth()->user()->id);
            $countries = Country::where('active', 1)->get();
            $edit = 1;
            return view('website.users.profile', compact('user', 'countries'));
        } else {
            return redirect(action('UserController@index'));
        }
    }

    public function editProfile(Request $request) {
        if (isset(auth()->user()->id)) {
            $user = User::findOrFail(auth()->user()->id);
            $countries = Country::where('active', 1)->get();

            $edit = 1;
            return view('website.users.edit', compact('user', 'countries', 'edit'));
        } else {
            return redirect('/');
        }
    }

    protected function validateProfileInfo(Request $request)
    {
        $userId = auth()->user()->id;
        $validator = $this->validate($request,
            [
                'name'                  => 'required',
                'phone'                 => 'required|numeric',
                'email'                 => 'required|email|unique:users,email,' . $userId,
                'username'              => 'required|unique:users,username,' . $userId,
                'address'               => 'required'
            ],
            [
                'name.required'         => 'Please enter your full name.',
                'phone.required'        => 'Please enter your mobile number.',
//                'email.required'        => 'Please enter your email address.',
//                'email.email'           => 'Please enter a valid email address.'
            ]
        );
        return $validator;
    }

    public function updateProfile(Request $request) {
        $validator = $this->validateProfileInfo($request);

        if (isset(auth()->user()->id) && $request->user_id !='') {
            $user = User::findOrFail(auth()->user()->id);
            $user_id = auth()->user()->id;
//            $countries = Country::where('active', 1)->get();
//            $areas = City::where('country_id', auth()->user()->country_id)->get();
//            $edit = 1;
            if ($request->main_image_id) {
                $options['media']['main_image_id'] = $request->main_image_id;
                $user->options = $options;
            }
//            $user->first_name = $request->first_name;
//            $user->last_name = $request->last_name;
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->username = $request->username;
            $user->address = $request->address;
            $user->dob = date('Y-m-d', strtotime($request->birthdate));
            $user->gender = $request->gender;
//            $user->iso2 = $request->iso2;
//            $user->country_id = $request->country;
//            $user->area_id = $request->area;
            $user->save();
        }
        request()->session()->flash('alert-class', 'alert-success');
        $successMsg = "Profile updated successfully.";
        request()->session()->flash('message', $successMsg);
        return redirect(action('UserController@profile'));
    }

    public function changePicture(Request $request)
    {
        if (isset(auth()->user()->id) && $request->user_id !='') {
            $user = User::findOrFail(auth()->user()->id);
            if ($request->main_image_id) {
                $options['media']['main_image_id'] = $request->main_image_id;
                $user->options = $options;
            }
            $user->save();
        }
        request()->session()->flash('alert-class', 'alert-success');
        $successMsg = "Profile picture updated successfully.";
        request()->session()->flash('message', $successMsg);
        return redirect(action('UserController@profile'));
    }

    //account settings
    function accountSetting(Request $request){
        if (isset(auth()->user()->id)) {
            $user = User::findOrFail(auth()->user()->id);
            $edit = 1;
//dd($item);
            return view('website.users.account-setting', compact('user'));
        } else {
            return redirect(action('UserController@index'));
        }
    }

//change password
    public function updatePassword(Request $request) {
        $this->validate($request, [
            'email'                 => 'required|email',
            'password'              => 'required|min:6|max:20',
            'password_confirmation' => 'required|same:password',
        ]);
        if (isset(auth()->user()->id) && $request->user_id !='') {
            $user = User::where('email', $request->email)->where('id', auth()->user()->id)->first();
            if(!isset($user)) {
                request()->session()->flash('alert-class', 'alert-danger');
                request()->session()->flash('message', "Your request can't be completed, please try again.");
                return back();
            }
            $user_id = auth()->user()->id;
            if ($request->main_image_id) {
                $options['media']['main_image_id'] = $request->main_image_id;
                $user->options = $options;
            }
            if ($request->password) {
                $user->password = bcrypt($request->password);
            }
            $user->save();
        }
        request()->session()->flash('alert-class', 'alert-success');
        $successMsg = trans('Core::operations.updated_successfully');
        request()->session()->flash('message', $successMsg);
        return redirect(action('UserController@profile'));
    }


    /*
     * Logout Action
     */

    public function logout() {
        auth()->logout();
        request()->session()->flash('alert-class', 'alert-success');
        request()->session()->flash('message', trans('project.logout_successfully'));
        return redirect(route('login'));
    }


}
