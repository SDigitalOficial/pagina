 @if($contenido->level == 1)

	<link rel="stylesheet" href="vimodal/css/modal-video.min.css">

	@if($contenido->content == 1)
	<img src="{{$contenido->image}}" class="js-video-button img-responsive" title="{{$contenido->title}}" alt="{{$contenido->title}}" data-video-id='{{$contenido->contents}}'>

	@elseif($contenido->content == 2)
	<img src="{{$contenido->image}}" class="js-video-button img-responsive" alt="{{$contenido->title}}" title="{{$contenido->title}}" data-video-id='{{$contenido->contents}}' data-channel="vimeo">
	 
	@elseif($contenido->content == 3)
	<img src="{{$contenido->image}}" class="js-video-button img-responsive" data-channel="facebook"data-video-id="{{$contenido->contents}}" alt="{{$contenido->title}}" title="{{$contenido->title}}">

	@elseif($contenido->content == 4)
	<img src="{{$contenido->image}}" class="js-video-button img-responsive" data-channel="video" data-video-url="{{$contenido->contents}}" alt="{{$contenido->title}}" title="{{$contenido->title}}">

	@endif

	<script
	src="//code.jquery.com/jquery-2.2.4.min.js"
	integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
	crossorigin="anonymous"></script>
	<script src="vimodal/js/jquery-modal-video.min.js"></script>
	<script>
		$(".js-video-button").modalVideo({
			youtube:{
				autoplay:1,
				nocookie: true
			}
		});
	</script>

@else
@endif