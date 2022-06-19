{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}
@extends('layouts.master')

@section('title')
    @lang('server.users.new.header')
@endsection

@section('content-header')
    <ol class="breadcrumb text-uppercase font-size-xs p-0">
        <li class="breadcrumb-item"><a href="{{ route('index') }}">@lang('strings.home')</a></li>
        <li class="breadcrumb-item"><a href="{{ route('server.index', $server->uuidShort) }}">{{ $server->name }}</a>
        </li>
        <li class="breadcrumb-item"><a
                href="{{ route('server.subusers', $server->uuidShort) }}">@lang('navigation.server.subusers')</a></li>
        <li class="breadcrumb-item active" aria-current="page">@lang('server.users.update')</li>
    </ol>
    <h5 class="display-4 mt-1 mb-2 font-weight-bold">@lang('server.users.edit.header')</h5>
    <p class="text-black-50 mb-0">@lang('server.users.edit.header_sub')</p>
@endsection

@section('content')
    @can('edit-subuser', $server)
        <form
            action="{{ route('server.subusers.view', [ 'uuid' => $server->uuidShort, 'subuser' => $subuser->hashid ]) }}"
            method="POST">
            @endcan
            <div class="row">
                <div class="col-12">
                    <div class="card card-box mb-4">
                        <div class="card-header">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="control-label">@lang('server.users.new.email')</label>
                                    <div>
                                        {!! csrf_field() !!}
                                        <input type="email" class="form-control" disabled
                                               value="{{ $subuser->user->email }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @can('edit-subuser', $server)
                            <div class="card-body">
                                <div class="btn-group pull-left text-white">
                                    <a id="selectAllCheckboxes"
                                       class="btn btn-sm btn-info">@lang('strings.select_all')</a>
                                    <a id="unselectAllCheckboxes"
                                       class="btn btn-sm btn-warning">@lang('strings.select_none')</a>
                                </div>
                                {!! method_field('PATCH') !!}
                                <input type="submit" name="submit" value="@lang('server.users.update')"
                                       class="pull-right btn btn-sm btn-primary" />
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($permlist as $block => $perms)
                    <div class="col-sm-6">
                        <div class="card card-box mb-4">
                            <div class="card-header">
                                <div class="card-header--title">
                                    <h5 class="my-3">@lang('server.users.new.' . $block . '_header')</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                @foreach($perms as $permission => $daemon)
                                    <div class="form-group">
                                        <div class="checkbox checkbox-primary no-margin-bottom">
                                            <div class="custom-control custom-checkbox">
                                                <input id="{{ $permission }}" name="permissions[]" type="checkbox" class="custom-control-input"
                                                       @if(isset($permissions[$permission]))checked="checked"
                                                       @endif @cannot('edit-subuser', $server)disabled="disabled"
                                                       @endcannot value="{{ $permission }}" />
                                                <label class="custom-control-label strong" for="{{ $permission }}">@lang('server.users.new.' . str_replace('-', '_', $permission) . '.title')</label>
                                            </div>
                                        </div>
                                        <p class="text-muted small">@lang('server.users.new.' . str_replace('-', '_', $permission) . '.title')</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @if ($loop->iteration % 2 === 0)
                        <div class="clearfix visible-lg-block visible-md-block visible-sm-block"></div>
                    @endif
                @endforeach
            </div>
            @can('edit-subuser', $server)
        </form>
    @endcan
@endsection

@section('footer-scripts')
    @parent
    {!! Theme::js('js/frontend/server.socket.js') !!}
    <script type="text/javascript">
        $(document).ready(function () {
            $('#selectAllCheckboxes').on('click', function () {
                $('input[type=checkbox]').prop('checked', true);
            });
            $('#unselectAllCheckboxes').on('click', function () {
                $('input[type=checkbox]').prop('checked', false);
            });
        })
    </script>
@endsection
