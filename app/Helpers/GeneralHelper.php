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

    // Get SEO URL function here
    public static function seoUrl($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // trim
        $text = trim($text, '-');
        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);
        // lowercase
        $text = strtolower($text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }

    public static function generateReferenceNumber()
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x', mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0x0fff) | 0x4000, mt_rand(0, 0x3fff) | 0x8000, mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff));
    }

}

?>