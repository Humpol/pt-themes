{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}
@extends('layouts.master')

@section('title')
    @lang('base.index.header')
@endsection

@section('content-header')
    <ol class="breadcrumb text-uppercase font-size-xs p-0">
        <li class="breadcrumb-item"><a href="{{ route('index') }}">@lang('strings.home')</a></li>
        <li class="breadcrumb-item active" aria-current="page">@lang('strings.servers')</li>
    </ol>
    <h5 class="display-4 mt-1 mb-2 font-weight-bold">@lang('base.index.header')</h5>
    <p class="text-black-50 mb-0">@lang('base.index.header_sub')</p>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-box">
                <div class="card-header">
                    <div class="card-header--title">
                        <h5 class="my-3">@lang('base.index.list')</h5>
                    </div>

                    <div class="card-header--actions pt-3">
                        <form action="{{ route('index') }}" method="GET">
                            <div class="form-group">
                                <div class="input-group input-group-seamless input-group-sm mb-4">
                                    <input type="text" name="query" class="form-control pull-right"
                                           value="{{ request()->input('query') }}"
                                           placeholder="@lang('strings.search')">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default input-group-btn"><i
                                                class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body p-0 table-responsive no-padding">
                    <table class="table table-hover table-striped">
                        <thead class="thead-light">
                        <tr>
                            <th>@lang('strings.id')</th>
                            <th>@lang('strings.name')</th>
                            <th>@lang('strings.node')</th>
                            <th>@lang('strings.connection')</th>
                            <th class="text-center hidden-sm hidden-xs">@lang('strings.memory')</th>
                            <th class="text-center hidden-sm hidden-xs">@lang('strings.cpu')</th>
                            <th class="text-center hidden-sm hidden-xs">@lang('strings.disk')</th>
                            <th class="text-center">@lang('strings.relation')</th>
                            <th class="text-center">@lang('strings.status')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($servers as $server)
                            <tr class="dynamic-update" data-server="{{ $server->uuidShort }}">
                                <td @if(! empty($server->description)) rowspan="2" @endif>
                                    <code>{{ $server->uuidShort }}</code></td>
                                <td><a href="{{ route('server.index', $server->uuidShort) }}">{{ $server->name }}</a>
                                </td>
                                <td>{{ $server->getRelation('node')->name }}</td>
                                <td><code>{{ $server->getRelation('allocation')->alias }}:{{ $server->getRelation('allocation')->port }}</code></td>
                                <td class="text-center hidden-sm hidden-xs"><span data-action="memory">--</span>
                                    / {{ $server->memory === 0 ? '∞' : $server->memory }} MB
                                </td>
                                <td class="text-center hidden-sm hidden-xs"><span data-action="cpu"
                                                                                  data-cpumax="{{ $server->cpu }}">--</span>
                                    %
                                </td>
                                <td class="text-center hidden-sm hidden-xs"><span data-action="disk">--</span>
                                    / {{ $server->disk === 0 ? '∞' : $server->disk }} MB
                                </td>
                                <td class="text-center">
                                    @if($server->user->id === Auth::user()->id)
                                        <span class="badge badge-primary">@lang('strings.owner')</span>
                                    @elseif(Auth::user()->root_admin)
                                        <span class="badge bg-warning">@lang('strings.admin')</span>
                                    @else
                                        <span class="badge badge-info">@lang('strings.subuser')</span>
                                    @endif
                                </td>
                                @if($server->node->maintenance_mode)
                                    <td class="text-center">
                                        <span class="badge badge-warning">@lang('strings.under_maintenance')</span>
                                    </td>
                                @else
                                    <td class="text-center" data-action="status">
                                        <span class="badge badge-light"><i
                                                class="fa fa-refresh fa-fw fa-spin"></i></span>
                                    </td>
                                @endif
                            </tr>
                            @if (! empty($server->description))
                                <tr class="server-description">
                                    <td colspan="7"><p
                                            class="text-muted small no-margin">{{ str_limit($server->description, 400) }}</p>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @if($servers->hasPages())
                    <div class="box-footer">
                        <div
                            class="col-md-12 text-center">{!! $servers->appends(['query' => Request::input('query')])->render() !!}</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('footer-scripts')
    @parent
    <script>
        $('tr.server-description').on('mouseenter mouseleave', function (event) {
            $(this).prev('tr').css({
                'background-color': (event.type === 'mouseenter') ? '#f5f5f5' : '',
            });
        });
    </script>
    {!! Theme::js('js/frontend/serverlist.js') !!}
@endsection
