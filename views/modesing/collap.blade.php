 @if($contenido->level == 1)



<style type="text/css">
  .panel-title a:after {
    font-family:Fontawesome;
    content:'\f107';
    float:right;
    font-size:25px;
    font-weight:300;
}
.panel-title a.collapsed:after {
    font-family:Fontawesome;
    content:'\f105';

}
</style>


            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              @foreach($contenidona as $contenidona)
                <div class="panel panel-default">
                  
                    <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title"> 
                          <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#{{$contenidona->slug}}" aria-expanded="false" aria-controls="collapseThree"> {{$contenidona->titlecl}} </a> 
                        </h4>
                    </div>
                    <div id="{{$contenidona->slug}}" class="panel-collapse collapse {{$contenidona->state}}" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">  {!!$contenidona->contentcl!!} </div>
                    </div>
                </div>
                @endforeach
            </div>
@else
@endif


