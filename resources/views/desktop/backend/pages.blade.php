@extends('backend.layouts.app')

@section('title')
<title>{{__('Pages')}}</title>
@endsection

@section('styles')
<style>
    .blog-item>.active::after {
        content: url("../images/icons8-edit-48@2x.png");
        width: 24px;
        height: 24px;
        position: absolute;
        margin-left: 5px;
        /* margin-top: -5px; */
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

    .blog-title {
        position: relative;
    }

    .preview {
        /* width: 122px; */
        height: 122px;
    }

    .background {
        width: 100%;
        height: 100px;
        opacity: 1;
        display: block;
        transition: .5s ease;
        backface-visibility: hidden;
    }

    #backgroundForm {
        height: 100px;
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
<div class="h-screen pl-16 pr-5 pt-10 pb-24 w-4/5 flex">
    <div class="w-1/2">
        <div class="mb-6">
            <div>
                <span class="font_25 mr-4">{{ __('backend_pages.title') }}</span>
                <span class="font_16">{{ __('backend_pages.frontPage') }}</span>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="bg-white w-full border border-primary shadow-lg p-5 mb-10">
                <p class="font_26 mb-2">
                    {{ __('backend_pages.homeImage') }}
                </p>
                <div class="grid grid-cols-3 row-gap-2 col-gap-2 mb-2">
                    <?php
                    $backgrounds = App\Background::all();
                    ?>

                    @foreach($backgrounds as $background)
                    <div class="container {{$background->isActive() ? 'bk-active' : ''}}">
                        <img class="background" src="{{asset($background->image)}}" />
                        <div class="middle flex justify-center">
                            <form class="flex flex-col justify-center" action="{{url('/backend/background/delete/'.$background->id)}}" method="get">
                                <button type="submit" class="mx-4 my-auto cursor-pointer"><img class="object-none" id="bkDelBtn" src="{{asset('images/icons8-delete-bin-48@2x.png')}}" /></button>
                            </form>
                            <form class="flex flex-col justify-center" action="{{url('/backend/background/set/'.$background->id)}}">
                                <button type="submit" class="mx-4 my-auto cursor-pointer"><img class="object-none" id="bkSelBtn" src="{{asset('images/icons8-tick-box-48@2x.png')}}" /></button>
                            </form>
                        </div>
                    </div>
                    @endforeach

                    <form id="backgroundForm" class="flex flex-col justify-center mr-4" action="{{url('/backend/background')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <img class="object-fill mx-auto cursor-pointer" id="bkAddBtn" src="{{asset('images/icons8-plus-64@2x.png')}}" />
                        <input type="file" id="bkInput" name="image" class="hidden" accept=".jpg,.png,.gif" />
                    </form>
                </div>
            </div>
            <div class="bg-white w-full border border-primary shadow-lg p-5">
                <p class="font_26 mb-2">
                    {{ __('backend_pages.latestOffers') }}
                </p>
                <div class="grid grid-cols-2 col-gap-4 row-gap-2 p-4" id="promotion-wrapper">
                    <?php
                    $promotions = App\Blog::where('used_promotion', true)->where('as_promotion', true)->orderBy('column', 'asc')->get();
                    $data = array_fill(1, 6, null);
                    foreach ($promotions as $promotion) {
                        $data[$promotion->column] = $promotion;
                    }
                    ?>
                    @foreach($data as $key => $item)
                    <label class="promotion-item"><input {{$item ? '' : 'disabled'}} {{$item && $item->state ? 'checked' : ''}} data-id="{{$item ? $item->id : ''}}" class="checkbox mr-3" type="checkbox" />
                        {{$key.'. '}}<span>{{$item ? $item->title : __('backend_pages.titleOfNews')}}</span>
                    </label>
                    @endforeach
                </div>
                <div class="flex mx-2">
                    <div class="w-1/3 mr-12">
                        <p class="mb-2">{{ __('backend_pages.selectPos') }}</p>
                        <div class="w-full inline-block relative">
                            <select id="position-select" class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none">
                                <option value="" selected disabled class="text-grey">{{ __('backend_pages.position') }}</option>
                                @for($i = 1; $i < 7; $i++) <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                            </div>
                        </div>
                    </div>
                    <div class="w-2/3">
                        <p class="mb-2">{{ __('backend_pages.selectNews') }}</p>
                        <div class="w-full inline-block relative">
                            <select id="news-select" class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none">
                                <option value="" selected disabled class="text-grey">{{ __('backend_pages.news') }}</option>
                                <?php
                                $promotionNews = App\Blog::where('used_promotion', true)->get();
                                ?>
                                @foreach($promotionNews as $news)
                                <option value="{{$news->id}}" class="">{{$news->title}}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-1/2 ml-12">
        <form id="blogForm" method="POST" action="{{url('/backend/blog')}}" enctype="multipart/form-data">
            <input type="hidden" name="id" id="blogId" />
            <input type="hidden" name='_method' id="method" value="POST">
            @csrf
            <div class="mb-6 flex justify-between">
                <div>
                    <span class="font_25"></span>
                    <span class="font_16">{{ __('backend_pages.newsBlogPromo') }}</span>
                </div>
                <div class="flex justify-between">
                    <button type="submit" class="font_21 px-8 py-1 text-white mr-4" style="background-color: #B881FD;">{{ __('backend_pages.save') }}</button>
                    <button type="button" class="deleteBtn font_21 px-8 py-1 text-white mr-4" style="background-color: #FD8181;">{{ __('backend_pages.delete') }}</button>
                    <button type="reset" id="resetBtn" class="font_21 px-4 py-1 text-black">{{ __('backend_pages.cancel') }}</button>
                </div>
            </div>
            <div class="">
                <div class="bg-white h-full border border-primary shadow-lg px-10 py-5">

                    <p class="font_26 mb-2">
                        {{ __('backend_pages.image') }}
                    </p>
                    <p class="font_16 robert-regular mb-2">{{ __('backend_pages.contentPicture') }}</p>
                    <div class="flex w-1/2 mb-4 image-wrapper">
                        <img id="imagePreview" class="mr-4 preview w-1/2" />
                        <div class="w-1/2 flex flex-col justify-center">
                            <img class="object-fill mx-auto cursor-pointer input-wrapper" src="{{asset('images/icons8-plus-64@2x.png')}}" />
                            <input type="file" name="image" class="hidden image-input" accept=".jpg,.png,.gif" />
                        </div>
                    </div>
                    <div class="flex">
                        <div class="w-1/2">
                            <p class="font_16 robert-regular mb-2">{{ __('backend_pages.thumbnailPicture') }}</p>
                            <div class="flex mb-4 image-wrapper">
                                <img id="thumbPreview" class="mr-4 preview w-1/2" />
                                <div class="w-1/2 flex flex-col justify-center">
                                    <img class="object-fill mx-auto cursor-pointer input-wrapper" src="{{asset('images/icons8-plus-64@2x.png')}}" />
                                    <input type="file" name="thumbnail" class="hidden image-input" accept=".jpg,.png,.gif" />
                                </div>
                            </div>
                        </div>
                        <div class="w-1/2">
                            <label class="robert-regular font_14"><input class="mb-4 mr-3" type="checkbox" name="usedPromition" id="usedPromition" />Use as front page promotion</label>
                            <div class="flex mb-4 image-wrapper">
                                <img id="promoPreview" class="mr-4 preview w-1/2" />
                                <div class="w-1/2 flex flex-col justify-center">
                                    <img class="object-fill mx-auto cursor-pointer input-wrapper" src="{{asset('images/icons8-plus-64@2x.png')}}" />
                                    <input type="file" name="promotion" class="hidden image-input" accept=".jpg,.png,.gif" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <label class="robert-regular font_14">
                        <input class="mb-4 mr-3" type="checkbox" name="usedNotify" id="usedNotify" />{{ __('backend_pages.useAsNotifyBar') }}
                    </label>
                    <div class="border-b border-gray-300 mb-4">
                        <div class="mb-4">
                            <p class="font_26 mb-2">Id</p>
                            <input placeholder="Id" class="form-input w-full appearance-none bg-white border border-gray-300 p-2 text-base" name="_id" required type="text" id="id">
                        </div>
                        <div class="mb-4">
                            <p class="font_26 mb-2">{{ __('backend_pages.blogTopic') }}</p>
                            <textarea placeholder="Title" name="title" required rows="1" class="form-input w-full ckeditor" id="title"></textarea>
                            <!-- <input placeholder="Title" class="form-input w-full appearance-none bg-white border border-gray-300 p-2 text-base" name="title" required type="text" id="title"> -->
                        </div>
                        <div class="mb-4">
                            <p class="font_26 mb-2">{{ __('backend_pages.blogContent') }}</p>
                            <textarea placeholder="Content" name="content" required rows="8" class="form-input w-full ckeditor" id="content"></textarea>
                        </div>
                        <p class="font_26 mb-2">{{ __('backend_pages.publishDate') }}</p>
                        <div class="date-group">
                            <div class="date-component">
                                <div class="relative mr-4">
                                    <select id="daySelector" class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" aria-placeholder="日" name="day" required>
                                        <option value="" selected disabled>{{ __('backend_pages.day') }}</option>
                                        @for($i = 1; $i < 32; $i++) <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                                    </div>
                                </div>
                            </div>

                            <div class="date-component">
                                <div class="relative mr-4">
                                    <select id="monthSelector" class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" name="month" required>
                                        <option value="" selected disabled>{{ __('backend_pages.month') }}</option>
                                        @for($i = 1; $i < 13; $i++) <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-6 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                                    </div>
                                </div>
                            </div>

                            <div class="date-component">
                                <div class="relative">
                                    <select id="yearSelector" class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 leading-tight focus:outline-none" name="year" required>
                                        <option value="" selected disabled>{{ __('backend_pages.year') }}</option>
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
                    </div>



                    <div class="border-b border-gray-300  mb-2">
                        <p class="font_26 mb-2">{{ __('backend_pages.blogTopic') }}</p>

                        <?php
                        $newses = \App\Blog::getNewses()->paginate(5);
                        ?>
                        @foreach ($newses as $news)
                        <div class="flex justify-between mb-2 robert-regular cursor-pointer blog-item" id="{{$news->id}}">
                            <span class="blog-title my-auto truncate">{!! $news->title !!}</span>
                            <div class="flex justify-end flex-shrink-0">
                                <div class="action-bar hidden">
                                    <img src="{{asset('images/icons8-edit-48@2x.png')}}" class="inline" />
                                    <img src="{{asset('images/ic-recycle-bin-50.png')}}" class="inline deleteBtn ml-2 w-8 h-8" />
                                </div>
                                <span class="ml-4 float-right font_12 my-auto">
                                    {{$news->publish_date->format('d/m/Y')}}
                                </span>
                            </div>
                        </div>
                        @endforeach

                        {{ $newses->links() }}
                    </div>

                    <p class="font_26 mb-2">{{ __('backend_pages.seotags') }}</p>
                    
                    <div class="mb-4">
                        <p class="font_26 mb-2">{{ __('backend_pages.seoTitle') }}</p>
                        <input placeholder="Seo Title" class="form-input w-full appearance-none bg-white border border-gray-300 p-2 text-base" name="seo_title" type="text" id="seotitle">
                    </div>
                    <div class="mb-4">
                        <p class="font_26 mb-2">{{ __('backend_pages.seoDescription') }}</p>
                        <input placeholder="Seo Description" class="form-input w-full appearance-none bg-white border border-gray-300 p-2 text-base" name="seo_description" type="text" id="seodescription">
                    </div>
                    <div class="mb-4">
                        <p class="font_26 mb-2">{{ __('backend_pages.seoKeyword') }}</p>
                        <input placeholder="Seo Keyword" class="form-input w-full appearance-none bg-white border border-gray-300 p-2 text-base" name="seo_keyword"  type="text" id="seokeyword">
                    </div>
                    <div class="mb-4">
                        <p class="font_26 mb-2">{{ __('backend_pages.seoContent') }}</p>
                        <textarea placeholder="Seo Content" class="form-input w-full appearance-none bg-white border border-gray-300 p-2 text-base" name="seo_content" type="text" id="seocontent"></textarea>
                    </div>

                    
                    <div class="mb-4">
                        <p class="font_26 mb-2">{{ __('backend_pages.altField') }}</p>
                        <input placeholder="Alt Field" class="form-input w-full appearance-none bg-white border border-gray-300 p-2 text-base" name="alt_field"  type="text" id="altfield">
                    </div>
                </div>

            </div>
        </form>
    </div>


</div>
@endsection

@section('scripts')
<script>

    // $(function(){
    //     $.ajax({
    //         url: '/backend/getseotag',
    //         type: 'GET',
    //         success: function(result) {
    //             let data  = result['data'];
    //             if(data['seo_title'] !== undefined)
    //             {
    //                 $('#seotitle').val(data['seo_title']);
    //                 $('#seocontent').val(data['seo_content']);
    //                 $('#seokeyword').val(data['seo_keyword']);
    //                 $('#seodescription').val(data['seo_description']);
    //             }

    //         }
    //     });
    // }());

    function readURL(input, preview) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#bkInput").change(function() {
        $("#backgroundForm").submit();
    });

    $("#bkAddBtn").click(function() {
        $("#bkInput").click();
    })

    $("#resetBtn").click(function() {
        $(".action-bar").hide();
        $('#blogForm').find('.preview').attr('src', null);
        $("#blogId").val(0);
        $("#method").val('POST');
    })

    $(".deleteBtn").click(function(e) {
        e.preventDefault();
        const blogId = $("#blogId").val();

        if (blogId <= 0) {
            return;
        }

        if (confirm("Do you really want to delete this blog?")) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '<?= csrf_token() ?>'
                }
            });
            $.ajax({
                url: '/backend/blog/' + blogId,
                type: 'DELETE',
                datatype: 'json',
                success: function(result) {
                    if (result) {
                        window.location.reload();
                    }
                }
            });
        }
    });

    $(".blog-item").click(function() {
        // $(".blog-title").removeClass("active");
        // $(this).find('.blog-title').addClass("active");
        if ($(this).hasClass('active')) {
            return;
        }
        $('.blog-item').removeClass('active');
        $(this).addClass('active');
        $('.action-bar').hide();
        const actionBar = $(this).find('.action-bar');
        const blogId = $(this).attr('id');
        //load blog data
        $.ajax({
            url: '/backend/blog/' + blogId,
            type: 'GET',
            datatype: 'json',
            success: function(blog) {
                $('#imagePreview').attr('src', blog.image);
                $('#thumbPreview').attr('src', blog.thumbnail);
                $('#promoPreview').attr('src', blog.promotion);

                $("#usedPromition").prop("checked", blog.used_promotion);
                $("#usedNotify").prop("checked", blog.used_notify);
                $("#id").val(blog._id);
                CKEDITOR.instances['title'].setData(blog.title);
                $("#title").val(blog.title);
                if(blog.seo_tag !== null)
                {   
                    let data = blog.seo_tag
                    $('#seotitle').val(data['seo_title']);
                    $('#seocontent').val(data['seo_content']);
                    $('#seokeyword').val(data['seo_keyword']);
                    $('#seodescription').val(data['seo_description']);
                    $('#altfield').val(data['alt_field']);
                }else
                {
                    $('#seotitle').val("");
                    $('#seocontent').val("");
                    $('#seokeyword').val("");
                    $('#seodescription').val("");
                    $('#altfield').val("");
                }
              
                CKEDITOR.instances['content'].setData(blog.content);
                $("#content").val(blog.content);

                $("#method").val('PUT');
                $("#blogId").val(blog.id);
                const date = new Date(blog.publish_date.date);
                OneStorage.DOB(date !== undefined ? date : new Date());
                actionBar.show();
            }
        });
    });

    $(".input-wrapper").click(function() {
        $(this).next(".image-input").click();
    });

    $(".image-input").change(function() {
        readURL(this, $(this).closest('.image-wrapper').find('.preview'));
    });

    $("#position-select").change(function() {
        $("#news-select").val('');
    })

    $(".checkbox").change(function() {
        const id = Number($(this).attr('data-id'));
        if (Number.isNaN(id)) {
            return;
        }

        $.ajax({
            url: '/backend/blog/set-promotion/' + id + '/' + (this.checked ? 1 : 0),
            type: 'GET',
            success: function(result) {
                alert(result ? "ok" : "fail");
            }
        });
    })

    $("#news-select").change(function() {
        const position = $("#position-select").val();
        const news = $(this).val();
        //check duplication
        if (position && news) {
            if ($("[data-id='" + news + "']").length) {
                alert("Duplicate");
                return;
            }
            $.ajax({
                url: '/backend/blog/as-promotion/' + news + '/' + position,
                type: 'GET',
                success: function(result) {
                    alert(result ? "ok" : "fail");
                    const item = $(".promotion-item").eq(position - 1);
                    const checkbox = item.find('input');
                    checkbox.removeAttr("checked");
                    checkbox.removeAttr("disabled");
                    checkbox.attr('data-id', news);
                    item.find('span').text($("#news-select option:selected").text());
                }
            });
        }
    });


    $(function() {
        $("#blogId").val(0);
        $("#position-select").val('');
        $("#news-select").val('');
        $("#resetBtn").click();
        OneStorage.DOB(new Date());
    });

    $("#content").ckeditor();
    $("#title").ckeditor();
    CKEDITOR.replace( 'title', {
        height: 100
    } );
    CKEDITOR.replace( 'content', {
        height: 700
    } );

   
</script>
@endsection
