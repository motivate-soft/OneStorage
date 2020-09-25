<?php

use App\AppConfig;
use App\Background;
use App\Store;
use App\StoreQuestion;
use App\User;
use App\StoreSize;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //add admin user
        User::truncate();
        $admin = new User;
        $admin->first_name = "Tom";
        $admin->last_name = "Tom";
        $admin->phone = "51188503";
        $admin->email = "cs@onestorage.com.hk";
        $admin->password = bcrypt("admin");
        $admin->role = "admin";
        $admin->save();

        for ($i = 0; $i < 10; $i++) {
            $admin = new User;
            $admin->first_name = "user" . ($i + 1);
            $admin->last_name = "";
            $admin->phone = "51188503" . $i;
            $admin->email = "cs" . ($i + 1) . "@onestorage.com.hk";
            $admin->password = bcrypt("admin");
            $admin->role = "admin";
            $admin->save();
        }


        //set background
        Background::truncate();
        $background = new Background;
        $background->image = "background.jpg";
        $background->save();

        //set app config
        AppConfig::truncate();
        $appConfig = new AppConfig;
        $appConfig->background = "/images/backgrounds/background.jpg";
        $appConfig->save();

        StoreSize::truncate();
        StoreQuestion::truncate();
        Store::truncate();

        $stores = [
            [
                'location'  =>  '香港島',
                'branch'    =>  'CW1(王子)',
                'address'   =>  '柴灣新業街5號王子工業大廈4樓',
                'sizes'     =>  [
                    [12, 2.8, 4.3, 6.6, 1138, 797],
                    [16, 4, 4, 6.6, 1411, 988],
                    [26, 5.4, 4.11, 6.6, 1801, 1261],
                    [30, 7.1, 3.11, 6.6, 1985, 1390]
                ]
            ],
            [
                'location'  =>  '香港島',
                'branch'    =>  'CW2(柴工)',
                'address'   =>  '柴灣利眾街20號柴灣中心工業大廈14樓B1室',
                'sizes'     =>  [
                    [12, 3.11, 3, 3.4, 680, 476],
                    [14, 4.2, 3.3, 6.8, 1339, 937],
                    [27, 5.3, 5, 6.8, 1981, 1387],
                    [44, 9.6, 4.6, 6.8, 2720, 1904]
                ]
            ],
            [
                'location'  =>  '香港島',
                'branch'    =>  'CW3(萬峰)',
                'address'   =>  '柴灣祥利街7號萬峰工業大廈6樓C室',
                'sizes'     =>  [
                    [11, 3.2, 3.5, 3.4, 623, 436],
                    [17, 4.7, 3.6, 3.4, 935, 655],
                    [26, 4.2, 6.2, 6.8, 1927, 1349],
                    [43, 4.1, 8.11, 6.8, 2666, 1866]
                ]
            ],
            [
                'location'  =>  '香港島',
                'branch'    =>  'WCH1(瑞琪)',
                'address'   =>  '黃竹坑道18號瑞琪工業大廈14樓A室',
                'sizes'     =>  [
                    [14, 3, 4.5, 3.4, 624, 437],
                    [23, 4.1, 4.6, 6.7, 2024, 1417],
                    [25, 5, 5, 6.7, 2200, 1540],
                    [53, 11.1, 4.7, 6.7, 4240, 2968],
                ]
            ],
            [
                'location'  =>  '九龍',
                'branch'    =>  'DH1(捷景)',
                'address'   =>  '九龍新蒲崗景福街114號捷景工業大廈9樓B室',
                'sizes'     =>  [
                    [13, 3.4, 3.9, 6.6, 1194, 836],
                    [17, 4.5, 3.7, 3.4, 879, 615],
                    [24, 5.8, 4.2, 6.6, 1693, 1185],
                    [45, 7.7, 5.9, 6.6, 2798, 1959]
                ]
            ],
            [
                'location'  =>  '九龍',
                'branch'    =>  'DH2(利嘉)',
                'address'   =>  '九龍新蒲崗五芳街8號利嘉工業大廈9樓CD室',
                'sizes'     =>  [
                    [11, 2.11, 3.7, 3.4, 589, 412],
                    [19, 3.8, 5.1, 6.8, 1466, 1026],
                    [25, 4.8, 5.2, 6.8, 1725, 1208],
                    [45, 9, 5, 6.8, 2745, 1922]
                ]
            ],
            [
                'location'  =>  '新界',
                'branch'    =>  'FT1(富昌)',
                'address'   =>  '新界火炭黃竹洋街5-7號富昌中心6樓H-J 室',
                'sizes'     =>  [
                    [15, 4.5, 3.6, 3.3, 766, 536],
                    [24, 5.11, 4.1, 7.1, 1541, 1079],
                    [34, 9.5, 3.7, 7.1, 2132, 1492],
                    [41, 7, 5.2, 7.1, 2505, 1754]
                ]
            ],
            [
                'location'  =>  '新界',
                'branch'    =>  'FT2(華威) ',
                'address'   =>  '新界火炭禾香街1-7號華威工業大廈3樓C室',
                'sizes'     =>  [
                    [11, 3.1, 2.11, 3.4, 589, 412],
                    [23, 6.9, 3.5, 6.6, 1501, 1051],
                    [30, 7.7, 3.11, 6.6, 1913, 1339],
                    [45, 9.4, 4.1, 6.6, 2715, 1901]
                ]
            ],
            [
                'location'  =>  '新界',
                'branch'    =>  'TM1(通明)',
                'address'   =>  '新界屯門新益里3號通明工業大廈5樓',
                'sizes'     =>  [
                    [7, 3.1, 2.11, 3.4, 589, 412],
                    [16, 3.4, 4.9, 6.6, 952, 666],
                    [29, 3.3, 8.9, 6.6, 1555, 1089],
                    [42, 6.9, 6.2, 6.6, 2011, 1408]
                ]
            ],
            [
                'location'  =>  '新界',
                'branch'    =>  'TM2(通明)',
                'address'   =>  '新界屯門新益里3號通明工業大廈4樓',
                'sizes'     =>  [
                    [13, 3.11, 3.4, 3.3, 501, 351],
                    [25, 6.6, 3.11, 6.6, 1375, 963],
                    [31, 8.1, 3.1, 3.3, 933, 653],
                    [40, 8.6, 4.9, 6.6, 1945, 1362]
                ]
            ],
            [
                'location'  =>  '新界',
                'branch'    =>  'KC1(同珍)',
                'address'   =>  '葵涌昌榮路9-11號同珍工業大廈1期A座2樓',
                'sizes'     =>  [
                    [10, 2.2, 4.6, 6.6, 745, 522],
                    [18, 4.6, 4.1, 6.6, 1152, 806],
                    [26, 5.8, 4.7, 6.6, 1463, 1024],
                    [36, 9.9, 3.8, 6.6, 1885, 1320]
                ]
            ],
            [
                'location'  =>  '新界',
                'branch'    =>  'KC2(有利)',
                'address'   =>  '葵涌打磚坪街16號有利工業貨倉大廈2樓D室',
                'sizes'     =>  [
                    [14, 4.1, 3.4, 6.6, 939, 657],
                    [18, 4.3, 3.9, 6.6, 1152, 806],
                    [26, 6.1, 3.8, 6.6, 1463, 1024],
                    [41, 8.9, 4.6, 6.6, 2059, 1441]
                ]
            ],
            [
                'location'  =>  '新界',
                'branch'    =>  'KC3(同珍)',
                'address'   =>  '葵涌昌榮路9-11號同珍工業大廈1期A座3樓',
                'sizes'     =>  [
                    [15, 5, 3, 6.6, 995, 697],
                    [20, 3.5, 5.9, 6.6, 1219, 853],
                    [37, 5, 7.5, 6.6, 1913, 1339],
                    [54, 9, 6, 6.6, 2440, 1708]
                ]
            ],
            [
                'location'  =>  '新界',
                'branch'    =>  'KC4(貴豐)',
                'address'   =>  '新界葵興葵昌路9-15號貴豐工業大廈8樓B室',
                'sizes'     =>  [
                    [9, 3.2, 2.1, 6.6, 711, 498],
                    [12, 4, 3, 3.3, 535, 375],
                    [29, 7.8, 3.1, 6.6, 1628, 1140],
                    [35, 10.1, 3.6, 6.6, 1840, 1288]
                ]
            ],
            [
                'location'  =>  '新界',
                'branch'    =>  'KC5(美適)',
                'address'   =>  '新界葵芳葵定路1-11號美適工業大廈3樓B室',
                'sizes'     =>  [
                    [12, 3.2, 3.8, 6.6, 863, 604],
                    [25, 4.4, 5.9, 6.6, 1468, 1028],
                    [42, 5.7, 7.7, 6.6, 2110, 1477],
                    [50, 6.1, 7.6, 6.6, 2339, 1637]
                ]
            ],
            [
                'location'  =>  '新界',
                'branch'    =>  'TW1(京華)',
                'address'   =>  '荃灣德士古道216-218號京華工業貨倉大廈2期14樓',
                'sizes'     =>  [
                    [12, 3.5, 3.7, 6.6, 952, 666],
                    [28, 7.8, 3.6, 6.6, 1659, 1161],
                    [37, 8.4, 4.5, 6.6, 1929, 1350],
                    [44, 7.7, 5.3, 6.6, 2028, 1420]
                ]
            ],
            [
                'location'  =>  '新界',
                'branch'    =>  'TW2(華興)',
                'address'   =>  '荃灣馬角街2-6號華興工業大廈7樓B室',
                'sizes'     =>  [
                    [15, 4.5, 3.4, 3.9, 622, 435],
                    [19, 6.3, 3.1, 6.7, 1313, 919],
                    [27, 6.7, 4.1, 6.7, 1669, 1168],
                    [44, 6.5, 6.11, 6.7, 2720, 1904]
                ]
            ],
            [
                'location'  =>  '新界',
                'branch'    =>  'TY1(青衣)',
                'address'   =>  '青衣長達路1-33號青衣工業中心2期D座5樓',
                'sizes'     =>  [
                    [12, 2.3, 5.3, 6.6, 1030, 721],
                    [16, 4, 4, 6.6, 1187, 831],
                    [38, 7.8, 4.8, 6.6, 2038, 1427],
                    [50, 7.3, 6.8, 6.6, 2451, 1716]
                ]
            ],
            [
                'location'  =>  '新界',
                'branch'    =>  'TY2(青衣)',
                'address'   =>  '青衣長達路1-33號青衣工業中心2期D座7樓',
                'sizes'     =>  [
                    [13, 3.3, 4, 3.3, 711, 498],
                    [28, 5.7, 4.9, 6.6, 1700, 1190],
                    [33, 8.3, 4, 6.6, 1877, 1314],
                    [52, 8.2, 6.4, 6.6, 2528, 1770]
                ]
            ]
        ];
        foreach ($stores as $data) {
            $store = new Store;
            $store->location = $data['location'];
            $store->branch = $data['branch'];
            $store->address = $data['address'];
            $store->save();
            foreach ($data['sizes'] as $size_data) {
                $size = new StoreSize;
                $size->size = $size_data[0];
                $size->width = $size_data[1];
                $size->height = $size_data[2];
                $size->depth = $size_data[3];
                $size->price = $size_data[4];
                $size->prepaid_price = $size_data[5];
                $size->store_id = $store->id;
                $size->save();
            }
        }
    }
}
