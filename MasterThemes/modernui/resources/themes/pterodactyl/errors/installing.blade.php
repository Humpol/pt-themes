{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}
@extends('layouts.error')

@section('title')
    @lang('base.errors.installing.header')
@endsection

@section('content-header')
@endsection

@section('content')
    <div class="flex-grow-1 w-100 d-flex align-items-center">
        <div class="col-lg-4 px-4 px-lg-0 mx-auto text-center text-black">
            <h3 class="font-size-xxl line-height-sm font-weight-light d-block px-3 mb-3 text-black-50">
                Installing in progress...
            </h3>

            <div class="progress progress-striped mt-4 mb-4">
                <div class="progress-bar progress-bar-info" style="width: 75%"></div>
            </div>

            <p>
                @lang('base.errors.installing.desc')
            </p>
        </div>
    </div>
@endsection
