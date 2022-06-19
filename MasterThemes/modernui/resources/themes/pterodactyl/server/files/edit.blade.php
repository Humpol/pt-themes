{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}
@extends('layouts.master')

@section('title')
    @lang('server.files.edit.header')
@endsection

@section('content-header')
    <ol class="breadcrumb text-uppercase font-size-xs p-0">
        <li class="breadcrumb-item"><a href="{{ route('index') }}">@lang('strings.home')</a></li>
        <li class="breadcrumb-item"><a href="{{ route('server.index', $server->uuidShort) }}">{{ $server->name }}</a>
        </li>
        <li class="breadcrumb-item"><a href="{{ route('server.files.index', $server->uuidShort) }}">@lang('navigation.server.file_browser')</a></li>
        <li class="breadcrumb-item active" aria-current="page">@lang('navigation.server.edit_file')</li>
    </ol>
    <h5 class="display-4 mt-1 mb-2 font-weight-bold">@lang('server.files.edit.header')</h5>
    <p class="text-black-50 mb-0">@lang('server.files.edit.header_sub')</p>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-box">
            <div class="card-header">
                <div class="card-header--title">
                    <h5 class="my-3">{{ $file }}</h5>
                </div>
                <div class="card-header--actions">
                    <a href="/server/{{ $server->uuidShort }}/files#{{ rawurlencode($directory) }}" class="pull-right"><button class="btn btn-warning btn-sm">@lang('server.files.edit.return')</button></a>
                </div>
            </div>
            <input type="hidden" name="file" value="{{ $file }}" />
            <textarea id="editorSetContent" style="display: none;">{{ $contents }}</textarea>
            <div class="overlay" id="editorLoadingOverlay" style="display: none; position: fixed; width: 100%; height: 100%; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0,0,0,0.5); z-index: 2; cursor: pointer;">
                <i class="fa fa-refresh fa-spin" style="position: absolute; top: 50%; left: 50%; font-size: 50px; color: white; transform: translate(-50%,-50%); -ms-transform: translate(-50%,-50%);"></i>
            </div>
            <div class="card-body" style="height:500px;" id="editor"></div>
            <div class="card-footer with-border">
                <button class="btn btn-sm btn-primary" id="save_file"><i class="fa fa-fw fa-save"></i> &nbsp;@lang('server.files.edit.save')</button>
                <a href="/server/{{ $server->uuidShort }}/files#{{ rawurlencode($directory) }}" class="pull-right"><button class="btn btn-warning btn-sm">@lang('server.files.edit.return')</button></a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer-scripts')
    @parent
    {!! Theme::js('js/frontend/server.socket.js') !!}
    {!! Theme::js('vendor/ace/ace.js') !!}
    {!! Theme::js('vendor/ace/ext-modelist.js') !!}
    {!! Theme::js('vendor/ace/ext-whitespace.js') !!}
    {!! Theme::js('js/frontend/files/editor.js') !!}
    <script>
        $(document).ready(function () {
            Editor.setValue($('#editorSetContent').val(), -1);
            Editor.getSession().setUndoManager(new ace.UndoManager());
            $('#editorLoadingOverlay').hide();
        });
    </script>
@endsection
