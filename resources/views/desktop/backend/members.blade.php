@extends('backend.layouts.app')

@section('title')
<title>{{__('Members')}}</title>
@endsection

@section('styles')
<style>
    .member-info.active {
        background-color: #e0e0e0;
    }

    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 10px;
        border: 1px solid #888;
        /* width: 80%; */
        max-width: 450px;

    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 20px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
</style>
@endsection

@section('content')
<div class="bg-grey w-full h-screen pl-16 pr-5 pt-10 pb-24">
    <div class="flex justify-between">
        <a href="{{route('backend.members')}}" class="font_25 mb-6">{{ __('backend_members.title') }}</a>
        @include('backend.partials.searchbar')
    </div>

    <div class="bg-white h-full overflow-x-auto">
        <table class="w-full bg-white flex-shrink-0 whitespace-no-wrap" id="content" style="min-width: 1000px">
            <tr class="table-heading shadow-lg border border-primary robert-regular">
                <th class="py-5 border-r border-second">{{ __('backend_members.regDate') }}</th>
                <th class="py-5 border-r border-second">{{ __('backend_members.profile') }}</th>
                <th class="py-5 border-r border-second">{{ __('backend_members.regChannel') }}</th>
                <th class="py-5 border-r border-second">{{ __('backend_members.inquire') }}</th>
                <th class="py-5 border-r border-second">
                    <label class="cursor-pointer">
                        {{ __('backend_members.selectAll') }}
                        <input class="checkbox ml-1" id="selectAll" type="checkbox" />
                    </label>
                </th>
            </tr>
            @foreach($members as $member)
            <tr class="member-info border-b border-third align-top" data-id="{{$member->user_id}}">
                <td class="item-column">
                    <?php
                    $date = new DateTime($member->created_at);
                    ?>
                    <p class="mb-1">{{$date->format('H:i Y-m-d')}}</p>
                    <p>M{{str_pad($member->user_id, 5, '0', STR_PAD_LEFT)}}</p>
                </td>
                <td class="item-column robert-regular flex justify-between">
                    <div class="w-4/5">
                        <div class="grid grid-cols-2 col-gap-2 mb-3">
                            <div class="flex">
                                <img class="object-none mr-2" src="{{asset('images/ic-account.png')}}" />
                                <span class="my-auto">{{$member->first_name.' '.$member->last_name}}</span>
                            </div>
                            <div class="my-auto">
                                <span class="robert-black">D.O.B: </span>
                                <?php
                                $birthday = new DateTime($member->birthday);
                                ?>
                                <span>{{$birthday->format('d M Y')}}</span>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 col-gap-2 mb-3">
                            <div class="flex">
                                <img class="object-none mr-2" src="{{asset('images/ic-phone.png')}}" />
                                <span class="my-auto">{{$member->phone}}</span>
                            </div>
                            <div class="my-auto">
                                <span class="robert-black">Preferred: </span>
                                <span>Whatsapp</span>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 col-gap-2 mb-3">
                            <div class="flex">
                                <img class="object-none mr-2" src="{{asset('images/ic-email.png')}}" />
                                <span class="my-auto">{{$member->email}}</span>
                            </div>
                            <div class="my-auto">
                                <span class="robert-black">{{ __('backend_members.returning') }}: </span>
                                <span>{{$member->is_soundwill_member ? 'SoundWill' : '-'}} <br />{{$member->is_existing_customer ? 'OneStorage (分店)' : '-'}}</span>
                            </div>
                        </div>
                        <div class="flex">
                            <img class="object-none mr-2" src="{{asset('images/ic-building.png')}}" />
                            <span class="my-auto">{{$member->address_line1}}</span>
                        </div>
                    </div>
                    <div>
                        <img src="{{asset('images/icons8-edit-48@2x.png')}}" class="z-20 inline mx-auto edit-btn cursor-pointer" />
                    </div>
                </td>
                <td class="item-column align-middle text-center">
                    <p class="font_19">{{$member->contact_method}}</p>
                </td>
                <td class="item-column">
                    @foreach($member->enquiries as $index => $enquiry )
                    <span class="mr-2">

                        @if($index % 3 == 0)
                        <br />
                        @endif
                        E{{str_pad($enquiry->id, 6, '0', STR_PAD_LEFT)}}
                    </span>
                    @endforeach
                </td>
                <td class="mt-4">
                    <div class="mt-8 flex justify-center">
                        <input class="cursor-pointer select-row checkbox w-1/2 mx-auto" type="checkbox" data-id='{{$member->user_id}}' />
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
        <div class="py-2 bg-white">
            {{ $members->links() }}
        </div>
    </div>
