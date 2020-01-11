<!DOCTYPE html>
<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="CibePorto">
        <meta name="author" content="Coderthemes">

        <!-- Fvicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('app-assets/images/favicon//apple-touch-icon.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('app-assets/images/favicon//favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('app-assets/images/favicon//favicon-16x16.png')}}">
        <link rel="manifest" href="/site.webmanifest">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">

        <title>@yield('title')</title>

        <!-- Base Css Files -->
        <link href="{{asset('app-assets/css/bootstrap.min.css')}}" rel="stylesheet">        

        <!-- Font Icons -->
        <link href="{{asset('app-assets/assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
        <link href="{{asset('app-assets/assets/ionicon/css/ionicons.min.css')}}" rel="stylesheet" />
        <link href="{{asset('app-assets/css/material-design-iconic-font.min.css')}}" rel="stylesheet">

        <!-- animate css -->
        <link href="{{asset('app-assets/css/animate.css')}}" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="{{asset('app-assets/css/waves-effect.css')}}" rel="stylesheet">

        <!-- sweet alerts -->
        <link href="{{asset('app-assets/assets/sweet-alert/sweet-alert.min.css')}}" rel="stylesheet">

        <!-- Custom Files -->
        <link href="{{asset('app-assets/css/helper.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('app-assets/css/style.css')}}" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="{{asset('app-assets/js/modernizr.min.js')}}"></script>
        
    </head>
    <body class="fixed-left">
        <!-- Begin page -->
        <div id="wrapper">
            @include('layouts.includes.header')
            @include('layouts.includes.sidebar')

            @yield('content')
        </div>
        <!-- END wrapper -->
        
        
        
    </body>
</html>