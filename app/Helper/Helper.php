<?php

namespace App\Helper;

class Helper
{

    public static $ONESTORAGE_EMAIL = "cs@onestorage.com.hk";

    public static $MESSAGE_TYPE_NORMAL = "For Support";
    public static $MESSAGE_TYPE_BYADMIN = "Created By Admin";
    public static $MESSAGE_TYPE_BROADCAST = "Broadcast";
    
    public static $SS_FROM_FRONT_PAGE1 = "Front Page(discount)";
    public static $SS_FROM_FRONT_PAGE2 = "Front Page";
    public static $SS_FROM_NEWS_PAGE = "News";
    public static $SS_FROM_CONTACTUS_PAGE = "Contact us";
    public static $SS_FROM_JOINUS_PAGE = "Join us";

    public static function getRandomString($length = 10)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);;
    }
}
