{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}
@extends('layouts.admin')

@section('title')
    Nests &rarr; {{ $nest->name }}
@endsection

@section('content-header')
    <h1>{{ $nest->name }}<small>{{ str_limit($nest->description, 50) }}</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}">Admin</a></li>
        <li><a href="{{ route('admin.nests') }}">Nests</a></li>
        <li class="active">{{ $nest->name }}</li>
    </ol>
@endsection

@section('content')
<form action="{{ route('admin.nests.view', $nest->id) }}" method="POST">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label class="control-label">Name <span class="field-required"></span></label>
                        <div>
                            <input type="text" name="name" class="form-control" value="{{ $nest->name }}" />
                            <p class="text-muted"><small>This should be a descriptive category name that encompasses all of the options within the service.</small></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Description <span class="field-required"></span></label>
                        <div>
                            <textarea name="description" class="form-control" rows="7">{{ $nest->description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    {!! csrf_field() !!}
                    <button type="submit" name="_method" value="PATCH" class="btn btn-primary btn-md pull-right">Save</button>
                    <button id="deleteButton" type="submit" name="_method" value="DELETE" class="btn btn-md btn-danger muted muted-hover"><i class="feather icon-trash"></i></button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label class="control-label">Nest ID</label>
                        <div>
                            <input type="text" readonly class="form-control" value="{{ $nest->id }}" />
                            <p class="text-muted small">A unique ID used for identification of this nest internally and through the API.</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Author</label>
                        <div>
                            <input type="text" readonly class="form-control" value="{{ $nest->author }}" />
                            <p class="text-muted small">The author of this service option. Please direct questions and issues to them unless this is an official option authored by <code>support@pterodactyl.io</code>.</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">UUID</label>
                        <div>
                            <input type="text" readonly class="form-control" value="{{ $nest->uuid }}" />
                            <p class="text-muted small">A UUID that all servers using this option are assigned for identification purposes.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header with-border">
                <h3 class="card-title">Nest Eggs</h3>
            </div>
            <div class="card-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th class="text-center">Servers</th>
                        <th class="text-center"></th>
                    </tr>
                    @foreach($nest->eggs as $egg)
                        <tr>
                            <td class="align-middle"><code>{{ $egg->id }}</code></td>
                            <td class="align-middle"><a href="{{ route('admin.nests.egg.view', $egg->id) }}" data-toggle="tooltip" data-placement="right" title="{{ $egg->author }}">{{ $egg->name }}</a></td>
                            <td class="col-xs-8 align-middle">{!! $egg->description !!}</td>
                            <td class="text-center align-middle"><code>{{ $egg->servers->count() }}</code></td>
                            <td class="align-middle">
                                <a href="{{ route('admin.nests.egg.export', ['egg' => $egg->id]) }}"><i class="fa fa-download"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.nests.egg.new') }}"><button class="btn btn-success btn-sm pull-right">New Egg</button></a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer-scripts')
    @parent
    <script>
        $('#deleteButton').on('mouseenter', function (event) {
            $(this).find('i').html(' Delete Nest');
        }).on('mouseleave', function (event) {
            $(this).find('i').html('');
        });
    </script>
@endsection
