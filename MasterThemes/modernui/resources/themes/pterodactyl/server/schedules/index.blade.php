{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}
@extends('layouts.master')

@section('title')
    @lang('server.schedule.header')
@endsection

@section('content-header')
    <ol class="breadcrumb text-uppercase font-size-xs p-0">
        <li class="breadcrumb-item"><a href="{{ route('index') }}">@lang('strings.home')</a></li>
        <li class="breadcrumb-item"><a href="{{ route('server.index', $server->uuidShort) }}">{{ $server->name }}</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">@lang('navigation.server.schedules')</li>
    </ol>
    <h5 class="display-4 mt-1 mb-2 font-weight-bold">@lang('server.schedule.header')</h5>
    <p class="text-black-50 mb-0">@lang('server.schedule.header_sub')</p>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-box">
            <div class="card-header">
                <div class="card-header--title">
                    <h5 class="my-3">@lang('server.schedule.current')</h5>
                </div>
                <div class="card-header--actions">
                    <a href="{{ route('server.schedules.new', $server->uuidShort) }}"><button class="btn btn-primary btn-sm">Create New</button></a>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>@lang('strings.name')</th>
                            <th class="text-center">@lang('strings.queued')</th>
                            <th class="text-center">@lang('strings.tasks')</th>
                            <th>@lang('strings.last_run')</th>
                            <th>@lang('strings.next_run')</th>
                            <th></th>
                        </tr>
                        @foreach($schedules as $schedule)
                            <tr @if(! $schedule->is_active)class="muted muted-hover"@endif>
                                <td class="middle">
                                    @can('edit-schedule', $server)
                                        <a href="{{ route('server.schedules.view', ['server' => $server->uuidShort, '$schedule' => $schedule->hashid]) }}">
                                            {{ $schedule->name ?? trans('server.schedule.unnamed') }}
                                        </a>
                                    @else
                                        {{ $schedule->name ?? trans('server.schedule.unnamed') }}
                                    @endcan
                                </td>
                                <td class="middle text-center">
                                    @if ($schedule->is_processing)
                                        <span class="label label-success">@lang('strings.yes')</span>
                                    @else
                                        <span class="label label-default">@lang('strings.no')</span>
                                    @endif
                                </td>
                                <td class="middle text-center"><span class="label label-primary">{{ $schedule->tasks_count }}</span></td>
                                <td class="middle">
                                @if($schedule->last_run_at)
                                    {{ Carbon::parse($schedule->last_run_at)->toDayDateTimeString() }}<br /><span class="text-muted small">({{ Carbon::parse($schedule->last_run_at)->diffForHumans() }})</span>
                                @else
                                    <em class="text-muted">@lang('strings.not_run_yet')</em>
                                @endif
                                </td>
                                <td class="middle">
                                    @if($schedule->is_active)
                                        {{ Carbon::parse($schedule->next_run_at)->toDayDateTimeString() }}<br /><span class="text-muted small">({{ Carbon::parse($schedule->next_run_at)->diffForHumans() }})</span>
                                    @else
                                        <em>n/a</em>
                                    @endif
                                </td>
                                <td class="middle">
                                    @can('delete-schedule', $server)
                                        <a class="btn btn-xs btn-danger" href="#" data-action="delete-schedule" data-schedule-id="{{ $schedule->hashid }}" data-toggle="tooltip" data-placement="top" title="@lang('strings.delete')"><i class="fa fa-fw fa-trash-o"></i></a>
                                    @endcan
                                    @can('toggle-schedule', $server)
                                        <a class="btn btn-xs btn-default" href="#" data-action="toggle-schedule" data-active="{{ $schedule->active }}" data-schedule-id="{{ $schedule->hashid }}" data-toggle="tooltip" data-placement="top" title="@lang('server.schedule.toggle')"><i class="fa fa-fw fa-eye-slash"></i></a>
                                        <a class="btn btn-xs btn-default" href="#" data-action="trigger-schedule" data-schedule-id="{{ $schedule->hashid }}" data-toggle="tooltip" data-placement="top" title="@lang('server.schedule.run_now')"><i class="fa fa-fw fa-refresh"></i></a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer-scripts')
    @parent
    {!! Theme::js('js/frontend/server.socket.js') !!}
    {!! Theme::js('js/frontend/tasks/management-actions.js') !!}
@endsection
