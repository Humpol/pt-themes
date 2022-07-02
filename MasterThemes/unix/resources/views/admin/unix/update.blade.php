{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}


@extends('layouts.admin')
@include('partials/admin.unix.nav', ['activeTab' => 'update'])

@section('title')
Unix
@endsection

@section('content-header')
<h1>Unix<small>New updates will be visible here.</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ route('admin.index') }}">Admin</a></li>
    <li><a href="{{ route('admin.unix') }}">Unix</a></li>
	<li class="active">Update </li>
</ol>
@endsection



@section('content')
@yield('unix::nav')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">currently running version {{ config('unix.version') }} of the {{ config('unix.name') }} template.</h3>
			</div>
            <iframe src="https://updates.mubeen.eu/{{ config('unix.name') }}/v={{ config('unix.version') }}" style="height:400px;width:100%;border:2px solid transparent;margin-top:20px;" style="display: none;"> </iframe>
		</div>
	</div>
</div>
@endsection