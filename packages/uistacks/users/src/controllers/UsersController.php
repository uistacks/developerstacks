<?php

namespace Uistacks\Users\Controllers;

use Illuminate\Http\Request;
use Uistacks\Users\Controllers\UsersApiController as API;
use Uistacks\Users\Models\User;
use Uistacks\Roles\Models\Role;
use Uistacks\Roles\Models\RoleTrans;
use Auth;
use Uistacks\Locations\Models\Country;
use Uistacks\Locations\Models\State;
use Uistacks\Locations\Models\City;
use Uistacks\Users\Models\Permission;
use Uistacks\Users\Models\PermissionRole;
use Uistacks\Users\Models\PermissionTrans;
use Uistacks\Users\Models\PermissionUser;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;


class UsersController extends UsersApiController {
    /*
      |--------------------------------------------------------------------------
      | Uistacks Users Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles Users for the application.
      |
     */

    public function __construct() {
        $this->api = new API;
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function index(Request $request) {
        $roleId = 3;
        $request->request->add(['role_id' => $roleId, 'paginate' => 20]);
        $items = $this->api->listUsers($request);
        return view('Users::users.index', compact('items'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function create(Request $request) {
        $countries = Country::where('active', 1)->get();
        $states = State::where('active', 1)->get();
        $cities = City::where('active', 1)->get();
        return view('Users::users.create-edit', compact('items','countries', 'states','cities'));
    }

    /**
     * @param
     * @return
     */
    public function store(Request $request) {
        $roleId = 3;

        $request->request->add(['role_id' => $roleId]);
        $store = $this->api->storeUser($request);
        $store = $store->getData();
        if (isset($store->errors)) {
            return back()->withInput()->withErrors($store->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $store->message);

        if ($request->back) {
            return back();
        }
        return redirect(action('\Uistacks\Users\Controllers\UsersController@index', $role));
    }

    /**
     * @param
     * @return
     */
   public function edit($id) {
        $item = User::findOrFail($id);
        $countries = Country::where('active', 1)->get();
        $states = DB::table('states AS s')
            ->join('states_trans AS st', 'st.state_id', 's.id')
            ->where('s.country_id', $item->country_id)
            ->where('s.active', 1)
            ->where('st.lang', App::getLocale())
            ->get();

//        $cities = City::where('active', 1)->get();
        $cities = DB::table('cities AS c')
            ->join('cities_trans AS ct', 'ct.city_id', 'c.id')
            ->where('c.state_id', $item->state_id)
            ->where('c.active', 1)
            ->where('ct.lang', App::getLocale())
            ->get();
//        $roles = Role::where('id' , '!=', 5)->where('id' , '!=', 3)->get();
        $roles = Role::where('id' , '!=', 5)->get();

        $edit = 1;

        return view('Users::users.create-edit', compact('item', 'countries', 'states','cities', 'edit','roles'));
    }

    /**
     * @param
     * @return
     */
    public function update(Request $request,$id) {
        /**       Comment By swati
 *
 * if ($role == 'admin') {
           $roleId = 4;
        } elseif ($role == 'members') {
            $roleId = 5;
        }
        $request->request->add(['role_id' => $roleId]);

       dd($request);*/
        $roleId = 3;
        $request->request->add(['role_id' => $roleId]);

//        dd($request);
        $update = $this->api->updateUser($request, $id);
        $update = $update->getData();

        if (isset($update->errors)) {
            return back()->withInput()->withErrors($update->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $update->message);

        if ($request->back) {
            return back();
        }
        return redirect(action('\Uistacks\Users\Controllers\UsersController@index'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function confirmDelete($role, $id) {
        $item = User::findOrFail($id);
        return view('Users::users.confirm-delete', compact('item'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function bulkOperations(Request $request) {
        if ($request->ids) {
            $items = User::whereIn('id', $request->ids)->get();
//            dd($items);
            if ($items->count()) {
                foreach ($items as $item) {
                    // Do something with your model by filter operation
                    if ($request->operation && $request->operation === 'activate') {
                        $item->active = true;
                        $item->updated_by = Auth::user()->id;
                        $item->save();
                        \Session::flash('message', trans('Core::operations.activated_successfully'));
                    } elseif ($request->operation && $request->operation === 'deactivate') {
                        $item->active = false;
                        $item->updated_by = Auth::user()->id;
                        $item->save();
                        \Session::flash('message', trans('Core::operations.deactivated_successfully'));
                    }
                }
            }

            \Session::flash('alert-class', 'alert-success');
        } else {
            \Session::flash('alert-class', 'alert-warning');
            \Session::flash('message', trans('Core::operations.nothing_selected'));
        }
        return back();
    }

    //change member status
    public function changeStatus(Request $request) {
        if ($request->user_id != "") {
            /* updating the user status. */
            $arr_to_update = array("active" => $request->user_status);
            /* updating the user status  value into database */
            User::where('id', $request->user_id)->update($arr_to_update);
            echo json_encode(array("error" => "0"));
        } else {
            /* if something going wrong providing error message.  */
            echo json_encode(array("error" => "1"));
        }
    }

    public function givePermission(Request $request, $role_id = "", $user_id = "") {
//        dd($request);
        if ($role_id == 'admin') {
            $user = User::where('id', $user_id)->first();
            if (isset($user)) {
                $user_permission = $user->hasPermission;
                foreach ($user_permission as $key => $value) {
                    $arr_user_permission[] = $user_permission{$key}->getPermission->id;
                }
                $permissions = Permission::where('active','1')->orderBy('id','Desc')->get();
                if ($request->method() == "GET") {
                    return view('Users::users.permission', compact('user', 'permissions', 'user_permission', 'arr_user_permission'));
                } else {
                    $users_all_permissions = PermissionUser::where('user_id', $user_id)->get();
                    if (isset($users_all_permissions) && count($users_all_permissions) > 0) {
                        foreach ($users_all_permissions as $del) {
                            $del->delete();
                        }
                    }
                    $permission_ids = $request->permission_id;
                    if (isset($permission_ids) && count($permission_ids) > 0) {
                        foreach ($permission_ids as $new_per) {
                            $new_permission = new PermissionUser;
                            $new_permission->user_id = $user_id;
                            $new_permission->permission_id = $new_per;
                            $new_permission->save();
                        }
                    }
                    \Session::flash('alert-class', 'alert-success');
                    \Session::flash('message', trans("Users::users.permission_set_successfully"));
                    return redirect(url('/').'/'.Lang::getLocale().'/admin/users/admin');
                }
            }
        } else {
            return redirect('/');
        }
    }

}
