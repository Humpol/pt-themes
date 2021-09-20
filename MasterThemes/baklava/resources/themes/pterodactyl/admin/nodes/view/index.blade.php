{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}
@extends('layouts.admin')

@section('title')
    {{ $node->name }}
@endsection

@section('content-header')
    <h1>{{ $node->name }}<small>A quick overview of your node.</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}">Admin</a></li>
        <li><a href="{{ route('admin.nodes') }}">Nodes</a></li>
        <li class="active">{{ $node->name }}</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mb-2">
        <a class="btn btn-info btn-md" href="{{ route('admin.nodes.view', $node->id) }}">About</a>
        <a class="btn btn-primary btn-md" href="{{ route('admin.nodes.view.settings', $node->id) }}">Settings</a>
        <a class="btn btn-primary btn-md" href="{{ route('admin.nodes.view.configuration', $node->id) }}">Configuration</a>
        <a class="btn btn-primary btn-md" href="{{ route('admin.nodes.view.allocation', $node->id) }}">Allocation</a>
        <a class="btn btn-primary btn-md" href="{{ route('admin.nodes.view.servers', $node->id) }}">Servers</a>
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
                                <td>Daemon Version</td>
                                <td><code data-attr="info-version"><i class="fa fa-refresh fa-fw fa-spin"></i></code> (Latest: <code>{{ $version->getDaemon() }}</code>)</td>
                            </tr>
                            <tr>
                                <td>System Information</td>
                                <td data-attr="info-system"><i class="fa fa-refresh fa-fw fa-spin"></i></td>
                            </tr>
                            <tr>
                                <td>Total CPU Cores</td>
                                <td data-attr="info-cpus"><i class="fa fa-refresh fa-fw fa-spin"></i></td>
                            </tr>
                            @if ($node->description)
                                <tr>
                                    <td>Description</td>
                                    <td>{{ $node->description }}</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-danger">
                    <div class="card-header with-border">
                        <h3 class="card-title">Delete Node</h3>
                    </div>
                    <div class="card-body">
                        <p class="no-margin">Deleting a node is a irreversible action and will immediately remove this node from the panel. There must be no servers associated with this node in order to continue.</p>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('admin.nodes.view.delete', $node->id) }}" method="POST">
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            <button type="submit" class="btn btn-danger btn-md pull-right" {{ ($node->servers_count < 1) ?: 'disabled' }}>Yes, Delete This Node</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card card-primary">
            <div class="card-header with-border">
                <h3 class="card-title">At-a-Glance</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @if($node->maintenance_mode)
                        <div class="col-sm-12 mb-1">
                            <div class="bg-warning p-1 text-white" style="border-radius: 5px;">
                                <span class="info-card-text">This node is under</span>
                                <span class="info-card-number pull-right">Maintenance</span>
                            </div>
                        </div>
                    @endif
                    <div class="col-sm-12 mb-1">
                        <div class="bg-{{ $stats['disk']['css'] }} p-1 text-white" style="border-radius: 5px;">
                            <span class="info-card-text">Disk Space Allocated</span>
                            <span class="info-card-number pull-right">{{ $stats['disk']['value'] }} / {{ $stats['disk']['max'] }} Mb</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: {{ $stats['disk']['percent'] }}%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-1">
                        <div class="bg-{{ $stats['memory']['css'] }} p-1 text-white" style="border-radius: 5px;">
                            <span class="info-card-text">Memory Allocated</span>
                            <span class="info-card-number pull-right">{{ $stats['memory']['value'] }} / {{ $stats['memory']['max'] }} Mb</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: {{ $stats['memory']['percent'] }}%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-1">
                        <div class="bg-info p-1 text-white" style="border-radius: 5px;">
                            <span class="info-card-text">Total Servers</span>
                            <span class="info-card-number pull-right">{{ $node->servers_count }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer-scripts')
    @parent
    <script>
    (function getInformation() {
        $.ajax({
            method: 'GET',
            url: '{{ $node->scheme }}://{{ $node->fqdn }}:{{ $node->daemonListen }}/v1',
            timeout: 5000,
            headers: {
                'X-Access-Token': '{{ $node->daemonSecret }}'
            },
        }).done(function (data) {
            $('[data-attr="info-version"]').html(data.version);
            $('[data-attr="info-system"]').html(data.system.type + '(' + data.system.arch + ') <code>' + data.system.release + '</code>');
            $('[data-attr="info-cpus"]').html(data.system.cpus);
        }).fail(function (jqXHR) {

        }).always(function() {
            setTimeout(getInformation, 10000);
        });
    })();
    </script>
@endsection