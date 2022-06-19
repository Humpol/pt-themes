@extends('layouts.master')

@section('title')
    @lang('base.api.new.header')
@endsection

@section('content-header')
    <ol class="breadcrumb text-uppercase font-size-xs p-0">
        <li class="breadcrumb-item"><a href="{{ route('index') }}">@lang('strings.home')</a></li>
        <li class="breadcrumb-item"><a href="{{ route('account.api') }}">@lang('navigation.account.api_access')</a></li>
        <li class="breadcrumb-item active" aria-current="page">@lang('base.api.new.header')</li>
    </ol>
    <h5 class="display-4 mt-1 mb-2 font-weight-bold">@lang('base.api.new.header')</h5>
    <p class="text-black-50 mb-0">@lang('base.api.new.header_sub')</p>
@endsection

@section('content')
    <form method="POST" action="{{ route('account.api.new') }}">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card card-box">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="control-label" for="memoField">Description <span
                                    class="field-required"></span></label>
                            <input id="memoField" type="text" name="memo" class="form-control"
                                   value="{{ old('memo') }}">
                        </div>
                        <p class="text-muted">Set an easy to understand description for this API key to help you
                            identify it later on.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card card-box">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="control-label" for="allowedIps">Allowed Connection IPs <span
                                    class="field-optional"></span></label>
                            <textarea id="allowedIps" name="allowed_ips" class="form-control"
                                      rows="5">{{ old('allowed_ips') }}</textarea>
                        </div>
                        <p class="text-muted">If you would like to limit this API key to specific IP addresses enter
                            them above, one per line. CIDR notation is allowed for each IP address. Leave blank to
                            allow any IP address.</p>
                    </div>
                    <div class="card-footer">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-success btn-sm pull-right">Create</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
