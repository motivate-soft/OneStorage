@extends('backend.layouts.app')

@section('title')
<title>{{__('Pages')}}</title>
@endsection

@section('styles')
<style>
    .blog-item > .active::after {
        content: url("../images/icons8-edit-48@2x.png");
        width: 24px;
        height: 24px;
        position: absolute;
        margin-left: 5px;
        /* margin-top: -5px; */
    }

    .bk-active::after{
        content: url("../images/icons8-tick-box-48@2x.png");
        width: 24px;
        height: 24px;
        right: 0;
        top:0;
        position: absolute;
        margin-left: 5px;
    }

    .blog-title {
        position: relative;
    }

    #imagePreview {
        width: 122px;
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
                <span class="font_25 mr-4">Pages</span>
                <span class="font_16">Frontpage</span>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="bg-white w-full border border-primary shadow-lg p-5 mb-10">
                <p class="font_26 mb-2">
                    首頁圖片
                </p>
                <!-- <p class="font_16 robert-regular mb-2">C:/Users/download/bg.jpg</p> -->
                <div class="grid grid-cols-3 row-gap-2 col-gap-2 mb-2">
                    <?php
                    $backgrounds = App\Background::all();
                    ?>

                    @foreach($backgrounds as $background)
                    <div class="container {{$background->isActive() ? 'bk-active' : ''}}">
                        <img class="background" src="{{asset('images/backgrounds/'.$background->image)}}" />
                        <div class="middle flex justify-center">
                            <form class="flex flex-col justify-center" action="{{url('/background/delete/'.$background->id)}}" method="get">
                                <button type="submit" class="mx-4 my-auto cursor-pointer"><img class="object-none" id="bkDelBtn" src="{{asset('images/icons8-delete-bin-48@2x.png')}}" /></button>
                            </form>
                            <form class="flex flex-col justify-center" action="{{url('/background/set/'.$background->id)}}">
                                <button type="submit" class="mx-4 my-auto cursor-pointer"><img class="object-none" id="bkSelBtn" src="{{asset('images/icons8-tick-box-48@2x.png')}}" /></button>
                            </form>
                        </div>
                    </div>
                    <!-- <img class="mr-4 background" src="{{asset('images/backgrounds/'.$background->image)}}" /> -->
                    @endforeach

                    <form id="backgroundForm" class="flex flex-col justify-center mr-4" action="{{url('/background')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- <button type="button" id="bkAddBtn" class="h-7 font_14 px-3 align-middle rounded border border-third bg-grey-2">選擇圖片</button> -->
                        <img class="object-fill mx-auto cursor-pointer" id="bkAddBtn" src="{{asset('images/icons8-plus-64@2x.png')}}" />
                        <input type="file" id="bkInput" name="image" class="hidden" accept=".jpg,.png,.gif" />
                    </form>
                </div>
            </div>
            <div class="bg-white w-full border border-primary shadow-lg p-5">
                <p class="font_26 mb-2">
                    最新優惠
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
    </div>
    <div class="w-1/2 ml-12">
        <form id="blogForm" method="POST" action="{{url('/blog')}}" enctype="multipart/form-data">
            <input type="hidden" name="id" id="blogId" />
            <input type="hidden" name='_method' id="method" value="POST">
            @csrf
            <div class="mb-6 flex justify-between">
                <div>
                    <span class="font_25"></span>
                    <span class="font_16">News/ Blog / Promo</span>
                </div>
                <div class="flex justify-between">
                    <button type="submit" class="font_21 px-8 py-1 text-white mr-4" style="background-color: #B881FD;">儲存</button>
                    <button type="button" id="deleteBtn" class="font_21 px-8 py-1 text-white mr-4" style="background-color: #FD8181;">刪除</button>
                    <button type="reset" id="resetBtn" class="font_21 px-4 py-1 text-black">取消</button>
                </div>
            </div>
            <div class="">
                <div class="bg-white h-full border border-primary shadow-lg px-10 py-5">

                    <p class="font_26 mb-2">
                        圖片
                    </p>
                    <p class="font_16 robert-regular mb-2" id="imageUrl"></p>
                    <div class="flex mb-4">
                        <img class="mr-4" id="imagePreview" width="122" height="122" />
                        <div class="flex flex-col justify-between ml-20">
                            <div>
                                <button id="inputBtn" type="button" class="appearance-none h-7 w-24 font_14 px-3 align-middle rounded border border-third g-grey-2">選擇圖片</button>
                                <input type="file" id="imageInput" name="image" class="hidden" accept=".jpg,.png,.gif" />
                            </div>

                            <label class="robert-regular"><input class="mr-3" type="checkbox" name="usedNotiBar" id="usedNotiBar" />Use as notification bar</label>
                        </div>
                    </div>
                    <div class="border-b border-gray-300 mb-4">
                        <div class="mb-4">
                            <p class="font_26 mb-2">題目</p>
                            <input placeholder="Title" class="form-input w-full appearance-none bg-white border border-gray-300 p-2 text-base" name="title" required type="text" id="title">
                        </div>
                        <div class="mb-8">
                            <p class="font_26 mb-2">題目</p>
                            <textarea placeholder="Content" name="content" required rows="4" class="form-input w-full appearance-none bg-white border border-gray-300 p-2 text-base" id="content"></textarea>
                        </div>
                    </div>

                    <div>
                        <p class="font_26 mb-2">Title</p>

                        <?php
                        $blogs = App\Blog::orderBy('updated_at', 'desc')->paginate(5);
                        ?>
                        @foreach ($blogs as $blog)
                        <div class="mb-2 robert-regular cursor-pointer blog-item" id="{{$blog->id}}">
                            <span class="blog-title">{{ $blog->title }}</span>
                            <span class="float-right font_12">{{$blog->updated_at->format('d/m/Y')}}</span>
                        </div>
                        @endforeach

                        {{ $blogs->links() }}
                    </div>
                </div>

            </div>
        </form>
    </div>


