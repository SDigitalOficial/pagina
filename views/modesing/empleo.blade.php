<div class="table-responsive">
  <table class="table empleos">
    <thead>
      <tr>
         <th class="text-center">
        Imagen
        </th>
        <th class="text-center">
          Oferta laboral
        </th>
        <th class="text-center">
          Ciudad
        </th>
        <th class="text-center">
          Fecha Publicación
        </th>
        <th class="text-center">
         Área
        </th>
        <th class="text-center">
        Ver oferta
        </th>
      </tr>
    </thead>
    <tbody>
        @foreach($empleos as $empleos)
      <tr>
        <td class="text-center">
         <i class="fas fa-briefcase"></i>
        </td>
        <td class="text-center">
          {{$empleos->titulo_emp}}
        </td>
        <td class="text-center">
           {{$empleos->ciudad_emp}}
        </td>
        <td class="text-center">
          {{$empleos->fecha_emp}}
        </td>
         <td class="text-center">
           {{$empleos->area_emp}}
        </td>
          <td class="text-center">
          <a href="oferta/{{$empleos->titulo_empslug}}"> Ver oferta</a>
        </td>
      </tr>

 @endforeach
    </tbody>
  </table>
</div>

 