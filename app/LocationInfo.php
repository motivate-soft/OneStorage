<?php

namespace App;

class LocationInfo
{

    private static $HK_LOCATIONS_CH = [
        [
            'name' => '小西灣',
            'items' => [
                [
                    'phone'   => '2111 1062',
                    'address' => '柴灣新業街5號王子工業大廈4樓'
                ],
                [
                    'phone'   => '2116 0071',
                    'address' => '柴灣新業街11號森龍工業大廈7樓B室'
                ]
            ]
        ],
        [
            'name' => '柴灣',
            'items' => [
                [
                    'phone'   => '2194 0038',
                    'address' => '柴灣祥利街7號萬峰工業大廈6樓C室'
                ],
                [
                    'phone'   => '2116 0460',
                    'address' => '柴灣利眾街20號柴灣中心工業大廈14樓B1室'
                ]
            ]
        ],
         [
             'name' => '黃竹坑',
             'items' => [
                 [
                     'phone'   => '2680 9691',
                     'address' => '黃竹坑道18號瑞琪工業大廈14樓A室'
                 ]
             ]
         ],
    ];

    private static $KOWLOON_LOCATIONS_CH = [
        [
            'name' => '新蒲崗',
            'items' => [
                [
                    'phone'   => '2111 0509',
                    'address' => '新蒲崗景福街114號捷景工業大廈9樓B室'
                ],
                [
                    'phone'   => '2111 2739',
                    'address' => '新蒲崗五芳街8號利嘉工業大廈9樓CD室'
                ]
            ]
        ]
    ];

