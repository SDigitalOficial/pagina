@if($contenido->level == 1)
@if($contenido->image == '1')

<style type="text/css">
  .product-grid{
    background-color: #fff;
    font-family: 'Work Sans', sans-serif;
    text-align: center;
    transition: all 0.3s ease 0s;
}
.product-grid:hover{ box-shadow:  0 0 20px -10px rgba(237,29,36,0.3); }
.product-grid .product-image{
    overflow: hidden;
    position: relative;
    transition: all 0.3s ease 0s;
}
.product-grid:hover .product-image{ border-radius: 0 0 30px 30px; }
.product-grid .product-image a.image{ display: block; }
.product-grid .product-image img{
    width: 100%;
    height: auto;
}
.product-image .pic-1{
    backface-visibility: hidden;
    transition: all 0.5s ease 0s;
}
.product-grid:hover .product-image .pic-1{ opacity: 0; }
.product-image .pic-2{
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    opacity: 0;
    position: absolute;
    top: 0;
    left: 0;
    transition: all 0.5s ease 0s;
}
.product-grid:hover .product-image .pic-2{ opacity: 1; }
.product-grid .product-links{
    padding: 0;
    margin: 0;
    list-style: none;
    opacity: 0;
    position: absolute;
    bottom: 0;
    right: 10px;
    transition: all 0.3s ease 0s;
}
.product-grid:hover .product-links{ opacity: 1; }
.product-grid .product-links li{
    margin: 0 0 10px 0;
    transform: rotate(360deg) scale(0);
    transition: all 0.3s ease 0s;
}
.product-grid:hover .product-links li{ transform: rotate(0) scale(1); }
.product-grid:hover .product-links li:nth-child(3){ transition-delay: 0.1s; }
.product-grid:hover .product-links li:nth-child(2){ transition-delay: 0.2s; }
.product-grid:hover .product-links li:nth-child(1){ transition-delay: 0.3s; }
.product-grid .product-links li a{
    color: #666;
    background-color: #fff;
    font-size: 18px;
    line-height: 42px;
    width: 40px;
    height: 40px;
    border-radius: 50px;
    display: block;
    transition: all 0.3s ease 0s;
}
.product-grid .product-links li a:hover{
    color: #fff;
    background-color: #ed1d24;
}
.product-grid .product-content{
    text-align: left;
    padding: 15px 10px;
}
.product-grid .rating{
    padding: 0;
    margin: 0 0 7px;
    list-style: none;
}
.product-grid .rating li{
    color: #f7bc3d;
    font-size: 13px;
}
.product-grid .rating li.far{ color: #777; }
.product-grid .title{
    font-size: 16px;
    font-weight: 600;
    text-transform: capitalize;
    margin: 0 0 6px;
}
.product-grid .title a{
    color: #555;
    transition: all 0.3s ease 0s;
}
.product-grid .title a:hover{ color: #ed1d24; }
.product-grid .price{
    color: #ed1d24;
    font-size: 18px;
    font-weight: 700;
}
@media screen and (max-width:990px){
    .product-grid{ margin: 0 0 30px; }
}
</style>

@foreach($products as $product)
 @if($product->categoriapro_id == $contenido->contents)
    <div class="col-md-3 col-sm-6">
        <div class="product-grid">
            <div class="product-image">
                <a href="#" class="image">
                    <img class="pic-1" src="{{$product->image}}">
                    <img class="pic-2" src="{{$product->image}}">
                </a>
                <ul class="product-links">
                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
       
                    <li><a href="#"><i class="fa fa-search"></i></a></li>
                </ul>
            </div>
            <div class="product-content">
               
                <h3 class="title text-center"><a href="#">{!!substr($product->name, 0, 22)!!}</a></h3>
                <div class="price"><span class="text-primary">
                 @if($product->precioivafin == $product->precioinivafin)
                  <p class="item-price text-center text-primary"><b>${{number_format($product->precioinivafin,0,",",".")}}</b></p>
                  @else
                  <p class="item-price text-center"><strike>${{number_format($product->precioivafin,0,",",".")}}</strike> <b><span class="text-primary">${{number_format($product->precioinivafin,0,",",".")}}</span></b></p>
                  @endif
                </span></div>
            </div>
        </div>
    </div>
    @elseif($contenido->contents == NULL OR $contenido->contents == '')
    <div class="col-md-3 col-sm-6">
        <div class="product-grid">
            <div class="product-image">
                <a href="#" class="image">
                    <img class="pic-1" src="{{$product->image}}">
                    <img class="pic-2" src="{{$product->image}}">
                </a>
                <ul class="product-links">
                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
       
                    <li><a href="#"><i class="fa fa-search"></i></a></li>
                </ul>
            </div>
            <div class="product-content">
               
                <h3 class="title text-center"><a href="#">{!!substr($product->name, 0, 22)!!}</a></h3>
                <div class="price"><span class="text-primary">
                 @if($product->precioivafin == $product->precioinivafin)
                  <p class="item-price text-center text-primary"><b>${{number_format($product->precioinivafin,0,",",".")}}</b></p>
                  @else
                  <p class="item-price text-center"><strike>${{number_format($product->precioivafin,0,",",".")}}</strike> <b><span class="text-primary">${{number_format($product->precioinivafin,0,",",".")}}</span></b></p>
                  @endif
                </span></div>
            </div>
        </div>
    </div>
    @endif
@endforeach

@elseif($contenido->image == '2')

<style type="text/css">
  .product-grid{
    font-family: 'Poppins', sans-serif;
    box-shadow: 0px 3px 8px -4px rgba(0, 0, 0, 0.15);
}
.product-grid .product-image{
    position: relative;
    overflow: hidden;
}
.product-grid .product-image:before{
    content: "";
    background: rgba(255, 255, 255, 0.75);
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: -100%;
    z-index: 0;
    transition: all 0.2s linear 0s;
}
.product-grid .product-image:hover:before{
   opacity: 1;
   left: 0;
}
.product-grid .product-image a.image{ display: block; }
.product-grid .product-image img{
    width: 100%;
    height: auto;
}
.product-grid .product-new-label{
    color: #fff;
    background: #a9af89;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.3px;
    padding: 5px 11px;
    border-radius: 30px;
    opacity: 1;
    position: absolute;
    top: 10px;
    right: 10px;
    transition: all .3s linear;
}
.product-grid .product-image:hover .product-new-label{ opacity: 0; }
.product-grid .social{
    padding: 0;
    margin: 0;
    list-style: none;
    transform: translateX(-50%) translateY(-50%);
    position: absolute;
    top: 50%;
    left: 50%;
}
.product-grid .social li{
    margin: 0 3px;
    display: inline-block;
    transform: scale(0);
    transition: all 0.3s;
}
.product-grid .social li:first-child{ transition-delay: 0.1s; }
.product-grid .social li:last-child{ transition-delay: 0.2s; }
.product-grid .product-image:hover .social li{ transform: scale(1); }
.product-grid .social li a{
    color: #fff;
    background: #212529;
    font-size: 20px;
    text-align: center;
    line-height: 44px;
    height: 44px;
    width: 44px;
    border-radius: 50px;
    display: block;
    transition: all 0.3s linear 0s;
}
.product-grid .social li a:hover{ background-color: #a9af89; }
.product-grid .product-content{
    padding: 12px;
    text-align: center;
}
.product-grid .title{
    font-size: 17px;
    font-weight: 600;
    text-transform: capitalize;
    margin: 0 0 7px;
}
.product-grid .title a{
    color: #666;
    transition: all 0.3s ease;
}
.product-grid .title a:hover{ color: #a9af89; }
.product-grid .price{
    color: #444;
    font-size: 19px;
    font-weight: 600;
}
.product-grid .price span{
    color: #9e9e9e;
    font-size: 16px;
    font-weight: 500;
    text-decoration: line-through;
    margin-right: 5px;
    display: inline-block;
}
@media screen and (max-width:990px){
    .product-grid{ margin: 0 0 30px; }
}
</style>


       @foreach($products as $product)
        @if($product->categoriapro_id == $contenido->contents)
        @if($product->position == '1')
        <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                 
                        <img class="pic-1 img-responsive" src="/{{$product->image}}">
                        <span style="margin-top:-190px; position: absolute; margin-left:0px; text-align: center; color: #000; font-weight:bold; background: white; padding: 20px 100px">AGOTADO</span>
                   
                </div>
                <div class="product-content">
                    <h3 class="title text-primary"><a class="text-primary" href="#"><span class="text-primary">{{$product->name}}</span></a></h3>
                    <div class="price">${{number_format($product->precioinivafin,0,",",".")}}</div>
                </div>
            </div>
        </div>
        @else
        <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#" class="image">
                        <img class="pic-1 img-responsive" src="{{$product->image}}">
                    </a>
                    <ul class="social">
                        <li><a href="{{ route('cart-add', $product->slug)}}"><i class="fa fa-shopping-bag"></i></a></li>
                        <li><a href="{{ route('product-detail', $product->slug)}}"><i class="fa fa-search"></i></a></li>
                    </ul>
                </div>
                <div class="product-content">
                    <h3 class="title text-primary"><a class="text-primary" href="#"><span class="text-primary">{{$product->name}}</span></a></h3>
                    <div class="price">${{number_format($product->precioinivafin,0,",",".")}}</div>
                </div>
            </div>
        </div>
        @endif
       @elseif($contenido->contents == NULL OR $contenido->contents == '')
       @if($product->position == '1')
        <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                 
                        <img class="pic-1 img-responsive" src="/{{$product->image}}">
                        <span style="margin-top:-190px; position: absolute; margin-left:0px; text-align: center; color: #000; font-weight:bold; background: white; padding: 20px 100px">AGOTADO</span>
                   
                </div>
                <div class="product-content">
                    <h3 class="title text-primary"><a class="text-primary" href="#"><span class="text-primary">{{$product->name}}</span></a></h3>
                    <div class="price">${{number_format($product->precioinivafin,0,",",".")}}</div>
                </div>
            </div>
        </div>
        @else
        <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#" class="image">
                        <img class="pic-1 img-responsive" src="{{$product->image}}">
                    </a>
                    <ul class="social">
                        <li><a href="{{ route('cart-add', $product->slug)}}"><i class="fa fa-shopping-bag"></i></a></li>
                        <li><a href="{{ route('product-detail', $product->slug)}}"><i class="fa fa-search"></i></a></li>
                    </ul>
                </div>
                <div class="product-content">
                    <h3 class="title text-primary"><a class="text-primary" href="#"><span class="text-primary">{{$product->name}}</span></a></h3>
                    <div class="price">${{number_format($product->precioinivafin,0,",",".")}}</div>
                </div>
            </div>
        </div>
        @endif
        @endif
            @endforeach


@endif


@else
@endif