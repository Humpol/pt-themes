{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}
@extends('layouts.admin')

@section('title')
    Server — {{ $server->name }}: Manage
@endsection

@section('content-header')
    <h1>{{ $server->name }}<small>Additional actions to control this server.</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}">Admin</a></li>
        <li><a href="{{ route('admin.servers') }}">Servers</a></li>
        <li><a href="{{ route('admin.servers.view', $server->id) }}">{{ $server->name }}</a></li>
        <li class="active">Manage</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mb-2">
        <a class="btn btn-md btn-primary" href="{{ route('admin.servers.view', $server->id) }}">About</a>
        @if($server->installed === 1)
            <a class="btn btn-md btn-primary" href="{{ route('admin.servers.view.details', $server->id) }}">Details</a>
            <a class="btn btn-md btn-primary" href="{{ route('admin.servers.view.build', $server->id) }}">Build Configuration</a>
            <a class="btn btn-md btn-primary" href="{{ route('admin.servers.view.startup', $server->id) }}">Startup</a>
            <a class="btn btn-md btn-primary" href="{{ route('admin.servers.view.database', $server->id) }}">Database</a>
            <a class="btn btn-md btn-info" href="{{ route('admin.servers.view.manage', $server->id) }}">Manage</a>
        @endif
        <a class="btn btn-md btn-danger" href="{{ route('admin.servers.view.delete', $server->id) }}">Delete</a>
        <a class="btn btn-md btn-success" href="{{ route('server.index', $server->uuidShort) }}"><i class="feather icon-external-link"></i></a>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="card card-primary">
            <div class="card-header with-border">
                <h3 class="card-title">Reinstall Server</h3>
            </div>
            <div class="card-body">
                <p>This will reinstall the server with the assigned pack and service scripts. <strong>Danger!</strong> This could overwrite server data.</p>
            </div>
            <div class="card-footer">
                @if($server->installed === 1)
                    <form action="{{ route('admin.servers.view.manage.reinstall', $server->id) }}" method="POST">
                        {!! csrf_field() !!}
                        <button type="submit" class="btn btn-danger">Reinstall Server</button>
                    </form>
                @else
                    <button class="btn btn-danger disabled">Server Must Install Properly to Reinstall</button>
                @endif
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card card-primary">
            <div class="card-header with-border">
                <h3 class="card-title">Install Status</h3>
            </div>
            <div class="card-body">
                <p>If you need to change the install status from uninstalled to installed, or vice versa, you may do so with the button below.</p>
            </div>
            <div class="card-footer">
                <form action="{{ route('admin.servers.view.manage.toggle', $server->id) }}" method="POST">
                    {!! csrf_field() !!}
                    <button type="submit" class="btn btn-primary">Toggle Install Status</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header with-border">
                <h3 class="card-title">Rebuild Container</h3>
            </div>
            <div class="card-body">
                <p>This will trigger a rebuild of the server container when it next starts up. This is useful if you modified the server configuration file manually, or something just didn't work out correctly.</p>
            </div>
            <div class="card-footer">
                <form action="{{ route('admin.servers.view.manage.rebuild', $server->id) }}" method="POST">
                    {!! csrf_field() !!}
                    <button type="submit" class="btn btn-secondary">Rebuild Server Container</button>
                </form>
            </div>
        </div>
    </div>
    @if(! $server->suspended)
        <div class="col-sm-4">
            <div class="card card-warning">
                <div class="card-header with-border">
                    <h3 class="card-title">Suspend Server</h3>
                </div>
                <div class="card-body">
                    <p>This will suspend the server, stop any running processes, and immediately block the user from being able to access their files or otherwise manage the server through the panel or API.</p>
                </div>
                <div class="card-footer">
                    <form action="{{ route('admin.servers.view.manage.suspension', $server->id) }}" method="POST">
                        {!! csrf_field() !!}
                        <input type="hidden" name="action" value="suspend" />
                        <button type="submit" class="btn btn-warning">Suspend Server</button>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="col-sm-4">
            <div class="card card-success">
                <div class="card-header with-border">
                    <h3 class="card-title">Unsuspend Server</h3>
                </div>
                <div class="card-body">
                    <p>This will unsuspend the server and restore normal user access.</p>
                </div>
                <div class="card-footer">
                    <form action="{{ route('admin.servers.view.manage.suspension', $server->id) }}" method="POST">
                        {!! csrf_field() !!}
                        <input type="hidden" name="action" value="unsuspend" />
                        <button type="submit" class="btn btn-success">Unsuspend Server</button>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
