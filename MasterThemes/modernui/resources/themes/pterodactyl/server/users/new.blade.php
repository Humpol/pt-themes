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
        <li class="breadcrumb-item active" aria-current="page">@lang('server.users.add')</li>
    </ol>
    <h5 class="display-4 mt-1 mb-2 font-weight-bold">@lang('server.users.new.header')</h5>
    <p class="text-black-50 mb-0">@lang('server.users.new.header_sub')</p>
@endsection

@section('content')
    <?php $oldInput = array_flip(is_array(old('permissions')) ? old('permissions') : []) ?>
    <form action="{{ route('server.subusers.new', $server->uuidShort) }}" method="POST">
        <div class="row">
            <div class="col-12">
                <div class="card card-box mb-4">
                    <div class="card-header">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">@lang('server.users.new.email')</label>
                                <div>
                                    {!! csrf_field() !!}
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" />
                                    <p class="text-muted small">@lang('server.users.new.email_help')</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="btn-group pull-left text-white">
                            <a id="selectAllCheckboxes" class="btn btn-sm btn-info">@lang('strings.select_all')</a>
                            <a id="unselectAllCheckboxes"
                               class="btn btn-sm btn-warning">@lang('strings.select_none')</a>
                        </div>
                        <input type="submit" name="submit" value="@lang('server.users.add')"
                               class="pull-right btn btn-sm btn-primary" />
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($permissions as $block => $perms)
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
                                            <input id="{{ $permission }}" name="permissions[]" type="checkbox" value="{{ $permission }}" class="custom-control-input" />
                                            <label class="custom-control-label strong" for="{{ $permission }}">@lang('server.users.new.' . str_replace('-', '_', $permission) . '.title')</label>
                                        </div>
                                    </div>
                                    <p class="text-muted small">@lang('server.users.new.' . str_replace('-', '_', $permission) . '.description')</p>
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
    </form>
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
