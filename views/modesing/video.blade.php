 @if($contenido->level == 1)
<div class="homepage-hero-module">
    <div class="video-container">
       <div class="description">
                <div class="inner">{!!$contenido->content!!}</div>
            </div>
        <div class="filter"></div>

        <video autoplay loop class="fillWidth">
            <source src="https://video-vh.s3.envato.com/h264-video-previews/a310b19e-e2ec-4ed5-8809-00c037fa1e4a/7986399.mp4" type="video/mp4" />Your browser does not support the video tag. I suggest you upgrade your browser.
            <source src="Browsing.webm" type="video/webm" />Your browser does not support the video tag. I suggest you upgrade your browser.
        </video>
        <div class="poster hidden">
            <img src="Browsing.jpg" alt="">
        </div>
    </div>
</div>
@else
@endif