</div>

<div id="confirmModal" class="z-50 modal">
    <div class="modal-content">
        <span class="close" id="modalClose">&times;</span>
        <form class="flex register-form1 my-8" method="POST" action="{{route('backend.members.update')}}">
            @csrf
            <input type="hidden" name="id" />
            <div class="w-full mx-4">
                <p style="color: red;" class="mb-4">*</p>
                <div class="flex mb-4 w-full">
                    <div class="flex w-1/2 input-group">
                        <img class="form-control-icon" src="{{asset('images/contactUs/icons8-account-50@2x.png')}}" alt="Mobile">
                        <input class="w-full form-control appearance-none" type="text" placeholder="{{ __('backend_members.lastName') }}" name="firstName" required>
                    </div>
                    <div class="w-1/2 flex input-group">
                        <input class="w-full form-control" style="margin-left: 4px;padding-left:12px" type="text" placeholder="{{ __('backend_members.firstName') }}" name="lastName" required>
                    </div>
                </div>


                <div class="input-group mb-4">
                    <img class="form-control-icon" src="{{asset('images/contactUs/icons8-phone-50@2x.png')}}" alt="Mobile">
                    <input class="form-control" type="text" placeholder="{{ __('backend_members.telephone') }}" name="phone" required>
                </div>

                <div class="input-group mb-4">
                    <img class="form-control-icon" src="{{asset('images/contactUs/icons8-email-50@2x.png')}}" alt="Mobile">
                    <input class="form-control" type="email" placeholder="{{ __('backend_members.email') }}" name="email" required>
                </div>

                <div class="date-group">

                    <p class="date-title">{{ __('backend_members.DOB') }}</p>

                    <div class=" date-component">
                        <div class="inline-block relative">
                            <select id="daySelector" class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" aria-placeholder="日" name="day" required>
                                <option value="" selected disabled>{{ __('backend_members.day') }}</option>
                                @for($i = 1; $i < 32; $i++) <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                            </div>
                        </div>
                    </div>

                    <div class=" date-component">
                        <div class="inline-block relative">
                            <select id="monthSelector" class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" name="month" required>
                                <option value="" selected disabled>{{ __('backend_members.month') }}</option>
                                @for($i = 1; $i < 13; $i++) <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                            </div>
                        </div>
                    </div>

                    <div class=" date-component">
                        <div class="inline-block relative">
                            <select id="yearSelector" class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" name="year" required>
                                <option value="" selected disabled>{{ __('backend_members.year') }}</option>
                                @for($i = 1990; $i < 2021; $i++) <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                            </div>
                        </div>
                    </div>
                </div>

                <input class="w-full form-control mb-6" style="padding-left:16px" type="text" placeholder="{{ __('backend_members.addressLine1') }}" name="addr1">

                <!-- <div class="w-full inline-block relative mb-6">
                    <select class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" name="contactMethod">
                        <option value="" selected disabled>最佳聯絡方式</option>
                        <option value="Whatsapp">Whatsapp</option>
                        <option value="Email">Email</option>
                        <option value="Call">Call</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                    </div>
                </div> -->

                <div class="radio-group">
                    <p class="radio-title w-4/6">{{ __('backend_members.isCustomer') }}</p>

                    <div class="radio-custom w-1/6">
                        <input type="radio" id="storageyesunchecked" class="radio-gray" value="1" name="isCustomer">
                        <label for="storageyesunchecked" class="radio-label">{{ __('backend_members.yes') }}</label>
                    </div>
                    <div class="radio-custom w-1/6">
                        <input type="radio" id="storagenochecked" class="radio-gray" value="0" name="isCustomer">
                        <label for="storagenochecked" class="radio-label">{{ __('backend_members.no') }}</label>
                    </div>
                </div>

                <div class="radio-group">
                    <p class="radio-title w-4/6">{{ __('backend_members.isMemberSoundWill') }}</p>

                    <div class=" radio-custom w-1/6">
                        <input type="radio" id="clubyesunchecked" class="radio-gray" value="1" name="isMember">
                        <label for="clubyesunchecked" class="radio-label">{{ __('backend_members.yes') }}</label>
                    </div>
                    <div class=" radio-custom w-1/6">
                        <input type="radio" id="clubnochecked" class="radio-gray" value="0" name="isMember">
                        <label for="clubnochecked" class="radio-label">{{ __('backend_members.no') }}</label>
                    </div>
                </div>

                <button class="submit-btn hover:bg-purple-400 mt-4">
                    {{ __('backend_members.update') }}
                </button>
            </div>


        </form>

    </div>
