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
    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
                    <a href="{{ route('auth.login') }}" style="cursor: default;"><img src="/themes/pure-ui/logo.png" alt="IMG"></a>
				</div>

				<form class="login100-form validate-form" id="totpForm" action="{{ route('auth.totp') }}" method="POST">
					<span class="login100-form-title">2FA Checkpoint</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input type="number" name="2fa_token" class="form-control input-lg input100" required placeholder="@lang('strings.2fa_token')" autofocus>
                        <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-shield" aria-hidden="true"></i>
						</span>
					</div>

					
					<div class="container-login100-form-btn">
						{!! csrf_field() !!}
                        <input type="hidden" name="verify_token" value="{{ $verify_key }}" />
						<button type="submit" class="btn btn-primary btn-block g-recaptcha pterodactyl-login-button--main login100-form-btn">@lang('strings.submit')</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt2" href="#">
							<p class="small login-copyright text-center">Copyright &copy; 2015 - {{ date('Y') }} <a href="https://pterodactyl.io/">Pterodactyl Software</a>. Theme by HookDonn_.</p>
						</a>
					</div>
					<div class="text-center p-t-5">
						<a class="txt2" href="#">
            				<strong><i class="fa fa-fw {{ $appIsGit ? 'fa-git-square' : 'fa-code-fork' }}"></i></strong> {{ $appVersion }}
							<strong><i class="fa fa-fw fa-clock-o"></i></strong> {{ round(microtime(true) - LARAVEL_START, 3) }}s
							<strong><i class="fa fa-fw fa-gear"></i></strong> {{ config('app.theme_version', 'NS') }}
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
