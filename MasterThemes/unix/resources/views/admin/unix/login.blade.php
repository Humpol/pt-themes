{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}


@extends('layouts.admin')
@include('partials/admin.unix.nav', ['activeTab' => 'login'])

@section('title')
Unix Login Page
@endsection

@section('content-header')
<h1>Unix<small>Modify the login page</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ route('admin.index') }}">Admin</a></li>
    <li><a href="{{ route('admin.unix') }}">Unix</a></li>
	<li class="active">Login Page </li>
</ol>
@endsection



@section('content')
@yield('unix::nav')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Login Page</h3>
			</div>
			
			<form action="{{ route('admin.unix.setting') }}" method="POST">
				@csrf
				<div class="box-body">
				  <div class="row">
					<div class="form-group col-md-4">
						<label class="control-label">Main Button Name</label>
						<div>
						  <input type="text" class="form-control" name="mainbtnname" value="@isset($setting_data['mainbtnname']){{$setting_data['mainbtnname']}}@else Our Website @endisset" required/>
						  <p class="text-muted"><small>This is the name of the main button.</small></p>
						</div>
					  </div>
					  <div class="form-group col-md-4">
						  <label class="control-label">Main Button URL</label>
						  <div>
							<input type="text" class="form-control" name="mainbtnurl" value="@isset($setting_data['mainbtnurl']){{$setting_data['mainbtnurl']}}@else / @endisset" required/>
							<p class="text-muted"><small>This is the URL of the main button.</small></p>
						  </div>
						</div>


							</div>
						</div>
						<div class="box-footer">
						  {!! csrf_field() !!}
						  <button type="submit" class="btn btn-sm btn-primary pull-right">Save</button>
						</div>
					  </form>
		</div>
	</div>
</div>

<script>

function closeImg() {
  setTimeout(
    function() {
      document.getElementById('logo').style.display='none';
    }, 1);
}

</script>

@endsection
