{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}
@extends('layouts.admin')

@section('title')
    {{ $node->name }}: Servers
@endsection

@section('content-header')
    <h1>{{ $node->name }}<small>All servers currently assigned to this node.</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}">Admin</a></li>
        <li><a href="{{ route('admin.nodes') }}">Nodes</a></li>
        <li><a href="{{ route('admin.nodes.view', $node->id) }}">{{ $node->name }}</a></li>
        <li class="active">Servers</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mb-2">
        <a class="btn btn-primary btn-md" href="{{ route('admin.nodes.view', $node->id) }}">About</a>
        <a class="btn btn-primary btn-md" href="{{ route('admin.nodes.view.settings', $node->id) }}">Settings</a>
        <a class="btn btn-primary btn-md" href="{{ route('admin.nodes.view.configuration', $node->id) }}">Configuration</a>
        <a class="btn btn-primary btn-md" href="{{ route('admin.nodes.view.allocation', $node->id) }}">Allocation</a>
        <a class="btn btn-info btn-md" href="{{ route('admin.nodes.view.servers', $node->id) }}">Servers</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary">
            <div class="card-header with-border">
                <h3 class="card-title">Process Manager</h3>
            </div>
            <div class="card-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Server Name</th>
                        <th>Owner</th>
                        <th>Service</th>
                        <th class="text-center">Memory</th>
                        <th class="text-center">Disk</th>
                        <th class="text-center">CPU</th>
                        <th class="text-center">Status</th>
                    </tr>
                    @foreach($servers as $server)
                        <tr data-server="{{ $server->uuid }}">
                            <td><code>{{ $server->uuidShort }}</code></td>
                            <td><a href="{{ route('admin.servers.view', $server->id) }}">{{ $server->name }}</a></td>
                            <td><a href="{{ route('admin.users.view', $server->owner_id) }}">{{ $server->user->username }}</a></td>
                            <td>{{ $server->nest->name }} ({{ $server->egg->name }})</td>
                            <td class="text-center"><span data-action="memory">--</span> / {{ $server->memory === 0 ? '∞' : $server->memory }} MB</td>
                            <td class="text-center"><span data-action="disk">--</span> / {{ $server->disk === 0 ? '∞' : $server->disk }} MB </td>
							<td class="text-center"><span data-action="cpu" data-cpumax="{{ $server->cpu }}">--</span> %</td>
                            <td class="text-center" data-action="status">--</td>
                        </tr>
                    @endforeach
                </table>
                @if($servers->hasPages())
                    <div class="card-footer with-border">
                        <div class="col-md-12 text-center">{!! $servers->render() !!}</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer-scripts')
    @parent
    {!! Theme::js('js/admin/node/view-servers.js') !!}
@endsection