@extends('layouts.admin')
@include('partials/admin.settings.nav', ['activeTab' => 'basic'])

@section('title')
    Statistics Overview
@endsection

@section('content-header')
    <h1>Statistics Overview<small>Monitor your panel usage.</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}">Admin</a></li>
        <li class="active">Statistics</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12 col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                Servers
            </div>
            <div class="card-body row">
                <div class="col-xs-12 col-md-6">
                    <canvas id="servers_chart" width="100%" height="50"></canvas>
                </div>
                <div class="col-xs-12 col-md-6">
                    <canvas id="status_chart" width="100%" height="50"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-4 m-auto">
        <div class="card p-2 d-block">
            <div class="row px-2 font-medium-4">
                <div class="stats-content w-75">
                    <span class="info-box-text">Servers</span>
                    <span class="info-box-number">{{ count($servers) }}</span>
                </div>
                <span class="icon text-right w-25"><i class="fa fa-server"></i></span>
            </div>
        </div>
        <div class="card p-2 d-block">
            <div class="row px-2 font-medium-4">
                <div class="stats-content w-75">
                    <span class="info-box-text">Total used Memory (in MB)</span>
                    <span class="info-box-number">{{ $totalServerRam }}MB</span>
                </div>
                <span class="icon text-right w-25"><i class="fa fa-memory"></i></span>
            </div>
        </div>
        <div class="card p-2 d-block">
            <div class="row px-2 font-medium-4">
                <div class="stats-content w-75">
                    <span class="info-box-text">Total used Disk (in MB)</span>
                    <span class="info-box-number">{{ $totalServerDisk }}MB</span>
                </div>
                <span class="icon text-right w-25"><i class="fa fa-hdd"></i></span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-8">
        <div class="card">
            <div class="card-header">
                Nodes
            </div>
            <div class="card-body row">
                <div class="col-xs-12 col-md-6">
                    <canvas id="ram_chart" width="100%" height="50"></canvas>
                </div>
                <div class="col-xs-12 col-md-6">
                    <canvas id="disk_chart" width="100%" height="50"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-4 m-auto">
        <div class="card p-2 d-block">
            <div class="row px-2 font-medium-4">
                <div class="stats-content w-75">
                    <span class="info-box-text">Total RAM</span>
                    <span class="info-box-number">{{ $totalNodeRam }}MB</span>
                </div>
                <span class="icon text-right w-25"><i class="fa fa-memory"></i></span>
            </div>
        </div>
        <div class="card p-2 d-block">
            <div class="row px-2 font-medium-4">
                <div class="stats-content w-75">
                    <span class="info-box-text">Total Disk Space</span>
                    <span class="info-box-number">{{ $totalNodeDisk }}MB</span>
                </div>
                <span class="icon text-right w-25"><i class="fa fa-hdd"></i></span>
            </div>
        </div>
        <div class="card p-2 d-block">
            <div class="row px-2 font-medium-4">
                <div class="stats-content w-75">
                    <span class="info-box-text">Total Allocations</span>
                    <span class="info-box-number">{{ $totalAllocations }}</span>
                </div>
                <span class="icon text-right w-25"><i class="fa fa-globe"></i></span>
            </div>
        </div>
    </div>
</div>

<hr class="mt-0 mb-1 d-xl-none d-lg-none"/>

<div class="row">
    <div class="col-lg-3 col-md-6 col-12">
        <div class="card p-2 d-block">
            <div class="row px-2 font-medium-4">
                <div class="stats-content w-75">
                    <span class="info-box-text">Total Eggs</span>
                    <span class="info-box-number">{{ $eggsCount }}</span>
                </div>
                <span class="icon text-right w-25"><i class="fa fa-gamepad"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-12">
        <div class="card p-2 d-block">
            <div class="row px-2 font-medium-4">
                <div class="stats-content w-75">
                    <span class="info-box-text">Total Users</span>
                    <span class="info-box-number">{{ $usersCount }}</span>
                </div>
                <span class="icon text-right w-25"><i class="fa fa-users"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-12">
        <div class="card p-2 d-block">
            <div class="row px-2 font-medium-4">
                <div class="stats-content w-75">
                    <span class="info-box-text">Total Nodes</span>
                    <span class="info-box-number">{{ count($nodes) }}</span>
                </div>
                <span class="icon text-right w-25"><i class="fa fa-server"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-12">
        <div class="card p-2 d-block">
            <div class="row px-2 font-medium-4">
                <div class="stats-content w-75">
                    <span class="info-box-text">Total Databases</span>
                    <span class="info-box-number">{{ $databasesCount }}</span>
                </div>
                <span class="icon text-right w-25"><i class="fa fa-database"></i></span>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer-scripts')
    @parent
    {!! Theme::js('vendor/chartjs/chart.min.js') !!}
    {!! Theme::js('js/admin/statistics.js') !!}
@endsection