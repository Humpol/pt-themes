{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}

{{-- Pterodactyl Bakalava Theme --}}
{{-- All rights reserved. smt287 - Samet Girginer --}}
{{-- Discord: smt287#5646 / Support: https://discord.gg/JdWBeRr --}}

<!DOCTYPE html>
<html>
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
        {!! Theme::css('vendor/select2/select2.min.css') !!}
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
<body class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static @if(config('baklava.theme.dark-layout')) dark-layout @endif" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav bookmark-icons">
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#!"><b>@php echo config('baklava.theme.info') @endphp</b></a></li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                              <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">{{ Auth::user()->name_first }}</span><span class="user-status">{{ Auth::user()->name_last }}</span></div>
                              <span><img class="round" src="https://www.gravatar.com/avatar/{{ md5(strtolower(Auth::user()->email)) }}?s=160" alt="avatar" height="40" width="40"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                @if(Auth::user()->root_admin)
                                    <a class="dropdown-item" href="{{ route('admin.index') }}"><i class="feather icon-alert-circle"></i> @lang('strings.admin_cp')</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('account') }}"><i class="feather icon-user"></i> @lang('navigation.account.my_account')</a>
                                <a class="dropdown-item" href="{{ route('account.security') }}"><i class="feather icon-lock"></i> @lang('navigation.account.security_controls')</a>
                                <a class="dropdown-item" href="{{ route('account.api') }}"><i class="feather icon-code"></i> @lang('navigation.account.api_access')</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('auth.logout') }}"><i class="feather icon-power"></i> @lang('strings.logout')</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="{{ route('index') }}">
                        <div class="brand-logo"><img src="/favicons/android-chrome-192x192.png" alt="{{ config('app.name', 'Pterodactyl') }}"></div>
                        <h2 class="brand-text mb-0">{{ config('app.name', 'Pterodactyl') }}</h2>
                    </a>
                </li>
                <li class="nav-item nav-toggle">
                    <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                        <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                        <i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                @if (isset($server->name) && isset($node->name))
                <li class=" nav-item"><a href="/"><i class="feather icon-server"></i><span class="menu-title">Server</span></a>
                    <ul class="menu-content">
                        <li class="active"><a href="{{ route('server.index', $server->uuidShort) }}">{{ $server->name }}</a>
                        </li>
                    </ul>
                </li>
                @endif
                <li class="navigation-header"><span>Admin Dashboard</span></li>
                <li class="nav-item {{ Route::currentRouteName() !== 'admin.index' ?: 'active' }}"><a href="{{ route('admin.index')}}"><i class="feather icon-home"></i><span class="menu-title">Overview</span></a></li>
                <li class="nav-item {{ Route::currentRouteName() !== 'admin.statistics' ?: 'active' }}"><a href="{{ route('admin.statistics')}}"><i class="feather icon-bar-chart-2"></i><span class="menu-title">Statistics</span></a></li>
                <li class="nav-item {{ Route::currentRouteName() !== 'admin.settings' ?: 'active' }}"><a href="{{ route('admin.settings')}}"><i class="feather icon-settings"></i><span class="menu-title">Settings</span></a></li>
                <li class="nav-item {{ Route::currentRouteName() !== 'admin.api.index' ?: 'active' }}"><a href="{{ route('admin.api.index')}}"><i class="feather icon-box"></i><span class="menu-title">Application API</span></a></li>
                
                <li class="navigation-header"><span>Management</span></li>
                <li class="nav-item {{ Route::currentRouteName() !== 'admin.databases' ?: 'active' }}"><a href="{{ route('admin.databases')}}"><i class="feather icon-database"></i><span class="menu-title">Databases</span></a></li>
                <li class="nav-item {{ Route::currentRouteName() !== 'admin.locations' ?: 'active' }}"><a href="{{ route('admin.locations')}}"><i class="feather icon-globe"></i><span class="menu-title">Locations</span></a></li>
                <li class="nav-item {{ Route::currentRouteName() !== 'admin.nodes' ?: 'active' }}"><a href="{{ route('admin.nodes')}}"><i class="feather icon-map"></i><span class="menu-title">Nodes</span></a></li>
                <li class="nav-item {{ Route::currentRouteName() !== 'admin.servers' ?: 'active' }}"><a href="{{ route('admin.servers')}}"><i class="feather icon-server"></i><span class="menu-title">Servers</span></a></li>
                <li class="nav-item {{ Route::currentRouteName() !== 'admin.users' ?: 'active' }}"><a href="{{ route('admin.users')}}"><i class="feather icon-users"></i><span class="menu-title">Users</span></a></li>
                <li class="nav-item {{ Route::currentRouteName() !== 'admin.nests' ?: 'active' }}"><a href="{{ route('admin.nests')}}"><i class="feather icon-grid"></i><span class="menu-title">Nests</span></a></li>
                <li class="nav-item {{ Route::currentRouteName() !== 'admin.packs' ?: 'active' }}"><a href="{{ route('admin.packs')}}"><i class="feather icon-archive"></i><span class="menu-title">Packs</span></a></li>

                @if(config('baklava.theme.ads')) <!-- THEME ADS -->
                    <li class="navigation-header"><span>Theme</span></li>
                    <li class="nav-item"><a href="https://pterodactyl-addons.com" target="_blank"><i class="feather icon-help-circle"></i><span class="menu-title">Support</span></a></li>
                @endif <!-- THEME ADS -->
            </ul>
        </div>
    </div>

    <div class="app-content content">
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <div class="card top-header">
                    <div class="row px-3 pt-2 pb-1">@yield('content-header')</div>
                </div>

                @if (count($errors) > 0)
                    <div class="alert alert-danger p-2 mb-2">
                        @lang('base.validation_error')<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @foreach (Alert::getMessages() as $type => $messages)
                    @foreach ($messages as $message)
                        <div class="alert alert-{{ $type }} alert-dismissable p-2 mb-2" role="alert">
                            {!! $message !!}
                        </div>
                    @endforeach
                @endforeach
                
                @yield('content')     
            </div>
        </div>
    </div>

        
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

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
        {!! Theme::js('vendor/select2/select2.full.min.js') !!}
        {!! Theme::js('js/admin/functions.js?t={cache-version}') !!}
        {!! Theme::js('js/autocomplete.js?t={cache-version}') !!}

        @if(Auth::user()->root_admin)
            <script>
                $('#logoutButton').on('click', function (event) {
                    event.preventDefault();

                    var that = this;
                    swal({
                        title: 'Do you want to log out?',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d9534f',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Log out'
                    }, function () {
                        window.location = $(that).attr('href');
                    });
                });
            </script>
        @endif

        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip();
            })
        </script>
    @show
</body>
</html>