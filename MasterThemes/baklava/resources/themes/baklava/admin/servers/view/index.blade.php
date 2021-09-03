{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}
@extends('layouts.admin')

@section('title')
    Server — {{ $server->name }}
@endsection

@section('content-header')
    <h1>{{ $server->name }}<small>{{ str_limit($server->description) }}</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}">Admin</a></li>
        <li><a href="{{ route('admin.servers') }}">Servers</a></li>
        <li class="active">{{ $server->name }}</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mb-2">
        <a class="btn btn-md btn-info" href="{{ route('admin.servers.view', $server->id) }}">About</a>
        @if($server->installed === 1)
            <a class="btn btn-md btn-primary" href="{{ route('admin.servers.view.details', $server->id) }}">Details</a>
            <a class="btn btn-md btn-primary" href="{{ route('admin.servers.view.build', $server->id) }}">Build Configuration</a>
            <a class="btn btn-md btn-primary" href="{{ route('admin.servers.view.startup', $server->id) }}">Startup</a>
            <a class="btn btn-md btn-primary" href="{{ route('admin.servers.view.database', $server->id) }}">Database</a>
            <a class="btn btn-md btn-primary" href="{{ route('admin.servers.view.manage', $server->id) }}">Manage</a>
        @endif
        <a class="btn btn-md btn-danger" href="{{ route('admin.servers.view.delete', $server->id) }}">Delete</a>
        <a class="btn btn-md btn-success" href="{{ route('server.index', $server->uuidShort) }}"><i class="feather icon-external-link"></i></a>
    </div>
</div>
<div class="row">
    <div class="col-sm-8">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header with-border">
                        <h3 class="card-title">Information</h3>
                    </div>
                    <div class="card-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <td>Internal Identifier</td>
                                <td><code>{{ $server->id }}</code></td>
                            </tr>
                            <tr>
                                <td>External Identifier</td>
                                @if(is_null($server->external_id))
                                    <td><span class="label label-default">Not Set</span></td>
                                @else
                                    <td><code>{{ $server->external_id }}</code></td>
                                @endif
                            </tr>
                            <tr>
                                <td>UUID / Docker Container ID</td>
                                <td><code>{{ $server->uuid }}</code></td>
                            </tr>
                            <tr>
                                <td>Service</td>
                                <td>
                                    <a href="{{ route('admin.nests.view', $server->nest_id) }}">{{ $server->nest->name }}</a> ::
                                    <a href="{{ route('admin.nests.egg.view', $server->egg_id) }}">{{ $server->egg->name }}</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>{{ $server->name }}</td>
                            </tr>
                            <tr>
                                <td>Memory</td>
                                <td><code>{{ $server->memory }}MB</code> / <code data-toggle="tooltip" data-placement="top" title="Swap Space">{{ $server->swap }}MB</code></td>
                            </tr>
                            <tr>
                                <td>Disk Space</td>
                                <td><code>{{ $server->disk }}MB</code></td>
                            </tr>
                            <tr>
                                <td>Block IO Weight</td>
                                <td><code>{{ $server->io }}</code></td>
                            </tr>
                            <tr>
                                <td>CPU Limit</td>
                                <td><code>{{ $server->cpu }}%</code></td>
                            </tr>
                            <tr>
                                <td>Default Connection</td>
                                <td><code>{{ $server->allocation->ip }}:{{ $server->allocation->port }}</code></td>
                            </tr>
                            <tr>
                                <td>Connection Alias</td>
                                <td>
                                    @if($server->allocation->alias !== $server->allocation->ip)
                                        <code>{{ $server->allocation->alias }}:{{ $server->allocation->port }}</code>
                                    @else
                                        <span class="label label-default">No Alias Assigned</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        @if($server->suspended)
            <div class="card">
                <div class="small-card bg-warning">
                    <div class="inner">
                        <h3 class="no-margin">Suspended</h3>
                    </div>
                </div>
            </div>
        @endif
        @if($server->installed !== 1)
            <div class="card">
                <div class="small-card {{ (! $server->installed) ? 'bg-blue' : 'bg-maroon' }}">
                    <div class="inner">
                        <h3 class="no-margin">{{ (! $server->installed) ? 'Installing' : 'Install Failed' }}</h3>
                    </div>
                </div>
            </div>
        @endif
        <div class="card">
            <div class="small-card p-1">
                <div class="inner">
                    <h3>{{ str_limit($server->user->username, 16) }}</h3>
                    <p>Server Owner</p>
                </div>
                <a href="{{ route('admin.users.view', $server->user->id) }}" class="small-card-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="card">
            <div class="small-card p-1">
                <div class="inner">
                    <h3>{{ str_limit($server->node->name, 16) }}</h3>
                    <p>Server Node</p>
                </div>
                <a href="{{ route('admin.nodes.view', $server->node->id) }}" class="small-card-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection
