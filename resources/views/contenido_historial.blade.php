<div class="row">
	<table class="table table-striped table-dark">
	  <thead>
	    <tr>
	      <th scope="col">Fecha Consulta</th>
	      <th scope="col">Paciente</th>
	      <th scope="col">Servicio</th>
	      <th scope="col">Medico</th>
	      <th scope="col">Costo Servicio</th>
	      <th scope="col">Opciones</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@if(!empty($datos))
		    @foreach($datos as $dato)
	    		<tr>
				    <td>{{$dato->fecha}}</td>
				    <td>{{$dato->paciente}}</td>
				    <td>{{$dato->servicio}}</td>
				    <td>{{$dato->medico}}</td>
				    <td>{{$dato->costo_servicio}}</td>
				    <td><div>
				    	<a class="fa fa-cog" title="Editar" style="color: white; padding-right: 5px;" href="{{route('editar_hora', $dato->id)}}"></a>
				    	<a class="fa fa-trash-alt" title="Eliminar" onclick="return confirm('Seguro que desea Eliminar?')" style="color: white;" href="{{route('eliminar_hora', $dato->id)}}"></a>
				    </div></td>
				</tr>
			@endforeach
		@else
			<tr>
				<td>No hay información registrada</td>
			</tr>
		@endif
	  </tbody>
	</table>
</div>
<h1> Ganacias Totales : ${{$total}}</h1>