@extends('layouts.app')

@section('title')
<title>{{__('空間計算器')}}</title>
@endsection

@section('styles')
<style>
    .w-120 {
        width: 30rem;
    }
</style>

@endsection

@section('accessory')
@include('partials.accessory')
@endsection

@section('content')
@if($blog)
<div class="bg-white mx-auto w-3/5 pb-10 mt-40 mb-10">
    <div class="grid lg:grid-cols-3 md:grid-cols-1 gap-4">
        <div class="col-span-2 mr-10 lg:mr-0">
            <div class="text-left text-5xl pt-10 pb-5 ml-10 border-b">
                <h1 class="font_36 text-purple">{{$blog->title}}</h1>
                <p class="text2 text-xl mt-4">{{$blog->created_at->format('F j, Y')}}</p>
            </div>
            <div class="text-left ml-10 mt-5">
                <img class="pb-4" src="{{asset($blog->image)}}" class="mt-4">
                <div class="bg-grey-1 py-5 px-5">
                    <h1 class="font_19 robert-black text-justify leading-normal">
                        <?php echo nl2br($blog->content) ?>
                    </h1>
                </div>
            </div>
        </div>
        <div class="md:col-span-1 col-span-2 mx-10 lg:mx-0">
            <div class="text-left pt-10 pb-5">
                <div class="text-3xl">
                    <h1 class="font_29 pt-4">其他資訊</h1>
                </div>
                <a href="javascript:void(0)" class="flex  rounded-lg mt-2 lg:py-3  px-2">
                    <img class="h-24 ml-0 mb-4" src="{{asset('images/latest_news/Image 35.png')}}">
                    <div class="text-left">
                        <p class="font_19 md:text-left lg:text-left leading-normal px-3 ">
                            【搬屋冇煩惱】搬屋前一定要知嘅小貼士
                        </p>
                    </div>
                </a>
                <div class="rounded-lg  px-2">
                    <hr>
                </div>
                <a href="javascript:void(0)" class="flex  rounded-lg mt-2 lg:py-3  px-2">
                    <img class="h-24 ml-0 mb-4" src="{{asset('images/latest_news/Image 35.png')}}">
                    <div class="text-left">
                        <p class="font_19 md:text-left lg:text-left leading-normal px-3 ">
                            政府派1萬蚊 點先最快收到錢？ </p>
                    </div>
                </a>
                <div class="rounded-lg  px-2">
                    <hr>
                </div>
                <a href="javascript:void(0)" class="flex  rounded-lg mt-2 lg:py-3  px-2">
                    <img class="h-24 ml-0 mb-4" src="{{asset('images/latest_news/Image 35.png')}}">
                    <div class="text-left">
                        <p class="font_19 md:text-left lg:text-left leading-normal px-3 ">
                            蝸居套房 </p>
                    </div>
                </a>
                <div class="rounded-lg  px-2">
                    <hr>
                </div>
                <a href="javascript:void(0)" class="flex rounded-lg mt-2 lg:py-3 px-2">
                    <img class="h-24  ml-0 mb-4" src="{{asset('images/latest_news/Image 35.png')}}">
                    <div class="text-left">
                        <p class="font_19 md:text-left lg:text-left leading-normal px-3 ">
                            迷你倉點揀好 - 2020年四大安全注意要點
                        </p>
                    </div>
                </a>

            </div>

        </div>
    </div>
</div>

<div class="bg-white mx-auto w-3/5 pt-14 pb-10 mb-10">
    <div class="w-1/3 mx-auto">
        <form id="enquiryForm" class="form-enquiry" method="post" action="{{url('/enquiry')}}">
            @csrf
            <input type="hidden" name="page" value="News">
            <p class="text2 mb-8">給我們留言</p>
            <div class="flex mb-4 w-full">
                <div class="flex w-1/2 input-group">
                    <img class="form-control-icon" src="{{asset('images/contactUs/icons8-account-50@2x.png')}}" alt="Mobile">
                    <input class="w-full input-form form-control" type="text" placeholder="姓" name="firstName" required>
                </div>
                <div class="w-1/2 flex input-group">
                    <input class="w-full input-form form-control" style="margin-left: 4px;padding-left:12px" type="text" placeholder="名" name="lastName" required>
                </div>
            </div>

            <div class="input-group mb-4">
                <img class="form-control-icon" src="{{asset('images/contactUs/icons8-phone-50@2x.png')}}" alt="Mobile">
                <input class="form-control input-form" type="text" placeholder="" name="phoneNumber">
            </div>

            <div class="w-full inline-block relative mb-6">
                <select class="block input-form appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" style="color:#76838f" name="branchName">
                    <option value="" selected disabled>分店</option>
                    <?php
                    $branches = App\Store::select('branch')->get();
                    ?>
                    @foreach($branches as $branch)
                    <option value="{{$branch->branch}}">{{$branch->branch}}</option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                </div>
            </div>

            <div class="w-full inline-block relative mb-6">
                <select class="block input-form appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" style="color:#76838f" name="question">
                    <option value="" selected>查詢問題</option>
                    <option value="請問那裡有分店？">請問那裡有分店？</option>
                    <option value="我要預約參觀？">我要預約參觀？</option>
                    <option value="請問尺寸及價錢如何？">請問尺寸及價錢如何？</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                </div>
            </div>

            <textarea class="w-full input-form border placeholder-gray-600 px-3 py-2 border-gray-200 mb-6" style="padding-left:16px;color:#76838f" type="text" placeholder="你的信息" rows="3" name="message"></textarea>

            <button class="submit-btn input-form hover:bg-purple-400">
                送出
            </button>
        </form>
    </div>
</div>
@else
<div class="text-center text-4xl py-36">
    No data
</div>
@endif
@endsection


@section('scripts')
<script>
    $(function() {
        $("#enquiryForm").submit(function(e) {
            e.preventDefault();
            var form = $(this);
            if (form.attr("state") === "sent") {
                return;
            }
            var submitBtn = form.find("button");
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                datatype: 'json',
                success: function(result) {
                    submitBtn.css("background-color", "#28e8db");
                    submitBtn.prop('disabled', true);
                    submitBtn.text("已送出");
                    form.find(".input-form").prop('disabled', true);
                    form.attr("state", "sent");
                }
            });
        })
    });
</script>
@endsection

@section('footer')
@include('layouts.footer')
@endsection