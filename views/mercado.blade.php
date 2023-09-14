

@extends ('adminsite.layout')
 

  @section('ContenidoSite-01')

 <div class="content-header">
     <ul class="nav-horizontal text-center">
      <li>
       <a href="/gestion/paginas"><i class="fa fa-file-text"></i> Ver páginas</a>
      </li>
      <li>
       <a href="/gestion/paginas/crear"><i class="fa fa-file-o"></i> Crear página</a>
      </li>      
      <li class="active">
       <a href="/consulta/formularios"><i class="fa fa-commenting-o"></i> Registros <span class="badge">{{$conteo}}</span></a>
      </li>
     
     </ul>
    </div>





<div class="container">

<div class="container-fluid pull-right">

<button class="btn btn-primary" onclick="generate()">Descargar PDF</button>
<button class="btn btn-primary saveAsExcel">Descargar xlsx</button> 
<button class="btn btn-primary " onclick="exportTableToExcel('example-datatable', 'members-data')">Descargar xls</button>
   
 </div> 
<br><br><br>

 <div class="block full">
                            <div class="block-title">
                                <h2><strong>Registros</strong> digitales</h2>
                            </div>
      
 <div class="block center-block" style="background: #efefef; padding-bottom: 24px">
   <form action="{{URL::current()}}">
  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-10">
<select name="formulario" id="input" class="form-control" >
   <option value=""  selected="selected" disabled>Seleccione formulario</option>
  @foreach($contenido as $contenidos)
    <option value="{{$contenidos->id}}">{{$contenidos->title}}</option>
@endforeach
</select>
</div>
<button class="btn btn-primary">Generar filtro</button>
</form>
</div>



                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                          <th>ID</th>
                                          @foreach($plantilla as $plantilla)
                                          @if($plantilla->nombreinput == 'campo1')
                                          <th>{{$plantilla->nombre}}</th>
                                          @else
                                          @endif
                                           @if($plantilla->nombreinput == 'campo2')
                                          <th>{{$plantilla->nombre}}</th>
                                          @else
                                          @endif
                                            @if($plantilla->nombreinput == 'campo3')
                                          <th>{{$plantilla->nombre}}</th>
                                          @else
                                          @endif
                                          @if($plantilla->nombreinput == 'campo4')
                                          <th>{{$plantilla->nombre}}</th>
                                          @else
                                          @endif
                                          @if($plantilla->nombreinput == 'campo5')
                                          <th>{{$plantilla->nombre}}</th>
                                          @else
                                          @endif
                                          @if($plantilla->nombreinput == 'campo6')
                                          <th>{{$plantilla->nombre}}</th>
                                          @else
                                          @endif
                                          @if($plantilla->nombreinput == 'campo7')
                                          <th>{{$plantilla->nombre}}</th>
                                          @else
                                          @endif
                                          @if($plantilla->nombreinput == 'campo8')
                                          <th>{{$plantilla->nombre}}</th>
                                          @else
                                          @endif
                                          @if($plantilla->nombreinput == 'campo9')
                                          <th>{{$plantilla->nombre}}</th>
                                          @else
                                          @endif
                                          @if($plantilla->nombreinput == 'campo10')
                                          <th>{{$plantilla->nombre}}</th>
                                          @else
                                          @endif
                                          @endforeach
                                          <th>Estado</th>
                                          <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                         @foreach($respuesta as $respuesta)
                                
  <tr>
     <td>{{$respuesta->id}}</td>
  @if($respuesta->campo1 == NULL)
  @else

  <td>{{$respuesta->campo1}}</td>
  @endif
   @if($respuesta->campo2 == NULL)
  @else
  <td>{{$respuesta->campo2}}</td>
  @endif
   @if($respuesta->campo3 == NULL)
  @else
  <td>{{$respuesta->campo3}}</td>
  @endif
   @if($respuesta->campo4 == NULL)
  @else
  <td>{{$respuesta->campo4}}</td>
  @endif
   @if($respuesta->campo5== NULL)
  @else
  <td>{{$respuesta->campo5}}</td>
  @endif
   @if($respuesta->campo6 == NULL)
  @else
  <td>{{$respuesta->campo6}}</td>
  @endif
   @if($respuesta->campo7 == NULL)
  @else
  <td>{{$respuesta->campo7}}</td>
  @endif
   @if($respuesta->campo8 == NULL)
  @else
  <td>{{$respuesta->campo8}}</td>
  @endif
   @if($respuesta->campo9 == NULL)
  @else
  <td>{{$respuesta->campo9}}</td>
  @endif
   @if($respuesta->campo10 == NULL)
  @else
  <td>{{$respuesta->campo10}}</td>
  @endif
   @if($respuesta->campo11 == NULL)
  @else
  <td>{{$respuesta->campo11}}</td>
  @endif
   @if($respuesta->campo12 == NULL)
  @else
  <td>{{$respuesta->campo12}}</td>
  @endif
   @if($respuesta->campo13 == NULL)
  @else
  <td>{{$respuesta->campo13}}</td>
  @endif
   @if($respuesta->campo14 == NULL)
  @else
  <td>{{$respuesta->campo14}}</td>
  @endif
   @if($respuesta->campo15 == NULL)
  @else
  <td>{{$respuesta->campo15}}</td>
  @endif
   @if($respuesta->campo16 == NULL)
  @else
  <td>{{$respuesta->campo16}}</td>
  @endif
   @if($respuesta->campo17 == NULL)
  @else
  <td>{{$respuesta->campo17}}</td>
  @endif
   @if($respuesta->campo18 == NULL)
  @else
  <td>{{$respuesta->campo18}}</td>
  @endif
   @if($respuesta->campo19 == NULL)
  @else
  <td>{{$respuesta->campo19}}</td>
  @endif
   @if($respuesta->campo20 == NULL)
  @else
  <td>{{$respuesta->campo20}}</td>
  @endif
    @if($respuesta->email == NULL)
  @else
  <td>{{$respuesta->email}}</td>
  @endif
  @if($respuesta->estado == 0)
  <td><span class="label label-warning">No visto</span></td>
  @else
  <td><span class="label label-success">Visto</span></td>
  @endif
  <td class="text-center"><a href="/gestion/registro/ver-registro/{{$respuesta->id}}"><span id="tip" data-toggle="tooltip" data-placement="right" title="Ver registro" class="btn btn-success"><i class="gi gi-eye_open"></i></span></a>
    <script language="JavaScript">
                 function confirmar ( mensaje ) {
                 return confirm( mensaje );}
                 </script>
  <a href="/gestion/registro/eliminar-registro/{{$respuesta->id}}" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')"><span id="tip" data-toggle="tooltip" data-placement="right" title="Ver registro" class="btn btn-danger"><i class="gi gi-eye_open"></i></span></a>
  </td>
  </tr>

  @endforeach
                                       
                                      
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END Datatables Content -->




