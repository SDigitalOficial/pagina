 @if($contenido->level == 1)

   <style type="text/css">
      
    /* quick grid */


/* Bootstrap-style columns */
.column {
  position: relative;
  float: left;
  min-height: 1px;
  width: 25%;
  padding-left: 4px;
  padding-right: 4px;
  
  /* Space between tiles */
  margin-top: 8px;
}

.col-span {
  width: 50%;
}

.my-sizer-element {
  width: 8.33333%;
}

/* default styles so shuffle doesn't have to set them (it will if they're missing) */
.my-shuffle {
  position: relative;
  overflow: hidden;
}

/* Ensure images take up the same space when they load */
/* https://vestride.github.io/Shuffle/images */
.aspect {
  position: relative;
  width: 100%;
  height: 0;
  padding-bottom: 100%;
  overflow: hidden;
}

.aspect__inner {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
}

.aspect--16x9 {
  padding-bottom: 56.25%;
}

.aspect--9x80 {
  padding-bottom: calc(112.5% + 8px);
}

.aspect--32x9 {
  padding-bottom: calc(28.125% - 3px);
}


/* Small reset */
*,
::before,
::after {
  box-sizing: border-box;
}

figure {
  margin: 0;
  padding: 0;
}
figure:nth-child(2n){
  margin-bottom:30px;
} 
figure:nth-child(2n+1){
  margin-top:30px;
} 

    </style>

<div class="text-center">
<div class="btn-group btn-group-lg">
<button type="button" class="btn btn-primary"  id='all'>All</button>
@foreach($shuffle as $shufflewe)
@if($contenido->id == $shufflewe->content_id)
<button type="button" class="btn btn-primary" id='{{$shufflewe->categoria_slug}}'>{{$shufflewe->categoria}}</button>
@else
@endif
@endforeach
</div>
</div>

<div class="row my-shuffle-container">
  @foreach($shuffleimg as $shuffleimg )
  <div class="col-lg-4 picture-item column" data-groups='["{{$shuffleimg->shuffle_id}}"]'>
    <div class="aspect aspect--16x9">
      <div class="aspect__inner ">
        <img src="{{$shuffleimg->imagealcl}}" alt="A close, profile view of a crocodile looking directly into the camera" />
      </div>
    </div>
  </div>
  @endforeach
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://unpkg.com/shufflejs@5"></script> 

<script type="text/javascript">
  var Shuffle = window.Shuffle;
var element = document.querySelector('.my-shuffle-container');
var sizer = element.querySelector('.my-sizer-element');

var shuffleInstance = new Shuffle(element, {
  itemSelector: '.picture-item',
  sizer: sizer // could also be a selector: '.my-sizer-element'
});
// shuffleInstance.filter('animal');
$("#all").on("click", function(){
   shuffleInstance.filter();
});
@foreach($shuffle as $shuffled)
$("#{{$shuffled->categoria_slug}}").on("click", function(){
   shuffleInstance.filter('{{$shuffled->categoria_slug}}');
});
@endforeach

</script>

@else
@endif