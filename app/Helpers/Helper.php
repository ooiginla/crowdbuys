<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

class Helper
{
    public static function shout(string $string)
    {
        return strtoupper($string);
    }

    public static function getCategories($id=null) 
    {
        $categories = [
            'animals' => 'Animals',
            'art' => 'Art Design',
            'automobiles' => 'Automobiles & Bikes',
            'beting' => 'Betting',
            'blogs' => 'Blogs',
            'books' => 'Books Magazine',
            'business' => 'Business Startups',
            'celebrities' => 'Celebrities',
            'communication' => 'Communication', 
            'cryptocurrencies' => 'Cryptocurrencies', 
            'finance' => 'Economics & Finance',
            'education' => 'Education',
            'entertainment' => 'Entertainment',
            'fashion' => 'Fashion Beauty', 
            'food' => 'Food',
            'games' => 'Games Apps', 
            'health' => 'Health',
            'housing' => 'Housing & Accommodation',
            'languages' => 'Languages',
            'romance' => 'Love and Romance',
            'movies' => ' Movies & Videos',
            'music' => 'Music',
            'news' => 'News Media', 
            'others' => 'Other',
            'photography' => 'Photography', 
            'science' => 'Science',
            'self' => 'Self Development',  
            'shop' => 'Shop',
            'sports' => 'Sports Fitness',
            'programming' => 'Software Development',
            'technology' => 'Technology',
            'travel' => 'Travel',
            'utilities' => 'Utilities Tools', 
        ];

        if(empty($id)){
            return $categories;
        }else{
            if(array_key_exists($id, $categories)){
                return $categories[$id];
            }else{
                return "";
            }
        }
    }

    public static function get_words($sentence, $count = 10) {
        preg_match("/(?:\w+(?:\W+|$)){0,$count}/", $sentence, $matches);
        return $matches[0];
    }

    public static function nf($amount)
    {
        return number_format($amount,0,'.',',');
    }

    public static function gc($id){

        $categories = [
            1 => "£",
            2 => "₦"
        ];

        if(empty($id)){
            return $categories;
        }else{
            if(array_key_exists($id, $categories)){
                return $categories[$id];
            }else{
                return "";
            }
        }
    }

    public static function ago($datetime, $full = false) 
    {
        $now = new \DateTime;
        $ago = new \DateTime($datetime);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );

        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

    public static function getresource($id=null){

        $categories = [
            1 => "Credentials",
            2 => "Text",
            3 => "Photo Image",
            4 => "Document",
            5 => "Audio",
            6 => "Video",
            7 => "Whatsapp Group",
            8 => "Telegram Group"
        ];

        if(empty($id)){
            return $categories;
        }else{
            if(array_key_exists($id, $categories)){
                return $categories[$id];
            }else{
                return "";
            }
        }
    }

    public static function fetchPaystackCurrency($currency=null) 
    {
        $categories = ['NGN' => 1, 'USD' =>  2];

        if(empty($currency)){
            return $categories;
        }else{
            if(array_key_exists($currency, $categories)){
                return $categories[$currency];
            }else{
                return "";
            }
        }
    }

    public static function getCountries($country=null)
    {
        $countries = Country::pluck('name', 'id');

        if(empty($countries)){
            return $countries;
        }else{
            if(array_key_exists($country, $countries)){
                return $countries[$country];
            }else{
                return "";
            }
        }
    }
}