 @if($contenido->level == 1)
<div class="totalpad">
    <div class="row">
        <div class="col-md-12">
            <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
            <!-- Carousel indicators -->
          
            <!-- Wrapper for carousel items -->
            <div class="carousel-inner">
                <div class="item carousel-item active">
                    <div class="row">
                        @foreach($products->slice(0, 4) as $products)
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                            <div class="thumb-wrapper">
                                <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                <div class="img-box">
                                    <img src="{{$products->image}}" class="img-responsive img-fluid center-block" alt="{{$contenido->title}}" title="{{$contenido->title}}">                                 
                                </div>
                                <div class="thumb-content">
                                    <h4>{{$products->name}}</h4>
                                    @if($products->precioivafin == $products->precioinivafin)
                                    <b>${{number_format($products->precioinivafin,0,",",".")}}</b>
                                    @else
                                    <p class="item-price"><strike>${{number_format($products->precioivafin,0,",",".")}}</strike> <b>${{number_format($products->precioinivafin,0,",",".")}}</b></p>
                                    @endif                             
                                    <div class="star-rating">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                        </ul>
                                    </div>
                                    <a href="{{ route('product-detail', $products->slug)}}" class="btn btn-primary">Ver Producto</a>
                                </div>                      
                            </div>
                        </div>
                        @endforeach
                      
                            
                                          
                        
                    </div>
                </div>
                <div class="item carousel-item">
                    <div class="row">
                        @foreach($productsa->slice(0, 4) as $products)
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                            <div class="thumb-wrapper">
                                <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                <div class="img-box">
                                    <img src="{{$products->image}}" class="img-responsive img-fluid center-block" alt="{{$contenido->title}}" title="{{$contenido->title}}">
                                </div>
                                <div class="thumb-content">
                                    <h4>{{$products->name}}</h4>
                                    @if($products->precioivafin == $products->precioinivafin)
                                    <b>${{number_format($products->precioinivafin,0,",",".")}}</b>
                                    @else
                                    <p class="item-price"><strike>${{number_format($products->precioivafin,0,",",".")}}</strike> <b>${{number_format($products->precioinivafin,0,",",".")}}</b></p>
                                    @endif
                                    <div class="star-rating">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                        </ul>
                                    </div>
                                    <a href="{{ route('product-detail', $products->slug)}}" class="btn btn-primary">Ver Producto</a>
                                </div>                      
                            </div>
                        </div>
                        @endforeach                   
                    </div>
                </div>
                <div class="item carousel-item">
                    <div class="row">
                    @foreach($productse->slice(0, 4) as $products)
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                            <div class="thumb-wrapper">
                                <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                <div class="img-box">
                                    <img src="{{$products->image}}" class="img-responsive img-fluid center-block" alt="">
                                </div>
                                <div class="thumb-content">
                                    <h4>{{$products->name}}</h4>
                                    @if($products->precioivafin == $products->precioinivafin)
                                   <b> ${{number_format($products->precioinivafin,0,",",".")}}</b>
                                    @else
                                    <p class="item-price"><strike>${{number_format($products->precioivafin,0,",",".")}}</strike> <b>${{number_format($products->precioinivafin,0,",",".")}}</b></p>
                                    @endif
                                    <div class="star-rating">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                        </ul>
                                    </div>
                                    <a href="{{ route('product-detail', $products->slug)}}" class="btn btn-primary">Ver Producto</a>
                                </div>                      
                            </div>
                        </div>
                        @endforeach
             
                        
                    </div>
                </div>
            </div>
            <!-- Carousel controls -->
            <a class="carousel-control left carousel-control-prev arcontrol" href="#myCarousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control right carousel-control-next arcontrolright" href="#myCarousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
        </div>
    </div>
</div>

@else
@endif