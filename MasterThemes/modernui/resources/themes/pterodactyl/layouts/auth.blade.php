{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}
    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Pterodactyl') }} - @yield('title')</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />

    <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/favicons/manifest.json">
    <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#bc6e3c">
    <link rel="shortcut icon" href="/favicons/favicon.ico">
    <meta name="msapplication-config" content="/favicons/browserconfig.xml">
    <meta name="theme-color" content="#0e4688">

    @section('scripts')
        {!! Theme::css('theme/css/bamburgh.min.css?t={cache-version}') !!}

        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    @show
</head>
<body id="app-top">

<div class="app-wrapper">
    <div class="app-main">
        <div class="divider border-2 border-primary bg-primary"></div>
        <div class="app-content p-0">
            <div class="app-content--inner d-flex align-items-center">
                <div class="flex-grow-1 w-100 d-flex align-items-center">
                    <div class="bg-composed-wrapper--content py-5">
                        <div class="container">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>

            <div class="small mb-2 ml-2">
                <strong><i class="fa fa-fw {{ $appIsGit ? 'fa-git-square' : 'fa-code-fork' }}"></i></strong> {{ $appVersion }}<br />
                <strong><i class="fa fa-fw fa-clock-o"></i></strong> {{ round(microtime(true) - LARAVEL_START, 3) }}s
            </div>
        </div>
    </div>
</div>

{!! Theme::js('vendor/jquery/jquery.min.js?t={cache-version}') !!}
{!! Theme::js('theme/js/popper.min.js?t={cache-version}') !!}
{!! Theme::js('theme/vendor/bootstrap/js/bootstrap.min.js?t={cache-version}') !!}
{!! Theme::js('theme/js/demo/bootstrap/bootstrap.min.js?t={cache-version}') !!}
{!! Theme::js('vendor/slimscroll/jquery.slimscroll.min.js?t={cache-version}') !!}
{!! Theme::js('vendor/bootstrap-notify/bootstrap-notify.min.js?t={cache-version}') !!}
{!! Theme::js('js/autocomplete.js?t={cache-version}') !!}
{!! Theme::js('theme/vendor/metismenu/js/metismenu.min.js?t={cache-version}') !!}
{!! Theme::js('theme/js/demo/metismenu/metismenu.min.js?t={cache-version}') !!}
{!! Theme::js('theme/vendor/perfect-scrollbar/js/perfect-scrollbar.min.js?t={cache-version}') !!}
{!! Theme::js('theme/js/demo/perfect-scrollbar/perfect-scrollbar.min.js?t={cache-version}') !!}
{!! Theme::js('theme/vendor/feather-icons/js/feather-icons.min.js?t={cache-version}') !!}
{!! Theme::js('theme/js/demo/feather-icons/feather-icons.min.js?t={cache-version}') !!}
{!! Theme::js('theme/js/bamburgh.min.js?t={cache-version}') !!}
</body>
</html>
