{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}


@extends('layouts.admin')
@include('partials/admin.unix.nav', ['activeTab' => 'connect'])

@section('title')
Unix Connectivity
@endsection

@section('content-header')
<h1>Unix<small>Configure additional services</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ route('admin.index') }}">Admin</a></li>
    <li><a href="{{ route('admin.unix') }}">Unix</a></li>
	<li class="active">Connectivity </li>
</ol>
@endsection



@section('content')
@yield('unix::nav')
<link rel="stylesheet" href="/themes/unix/css/alerts.css" />

<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Unix Connectivity</h3>
			</div>
			<form action="{{ route('admin.unix.setting') }}" method="POST">
				@csrf
				<div class="box-body">
				  <div class="row">
                      <div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Enable Widgetbot?</label>
                            <div>
                              <select class="form-control" name="widgetbot" required>
                                <option value="@isset($setting_data['widgetbot']){{$setting_data['widgetbot']}} @endisset" selected="">Currently set to ->@isset($setting_data['widgetbot'])@if($setting_data['widgetbot'] == 1) Enabled @else Disabled  @endif
                                  @endisset</option>
                                <option value="1">Enabled</option>
                                <option value="disabled">Disabled</option>
                            </select>
                              <p class="text-muted"><small>Do you want to enable WidgetBot?</small></p>
                            </div>
                          </div>

					<div class="form-group col-md-4">
						<label class="control-label">Widgetbot Discord ID</label>
						<div>
						  <input type="text" class="form-control" name="discordID" value="@isset($setting_data['discordID']){{$setting_data['discordID']}}@else   @endisset" required/>
						  <p class="text-muted"><small>This is the ID of your Discord server(not invite).</small></p>
						</div>
					  </div>

                      <div class="form-group col-md-4">
						<label class="control-label">Widgetbot Discord ID</label>
						<div>
                            <input type="text" class="form-control" name="channelID" value="@isset($setting_data['channelID']){{$setting_data['channelID']}}@else   @endisset" required/>
						  <p class="text-muted"><small>This is ID of the Channel first displayed by WidgetBot.</small></p>
						</div>
					  </div>

					  <div class="form-group col-md-4">
						<label class="control-label">Enable Arc?</label>
						<div>
						  <select class="form-control" name="enablearc" required>
							<option value="@isset($setting_data['enablearc']){{$setting_data['enablearc']}} @endisset" selected="">Currently set to ->@isset($setting_data['enablearc'])@if($setting_data['enablearc'] == 1) Enabled @else Disabled  @endif
							  @endisset</option>
							<option value="1">Enabled</option>
							<option value="disabled">Disabled</option>
						</select>
						  <p class="text-muted"><small>Arc is a chat service</small></p>
						</div>
					  </div>

                      <div class="form-group col-md-4">
						<label class="control-label">Arc.io</label>
						<div>
                            <input type="text" class="form-control" name="arcID" value="@isset($setting_data['arcID']){{$setting_data['arcID']}}@else  # @endisset" required/>
						  <p class="text-muted"><small>Enter your arc token, it might look like this: #ZurMK1Hv</small></p>
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
