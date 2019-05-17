<?php
namespace Uistacks\Roles\Controllers;

use Illuminate\Http\Request;
use Uistacks\Roles\Controllers\RolesApiController as API;
use Uistacks\Roles\Models\Role;
use Uistacks\Roles\Models\RoleTrans;
use Uistacks\Users\Models\Permission;

class RolesController extends RolesApiController
{

    /*
   |--------------------------------------------------------------------------
   | Uistacks Roles Controller
   |--------------------------------------------------------------------------
   |
   | This controller handles Roles for the application.
   |
   */
    public function __construct()
    {
        $this->api = new API;
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function index(Request $request)
    {
        $request->request->add(['paginate' => 20]);
        $items = $this->api->listItems($request);
        return view('Roles::roles.index', compact('items'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function create()
    {
        $permissions = Permission::where('active','1')->orderBy('id','ASC')->get();
        return view('Roles::roles.create-edit', compact('items','permissions'));
    }


    /**
     *
     *
     * @param
     * @return
     */
    public function store(Request $request)
    {
//        $this->validate($request, [
//            'name' => 'required|unique:roles_trans'
//        ]);
        $store = $this->api->storeRole($request);

        if($store == "Duplicate Entry Present")
            return back();


        $store = $store->getData();

        if(isset($store->errors)){
            return back()->withInput()->withErrors($store->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $store->message);

        if($request->back){
            return back();
        }
        return redirect(action('\Uistacks\Roles\Controllers\RolesController@index'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function edit($id)
    {
        $item = Role::findOrFail($id);
        $trans = RoleTrans::where('role_id', $id)->get()->keyBy('lang')->toArray();
        $arr_role_permission = [];
        $user_permission = $item->hasPermission;
//        dd($user_permission);
        foreach ($user_permission as $key => $value) {
            $arr_role_permission[] = $user_permission{$key}->getPermission->id;
        }
        $permissions = Permission::where('active','1')->orderBy('id','ASC')->get();
        return view('Roles::roles.create-edit', compact('item', 'trans','permissions','arr_role_permission'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function update(Request $request, $id)
    {
        $update = $this->api->updateRole($request, $id);
        if ($update == "Duplicate Entry Present") {
            return back();
        }
        $update = $update->getData();

        if(isset($update->errors)){
            return back()->withInput()->withErrors($update->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $update->message);

        if($request->back){
            return back();
        }
        return redirect(action('\Uistacks\Roles\Controllers\RolesController@index'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function confirmDelete($id)
    {
        $item = Role::findOrFail($id);
        return view('Roles::roles.confirm-delete', compact('item'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function bulkOperations(Request $request)
    {
        if($request->ids){
            $items = Role::whereIn('id', $request->ids)->get();
            if($items->count()){
                foreach ($items as $item) {
                    // Do something with your model by filter operation
                    if($request->operation && $request->operation === 'activate'){
                        $item->active = true;
                        $item->save();
                        \Session::flash('message', trans('Core::operations.activated_successfully'));
                    }elseif($request->operation && $request->operation === 'deactivate'){
                        $item->active = false;
                        $item->save();
                        \Session::flash('message', trans('Core::operations.deactivated_successfully'));
                    }

                }
            }

            \Session::flash('alert-class', 'alert-success');

        }else{
            \Session::flash('alert-class', 'alert-warning');
            \Session::flash('message', trans('Core::operations.nothing_selected'));
        }
        return back();
    }
}