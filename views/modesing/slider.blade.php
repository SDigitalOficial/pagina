 @if($contenido->level == 1)
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <!-- CLIENT SLIDER STARTS-->
                <div class="carousel slide clients-carousel" id="clients-slider">
                    <div class="carousel-inner">
                        <div class="item  active">
                            <div class="row">
                                <div class="col-md-3">
                                    <a class="thumbnail" href="#">
                                        <img src="assets/img/one.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a class="thumbnail" href="#">
                                        <img src="assets/img/two.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a class="thumbnail" href="#">
                                        <img src="assets/img/three.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a class="thumbnail" href="#">
                                        <img src="assets/img/four.jpg" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                  
                        <div class="item">
                            <div class="row">
                                <div class="col-md-3">
                                    <a class="thumbnail" href="#">
                                        <img src="assets/img/one.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a class="thumbnail" href="#">
                                        <img src="assets/img/two.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a class="thumbnail" href="#">
                                        <img src="assets/img/three.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a class="thumbnail" href="#">
                                        <img src="assets/img/four.jpg" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a data-slide="prev" href="#clients-slider" class="left carousel-control">‹</a>
                    <a data-slide="next" href="#clients-slider" class="right carousel-control">›</a>
                </div>
                <!-- CLIENT SLIDER ENDS-->
            </div>
        </div>

    </div>


<script>
        $(document).ready(function () {
            $("#clients-slider").carousel({
                interval: 2000 //TIME IN MILLI SECONDS
            });
        });
    </script>

@else
@endif