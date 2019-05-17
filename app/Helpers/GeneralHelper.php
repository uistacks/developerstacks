<?php

namespace App\Helpers;

class GeneralHelper
{
    public static function greetingMsg()
    {
        //Here we define out main variables
        $welcome_string="Welcome!";
        $numeric_date = date("G");
        //Start conditionals based on military time
        if ($numeric_date >= 0 && $numeric_date <= 12) {
            $welcome_string = "Good Morning!";
        }
        else if ($numeric_date >= 12 && $numeric_date <= 17) {
            $welcome_string = "Good Afternoon!";
        }
        else if ($numeric_date >= 18 && $numeric_date <= 20) {
            $welcome_string = "Good Evening!";
        }
        else {
            $welcome_string = "Good Night!";
        }
        //Display our greeting
        return "$welcome_string";

    }

}

?>