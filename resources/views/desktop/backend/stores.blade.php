@extends('backend.layouts.app')

@section('title')
<title>{{__('Stores')}}</title>
@endsection

@section('styles')
<style>
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

    .table-input {
        border-width: 1px;
        border-color: #d2d6dc;
        background-color: white;
        padding: 1px 3px 1px 3px;
    }

    .bk-active::after {
        content: url("../images/icons8-tick-box-48@2x.png");
        width: 24px;
        height: 24px;
        right: 0;
        top: 0;
        position: absolute;
        margin-left: 5px;
    }

    .background {
        width: 100%;
        height: 100px;
        opacity: 1;
        display: block;
        transition: .5s ease;
        backface-visibility: hidden;
    }

    .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, .6);
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);

    }

    .container:hover .background {
        opacity: 0.7;
    }

    .container:hover .middle {
        opacity: 1;
    }

    .container {
        position: relative;
    }


    .form-input {
        width: 100%;
    }
</style>

@endsection

@section('content')
<div class="bg-grey w-full h-screen pl-16 pr-5 pt-10 pb-24">
    <form class="w-4/5" id="storeForm" method="POST" action="{{url('/backend/store')}}" enctype="multipart/form-data">
        @csrf
        @if($selected_store)
        <input type="hidden" name="id" value="{{$selected_store->id}}" />
        <input type="hidden" name='_method' value="PUT">
        @endif

        <div class="flex justify-between mb-6">
            <div class="flex">
                <span class="font_25 mr-6">Stores</span>
                <button type="button" id="storeAddBtn"><img class="object-fill  cursor-pointer" id="addBtn" src="{{asset('images/icons8-plus-64@2x.png')}}" /></button>
            </div>
            <div class="flex justify-between">
                <button type="submit" class="font_21 px-8 py-1 text-white mr-4" style="background-color: #B881FD;">儲存</button>
                @if($selected_store)
                <button type="button" id="deleteBtn" class="font_21 px-8 py-1 text-white mr-4" style="background-color: #FD8181;">刪除</button>
                @endif
                <button type="reset" id="resetBtn" class="font_21 px-4 py-1 text-black">取消</button>
            </div>
        </div>

        <div class="w-1/2 mb-4 pr-4">
            <div class="w-full inline-block relative">
                <select id="branch-select" class="text-primary shadow-md block appearance-none w-full bg-white border border-gray-200 px-4 py-4 pr-8 leading-tight focus:outline-none">
                    <option value="" selected disabled class="text-grey">分店</option>
                    <?php $stores = App\Store::all() ?>
                    @foreach($stores as $store)
                    <option value="{{url('/backend/store/'.$store->id)}}" class="py-2 text-grey-2" {{($selected_store && ($selected_store->id == $store->id)) ? 'selected' : ''}}>
                        {{$store->branch}}
                    </option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                </div>
            </div>
        </div>

        <div class="flex">
            <div class="w-1/2 pr-4">
                <!-- <div class="bg-white w-full border border-primary shadow-lg p-5 mb-8">
                    <p class="font_26 mb-4">
                        詳細資料
                    </p>
                    <div class="px-2">
                        <textarea placeholder="" name="content" required rows="4" class="form-input" id="content"></textarea>
                    </div>
                </div> -->
                <div class="bg-white w-full border border-primary shadow-lg p-5 mb-8">
                    <p class="font_26 mb-4">
                        詳細資料
                    </p>
                    <div class="px-2">
                        <div class="flex mb-4">
                            <span class="w-1/5 mt-1">
                                分店名
                            </span>
                            <input placeholder="" value="{{$selected_store ? $selected_store->branch : ''}}" class="form-input" name="branch" type="text" required>
                        </div>
                        <div class="flex mb-4">
                            <span class="w-1/5 mt-1">
                                地區
                            </span>
                            <input placeholder="" value="{{$selected_store ? $selected_store->location : ''}}" class="form-input" name="location" type="text" required>
                        </div>
                        <div class="flex mb-4">
                            <span class="w-1/5 mt-1">
                                市郊
                            </span>
                            <input placeholder="" value="{{$selected_store ? $selected_store->suburb : ''}}" class="form-input" name="suburb" type="text">
                        </div>
                        <div class="flex">
                            <span class="w-1/5 mt-1">
                                詳情
                            </span>
                            <textarea placeholder="" name="detail" rows="3" class="form-input">{{$selected_store ? $selected_store->detail : ''}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="bg-white w-full border border-primary shadow-lg p-5 mb-8">
                    <p class="font_26 mb-4">
                        租用面積
                    </p>
                    <div class="px-2">
                        <table class="text0 w-full mb-8">
                            <tr class="table-heading text-left">
                                <th class="py-2">租用面積<br />
                                    (平方尺)</th>
                                <th class="text-center">約數尺寸</th>
                                <th>原價</th>
                                <th>會員價</th>
                            </tr>
                            @if($selected_store)
                            @foreach($selected_store->sizes as $key => $size)
                            <input type="hidden" name="s-{{$key}}-id" value="{{$size->id}}" />
                            <tr>
                                <td class="pb-4">
                                    <input class="table-input w-12" type="number" name="s-{{$key}}-size" value="{{$size->size}}" min=0 />
                                </td>
                                <td class="pb-4 flex justify-center">
                                    <input class="table-input w-12" type="number" name="s-{{$key}}-width" value="{{$size->width}}" step="0.01" min=0 />
                                    <span class="mx-2">x</span>
                                    <input class="table-input w-12" type="number" name="s-{{$key}}-height" value="{{$size->height}}" step="0.01" min=0 />
                                    <span class="mx-2">x</span>
                                    <input class="table-input w-12" type="number" name="s-{{$key}}-depth" value="{{$size->depth}}" step="0.01" min=0 />
                                </td>
                                <td class="pb-4">
                                    <input class="table-input w-12" type="number" name="s-{{$key}}-price" value="{{$size->price}}" step="0.01" min=0 />
                                </td>
                                <td class="pb-4">
                                    <input class="table-input w-12" type="number" name="s-{{$key}}-preprice" value="{{$size->prepaid_price}}" step="0.01" min=0 />
                                </td>
                            </tr>
                            @endforeach
                            @else
                            @for($i = 0; $i < 4; $i++) <tr>
                                <td class="pb-4"><input class="table-input w-12" name="s-{{$i}}-size" type="number" min=0 /></td>
                                <td class="pb-4 flex justify-center">
                                    <input class="table-input w-12" name="s-{{$i}}-width" type="number" step="0.01" min=0 />
                                    <span class="mx-2">x</span>
                                    <input class="table-input w-12" name="s-{{$i}}-height" type="number" step="0.01" min=0 />
                                    <span class="mx-2">x</span>
                                    <input class="table-input w-12" name="s-{{$i}}-depth" type="number" step="0.01" min=0 />
                                </td>
                                <td class="pb-4">
                                    <input class="table-input w-12" name="s-{{$i}}-price" type="number" step="0.01" min=0 />
                                </td>
                                <td class="pb-4">
                                    <input class="table-input w-12" name="s-{{$i}}-preprice" type="number" step="0.01" min=0 />
                                </td>
                                </tr>
                                @endfor
                                @endif
                        </table>
                    </div>

                </div>
                <div class="bg-white w-full border border-primary shadow-lg p-5 mb-8">
                    <p class="font_26 mb-4">
                        最新優惠
                    </p>
                    <div class="px-2">
                        <textarea placeholder="" name="latest_offer" rows="8" class="form-input">{{$selected_store ? $selected_store->latest_offer : ''}}</textarea>
                    </div>
                </div>
                <div class="bg-white w-full border border-primary shadow-lg p-5 mb-8">
                    <div class="flex mb-4">
                        <span class="font_26 mr-4">
                            常見問題
                        </span>
                        <button type="button" id="questionAddBtn"><img class="object-fill my-auto w-7 h-7 cursor-pointer" id="addBtn" src="{{asset('images/icons8-plus-64@2x.png')}}" /></button>
                    </div>
                    <div class="" id="questionWrapper">
                        @if($selected_store && count($selected_store->questions) > 0)
                        @foreach($selected_store->questions as $key => $question)
                        <div class="px-2 pt-2 mb-2 question {{$key != 0 ? 'border-t border-gray-100' : ''}}">
                            <input type="hidden" name="question{{$key}}-id" value="{{$question->id}}" />
                            <input placeholder="Question{{$key != 0 ? $key : ''}}" class="mb-4 form-input" type="text" name="question{{$key}}" value="{{$question->question}}">
                            <textarea placeholder="Answer{{$key != 0 ? $key : ''}}" rows="3" class="form-input" name="answer{{$key}}">{{$question->answer}}</textarea>
                        </div>
                        @endforeach
                        @else
                        <div class="px-2 mb-2 question">
                            <input placeholder="Question" class="mb-4 form-input" type="text" name="question0">
                            <textarea placeholder="Answer" rows="3" class="form-input" name="answer0"></textarea>
                        </div>
                        @endif
                    </div>

                </div>
            </div>
            <div class="w-1/2 pl-4">
                <div class="bg-white w-full border border-primary shadow-lg p-5 mb-8">
                    <p class="font_26 mb-4">
                        地址
                    </p>
                    <div class="px-2">
                        <div class="flex mb-4">
                            <span class="w-1/3 mt-1">
                                For google map
                            </span>
                            <input placeholder="" class="form-input" name="address" value="{{$selected_store ? $selected_store->address : ''}}" type="text" required>
                        </div>
                        <div class="flex mb-4">
                            <span class="w-1/3 mt-1">
                                Text above map
                            </span>
                            <textarea placeholder="" name="text_above_addr" rows="3" class="form-input">{{$selected_store ? $selected_store->text_above_addr : ''}}</textarea>
                        </div>
                        <div class="flex mb-4">
                            <span class="w-1/3 mt-1">
                                Text below map
                            </span>
                            <textarea placeholder="" name="text_below_addr" rows="3" class="form-input">{{$selected_store ? $selected_store->text_below_addr : ''}}</textarea>
                        </div>
                    </div>
                </div>

                <div class="bg-white w-full border border-primary shadow-lg p-5 mb-8">
                    <p class="font_26 mb-2">
                        服務設施
                    </p>
                    <div class="grid grid-cols-2 col-gap-2 row-gap-4 p-2">
                        <label><input class="mr-3" type="checkbox" name="service0" {{$selected_store && $selected_store->serviceState(0) ? 'checked' : ''}} />7 x 24智能保安進出系統</label>
                        <label><input class="mr-3" type="checkbox" name="service1" {{$selected_store && $selected_store->serviceState(1) ? 'checked' : ''}} />無間斷恆溫空調</label>
                        <label><input class="mr-3" type="checkbox" name="service2" {{$selected_store && $selected_store->serviceState(2) ? 'checked' : ''}} />消防裝置設備</label>
                        <label><input class="mr-3" type="checkbox" name="service3" {{$selected_store && $selected_store->serviceState(3) ? 'checked' : ''}} />鋁梯及手推車借用服務</label>
                        <label><input class="mr-3" type="checkbox" name="service4" {{$selected_store && $selected_store->serviceState(4) ? 'checked' : ''}} />自助飲用水機</label>
                        <label><input class="mr-3" type="checkbox" name="service5" {{$selected_store && $selected_store->serviceState(5) ? 'checked' : ''}} />全天候高清保安監察及警報系統</label>
                        <label><input class="mr-3" type="checkbox" name="service6" {{$selected_store && $selected_store->serviceState(6) ? 'checked' : ''}} />24小時電話熱線服務</label>
                        <label><input class="mr-3" type="checkbox" name="service7" {{$selected_store && $selected_store->serviceState(7) ? 'checked' : ''}} />免費Wi-Fi</label>
                    </div>
                </div>

                <div class="bg-white w-full border border-primary shadow-lg p-5 mb-8">
                    <p class="font_26 mb-4">
                        附近設施
                    </p>
                    <div class="px-2">
                        <textarea placeholder="" name="nearby_facilities" rows="4" class="form-input" id="content">{{$selected_store ? $selected_store->nearby_facilities : ''}}</textarea>
                    </div>
                </div>
                <div class="bg-white w-full border border-primary shadow-lg p-5 mb-8">
                    <p class="font_26 mb-4">
                        開放時間
                    </p>
                    <div class="px-2">
                        <textarea placeholder="" name="opening_hours" rows="4" class="form-input" id="content">{{$selected_store ? $selected_store->opening_hours : ''}}</textarea>
                    </div>
                </div>

                <div class="bg-white w-full border border-primary shadow-lg p-5 mb-10">
                    <p class="font_26 mb-2">
                        圖片
                    </p>
                    <!-- <p class="font_16 robert-regular mb-2">C:/Users/download/bg.jpg</p> -->


                    <p class="font_26 mb-4">
                        Video
                    </p>
                    <div class="flex mb-4 px-2">
                        <span class="w-1/5 mt-1 robert-regular">
                            Video Link
                        </span>
                        <input placeholder="" class="form-input" name="url" type="text">
                    </div>
                </div>
            </div>
        </div>
</div>

</div>
@endsection

@section('scripts')
<script>
    $(function() {
        $("#branch-select").change(function() {
            const branch = $(this).val();
            if (branch == "") {
                return;
            }
            window.location.href = branch;
        })

        $('#storeForm').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });
        
        $("#questionAddBtn").click(function() {
            const count = $(".question").length;
            if (count >= <?php echo App\Store::$_MAX_QUESTION_COUNT ?>) {
                return;
            }
            $("#questionWrapper").append('<div class="px-2 pt-2 mb-2 question border-t border-gray-100">' +
                '<input placeholder="Question' + count + '" class="mb-4 form-input" type="text" name="question' + count + '">' +
                '<textarea placeholder="Answer' + count + '" rows="3" class="form-input" name="answer' + count + '"></textarea>' +
                '</div>');
        })

        $("#storeAddBtn").click(function() {
            window.location.href = '<?php echo url('/backend/store') ?>';
        })

        $("#deleteBtn").click(function() {
            const id = <?php echo  $selected_store ? $selected_store->id : 0 ?>;
            if (id <= 0) {
                return;
            }
            if (confirm("Do you really want to delete this store-" + "<?= $selected_store ? $selected_store->branch : '' ?>" + "?")) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '<?= csrf_token() ?>'
                    }
                });


                $.ajax({
                    url: '/backend/store/' + id,
                    type: 'DELETE',
                    datatype: 'json',
                    success: function(result) {
                        if (result) {
                            window.location.href = '<?php echo url('/backend/store') ?>';
                        }
                    }
                });
            }
        });
    })
</script>
@endsection