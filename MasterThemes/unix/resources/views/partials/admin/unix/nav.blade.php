@include('partials/admin.unix.notice')

@section('unix::nav')
    @yield('unix::notice')
    <style>.fa, .fas{padding-left:3px;}</style>
    <div class="row">
        <div class="col-xs-12">
            <div class="nav-tabs-custom nav-tabs-floating">
                <ul class="nav nav-tabs">
                    <li @if($activeTab === 'basic')class="active"@endif><a href="{{ route('admin.unix') }}"><i class="fas fa-cog"></i> General</a></li>
                    <li @if($activeTab === 'background')class="active"@endif><a href="{{ route('admin.unix.background') }}"><i class="fas fa-images"></i> Background</a></li>
                    <li @if($activeTab === 'alerts')class="active"@endif><a href="{{ route('admin.unix.alerts') }}"><i class="fas fa-plus-circle"></i> Alerts</a></li>
                    <li @if($activeTab === 'login')class="active"@endif><a href="{{ route('admin.unix.login') }}"><i class="fas fa-key"></i> Login Page</a></li>
                    <li @if($activeTab === 'connect')class="active"@endif><a href="{{ route('admin.unix.connect') }}"><i class="fas fa-plug"></i> Connectivity</a></li>
                    <li @if($activeTab === 'meta')class="active"@endif><a href="{{ route('admin.unix.meta') }}"><i class="fas fa-link"></i> Meta</a></li>
                    <li @if($activeTab === 'emails')class="active"@endif><a href="{{ route('admin.mail') }}"><i class="fas fa-solid fa-at"></i> Emails</a></li>
                    <li @if($activeTab === 'advanced')class="active"@endif><a href="{{ route('admin.unix.advanced') }}"><i class="fas fa-code"></i> Advanced</a></li>
                    <li @if($activeTab === 'support')class="active"@endif><a href="{{ route('admin.unix.support') }}"><i class="fas fa-life-ring"></i> Support</a></li>
                    <li @if($activeTab === 'update')class="active"@endif><a href="{{ route('admin.unix.update') }}"><i class="fas fa-cloud-download-alt"></i> Update</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
