<?php

namespace App\Helpers;

class GeneralHelper
{
    public static function greetingMsg()
    {
        /* This sets the $time variable to the current hour in the 24 hour clock format */
        $time = date("H");
        /* Set the $timezone variable to become the current timezone */
        $timezone = date("e");

        if($time < "12"){
            return "Good morning";
        }
        elseif ($time >= "12" && $time < "17") {
            return "Good afternoon";
        }
        elseif($time >= "17" && $time < "19"){
            return "Good evening";
        }
        /* Finally, show good night if the time is greater than or equal to 1900 hours */
        if ($time >= "19") {
            return "Good night";
        }


    }

}

?>