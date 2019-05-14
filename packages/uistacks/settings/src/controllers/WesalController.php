<?php

namespace Uistacks\Settings\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WesalController extends Controller
{
    /*
    private $url;
    private $username;
    private $password;
    */
    private $settings;
    private $finalUrl;
    public $code;
    public $msg;
    
    function __construct($url, $username, $password, $sender)
    {
        $this->url = $url;
        $this->username = $username;
        $this->password = $password;
        $this->sender = $sender;
    }
    
    function auth()
    {
        $this->username = $this->username;
        $this->password = $this->password;
    }
    
    function sendSMS( $numbers , $msg )
    {
        $data = array(
            'username'  =>  $this->username,
            'password'  =>  $this->password,
            'message'   =>  $msg,
            'sender'    =>  $this->sender,
            'numbers'   =>  $numbers,
            'op'        =>  'sendsms'
        );
                    
        $this->finalUrl = $this->url.'?'.http_build_query($data);
        
        return $this->execute();
    }
    
    function getPoints()
    {
        $data = array(
            'username'  =>  $this->username,
            'password'  =>  $this->password,
            'op'        =>  'points'
        );
                    
        $this->finalUrl = $this->url.'?'.http_build_query($data);
        
        return $this->execute();
    }
    
    function addSender( $fullName , $description )
    {
        $data = array(
            'username'      =>  $this->username,
            'password'      =>  $this->password,
            'op'            =>  'addsender',
            'sendername'    =>  $settings->sender,
            'fullname'      =>  $fullName,
            'description'   =>  $description
        );
                    
        $this->finalUrl = $this->url.'?'.http_build_query($data);
        
        return $this->execute();
    }
    
    function execute()
    {
        /*
        $url = file( $this->finalUrl ); 
        $url = file_get_contents( $this->finalUrl );
        */
        $ch = curl_init($this->finalUrl); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $url = curl_exec($ch);
        curl_close($ch);
        $response = explode( '|' , $url );
        
//        dd($response);
        
        if( is_array($response ) ){
            $this->code = $response[0];
            $this->msg = $response[1];
            $status_message['code'] = $this->code;
            $status_message['msg']  = $this->msg;
            return $status_message;
        } else {
            return $this->url; 
        }
    }
}
