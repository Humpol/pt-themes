@section('unix::lg.background.image')
<style>
    .bg-neutral-900 {
        background-image: url('@isset($setting_data['login-bg-img']){{$setting_data['login-bg-img']}}@else https://wallpaperaccess.com/full/2002264.png @endisset') !important;
        background-size: cover;
    }
</style> 

@endsection
