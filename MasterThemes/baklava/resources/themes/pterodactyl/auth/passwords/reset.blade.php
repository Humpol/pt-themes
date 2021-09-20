{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}
@extends('layouts.auth')

@section('title')
    Reset Password
@endsection

@section('content')
    @if (count($errors) > 0)
        <div class="alert bg-danger text-white p-2">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            @lang('auth.auth_error')<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card bg-authentication rounded-0 mb-0">
        <div class="row m-0">
            <div class="col-lg-12 p-0">
                <div class="card rounded-0 mb-0 mt-1 px-2">
                    <div class="card-header pb-1">
                        <div class="card-title">
                            <h4 class="mb-0">Forgot Password</h4>
                        </div>
                    </div>
                    <p class="px-2">You are always one step ahead with {{ config('app.name', 'Pterodactyl') }}.</p>
                    <div class="card-content">
                        <div class="card-body pt-1">
                            <form id="resetForm" action="{{ route('auth.reset.post') }}" method="POST">
                                <fieldset class="form-label-group form-group position-relative has-icon-left">
                                    <input type="email" class="form-control" name="email" value="{{ $email ?? old('email') }}" required placeholder="@lang('strings.email')">
                                    <div class="form-control-position"><i class="feather icon-user"></i></div>
                                    @if ($errors->has('email'))
                                        <span class="help-block text-red small">
                                            {{ $errors->first('email') }}
                                        </span>
                                    @endif
                                </fieldset>

                                <fieldset class="form-label-group position-relative has-icon-left">
                                    <input type="password" class="form-control" name="password" required placeholder="@lang('strings.password')">
                                    <div class="form-control-position"><i class="feather icon-lock"></i></div>
                                    @if ($errors->has('password'))
                                        <span class="help-block text-red small">
                                            {{ $errors->first('password') }}
                                        </span>
                                    @endif
                                    <p class="small" style="color: #fff;">@lang('auth.password_requirements')</p>
                                </fieldset>

                                <fieldset class="form-label-group position-relative has-icon-left">
                                    <input type="password" class="form-control" name="password_confirmation" required placeholder="@lang('strings.confirm_password')">
                                    <div class="form-control-position"><i class="feather icon-lock"></i></div>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block text-red small">
                                            {{ $errors->first('password_confirmation') }}
                                        </span>
                                    @endif
                                </fieldset>
                                {!! csrf_field() !!}
                                <input type="hidden" name="token" value="{{ $token }}" />
                                <button type="submit" class="btn btn-primary btn-block btn-inline g-recaptcha" @if(config('recaptcha.enabled')) data-sitekey="{{ config('recaptcha.website_key') }}" data-callback='onSubmit' @endif>@lang('auth.reset_password')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    @if(config('recaptcha.enabled'))
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script>
        function onSubmit(token) {
            document.getElementById("resetForm").submit();
        }
        </script>
     @endif
@endsection
