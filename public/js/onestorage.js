var OneStorage = {};

function numberFormat(num) {
    return Number(num).toString().replace(/\d(?=(\d{3})+)/g, '$&,');
}

String.prototype.padFunction = function (padStr, len) {
    var str = this;
    while (str.length < len)
        str = padStr + str;
    return str;
}

const allKey = "SELECTED_ALL";
const key = "SELECTED_MEMBERS";

$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '<?= csrf_token() ?>'
        }
    });

    $("#enquiryForm").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        if (form.attr("state") === "sent") {
            return;
        }
        var submitBtn = form.find(".submit-btn");
        submitBtn.prop('disabled', true);
        submitBtn.html(submitBtn.attr('data-text') + `&nbsp;<i class="fas fa-spinner fa-spin"></i>`);
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: $(this).serialize(),
            datatype: 'json',
            success: function(result) {
                submitBtn.css("background-color", "#28e8db");
                submitBtn.text("已送出");
                form.find(".input-form").prop('disabled', true);
                form.find("button").prop('disabled', true);
                form.attr("state", "sent");
            },
            error: function () {
                alert("Error");
                submitBtn.text(submitBtn.attr('data-text'));
                submitBtn.prop('disabled', false);
            }
        });
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
    });

    $('.mailto').click(function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        window.open(url);
    });

    OneStorage.Home = (function () {
        return function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '<?= csrf_token() ?>'
                }
            });

            $("#discountForm").submit(function (e) {
                e.preventDefault();
                var form = $(this);
                if (form.attr("state") === "sent") {
                    return;
                }
                var submitBtn = form.find("button");
                submitBtn.prop('disabled', true);
                submitBtn.html(submitBtn.attr('data-text') + `&nbsp;<i class="fas fa-spinner fa-spin"></i>`);
                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: $(this).serialize(),
                    datatype: 'json',
                    success: function (result) {
                        submitBtn.css("background-color", "#28e8db");
                        submitBtn.text('請查看電郵');

                        form.find("input").prop('disabled', true);
                        form.attr("state", "sent");
                    },
                    error: function () {
                        alert("Error");
                        submitBtn.text(submitBtn.attr('data-text'));
                        submitBtn.removeProp('disabled');
                    }
                });
            })

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
        return function (storeSize, area) {
            const priceMin = 200;
            const priceMax = 2500;
            var priceRange = [priceMin, priceMax];
            var map, infoWnd;
            var geocoder = new google.maps.Geocoder();
            var storesMarkers = [];

            initMap();

            function initMap() {
                geocoder.geocode({
                    'address': area ? area : '香港'
                }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        const location = new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng());
                        const jMap = $("#map");
                        if($("body").width() <= 1440){
                            jMap.height(350);
                        }else{
                            jMap.height(jMap.width());
                        }


                        map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 12,
                            center: location,
                            disableDefaultUI: true,
                            mapTypeId: google.maps.MapTypeId.ROADMAP,
                            zoomControl: true
                        });

                        infoWnd = new google.maps.InfoWindow();

                        var pos = new google.maps.Marker({
                            position: location,
                            map: map
                        });

                        filter();
                    } else {
                        console.log("Geocode was not successful for the following reason: " + status);
                        $(".state-text").text("Geocode was not successful for the following reason: " + status);
                    }
                });
            }

            function addStoreMarker(data) {
                if (data.lat == 0 || data.lng == 0) {
                    return;
                }
                const location = new google.maps.LatLng(data.lat, data.lng);

                var pinImage = new google.maps.MarkerImage("/images/ic-map-marker.png",
                    new google.maps.Size(56, 56),
                    new google.maps.Point(0, 0),
                    new google.maps.Point(28, 12));

                var marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    icon: pinImage,
                });

                google.maps.event.addListener(marker, 'click', function () {
                    var contentString = "<p>分店: " + "<span style='color:black'>" + data.name + "</span></p><p>地址: "
                        + "<span style='color:black'>" + data.address + "</span></p><p>價錢: "
                        + "<span style='color:black'>$" + data.price + " 起</span></p>";

                    // Replace our Info Window's content and position
                    infoWnd.setContent(contentString);
                    infoWnd.setPosition(marker.position);
                    infoWnd.open(map)
                });
                storesMarkers.push(marker);
            }

            function clearMakers() {
                for (var i = 0; i < storesMarkers.length; i++) {
                    storesMarkers[i].setMap(null);
                }
                storesMarkers = [];
            }

            function filter() {
                var sizeFilter = [];
                clearMakers();

                $(".branchlocation-card-wrapper.active").each(function () {
                    sizeFilter.push($(this).attr('value'));
                })

                if (sizeFilter.length === 0) {
                    sizeFilter = ["S", "M", "L", "XL"];
                }

                $(".location-content-item").each(function () {
                    $(this).hide();
                    const label = JSON.parse($(this).attr('data-size-label'));
                    const name = $(this).attr("data-name");
                    const price = Number($(this).attr("data-price"));
                    const addressWrapper = $(this).find(".store-address");
                    const lat = Number(addressWrapper.attr("data-lat"));
                    const lng = Number(addressWrapper.attr("data-lng"));

                    var flag = false;
                    $.each(sizeFilter, function (index, value) {
                        if (label.includes(value) && (price >= priceRange[0] && price <= priceRange[1])) {
                            flag = true;
                            addStoreMarker({
                                lat: lat,
                                lng: lng,
                                name: name,
                                address: addressWrapper.text(),
                                price: price
                            });
                            return false;
                        }
                    })
                    if (flag) {
                        $(this).show();
                    }
                })
            }

            $("#slider-range").slider({
                range: true,
                min: priceMin,
                max: priceMax,
                values: [priceMin, priceMax],
                slide: function (event, ui) {
                    $("#amount").html("$" + ui.values[0] + " ~ $" + ui.values[1]);
                    priceRange[0] = ui.values[0];
                    priceRange[1] = ui.values[1];
                    console.log("1");
                    filter();
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
                filter();
            })

            $(".branchlocation-m-item").click(function () {
                if ($(this).hasClass("active")) {
                    $(this).removeClass("active");
                } else {
                    $(this).addClass("active");
                }
                filter();
            })

            // $(".branchlocation-m-item").click(function () {
            //     $(".branchlocation-m-item").removeClass("active");
            //     $(this).addClass("active");
            // })

            $(".store-select[value='" + storeSize + "']").click();
            $(".branchlocation-m-item[value='" + storeSize + "']").click();
        }
    })();

    OneStorage.RentwareHouse = (function () {

        return function (lat, lng) {
            var branchSize;
            var confirmed = false;
            const bookingModal = document.getElementById("bookingModal");
            const confirmModal = document.getElementById("confirmModal");

            initMap();
            changeRoomImage(Number($(".rentwarehouse-table-item").first().find(".bg-yellow").text()));

            function initMap() {
                var map;
                const location = new google.maps.LatLng(lat, lng);
                $("#map").height(400);
                map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 18,
                    center: location,
                    disableDefaultUI: true,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    zoomControl: true
                });

                var pos = new google.maps.Marker({
                    position: location,
                    map: map
                });
            }

            function changeRoomImage(size) {
                var sizeLabel = 's';
                if (size > 0 && size < 13) {
                    sizeLabel = 's';
                } else if (size < 25) {
                    sizeLabel = 'm';
                } else if (size < 37) {
                    sizeLabel = 'l';
                } else if (size >= 37) {
                    sizeLabel = 'xl';
                }
                $("#rentwarehouse-size-preview").attr("src", "../images/calculator/rooms-" + sizeLabel + ".jpg");
            }

            $(".address-text").click(function(){
                const addrSection = $("#address-section");
                if (addrSection.next().css("display") === "none") {
                    addrSection.click();
                }
                $('html,body').animate({
                    scrollTop: $("#address-section").offset().top - $("nav").height()
                });
            });

            $("#bookingForm").submit(function (e) {

                e.preventDefault();

                var form = $(this);
                var submitBtn = form.find("button");
                submitBtn.prop('disabled', true);
                submitBtn.html(submitBtn.attr('data-text') + `&nbsp;<i class="fas fa-spinner fa-spin"></i>`);

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: $(this).serialize(),
                    datatype: 'json',
                    success: function (result) {
                        submitBtn.prop('disabled', false);
                        submitBtn.text(submitBtn.attr('data-text'));
                        if (result.state === "success") {
                            alert("Success");
                            bookingModal.style.display = "none";
                            if (!result.logged_in) {
                                confirmModal.style.display = "block";
                            }
                        } else {
                            alert("Error");
                        }
                    },
                    error: function(){
                        alert("Error");
                        submitBtn.prop('disabled', false);
                        submitBtn.text(submitBtn.attr('data-text'));
                    }
                });

            });

            $(".rentwarehouse-toggle-item").click(function () {
                $(this).next().toggle();

                if ($(this).next().css("display") == "none") {
                    $(this).find("i").removeClass("wb-chevron-down");
                    $(this).find("i").addClass("wb-chevron-up");
                } else {
                    $(this).find("i").removeClass("wb-chevron-up");
                    $(this).find("i").addClass("wb-chevron-down");
                }
            });

            $(".rentwarehouse-space-size-select").click(function () {
                $(".rentwarehouse-space-size-select").removeClass("active");
                $(this).addClass("active");

                const prepaidPriceWrapper = $("#prepaid-price-wrapper");
                const priceWrapper = $("#price-wrapper");
                prepaidPriceWrapper.html(numberFormat($(this).attr('data-prepaid-price')));
                prepaidPriceWrapper.attr('data-price', $(this).attr('data-prepaid-price'));

                priceWrapper.html(numberFormat($(this).attr('data-price')));
                priceWrapper.attr('data-price', $(this).attr('data-price'));

                $(".rentwarehouse-price-select:first").click();
                branchSize = Number($(this).attr('data-size'));
            });

            $(".rentwarehouse-price-select").click(function () {
                $(".rentwarehouse-price-select").removeClass("active");
                $(this).addClass("active");
                $(".selected-price").html($(this).find(".price-content").html());
                $("#payment-method").text($(this).find(".rentwarehouse-mode-select-item-title").text());
                $("#storePrice").val(Number($(this).find(".price-content").attr('data-price')));
            });

            $(".rentwarehouse-table-item").on('click', function () {
                changeRoomImage(Number($(this).find(".bg-yellow").text()));
            });

            $(".rentwarehouse-table-item").hover(function () {
                changeRoomImage(Number($(this).find(".bg-yellow").text()));
            });

            $(".rentwarehouse-sub-image").click(function () {
                const mainImage = $("#rentwarehouse-main-image");
                mainImage.attr("src", $(this).attr("src"));
                mainImage.show();
            });

            $("#modalTrigger").click(function () {
                $("#branchSize").val(branchSize);
                $("#branchSizeTxt").html(branchSize);
                confirmed = false;
                bookingModal.style.display = "block"
            });

            $("#modalClose").click(function () {
                bookingModal.style.display = "none"
            });

            $("#confirmBtn").click(function () {
                confirmed = true;
                confirmModal.style.display = "none"
            });

            $("#cancelBtn").click(function () {
                confirmed = false;
                confirmModal.style.display = "none"
            });

            window.onclick = function (event) {
                if (event.target == bookingModal) {
                    bookingModal.style.display = "none"
                } else if (event.target == confirmModal) {
                    confirmModal.style.display = "none"
                }
            };

            $(".rentwarehouse-space-size-select:first").click();
        }
    })();

    OneStorage.Calculator = (function () {
        const categories = [{
            name: '常用',
            items: [{
                name: '紅白藍<br/>尼龍袋5個',
                size: 4
            },
            {
                name: '紙箱十個',
                size: 6
            },
            {
                name: '膠箱十個',
                size: 8
            },
            ]
        },
        {
            name: '客廳用品',
            items: [{
                name: ' 電視櫃',
                size: 8
            },
            {
                name: '鞋櫃',
                size: 6
            },
            {
                name: '小童檯',
                size: 4
            },
            {
                name: '吧檯',
                size: 6
            },
            {
                name: '餐桌椅',
                size: 3
            },
            {
                name: 'BB椅',
                size: 3
            },
            {
                name: '高凳',
                size: 4
            },
            {
                name: '餐檯',
                size: 15
            },
            {
                name: '可摺疊餐檯',
                size: 8
            },
            {
                name: '茶几',
                size: 3
            },
            {
                name: '音響',
                size: 4
            },
            {
                name: '電暖爐',
                size: 2
            },
            {
                name: '風扇',
                size: 1
            },
            {
                name: '吸塵器',
                size: 2
            },
            {
                name: '抽濕機',
                size: 3
            },

            {
                name: '魚缸',
                size: 4
            },
            {
                name: '暖風機',
                size: 2
            },
            {
                name: '摺凳',
                size: 1
            },
            {
                name: '梳發',
                size: 8
            },
            {
                name: '40吋電視機',
                size: 8
            },
            ]
        },
        {
            name: '睡房用品',
            items: [{
                name: '雙門衣櫃',
                size: 8
            },
            {
                name: '單門衣櫃',
                size: 4
            },
            {
                name: '梳妝檯',
                size: 4
            },
            {
                name: '床頭櫃',
                size: 3
            },
            {
                name: '小抽屜櫃',
                size: 4
            },
            {
                name: '大抽屜櫃',
                size: 8
            },
            {
                name: '雙人床',
                size: 4
            },
            {
                name: '單人床',
                size: 3
            },
            {
                name: '碌架床',
                size: 6
            },
            {
                name: '子母床(可拆)',
                size: 6
            },
            {
                name: "摺床",
                size: 4
            },
            {
                name: '油壓床',
                size: 8
            },
            {
                name: '嬰兒床',
                size: 4
            },
            {
                name: '安樂椅',
                size: 9
            },
            {
                name: '坐地掛衣架',
                size: 5
            },
            {
                name: '床鋪',
                size: 4
            },
            {
                name: '床褥',
                size: 6
            }
            ]
        },
        {
            name: '廚房用品',
            items: [{
                name: '廚櫃',
                size: 10
            },
            {
                name: '雙門雪櫃',
                size: 9
            },
            {
                name: '三門雪櫃',
                size: 12
            },
            {
                name: '煮食爐',
                size: 4
            },
            {
                name: '微波爐/焗爐',
                size: 2
            },
            {
                name: '光波爐',
                size: 2
            },
            {
                name: '氣炸鍋',
                size: 2
            },
            {
                name: '上蓋式洗衣機',
                size: 5
            },
            {
                name: '前置式洗衣機',
                size: 5
            },
            {
                name: '乾衣機',
                size: 5
            },
            {
                name: '電熱水爐',
                size: 3
            },
            {
                name: '咖啡機',
                size: 3
            },
            {
                name: '抽油煙機',
                size: 4
            }, ,
            {
                name: '洗碗碟機',
                size: 5
            },
            ]
        },
        {
            name: '辦公室用品',
            items: [{
                name: 'L型寫字檯',
                size: 25
            },
            {
                name: '圍板',
                size: 30
            },
            {
                name: '會議檯',
                size: 50
            },
            {
                name: '大班椅',
                size: 9
            },
            {
                name: '文件鐵櫃',
                size: 6
            },
            {
                name: '打印機',
                size: 3
            },
            {
                name: '坐地影印機',
                size: 4
            },
            {
                name: '傳真機',
                size: 2
            },
            {
                name: '飲用水機',
                size: 3
            },
            {
                name: '貨架',
                size: 6
            },
            {
                name: '小抽屜櫃',
                size: 4
            },
            ]
        },
        {
            name: '書房用品',
            items: [{
                name: '書櫃',
                size: 6
            },
            {
                name: '書檯',
                size: 4
            },
            {
                name: '電腦檯',
                size: 3
            },
            {
                name: '電腦<br/>(主機及顯示屏)',
                size: 3
            },
            {
                name: '電腦椅',
                size: 4
            },
            {
                name: '健身器材',
                size: 6
            }
            ]
        },
        {
            name: '其他家庭用品',
            items: [{
                name: '窗口式冷氣機',
                size: 5
            },
            {
                name: '分體式冷氣機',
                size: 6
            },
            {
                name: '座地燈',
                size: 2
            },
            {
                name: '吊燈',
                size: 2
            },
            {
                name: '直立式鋼琴',
                size: 20
            },
            {
                name: '數碼鋼琴',
                size: 15
            },
            {
                name: '行李喼',
                size: 4
            },
            {
                name: '手推車',
                size: 4
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
                name: 'BB車',
                size: 4
            },
            {
                name: '單車',
                size: 9
            },
            {
                name: '夾萬',
                size: 2
            },
            {
                name: '按摩椅',
                size: 10
            },
            ]
        },
        ];
        const itemsWrapper = $("#content-wrapper");

        function selectStore() {
            //sum up all item values
            var sum = 0;
            $(".calculator-item-element-input").each(function (index, input) {
                sum += (Number($(this).val()) * Number($(this).attr("size")));
            })
            $(".store-select").removeClass('active');

            $("#sizeText").text( sum );
            if (sum <= 0) {
                return;
            }

            $(".store-select").removeClass('active');
            var label = '';
            if (sum > 0 && sum < 13) {
                label = "s";
            } else if (sum < 25) {
                label = "m";
            } else if (sum < 37) {
                label = "l";
            } else if (sum >= 37) {
                label = "xl";
            }
            const storeWrapper = $("#" + label + "-store");
            storeWrapper.addClass("active");
            if(label == "l" || label == "xl"){
                storeWrapper.parent().animate({
                    scrollLeft: "+=" + "1000px"
                }, "fast");
            }else{
                storeWrapper.parent().animate({
                    scrollLeft: "-=" + "1000px"
                }, "fast");
            }



        }

        $(document).on("click", ".calculator-category-title", function () {
            $("#category-menu").find(".active").removeClass("active");
            $(this).addClass("active");
            $(".calculator-elements-wrapper").hide();
            itemsWrapper.children(".calculator-elements-wrapper").eq($(this).attr('id')).show();
            // $(".store-select").removeClass('active');
            // itemsWrapper.html('');
            // categories[$(this).attr('id')].items.forEach(item => {
            //     itemsWrapper.append('<div class="flex relative calculator-item-element">' +
            //         '<span class="calculator-item-element-title color-primary absolute bottom-0 left-0">' + item.name + '</span>' +
            //         '<input type="number" class="calculator-item-element-input absolute bottom-0 right-0" min=0 max=20 size=' + item.size + ' />' +
            //         '</div>');
            // });
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


        // $(".store-select").click(function () {
        //     $(".store-select").removeClass('active');
        //     $(this).addClass("active");
        // });

        $(".store-select-button").click(function () {
            console.log("selected");
            window.location.href = '/branch-location?size=' + $(this).val();
        });



        function makeDeepLink() {
            var linkData = [];
            $(".calculator-item-element-input").each(function () {
                const value = Number($(this).val());
                if (value == 0) {
                    return true;
                }
                linkData.push(Number($(this).parent().attr("id").substr(4)));
                linkData.push(value);
            });
            console.log(JSON.stringify(linkData));

            const base64 = btoa(JSON.stringify(linkData));
            const link = window.location.href + "?data=" + base64;
            console.log(link);
            return link;
        }



        $(".share-link").click(function(e){
            e.preventDefault();
            $(this).attr("href", $(this).attr("data-init") + makeDeepLink());
            window.open($(this).attr('href'));
        });



        return function (_template) {
            const urlParams = new URLSearchParams(window.location.search);
            const urlData = urlParams.get('data');
            var preData = [];
            if (urlData) {
                try {
                    preData = JSON.parse(atob(urlData));
                } catch (e) {
                    console.log("error");
                }
            }

            const menu = $("#category-menu");
            menu.html('');
            var index = 0;
            var itemIndex = 0;
            itemsWrapper.html('');
            categories.forEach(category => {
                const active = index == 0 ? 'active' : '';
                menu.append('<div id="' + index + '" class="calculator-category-title color-primary cursor-pointer ' + active + '">' + category.name + '</div>');

                var content = _template;
                category.items.forEach(item => {
                    const id = "item" + (itemIndex++);
                    content += ('<div class="flex relative calculator-item-element" id="' + id + '">' +
                        '<span class="calculator-item-element-title color-primary absolute bottom-0 left-0">' + item.name + '</span>' +
                        '<input type="number" class="calculator-item-element-input absolute bottom-0 right-0" min=0 max=20 size=' + item.size + ' />' +
                        '</div>');
                });
                content += '</div>';

                itemsWrapper.append(content);

                index++;
            });
            $(".calculator-category-title:first").click();

            console.log(preData);
            for (var i = 0; i < preData.length; i += 2) {
                $("#item" + preData[i]).find("input").val(preData[i + 1]);
            }

            selectStore();
        }
    })();

    OneStorage.FAQ = (function () {
        return function () {
            const faqData = [{
                category: '聯絡我們',
                faqs: [{
                    question: '1. 我可以怎樣聯絡到至尊迷你倉?',
                    answer: '電話：(852) 2111 2636/電郵：cs@onestorage.com.hk或WhatsApp：(852) 54907251'
                },
                {
                    question: '2. 分店的參觀及繳費時間?',
                    answer: '敬請致電分店預約：星期一至五：上午10:00至下午7:00/星期六日及公眾假期：上午10:00至下午5:00'
                },
                {
                    question: '3. 在辨公時間以外，可以聯絡到你們嗎?',
                    answer: '在辦公時間以外，請致電2111 2636查詢熱線。'
                }
                ]
            },
            {
                category: '尺寸選擇',
                faqs: [{
                    question: '1. 我該選用多大的迷你倉?',
                    answer: '您可以自行使用空間計算器計算所需倉庫尺寸或聯絡我們的客戶服務專員為您推薦合適的方案。'
                },
                {
                    question: '2. 有什麼迷你倉尺寸可供選擇?',
                    answer: '各分店有多種不同尺寸迷你倉以供選擇，歡迎致電熱線21112636查詢。'
                }
                ]
            },
            {
                category: '實地參觀',
                faqs: [{
                    question: '1. 可以在租迷你倉之前參觀嗎？',
                    answer: '我們歡迎客人在租倉前先親臨分店實地參觀，了解分店實際情況。'
                },
                {
                    question: '2. 參觀迷你倉需要預約嗎？',
                    answer: '請在親臨各分店參觀前，請先致電2111 2636或直接聯絡各分店預約，如希望在星期六、日或公眾假期參觀，請於至少一個工作天前預約。'
                }
                ]
            },
            {
                category: '環境設施',
                faqs: [{
                    question: '1. 倉庫內的環境溫濕度情況怎樣？',
                    answer: '各分店配置了可靠的恆溫空調系統，24小時運作。'
                },
                {
                    question: '2. 至尊迷你倉內的消防設備怎樣？',
                    answer: '完全符合消防處消防指引。'
                },
                {
                    question: '3. 迷你倉內的安保情況怎樣？',
                    answer: '設有7 x 24小時智能保安進出系統、全天候高清保安監察及警報系統。'
                }
                ]
            },
            {
                category: '租倉合約',
                faqs: [{
                    question: '1. 租迷你倉需要付按金嗎？',
                    answer: '合約期1-2個月：按金為2個月的原價租金，3個月或以上合約期：按金為1個月原價租金。按金將於合約結束遷出後的30天內退回。'
                },
                {
                    question: '2. 如何繳付租金？',
                    answer: "客人可選擇以下方式付款：EPS、支票、信用卡'轉數快或免息分期。"
                },
                {
                    question: '3. 公司需要發票才能繳費，請問能否每月給我發票?',
                    answer: "每月繳費的客戶，我們將以電郵或者Whatsapp形式發送每月提供收費發票，但如果您是預繳計劃的客戶，本公司則不會提供每月發票。"
                },
                ]
            },
            {
                category: '入倉與存取',
                faqs: [{
                    question: '1. 租用迷你倉後，如何入倉或存取？',
                    answer: '客戶可利用智能卡隨時輕鬆進出迷你倉提存物件。'
                },
                {
                    question: '2. 迷你倉可以隨時提存物品嗎?',
                    answer: '可以，客戶可利用智能卡，24小時自助提存，隨時輕鬆進出迷你倉。'
                },
                {
                    question: '3. 有什麼東西不可以存放?',
                    answer: '客戶不能存放任何受法律管制儲存的有害或危險品，包括具爆炸性或易燃性的物品，幅射或化學品，非法物品或腐蝕性物品，食物或任何易變壞的物品，否則一切責任由客戶負責，本公司有權即時終止該合約及追討賠償，按金亦不會退還。'
                }
                ]
            },
            {
                category: '退倉及續約',
                faqs: [{
                    question: '1. 合約未到期，要提前結束合約怎麼辦？需要支付違約金嗎？',
                    answer: '若需提前終止合約，您已繳交的費用將不獲退還。'
                },
                {
                    question: '2. 在約滿後,想繼續使用,請問需要重新簽合約嗎?',
                    answer: '需要，合約到期前30日，分店職員將會聯絡客人，安排有關的續約事宜，並會重新簽訂合約。'
                },
                {
                    question: '3. 合約到期，如何辦理退倉手續？',
                    answer: '客人只要提前14日以電郵、電話或書面通知（客戶服務主任會以電郵形式確認退倉申請）。退倉當日備妥文件並審視倉庫狀況，按金將在退倉後的30天內退還。'
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

    OneStorage.Contact = (function(){
        return function(){
        }
    })();

    OneStorage.DOB = (function () {
        const mDays = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        const daySelector = $("#daySelector");
        function setDays() {
            const month = Number($("#monthSelector").val());
            const year = Number($("#yearSelector").val());
            const selectedDay = Number(daySelector.val());

            var days = mDays[month - 1];
            if (days == 28 && year % 4 == 0 && (year % 100 != 0 || year % 400 == 0)) {
                days = 29;
            }

            daySelector.html('<option value="" selected disabled>日</option>');
            for (var i = 1; i < days + 1; i++) {
                daySelector.append('<option value="' + i + '">' + i + '</option>')
            }

            daySelector.val(selectedDay > days ? "1" : selectedDay);
        }

        $("#monthSelector, #yearSelector").change(function () {
            setDays();
        })
        return function (initialDate) {
            daySelector.val(initialDate.getDate());
            $("#monthSelector").val(initialDate.getMonth() + 1);
            $("#yearSelector").val(initialDate.getFullYear());
        }
    })();

    OneStorage.Register = (function () {
        return function () {
            $('#password, #confirm_password').on('keyup', function () {
                if ($('#password').val() == $('#confirm_password').val()) {
                    $('#message').html('Matching').css('color', 'green');
                } else
                    $('#message').html('Not Matching').css('color', 'red');
            })

            $("#pwdShowToggle").click(function () {
                const inputPwd = $("#password");
                if ($(this).attr("state") == "show") {
                    $(this).attr("state", "hide");
                    $(this).attr("src", "images/contactUs/Image_39@2x.png");
                    inputPwd.attr("type", "password");
                } else {
                    $(this).attr("state", "show");
                    $(this).attr("src", "images/contactUs/Image_40@2x.png");
                    inputPwd.attr("type", "text");
                }
                inputPwd.focus();
            })

            $("#registerForm").submit(function (e) {
                $(".error-msg").hide();
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: $(this).serialize(),
                    datatype: 'json',
                    success: function (result) {
                        window.location.href = "/login";
                    },
                    error: function (error) {
                        if (error.responseJSON.type === "duplication") {
                            if(error.responseJSON.key !== 'phone'){
                                error.responseJSON.key = 'email';
                            }
                            $("#" + error.responseJSON.key + "DuplicateMsg").show();
                        }
                    }
                });
            })

            OneStorage.DOB(new Date(2000, 0, 1));

        };
    })();

    OneStorage.JoinUs = (function () {
        return function () {
            $(".fileupload-btn").click(function () {
                $(this).next().click();
            })

            $(".file-input").change(function () {
                if (this.files && this.files[0]) {
                    if (this.files[0].size > 6 * 1024 * 1024) {
                        alert("Max file size is 6M!");
                        $(this).val('');
                        return;
                    }
                }
                $(this).parent().parent().find(".file-name").text(this.files[0].name);
            })
        }
    })();
});

