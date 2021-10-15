@section('unix::lg.changer.logo')

@isset($setting_data['logourl'])@if($setting_data['logourl'] == 1) 

@else
<script> 


const intervals = setInterval(function() {
   
   document.getElementById('logo').src='@isset($setting_data['logourl']){{$setting_data['logourl']}} @else {{ config('unix.websitelogo') }} @endisset' 

  }, 22); 
</script>

 @endif
@endisset


@isset($setting_data['enableloginimg'])@if($setting_data['enableloginimg'] == 1) 
<script>
setTimeout(
    function() {
		document.getElementById('logo').style.display='none';
    }, 20);

    const interval = setInterval(function() {
   
	document.getElementById('logo').style.display='none';

   }, 10); 
</script>
<style>.jbDTOK {padding: 1.5rem;}</style>
@else

@endif
@endisset

@endsection
