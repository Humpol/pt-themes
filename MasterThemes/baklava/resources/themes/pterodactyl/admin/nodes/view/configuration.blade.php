{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}
@extends('layouts.admin')

@section('title')
    {{ $node->name }}: Configuration
@endsection

@section('content-header')
    <h1>{{ $node->name }}<small>Your daemon configuration file.</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}">Admin</a></li>
        <li><a href="{{ route('admin.nodes') }}">Nodes</a></li>
        <li><a href="{{ route('admin.nodes.view', $node->id) }}">{{ $node->name }}</a></li>
        <li class="active">Configuration</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mb-2">
        <a class="btn btn-primary btn-md" href="{{ route('admin.nodes.view', $node->id) }}">About</a>
        <a class="btn btn-primary btn-md" href="{{ route('admin.nodes.view.settings', $node->id) }}">Settings</a>
        <a class="btn btn-info btn-md" href="{{ route('admin.nodes.view.configuration', $node->id) }}">Configuration</a>
        <a class="btn btn-primary btn-md" href="{{ route('admin.nodes.view.allocation', $node->id) }}">Allocation</a>
        <a class="btn btn-primary btn-md" href="{{ route('admin.nodes.view.servers', $node->id) }}">Servers</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-8">
        <div class="card card-primary">
            <div class="card-header with-border">
                <h3 class="card-title">Configuration File</h3>
            </div>
            <div class="card-body">
                <pre class="p-1">{{ $node->getConfigurationAsJson(true) }}</pre>
            </div>
            <div class="card-footer">
                <p class="no-margin">This file should be placed in your daemon's <code>config</code> directory in a file called <code>core.json</code>.</p>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card card-success">
            <div class="card-header with-border">
                <h3 class="card-title">Auto-Deploy</h3>
            </div>
            <div class="card-body">
                <p class="text-muted small">To simplify the configuration of nodes it is possible to fetch the config from the panel. A token is required for this process. The button below will generate a token and provide you with the commands necessary for automatic configuration of the node. <em>Tokens are only valid for 5 minutes.</em></p>
            </div>
            <div class="card-footer">
                <button type="button" id="configTokenBtn" class="btn btn-md btn-secondary" style="width:100%;">Generate Token</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer-scripts')
    @parent
    <script>
    $('#configTokenBtn').on('click', function (event) {
        $.getJSON('{{ route('admin.nodes.view.configuration.token', $node->id) }}').done(function (data) {
            swal({
                type: 'success',
                title: 'Token created.',
                text: 'Your token will expire <strong>in 5 minutes.</strong><br /><br />' +
                      '<p>To auto-configure your node run the following command:<br /><small><pre>npm run configure -- --panel-url {{ config('app.url') }} --token ' + data.token + '</pre></small></p>',
                html: true
            })
        }).fail(function () {
            swal({
                title: 'Error',
                text: 'Something went wrong creating your token.',
                type: 'error'
            });
        });
    });
    </script>
@endsection
