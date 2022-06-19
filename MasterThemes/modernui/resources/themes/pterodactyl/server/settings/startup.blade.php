{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}
@extends('layouts.master')

@section('title')
    @lang('server.config.startup.header')
@endsection

@section('content-header')
    <ol class="breadcrumb text-uppercase font-size-xs p-0">
        <li class="breadcrumb-item"><a href="{{ route('index') }}">@lang('strings.home')</a></li>
        <li class="breadcrumb-item"><a href="{{ route('server.index', $server->uuidShort) }}">{{ $server->name }}</a>
        </li>
        <li class="breadcrumb-item"><a href="javascript:;">@lang('navigation.server.configuration')</a></li>
        <li class="breadcrumb-item active" aria-current="page">@lang('navigation.server.startup_parameters')</li>
    </ol>
    <h5 class="display-4 mt-1 mb-2 font-weight-bold">@lang('server.config.startup.header')</h5>
    <p class="text-black-50 mb-0">@lang('server.config.startup.header_sub')</p>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-box mb-4">
                <div class="card-header">
                    <div class="card-header--title">
                        <h5 class="my-3">@lang('server.config.startup.command')</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group no-margin-bottom">
                        <input type="text" class="form-control" readonly value="{{ $startup }}" />
                    </div>
                </div>
            </div>
        </div>
        @can('edit-startup', $server)
            <form action="{{ route('server.settings.startup', $server->uuidShort) }}" method="POST">
                <div class="col-12">
                    <div class="row">
                        @foreach($variables as $v)
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="card card-box mb-4">
                                    <div class="card-header">
                                        <div class="card-header--title">
                                            <h5 class="my-3">{{ $v->name }}</h5>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <input
                                            @if($v->user_editable)
                                            name="environment[{{ $v->env_variable }}]"
                                            @else
                                            readonly
                                            @endif
                                            class="form-control" type="text"
                                            value="{{ old('environment.' . $v->env_variable, $server_values[$v->env_variable]) }}" />
                                        <p class="small text-muted">{{ $v->description }}</p>
                                        <p class="no-margin">
                                            @if($v->required && $v->user_editable )
                                                <span class="label label-danger">@lang('strings.required')</span>
                                            @elseif(! $v->required && $v->user_editable)
                                                <span class="label label-default">@lang('strings.optional')</span>
                                            @endif
                                            @if(! $v->user_editable)
                                                <span class="label label-warning">@lang('strings.read_only')</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <p class="no-margin text-muted small">
                                            <strong>@lang('server.config.startup.startup_regex'):</strong>
                                            <code>{{ $v->rules }}</code></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-12">
                    <div class="card card-box">
                        <div class="card-footer">
                            {!! csrf_field() !!}
                            {!! method_field('PATCH') !!}
                            <input type="submit" class="btn btn-primary btn-sm pull-right"
                                   value="@lang('server.config.startup.update')" />
                        </div>
                    </div>
                </div>
            </form>
        @endcan
    </div>
@endsection

@section('footer-scripts')
    @parent
    {!! Theme::js('js/frontend/server.socket.js') !!}
@endsection
