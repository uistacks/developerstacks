<?php

namespace Uistacks\Roles\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Uistacks\Roles\Models\Role;
use Uistacks\Roles\Models\RoleTrans;
use Illuminate\Support\Facades\Input;
use Auth;
use Uistacks\Users\Models\PermissionRole;

class RolesApiController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Uistacks Roles API Controller
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

//        $rules['name'] = 'unique:roles_trans';
        if (count($languages)) {
            foreach ($languages as $key => $language) {
                $code = $language['code'];
                if ($request->language) {
                    foreach ($request->language as $lang) {
                        $rules['name_' . $code . ''] = 'required|max:255';
                    }
                }
            }
        }
        $rules['permissions'] = 'required';
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
    public function listItems(Request $request) {
        $roles = Role::where('id','!=',5)->where('id','!=',3)->FilterName()->FilterStatus()->orderBy('id', 'DESC')->paginate($request->get('paginate'));
        $roles->appends(Input::except('page'));
        return $roles;
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function storeRole(Request $request) {
        $validator = $this->validatation($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $cn = RoleTrans::where('name', ucfirst(strtolower($request->name_ar)))->first();
        if (isset($cn->name)) {
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message', trans('duplicate_role_msg'));
            $store = "Duplicate Entry Present";
            return $store;
        }

        $role = new Role;
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }

        $role->created_by = $author;
        $role->updated_by = $author;

        $role->active = false;
        if ($request->active) {
            $role->active = true;
        }
        $role->save();

        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;

            $roleTrans = new RoleTrans;
            $roleTrans->role_id = $role->id;
            $roleTrans->name = ucfirst(strtolower($request->$name));
            $roleTrans->lang = $langCode;
            $roleTrans->save();
        }

        $permission_ids = $request->permissions;
        if (isset($permission_ids) && count($permission_ids) > 0) {
            foreach ($permission_ids as $new_per) {
                $new_permission = new PermissionRole;
                $new_permission->role_id = $role->id;
                $new_permission->permission_id = $new_per;
                $new_permission->save();
            }
        }

        $response = ['message' => trans('Roles::roles.saved_successfully')];
        return response()->json($response, 201);
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function updateRole(Request $request, $apiKey = '', $id) {
        $role = Role::find($id);
        if ($request->author) {
            $author = $request->author;
        } else {
            $author = Auth::user()->id;
        }

        $role->updated_by = $author;

        $role->active = false;
        if ($request->active) {
            $role->active = true;
        }
        $role->save();
        // Translation
        foreach ($request->language as $langCode) {
            $name = 'name_' . $langCode;

            $roleTrans = RoleTrans::where('role_id', $role->id)->where('lang', $langCode)->first();
            if (empty($roleTrans)) {
                $roleTrans = new RoleTrans;
                $roleTrans->role_id = $role->id;
                $roleTrans->lang = $langCode;
            }
            $roleTrans->name = ucfirst(strtolower($request->$name));
            $roleTrans->save();
        }
        $users_all_permissions = PermissionRole::where('role_id', $role->id)->get();
        if (isset($users_all_permissions) && count($users_all_permissions) > 0) {
            foreach ($users_all_permissions as $del) {
                $del->delete();
            }
        }
        $permission_ids = $request->permissions;
        if (isset($permission_ids) && count($permission_ids) > 0) {
            foreach ($permission_ids as $new_per) {
                $new_permission = new PermissionRole;
                $new_permission->role_id = $role->id;
                $new_permission->permission_id = $new_per;
                $new_permission->save();
            }
        }

        $response = ['message' => trans('Roles::roles.updated_successfully')];
        return response()->json($response, 201);
    }

}
