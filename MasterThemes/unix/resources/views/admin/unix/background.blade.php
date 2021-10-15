{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}


@extends('layouts.admin')
@include('partials/admin.unix.nav', ['activeTab' => 'background'])

@section('title')
Unix Background
@endsection

@section('content-header')
<h1>Unix<small>Configure your background</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ route('admin.index') }}">Admin</a></li>
    <li><a href="{{ route('admin.unix') }}">Unix</a></li>
	<li class="active">Background </li>
</ol>
@endsection



@section('content')
@yield('unix::nav')
<link rel="stylesheet" href="/themes/unix/css/alerts.css" />

<div class="alert alert-info alert-white rounded" style="background: white !important; color: black !important; border-color: #4d90fd;">
    <div class="icon"><i class="fa fa-info-circle"></i></div>
    <strong>Info</strong> <br>Background with video will not show on small devices, they'll be changed to image background if that's set.
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Background</h3>
			</div>
			
			<form action="{{ route('admin.unix.setting') }}" method="POST">
				@csrf
				<div class="box-body">
				  <div class="row">

                    <div class="form-group col-md-4">
                        <label class="control-label">Login page background type</label>
                        <div>
                          <select class="form-control" name="loginbgtype" required>
                            <option value="@isset($setting_data['loginbgtype']){{$setting_data['loginbgtype']}} @endisset" selected="">Currently set to ->@isset($setting_data['loginbgtype']) @if($setting_data['loginbgtype'] == 1) Color @endif @endisset @isset($setting_data['loginbgtype']) @if($setting_data['loginbgtype'] == 2) Image @endif @endisset @isset($setting_data['loginbgtype']) @if($setting_data['loginbgtype'] == 3) Video @endif @endisset</option>
                            <option value="1">Color</option>
                            <option value="2">Image</option>
                            <option value="3">Video</option>
                        </select>
                          <p class="text-muted"><small>This is the type of background that the login page will have.</small></p>
                        </div>
                      </div>
                    
						<div class="form-group col-md-4">
						  <label class="control-label">Login Page background Image URL</label>
						  <div>
							<input type="text" class="form-control" name="login-bg-img" value="@isset($setting_data['login-bg-img']){{$setting_data['login-bg-img']}}@else https://wallpaperaccess.com/full/2002264.png @endisset" required/>
							<p class="text-muted"><small>This is the URL of the background Image on the login page, make sure it ends with .png, jpeg etc</small></p>
						  </div>
						</div>
                    
						<div class="form-group col-md-4">
                            <label class="control-label">Background Youtube Video UUID</label>
                            <div>
                              <input type="text" class="form-control" name="login-bg-youtube" value="@isset($setting_data['login-bg-youtube']){{$setting_data['login-bg-youtube']}}@else edYCtaNueQY @endisset" required/>
                              <p class="text-muted"><small>This is the UUID Youtube of the URL, so not the full URL for example edYCtaNueQY</small></p>
                            </div>
                          </div>

						  <div class="form-group col-md-4">
							<label class="control-label">Panel background type</label>
							<div>
							  <select class="form-control" name="mainbgtype" required>
								<option value="@isset($setting_data['mainbgtype']){{$setting_data['mainbgtype']}} @endisset" selected="">Currently set to ->@isset($setting_data['mainbgtype']) @if($setting_data['mainbgtype'] == 1) Color @endif @endisset @isset($setting_data['mainbgtype']) @if($setting_data['mainbgtype'] == 2) Image @endif @endisset</option>
								<option value="1">Color</option>
								<option value="2">Image</option>
							</select>
							  <p class="text-muted"><small>This is the type of background that panel will have.</small></p>
							</div>
						  </div>
						
							<div class="form-group col-md-4">
							  <label class="control-label">Main Page background Image URL</label>
							  <div>
								<input type="text" class="form-control" name="main-bg-img" value="@isset($setting_data['main-bg-img']){{$setting_data['main-bg-img']}}@else https://wallpaperaccess.com/full/2002264.png @endisset" required/>
								<p class="text-muted"><small>This is the URL of the background Image on the main page, make sure it ends with .png, jpeg etc</small></p>
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


</script>

@endsection
