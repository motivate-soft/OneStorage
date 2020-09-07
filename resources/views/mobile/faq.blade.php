@extends('mobile.layouts.app')

@section('title')
<title>{{__('Location')}}</title>
@endsection

@section('styles')
<style>
    .accordion {
        background-color: #E0CBF6;
        color: #444;
        cursor: pointer;
        padding: 12px;
        margin-top: 10px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        /* transition: 0.4s; */
        font-weight: 600;
    }

    .accordion:hover {
        background-color: #9B62D7;
    }

    .answer-panel {
        padding: 0 18px;
        background-color: white;
        max-height: 0;
        overflow: hidden;
        /* transition: max-height 0.2s ease-out; */
    }

    li {
        color: #9A9CA2;
    }

    li.active {
        color: #4D5567
    }

    .maintitle-wrapper-m {
        padding-top: 32px;
    }

    .maintitle-left-m {
        padding-top: 20px;
        /* margin-left:163px;  */
        margin-right: 33px;
        font-size: 28px;
    }

    .maintitle-divider-m {
        height: 65px;
        background-color: #707070;
    }

    .maintitle-right-m {
        padding-top: 20px;
        margin-left: 27.5px;
        font-size: 29px;
    }

    .maintitle-right-aboutus-english-m {
        font-family: 'Roboto';
    }

    .maintitle-right-bottom-m {
        font-size: 11px;
        color: #B2B5BD;
        transform: translate(0, 50%);
    }

    .color-primary {
        color: #4D5567;
    }

    .category-title {
        font-size: 19px;
        font-weight: 600;
    }

    .content-area {
        min-height: 500px;
    }

    .color-primary {
        color: #4D5567;
    }
</style>

<link rel="stylesheet" href="{{ asset('web-icons/web-icons.min.css') }}" />

@endsection

@section('accessory')
@include('mobile.partials.accessory')
@endsection

@section('content')
<div class="relative block bg-white">

    <div class="flex maintitle-wrapper-m color-primary text-center mx-auto w-max-content">
        <span class="uppercase maintitle-left-m">one</span>
        <div class="w-px maintitle-divider-m"></div>
        <div class="relative maintitle-right-m">
            <div class="flex items-center">
                <span>常見問題</span>
            </div>
            <div class="capitalize absolute bottom-0 left-0 maintitle-right-bottom-m">解答關於迷你倉的疑難</div>
        </div>
    </div>
    <div class="flex pt-10">
        <ul class="w-max-content pr-2 mx-auto" id="faq-menu">
            <!-- <li id="item0" class="p-3 cursor-pointer item category-title text-left active">尺寸選擇</li>
            <li id="item1" class="p-3 cursor-pointer item category-title text-left">環境設施
                <ul class="w-max-content pl-2 ">
                    <li id="item2" class="p-3 item cursor-pointer category-title text-left">睇倉</li>
                    <li id="item3" class="p-3 item cursor-pointer category-title text-left">消防安保</li>
                    <li id="item4" class="p-3 item cursor-pointer category-title text-left">增值服務</li>
                </ul>
            </li>
            <li id="item5" class="p-3 cursor-pointer item category-title text-left">合約與條款
                <ul class="w-max-content pl-2 ">
                    <li id="item6" class="p-3 item cursor-pointer category-title text-left">合約與條款</li>
                    <li id="item7" class="p-3 item cursor-pointer category-title text-left">合約與條款</li>
                    <li id="item8" class="p-3 item cursor-pointer category-title text-left">合約與條款</li>
                </ul>
            </li> -->
        </ul>
    </div>
    <div id="faq-content" class="bg-gray content-area px-6">
      
    </div>

</div>
@endsection

