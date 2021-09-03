{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}
@extends('layouts.auth')

@section('title')
    2FA Checkpoint
@endsection

@section('scripts')
    @parent
    <style>
        input::-webkit-outer-spin-button, input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
@endsection

@section('content')
    <div class="card bg-authentication rounded-0 mb-0">
        <div class="row m-0">
            <div class="col-lg-12 p-0">
                <div class="card rounded-0 mb-0 mt-1 px-2">
                    <div class="card-header pb-1">
                        <div class="card-title">
                            <h4 class="mb-0">2FA Checkpoint</h4>
                        </div>
                    </div>
                    <p class="px-2">You are always one step ahead with {{ config('app.name', 'Pterodactyl') }}.</p>
                    <div class="card-content">
                        <div class="card-body pt-1">
                            <form id="resetForm" action="{{ route('auth.totp') }}" method="POST">
                                <fieldset class="form-label-group form-group position-relative has-icon-left">
                                    <input type="number" class="form-control" name="2fa_token" required placeholder="@lang('strings.2fa_token')">
                                    <div class="form-control-position"><i class="feather icon-totp"></i></div>
                                </fieldset>

                                {!! csrf_field() !!}
                                <input type="hidden" name="verify_token" value="{{ $verify_key }}" />
                                <button type="submit" class="btn btn-primary btn-block btn-flat pterodactyl-login-button--main">@lang('strings.submit')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection