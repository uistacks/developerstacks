<?php

namespace Uistacks\Core\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OperationsController extends Controller
{

 	/*
    |--------------------------------------------------------------------------
    | Uistacks Products Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles Products for the application.
    |
    */

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function delete(Request $request)
    {
        \DB::table($request->table)->where('id', $request->id)->delete();

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', trans('Core::operations.deleted_successfully'));
        return back();
    }

    /**
     * 
     *
     * @param  
     * @return 
     */
    public function bulkDelete(Request $request)
    {
        
        \DB::table($request->table)->whereIn('id', $request->ids)->delete();

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', trans('Core::operations.deleted_successfully'));
        return back();
    }
}