</div>

</body>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="/adminsite/js/pages/tablesDatatables.js"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="/este.js"></script>
<script src="https://unpkg.com/jspdf-autotable@2.3.2"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2014-11-29/FileSaver.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.12.13/xlsx.full.min.js"></script>

<script type="text/javascript">
 $(document).ready(function(){
 $(".saveAsExcel").click(function(){
 var workbook = XLSX.utils.book_new();
 //var worksheet_data  =  [['hello','world']];
 //var worksheet = XLSX.utils.aoa_to_sheet(worksheet_data);
 var worksheet_data  = document.getElementById("example-datatable");
 var worksheet = XLSX.utils.table_to_sheet(worksheet_data);
 workbook.SheetNames.push("Test");
 workbook.Sheets["Test"] = worksheet;
 exportExcelFile(workbook);
 });
 })
 function exportExcelFile(workbook) {
 return XLSX.writeFile(workbook, "bookName.xlsx");
 }
</script>

<script type="text/javascript">
 function generate() {
 var doc = new jsPDF('p', 'pt');
 var res = doc.autoTableHtmlToJson(document.getElementById("example-datatable"));
 doc.autoTable(res.columns, res.data, {
 margin: {top: 80},
 headerStyles: {
 fillColor: [30, 193, 184],
 fontSize: 11
 },
 });
 var header = function(data) {
 doc.setFontSize(18);
 doc.setTextColor(40);
 doc.setFontStyle('normal');
 //doc.addImage(headerImgData, 'JPEG', data.settings.margin.left, 20, 50, 50);
 doc.text("Testing Report", data.settings.margin.left, 50);
 };
 var options = {
 beforePageContent: header,
 margin: {
 top: 80
 },
 startY: doc.autoTableEndPosY() + 20
 };
 doc.save("table.pdf");
 }
</script>

<script type="text/javascript">
 function exportTableToExcel(tableID, filename = ''){
 var downloadLink;
 var dataType = 'application/vnd.ms-excel';
 var tableSelect = document.getElementById(tableID);
 var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
 // Specify file name
 filename = filename?filename+'.xls':'excel_data.xls';
 // Create download link element
 downloadLink = document.createElement("a");
 document.body.appendChild(downloadLink);
 if(navigator.msSaveOrOpenBlob){
 var blob = new Blob(['ufeff', tableHTML], {
 type: dataType
 });
 navigator.msSaveOrOpenBlob( blob, filename);
 }else{
 // Create a link to the file
 downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
 // Setting the file name
 downloadLink.download = filename;
 //triggering the function
 downloadLink.click();
 }
 }
</script>
 <script>
   $(document).ready (function () {
   $('.delete').click (function () {
   if (confirm("¿ Está seguro de que desea eliminar ?")) {
   var id = $(this).attr ("title");
   document.location.href='paginas/delete/'+id;}});});
  </script> 

  @stop

