 @if($contenido->level == 1)
<div class="nav-side-menu">
    <div class="brand">Categorias</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">
            @foreach($menu as $paginas)
            @if($paginas->sitio == 2)
             @if($paginas->nivel == 1)
                <li>
                  <a href="#">
                  {{$paginas->slug}}
                  </a>
                </li>
                 @elseif($paginas->nivel == 2)
                <li  data-toggle="collapse" data-target="#{{$paginas->id}}" class="collapsed {{set_active($paginas->page)}}">
                 {{$paginas->page}} <span class="arrow"></span>
                </li>
              
                @if($paginas->id == $cama->page_id)
                <ul class="sub-menu collapse in" id="{{$paginas->id}}">
                   @foreach($paginas->subpaginas->take(20) as $subcategory)
               <li class="{{set_active($subcategory->page)}}">{{link_to($subcategory->slug, $subcategory->page)}}</li>
                 @endforeach
                 </ul> 
                 @elseif($paginas->id == $cama->id)
                  <ul class="sub-menu collapse in" id="{{$paginas->id}}">
                   @foreach($paginas->subpaginas->take(20) as $subcategory)
               <li>{{link_to($subcategory->slug, $subcategory->page)}}</li>
                 @endforeach
                 </ul> 
               @else

                  <ul class="sub-menu collapse" id="{{$paginas->id}}">
                   @foreach($paginas->subpaginas->take(20) as $subcategory)
               <li>{{link_to($subcategory->slug, $subcategory->page)}}</li>
                 @endforeach
                 </ul> 
               @endif
            
                      
              @endif
              @elseif($paginas->sitio == 3)
               @if($paginas->nivel == 1)
                <li>
                  <a href="#">
                   {{$paginas->page}}
                  </a>
                </li>
                 @elseif($paginas->nivel == 2)
                <li  data-toggle="collapse" data-target="#{{$paginas->id}}" class="collapsed">
                   {{$paginas->page}} <span class="arrow"></span>
                </li>
                <ul class="sub-menu collapse" id="{{$paginas->id}}">
                   @foreach($paginas->subpaginas->take(20) as $subcategory)
               <li>{{link_to($subcategory->slug, $subcategory->page)}}</li>
              @endforeach
                </ul>       
              @endif
              @endif
                @endforeach
            </ul>
            </div>
</div>
@endif