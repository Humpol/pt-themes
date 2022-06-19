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
    <div class="row">
        <div class="col-lg-6 pl-0 d-none d-lg-flex align-items-center">
            <img src="/assets/pterodactyl.svg"
                 class="w-75 mx-auto d-block img-fluid" alt="">
        </div>
        <div class="col-lg-6 pr-0 d-flex align-items-center">
            <div class="pl-0 pl-lg-5">
                <div class="text-black mt-3">
                    <h1 class="display-3 text-lg-left text-center mb-3 font-weight-bold">
                        {{ config('app.name', 'Pterodactyl') }}
                    </h1>
                    <div class="pb-3">
                        <form id="totpForm" action="{{ route('auth.totp') }}" method="POST">
                            <div class="form-group">
                                <label>2FA Token</label>
                                <input type="number" name="2fa_token" class="form-control" required
                                       placeholder="@lang('strings.2fa_token')" autofocus>
                            </div>

                            {!! csrf_field() !!}
                            <input type="hidden" name="verify_token" value="{{ $verify_key }}" />
                            <button type="submit"
                                    class="btn btn-lg btn-second btn-block">@lang('strings.submit')</button>
                        </form>
                    </div>
                    <hr>
                    <p class="font-size-lg text-lg-left text-center mb-0 text-black-50">
                        Copyright &copy; 2015 - {{ date('Y') }} <a href="https://pterodactyl.io/" target="_blank">Pterodactyl
                            Software</a>. and Theme by. <a href="https://srkhost.eu/">SRKHOST.eu</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
