@include('partials/admin.settings.notice')

@section('settings::nav')
    @yield('settings::notice')
    <div class="row">
        <div class="col-md-12 mb-2">
            <a class="btn btn-primary btn-md @if($activeTab === 'basic') btn-info @endif" href="{{ route('admin.settings') }}">General</a>
            <a class="btn btn-primary btn-md @if($activeTab === 'mail') btn-info @endif" href="{{ route('admin.settings.mail') }}">Mail</a>
            <a class="btn btn-primary btn-md @if($activeTab === 'advanced') btn-info @endif" href="{{ route('admin.settings.advanced') }}">Advanced</a>
        </div>
    </div>
@endsection
