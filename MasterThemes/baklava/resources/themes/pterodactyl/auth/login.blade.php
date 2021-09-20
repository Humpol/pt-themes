{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}

{{-- Pterodactyl Bakalava Theme --}}
{{-- All rights reserved. smt287 - Samet Girginer --}}
{{-- Discord: smt287#5646 / Support: https://discord.gg/JdWBeRr --}}

@extends('layouts.auth')

@section('title')
    Login
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
    @foreach (Alert::getMessages() as $type => $messages)
        @foreach ($messages as $message)
            <div class="callout callout-{{ $type }} alert-dismissable" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {!! $message !!}
            </div>
        @endforeach
    @endforeach
    <div class="card bg-authentication rounded-0 mb-0">
        <div class="row m-0">
            <div class="col-lg-12 p-0">
                <div class="card rounded-0 mb-0 mt-1 px-2">
                    <div class="card-header pb-1">
                        <div class="card-title">
                            <h4 class="mb-0">Login</h4>
                        </div>
                    </div>
                    <p class="px-2">You are always one step ahead with {{ config('app.name', 'Pterodactyl') }}.</p>
                    <div class="card-content">
                        <div class="card-body pt-1 @if(!config('baklava.theme.oauth')) mb-2 @endif">
                            <form id="loginForm" action="{{ route('auth.login') }}" method="POST">
                                <fieldset class="form-label-group form-group position-relative has-icon-left">
                                    <input type="text" class="form-control" id="user" name="user" value="{{ old('user') }}" placeholder="@lang('strings.user_identifier')" required>
                                    <div class="form-control-position"><i class="feather icon-user"></i></div>
                                    <label for="user">Username</label>
                                </fieldset>

                                <fieldset class="form-label-group position-relative has-icon-left">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="@lang('strings.password')" required>
                                    <div class="form-control-position"><i class="feather icon-lock"></i></div>
                                    <label for="password">Password</label>
                                </fieldset>
                                <div class="form-group d-flex">
                                    <div class="text-right"><a href="{{ route('auth.password') }}" class="card-link">Forgot Password?</a></div>
                                </div>
                                {!! csrf_field() !!}
                                <button type="submit" class="btn btn-primary btn-block btn-inline g-recaptcha" @if(config('recaptcha.enabled')) data-sitekey="{{ config('recaptcha.website_key') }}" data-callback='onSubmit' @endif>@lang('auth.sign_in')</button>
                            </form>
                        </div>
                    </div>
                    @if(config('baklava.theme.oauth'))
                        <div class="login-footer w-100">
                            <div class="divider">
                                <div class="divider-text">OR</div>
                            </div>
                            <div class="footer-btn text-center">
                                <a href="@php echo config('baklava.login.oauth.discord') @endphp" class="btn btn-discord"><i class="fab fa-discord"></i></a>
                                <a href="@php echo config('baklava.login.oauth.facebook') @endphp" class="btn btn-facebook"><i class="fab fa-facebook-square"></i></a>
                                <a href="@php echo config('baklava.login.oauth.google') @endphp" class="btn btn-google"><i class="fab fa-google"></i></a>
                                <a href="@php echo config('baklava.login.oauth.github') @endphp" class="btn btn-github"><i class="fab fa-github"></i></a>
                            </div>
                        </div>
                    @endif
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
            document.getElementById("loginForm").submit();
        }
        </script>
     @endif
@endsection
