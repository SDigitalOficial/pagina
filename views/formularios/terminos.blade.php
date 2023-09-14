@if($formulario->requerido == 1)
<div class="{{$formulario->respon}}">
                             <div class="row">
                               <div class="form-group col-md-12">
                                <label class="checkbox-inline">
                                  <div class="col-md-12">
                                     <input type="checkbox" id="terms" name="{{$formulario->nombreinput}}" id="{{$formulario->nombreinput}}">Aceptar términos y condiciones <a data-toggle="modal" href='#modal-id'>Ver términos y condiciones</a> </label>
                                  </div>
                               </div>
                              <div class="modal fade" id="modal-id">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                      <h4 class="modal-title">Términos y condiciones</h4>
                                    </div>
                                    <div class="modal-body">
                                      <div class="container-fluid">
                                        @foreach($plantillaes as $plantilla)
                                         {{$plantilla->terminos}}
                                        @endforeach
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                             </div>
                           </div>

@else
<div class="{{$formulario->respon}}">
                             <div class="row">
                               <div class="form-group col-md-12">
                                <label class="checkbox-inline">
                                  <div class="col-md-12">
                                     <input type="checkbox" id="terms" name="{{$formulario->nombreinput}}" required="required" id="{{$formulario->nombreinput}}">Aceptar términos y condiciones <a data-toggle="modal" href='#modal-id'>Ver términos y condiciones</a> </label>
                                  </div>
                               </div>
                              <div class="modal fade" id="modal-id">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                      <h4 class="modal-title">Términos y condiciones</h4>
                                    </div>
                                    <div class="modal-body">
                                      <div class="container-fluid">
                                        @foreach($plantillaes as $plantilla)
                                         {{$plantilla->terminos}}
                                        @endforeach
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                             </div>
                           </div>
                            @endif

