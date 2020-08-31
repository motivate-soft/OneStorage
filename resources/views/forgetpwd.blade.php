<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Contact Us') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">

    <style>
        .dropdown {
            float: left;
            overflow: hidden;
        }

        .dropdown .dropbtn {
            font-size: 17px;
            border: none;
            outline: none;
            color: #4D5567;
            padding: 14px 16px;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #FBF9F9;
            min-width: 120px;
            box-shadow: 0px 8px 8px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            float: none;
            color: black;
            padding: 5px 16px;
            text-decoration: none;
            display: block;
            text-align: center;
        }

        .topnav a:hover,
        .dropdown:hover .dropbtn {
            color: #C293FC;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
            color: black;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>

<body class="bg-white h-screen antialiased leading-none">

    @include('layouts.header')
    <div class="mx-4 md:mx-24 lg:mx-48 my-13 ">

        <p class="subheader-title">忘記密碼</p>

        <form class=" contact-form">

            <div class="input-group mb-8">
                <img class="form-control-icon" src="{{asset('images/contactUs/icons8-email-50@2x.png')}}" alt="Mobile">
                <input class="form-control" type="text" placeholder="電子郵件">
            </div>


            <button class="submit-btn hover:bg-purple-400">
                送出
            </button>
        </form>
    </div>

</body>

</html>