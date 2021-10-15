@section('unix::lg.background.video')
<script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.3.1/velocity.min.js"></script>
<div class="fullscreen-video-background">
		<div class="_pattern-overlay"></div>
		<div id="_buffering-background"></div>
		<div id="_youtube-iframe-wrapper">
			<div id="_youtube-iframe" data-youtubeurl="@isset($setting_data['login-bg-youtube']){{$setting_data['login-bg-youtube']}}@else edYCtaNueQY @endisset"></div>
		</div>
	</div>
	<style>

		/*/
///////////////////////////
/*/
@media only screen and (min-width: 1250px) {
	.body {
	background-color: transparent !important;
}
 .fullscreen-video-background {
	 background: #000;
	 position: absolute;
	 width: 100%;
	 z-index: -99;
	 overflow: hidden;
	 height: 100vh;
}
 .fullscreen-video-background ._pattern-overlay {
	 position: absolute;
	 top: 0;
	 width: 100%;
	 opacity: 0.15;
	 bottom: 0;
	 z-index: 2;
}
 .fullscreen-video-background #_buffering-background {
	 position: absolute;
	 width: 100%;
	 top: 0;
	 bottom: 0;
	 background: #222;
	 z-index: 1;
}
 .fullscreen-video-background #_youtube-iframe-wrapper {
	 display: flex;
	 justify-content: center;
	 align-items: center;
	 width: 100%;
	 position: absolute;
	 height: 100%;
}
 .fullscreen-video-background #_youtube-iframe-wrapper #_youtube-iframe {
	 position: absolute;
	 pointer-events: none;
	 margin: 0 auto;
	 height: 300vh;
	 width: 120vw;
}
}
@media only screen and (max-width: 1250px) {
  .bg-neutral-900 {
    background-image: url('@isset($setting_data['login-bg-img']){{$setting_data['login-bg-img']}}@else https://wallpaperaccess.com/full/2002264.png @endisset') !important;
    background-size: cover;
    }
  .fullscreen-video-background {
	display: none;
}
 .fullscreen-video-background ._pattern-overlay {
	display: none;
}
 .fullscreen-video-background #_buffering-background {
	display: none;
}
 .fullscreen-video-background #_youtube-iframe-wrapper {
	display: none;
}
 .fullscreen-video-background #_youtube-iframe-wrapper #_youtube-iframe {
	 display: none;
}

}
 
	</style>
<script>
    		// 2. This code loads the Youtube IFrame Player API code asynchronously.
		var tag = document.createElement('script');
		tag.src = "https://www.youtube.com/iframe_api";
		var firstScriptTag = document.getElementsByTagName('script')[0];
		firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
	
		// 3. This function creates an <iframe> (and YouTube player)
		//    after the API code downloads.
		var youtubePlayer;
		var _youtube_id = document.getElementById('_youtube-iframe');
		
		function onYouTubeIframeAPIReady() {				
			youtubePlayer = new YT.Player('_youtube-iframe', {
				videoId: _youtube_id.dataset.youtubeurl,
				playerVars: { // https://developers.google.com/youtube/player_parameters?playerVersion=HTML5
					cc_load_policy: 0, // closed caption
					controls: 0,
					disablekb: 0, //disable keyboard
					iv_load_policy: 3, // annotations
					playsinline: 1, // play inline on iOS
					rel: 0, // related videos
					showinfo: 0, // title
					modestbranding: 3 // youtube logo
				},
				events: {
					'onReady': onYoutubePlayerReady,
					'onStateChange': onYoutubePlayerStateChange
				}
			});
		}
		
		function onYoutubePlayerReady(event) {
			event.target.mute();
			event.target.playVideo();				
		}
	
		function onYoutubePlayerStateChange(event) {
			if (event.data == YT.PlayerState.PLAYING) { // fade out #_buffering-background
				Velocity(document.getElementById('_buffering-background'), { opacity: 0 }, 500);
			}
			
			if (event.data == YT.PlayerState.ENDED) { // loop video
				event.target.playVideo();
			}
		}
</script>

@endsection
