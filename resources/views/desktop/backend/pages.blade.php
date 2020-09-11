@extends('backend.layouts.app')

@section('title')
<title>{{__('Pages')}}</title>
@endsection

@section('content')
<div class="bg-grey w-full h-screen pl-16 pr-5 pt-10 pb-24">
    <div class="mb-6">
        <div>
            <span class="font_25 mr-10">Pages</span>
            <!-- <span class="font_16">Frontpage</span> -->
        </div>
    </div>

    <div class="flex w-2/3">
        <div class="flex flex-col w-1/2">
            <div class="bg-white w-full border border-primary shadow-lg p-5 mb-10">
                <p class="font_26 mb-2">
                    首頁圖片
                </p>
                <p class="font_16 robert-regular mb-2">C:/Users/download/bg.jpg</p>
                <div class="flex mb-8">
                    <img class="mr-4" width="221" height="119" src="{{asset('images/Image-31-m@2x.jpg')}}" />
                    <button class="h-7 font_14 px-3 align-middle rounded border border-third bg-grey-2">選擇圖片</button>
                </div>
            </div>
            <div class="bg-white w-full border border-primary shadow-lg p-5">
                <p class="font_26 mb-2">
                    首頁圖片
                </p>
                <div class="grid grid-cols-2 col-gap-4 row-gap-2 p-4">
                    <label><input class="mr-3" type="checkbox" />優惠1</label>
                    <label><input class="mr-3" type="checkbox" />優惠2</label>
                    <label><input class="mr-3" type="checkbox" />優惠3</label>
                    <label><input class="mr-3" type="checkbox" />優惠4</label>
                    <label><input class="mr-3" type="checkbox" />優惠5</label>
                    <label><input class="mr-3" type="checkbox" />優惠6</label>
                    <label><input class="mr-3" type="checkbox" />優惠7</label>
                    <label><input class="mr-3" type="checkbox" />優惠8</label>
                </div>
            </div>
        </div>
        <div class="w-1/2 h-auto ml-12">
            <div class="bg-white h-full border border-primary shadow-lg px-10 py-5">
                <p class="font_26 mb-2">
                    圖片
                </p>
                <p class="font_16 robert-regular mb-2">C:/Users/download/bg.jpg</p>
                <div class="flex mb-4">
                    <img class="mr-4" width="122" height="122" src="{{asset('images/Image82@2x.png')}}" />
                    <div class="flex flex-col justify-between ml-20">
                        <button class="h-7 font_14 px-3 align-middle rounded border border-third bg-grey-2">選擇圖片</button>
                        <label class="robert-regular"><input class="mr-3" type="checkbox" />Use as promo</label>
                    </div>
                </div>
                <div>
                    <div class="mb-4">
                        <p class="font_26 mb-2">題目</p>
                        <input placeholder="Title" class="form-input w-full appearance-none bg-white border border-gray-300 p-2 text-base" name="name" required type="text">
                    </div>
                    <div>
                        <p class="font_26 mb-2">題目</p>
                        <textarea placeholder="Content" rows="4" class="form-input w-full appearance-none bg-white border border-gray-300 p-2 text-base"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection