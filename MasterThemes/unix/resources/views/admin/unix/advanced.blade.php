{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}


@extends('layouts.admin')
@include('partials/admin.unix.nav', ['activeTab' => 'advanced'])

@section('title')
Unix Advanced
@endsection

@section('content-header')
<h1>Unix<small>Configure advanced settings</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ route('admin.index') }}">Admin</a></li>
    <li><a href="{{ route('admin.unix') }}">Unix</a></li>
	<li class="active">Advanced </li>
</ol>
@endsection



@section('content')
@yield('unix::nav')
<link rel="stylesheet" href="/themes/unix/css/alerts.css" />

<div class="alert alert-info alert-white rounded" style="background: white !important; color: black !important; border-color: #4d90fd;">
    <div class="icon"><i class="fa fa-info-circle"></i></div>
    <strong>Info</strong> <br>Please don't make changes unless you know what you're doing
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Advanced Unix Settings</h3>
			</div>
			<form action="{{ route('admin.unix.setting') }}" method="POST">
				@csrf
				<div class="box-body">
				  <div class="row">
                      <div>
					<div class="form-group col-md-4">
						<label class="control-label">Sidebar Active Color #1</label>
						<div>
						  <input @isset($setting_data['colorsel'])@if($setting_data['colorsel'] == 1) type="color" @else type="text"  @endif
						  @endisset class="form-control" name="sbactivecolor1" value="@isset($setting_data['sbactivecolor1']){{$setting_data['sbactivecolor1']}}@else #ff7551  @endisset" required/>
						  <p class="text-muted"><small>This is the color of the first sidebar button.</small></p>
						</div>
					  </div>
                      <div class="form-group col-md-4">
						<label class="control-label">Sidebar Active Color #2</label>
						<div>
						  <input @isset($setting_data['colorsel'])@if($setting_data['colorsel'] == 1) type="color" @else type="text"  @endif
						  @endisset class="form-control" name="sbactivecolor2" value="@isset($setting_data['sbactivecolor2']){{$setting_data['sbactivecolor2']}}@else #32a7e2  @endisset" required/>
						  <p class="text-muted"><small>This is the color of the second sidebar button.</small></p>
						</div>
					  </div>
                      <div class="form-group col-md-4">
						<label class="control-label">Sidebar Active Color #3</label>
						<div>
						  <input @isset($setting_data['colorsel'])@if($setting_data['colorsel'] == 1) type="color" @else type="text"  @endif
						  @endisset class="form-control" name="sbactivecolor3" value="@isset($setting_data['sbactivecolor3']){{$setting_data['sbactivecolor3']}}@else #6c5ecf  @endisset" required/>
						  <p class="text-muted"><small>This is the color of the third sidebar button.</small></p>
						</div>
					  </div>

					  <div class="form-group col-md-4">
						<label class="control-label">Display sidebar on smaller devices?</label>
						<div>
						  <select class="form-control" name="sbsmalldevices" required>
							<option value="@isset($setting_data['sbsmalldevices']){{$setting_data['sbsmalldevices']}} @endisset" selected="">Currently set to ->@isset($setting_data['sbsmalldevices'])@if($setting_data['sbsmalldevices'] == 1) False @else True  @endif
							  @endisset</option>
							<option value="1">False</option>
							<option value="2">True</option>
						</select>
						  <p class="text-muted"><small>Should the sidebar be displayed on smaller devices such as phones?</small></p>
						</div>
					  </div>

					  <div class="form-group col-md-4">
						<label class="control-label">Sidebar button & Search bar background</label>
						<div>
						  <input @isset($setting_data['colorsel'])@if($setting_data['colorsel'] == 1) type="color" @else type="text"  @endif
						  @endisset class="form-control" name="sb-links-bg" value="@isset($setting_data['sb-links-bg']){{$setting_data['sb-links-bg']}}@else #353340  @endisset" required/>
						  <p class="text-muted"><small>This is the background color of the sidebar & searchbar</small></p>
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

	<div class="col-xs-12">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Custom CSS</h3>
			</div>
			<form action="{{ route('admin.unix.setting') }}" method="POST">
				@csrf
				<div class="box-body">
				  <div class="row">
                      <div>

					  <div class="form-group col-md-4">
                            <label class="control-label">Your Custom CSS</label>
                            <div>
                                <textarea type="text" class="form-control" name="custom_css" required>@isset($setting_data['custom_css']){{$setting_data['custom_css']}}@else    @endisset</textarea>
                              <p class="text-muted"><small>Add your CSS here, use bottom right label to enlargen</small></p>
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




<script>


</script>

@endsection
