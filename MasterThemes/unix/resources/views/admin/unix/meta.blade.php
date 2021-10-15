{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}


@extends('layouts.admin')
@include('partials/admin.unix.nav', ['activeTab' => 'meta'])

@section('title')
Unix Meta
@endsection

@section('content-header')
<h1>Unix<small>Configure your meta</small></h1>
<ol class="breadcrumb">
	<li><a href="{{ route('admin.index') }}">Admin</a></li>
    <li><a href="{{ route('admin.unix') }}">Unix</a></li>
	<li class="active">Meta </li>
</ol>
@endsection



@section('content')
@yield('unix::nav')
<link rel="stylesheet" href="/themes/unix/css/alerts.css" />

<div class="alert alert-info alert-white rounded" style="background: white !important; color: black !important; border-color: #4d90fd;">
    <div class="icon"><i class="fa fa-info-circle"></i></div>
    <strong>Info</strong> <br>When sending a link in Discord or other places this is the card displayed, the keywords are also used by Search Engines such as Google.
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Meta Configuration</h3>
			</div>
			
			<form action="{{ route('admin.unix.setting') }}" method="POST">
				@csrf
				<div class="box-body">
				  <div class="row">
					<div class="form-group col-md-4">
						<label class="control-label">Title</label>
						<div>
						  <input type="text" class="form-control" name="metatitle" value="@isset($setting_data['metatitle']){{$setting_data['metatitle']}}@else {{ config('app.name', 'Pterodactyl') }}  @endisset" required/>
						  <p class="text-muted"><small>This is the title of the Meta card.</small></p>
						</div>
					  </div>
						<div class="form-group col-md-4">
						  <label class="control-label">Image URL</label>
						  <div>
							<input type="text" class="form-control" name="metaimg" value="@isset($setting_data['metaimg']){{$setting_data['metaimg']}}@else https://cdn.resourcemc.net/zAsa7/rIBOyeRU58.png/raw @endisset" required/>
							<p class="text-muted"><small>This is the URL of the Image, make sure it ends with .png, jpeg etc</small></p>
						  </div>
						</div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Theme Color</label>
                            <div>
                              <input @isset($setting_data['colorsel'])@if($setting_data['colorsel'] == 1) type="color" @else type="text"  @endif
                              @endisset class="form-control" name="metacolor" value="@isset($setting_data['metacolor']){{$setting_data['metacolor']}}@else @isset($setting_data['buttoncolor']){{$setting_data['buttoncolor']}}@else #0967d3 @endisset @endisset" required/>
                              <p class="text-muted"><small>This is the side-color of the meta card.</small></p>
                            </div>
                          </div>
                          
                          <div class="form-group col-md-4">
                            <label class="control-label">Description</label>
                            <div>
                                <textarea type="text" class="form-control" name="metadesc" required>@isset($setting_data['metadesc']){{$setting_data['metadesc']}}@else Manage your server with an easy-to-use Panel   @endisset</textarea>
                              <p class="text-muted"><small>This is the description of the meta card.</small></p>
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