</div>

@endsection

@section('scripts')
<script>
    const confirmModal = document.getElementById("confirmModal");


    function selectionChange() {

        if ($("#selectAll").prop('checked')) {
            window.localStorage.setItem(allKey, "1");
            window.localStorage.setItem(key, []);
        } else {
            window.localStorage.setItem(allKey, "0");
            var ids = window.localStorage.getItem(key);
            if (ids == null || ids.length == 0) {
                ids = [];
            } else {
                ids = ids.split(',');
            }

            $(".select-row").each(function() {
                const id = $(this).attr('data-id');
                const index = ids.indexOf(id);
                if (index > -1 && !$(this).prop('checked')) {
                    ids.splice(index, 1);
                } else if (index == -1 && $(this).prop('checked')) {
                    ids.push(id);
                }
            })
            window.localStorage.setItem(key, ids);
            console.log(ids);
        }
    }

    function setSelection() {
        var ids = window.localStorage.getItem(key);
        if (ids == null || ids.length == 0) {
            ids = [];
        } else {
            ids = ids.split(',');
        }
        for (var i = 0; i < ids.length; i++) {
            $(".select-row[data-id='" + ids[i] + "']").click();
        }

        if (window.localStorage.getItem(allKey) == "1") {
            $("#selectAll").click();
        }
    }



    $("#selectAll").change(function() {
        if ($(this).prop('checked')) {
            $(".member-info").addClass("active");
            $(".select-row").prop('checked', true);
        } else {
            $(".member-info").removeClass("active");
            $(".select-row").prop('checked', false);
        }
    })

    $("#export2Excel").click(function() {
        var table = $("#content").clone();
        table.find("img").remove();
        Excel.export(table.html());
    })
    $(".select-row").change(function() {
        if ($(this).prop('checked')) {
            $(this).closest('tr').addClass('active');
        } else {
            $(this).closest('tr').removeClass('active');
            $("#selectAll").prop('checked', false);
        }
        // selectionChange();
    })
    $(".edit-btn").click(function(e) {
        e.preventDefault();
        const id = $(this).closest('tr').attr('data-id');
        $.ajax({
            url: '/backend/member/' + id,
            type: 'GET',
            datatype: 'json',
            success: function(data) {
                if (data) {
                    console.log(data);
                    $('input[name="id"]').val(data.id);
                    $('input[name="firstName"]').val(data.first_name);
                    $('input[name="lastName"]').val(data.last_name);
                    $('input[name="phone"]').val(data.phone);
                    $('input[name="email"]').val(data.email);
                    $('input[name="addr1"]').val(data.profile.address_line1);

                    if (data.profile.is_existing_customer != '-') {
                        $("#storageyesunchecked").prop("checked", true);
                        $("#storagenochecked").removeAttr("checked");
                    } else {
                        $("#storagenochecked").prop("checked", true);
                        $("#storageyesunchecked").removeAttr("checked");
                    }

                    if (data.profile.is_soundwill_member != '-') {
                        $("#clubyesunchecked").prop("checked", true);
                        $("#clubnochecked").removeAttr("checked");
                    } else {
                        $("#clubnochecked").prop("checked", true);
                        $("#clubyesunchecked").removeAttr("checked");
                    }
                    // $('input[name="contactMethod"]').val(data.profile.contact_method);

                    OneStorage.DOB(new Date(data.profile.birthday));

                    confirmModal.style.display = "block";
                }
            }
        });


    });

    $("#modalClose").click(function() {
        confirmModal.style.display = "none"
    });

    window.onclick = function(event) {
        if (event.target == confirmModal) {
            confirmModal.style.display = "none"
        }
    }

    window.onbeforeunload = function(event) {
        // do stuff here
        selectionChange();
        return "you have unsaved changes. Are you sure you want to navigate away?";
    };

    $(function() {
        OneStorage.DOB(new Date(2000, 1, 1));
        setSelection();
    })
</script>
@endsection
