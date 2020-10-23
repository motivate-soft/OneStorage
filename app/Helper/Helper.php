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
    public static $SS_FROM_FAQ_PAGE = "FAQ";
    public static $STORE_ORDER_OPTIONS = [
        [
            'name' => 'Order By Id (ascending)',
            'value' => 'stores._id ASC'
        ],
        [
            'name' => 'Order By Id (descending)',
            'value' => 'stores._id DESC'
        ],
        [
            'name' => 'Order By Name (ascending)',
            'value' => 'stores.name ASC'
        ],
        [
            'name' => 'Order By Name (descending)',
            'value' => 'stores.name DESC'
        ],
        [
            'name' => 'Order By Price (ascending)',
            'value' => 'price ASC'
        ],
        [
            'name' => 'Order By Price (descending)',
            'value' => 'price DESC'
        ],
        [
            'name' => 'Order By Date (ascending)',
            'value' => 'stores.created_at ASC'
        ],
        [
            'name' => 'Order By Date (descending)',
            'value' => 'stores.created_at DESC'
        ]
    ];

    public static $STORAGE_FACILITIES = [
        [
            'image'   => 'images/ic_key_card.png',
            'title'   => '7 x 24智能保安進出系統'
        ],
        [
            'image'   => 'images/ic_air_con.png',
            'title'   => '無間斷恆溫空調'
        ],
        [
            'image'   => 'images/ic_fire.png',
            'title'   => '消防裝置設備'
        ],
        [
            'image'   => 'images/ic_delivery.png',
            'title'   => '鋁梯及手推車借用服務'
        ],
        [
            'image'   => 'images/ic_water.png',
            'title'   => '自助飲用水機'
        ],
        [
            'image'   => 'images/ic_sec_cam.png',
            'title'   => '全天候高清保安監察及警報系統'
        ],
        [
            'image'   => 'images/ic_24_hours.png',
            'title'   => '24小時電話熱線服務'
        ],
        [
            'image'   => 'images/ic_wifi.png',
            'title'   => '免費Wi-Fi'
        ],
    ];

    public static function getRandomString($length = 10)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);;
    }
}
