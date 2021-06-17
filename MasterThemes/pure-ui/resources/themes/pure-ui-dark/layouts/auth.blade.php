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
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" href="/favicons/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="/favicons/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="/favicons/manifest.json">
        <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#bc6e3c">
        <link rel="shortcut icon" href="/favicons/favicon.ico">
        <meta name="msapplication-config" content="/favicons/browserconfig.xml">
        <meta name="theme-color" content="#232323">

        @section('scripts')
            {!! Theme::css('vendor/bootstrap/css/bootstrap.min.css') !!}
            {!! Theme::css('vendor/animate/animate.css') !!}
            {!! Theme::css('vendor/css-hamburgers/hamburgers.min.css') !!}
            {!! Theme::css('vendor/select2/select2.min.css') !!}
            {!! Theme::css('css/util.css') !!}
            {!! Theme::css('css/main.css') !!}
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
            <link rel='stylesheet' type='text/css' href='/themes/pure-ui-dark/css/pure-ui.php' />

            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
        @show
    </head>
    <body>
                @yield('content')


        {!! Theme::js('vendor/jquery/jquery-3.2.1.min.js') !!}
        {!! Theme::js('vendor/bootstrap/js/popper.js') !!}
        {!! Theme::js('vendor/bootstrap/js/bootstrap.min.js') !!}
        {!! Theme::js('vendor/select2/select2.min.js') !!}
        {!! Theme::js('vendor/tilt/tilt.jquery.min.js') !!}
        {!! Theme::js('js/main.js') !!}
        <script >
            $('.js-tilt').tilt({
                scale: 1.1
            })
	    </script>
    </body>
</html>
