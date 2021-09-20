{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}

{{-- Pterodactyl Bakalava Theme --}}
{{-- All rights reserved. smt287 - Samet Girginer --}}
{{-- Discord: smt287#5646 / Support: https://discord.gg/JdWBeRr --}}

<!DOCTYPE html>
<html class="loading" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="_token" content="{{ csrf_token() }}">
    <meta name="author" content="Baklava theme made by smt287/Samet Girginer">
    <title>{{ config('app.name', 'Pterodactyl') }} - @yield('title')</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/favicons/manifest.json">
    <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#bc6e3c">
    <link rel="shortcut icon" href="/favicons/favicon.ico">
    <meta name="msapplication-config" content="/favicons/browserconfig.xml">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    @include('layouts.scripts')

    @section('scripts')
        {!! Theme::css('vendor/vendors.min.css') !!}
        {!! Theme::css('vendor/summernote/summernote-lite.min.css') !!}
        {!! Theme::css('vendor/sweetalert/sweetalert.min.css?t={cache-version}') !!}
        {!! Theme::css('vendor/animate/animate.min.css?t={cache-version}') !!}

        {!! Theme::css('css/bootstrap.css') !!}
        {!! Theme::css('css/bootstrap-extended.css') !!}
        {!! Theme::css('css/colors.css') !!}
        {!! Theme::css('css/components.css') !!}

        {!! Theme::css('css/vertical-menu.css') !!}
        {!! Theme::css('css/palette-gradient.css') !!}

        @if(config('baklava.theme.dark-layout'))
        {!! Theme::css('css/dark-layout.css') !!}
        @endif

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

        {!! Theme::css('css/style.css') !!}

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    @show
</head>

<body class="navbar-floating footer-static @if(config('baklava.theme.dark-layout')) dark-layout @endif">
    <div class="app-content content ml-0">
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <div class="content-wrapper">
                    @if($__env->yieldContent('content-header'))
                        <section class="content-header">
                            @yield('content-header')
                        </section>
                    @endif
                    <section class="content ml-0">
                        @yield('content')
                    </section>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer footer-static footer-light">
       <p class="clearfix blue-grey lighten-2 mb-0">
          <span class="float-md-left d-block d-md-inline-block mt-25">Copyright &copy; 2015 - {{ date('Y') }} <a href="https://pterodactyl.io/">Pterodactyl Software</a>.</span>
             <span class="float-md-right d-none d-md-block"><i class="fa fa-fw {{ $appIsGit ? 'fa-git-square' : 'fa-code-fork' }}"></i></strong> {{ $appVersion }} - {{ round(microtime(true) - LARAVEL_START, 3) }}s</span>
          <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
       </p>
    </footer>
    
    @section('footer-scripts')
        {!! Theme::js('js/keyboard.polyfill.js?t={cache-version}') !!}
        <script>keyboardeventKeyPolyfill.polyfill();</script>

        {!! Theme::js('js/laroute.js?t={cache-version}') !!}
        {!! Theme::js('vendor/vendors.min.js') !!}
        {!! Theme::js('vendor/sweetalert/sweetalert.min.js?t={cache-version}') !!}
        {!! Theme::js('vendor/summernote/summernote-lite.min.js') !!}
        {!! Theme::js('js/core/app-menu.js') !!}
        {!! Theme::js('js/core/app.js') !!}
        {!! Theme::js('js/scripts/components.js') !!}

        {!! Theme::js('vendor/slimscroll/jquery.slimscroll.min.js?t={cache-version}') !!}
        {!! Theme::js('vendor/socketio/socket.io.v203.min.js?t={cache-version}') !!}
        {!! Theme::js('vendor/bootstrap-notify/bootstrap-notify.min.js?t={cache-version}') !!}
        {!! Theme::js('js/autocomplete.js?t={cache-version}') !!}
    @show
</body>
</html>