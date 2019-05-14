<?php

namespace App\Http\Middleware;

use Closure;
use Uistacks\Users\Models\Permission;
use Uistacks\Users\Models\PermissionRole;
use Uistacks\Users\Models\PermissionUser;
use Uistacks\Users\Models\PermissionTrans;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

// Custom uistacks
class AdminMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (auth()->check()) {
            if (!$request->user()->userRole || $request->user()->userRole->role_id != '1') {
//                dd($request->user()->userRole->role_id);
                if ($request->user()->userRole->role_id == '3') {
                    abort('403', 'Unauthorized action.');
                }
//                else if ($request->user()->userRole->role_id == '4') {
                    if ($request->user()->active == 0) {
                        request()->session()->flush();
                        request()->session()->flash('alert-class', 'alert-danger');
                        request()->session()->flash('message', trans('admin.inactive_alert'));
                        return redirect(url('/')."/admin/login");
                    }

                    if (Request::segment(3) != NULL) {
//                        $all_permission = auth()->user()->hasPermission;
                        $curent_user_role_id = auth()->user()->hasRole;
                        $roleP = \Uistacks\Roles\Models\Role::where(array('id'=>$curent_user_role_id->role_id))->first();
                        $all_permission = $roleP->hasPermission;

                        foreach ($all_permission as $key => $value) {
                            $arr_user_permission[] = $all_permission{$key}->getPermission->model;
                        }
                        if (isset($all_permission) && count($all_permission) > 0) {
                            if (!in_array(Request::segment(3), $arr_user_permission)) {
                                abort('403', 'Unauthorized action.');
                            }
                        } else {
                            abort('403', 'Unauthorized action.');
                        }
                    }
//                }
            }
        } else {
//            return redirect(Lang::getLocale() . '/admin/login');
            return redirect( 'admin/login');
        }
        return $next($request);
    }

}
