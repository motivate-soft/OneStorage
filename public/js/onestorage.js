var OneStorage = {};

function numberFormat(num) {
    return Number(num).toString().replace(/\d(?=(\d{3})+)/g, '$&,');
}

$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '<?= csrf_token() ?>'
        }
    });

    $("#branch-select").change(function () {
        $("#storeId").val($(this).val());
    })

    $("#question-selector").val("");
    $("#question-selector").change(function () {
        const msgWrapper = $("#message-wrapper");
        if ($(this).val() == "其他") {
            msgWrapper.show();
            msgWrapper.find("textarea").val("我有興趣租倉，請與我聯絡");

        } else {
            msgWrapper.hide();
            msgWrapper.find("textarea").val("");
        }
    })

    OneStorage.Home = (function () {
        return function () {
            $(".home-problem-toggle-item").click(function () {
                $(this).next().toggle(500);
            })
            $("#location-select").change(function () {
                const location = $(this).val();
                if (location == "") {
                    return;
                }
                const branchSelect = $("#branch-select");
                branchSelect.prop('disabled', true);
                $.ajax({
                    url: '/branches?location=' + location,
                    type: 'GET',
                    datatype: 'json',
                    success: function (result) {
                        branchSelect.prop('disabled', false);
                        branchSelect.html('');
                        branchSelect.append('<option value="" selected disabled class="text-grey">分店</option>');
                        result.forEach(data => {
                            branchSelect.append('<option value="' + data.id + '" class="text-grey-2">' + data.branch + '</option>');
                        });
                    }
                });
            })
            const form = document.getElementById("branchSearchForm");
            if (form) {
                form.reset();
                $("#storeId").val('');
            }
        }
    })();

    OneStorage.BranchLocation = (function () {
        return function () {
            $("#slider-range").slider({
                range: true,
                min: 200,
                max: 2500,
                values: [200, 2500],
                slide: function (event, ui) {
                    $("#amount").html("$" + ui.values[0] + " ~ $" + ui.values[1]);
                }
            });

            $(".rentwarehouse-price-toggle-button").click(function () {
                $(this).next().toggle();

                if ($(this).next().css("display") == "none") {
                    $(this).find("i").removeClass("wb-triangle-up");
                    $(this).find("i").addClass("wb-triangle-down");
                } else {
                    $(this).find("i").removeClass("wb-triangle-down");
                    $(this).find("i").addClass("wb-triangle-up");
                }

            });

            $("#amount").html("$" + $("#slider-range").slider("values", 0) +
                " - $" + $("#slider-range").slider("values", 1));

            $("#location-select").change(function () {
                const location = $(this).val();
                if (location == "") {
                    return;
                }
                window.location.href = ('/branch-location?location=' + location);
            })

            $(".store-select").click(function () {
                const parent = $(this).parent().parent();
                if (parent.hasClass("active")) {
                    parent.removeClass("active");
                } else {
                    parent.addClass("active");
                }
            })

            $(".branchlocation-m-item").click(function () {
                $(".branchlocation-m-item").removeClass("active");
                $(this).addClass("active");
            })
        }
    })();

    OneStorage.RentwareHouse = (function () {
        return function () {
            var branchSize;
            var bookingModal = document.getElementById("bookingModal");

            $(".rentwarehouse-toggle-item").click(function () {
                $(this).next().toggle();

                if ($(this).next().css("display") == "none") {
                    $(this).find("i").removeClass("wb-chevron-down");
                    $(this).find("i").addClass("wb-chevron-up");
                } else {
                    $(this).find("i").removeClass("wb-chevron-up");
                    $(this).find("i").addClass("wb-chevron-down");
                }
            })

            $(".rentwarehouse-space-size-select").click(function () {
                $(".rentwarehouse-space-size-select").removeClass("active");
                $(this).addClass("active");
                $("#prepaid-price-wrapper").html(numberFormat($(this).attr('data-prepaid-price')));
                $("#price-wrapper").html(numberFormat($(this).attr('data-price')));
                $(".rentwarehouse-price-select:first").click();
                branchSize = Number($(this).attr('data-size'));
            })

            $(".rentwarehouse-price-select").click(function () {
                $(".rentwarehouse-price-select").removeClass("active");
                $(this).addClass("active");
                $(".selected-price").html($(this).find(".price-content").html());
                $("#payment-method").text($(this).find(".rentwarehouse-mode-select-item-title").text());
            })

            $(".rentwarehouse-table-item").click(function () {
                $("#rentwarehouse-size-preview").attr("src", "../images/size-" + $(this).find(".bg-yellow").html() + ".jpg");
            })

            $(".rentwarehouse-table-item").hover(function () {
                $("#rentwarehouse-size-preview").attr("src", "images/size-" + $(this).find(".bg-yellow").html() + ".jpg");
            })

            $(".rentwarehouse-sub-image").click(function () {
                $("#rentwarehouse-main-image").attr("src", $(this).attr("src"));
            })

            $("#modalTrigger").click(function () {
                $("#branchSize").val(branchSize);
                $("#branchSizeTxt").html(branchSize);
                bookingModal.style.display = "block"
            })

            $("#modalClose").click(function () {
                bookingModal.style.display = "none"
            });

            window.onclick = function (event) {
                if (event.target == bookingModal) {
                    bookingModal.style.display = "none"
                }
            }

            $(".rentwarehouse-space-size-select:first").click();
        }
    })();

    OneStorage.Calculator = (function () {
        const categories = [{
            name: '常用',
            items: [{
                name: '紅白藍5個',
                size: 4
            },
            {
                name: '紙箱10個',
                size: 6
            },
            ]
        },
        {
            name: '客廳用品',
            items: [{
                name: ' 組合櫃',
                size: 8
            },
            {
                name: '雙門鞋櫃',
                size: 6
            },
            {
                name: '小童檯',
                size: 6
            },
            {
                name: '吧檯',
                size: 8
            },
            {
                name: '高腳凳',
                size: 4
            },
            {
                name: '玻璃餐檯',
                size: 15
            },
            {
                name: '四人餐枱(可拆)',
                size: 8
            },
            {
                name: '茶几',
                size: 3
            },
            {
                name: '音響',
                size: 3
            },
            {
                name: '電暖爐',
                size: 3
            },
            {
                name: '風扇',
                size: 3
            },
            {
                name: '吸塵器',
                size: 3
            },
            {
                name: '抽濕機',
                size: 3
            },
            {
                name: '魚缸',
                size: 3
            },
            {
                name: '散熱器/<br/>陶瓷式暖風機',
                size: 3
            },

            {
                name: '工業用吸塵機',
                size: 3
            },
            ]
        },
        {
            name: '睡房用品',
            items: [{
                name: '衣櫃(一般雙門)',
                size: 8
            },
            {
                name: '梳妝台',
                size: 6
            },
            {
                name: '床頭櫃',
                size: 3
            },
            {
                name: '抽屜櫃(一般)',
                size: 4
            },
            {
                name: '抽屜櫃(大)',
                size: 8
            },
            {
                name: '雙人床',
                size: 6
            },
            {
                name: '上下格/碌架床',
                size: 12
            },
            {
                name: '子母床(可拆)',
                size: 5
            },
            {
                name: '摺床(可摺)',
                size: 2
            },
            {
                name: '油壓床',
                size: 3
            },
            {
                name: "嬰兒床<br/>(4'3 x 2'9 可拆)",
                size: 4
            },
            {
                name: '安樂椅',
                size: 9
            },
            {
                name: '坐地掛衣架',
                size: 1
            }
            ]
        },
        {
            name: '廚房用品',
            items: [{
                name: '廚櫃',
                size: 4
            },
            {
                name: '雙門雪櫃',
                size: 3
            },
            {
                name: '三門雪櫃',
                size: 9
            },
            {
                name: '單/雙頭煮飯爐',
                size: 7
            },
            {
                name: '微波爐/焗爐/<br/>光波爐/燒烤爐',
                size: 1
            },
            {
                name: '上蓋式洗衣機',
                size: 5
            },
            {
                name: '前置式洗衣機',
                size: 3
            },
            {
                name: '乾衣機',
                size: 3
            },
            {
                name: '電熱水爐',
                size: 3
            },
            {
                name: '家用咖啡機',
                size: 3
            },
            {
                name: '抽油煙機',
                size: 3
            },
            {
                name: '洗碗碟機',
                size: 3
            }
            ]
        },
        {
            name: '書房用品',
            items: [{
                name: '書櫃',
                size: 4
            },
            {
                name: '書檯',
                size: 3
            },
            {
                name: '電腦檯',
                size: 9
            },
            {
                name: '電腦<br/>(主機連MON)',
                size: 7
            },
            {
                name: '電腦椅',
                size: 1
            }
            ]
        },
        {
            name: '其他家庭用品',
            items: [{
                name: '窗口式冷氣機',
                size: 4
            },
            {
                name: '分體式空調機',
                size: 3
            },
            {
                name: '座地燈',
                size: 9
            },
            {
                name: '吊燈',
                size: 7
            },
            {
                name: '健身器材',
                size: 1
            },
            {
                name: '直立式鋼琴',
                size: 5
            },
            {
                name: '數碼鋼琴',
                size: 3
            },
            {
                name: '行李喼/手提箱',
                size: 3
            },
            {
                name: '手推車',
                size: 3
            },
            {
                name: '摺疊梯',
                size: 3
            },
            {
                name: '紙箱',
                size: 3
            },
            {
                name: '膠箱',
                size: 3
            },
            {
                name: '紅白藍尼龍袋',
                size: 3
            },
            {
                name: 'BB車',
                size: 3
            },
            {
                name: '單車',
                size: 3
            },
            {
                name: '夾萬',
                size: 3
            },
            ]
        },
        {
            name: '辦公室用品',
            items: [{
                name: 'L型寫字檯',
                size: 4
            },
            {
                name: '圍板',
                size: 3
            },
            {
                name: '會議檯',
                size: 9
            },
            {
                name: '大班椅',
                size: 7
            },
            {
                name: '文件鐵櫃',
                size: 1
            },
            {
                name: '打印機',
                size: 5
            },
            {
                name: '坐地影印機',
                size: 3
            },
            {
                name: '傳真機',
                size: 3
            },
            {
                name: '飲用水機',
                size: 3
            },
            {
                name: '貨架',
                size: 3
            }
            ]
        },
        ];
        const itemsWrapper = $("#content-items");

        function selectStore() {
            //sum up all item values
            var sum = 0;
            $(".calculator-item-element-input").each(function (index, input) {
                sum += (Number($(this).val()) * Number($(this).attr("size")));
            })
            $(".store-select").removeClass('active');
            if (sum <= 0) {
                return;
            }
            if (sum > 0 && sum < 13) {
                $("#s-store").click();
            } else if (sum < 25) {
                $("#m-store").click();
            } else if (sum < 37) {
                $("#l-store").click();
            } else if (sum >= 37) {
                $("#xl-store").click();
            }
        }

        $(document).on("click", ".calculator-category-title", function () {
            $("#category-menu").find(".active").removeClass("active");
            $(this).addClass("active");
            itemsWrapper.html('');
            categories[$(this).attr('id')].items.forEach(item => {
                itemsWrapper.append('<div class="flex relative calculator-item-element">' +
                    '<span class="calculator-item-element-title color-primary absolute bottom-0 left-0">' + item.name + '</span>' +
                    '<input type="number" class="calculator-item-element-input absolute bottom-0 right-0" min=0 max=20 size=' + item.size + ' />' +
                    '</div>');
            });
            $(".store-select").removeClass('active');
        });

        $(document).on("keyup", ".calculator-item-element-input", function () {
            const val = $(this).val();
            const maxVal = Number($(this).attr("max"));
            if (val < 0) {
                $(this).val(0);
            } else if (val > maxVal) {
                $(this).val(maxVal);
            }
            selectStore();
        })

        $(document).on("change", ".calculator-item-element-input", selectStore);


        $(".store-select").click(function () {
            $(".store-select").removeClass('active');
            $(this).addClass("active");
        });

        $(".store-select-button").click(function () {
            console.log("selected");
        });

        return function () {
            const menu = $("#category-menu");
            menu.html('');
            var index = 0;
            categories.forEach(category => {
                const active = index == 0 ? 'active' : '';
                menu.append('<div id="' + index + '" class="calculator-category-title color-primary cursor-pointer ' + active + '">' + category.name + '</div>');
                index++;
            });

            //set items to content-items

            itemsWrapper.html('');
            categories[0].items.forEach(item => {
                itemsWrapper.append('<div class="flex relative calculator-item-element">' +
                    '<span class="calculator-item-element-title color-primary absolute bottom-0 left-0">' + item.name + '</span>' +
                    '<input type="number" class="calculator-item-element-input absolute bottom-0 right-0" min=0 max=20 size=' + item.size + ' />' +
                    '</div>');
            });
        }
    })();

    OneStorage.FAQ = (function () {
        return function () {
            const faqData = [{
                category: '聯繫我們',
                faqs: [{
                    question: '我可以怎樣聯絡到One Storage?',
                    answer: '電話：(852) 2111 2636 EMAIL：cs@onestorage.com.hk <br/>WhatsApp：(852) 51188503 星期一至五:早上10:00至下午1:00及下午2:00至晚上7:00星期六日及公眾假期:<br/>早上10:00至下午1:00及下午2:00至5:00星期日及公眾假期 需於 1 天前預約'
                }]
            },
            {
                category: '尺寸選擇',
                faqs: [{
                    question: '我該選用多大的倉儲單位?',
                    answer: '您可以自行使用空間計算器以確認計算所需倉庫尺寸，請點擊以下按鈕查詢所需尺寸。  您亦可以點擊以下按鈕，填寫相關聯繫資料，由我們的客戶服務員聯絡您為您推薦合適的倉儲單位以及相關的優惠。 '
                },
                {
                    question: '有多少迷你倉尺寸可供選擇?',
                    answer: '客戶可致電熱線查詢：(852) 2111 2636/或WhatsApp:(852) 51188503, <br/>或電郵至：cs@onestorage.com.hk'
                }
                ]
            },
            {
                category: '睇倉',
                faqs: [{
                    question: '什麼時間可以睇倉？',
                    answer: '請於工作時間內和我們預約參觀（星期日及公眾假期需於 1 天前預約），<br/> 請點擊以下按鈕預約：工作時間如下:星期一至五: 早上10:00至下午1:00及下午2:00至晚上7:00星期六日及公眾假期: 早上10:00至下午1:00及下午2:00至5:00'
                },
                {
                    question: '迷你倉各分店地址？',
                    answer: '柴灣 (王子分店):柴灣新業街5號王子工業大廈4樓<br/>' +  
                    '新蒲崗(捷景分店):九龍新蒲崗景福街114號捷景工業大廈9樓B室<br/>' +
                    '葵涌(同珍分店):葵涌昌榮路9-11號同珍工業大廈1期A座2/3樓(接待處2樓)<br/>' +
                    '葵涌(有利分店):葵涌打磚坪街16號有利工業貨倉大廈2樓D室<br/>' +   
                    '葵興(貴豐分店):新界葵興葵昌路9-15號貴豐工業大廈8樓B室<br/>' +   
                    '葵芳(美適分店):新界葵芳葵定路1-11號美適工業大廈3樓B室<br/>' +   
                    '荃灣(京華分店):荃灣德士古道216-218號京華工業貨倉大廈2期14樓<br/>' +   
                    '青衣(青衣工業中心):青衣長達路1-33號青衣工業中心2期D座5樓<br/>' +   
                    '火炭(富昌分店):火炭黃竹洋街5-7號富昌中心6樓H-J 室<br/>' +   
                    '火炭(華威分店):新界火炭禾香街1-7號華威工業大廈3樓C室<br/>' +  
                    '屯門(通明分店):新界屯門新益里3號通明工業大廈4/5樓<br/>' + 
                    '柴灣(萬峰分店)：柴灣祥利街7號萬峰工業大廈6樓C室<br/>' +  
                    '新蒲崗(利嘉分店)：九龍新蒲崗五芳街8號利嘉工業大廈9樓CD室<br/>' +   
                    '柴灣(柴工分店)：柴灣利眾街20號柴灣中心工業大廈14樓B1室<br/>' +
                    '青衣(青衣工業中心):青衣長達路1-33號青衣工業中心2期D座7樓<br/>' +     
                    '荃灣(華興分店)：荃灣馬角街2-6號華興工業大廈7樓B室<br/>' +
                    '黃竹坑(瑞祺分店)：黃竹坑道18號瑞琪工業大廈14樓A室'
                },
                {
                    question: '我想參觀迷你倉，但需要晚上才下班，請問營業時間後能否為我安排一下呢？',
                    answer: '迷你倉工作天的參觀時間最晚是晚上7:00，<br/> 除工作天外，您也可以於星期六日或公眾假期到各分店迷你倉參觀。時間如下：星期一至五:<br/> 早上10:00至下午1:00及下午2:00至晚上7:00星期六日及公眾假期:<br/> 早上10:00至下午1:00及下午2:00至5:00點此立即預約參觀迷你倉'
                }
                ]
            },
            {
                category: '環境設施',
                faqs: [{
                    question: '迷你倉是否有洗手間？',
                    answer: '各分店迷你倉均設有洗手間。'
                },
                {
                    question: '迷你倉是否有停車位？',
                    answer: '屯門通明分店及葵涌有利分店有免費停車位，其他分店都有收費停車位，柴灣王子分店沒停車位，需外泊。'
                },
                {
                    question: '倉庫內的環境溫濕度情況怎樣？',
                    answer: '迷你倉配置了可靠既恆溫空調系統，24小時運作，提供乾爽既儲存環境比客戶存放物品。(共享倉除外)。'
                }
                ]
            },
            {
                category: '消防安保',
                faqs: [{
                    question: '迷你倉內的安保情況怎樣？',
                    answer: '安保方面有7 x 24小時智能保安進出系統及全天候高清保安監察及警報系統'
                },
                {
                    question: '迷你倉內的消防設備怎樣？',
                    answer: '迷你倉完全符合消防指引。2.4米闊走廊、佔總面積6.25%的窗戶比例(其中2%為救援窗)、倉頂與天花距離不少於1米，另備完善的消防裝置設備，如水劑手提滅火筒、粉劑手提滅火筒、消防喉轆、灑水系統、逃生出口及等等。而共享倉亦設有灑水系統。'
                },
                ]
            },
            {
                category: '增值服務',
                faqs: [{
                    question: '什麼是共享倉？',
                    answer: '共享倉只限出入倉時提存物品，儲存其間不可提存。出入倉時間為星期一至五上午10時至晚上6時；星期六上午10時至下午4時；星期日及公眾假期需於1天前預約。客戶如需出倉或入倉服務，需於最少一個工作天或之前與分店負責同事安排。共享倉數量有效，可聯繫我們的客服預約登記。 聯繫電話:(852) 2111 2636/ EMAIL:cs@onestorage.com.hk/ WhatsApp:(852) 51188503'
                },
                {
                    question: '什麼是代收信件服務？',
                    answer: '我們於同珍分店有代收信件服務，詳情請聯絡(852) 2111 2636'
                },
                {
                    question: '存放在迷你倉的物品是否有保險？',
                    answer: '迷你倉不包括保險在內，而存放在迷你倉的物品，客人可自行購買有關火災、水災、盜竊等保險。如有任何損失、損毀或遺失等，迷你倉不需作出任何賠償或承擔任何責任，客人須自行承擔有關風險。'
                },
                {
                    question: '倉庫設施內有賣鎖具？',
                    answer: '在迷你倉各分店均可購買鎖具，費用為$50/個。'
                },
                {
                    question: '什麼是行李喼寄存服務？',
                    answer: '如需使用行李喼寄存服務，可聯繫我們的客服預約登記。聯繫電話:(852) 2111 2636/ EMAIL:cs@onestorage.com.hk/ WhatsApp:(852) 51188503'
                },
                ]
            },
            {
                category: '拆裝運輸',
                faqs: [{
                    question: '你們提供傢私拆除 / 組裝服務嗎？',
                    answer: '我們沒有傢私拆除 / 組裝服務提供。'
                },
                {
                    question: '你們會提供包裝物料嗎？',
                    answer: '我們沒有包裝物料提供，請您在入倉前提前包裝好寄存的物品。'
                },
                {
                    question: '我需要你們將物品運輸到倉，怎麼辦？',
                    answer: '如您需要運輸服務，可聯繫我們的客服預約登記，聯繫電話(852) 2111 2636 '
                },
                {
                    question: '物品如何運送到迷你倉？',
                    answer: '如您需要運輸服務，可聯繫我們的客服預約登記，聯繫電話(852) 2111 2636 '
                },
                {
                    question: '可否在倉裡會客或交接貨物?',
                    answer: '迷你倉只能提供物品存儲服務，客戶可以自行提取物品，不能在倉裡會客或交接貨物。'
                },
                {
                    question: '可以在迷你倉辦公嗎？',
                    answer: '迷你倉只能提供貨物寄存服務，客戶可以自行提取物品，您不能於迷你倉進行辦公。'
                },
                {
                    question: '可以在迷你倉過夜嗎？',
                    answer: '迷你倉只能提供貨物寄存服務，客戶可以自行提取物品，您不能在迷你倉過夜。'
                }
                ]
            },
            ];
            const faqMenu = $("#faq-menu");
            const contentWrapper = $("#faq-content");

            function init() {
                faqMenu.html('');
                var index = 0;
                faqData.forEach(faq => {
                    const active = index == 0 ? 'active' : '';
                    faqMenu.append('<li id="' + index + '" class="p-3 cursor-pointer item category-title ' + active + '">' + faq.category + '</li>');
                    index++;
                });

                //set items to content-items

                contentWrapper.html('');
                faqData[0].faqs.forEach(faq => {
                    contentWrapper.append('<div class="accordion flex justify-between appearance-none "><p class="break-words">' + faq.question +
                        '</p><i class="icon wb-chevron-down text-gray-700 ml-4"></i>' +
                        '</div>' +
                        '<div class="answer-panel">' +
                        '<p class="leading-normal py-4 color-primary">' + faq.answer + '</p>' +
                        '</div>');
                });
            }
            $(document).on("click", ".category-title", function () {
                faqMenu.find(".active").removeClass("active");
                $(this).addClass("active");
                contentWrapper.html('');
                faqData[$(this).attr('id')].faqs.forEach(faq => {
                    contentWrapper.append('<div class="accordion flex justify-between appearance-none "><p class="break-words">' + faq.question +
                        '</p><i class="icon wb-chevron-down text-gray-700 ml-4"></i>' +
                        '</div>' +
                        '<div class="answer-panel">' +
                        '<p class="leading-normal py-4 color-primary">' + faq.answer + '</p>' +
                        '</div>');
                });
            });


            $(document).on("click", ".accordion", function () {
                var panel = $(this).next();
                const height = panel.css('maxHeight');
                console.log(height);
                if (height !== '0px') {
                    panel.css('maxHeight', "0px");
                    panel.css('border', "0px");
                } else {
                    panel.css('maxHeight', "500px");
                    panel.css('border', "1px solid #DCDCDC");
                }
            });

            init();
        }
    })();
});

