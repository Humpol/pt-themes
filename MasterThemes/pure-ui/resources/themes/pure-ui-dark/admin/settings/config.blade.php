<?php 
    require('../../pterodactyl/public/custom_config.php');
?>

@extends('layouts.admin')
@include('partials/admin.settings.nav', ['activeTab' => 'config'])

@section('title')
    Config
@endsection

@section('content-header')
    <h1>Theme Configuration<small>Configure Pterodactyl to your liking.</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}">Admin</a></li>
        <li class="active">Config</li>
    </ol>
@endsection

@section('content')
    @yield('settings::nav')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Theme configuration</h3>
                </div>
                <form action="{{ route('admin.settings.config') }}" method="POST">
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label class="control-label">Primary Color</label>
                                <div class="input-group">
                                    <span class="input-group-addon">#</span>
                                    <input type="text" class="form-control" name="color:primary" value="{{ old('color:primary', config('color.primary')) }}"/>
                                </div>
                                <p class="text-muted"><small>Set here the <code>primary color</code> of your theme!</small></p>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">Secondary Color</label>
                                <div class="input-group">
                                    <span class="input-group-addon">#</span>
                                    <input type="text" class="form-control" name="color:secondary" value="{{ old('color:secondary', config('color.secondary')) }}"/>
                                </div>
                                <p class="text-muted"><small>Set here the <code>secondary color</code> of your theme!</small></p>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">Third Color</label>
                                <div class="input-group">
                                    <span class="input-group-addon">#</span>
                                    <input type="text" class="form-control" name="color:third" value="{{ old('color:third', config('color.third')) }}"/>
                                </div>
                                <p class="text-muted"><small>Set here the <code>third color</code> of your theme!</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        {!! csrf_field() !!}
                        <button type="submit" name="_method" value="PATCH" class="btn btn-sm btn-primary pull-right">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

