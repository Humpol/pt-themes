{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}
@extends('layouts.master')

@section('title')
    @lang('server.files.header')
@endsection

@section('content-header')
    <ol class="breadcrumb text-uppercase font-size-xs p-0">
        <li class="breadcrumb-item"><a href="{{ route('index') }}">@lang('strings.home')</a></li>
        <li class="breadcrumb-item"><a href="{{ route('server.index', $server->uuidShort) }}">{{ $server->name }}</a>
        </li>
        <li class="breadcrumb-item"><a href="javascript:;">@lang('navigation.server.file_management')</a></li>
        <li class="breadcrumb-item active" aria-current="page">@lang('navigation.server.file_browser')</li>
    </ol>
    <h5 class="display-4 mt-1 mb-2 font-weight-bold">@lang('server.files.header')</h5>
    <p class="text-black-50 mb-0">@lang('server.files.header_sub')</p>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-box">
            <div class="overlay file-overlay" style="display: none; position: fixed; width: 100%; height: 100%; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0,0,0,0.5); z-index: 2; cursor: pointer;">
                <i class="fa fa-refresh fa-spin" style="position: absolute; top: 50%; left: 50%; font-size: 50px; color: white; transform: translate(-50%,-50%); -ms-transform: translate(-50%,-50%);"></i>
            </div>
            <div id="load_files">
                <div class="card-body table-responsive no-padding">
                    <div class="callout callout-info" style="margin:10px;">@lang('server.files.loading')</div>
                </div>
            </div>
            <div class="card-footer with-border">
                <p class="text-muted small" style="margin: 0 0 2px;">@lang('server.files.path', ['path' => '<code>/home/container</code>', 'size' => '<code>' . $node->upload_size . ' MB</code>'])</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer-scripts')
    @parent
    {!! Theme::js('js/frontend/server.socket.js') !!}
    {!! Theme::js('vendor/async/async.min.js') !!}
    {!! Theme::js('vendor/lodash/lodash.js') !!}
    {!! Theme::js('vendor/siofu/client.min.js') !!}
    @if(App::environment('production'))
        {!! Theme::js('js/frontend/files/filemanager.min.js?hash=cd7ec731dc633e23ec36144929a237d18c07d2f0') !!}
    @else
        {!! Theme::js('js/frontend/files/src/index.js') !!}
        {!! Theme::js('js/frontend/files/src/contextmenu.js') !!}
        {!! Theme::js('js/frontend/files/src/actions.js') !!}
    @endif
    {!! Theme::js('js/frontend/files/upload.js') !!}
@endsection
