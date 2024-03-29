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

    .image-active::after {
        content: url("{{asset('images/icons8-tick-box-48@2x.png')}}");
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
    <form class="w-4/5" id="storeForm" method="POST" action="{{route('backend.stores.store')}}" enctype="multipart/form-data">
        @csrf
        @if($selected_store)
        <input type="hidden" name="id" value="{{$selected_store->id}}" />
        <input type="hidden" name='_method' value="PUT">
        @endif

        <div class="flex justify-between mb-6">
            <div class="flex">
                <span class="font_25 mr-6">{{ __('backend_stores.title') }}</span>
                <button type="button" id="storeAddBtn"><img class="object-fill  cursor-pointer" id="addBtn" src="{{asset('images/icons8-plus-64@2x.png')}}" /></button>
            </div>
            <div class="flex justify-between">
                <button type="submit" class="font_21 px-8 py-1 text-white mr-4" style="background-color: #B881FD;">{{ __('backend_stores.save') }}</button>
                @if($selected_store)
                <button type="button" id="deleteBtn" class="font_21 px-8 py-1 text-white mr-4" style="background-color: #FD8181;">{{ __('backend_stores.delete') }}</button>
                @endif
                <button type="reset" id="resetBtn" class="font_21 px-4 py-1 text-black">{{ __('backend_stores.cancel') }}</button>
            </div>
        </div>

        <div class="flex">
            <div class="w-1/2 mb-4 pr-4">
                <div class="w-full inline-block relative">
                    <select id="branch-select" class="text-primary shadow-md block appearance-none w-full bg-white border border-gray-200 px-4 py-4 pr-8 leading-tight focus:outline-none">
                        <option value="" selected disabled class="text-grey">{{ __('backend_stores.branch') }}</option>
                        <?php $stores = App\Store::all() ?>
                        @foreach($stores as $store)
                            <option value="{{route('backend.stores.show', $store->id)}}" class="py-2 text-grey-2" {{($selected_store && ($selected_store->id == $store->id)) ? 'selected' : ''}}>
                                {{$store->branch ? $store->branch : $store->_id}}
                            </option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                    </div>
                </div>
            </div>
            <div class="w-1/2 mb-4 pl-4">
                <div class="w-full inline-block relative">
                    <select id="order-select" class="text-primary shadow-md block appearance-none w-full bg-white border border-gray-200 px-4 py-4 pr-8 leading-tight focus:outline-none">
                        <option value="" selected disabled class="text-grey">Order of Stores</option>
                        <?php $orderOptions = \App\Helper\Helper::$STORE_ORDER_OPTIONS ?>
                        @foreach($orderOptions as $orderOption)
                            <option value="{{$orderOption['value']}}" class="py-2 text-grey-2" {{(App\AppConfig::first()->store_order == $orderOption['value']) ? 'selected' : ''}}>
                                {{$orderOption['name']}}
                            </option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                    </div>
                </div>
            </div>
        </div>


        <div class="flex">
            <div class="w-1/2 pr-4">
                <div class="bg-white w-full border border-primary shadow-lg p-5 mb-8">
                    <p class="font_26 mb-4">
                        {{ __('backend_stores.details') }}
                    </p>
                    <div class="px-2">
                        <div class="flex mb-4">
                            <span class="w-1/5 mt-1">
                                {{ __('backend_stores.id') }}
                            </span>
                            <input placeholder="" value="{{$selected_store ? $selected_store->_id : ''}}" class="form-input" name="_id" type="text" required>
                        </div>
                        <div class="flex mb-4">
                            <span class="w-1/5 mt-1">
                                {{ __('backend_stores.branchName') }}
                            </span>
                            <input placeholder="" value="{{$selected_store ? $selected_store->branch : ''}}" class="form-input" name="branch" type="text" required>
                        </div>
                        <div class="flex mb-4">
                            <span class="w-1/5 mt-1">
                                {{ __('backend_stores.area') }}
                            </span>
                            <input placeholder="" value="{{$selected_store ? $selected_store->location : ''}}" class="form-input" name="location" type="text" required>
                        </div>
                        <div class="flex mb-4">
                            <span class="w-1/5 mt-1">
                                {{ __('backend_stores.suburbs') }}
                            </span>
                            <input placeholder="" value="{{$selected_store ? $selected_store->suburb : ''}}" class="form-input" name="suburb" type="text">
                        </div>
                        <div class="flex">
                            <span class="w-1/5 mt-1">
                                {{ __('backend_stores.more') }}
                            </span>
                            <textarea placeholder="" name="detail" rows="3" class="form-input">{{$selected_store ? $selected_store->detail : ''}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="bg-white w-full border border-primary shadow-lg p-5 mb-8">
                    <p class="font_26 mb-4">
                        {{ __('backend_stores.leaseArea') }}
                    </p>
                    <div class="px-2">
                        <table class="text0 w-full mb-8">
                            <tr class="table-heading text-left robert-regular">
                                <th class="py-2">{{ __('backend_stores.leaseArea') }}<br />
                                    ({{ __('backend_stores.sqFt') }})</th>
                                <th class="text-center">{{ __('backend_stores.approxSize') }}</th>
                                <th>{{ __('backend_stores.originalPrice') }}</th>
                                <th>{{ __('backend_stores.memberPrice') }}</th>
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
                        {{ __('backend_stores.lastOffer') }}
                    </p>

                    <div class="px-2">
                        <div class="image-uploader grid grid-cols-3 row-gap-2 col-gap-2 mb-4">
                            <input type="hidden" name="delete-offerImages" class="initial delete-images" value="" />
                            <input type="hidden" name="active-offerImages" class="active-images" value="{{$selected_store ? $selected_store->activeOfferImages() : ''}}" />
                            @if($selected_store)
                            @foreach($selected_store->offerImages as $image)
                            <div class="container original-image {{$image->is_used ? 'image-active' : ''}}" data-image-id="{{$image->id}}">
                                <img class="background" src="{{asset('images/offers/'.$image->image)}}" />
                                <div class="middle flex justify-center">
                                    <div class="flex flex-col justify-center">
                                        <button type="button" class="mx-4 my-auto cursor-pointer img-del-btn"><img class="object-none" src="{{asset('images/icons8-delete-bin-48@2x.png')}}" /></button>
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <button type="button" class="mx-4 my-auto cursor-pointer img-sel-btn"><img class="object-none" src="{{asset('images/icons8-tick-box-48@2x.png')}}" /></button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                            <div class="flex flex-col justify-center mr-4 img-add-wrapper">
                                <img class="object-fill mx-auto cursor-pointer img-add-btn" src="{{asset('images/icons8-plus-64@2x.png')}}" />
                                <input type="file" data-name="offerImages[]" name="image" class="hidden img-input" accept=".jpg,.png,.gif" />
                            </div>
                        </div>
                        <textarea placeholder="" name="latest_offer" rows="8" class="form-input">{{$selected_store ? $selected_store->latest_offer : ''}}</textarea>
                    </div>
                </div>
                <div class="bg-white w-full border border-primary shadow-lg p-5 mb-8">
                    <div class="flex mb-4">
                        <span class="font_26 mr-4">
                            {{ __('backend_stores.commonProblem') }}
                        </span>
                        <button type="button" id="questionAddBtn"><img class="object-fill my-auto w-7 h-7 cursor-pointer" id="addBtn" src="{{asset('images/icons8-plus-64@2x.png')}}" /></button>
                    </div>
                    <div class="" id="questionWrapper">
                        @if($selected_store && count($selected_store->questions) > 0)
                        @foreach($selected_store->questions as $key => $question)
                        <div class="px-2 pt-2 mb-2 question {{$key != 0 ? 'border-t border-gray-100' : ''}}">
                            <input type="hidden" name="question{{$key}}-id" value="{{$question->id}}" />
                            <input placeholder="{{__('backend_stores.question') . ($key != 0 ? $key : '')}}" class="mb-4 form-input" type="text" name="question{{$key}}" value="{{$question->question}}">
                            <textarea placeholder="{{__('backend_stores.answer') . ($key != 0 ? $key : '')}}" rows="3" class="form-input" name="answer{{$key}}">{{$question->answer}}</textarea>
                        </div>
                        @endforeach
                        @else
                        <div class="px-2 mb-2 question">
                            <input placeholder="{{ __('backend_stores.question') }}" class="mb-4 form-input" type="text" name="question0">
                            <textarea placeholder="{{ __('backend_stores.answer') }}" rows="3" class="form-input" name="answer0"></textarea>
                        </div>
                        @endif
                    </div>

                </div>
            </div>
            <div class="w-1/2 pl-4">
                <div class="bg-white w-full border border-primary shadow-lg p-5 mb-8">
                    <p class="font_26 mb-4">
                        {{ __('backend_stores.address') }}
                    </p>
                    <div class="px-2">
                        <div class="flex">
                            <span class="w-1/3 mt-1">
                                {{ __('backend_stores.forGoogleMap') }}
                            </span>

                            <input placeholder="" class="form-input" name="address" value="{{$selected_store ? $selected_store->address : ''}}" type="text" required>
                        </div>

                        <p class="state-text my-2 text-center font_14"></p>

                        <div class="flex mb-4">
                            <input placeholder="{{ __('backend_stores.latitude') }}" class="form-input mr-10" name="lat" value="{{$selected_store ? $selected_store->lat : ''}}" type="number" step="0.0000001" required>
                            <input placeholder="{{ __('backend_stores.longitude') }}" class="form-input" name="lng" value="{{$selected_store ? $selected_store->lng : ''}}" type="number" step="0.0000001" required>
                        </div>

                        <div class="flex mb-4">
                            <span class="w-1/3 mt-1">
                                {{ __('backend_stores.textAboveMap') }}
                            </span>
                            <textarea placeholder="" name="text_above_addr" rows="3" class="form-input">{{$selected_store ? $selected_store->text_above_addr : ''}}</textarea>
                        </div>
                        <div class="flex mb-4">
                            <span class="w-1/3 mt-1">
                                {{ __('backend_stores.textBelowMap') }}
                            </span>
                            <textarea placeholder="" name="text_below_addr" rows="3" class="form-input">{{$selected_store ? $selected_store->text_below_addr : ''}}</textarea>
                        </div>
                    </div>
                </div>

                <div class="bg-white w-full border border-primary shadow-lg p-5 mb-8">
                    <p class="font_26 mb-2">
                        {{ __('backend_stores.services') }}
                    </p>
                    <div class="grid grid-cols-2 col-gap-2 row-gap-4 p-2">
                        <label><input class="mr-3" type="checkbox" name="service0" {{$selected_store && $selected_store->serviceState(0) ? 'checked' : ''}} />{{ __('backend_stores.service1') }}</label>
                        <label><input class="mr-3" type="checkbox" name="service1" {{$selected_store && $selected_store->serviceState(1) ? 'checked' : ''}} />{{ __('backend_stores.service2') }}</label>
                        <label><input class="mr-3" type="checkbox" name="service2" {{$selected_store && $selected_store->serviceState(2) ? 'checked' : ''}} />{{ __('backend_stores.service3') }}</label>
                        <label><input class="mr-3" type="checkbox" name="service3" {{$selected_store && $selected_store->serviceState(3) ? 'checked' : ''}} />{{ __('backend_stores.service4') }}</label>
                        <label><input class="mr-3" type="checkbox" name="service4" {{$selected_store && $selected_store->serviceState(4) ? 'checked' : ''}} />{{ __('backend_stores.service5') }}</label>
                        <label><input class="mr-3" type="checkbox" name="service5" {{$selected_store && $selected_store->serviceState(5) ? 'checked' : ''}} />{{ __('backend_stores.service6') }}</label>
                        <label><input class="mr-3" type="checkbox" name="service6" {{$selected_store && $selected_store->serviceState(6) ? 'checked' : ''}} />{{ __('backend_stores.service7') }}</label>
                        <label><input class="mr-3" type="checkbox" name="service7" {{$selected_store && $selected_store->serviceState(7) ? 'checked' : ''}} />{{ __('backend_stores.service8') }}</label>
                    </div>
                </div>

                <div class="bg-white w-full border border-primary shadow-lg p-5 mb-8">
                    <p class="font_26 mb-4">
                        {{ __('backend_stores.nearby') }}
                    </p>
                    <div class="px-2">
                        <textarea placeholder="" name="nearby_facilities" rows="4" class="form-input" id="content">{{$selected_store ? $selected_store->nearby_facilities : ''}}</textarea>
                    </div>
                </div>
                <div class="bg-white w-full border border-primary shadow-lg p-5 mb-8">
                    <p class="font_26 mb-4">
                        {{ __('backend_stores.openingHour') }}
                    </p>
                    <div class="px-2">
                        <textarea placeholder="" name="opening_hours" rows="4" class="form-input" id="content">{{$selected_store ? $selected_store->opening_hours : ''}}</textarea>
                    </div>
                </div>

                <div class="bg-white w-full border border-primary shadow-lg p-5 mb-10">
                    <p class="font_26 mb-2">
                        {{ __('backend_stores.image') }}
                    </p>
                    <div class="image-uploader grid grid-cols-3 row-gap-2 col-gap-2 mb-4">

                        <input type="hidden" name="delete-storeImages" class="initial delete-images" value="" />
                        <input type="hidden" name="active-storeImages" class="active-images" value="{{$selected_store ? $selected_store->activeStoreImages() : ''}}" />
                        @if($selected_store)
                        @foreach($selected_store->storeImages as $image)
                        <div class="container original-image {{$image->is_used ? 'image-active' : ''}}" data-image-id="{{$image->id}}">
                            <img class="background" src="{{asset($image->image)}}" />
                            <div class="middle flex justify-center">
                                <div class="flex flex-col justify-center">
                                    <button type="button" class="mx-4 my-auto cursor-pointer img-del-btn"><img class="object-none" src="{{asset('images/icons8-delete-bin-48@2x.png')}}" /></button>
                                </div>
                                <div class="flex flex-col justify-center">
                                    <button type="button" class="mx-4 my-auto cursor-pointer img-sel-btn"><img class="object-none" src="{{asset('images/icons8-tick-box-48@2x.png')}}" /></button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        <div class="flex flex-col justify-center mr-4 img-add-wrapper">
                            <img class="object-fill mx-auto cursor-pointer img-add-btn" src="{{asset('images/icons8-plus-64@2x.png')}}" />
                            <input type="file" data-name="storeImages[]" name="image" class="hidden img-input" accept=".jpg,.png,.gif" />
                        </div>
                    </div>
                    <p class="font_26 mb-4">
                        {{ __('backend_stores.video') }}
                    </p>
                    <div class="flex mb-4 px-2">
                        <span class="w-1/5 mt-1 robert-regular">
                            {{ __('backend_stores.videoLink') }}
                        </span>
                        <input placeholder="" class="form-input" name="video_link" value="{{$selected_store ? $selected_store->video_link : ''}}" type="text">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

</div>
@endsection

@section('scripts')
<script>
    $(function() {

        $(".initial").val('[]');

        $("#branch-select").change(function() {
            const branch = $(this).val();
            if (branch == "") {
                return;
            }
            window.location.href = branch;
        })

        $('input').on('keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                if($(this).attr("name") === "address"){
                    getLocation($(this).val());
                }
                return false;
            }
        });

        $("#questionAddBtn").click(function() {
            const count = $(".question").length;
            if (count >= <?php echo App\Store::$_MAX_QUESTION_COUNT ?>) {
                return;
            }
            $("#questionWrapper").append('<div class="px-2 pt-2 mb-2 question border-t border-gray-100">' +
                '<input placeholder="{{__('backend_stores.question')}}' + count + '" class="mb-4 form-input" type="text" name="question' + count + '">' +
                '<textarea placeholder="{{__('backend_stores.question')}}' + count + '" rows="3" class="form-input" name="answer' + count + '"></textarea>' +
                '</div>');
        })

        $("#storeAddBtn").click(function() {
            window.location.href = '<?= route('backend.stores.show') ?>';
        })

        $("#deleteBtn").click(function() {
            const id = <?=  $selected_store ? $selected_store->id : 0 ?>;
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
                    url: '/backend/stores/' + id,
                    type: 'DELETE',
                    datatype: 'json',
                    success: function(result) {
                        if (result) {
                            window.location.href = '<?= route('backend.stores.show') ?>';
                        }
                    }
                });
            }
        });


        function readURL(input, preview) {
            if (input.files && input.files[0]) {
                if (input.files[0].size > 6 * 1024 * 1024) {
                    alert("Max file size is 6M!");
                    return;
                }
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(input).parent().before(
                        '<div class="container image-active">' +
                        `<input type="hidden" name="` + $(input).attr('data-name') + `" value='` + e.target.result + `'/>` +
                        '<img class="background" src="' + e.target.result + '"/>' +
                        '<div class="middle flex justify-center">' +
                        '<div class="flex flex-col justify-center">' +
                        `<button type="button" class="img-del-btn mx-4 my-auto cursor-pointer"><img class="object-none" src="{{asset('images/icons8-delete-bin-48@2x.png')}}" /></button>` +
                        '</div>' +
                        `</div>` +
                        `</div>`
                    )
                    $(input).val('');
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $(".img-input").change(function() {
            readURL(this);
        });

        $(".img-add-btn").click(function() {
            $(this).next().click();
        })

        $(document).on('click', '.img-del-btn', function() {
            const container = $(this).closest('.container');
            if (container.hasClass('original-image')) {
                const delImageInput = container.parent().find('.delete-images');
                var value = JSON.parse(delImageInput.val());
                value.push(container.attr('data-image-id'));
                delImageInput.val(JSON.stringify(value));
            }
            $(this).closest('.container').remove();
        })
        $(document).on('click', '.img-sel-btn', function() {
            const container = $(this).closest('.container');
            const activeName = "image-active";
            const selImageInput = container.parent().find('.active-images');
            var value = JSON.parse(selImageInput.val());
            var id = container.attr('data-image-id');
            if (container.hasClass(activeName)) {
                container.removeClass(activeName);
                const index = value.indexOf(id);
                if (index >= 0) {
                    value.splice(index, 1);
                }

            } else {
                container.addClass(activeName);
                value.push(id);
            }
            selImageInput.val(JSON.stringify(value));
        })
    })

    $("input[name='address']").on("change", function() {
        getLocation($(this).val());
    });

    $("#order-select").change(function(){
        const order = $(this).val();
        const selector = $(this);
        if (order === "") {
            return;
        }
        selector.prop('disabled', true);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '<?= csrf_token() ?>'
            }
        });
        $.ajax({
            url: '<?= route('backend.stores.changeOrder') ?>',
            type: 'POST',
            data: {
                order: order
            },
            datatype: 'json',
            success: function (result) {
                alert(result == 1 ? 'success' : 'fail');
                selector.prop('disabled', false);
            }
        });
    });

    function getLocation(address) {
        if(address == ''){
            return;
        }
        var geocoder = new google.maps.Geocoder();
        $(".state-text").text("Loading..." + status);
        geocoder.geocode({
            'address': address
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                $(".state-text").text("");
                $("input[name='lat']").val(results[0].geometry.location.lat());
                $("input[name='lng']").val(results[0].geometry.location.lng());
            } else {
                console.log("Geocode was not successful for the following reason: " + status);
                $(".state-text").text("Geocode was not successful for the following reason: " + status);
            }
        });
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuF23f8P4mybfOUR2lbLynVZqSI77xn4Q&libraries=places"></script>
@endsection