    private static $NEW_LOCATIONS_CH = [
        [
            'name' => '葵涌',
            'items' => [
                [
                    'phone'   => '2111 2683',
                    'address' => '葵涌昌榮路9-11號同珍工業大廈1期A座2-3樓'
                ],
                [
                    'phone'   => '2111 0389',
                    'address' => '葵涌打磚坪街16號有利工業貨倉大廈2樓D室'
                ],
                // [
                //     'phone'   => '2111 1629',
                //     'address' => '昌榮路9-11號同珍工業大廈1期A座3樓'
                // ]
            ]
        ],
        [
            'name' => '青衣',
            'items' => [
                [
                    'phone'   => '2111 1063',
                    'address' => '青衣長達路1-33號青衣工業中心2期D座5&7樓'
                ],
                // [
                //     'phone'   => '2111 1063',
                //     'address' => '長達路1-33號青衣工業中心2期D座7樓'
                // ]
            ]
        ],
        [
            'name' => '葵興',
            'items' => [
                [
                    'phone'   => '2111 1629',
                    'address' => '葵興葵昌路9-15號貴豐工業大廈8樓B室'
                ]
            ]
        ],
        [
            'name' => '火炭',
            'items' => [
                [
                    'phone'   => '2111 3536',
                    'address' => '火炭黃竹洋街5-7號富昌中心6樓E, H-J 室'
                ],
                [
                    'phone'   => '2111 3525',
                    'address' => '火炭禾香街1-7號華威工業大廈3樓C室'
                ],
                [
                    'phone'   => '2116 8955',
                    'address' => '火炭山尾街19至25號宇宙工業中心3樓AB室'
                ],
                // [
                //     'phone'   => 'TBC',
                //     'address' => '山尾街19至25號宇宙工業中心3樓AB室'
                // ]
            ]
        ],
        [
            'name' => '葵芳',
            'items' => [
                [
                    'phone'   => '2111 4528',
                    'address' => '葵芳葵定路1-11號美適工業大廈3樓B室'
                ]
            ]
        ],
        [
            'name' => '屯門',
            'items' => [
                [
                    'phone'   => '2374 2022',
                    'address' => '屯門新益里3號通明工業大廈1,4及5樓'
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
            'name' => '荃灣',
            'items' => [
                [
                    'phone'   => '2111 2663',
                    'address' => '荃灣德士古道216-218號京華工業貨倉大廈2期14樓'
                ],
                [
                    'phone'   => '2116 9327',
                    'address' => '荃灣馬角街2-6號華興工業大廈7樓B室'
                ]
            ]
        ]
    ];

    /**
     * @return array
     */
    public static function getAllCH(){
        return array_merge(static::$HK_LOCATIONS_CH, static::$KOWLOON_LOCATIONS_CH, static::$NEW_LOCATIONS_CH);
    }

    /**
     * @return array
     */
    public static function getHongKongCH(){

        return static::$HK_LOCATIONS_CH;
    }

    /**
     * @return array
     */
    public static function getKowloonCH(){
        return static::$KOWLOON_LOCATIONS_CH;
    }

    /**
     * @return array
     */
    public static function getNewCH(){
        return static::$NEW_LOCATIONS_CH;
    }

    private static $HK_LOCATIONS_EN = [
        [
            'name' => 'Siu Sai Wan',
            'items' => [
                [
                    'phone'   => '2111 1062',
                    'address' => '4/F, Price Factory Building, No.5 Sun Yip Street, Chai Wan, Hong Kong'
                ],
                [
                    'phone'   => '2116 0071',
                    'address' => '7/F B Sum Lung Industrial Building No. 11 Sun Yip  Str, Siu Sai Wan, Chai Wan, Hong Kong'
                ]
            ]
        ],
        [
            'name' => 'Chai wan',
            'items' => [
                [
                    'phone'   => '2194 0038',
                    'address' => 'Unit 6C Man Foong Industrial Building, 7 Cheung Lee Street, Chai Wan, Hong Kong'
                ],
                [
                    'phone'   => '2116 0460',
                    'address' => 'Flat B1, 14/F, Chai Wan Industrial Centre, 20 Lee Chung Street, Chai Wan, Hong Kong'
                ]
            ]
        ],
        [
            'name' => 'Wong Chuk Hang',
            'items' => [
                [
                    'phone'   => '2680 9691',
                    'address' => 'Unit A 14/F, Shui Ki Industrial Building, 18 Wong Chuk Hang Road, Wong Chuk Hang, Hong Kong'
                ]
            ]
        ],
    ];

    private static $KOWLOON_LOCATIONS_EN = [
        [
            'name' => 'San Po Kong',
            'items' => [
                [
                    'phone'   => '2111 0509',
                    'address' => 'Unit B, 9/F, Chiap King Industrial Building No.114 King Fuk Street San Po Kong, Kowloon'
                ],
                [
                    'phone'   => '2111 2739',
                    'address' => 'Unit C, D on 9/F Lee Ka Industrial Building, 8 Ng Fong Street, San Po Kong, Kowloon'
                ]
            ]
        ]
    ];

    private static $NEW_LOCATIONS_EN = [
        [
            'name' => 'Kwai Chung',
            'items' => [
                [
                    'phone'   => '2111 2683',
                    'address' => 'Flat A, 2/F & 3/F, Block A, Tung Chun Industrial Building, 9-11 Cheung Wing Road, Kwai Chung, New Territories'
                ],
                [
                    'phone'   => '2111 0389',
                    'address' => 'Flat D, 2/F, Mercantile Industrial And Warehouse, 16 Ta Chuen Ping Street, Kwai Chung, New Territories'
                ],
                // [
                //     'phone'   => '2111 1629',
                //     'address' => '3rd Floor, Block A, Phase 1, Tongzhen Industrial Building, 9-11 Changrong Road'
                // ]
            ]
        ],
        [
            'name' => 'Tsing Yi',
            'items' => [
                [
                    'phone'   => '2111 1063',
                    'address' => 'Unit 2-14, 5 & 7 /F Block D, Tsing Yi Industrial Centre, Phase 2, 1-33, Cheung Tat Road, Tsing Yi'
                ],
                // [
                //     'phone'   => '2111 1063',
                //     'address' => '7th Floor, Block D, Phase 2, Tsing Yi Industrial Centre, 1-33 Cheung Tat Road'
                // ]
            ]
        ],
        [
            'name' => 'Kwai Hing',
            'items' => [
                [
                    'phone'   => '2111 1629',
                    'address' => 'Unit B, 8/F, Kwai Fong Industrial Building No.9-15 Kwai Cheong Road, Kwai Chung, New Territories'
                ]
            ]
        ],
        [
            'name' => 'Fo Tan',
            'items' => [
                [
                    'phone'   => '2111 3536',
                    'address' => 'Unit H-J, 6/F, Fu Cheung Centre, 5-7 Wong Chuk Yeung Street, Fo Tan, New Territories'
                ],
                [
                    'phone'   => '2111 3525',
                    'address' => 'Factory C, 3/F Wah Wai Industrial Building, 1-7 Wo Heung Street, Fo Tan, New Territories'
                ],
                [
                    'phone'   => '2116 8955',
                    'address' => 'Workshop A&B on 3/F, Universal Industrial Centre, 19- 25 Shan Mei street, Shatin, New Territories'
                ],
                // [
                //     'phone'   => 'TBC',
                //     'address' => 'Room AB, 3rd Floor, Universe Industrial Center, 19-25 Shanwei Street'
                // ]
            ]
        ],
        [
            'name' => 'Kwai Fong',
            'items' => [
                [
                    'phone'   => '2111 4528',
                    'address' => 'Unit B, 3/F, Mai Sik Industrial Building No.11 Kwai Ting Road, Kwai Chung, New Territories'
                ]
            ]
        ],
        [
            'name' => 'Tuen Mun',
            'items' => [
                [
                    'phone'   => '2374 2022',
                    'address' => '1/F, 4/F & 5/F, Tung Ming Industrial Building, 3 San Yick Lane, Tuen Mun, New Territories'
                ],
                // [
                //     'phone'   => '2374 2022',
                //     'address' => '4th Floor, Tongming Industrial Building, No. 3 Xinyi Lane'
                // ],
                // [
                //     'phone'   => '2374 2022',
                //     'address' => '1st Floor, Tongming Industrial Building, No. 3, Xinyi Lane'
                // ]
            ]
        ],
        [
            'name' => 'Tsuen Wan',
            'items' => [
                [
                    'phone'   => '2111 2663',
                    'address' => '14/F Metropolitan Industrial & Warehouse Building No.2, 216-218 Texaco Road, Tsuen Wan, New Territories'
                ],
                [
                    'phone'   => '2116 9327',
                    'address' => 'Unit B, 7/F Wa Hing Building, 2-6 Ma Kok Street, Tsuen Wan, New Territories'
                ]
            ]
        ]
    ];

    /**
     * @return array
     */
    public static function getAllEN(){
        return array_merge(static::$HK_LOCATIONS_EN, static::$KOWLOON_LOCATIONS_EN, static::$NEW_LOCATIONS_EN);
    }

    /**
     * @return array
     */
    public static function getHongKongEN(){

        return static::$HK_LOCATIONS_EN;
    }

    /**
     * @return array
     */
    public static function getKowloonEN(){
        return static::$KOWLOON_LOCATIONS_EN;
    }

    /**
     * @return array
     */
    public static function getNewEN(){
        return static::$NEW_LOCATIONS_EN;
    }
}
