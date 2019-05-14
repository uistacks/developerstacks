<?php
namespace Uistacks\Settings\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Uistacks\Settings\Models\Setting;

class SettingsApiController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Uistacks Products API Controller
    |--------------------------------------------------------------------------
    |
    */


    /**
     * Return Main Information
     *
     * @param
     * @return
     */
    public function bankInformation(Request $request)
    {
        $bankName = Setting::find(27)->value;
        $accountNumber = Setting::find(28)->value;
        $ownerName = Setting::find(29)->value;
        $result = [
            'status' => '1',
            'data' => [
                'bank_name' => $bankName,
                'bank_account_number' => $accountNumber,
                'bank_account_owner_name' => $ownerName]
        ];
        return $result;
    }

    /**
     * Return Main Information
     *
     * @param
     * @return
     */
    public function mainInformation(Request $request)
    {
        $address = Setting::find(2)->value;
        $email = Setting::find(3)->value;
        $phone = Setting::find(4)->value;
        $bankName = Setting::find(27)->value;
        $accountNumber = Setting::find(28)->value;
        $ownerName = Setting::find(29)->value;
        $phones = array();
        if($phone != ""){
            $phones = explode(',', $phone);
        }
        $result = [
            'status' => '1',
            'data' => [
                'address' => $address,
                'email' => $email,
                'phone' => $phones,
                'bank_name' => $bankName,
                'bank_account_number' => $accountNumber,
                'bank_account_owner_name' => $ownerName
            ]
        ];
        return $result;
    }
}