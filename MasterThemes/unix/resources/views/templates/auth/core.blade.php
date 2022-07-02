    <!-- HEADER -->
	@include('partials/unix.lg.login.header')
	@include('partials/unix.lg.background.video')
	@include('partials/unix.lg.background.image')
	@include('partials/unix.lg.changers.logo')
	@include('partials/unix.lg.login.css')

    <!-- MAIN CONTENT -->
    @isset($setting_data['loginbgtype']) @if($setting_data['loginbgtype'] == 2) 
    <style>:root{--theme-bg: transparent!important;     --theme-primary-bg: #0000004a!important; --theme-secondary-bg: #0000005e!important; }</style>
    @yield('unix::lg.background.image')
    @endif @endisset
    
    @isset($setting_data['loginbgtype']) @if($setting_data['loginbgtype'] == 3) 
    <style>:root{--theme-bg: transparent!important;     --theme-primary-bg: transparent!important; --theme-secondary-bg: #0000005e!important; }</style>
    @yield('unix::lg.background.video')
    @endif @endisset
    @yield('unix::lg.login.header')

    @extends('templates/wrapper', [
    'css' => ['body' => 'bg-neutral-900']
    ])

    @section('container')
    <div id="app"></div>
    @endsection

   @yield('unix::lg.login.css')
   @yield('unix::lg.changer.logo')

   <style>
  @isset($setting_data['login_custom_css']){{$setting_data['login_custom_css']}}@else    @endisset
   </style>
   
