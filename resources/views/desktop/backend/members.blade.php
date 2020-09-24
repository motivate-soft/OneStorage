@extends('backend.layouts.app')

@section('title')
<title>{{__('Members')}}</title>
@endsection

@section('styles')
<style>
    .member-info.active{
        background-color: #e0e0e0;
    }
</style>
@endsection

@section('content')
<div class="bg-grey w-full h-screen pl-16 pr-5 pt-10 pb-24">
    <div class="flex justify-between">
        <a href="{{url('/backend/members')}}" class="font_25 mb-6">Members</a>
        @include('backend.partials.searchbar')
    </div>

    <div class="bg-white h-full">
        <table class="w-full bg-white" id="content">
            <tr class="table-heading shadow-lg border border-primary">
                <th class="py-5 border-r border-second">註冊日期</th>
                <th class="py-5 border-r border-second">客人資料</th>
                <th class="py-5 border-r border-second">註冊渠道</th>
                <th class="py-5 border-r border-second">查詢</th>
            </tr>
            @foreach($members as $user)
            <tr class="member-info border-b border-third align-top cursor-pointer">
                <td class="item-column">
                    <?php
                    $date = new DateTime($user->created_at);
                    ?>
                    <p class="mb-1">{{$date->format('H:i Y-m-d')}}</p>
                    <p>M{{str_pad($user->id, 5, '0', STR_PAD_LEFT)}}</p>
                </td>
                <td class="item-column robert-regular">
                    <div class="grid grid-cols-2 col-gap-2 mb-3">
                        <div class="flex">
                            <img class="object-none mr-2" src="{{asset('images/ic-account.png')}}" />
                            <span class="my-auto">{{$user->first_name.' '.$user->last_name}}</span>
                        </div>
                        <div class="my-auto">
                            <span class="robert-black">D.O.B: </span>
                            <?php
                            $birthday = new DateTime($user->birthday);
                            ?>
                            <span>{{$birthday->format('d M Y')}}</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 col-gap-2 mb-3">
                        <div class="flex">
                            <img class="object-none mr-2" src="{{asset('images/ic-phone.png')}}" />
                            <span class="my-auto">{{$user->phone}}</span>
                        </div>
                        <div class="my-auto">
                            <span class="robert-black">Preferred: </span>
                            <span>Whatsapp</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 col-gap-2 mb-3">
                        <div class="flex">
                            <img class="object-none mr-2" src="{{asset('images/ic-email.png')}}" />
                            <span class="my-auto">{{$user->email}}</span>
                        </div>
                        <div class="my-auto">
                            <span class="robert-black">Returning: </span>
                            <span>{{$user->is_soundwill_member ? 'SoundWill' : '-'}} <br />{{$user->is_existing_customer ? 'OneStorage (分店)' : '-'}}</span>
                        </div>
                    </div>
                    <div class="flex">
                        <img class="object-none mr-2" src="{{asset('images/ic-building.png')}}" />
                        <span class="my-auto">{{$user->address_line1}}</span>
                    </div>
                </td>
                <td class="item-column align-middle text-center">
                    <p class="font_19">{{$user->contact_method}}</p>
                </td>
                <td class="item-column">
                    <p>E00001, E00002, E00003</p>
                </td>
            </tr>
            @endforeach
        </table>
        <div class="py-2 bg-white">
            {{ $members->links() }}
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $("#export2Excel").click(function() {
        var table = $("#content").clone();
        table.find("img").remove();
        Excel.export(table.html());
    })
    $(".member-info").click(function() {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
        }
    })
</script>
@endsection