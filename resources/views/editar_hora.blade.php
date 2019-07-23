@extends('main.index')

@section('contenido')
<section class="content">
	{!!Form::open(['route'=> ['update_hora'],'method'=>'POST','files'=>true, 'id' => 'form', 'style' => 'padding-top: 20px;'])!!}
		<h1>Editar Consulta Dental</h1>
	<div class="box-body">
		<div class="row">
			<div class="col-md-3">
				<strong>Servicio</strong>
		  	</div>
		  	<div class="col-md-6">
				{!!Form::select('servicio',
	                [null=>'Seleccione Servicio'] + $servicios,
	                $hora->id_service,
	                [
	                    'id'=>'selector_servicio',
	                    'class'=>'form-control',
	                ]
	            )!!}
		  	</div>
		  	<div class="col-md-3"></div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<strong>Medico Tratante</strong>
		  	</div>
		  	<div class="col-md-6">
				{!!Form::select('medico',
	                [null=>'Seleccione Medico Tratante'] + $medicos,
	                $hora->id_dentist,
	                [
	                    'id'=>'selector_medico',
	                    'class'=>'form-control',
	                ]
	            )!!}
		  	</div>
		  	<div class="col-md-3"></div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<strong>Nombre Paciente</strong>
		  	</div>
		  	<div class="col-md-6">
				{!!Form::select('paciente',
	                [null=>'Seleccione Paciente'] + $pacientes,
	                $hora->id_patient,
	                [
	                    'id'=>'selector_paciente',
	                    'class'=>'form-control',
	                ]
	            )!!}
		  	</div>
		  	<div class="col-md-3"></div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<strong>Costo Servicio</strong>
		  	</div>
		  	<div class="col-md-6">
				{!!Form::text('costo_servicio', $hora->price,
	                [
	                    'id'=>'costo_servicio',
	                    'class'=>'form-control',
	                    'placeholder'=>'$100000',
	                ]
	            )!!}
		  	</div>
		  	<div class="col-md-3"></div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<strong>Fecha Servicio</strong>
		  	</div>
			<div class="col-md-6">
			    {!!Form::text('fecha_servicio',
                     $hora->date ,
                    [
                        'placeholder'=>'Fecha Servicio',
                        'id'=>'fecha_servicio',
                        'class'=>'form-control input-sm',
                        'onfocus'=>'blur()',
                    ]
                )!!}
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">	
			</div>
			<div align="right" class="col-md-6">
				<button class="btn-info" onclick="submit_form()">Guardar</button>
			</div>
		</div>
	</div>
	{!!Form::hidden('id_hora', $hora->id_appointment, [ 'id'=>'id_hora', 'class'=>'form-control'])!!}
	{!!Form::close()!!}
	<div id="obtener_precio" data-field-id="{!! urldecode(route('obtener_precio', 'id_servicio'))!!}"></div>
	<div id="url_update" data-field-id="{!! urldecode(route('update_hora'))!!}"></div>
</section>

<script type="text/javascript">
	id_servicio = null;
	$('#selector_servicio').change('', function(){
		var id_servicio =  $('#selector_servicio').val();
		url = $('#obtener_precio').data("field-id");
		url = url.replace("id_servicio", id_servicio);
		$.ajax({
            url: url,
            type: 'GET',
            success: function (datos) {
            	console.log(datos);
                if (datos)
                {
                	$('#costo_servicio').val(datos);
                }
                else
                {
                	$('#costo_servicio').text("Ingrese valor manualmente");
                }
            }
        }).fail(function () {
            location.reload();
        });
	})

	function submit_form() {
		$('#form').submit();
    }
    $('#fecha_servicio').datetimepicker({
    	startDate: '+0d',
	    format: 'yyyy-mm-dd hh:ii',
	    language: 'es'
	});
</script>  
@endsection