</div>
@endsection

@section('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '<?= csrf_token() ?>'
        }
    });

    function readURL(input, preview) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#bkInput").change(function() {
        $("#backgroundForm").submit();
    });

    $("#imageInput").change(function() {
        $("#imageUrl").text($(this).val());
        readURL(this, $('#imagePreview'));
    });

    $("#inputBtn").click(function() {
        $("#imageInput").click();
    })

    $("#bkAddBtn").click(function() {
        $("#bkInput").click();
    })

    $("#resetBtn").click(function() {
        $(".blog-title").removeClass("active");
        $('#imagePreview').attr('src', null);
        $("#blogId").val(0);
    })

    $("#deleteBtn").click(function() {

        const blogId = $("#blogId").val();

        if (blogId <= 0) {
            return;
        }

        $.ajax({
            url: '/blog/' + blogId,
            type: 'DELETE',
            datatype: 'json',
            success: function(result) {
                if (result) {
                    window.location.reload();   
                }
            }
        });
    });

    $(".blog-item").click(function() {
        $(".blog-title").removeClass("active");
        $(this).find('.blog-title').addClass("active");
        const blogId = $(this).attr('id');
        //load blog data 
        $.ajax({
            url: '/blog/' + blogId,
            type: 'GET',
            datatype: 'json',
            success: function(blog) {
                if (blog.image == null) {
                    $('#imagePreview').attr('src', null);
                } else {
                    $('#imagePreview').attr('src', blog.image);
                }
                $("#usedNotiBar").prop("checked", blog.used_notibar);
                $("#title").val(blog.title);
                $("#content").val(blog.content);
                $("#method").val('PUT');
                $("#blogId").val(blog.id);
            }
        });
    })


    $(function() {
        $("#blogId").val(0);
        $("#resetBtn").click();
    });
</script>
@endsection