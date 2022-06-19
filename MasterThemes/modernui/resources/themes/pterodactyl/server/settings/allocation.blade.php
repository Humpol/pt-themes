{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}
@extends('layouts.master')

@section('title')
    @lang('server.config.allocation.header')
@endsection

@section('content-header')
    <ol class="breadcrumb text-uppercase font-size-xs p-0">
        <li class="breadcrumb-item"><a href="{{ route('index') }}">@lang('strings.home')</a></li>
        <li class="breadcrumb-item"><a href="{{ route('server.index', $server->uuidShort) }}">{{ $server->name }}</a>
        </li>
        <li class="breadcrumb-item"><a href="javascript:;">@lang('navigation.server.configuration')</a></li>
        <li class="breadcrumb-item active" aria-current="page">@lang('navigation.server.port_allocations')</li>
    </ol>
    <h5 class="display-4 mt-1 mb-2 font-weight-bold">@lang('server.config.allocation.header')</h5>
    <p class="text-black-50 mb-0">@lang('server.config.allocation.header_sub')</p>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-8">
            <div class="card card-box">
                <div class="card-header">
                    <div class="card-header--title">
                        <h5 class="my-3">@lang('server.config.allocation.available')</h5>
                    </div>
                </div>
                <div class="card-body p-0 table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>@lang('strings.ip')</th>
                            <th>@lang('strings.alias')</th>
                            <th>@lang('strings.port')</th>
                            <th></th>
                        </tr>
                        @foreach ($allocations as $allocation)
                            <tr>
                                <td>
                                    <code>{{ $allocation->ip }}</code>
                                </td>
                                <td class="middle">
                                    @if(is_null($allocation->ip_alias))
                                        <span class="badge badge-info">@lang('strings.none')</span>
                                    @else
                                        <code>{{ $allocation->ip_alias }}</code>
                                    @endif
                                </td>
                                <td><code>{{ $allocation->port }}</code></td>
                                <td class="col-xs-2 middle">
                                    @if($allocation->id === $server->allocation_id)
                                        <a class="btn btn-sm btn-success disabled text-white" data-action="set-default"
                                           data-allocation="{{ $allocation->hashid }}"
                                           role="button">@lang('strings.primary')</a>
                                    @else
                                        <a class="btn btn-sm btn-info text-white" data-action="set-default"
                                           data-allocation="{{ $allocation->hashid }}"
                                           role="button">@lang('strings.make_primary')</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="toggleActivityOverlay" class="overlay" style="display: none; position: fixed; width: 100%; height: 100%; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0,0,0,0.5); z-index: 2; cursor: pointer;">
                    <i class="fa fa-refresh fa-spin" style="position: absolute; top: 50%; left: 50%; font-size: 50px; color: white; transform: translate(-50%,-50%); -ms-transform: translate(-50%,-50%);"></i>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card card-box">
                <div class="card-header">
                    <div class="card-header--title">
                        <h5 class="my-3">@lang('server.config.allocation.help')</h5>
                    </div>
                </div>
                <div class="card-body">
                    <p>@lang('server.config.allocation.help_text')</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-scripts')
    @parent
    {!! Theme::js('js/frontend/server.socket.js') !!}
    <script>
        $(document).ready(function () {
            @can('edit-allocation', $server)
            (function triggerClickHandler() {
                $('a[data-action="set-default"]:not(.disabled)').click(function (e) {
                    $('#toggleActivityOverlay').show();
                    e.preventDefault();
                    var self = $(this);
                    $.ajax({
                        type: 'PATCH',
                        url: Router.route('server.settings.allocation', {server: Pterodactyl.server.uuidShort}),
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                        },
                        data: {
                            'allocation': $(this).data('allocation')
                        }
                    }).done(function () {
                        self.parents().eq(2).find('a[role="button"]').removeClass('btn-success disabled').addClass('btn-info').html('{{ trans('strings.make_primary') }}');
                        self.removeClass('btn-info').addClass('btn-success disabled').html('{{ trans('strings.primary') }}');
                    }).fail(function (jqXHR) {
                        console.error(jqXHR);
                        var error = 'An error occurred while trying to process this request.';
                        if (typeof jqXHR.responseJSON !== 'undefined' && typeof jqXHR.responseJSON.error !== 'undefined') {
                            error = jqXHR.responseJSON.error;
                        }
                        swal({type: 'error', title: 'Whoops!', text: error});
                    }).always(function () {
                        triggerClickHandler();
                        $('#toggleActivityOverlay').hide();
                    })
                });
            })();
            @endcan
        });
    </script>
@endsection
