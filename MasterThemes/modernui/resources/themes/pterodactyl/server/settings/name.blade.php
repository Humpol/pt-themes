{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}
@extends('layouts.master')

@section('title')
    @lang('server.config.name.header')
@endsection

@section('content-header')
    <ol class="breadcrumb text-uppercase font-size-xs p-0">
        <li class="breadcrumb-item"><a href="{{ route('index') }}">@lang('strings.home')</a></li>
        <li class="breadcrumb-item"><a href="{{ route('server.index', $server->uuidShort) }}">{{ $server->name }}</a>
        </li>
        <li class="breadcrumb-item"><a href="javascript:;">@lang('navigation.server.configuration')</a></li>
        <li class="breadcrumb-item active" aria-current="page">@lang('navigation.server.server_name')</li>
    </ol>
    <h5 class="display-4 mt-1 mb-2 font-weight-bold">@lang('server.config.name.header')</h5>
    <p class="text-black-50 mb-0">@lang('server.config.name.header_sub')</p>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('server.settings.name', $server->uuidShort) }}" method="POST">
                <div class="card card-box">
                    <div class="card-body">
                        <div class="form-group no-margin-bottom">
                            <label class="control-label" for="pServerName">@lang('server.config.name.header')</label>
                            <div>
                                <input type="text" name="name" id="pServerName" class="form-control" value="{{ $server->name }}" />
                                <p class="small text-muted no-margin-bottom">@lang('server.config.name.details')</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-sm btn-primary pull-right" value="@lang('strings.submit')" />
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('footer-scripts')
    @parent
    {!! Theme::js('js/frontend/server.socket.js') !!}
@endsection
