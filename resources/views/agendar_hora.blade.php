@extends('main.index')

@section('contenido')
<section class="content">
	{!!Form::open(['route'=> ['guardar_hora'],'method'=>'POST','files'=>true, 'id' => 'form', 'style' => 'padding-top: 20px;'])!!}
		<h1>Agendar Consulta Dental</h1>
	<div class="box-body">
		<div class="row">
			<div class="col-md-3">
				<strong>Servicio</strong>
		  	</div>
		  	<div class="col-md-6">
				{!!Form::select('servicio',
	                [null=>'Seleccione Servicio'] + $servicios,
	                null,
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
	                null,
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
	                null,
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
				{!!Form::text('costo_servicio', null,
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
                     date("Y") . "/" . date("m") . "/" . date("d") ." ". "00:00" ,
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
	{!!Form::close()!!}
	<div id="obtener_precio" data-field-id="{!! urldecode(route('obtener_precio', 'id_servicio'))!!}"></div>
	<div id="url_guardar" data-field-id="{!! urldecode(route('guardar_hora'))!!}"></div>
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

        url=$('#url_guardar').data("field-id");
        $.ajax({
        	headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  },
            url: $('#url_guardar').data("field-id"),
            type: 'POST',
            data: $('#form').serialize(),
            success: function(datos){
                $("#selector_servicio, #selector_paciente, #selector_medico, #costo_servicio, #fecha_servicio").text("");
                if(datos.success == false){
                    $.each(datos.errors, function (index, value) {
                        $("#_"+index).text(value);
                    });
                }else if(datos.success == true){
                	$('#form').submit();
                }
            }
        }).fail(function() {
            location.reload();
        });
    }
    $('#fecha_servicio').datetimepicker({
    	startDate: '+0d',
	    format: 'yyyy-mm-dd hh:ii',
	    language: 'es'
	});
</script>  
@endsection