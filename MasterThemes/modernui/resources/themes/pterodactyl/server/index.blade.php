{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}
@extends('layouts.master')

@section('title')
    {{ trans('server.index.title', [ 'name' => $server->name]) }}
@endsection

@section('scripts')
    @parent
    {!! Theme::css('css/terminal.css') !!}
@endsection

@section('content-header')
    <ol class="breadcrumb text-uppercase font-size-xs p-0">
        <li class="breadcrumb-item"><a href="{{ route('index') }}">@lang('strings.servers')</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $server->name }}</li>
    </ol>
    <h5 class="display-4 mt-1 mb-2 font-weight-bold">@lang('server.index.header')</h5>
    <p class="text-black-50 mb-0">@lang('server.index.header_sub')</p>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-xl-4">
            <a href="#" class="card card-box mb-5 card-box-border-bottom border-success">
                <div class="card-body">
                    <div class="align-box-row align-items-start">
                        <div class="mr-3">
                            <div class="bg-success text-center text-white font-size-xl d-50 rounded-circle">
                                <i class="fas fa-memory"></i>
                            </div>
                        </div>
                        <div>
                            <div class="font-weight-bold">
                                <small class="text-black-50 d-block mb-1 text-uppercase">Memory Usage</small>
                                <span class="font-size-xxl text-success mt-1 dynamic-update" data-server="{{ $server->uuidShort }}"><span data-action="memory">--</span> / {{ $server->memory === 0 ? '&infin;' : $server->memory }} <small>MB</small></span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-xl-4">
            <a href="#" class="card card-box mb-5 card-box-border-bottom border-first">
                <div class="card-body">
                    <div class="align-box-row align-items-start">
                        <div class="mr-3">
                            <div class="bg-first text-center text-white font-size-xl d-50 rounded-circle">
                                <i class="fas fa-cloud"></i>
                            </div>
                        </div>
                        <div>
                            <div class="font-weight-bold">
                                <small class="text-black-50 d-block mb-1 text-uppercase">CPU Usage</small>
                                <span class="font-size-xxl text-first mt-1 dynamic-update" data-server="{{ $server->uuidShort }}"><span data-action="cpu" data-cpumax="{{ $server->cpu }}">--</span>%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-xl-4">
            <a href="#" class="card card-box mb-5 card-box-border-bottom border-danger">
                <div class="card-body">
                    <div class="align-box-row align-items-start">
                        <div class="mr-3">
                            <div class="bg-danger text-center text-white font-size-xl d-50 rounded-circle">
                                <i class="fas fa-hdd"></i>
                            </div>
                        </div>
                        <div>
                            <div class="font-weight-bold">
                                <small class="text-black-50 d-block mb-1 text-uppercase">Disk Usage</small>
                                <span class="font-size-xxl text-danger mt-1 dynamic-update" data-server="{{ $server->uuidShort }}"><span data-action="disk">--</span> / {{ $server->disk === 0 ? '∞' : $server->disk }} <small>MB</small></span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-box mb-4">
                <div class="card-body position-relative p-0">
                    <div id="terminal" style="width:100%;"></div>
                    <div id="terminal_input" class="form-group no-margin">
                        <div class="input-group">
                            <div class="input-group-addon terminal_input--prompt">container:~/$</div>
                            <input type="text" class="form-control terminal_input--input">
                        </div>
                    </div>
                    <div id="terminalNotify" class="terminal-notify hidden">
                        <i class="fa fa-bell"></i>
                    </div>
                </div>
                <div class="card-footer text-center">
                    @can('power-start', $server)
                        <button class="btn btn-success disabled" data-attr="power" data-action="start">Start
                        </button>@endcan
                    @can('power-restart', $server)
                        <button class="btn btn-primary disabled" data-attr="power" data-action="restart">Restart
                        </button>@endcan
                    @can('power-stop', $server)
                        <button class="btn btn-warning disabled" data-attr="power" data-action="stop">Stop
                        </button>@endcan
                    @can('power-kill', $server)
                        <button class="btn btn-danger disabled" data-attr="power" data-action="kill">Kill
                        </button>@endcan
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="card card-box">
                <div class="card-header">
                    <div class="card-header--title">
                        <h5 class="my-3">Memory Usage</h5>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="chart_memory" style="max-height:300px;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card card-box">
                <div class="card-header">
                    <div class="card-header--title">
                        <h5 class="my-3">CPU Usage</h5>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="chart_cpu" style="max-height:300px;"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-scripts')
    @parent
    {!! Theme::js('vendor/ansi/ansi_up.js') !!}
    {!! Theme::js('js/frontend/server.socket.js') !!}
    {!! Theme::js('vendor/mousewheel/jquery.mousewheel-min.js') !!}
    {!! Theme::js('js/frontend/console.js') !!}
    {!! Theme::js('vendor/chartjs/chart.min.js') !!}
    {!! Theme::js('vendor/jquery/date-format.min.js') !!}
    {!! Theme::js('js/frontend/serverlist.js') !!}
    @if($server->nest->name === 'Minecraft' && $server->nest->author === 'support@pterodactyl.io')
        {!! Theme::js('js/plugins/minecraft/eula.js') !!}
    @endif
@endsection
