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
    <meta name="_token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/favicons/manifest.json">
    <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#bc6e3c">
    <link rel="shortcut icon" href="/favicons/favicon.ico">
    <meta name="msapplication-config" content="/favicons/browserconfig.xml">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    @include('layouts.scripts')

    @section('scripts')
        {!! Theme::css('vendor/select2/select2.min.css?t={cache-version}') !!}
        {!! Theme::css('vendor/sweetalert/sweetalert.min.css?t={cache-version}') !!}
        {!! Theme::css('theme/css/bamburgh.min.css?t={cache-version}') !!}

        <link rel="stylesheet"
              href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

        <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    @show
</head>
<body id="app-top">
<div class="app-wrapper">
    <div class="app-sidebar
            @if (THEME == 'dark')
        app-sidebar--dark bg-second
@elseif (THEME == 'light')
        app-sidebar--light
@elseif (THEME == 'gradient1')
        app-sidebar--dark bg-midnight-bloom
@elseif (THEME == 'gradient2')
        app-sidebar--dark bg-night-sky
@elseif (THEME == 'primary')
        app-sidebar--dark bg-primary
@else
        app-sidebar--dark
@endif
        " id="app-sidebar">
        <div class="app-sidebar--header">
            <div class="nav-logo w-100 text-center">
                <a href="{{ route('index') }}" class="d-block" data-toggle="tooltip"
                   title="{{ config('app.name', 'Pterodactyl') }}">
                    <img src="/favicons/android-chrome-192x192.png" width="30%">
                </a>
            </div>
            <button class="toggle-sidebar rounded-circle btn btn-sm bg-white shadow-sm-dark text-primary"
                    data-toggle="tooltip" data-placement="right" title="Expand sidebar" type="button">
                <i class="fas fa-arrows-alt-h"></i>
            </button>
        </div>

        <div class="app-sidebar--content scrollbar-container">
            <div class="sidebar-navigation">
                <ul id="sidebar-nav">
                    @if (isset($server->name) && isset($node->name))
                        <li class="sidebar-header">Server: {{ $server->name }}</li>
                        <li>
                            <a href="#">
                                <span id="server_status_icon"><i
                                        data-feather="circle"></i><span>Checking...</span></span>
                            </a>
                        </li>
                    @endif

                    <li class="sidebar-header">@lang('navigation.account.header')</li>
                    <li class="{{ Route::currentRouteName() !== 'account' ?: 'mm-active' }}">
                        <a href="{{ route('account') }}">
                            <span><i data-feather="user"></i><span>@lang('navigation.account.my_account')</span></span>
                        </a>
                    </li>
                    <li class="{{ Route::currentRouteName() !== 'account.security' ?: 'mm-active' }}">
                        <a href="{{ route('account.security')}}">
                            <span><i data-feather="lock"></i><span>@lang('navigation.account.security_controls')</span></span>
                        </a>
                    </li>
                    <li class="{{ (Route::currentRouteName() !== 'account.api' && Route::currentRouteName() !== 'account.api.new') ?: 'mm-active' }}">
                        <a href="{{ route('account.api')}}">
                            <span><i data-feather="code"></i><span>@lang('navigation.account.api_access')</span></span>
                        </a>
                    </li>
                    <li class="{{ Route::currentRouteName() !== 'index' ?: 'mm-active' }}">
                        <a href="{{ route('index')}}">
                            <span><i
                                    data-feather="server"></i><span>@lang('navigation.account.my_servers')</span></span>
                        </a>
                    </li>

                    @if (isset($server->name) && isset($node->name))
                        <li class="sidebar-header">@lang('navigation.server.header')</li>
                        <li class="{{ Route::currentRouteName() !== 'server.index' ?: 'mm-active' }}">
                            <a href="{{ route('server.index', $server->uuidShort) }}">
                                <span><i
                                        data-feather="terminal"></i><span>@lang('navigation.server.console')</span></span>
                                <span class="pull-right-container muted muted-hover"
                                      href="{{ route('server.console', $server->uuidShort) }}" id="console-popout">
                                        <span class="label label-default pull-right" style="padding: 3px 5px 2px 5px;">
                                            <i class="fa fa-external-link"></i>
                                        </span>
                                    </span>
                            </a>
                        </li>
                        @can('list-files', $server)
                            <li
                                @if(starts_with(Route::currentRouteName(), 'server.files'))
                                class="mm-active"
                                @endif
                            >
                                <a href="{{ route('server.files.index', $server->uuidShort) }}">
                                    <span><i
                                            data-feather="file"></i><span>@lang('navigation.server.file_management')</span></span>
                                </a>
                            </li>
                        @endcan
                        @can('list-subusers', $server)
                            <li
                                @if(starts_with(Route::currentRouteName(), 'server.subusers'))
                                class="mm-active"
                                @endif
                            >
                                <a href="{{ route('server.subusers', $server->uuidShort)}}">
                                    <span><i
                                            data-feather="users"></i><span>@lang('navigation.server.subusers')</span></span>
                                </a>
                            </li>
                        @endcan
                        @can('list-schedules', $server)
                            <li
                                @if(starts_with(Route::currentRouteName(), 'server.schedules'))
                                class="mm-active"
                                @endif
                            >
                                <a href="{{ route('server.schedules', $server->uuidShort)}}">
                                    <span><i data-feather="clock"></i><span>@lang('navigation.server.schedules')</span></span>
                                    <span class="pull-right-container">
                                        <span
                                            class="badge badge-info pull-right">{{ \Pterodactyl\Models\Schedule::select('id')->where('server_id', $server->id)->where('is_active', 1)->count() }}</span>
                                    </span>
                                </a>
                            </li>
                        @endcan
                        @can('view-databases', $server)
                            <li
                                @if(starts_with(Route::currentRouteName(), 'server.databases'))
                                class="mm-active"
                                @endif
                            >
                                <a href="{{ route('server.databases.index', $server->uuidShort)}}">
                                    <span><i
                                            data-feather="database"></i><span>@lang('navigation.server.databases')</span></span>
                                </a>
                            </li>
                        @endcan
                        @if(Gate::allows('view-startup', $server) || Gate::allows('access-sftp', $server) ||  Gate::allows('view-allocations', $server))
                            <li class="
                                @if(starts_with(Route::currentRouteName(), 'server.settings'))
                                mm-active
