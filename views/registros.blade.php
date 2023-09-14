@extends ('adminsite.layout')

    @section('cabecera')
    @parent
  
    @stop

@section('ContenidoSite-01')

<div class="container">
  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-lg-offset-2">

@foreach($mensaje as $mensaje)
            <!-- View Message Block -->
            <div class="block full">
                <!-- View Message Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                
                        <a href="{{Request::server('HTTP_REFERER')}}" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Delete">ver mensajes</a>
                    </div>
                    <h2><strong>Formulario</strong> - {{$mensaje->title}}<small></small></h2>
                </div>
                <!-- END View Message Title -->

                <!-- Message Meta -->
                <table class="table table-borderless table-vcenter remove-margin">
                    <tbody>
                        <tr>
                            <td class="text-center" style="width: 80px;">
                                <a href="page_ready_user_profile.php" class="pull-left">
                                    <img src="img/placeholders/avatars/avatar<?php echo rand(1, 16); ?>.jpg" alt="Avatar" class="img-circle">
                                </a>
                            </td>
                            <td class="hidden-xs">
                                <a href="page_ready_user_profile.php"><strong>Explorer</strong></a> to <a href="page_ready_user_profile.php"><strong>Me</strong></a>
                            </td>
                            <td class="text-right"><strong>{{date('M d, Y -  H:i:s', strtotime($mensaje->created_at))}} </strong></td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <!-- END Message Meta -->

                <!-- Message Body -->


       

           

    @if($mensaje->campo1 == NULL)
  @else
  @foreach($inputs as $inputsa) 
  @if($mensaje->form_id == $inputsa->content_id)
  @if($inputsa->nombreinput == 'campo1')
  <h4><b>{{$inputsa->nombre}}</b></h4>
  <p>{{$mensaje->campo1}}</p>
  @else
  @endif
  @endif
  @endforeach 
  @endif


  @if($mensaje->campo2 == NULL)
  @else
  @foreach($inputs as $inputsa) 
  @if($mensaje->form_id == $inputsa->content_id)
  @if($inputsa->nombreinput == 'campo2')
  <h4><b>{{$inputsa->nombre}}</b></h4>
  <p>{{$mensaje->campo2}}</p>
  @else
  @endif
  @endif
  @endforeach 
  @endif


  @if($mensaje->campo3 == NULL)
  @else
  @foreach($inputs as $inputsa) 
  @if($mensaje->form_id == $inputsa->content_id)
  @if($inputsa->nombreinput == 'campo3')
  <h4><b>{{$inputsa->nombre}}</b></h4>
  <p>{{$mensaje->campo3}}</p>
  @else
  @endif
  @endif
  @endforeach 
  @endif


  @if($mensaje->campo4 == NULL)
  @else
  @foreach($inputs as $inputsa) 
  @if($mensaje->form_id == $inputsa->content_id)
  @if($inputsa->nombreinput == 'campo4')
  <h4><b>{{$inputsa->nombre}}</b></h4>
  <p>{{$mensaje->campo4}}</p>
  @else
  @endif
  @endif
  @endforeach 
  @endif


  @if($mensaje->campo5 == NULL)
  @else
  @foreach($inputs as $inputsa) 
  @if($mensaje->form_id == $inputsa->content_id)
  @if($inputsa->nombreinput == 'campo5')
  <h4><b>{{$inputsa->nombre}}</b></h4>
  <p>{{$mensaje->campo5}}</p>
  @else
  @endif
  @endif
  @endforeach 
  @endif


  @if($mensaje->campo6 == NULL)
  @else
  @foreach($inputs as $inputsa) 
  @if($mensaje->form_id == $inputsa->content_id)
  @if($inputsa->nombreinput == 'campo6')
  <h4><b>{{$inputsa->nombre}}</b></h4>
  <p>{{$mensaje->campo6}}</p>
  @else
  @endif
  @endif
  @endforeach 
  @endif


  @if($mensaje->campo7 == NULL)
  @else
  @foreach($inputs as $inputsa) 
  @if($mensaje->form_id == $inputsa->content_id)
  @if($inputsa->nombreinput == 'campo7')
  <h4><b>{{$inputsa->nombre}}</b></h4>
  <p>{{$mensaje->campo7}}</p>
  @else
  @endif
  @endif
  @endforeach 
  @endif

  
  @if($mensaje->campo8 == NULL)
  @else
  @foreach($inputs as $inputsa) 
  @if($mensaje->form_id == $inputsa->content_id)
  @if($inputsa->nombreinput == 'campo8')
  <h4><b>{{$inputsa->nombre}}</b></h4>
  <p>{{$mensaje->campo8}}</p>
  @else
  @endif
  @endif
  @endforeach 
  @endif


  @if($mensaje->campo9 == NULL)
  @else
  @foreach($inputs as $inputsa) 
  @if($mensaje->form_id == $inputsa->content_id)
  @if($inputsa->nombreinput == 'campo9')
  <h4><b>{{$inputsa->nombre}}</b></h4>
  <p>{{$mensaje->campo9}}</p>
  @else
  @endif
  @endif
  @endforeach 
  @endif


  @if($mensaje->campo10 == NULL)
  @else
  @foreach($inputs as $inputsa) 
  @if($mensaje->form_id == $inputsa->content_id)
  @if($inputsa->nombreinput == 'campo10')
  <h4><b>{{$inputsa->nombre}}</b></h4>
  <p>{{$mensaje->campo10}}</p>
  @else
  @endif
  @endif
  @endforeach 
  @endif


  @if($mensaje->campo11 == NULL)
  @else
  @foreach($inputs as $inputsa) 
  @if($mensaje->form_id == $inputsa->content_id)
  @if($inputsa->nombreinput == 'campo11')
  <h4><b>{{$inputsa->nombre}}</b></h4>
  <p>{{$mensaje->campo11}}</p>
  @else
  @endif
  @endif
  @endforeach 
  @endif


  @if($mensaje->campo12 == NULL)
  @else
  @foreach($inputs as $inputsa) 
  @if($mensaje->form_id == $inputsa->content_id)
  @if($inputsa->nombreinput == 'campo12')
  <h4><b>{{$inputsa->nombre}}</b></h4>
  <p>{{$mensaje->campo12}}</p>
  @else
  @endif
  @endif
  @endforeach 
  @endif


  @if($mensaje->campo13 == NULL)
  @else
  @foreach($inputs as $inputsa) 
  @if($mensaje->form_id == $inputsa->content_id)
  @if($inputsa->nombreinput == 'campo13')
  <h4><b>{{$inputsa->nombre}}</b></h4>
  <p>{{$mensaje->campo13}}</p>
  @else
  @endif
  @endif
  @endforeach 
  @endif


  @if($mensaje->campo14 == NULL)
  @else
  @foreach($inputs as $inputsa) 
  @if($mensaje->form_id == $inputsa->content_id)
  @if($inputsa->nombreinput == 'campo14')
  <h4><b>{{$inputsa->nombre}}</b></h4>
  <p>{{$mensaje->campo14}}</p>
  @else
  @endif
  @endif
  @endforeach 
  @endif


  @if($mensaje->campo15 == NULL)
  @else
  @foreach($inputs as $inputsa) 
  @if($mensaje->form_id == $inputsa->content_id)
  @if($inputsa->nombreinput == 'campo15')
  <h4><b>{{$inputsa->nombre}}</b></h4>
  <p>{{$mensaje->campo15}}</p>
  @else
  @endif
  @endif
  @endforeach 
  @endif


  @if($mensaje->campo16 == NULL)
  @else
  @foreach($inputs as $inputsa) 
  @if($mensaje->form_id == $inputsa->content_id)
  @if($inputsa->nombreinput == 'campo16')
  <h4><b>{{$inputsa->nombre}}</b></h4>
  <p>{{$mensaje->campo16}}</p>
  @else
  @endif
  @endif
  @endforeach 
  @endif


  @if($mensaje->campo17 == NULL)
  @else
  @foreach($inputs as $inputsa) 
  @if($mensaje->form_id == $inputsa->content_id)
  @if($inputsa->nombreinput == 'campo17')
  <h4><b>{{$inputsa->nombre}}</b></h4>
  <p>{{$mensaje->campo17}}</p>
  @else
  @endif
  @endif
  @endforeach 
  @endif


  @if($mensaje->campo18 == NULL)
  @else
  @foreach($inputs as $inputsa) 
  @if($mensaje->form_id == $inputsa->content_id)
  @if($inputsa->nombreinput == 'campo18')
  <h4><b>{{$inputsa->nombre}}</b></h4>
  <p>{{$mensaje->campo18}}</p>
  @else
  @endif
  @endif
  @endforeach 
  @endif


  @if($mensaje->campo19 == NULL)
  @else
  @foreach($inputs as $inputsa) 
  @if($mensaje->form_id == $inputsa->content_id)
  @if($inputsa->nombreinput == 'campo19')
  <h4><b>{{$inputsa->nombre}}</b></h4>
  <p>{{$mensaje->campo19}}</p>
  @else
  @endif
  @endif
  @endforeach 
  @endif

  @if($mensaje->campo20 == NULL)
  @else
  @foreach($inputs as $inputsa) 
  @if($mensaje->form_id == $inputsa->content_id)
  @if($inputsa->nombreinput == 'campo20')
  <h4><b>{{$inputsa->nombre}}</b></h4>
  <p>{{$mensaje->campo20}}</p>
  @else
  @endif
  @endif
  @endforeach 
  @endif

  @if($mensaje->email == NULL)
  @else
  <h4><b>Email</b></h4>
  <p>{{$mensaje->email}}</p>
  @endif
  







           
                <hr>
                <!-- END Message Body -->

                <!-- Attachments Row -->
                <div class="row block-section">
                    <div class="col-xs-4 col-sm-2 text-center">
                        <a href="img/placeholders/photos/photo1.jpg" data-toggle="lightbox-image">
                            <img src="img/placeholders/photos/photo1.jpg" alt="photo" class="img-responsive push-bit">
                        </a>
                        <span class="text-muted">IMG0001.JPG</span>
                    </div>
                    <div class="col-xs-4 col-sm-2 text-center">
                        <a href="img/placeholders/photos/photo2.jpg" data-toggle="lightbox-image">
                            <img src="img/placeholders/photos/photo2.jpg" alt="photo" class="img-responsive push-bit">
                        </a>
                        <span class="text-muted">IMG0002.JPG</span>
                    </div>
                    <div class="col-xs-4 col-sm-2 text-center">
                        <a href="img/placeholders/photos/photo3.jpg" data-toggle="lightbox-image">
                            <img src="img/placeholders/photos/photo3.jpg" alt="photo" class="img-responsive push-bit">
                        </a>
                        <span class="text-muted">IMG0003.JPG</span>
                    </div>
                </div>
                <!-- END Attachments Row -->

            </div>
            <!-- END View Message Block -->
        
        <!-- END View Message -->
@endforeach
</div>
  
</div>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
@stop