@section('scripts')
<script>
    const faqData = [{
            category: '聯繫我們',
            faqs: [{
                question: '我可以怎樣聯絡到One Storage?',
                answer: '電話：(852) 2111 2636 <br/>EMAIL：cs@onestorage.com.hk <br/>WhatsApp：(852) 54907251星期一至五: 早上10:00至下午1:00及下午2:00至晚上7:00星期六日及公眾假期: 早上10:00至下午1:00及下午2:00至5:00星期日及公眾假期 需於 1 天前預約'
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
                    answer: '請客戶先使用空間計算器計算需要的尺寸，然後再聯繫我們的客服預約登記。 聯繫電話:(852) 2111 2636/ EMAIL:cs@onestorage.com.hk/ WhatsApp:(852) 51188503'
                }
            ]
        },
        {
            category: '睇倉',
            faqs: [{
                    question: '什麼時間可以睇倉？',
                    answer: '請於工作時間內和我們預約參觀（星期日及公眾假期需於 1 天前預約），請點擊以下按鈕預約：工作時間如下:星期一至五: 早上10:00至下午1:00及下午2:00至晚上7:00星期六日及公眾假期: 早上10:00至下午1:00及下午2:00至5:00'
                },
                {
                    question: '迷你倉各分店地址？',
                    answer: '柴灣 (王子分店):柴灣新業街5號王子工業大廈4樓  新蒲崗(捷景分店):九龍新蒲崗景福街114號捷景工業大廈9樓B室   葵涌(同珍分店):葵涌昌榮路9-11號同珍工業大廈1期A座2/3樓(接待處2樓)   葵涌(有利分店):葵涌打磚坪街16號有利工業貨倉大廈2樓D室   葵興(貴豐分店):新界葵興葵昌路9-15號貴豐工業大廈8樓B室   葵芳(美適分店):新界葵芳葵定路1-11號美適工業大廈3樓B室   荃灣(京華分店):荃灣德士古道216-218號京華工業貨倉大廈2期14樓   青衣(青衣工業中心):青衣長達路1-33號青衣工業中心2期D座5樓   火炭(富昌分店):火炭黃竹洋街5-7號富昌中心6樓H-J 室   火炭(華威分店):新界火炭禾香街1-7號華威工業大廈3樓C室  屯門(通明分店):新界屯門新益里3號通明工業大廈4/5樓 柴灣(萬峰分店)：柴灣祥利街7號萬峰工業大廈6樓C室  新蒲崗(利嘉分店)：九龍新蒲崗五芳街8號利嘉工業大廈9樓CD室   柴灣(柴工分店)：柴灣利眾街20號柴灣中心工業大廈14樓B1室   '
                },
                {
                    question: '我想參觀迷你倉，但需要晚上才下班，請問營業時間後能否為我安排一下呢？',
                    answer: '迷你倉工作天的參觀時間最晚是晚上7:00， 除工作天外，您也可以於星期六日或公眾假期到各分店迷你倉參觀。時間如下：星期一至五: 早上10:00至下午1:00及下午2:00至晚上7:00星期六日及公眾假期: 早上10:00至下午1:00及下午2:00至5:00點此立即預約參觀迷你倉'
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
                    answer: '我們有代收信件服務，詳細條款請點擊以下鏈接：'
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
            contentWrapper.append('<div class="accordion relative appearance-none">' + faq.question + '<div class="pointer-events-none absolute inset-y-0 right-3 flex items-center px-2 text-gray-700">' +
                '<i class="icon wb-chevron-down"></i>' +
                '</div>' +
                '</div>' +
                '<div class="answer-panel">' +
                '<p class="leading-normal px-5 py-4 color-primary">'+ faq.answer +'</p>' +
                '</div>');
        });
    }
    $(document).on("click", ".category-title", function() {
        faqMenu.find(".active").removeClass("active");
        $(this).addClass("active");
        contentWrapper.html('');
        faqData[$(this).attr('id')].faqs.forEach(faq => {
            contentWrapper.append('<div class="accordion relative appearance-none">' + faq.question + '<div class="pointer-events-none absolute inset-y-0 right-3 flex items-center px-2 text-gray-700">' +
                '<i class="icon wb-chevron-down"></i>' +
                '</div>' +
                '</div>' +
                '<div class="answer-panel">' +
                '<p class="leading-normal px-5 py-4 color-primary">'+ faq.answer +'</p>' +
                '</div>');
        });
    });


    $(document).on("click", ".accordion", function() {
        var panel = $(this).next();
        const height = panel.css('maxHeight');
        console.log(height);
        if (height !== '0px') {
            panel.css('maxHeight', "0px");
            panel.css('border', "0px");
        } else {
            panel.css('maxHeight', "600px");
            panel.css('border', "1px solid #DCDCDC");
        }
    });



    init();
    // // Script For Accordion
    // var acc = document.getElementsByClassName("accordion");
    // var i;

    // for (i = 0; i < acc.length; i++) {
    //     acc[i].addEventListener("click", function() {
    //         // this.classList.toggle("active");
    //         var panel = this.nextElementSibling;
    //         if (panel.style.maxHeight) {
    //             panel.style.maxHeight = null;
    //             panel.style.border = null;
    //         } else {
    //             panel.style.maxHeight = panel.scrollHeight + "px";
    //             panel.style.border = "1px solid #DCDCDC";
    //         }

    //         if(panel.style.maxHeight) {
    //             console.log(this.childNodes[1].childNodes[1].className);
    //             this.childNodes[1].childNodes[1].className = this.childNodes[1].childNodes[1].className.replace("wb-chevron-up", "wb-chevron-down");
    //         } else {
    //             this.childNodes[1].childNodes[1].className = this.childNodes[1].childNodes[1].className.replace("wb-chevron-down", "wb-chevron-up");

    //         }
    //     });
    // }

    // var items = document.getElementsByTagName("li");
    // var content = document.getElementById("content");


    // for (var i = 0; i < items.length ; i ++) {

    //     items[i].addEventListener("click", function(event) {

    //         if (event.target.id == "item0") {
    //             window.location.reload();
    //         }

    //         event.cancelBubble = true;

    //         var current = document.getElementsByClassName("active");
    //         current[0].className = current[0].className.replace(" active", "");

    //         this.className += " active";

    //         content.innerHTML = "<div style='color:blue;font-size:50px;'>Page : " + this.id + "</div>";

    //         console.log(event);

    //     });
    // }
</script>
@endsection

@section('footer')
@include('mobile.layouts.footer1')
@endsection