@endif
                                ">
                                <a href="#" aria-expanded="false">
                                    <span><i data-feather="sliders"></i>@lang('navigation.server.configuration')</span>
                                    <i class="fas fa-angle-right"></i>
                                </a>
                                <ul class="animated fade" aria-expanded="false">
                                    @can('view-name', $server)
                                        <li class="{{ Route::currentRouteName() !== 'server.settings.name' ?: 'mm-active' }}">
                                            <a href="{{ route('server.settings.name', $server->uuidShort) }}">
                                                @lang('navigation.server.server_name')
                                            </a></li>
                                    @endcan
                                    @can('view-allocations', $server)
                                        <li class="{{ Route::currentRouteName() !== 'server.settings.allocation' ?: 'mm-active' }}">
                                            <a href="{{ route('server.settings.allocation', $server->uuidShort) }}">
                                                @lang('navigation.server.port_allocations')
                                            </a></li>
                                    @endcan
                                    @can('access-sftp', $server)
                                        <li class="{{ Route::currentRouteName() !== 'server.settings.sftp' ?: 'mm-active' }}">
                                            <a href="{{ route('server.settings.sftp', $server->uuidShort) }}">
                                                @lang('navigation.server.sftp_settings')
                                            </a></li>
                                    @endcan
                                    @can('view-startup', $server)
                                        <li class="{{ Route::currentRouteName() !== 'server.settings.startup' ?: 'mm-active' }}">
                                            <a href="{{ route('server.settings.startup', $server->uuidShort) }}">
                                                @lang('navigation.server.startup_parameters')
                                            </a></li>
                                    @endcan
                                </ul>
                            </li>
                        @endif
                        @if(Auth::user()->root_admin)
                            <li class="sidebar-header">@lang('navigation.server.admin_header')</li>
                            <li>
                                <a href="{{ route('admin.servers.view', $server->id) }}" target="_blank">
                                    <span>
                                        <i data-feather="settings"></i><span>@lang('navigation.server.admin')</span>
                                    </span>
                                </a>
                            </li>
                        @endif
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="sidebar-mobile-overlay"></div>

    <div class="app-main">
        <div class="app-header">
            <div class="d-flex">
                <button class="navbar-toggler hamburger hamburger--elastic toggle-sidebar" type="button"><span
                        class="hamburger-box"><span class="hamburger-inner"></span></span></button>
                <button class="navbar-toggler hamburger hamburger--elastic toggle-sidebar-mobile" type="button"><span
                        class="hamburger-box"><span class="hamburger-inner"></span></span></button>
            </div>
            <div class="d-flex align-items-center">
                @if(Auth::user()->root_admin)
                    <button type="button" onclick="window.location.href='{{ route('admin.index') }}'"
                            data-toggle="tooltip" data-placement="bottom" title="@lang('strings.admin_cp')"
                            class="btn bg-neutral-first text-first font-size-lg mr-2 p-0 d-inline-block shadow-none text-center d-44 rounded popover-custom">
                        <i class="fas fa-gears"></i>
                    </button>
                @endif
                <button type="button" data-trigger="click" data-placement="auto"
                        data-popover-class="popover-second popover-custom-wrapper popover-custom-lg shadow-lg"
                        data-rel="popover-close-outside" data-tip="menu-header-popover"
                        class="btn bg-neutral-danger text-danger font-size-lg mr-2 p-0 d-inline-block shadow-none text-center d-44 rounded popover-custom position-relative">
                    <i class="fas fa-th"></i>
                </button>
                <div class="user-box ml-2">
                    <a href="#" data-trigger="click"
                       data-popover-class="popover-secondary popover-custom-wrapper popover-custom-lg"
                       data-rel="popover-close-outside"
                       data-tip="account-popover" class="p-0 d-flex align-items-center popover-custom"
                       data-placement="bottom" data-boundary="'viewport'">
                        <div class="d-block p-0 avatar-icon-wrapper">
                            <span class="badge badge-circle badge-success p-top-a">Online</span>
                            <div class="avatar-icon rounded">
                                <img
                                    src="https://www.gravatar.com/avatar/{{ md5(strtolower(Auth::user()->email)) }}?s=160"
                                    alt="User Image">
                            </div>
                        </div>
                        <div class="d-none d-md-block pl-2">
                            <div class="font-weight-bold">
                                {{ Auth::user()->name_first }} {{ Auth::user()->name_last }}
                            </div>
                            <span class="text-black-50">
                            {{ Auth::user()->email }}
                    </span>
                        </div>
                        <span class="pl-3"><i class="fas fa-angle-down opacity-5"></i></span>
                    </a>
                </div>

                <div id="account-popover" class="d-none">
                    <ul class="list-group list-group-flush text-left bg-transparent">
                        <li class="list-group-item rounded-top">
                            <ul class="nav nav-pills nav-pills-hover flex-column">
                                <li class="nav-header d-flex text-primary pt-1 pb-2 font-weight-bold align-items-center">
                                    <div>
                                        Profile options
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('account') }}">
                                        <i class="fa fa-user"></i> My Account
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('auth.logout') }}" id="logoutButton">
                                        <i class="fa fa-sign-out"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div id="menu-header-popover" class="d-none">
                    <div class="px-3 pt-3 pb-3 text-center">
                        <div class="m-3 d-inline-block text-center">
                            <a href="default"
                               class="btn btn-link p-0 bg-ripe-malin d-inline-block text-center text-white font-size-xl d-50 rounded border-0 mb-2 change-theme">
                                <i class="fas fa-drafting-compass"></i>
                            </a>
                            <div class="d-block text-white-50">Default</div>
                        </div>
                        <div class="m-3 d-inline-block text-center">
                            <a href="light"
                               class="btn btn-link p-0 bg-light d-inline-block text-center text-black font-size-xl d-50 rounded border-0 mb-2 change-theme">
                                <i class="fas fa-dungeon"></i>
                            </a>
                            <div class="d-block text-white-50">Light</div>
                        </div>
                        <div class="m-3 d-inline-block text-center">
                            <a href="dark"
                               class="btn btn-link p-0 bg-dark d-inline-block text-center text-white font-size-xl d-50 rounded border-0 mb-2 change-theme">
                                <i class="fas fa-football-ball"></i>
                            </a>
                            <div class="d-block text-white-50">Dark</div>
                        </div>
                        <div class="divider opacity-2 bg-white mb-1"></div>
                        <div class="m-3 d-inline-block text-center">
                            <a href="gradient1"
                               class="btn btn-link p-0 bg-grow-early d-inline-block text-center text-white font-size-xl d-50 rounded border-0 mb-2 change-theme">
                                <i class="fas fa-rocket"></i>
                            </a>
                            <div class="d-block text-white-50">Gradient 1</div>
                        </div>
                        <div class="m-3 d-inline-block text-center">
                            <a href="gradient2"
                               class="btn btn-link p-0 bg-arielle-smile d-inline-block text-center text-white font-size-xl d-50 rounded border-0 mb-2 change-theme">
                                <i class="fas fa-glass"></i>
                            </a>
                            <div class="d-block text-white-50">Gradient 2</div>
                        </div>
                        <div class="m-3 d-inline-block text-center">
                            <a href="primary"
                               class="btn btn-link p-0 bg-primary d-inline-block text-center text-white font-size-xl d-50 rounded border-0 mb-2 change-theme">
                                <i class="fas fa-road"></i>
                            </a>
                            <div class="d-block text-white-50">Primary</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="app-content">
            <div class="app-content--inner">
                <div class="page-title">
                    <div class="row">
                        <div class="col-xl-7">
                            <div>
                                @yield('content-header')
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
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
                                    <div class="alert alert-{{ $type }} alert-dismissable" role="alert">
                                        {!! $message !!}
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>

                    @yield('content')
                </div>
            </div>

            <div class="app-footer font-size-sm text-black-50">
                <div>
                    Copyright &copy; 2015 - {{ date('Y') }} <a href="https://pterodactyl.io/">Pterodactyl Software</a>.
                </div>
                <div>
                    <ul class="nav nav-justified">
                        <li class="nav-item">
                            <strong><i
                                    class="fa fa-fw {{ $appIsGit ? 'fa-git-square' : 'fa-code-fork' }}"></i></strong> {{ $appVersion }}
                            <br />
                        </li>
                        <li class="nav-item">
                            <strong>
                                <i class="fa fa-fw fa-clock-o"></i>
                            </strong>
                            {{ round(microtime(true) - LARAVEL_START, 3) }}s
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </div>
</div>
@section('footer-scripts')
    {!! Theme::js('js/keyboard.polyfill.js?t={cache-version}') !!}
    <script>keyboardeventKeyPolyfill.polyfill();</script>

    {!! Theme::js('js/laroute.js?t={cache-version}') !!}
    {!! Theme::js('vendor/jquery/jquery.min.js?t={cache-version}') !!}
    {!! Theme::js('theme/js/popper.min.js?t={cache-version}') !!}
    {!! Theme::js('vendor/sweetalert/sweetalert.min.js?t={cache-version}') !!}
    {!! Theme::js('theme/vendor/bootstrap/js/bootstrap.min.js?t={cache-version}') !!}
    {!! Theme::js('theme/js/demo/bootstrap/bootstrap.min.js?t={cache-version}') !!}
    {!! Theme::js('vendor/slimscroll/jquery.slimscroll.min.js?t={cache-version}') !!}
    {!! Theme::js('vendor/socketio/socket.io.v203.min.js?t={cache-version}') !!}
    {!! Theme::js('vendor/bootstrap-notify/bootstrap-notify.min.js?t={cache-version}') !!}
    {!! Theme::js('js/autocomplete.js?t={cache-version}') !!}
    {!! Theme::js('theme/vendor/metismenu/js/metismenu.min.js?t={cache-version}') !!}
    {!! Theme::js('theme/js/demo/metismenu/metismenu.min.js?t={cache-version}') !!}
    {!! Theme::js('theme/vendor/perfect-scrollbar/js/perfect-scrollbar.min.js?t={cache-version}') !!}
    {!! Theme::js('theme/js/demo/perfect-scrollbar/perfect-scrollbar.min.js?t={cache-version}') !!}
    {!! Theme::js('theme/vendor/feather-icons/js/feather-icons.min.js?t={cache-version}') !!}
    {!! Theme::js('theme/js/demo/feather-icons/feather-icons.min.js?t={cache-version}') !!}
    {!! Theme::js('theme/js/bamburgh.min.js?t={cache-version}') !!}
    {!! Theme::js('theme/vendor/slick/js/slick.min.js?t={cache-version}') !!}
    {!! Theme::js('theme/js/demo/slick/slick.min.js?t={cache-version}') !!}

    <script>
        $(document).on('click', '#logoutButton', function (event) {
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

    <script>
        function switchTheme(theme) {
            switch (theme) {
                case 'light':
                    $('#app-sidebar').removeClass('bg-second').removeClass('app-sidebar--light').removeClass('app-sidebar--dark').removeClass('bg-midnight-bloom').removeClass('bg-night-sky').removeClass('bg-primary');
                    $('#app-sidebar').addClass('app-sidebar--light');
                    break;
                case 'dark':
                    $('#app-sidebar').removeClass('app-sidebar--light').removeClass('app-sidebar--dark').removeClass('bg-primary').removeClass('bg-night-sky').removeClass('bg-midnight-bloom').removeClass('bg-second');
                    $('#app-sidebar').addClass('bg-second').addClass('app-sidebar--dark');
                    break;
                case 'gradient1':
                    $('#app-sidebar').removeClass('app-sidebar--dark').removeClass('app-sidebar--light').removeClass('bg-second').removeClass('bg-primary').removeClass('bg-night-sky').removeClass('bg-midnight-bloom');
                    $('#app-sidebar').addClass('bg-midnight-bloom').addClass('app-sidebar--dark');
                    break;
                case 'gradient2':
                    $('#app-sidebar').removeClass('app-sidebar--dark').removeClass('app-sidebar--light').removeClass('bg-second').removeClass('bg-primary').removeClass('bg-night-sky').removeClass('bg-midnight-bloom');
                    $('#app-sidebar').addClass('bg-night-sky').addClass('app-sidebar--dark');
                    break;
                case 'primary':
                    $('#app-sidebar').removeClass('app-sidebar--dark').removeClass('app-sidebar--light').removeClass('bg-second').removeClass('bg-primary').removeClass('bg-night-sky').removeClass('bg-midnight-bloom');
                    $('#app-sidebar').addClass('bg-primary').addClass('app-sidebar--dark');
                    break;
                default:
                    $('#app-sidebar').removeClass('app-sidebar--dark').removeClass('app-sidebar--light').removeClass('bg-second').removeClass('bg-primary').removeClass('bg-night-sky').removeClass('bg-midnight-bloom');
                    $('#app-sidebar').addClass('app-sidebar--dark');
                    break;
            }
        }

        function createCookie(name, value, days) {
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                var expires = "; expires=" + date.toGMTString();
            }
            else var expires = "";
            document.cookie = name + "=" + value + expires + "; path=/; domain=." + document.domain;
        }

        $(document).on('click', '.change-theme', function (event) {
            event.preventDefault();

            let theme = this.href.split("/");
            theme = theme[theme.length - 1];

            createCookie('theme', theme, "");

            switchTheme(theme);
        });
    </script>
@show
</body>
</html>
