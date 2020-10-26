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

    public static $FAQ_DATA = [
        [
            'category' => '聯絡我們',
            'faqs' => [
                [
                    'question' => '1. 我可以怎樣聯絡到至尊迷你倉?',
                    'answer' => '電話：(852) 2111 2636/電郵：cs@onestorage.com.hk或WhatsApp：(852) 54907251'
                ],
                [
                    'question' => '2. 分店的參觀及繳費時間?',
                    'answer' => '敬請致電分店預約：星期一至五：上午10:00至下午7:00/星期六日及公眾假期：上午10:00至下午5:00'
                ],
                [
                    'question' => '3. 在辨公時間以外，可以聯絡到你們嗎?',
                    'answer' => '在辦公時間以外，請致電2111 2636查詢熱線。'
                ],
            ]
        ],
        [
            'category' => '尺寸選擇',
            'faqs' => [
                [
                    'question' => '1. 我該選用多大的迷你倉?',
                    'answer' => '您可以自行使用空間計算器計算所需倉庫尺寸或聯絡我們的客戶服務專員為您推薦合適的方案。'
                ],
                [
                    'question' => '2. 有什麼迷你倉尺寸可供選擇?',
                    'answer' => '各分店有多種不同尺寸迷你倉以供選擇，歡迎致電熱線21112636查詢。'
                ]
            ]
        ],
        [
            'category' => '實地參觀',
            'faqs' => [
                [
                    'question' => '1. 可以在租迷你倉之前參觀嗎？',
                    'answer' => '我們歡迎客人在租倉前先親臨分店實地參觀，了解分店實際情況。'
                ],
                [
                    'question' => '2. 參觀迷你倉需要預約嗎？',
                    'answer' => '請在親臨各分店參觀前，請先致電2111 2636或直接聯絡各分店預約，如希望在星期六、日或公眾假期參觀，請於至少一個工作天前預約。'
                ]
            ]
        ],
        [
            'category' => '環境設施',
            'faqs' => [
                [
                    'question' => '1. 倉庫內的環境溫濕度情況怎樣？',
                    'answer' => '各分店配置了可靠的恆溫空調系統，24小時運作。'
                ],
                [
                    'question' => '2. 至尊迷你倉內的消防設備怎樣？',
                    'answer' => '完全符合消防處消防指引。'
                ],
                [
                    'question' => '3. 迷你倉內的安保情況怎樣？',
                    'answer' => '設有7 x 24小時智能保安進出系統、全天候高清保安監察及警報系統。'
                ],
            ]
        ],
        [
            'category' => '租倉合約',
            'faqs' => [
                [
                    'question' => '1. 租迷你倉需要付按金嗎？',
                    'answer' => '合約期1-2個月：按金為2個月的原價租金，3個月或以上合約期：按金為1個月原價租金。按金將於合約結束遷出後的30天內退回。'
                ],
                [
                    'question' => '2. 如何繳付租金？',
                    'answer' => '客人可選擇以下方式付款：EPS、支票、信用卡\'轉數快或免息分期。'
                ],
                [
                    'question' => '3. 公司需要發票才能繳費，請問能否每月給我發票?',
                    'answer' => '每月繳費的客戶，我們將以電郵或者Whatsapp形式發送每月提供收費發票，但如果您是預繳計劃的客戶，本公司則不會提供每月發票。'
                ],
            ]
        ],
        [
            'category' => '入倉與存取',
            'faqs' => [
                [
                    'question' => '1. 租用迷你倉後，如何入倉或存取？',
                    'answer' => '客戶可利用智能卡隨時輕鬆進出迷你倉提存物件。'
                ],
                [
                    'question' => '2. 迷你倉可以隨時提存物品嗎?',
                    'answer' => '可以，客戶可利用智能卡，24小時自助提存，隨時輕鬆進出迷你倉。'
                ],
                [
                    'question' => '3. 有什麼東西不可以存放?',
                    'answer' => '客戶不能存放任何受法律管制儲存的有害或危險品，包括具爆炸性或易燃性的物品，幅射或化學品，非法物品或腐蝕性物品，食物或任何易變壞的物品，否則一切責任由客戶負責，本公司有權即時終止該合約及追討賠償，按金亦不會退還。'
                ],
            ]
        ],
        [
            'category' => '退倉及續約',
            'faqs' => [
                [
                    'question' => '1. 合約未到期，要提前結束合約怎麼辦？需要支付違約金嗎？',
                    'answer' => '若需提前終止合約，您已繳交的費用將不獲退還。'
                ],
                [
                    'question' => '2. 在約滿後,想繼續使用,請問需要重新簽合約嗎?',
                    'answer' => '需要，合約到期前30日，分店職員將會聯絡客人，安排有關的續約事宜，並會重新簽訂合約。'
                ],
                [
                    'question' => '3. 合約到期，如何辦理退倉手續？',
                    'answer' => '客人只要提前14日以電郵、電話或書面通知（客戶服務主任會以電郵形式確認退倉申請）。退倉當日備妥文件並審視倉庫狀況，按金將在退倉後的30天內退還。'
                ],
            ]
        ]
    ];

    public static function getRandomString($length = 10)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);;
    }
}
