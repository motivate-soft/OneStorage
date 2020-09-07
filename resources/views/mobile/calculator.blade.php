@extends('mobile.layouts.app')

@section('title')
<title>{{__('Calculator')}}</title>
@endsection

@section('styles')
<style>
    .color-primary {}

    .content-title {
        font-size: 25px;
        font-weight: 800;
        padding-top: 66px;
        padding-bottom: 22px;
    }

    .calculator-content-title-m {
        font-size: 21px;
        padding-left: 36px;
        padding-top: 30px;
        padding-bottom: 20px;
    }

    .calculator-item-title {
        font-size: 17px;
        padding: 15px;
        text-align: center;
        background-color: #E5E5E5;
    }

    div .calculator-item-title.active {
        background-color: #E0CBF6;
    }

    .calculator-item-element-m {
        padding: 10px;
        height: 30px;
        margin: 5px;
    }

    .calculator-item-element-title-m {
        font-size: 15px;

    }

    .calculator-item-element-input-m {
        background-color: #E0CBF6;
        border-bottom: 1px solid #4D5567;
        font-size: 21px;
        width: 31px;
    }

    /* Remove Spinners in input type number */

    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    .room-card-image {
        width: 100px;
        height: 80px;
    }

    .room-card-title {
        font-size: 22px;
        /* color:#B2B5BD; */
    }

    .room-footer {
        font-size: 29px;
    }

    .room-footer-image {
        width: 30px;
        height: 30px;
    }

    .room-card-wrapper-m {
        min-width: 160px;
        height: 245px;
        padding-top: 40px;
    }

    .calculator-elements-wrapper {
        background-color: #E0CBF6;
        padding: 5px;
    }

    div .room-card-wrapper-m {
        background: white;
        color: #B2B5BD;
    }

    div .room-card-wrapper-m div>button {
        background-color: white;
    }

    div .room-card-wrapper-m.active {
        background: #56628C;
        color: white;
    }

    div .room-card-wrapper-m.active div>button {
        background-color: #E0CBF6;
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

    .calculator-others-title-m {
        font-size: 21px;
        padding-left: 26px;
        padding-top: 70px;
        padding-bottom: 20px;
        font-weight: 600;
    }

    .calculator-others-item-image {
        width: 124px;
    }

    .calculator-others-item-divider {
        margin-left: 25px;
        margin-right: 25px;
        height: 1px;
        background-color: #707070;
    }
</style>
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
                <span>空間計算器</span>
            </div>
            <div class="capitalize absolute bottom-0 left-0 maintitle-right-bottom-m">想知到需要幾大既倉? 幫緊你</div>
        </div>
    </div>

    <div class="grid grid-cols-12 col-gap-0 pt-10 px-5">
        <div class="col-start-1 col-span-3" id="category-menu">
            <!-- <div id="1" class="calculator-item-title color-primary ">客廳</div> -->
        </div>
        <div id="content-items" class="col-start-4 col-span-9 grid grid-cols-2 col-gap-1 row-gap-0 calculator-elements-wrapper">
            <div class="flex relative calculator-item-element-m items-center">
                <span class="calculator-item-element-title-m color-primary pr-2">紅白藍</span>
                <input type="number" class="calculator-item-element-input-m absolute right-2" min=0 />
            </div>


        </div>
    </div>

    <div>
        <p class="color-primary text-left calculator-content-title-m">你需要租</p>
    </div>

    <div class="flex overflow-x-auto pt-10 px-10 pb-5">
        <div class="flex-shrink-0 relative max-w-md rounded overflow-hidden shadow-lg room-card-wrapper-m store-select mx-3"  id="s-store">
            <img class="room-card-image mx-auto" src="{{ asset('images/calculator/rooms-03@2x.png') }}" alt="Room">
            <div class="px-6 py-4">
                <div class="room-card-title text-center mb-2">小型倉</div>
            </div>
            <div class="absolute bottom-0 w-full px-6 pt-4 pb-5">
                <button class="w-full bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-full shadow color-primary store-select-button">搜尋</button>
            </div>
        </div>
        <div class="flex-shrink-0 relative max-w-md rounded overflow-hidden shadow-lg room-card-wrapper-m store-select mx-3 active" id="m-store">
            <img class="room-card-image mx-auto" src="{{ asset('images/calculator/rooms-04@2x.png') }}" alt="Room">
            <div class="px-6 py-4">
                <div class="room-card-title text-center mb-2">中型倉</div>
            </div>
            <div class="absolute bottom-0 w-full px-6 pt-4 pb-5">
                <button class="w-full bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-full shadow color-primary store-select-button">搜尋</button>
            </div>
        </div>
        <div class="flex-shrink-0 relative max-w-md rounded overflow-hidden shadow-lg room-card-wrapper-m store-select mx-3" id="l-store">
            <img class="room-card-image mx-auto" src="{{ asset('images/calculator/rooms-05@2x.png') }}" alt="Room">
            <div class="px-6 py-4">
                <div class="room-card-title text-center mb-2">大型倉</div>
            </div>
            <div class="absolute bottom-0 w-full px-6 pt-4 pb-5">
                <button class="w-full bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-full shadow color-primary store-select-button">搜尋</button>
            </div>
        </div>
        <div class="flex-shrink-0 relative max-w-md rounded overflow-hidden shadow-lg room-card-wrapper-m store-select mx-3" id="xl-store">
            <img class="room-card-image mx-auto" src="{{ asset('images/calculator/rooms-06@2x.png') }}" alt="Room">
            <div class="px-6 py-4">
                <div class="room-card-title text-center mb-2">特大倉</div>
            </div>
            <div class="absolute bottom-0 w-full px-6 pt-4 pb-5">
                <button class="w-full bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-full shadow color-primary store-select-button">搜尋</button>
            </div>
        </div>
    </div>

    <div>
        <p class="color-primary text-left calculator-others-title-m">其他資訊</p>
    </div>

    <div class="grid grid-cols-1 row-gap-1 pb-10">
        <div class="flex p-6">
            <img class="flex-shrink-0 calculator-others-item-image" src="{{ asset('images/calculator/Image 82@2x.png') }}" />
            <p class="text-base font-weight-bolder color-primary px-5 leading-6">【搬屋冇煩惱】搬屋前一定要知嘅小貼士</p>
        </div>
        <div class="calculator-others-item-divider"></div>
        <div class="flex p-6">
            <img class="flex-shrink-0 calculator-others-item-image" src="{{ asset('images/calculator/Intersection 39@2x.png') }}" />
            <p class="text-base font-weight-bolder color-primary px-5 leading-6">政府派1萬蚊 點先最快收到錢？</p>
        </div>
        <div class="calculator-others-item-divider"></div>
        <div class="flex p-6">
            <img class="flex-shrink-0 calculator-others-item-image" src="{{ asset('images/calculator/Image 84@2x.png') }}" />
            <p class="text-base font-weight-bolder color-primary px-5 leading-6">蝸居套房</p>
        </div>
        <div class="calculator-others-item-divider"></div>
        <div class="flex p-6">
            <img class="flex-shrink-0 calculator-others-item-image" src="{{ asset('images/calculator/Image 84@2x.png') }}" />
            <p class="text-base font-weight-bolder color-primary px-5 leading-6">【迷你倉點揀好 - 2020年四大安全注意要點</p>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<script>
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

    function init() {
        //set categories to menu
        const menu = $("#category-menu");
        menu.html('');
        var index = 0;
        categories.forEach(category => {
            const active = index == 0 ? 'active' : '';
            menu.append('<div id="' + index + '" class="calculator-item-title color-primary' + active + '">' + category.name + '</div>');
            index++;
        });

        //set items to content-items

        itemsWrapper.html('');
        categories[0].items.forEach(item => {
            itemsWrapper.append(' <div class="flex relative calculator-item-element-m items-center">' +
                '<span class = "calculator-item-element-title-m color-primary pr-2"> '+ item.name +' </span>' +
                '<input type = "number" class = "calculator-item-element-input-m absolute right-2" min=0 max=' + item.size + '  /></div>');
        });
    }

    function selectStore() {
        //sum up all item values
        var sum = 0;
        $(".calculator-item-element-input-m").each(function(index, input) {
            sum += Number($(this).val());
        })
        $(".store-select").removeClass('active');
        if (sum >= 0 && sum <= 12) {
            $("#s-store").click();
        } else if (sum <= 24) {
            $("#m-store").click();
        } else if (sum <= 36) {
            $("#l-store").click();
        } else {
            $("#xl-store").click();
        }
    }

    init();

    $(document).on("click", ".calculator-item-title", function() {
        $("#category-menu").find(".active").removeClass("active");
        $(this).addClass("active");
        itemsWrapper.html('');
        categories[$(this).attr('id')].items.forEach(item => {
            itemsWrapper.append(' <div class="flex relative calculator-item-element-m items-center">' +
                '<span class = "calculator-item-element-title-m color-primary pr-2"> '+ item.name +' </span>' +
                '<input type = "number" class = "calculator-item-element-input-m absolute right-2" min=0 max=' + item.size + '  /></div>');
        });
        $("#s-store").click();
    });

    $(document).on("keyup", ".calculator-item-element-input-m", function() {
        console.log($(this).val());
        const val = $(this).val();
        const maxVal = Number($(this).attr("max"));
        if (val < 0) {
            $(this).val(0);
        } else if (val > maxVal) {
            $(this).val(maxVal);
        }
        selectStore();
    })
    $(document).on("change", ".calculator-item-element-input-m", selectStore);


    $(".store-select").click(function() {
        $(".store-select").removeClass('active');
        $(this).addClass("active");
    });


    var stores = document.getElementsByClassName("store-select");

    for (var i = 0; i < stores.length; i++) {

        stores[i].addEventListener("click", function(event) {

            var current = document.getElementsByClassName("active");
            current[1].className = current[1].className.replace(" active", "");

            this.className += " active";

            console.log(event);

        });
    }

    var buttons = document.getElementsByClassName("store-select-button");

    for (var i = 0; i < buttons.length; i++) {

        buttons[i].addEventListener("click", function(event) {

            event.cancelBubble = true;

            alert("selected");

            // var current = document.getElementsByClassName("active");
            // current[1].className = current[1].className.replace(" active", "");

            // this.className += " active";

            // console.log(event);

        });
    }
</script>
@endsection

@section('footer')
@include('mobile.layouts.footer')
@endsection