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
    <h1>@lang('server.index.header')<small>@lang('server.index.header_sub')</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('index') }}">@lang('strings.servers')</a></li>
        <li class="active">{{ $server->name }}</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <i class="fa fa-terminal"></i>
                </div>
                <p class="card-category"><b>Server Name</b></p>
                <h3 class="card-title">{{ $server->name }}</h3>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <i class="fa fa-bolt"></i>
                </div>
                <p class="card-category"><b>Memory Usage</b></p>
                <h3 class="card-title dynamic-update" data-server="{{ $server->uuidShort }}"><span data-action="memory">--</span> / {{ $server->memory === 0 ? '∞' : $server->memory }} <small class="text-card">MB</small></h3>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <i class="fa fa-microchip"></i>
                </div>
                <p class="card-category"><b>CPU Usage</b></p>
                <h3 class="card-title dynamic-update" data-server="{{ $server->uuidShort }}"><span data-action="cpu" data-cpumax="{{ $server->cpu }}">--</span> <small class="text-card">%</small></h3>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <i class="fa fa-hdd-o"></i>
                </div>
                <p class="card-category"><b>Disk Usage</b></p>
                <h3 class="card-title dynamic-update" data-server="{{ $server->uuidShort }}"><span data-action="disk">--</span> / {{ $server->disk === 0 ? '∞' : $server->disk }} <small class="text-card">MB</small></h3>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body position-relative">
                <div id="terminal" style="width:100%;"></div>
                <div id="terminal_input" class="form-group no-margin">
                    <div class="input-group">
                        <div class="input-group-addon terminal_input--prompt">Command:</div>
                        <input type="text" class="form-control terminal_input--input">
                    </div>
                </div>
                <div id="terminalNotify" class="terminal-notify hidden">
                    <i class="fa fa-arrow-down"></i>
                </div>
            </div>
            <div class="box-footer text-center">
                @can('power-start', $server)<button class="btn btn-success disabled" data-attr="power" data-action="start"><i class="fa fa-play-circle"></i> Start</button>@endcan
                @can('power-restart', $server)<button class="btn btn-warning disabled" data-attr="power" data-action="restart"><i class="fa fa-refresh"></i> Restart</button>@endcan
                @can('power-stop', $server)<button class="btn btn-danger disabled" data-attr="power" data-action="stop"><i class="fa fa-stop-circle"></i> Stop</button>@endcan
                @can('power-kill', $server)<button class="btn btn-danger disabled" data-attr="power" data-action="kill"><i class="fa fa-times-circle"></i> Kill</button>@endcan
                <a href="{{ route('server.console', $server->uuidShort) }}" target="_blank"><span class="btn btn-info"><i class="fa fa-external-link"></i></span></a>
                <!-- <a href="steam://connect/{{ $server->allocation->ip }}:{{ $server->allocation->port }}"><button class="btn btn-info">Connect</button></a> -->
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Memory Usage <font size="-5">(in Megabytes)</font></h3>
            </div>
            <div class="box-body">
                <canvas id="chart_memory" style="max-height:300px;"></canvas>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">CPU Usage <font size="-5">(as Percent Total)</font></h3>
            </div>
            <div class="box-body">
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
    {!! Theme::js('vendor/chartjs/chart.min.js') !!}
    {!! Theme::js('/themes/pure-ui-dark/js/pure-ui_graphics.php') !!}
    {!! Theme::js('vendor/jquery/date-format.min.js') !!}
    {!! Theme::js('js/frontend/serverlist.js') !!}
    @if($server->nest->name === 'Minecraft' && $server->nest->author === 'support@pterodactyl.io')
        {!! Theme::js('js/plugins/minecraft/eula.js') !!}
    @endif
@endsection
