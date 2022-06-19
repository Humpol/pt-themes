{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}
@extends('layouts.master')

@section('title')
    @lang('base.account.header')
@endsection

@section('content-header')
    <ol class="breadcrumb text-uppercase font-size-xs p-0">
        <li class="breadcrumb-item"><a href="{{ route('index') }}">@lang('strings.home')</a></li>
        <li class="breadcrumb-item active" aria-current="page">@lang('strings.account')</li>
    </ol>
    <h5 class="display-4 mt-1 mb-2 font-weight-bold">@lang('base.account.header')</h5>
    <p class="text-black-50 mb-0">@lang('base.account.header_sub')</p>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 pb-4">
            <div class="row">
                <div class="col-12">
                    <div class="card card-box">
                        <div class="card-header">
                            <div class="card-header--title">
                                <h5 class="my-3">@lang('base.account.update_pass')</h5>
                            </div>
                        </div>
                        <form action="{{ route('account') }}" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="current_password"
                                           class="control-label">@lang('base.account.current_password')</label>
                                    <div>
                                        <input type="password" class="form-control" name="current_password" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="new_password"
                                           class="control-label">@lang('base.account.new_password')</label>
                                    <div>
                                        <input type="password" class="form-control" name="new_password" />
                                        <p class="text-muted small no-margin">@lang('auth.password_requirements')</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="new_password_again"
                                           class="control-label">@lang('base.account.new_password_again')</label>
                                    <div>
                                        <input type="password" class="form-control"
                                               name="new_password_confirmation" />
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                {!! csrf_field() !!}
                                <input type="hidden" name="do_action" value="password" />
                                <button type="submit"
                                        class="btn btn-primary btn-sm">@lang('base.account.update_pass')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 pb-4">
            <div class="row">
                <div class="col-12">
                    <div class="card card-box">
                        <form action="{{ route('account') }}" method="POST">
                            <div class="card-header">
                                <div class="card-header--title">
                                    <h5 class="my-3">@lang('base.account.update_identity')</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="first_name"
                                               class="control-label">@lang('base.account.first_name')</label>
                                        <div>
                                            <input type="text" class="form-control" name="name_first"
                                                   value="{{ Auth::user()->name_first }}" />
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="last_name"
                                               class="control-label">@lang('base.account.last_name')</label>
                                        <div>
                                            <input type="text" class="form-control" name="name_last"
                                                   value="{{ Auth::user()->name_last }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12 mb-0">
                                        <label for="password" class="control-label">@lang('strings.username')</label>
                                        <div>
                                            <input type="text" class="form-control" name="username"
                                                   value="{{ Auth::user()->username }}" />
                                            <p class="text-muted small no-margin">@lang('base.account.username_help', [ 'requirements' => '<code>a-z A-Z 0-9 _ - .</code>'])</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="language"
                                               class="control-label">@lang('base.account.language')</label>
                                        <div>
                                            <select name="language" id="language" class="form-control">
                                                @foreach($languages as $key => $value)
                                                    <option
                                                        value="{{ $key }}" {{ Auth::user()->language !== $key ?: 'selected' }}>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer with-border">
                                {!! csrf_field() !!}
                                <input type="hidden" name="do_action" value="identity" />
                                <button type="submit"
                                        class="btn btn-sm btn-primary">@lang('base.account.update_identity')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-12">
                    <div class="card card-box">
                        <div class="card-header">
                            <div class="card-header--title">
                                <h5 class="my-3">@lang('base.account.update_email')</h5>
                            </div>
                        </div>
                        <form action="{{ route('account') }}" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="new_email" class="control-label">@lang('base.account.new_email')</label>
                                    <div>
                                        <input type="email" class="form-control" name="new_email" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password"
                                           class="control-label">@lang('base.account.current_password')</label>
                                    <div>
                                        <input type="password" class="form-control" name="current_password" />
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                {!! csrf_field() !!}
                                <input type="hidden" name="do_action" value="email" />
                                <input type="submit" class="btn btn-primary btn-sm"
                                       value="@lang('base.account.update_email')" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
