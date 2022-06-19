{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}
@extends('layouts.auth')

@section('title')
    Login
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
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
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        {!! $message !!}
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>

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
                        <form id="loginForm" action="{{ route('auth.login') }}" method="POST">
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="text" name="user" class="form-control" value="{{ old('user') }}" required
                                       placeholder="@lang('strings.user_identifier')" autofocus>
                            </div>
                            <div class="form-group mb-4">
                                <div class="d-flex justify-content-between">
                                    <label>Password</label>
                                    <a href="{{ route('auth.password') }}">Forgot password?</a>
                                </div>
                                <input type="password" name="password" class="form-control" required
                                       placeholder="@lang('strings.password')">
                            </div>

                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-lg btn-second btn-block g-recaptcha"
                                    @if(config('recaptcha.enabled')) data-sitekey="{{ config('recaptcha.website_key') }}"
                                    data-callback='onSubmit' @endif>@lang('auth.sign_in')</button>
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
