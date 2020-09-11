@extends('backend.layouts.app')

@section('title')
<title>{{__('Stores')}}</title>
@endsection

@section('styles')
<style>
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
</style>

@endsection

@section('content')
<div class="bg-grey w-full h-screen pl-16 pr-5 pt-10 pb-24">
    <div class="w-4/5">
        <div class="flex justify-between mb-6">
            <div class="flex">
                <span class="font_25 mr-6">Stores</span>
                <img class="object-fill  cursor-pointer" id="addBtn" src="{{asset('images/icons8-plus-64@2x.png')}}" />
            </div>
            <div class="flex justify-between">
                <button type="submit" class="font_21 px-8 py-1 text-white mr-4" style="background-color: #B881FD;">儲存</button>
                <button type="button" id="deleteBtn" class="font_21 px-8 py-1 text-white mr-4" style="background-color: #FD8181;">刪除</button>
                <button type="reset" id="resetBtn" class="font_21 px-4 py-1 text-black">取消</button>
            </div>
        </div>

        <div class="w-1/2 mb-4 pr-4">
            <div class="w-full inline-block relative">
                <select id="branch-select" class="text-primary shadow-md block appearance-none w-full bg-white border border-gray-200 px-4 py-4 pr-8 leading-tight focus:outline-none">
                    <option value="" selected disabled class="text-grey">分店</option>
                    <?php $stores = App\Store::all() ?>
                    @foreach($stores as $store)
                    <option value="{{$store->branch}}" class="py-2 text-grey-2">{{$store->branch}}</option>
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
                <div class="bg-white w-full border border-primary shadow-lg p-5 mb-8">
                    <p class="font_26 mb-4">
                        詳細資料
                    </p>
                    <div class="px-2">
                        <textarea placeholder="" name="content" required rows="4" class="form-input w-full appearance-none bg-white border border-gray-300 p-2 text-base" id="content"></textarea>
                    </div>
                </div>
                <!-- <div class="bg-white w-full border border-primary shadow-lg p-5 mb-8">
                    <p class="font_26 mb-4">
                        詳細資料
                    </p>
                    <div class="px-2">
                        <div class="flex mb-4">
                            <span class="w-1/5 mt-1">
                                分店名
                            </span>
                            <input placeholder="" class="form-input w-full appearance-none bg-white border border-gray-300 p-2 text-base" name="title" type="text" id="title">
                        </div>
                        <div class="flex">
                            <span class="w-1/5 mt-1">
                                詳情
                            </span>
                            <textarea placeholder="" name="content" rows="3" class="form-input w-full appearance-none bg-white border border-gray-300 p-2 text-base" id="content"></textarea>
                        </div>
                    </div>
                </div> -->
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
                            <tr>
                                <td class="pb-4"><input class="table-input w-12" type="" /></td>
                                <td class="pb-4 flex justify-center">
                                    <input class="table-input w-12" type="" />
                                    <span class="mx-2">x</span>
                                    <input class="table-input w-12" type="" />
                                    <span class="mx-2">x</span>
                                    <input class="table-input w-12" type="" />
                                </td>
                                <td class="pb-4">
                                    <input class="table-input w-12" type="" />
                                </td>
                                <td class="pb-4">
                                    <input class="table-input w-12" type="" />
                                </td>
                            </tr>
                            <tr>
                                <td><input class="table-input w-12" type="" /></td>
                                <td class="flex justify-center">
                                    <input class="table-input w-12" type="" />
                                    <span class="mx-2">x</span>
                                    <input class="table-input w-12" type="" />
                                    <span class="mx-2">x</span>
                                    <input class="table-input w-12" type="" />
                                </td>
                                <td>
                                    <input class="table-input w-12" type="" />
                                </td>
                                <td>
                                    <input class="table-input w-12" type="" />
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>
                <div class="bg-white w-full border border-primary shadow-lg p-5 mb-8">
                    <p class="font_26 mb-4">
                        最新優惠
                    </p>
                    <div class="px-2">
                        <textarea placeholder="" name="content" required rows="8" class="form-input w-full appearance-none bg-white border border-gray-300 p-2 text-base" id="content"></textarea>
                    </div>
                </div>
                <div class="bg-white w-full border border-primary shadow-lg p-5 mb-8">
                    <div class="flex mb-4">
                        <span class="font_26 mr-4">
                            常見問題
                        </span>
                        <img class="object-fill my-auto w-7 h-7 cursor-pointer" id="addBtn" src="{{asset('images/icons8-plus-64@2x.png')}}" />
                    </div>
                    <div class="px-2">
                        <p class="mb-2">Question</p>
                        <textarea placeholder="" name="content" required rows="3" class="form-input w-full appearance-none bg-white border border-gray-300 p-2 text-base" id="content"></textarea>
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
                            <input placeholder="" class="form-input w-full appearance-none bg-white border border-gray-300 p-2 text-base" name="title" type="text" id="title">
                        </div>
                        <div class="flex mb-4">
                            <span class="w-1/3 mt-1">
                                Text above map
                            </span>
                            <textarea placeholder="" name="content" rows="3" class="form-input w-full appearance-none bg-white border border-gray-300 p-2 text-base" id="content"></textarea>
                        </div>
                        <div class="flex mb-4">
                            <span class="w-1/3 mt-1">
                                Text below map
                            </span>
                            <input placeholder="" class="form-input w-full appearance-none bg-white border border-gray-300 p-2 text-base" name="title" type="text" id="title">
                        </div>
                    </div>
                </div>

                <div class="bg-white w-full border border-primary shadow-lg p-5 mb-8">
                    <p class="font_26 mb-2">
                        服務設施
                    </p>
                    <div class="grid grid-cols-2 col-gap-2 row-gap-4 p-2">
                        <label><input class="mr-3" type="checkbox" />7 x 24智能保安進出系統</label>
                        <label><input class="mr-3" type="checkbox" />無間斷恆溫空調</label>
                        <label><input class="mr-3" type="checkbox" />消防裝置設備</label>
                        <label><input class="mr-3" type="checkbox" />鋁梯及手推車借用服務</label>
                        <label><input class="mr-3" type="checkbox" />自助飲用水機</label>
                        <label><input class="mr-3" type="checkbox" />全天候高清保安監察及警報系統</label>
                        <label><input class="mr-3" type="checkbox" />24小時電話熱線服務</label>
                        <label><input class="mr-3" type="checkbox" />免費Wi-Fi</label>
                    </div>
                </div>

                <div class="bg-white w-full border border-primary shadow-lg p-5 mb-8">
                    <p class="font_26 mb-4">
                        附近設施
                    </p>
                    <div class="px-2">
                        <textarea placeholder="" name="content" required rows="4" class="form-input w-full appearance-none bg-white border border-gray-300 p-2 text-base" id="content"></textarea>
                    </div>
                </div>
                <div class="bg-white w-full border border-primary shadow-lg p-5 mb-8">
                    <p class="font_26 mb-4">
                        開放時間
                    </p>
                    <div class="px-2">
                        <textarea placeholder="" name="content" required rows="4" class="form-input w-full appearance-none bg-white border border-gray-300 p-2 text-base" id="content"></textarea>
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
                        <input placeholder="" class="form-input w-full appearance-none bg-white border border-gray-300 p-2 text-base" name="title" type="text" id="title">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
@endsection