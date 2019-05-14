<?php 
namespace Uistacks\Core\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
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
    public function index()
    {
        return view('Core::dashboard.index');
    }
}