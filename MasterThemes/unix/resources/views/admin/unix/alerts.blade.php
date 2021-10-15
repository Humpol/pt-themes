{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}


@extends('layouts.admin')
@include('partials/admin.unix.nav', ['activeTab' => 'alerts'])

@section('title')
Unix Alerts
@endsection

@section('content-header')
<h1>Unix<small>Alerts help you notify your users in a cool way</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ route('admin.index') }}">Admin</a></li>
    <li><a href="{{ route('admin.unix') }}">Unix</a></li>
	<li class="active">Alerts </li>
</ol>
@endsection



@section('content')
@yield('unix::nav')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Unix Alerts</h3>
			</div>
            <form action="{{ route('admin.unix.setting') }}" method="POST">
                @csrf
                <div class="box-body">
                  <div class="row">
                    <div class="form-group col-md-4">
                      <label class="control-label">Is Alert Enabled?</label>
                      <div>
                        <select class="form-control" name="alertenabled" required>
                                        <option value="@isset($setting_data['alertenabled']){{$setting_data['alertenabled']}} @endisset" selected="">Currently set to ->@isset($setting_data['alertenabled'])@if($setting_data['alertenabled'] == 1) Enabled @else Disabled  @endif
                                          @endisset</option>
                                        <option value="1">Enabled</option>
                                        <option value="0">Disabled</option>
                                    </select>
                        <p class="text-muted"><small>Do you want to enable the Alert?</small></p>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <label class="control-label">Alert Title</label>
                      <div>
                        <input type="text" class="form-control" name="atitle" value="@isset($setting_data['atitle']){{$setting_data['atitle']}}@else Info @endisset" required/>
                        <p class="text-muted"><small>This is the title of the alert.</small></p>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <label class="control-label">Alert Background Color</label>
                      <div>
                        <input @isset($setting_data['colorsel'])@if($setting_data['colorsel'] == 1) type="color" @else type="text"  @endif
                        @endisset class="form-control" name="abackgroundcolor" value="@isset($setting_data['abackgroundcolor']){{$setting_data['abackgroundcolor']}}@else white @endisset" required/>
                        <p class="text-muted"><small>This is the background color</small></p>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <label class="control-label">Alert Color</label>
                      <div>
                        <input @isset($setting_data['colorsel'])@if($setting_data['colorsel'] == 1) type="color" @else type="text"  @endif
                        @endisset class="form-control" name="alertcolor" value="@isset($setting_data['alertcolor']){{$setting_data['alertcolor']}}@else #4d90fd @endisset" required/>
                        <p class="text-muted"><small>This is the color of the alert</small></p>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <label class="control-label">Alert Message</label>
                      <div>
                        <textarea name="amessage" rows="3" class="form-control" required> @isset($setting_data['amessage']){{$setting_data['amessage']}}@else  @endisset</textarea>
                        <p class="text-muted"><small>This is the message displayed.</small></p>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <label class="control-label">Closable Alert?</label>
                      <div>
                        <select class="form-control" name="alertclosable" required>
                                        <option value="@isset($setting_data['alertclosable']){{$setting_data['alertclosable']}} @endisset" selected="">Currently set to ->@isset($setting_data['alertclosable'])@if($setting_data['alertclosable'] == 1) Enabled @else Disabled  @endif
                                          @endisset</option>
                                        <option value="1">Enabled</option>
                                        <option value="Disabled">Disabled</option>
                                    </select>
                        <p class="text-muted"><small>Should the alert be closable?</small></p>
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
	</div>
</div>
@endsection