{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}


@extends('layouts.admin')
@include('partials/admin.unix.nav', ['activeTab' => 'support'])

@section('title')
Unix Support
@endsection

@section('content-header')
<h1>Unix<small>Need help? Join our Discord</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ route('admin.index') }}">Admin</a></li>
    <li><a href="{{ route('admin.unix') }}">Unix</a></li>
	<li class="active">Support </li>
</ol>
@endsection


@section('content')
@yield('unix::nav')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Support - Debug Information</h3>
			</div>
		<div style="padding: 15px;">
            <h4>Active Theme: <strong>{{ config('unix.name', 'Unix') }}</strong></h4>
			<h4>Version: <strong>{{ config('unix.version') }}</strong></h4>
			<h4>Authors: <strong>{{ config('unix.author', 'LocalHost') }}</strong></h4>
			<h4>For custom panel designs please contact LocalHost#8547 on Discord</h4>
	    </div>
		<button onclick="window.location.href='https://discord.pterodactyl.shop'" class="btn btn-primary" style="width:100%;"><i class="fa fa-fw fa-support"></i> Support Discord Server</button>
		</div>
	</div>
</div>
@endsection