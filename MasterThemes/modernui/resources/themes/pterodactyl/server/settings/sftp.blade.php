{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}
@extends('layouts.master')

@section('title')
    @lang('server.config.sftp.header')
@endsection

@section('content-header')
    <ol class="breadcrumb text-uppercase font-size-xs p-0">
        <li class="breadcrumb-item"><a href="{{ route('index') }}">@lang('strings.home')</a></li>
        <li class="breadcrumb-item"><a href="{{ route('server.index', $server->uuidShort) }}">{{ $server->name }}</a>
        </li>
        <li class="breadcrumb-item"><a href="javascript:;">@lang('navigation.server.configuration')</a></li>
        <li class="breadcrumb-item active" aria-current="page">@lang('navigation.server.sftp_settings')</li>
    </ol>
    <h5 class="display-4 mt-1 mb-2 font-weight-bold">@lang('server.config.sftp.header')</h5>
    <p class="text-black-50 mb-0">@lang('server.config.sftp.header_sub')</p>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-box">
                <div class="card-header">
                    <div class="card-header--title">
                        <h5 class="my-3">@lang('server.config.sftp.details')</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="control-label">@lang('server.config.sftp.conn_addr')</label>
                        <div>
                            <input type="text" class="form-control" readonly
                                   value="sftp://{{ $node->fqdn }}:{{ $node->daemonSFTP }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label">@lang('strings.username')</label>
                        <div>
                            <input type="text" class="form-control" readonly
                                   value="{{ auth()->user()->username }}.{{ $server->uuidShort }}" />
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <p class="small text-muted no-margin-bottom">@lang('server.config.sftp.warning')</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-scripts')
    @parent
    {!! Theme::js('js/frontend/server.socket.js') !!}
@endsection
