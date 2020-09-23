<?php

namespace App;

class LocationInfo
{
    private static $HK_LOCATIONS = [
        [
            'name' => '小西灣',
            'items' => [
                [
                    'phone'   => '2111 1062',
                    'address' => '新業街5號王子工業大廈4樓'
                ],
                [
                    'phone'   => '2116 0071',
                    'address' => '新業街11號森龍工業大廈7樓B室'
                ]
            ]
        ],
        [
            'name' => '柴灣',
            'items' => [
                [
                    'phone'   => '2194 0038',
                    'address' => '祥利街7號萬峰工業大廈6樓C室'
                ],
                [
                    'phone'   => '2116 0460',
                    'address' => '利眾街20號柴灣中心工業大廈14樓B1室'
                ]
            ]
        ],
        // [
        //     'name' => '黃竹坑',
        //     'items' => [
        //         [
        //             'phone'   => '2680 9691',
        //             'address' => '黃竹坑道18號瑞琪工業大廈14樓A室'
        //         ]
        //     ]
        // ],
    ];

    private static $KOWLOON_LOCATIONS = [
        [
            'name' => '新蒲崗',
            'items' => [
                [
                    'phone'   => '2111 0509',
                    'address' => '景福街114號捷景工業大廈9樓B室'
                ],
                [
                    'phone'   => '2111 2739',
                    'address' => '五芳街8號利嘉工業大廈9樓CD室'
                ]
            ]
        ]
    ];

    private static $NEW_LOCATIONS = [
        [
            'name' => '火炭',
            'items' => [
                [
                    'phone'   => '2111 3536',
                    'address' => '黃竹洋街5-7號富昌中心6樓E, H-J 室'
                ],
                [
                    'phone'   => '2111 3525',
                    'address' => '禾香街1-7號華威工業大廈3樓C室'
                ],
                [
                    'phone'   => 'TBC',
                    'address' => '山尾街19至25號宇宙工業中心3樓AB室'
                ],
                // [
                //     'phone'   => 'TBC',
                //     'address' => '山尾街19至25號宇宙工業中心3樓AB室'
                // ]
            ]
        ],
        [
            'name' => '屯門',
            'items' => [
                [
                    'phone'   => '2374 2022',
                    'address' => '新益里3號通明工業大廈1,4及5樓'
                ],
                // [
                //     'phone'   => '2374 2022',
                //     'address' => '新益里3號通明工業大廈4樓'
                // ],
                // [
                //     'phone'   => '2374 2022',
                //     'address' => '新益里3號通明工業大廈1樓'
                // ]
            ]
        ],
        [
            'name' => '葵涌',
            'items' => [
                [
                    'phone'   => '2111 2683',
                    'address' => '昌榮路9-11號同珍工業大廈1期A座2樓及3樓'
                ],
                [
                    'phone'   => '2111 0389',
                    'address' => '打磚坪街16號有利工業貨倉大廈2樓D室'
                ],
                // [
                //     'phone'   => '2111 1629',
                //     'address' => '昌榮路9-11號同珍工業大廈1期A座3樓'
                // ]
            ]
        ],
        [
            'name' => '葵興',
            'items' => [
                [
                    'phone'   => '2111 4528',
                    'address' => '葵昌路9-15號貴豐工業大廈8樓B室'
                ]
            ]
        ],
        [
            'name' => '葵芳',
            'items' => [
                [
                    'phone'   => '2111 4528',
                    'address' => '葵定路1-11號美適工業大廈3樓B室'
                ]
            ]
        ],
        [
            'name' => '荃灣',
            'items' => [
                [
                    'phone'   => '2111 2663',
                    'address' => '德士古道216-218號京華工業貨倉大廈2期14樓'
                ],
                [
                    'phone'   => '2116 9327',
                    'address' => '馬角街2-6號華興工業大廈7樓B室'
                ]
            ]
        ],
        [
            'name' => '青衣',
            'items' => [
                [
                    'phone'   => '2111 1063',
                    'address' => '長達路1-33號青衣工業中心2期D座5樓及7樓'
                ],
                // [
                //     'phone'   => '2111 1063',
                //     'address' => '長達路1-33號青衣工業中心2期D座7樓'
                // ]
            ]
        ]
    ];
    public static function getAll()
    {
        return array_merge(static::$HK_LOCATIONS, static::$KOWLOON_LOCATIONS, static::$NEW_LOCATIONS);
    }

    public static function getHongKong()
    {
        return static::$HK_LOCATIONS;
    }

    public static function getKowloon()
    {
        return static::$KOWLOON_LOCATIONS;
    }

    public static function getNew()
    {
        return static::$NEW_LOCATIONS;
    }
}
