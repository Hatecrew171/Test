@extends('main.index')

@section('contenido')
<section class="content">
	<form style="padding-top: 20px; text-align: center;">
		<h1>Historial Consultas Dentales</h1>
	<div class="row" style="padding-bottom: 20px;">
		<div class="col-md-6">
		    {!!Form::text('fecha_inicio',
	             date("Y") . "-" . date("m") . "-" . date("d") ." ". "00:00" ,
	            [
	                'placeholder'=>'Fecha Inicio',
	                'id'=>'fecha_inicio',
	                'class'=>'form-control input-sm',
	                'onfocus'=>'blur()',
	                'readonly'=>'true',
	            ]
	        )!!}
		</div>
		<div class="col-md-6">
		    {!!Form::text('fecha_final',
	             date("Y") . "-" . date("m") . "-" . date("d") ." ". "00:00" ,
	            [
	                'placeholder'=>'Fecha Final',
	                'id'=>'fecha_final',
	                'class'=>'form-control input-sm',
	                'onfocus'=>'blur()',
	                'readonly'=>'true',
	            ]
	        )!!}
		</div>
	</div>
	<div class="box-body" align="center" id="contenido">
	</div>
	</form>
	<div id="informacion_historial" data-field-id="{!! urldecode(route('informacion_historial', ['fecha_inicio', 'fecha_final']))!!}"></div>
	<div class="modal fade" id="ex1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index: 100000000000000000">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                 <h4 class="modal-title" id="myModalLabel">Atención</h4>
              </div>
              <div class="modal-body">
                <form role="form">
                  <div class="form-group" id="mensaje_modal"></div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
    </div>
</section>

<script type="text/javascript">
    $('#fecha_inicio').datetimepicker({
	    format: 'yyyy-mm-dd hh:ii',
	    language: 'es'
	});
	$('#fecha_final').datetimepicker({
	    format: 'yyyy-mm-dd hh:ii',
	    language: 'es'
	});

	$('#fecha_inicio').change('', function(){

		var fecha_inicio =  $('#fecha_inicio').val();
		var fecha_final =  $('#fecha_final').val();
		if(fecha_inicio < fecha_final)
		{
			url = $('#informacion_historial').data("field-id");
			url = url.replace("fecha_inicio", fecha_inicio);
			url = url.replace("fecha_final", fecha_final);
			$.ajax({
	            url: url,
	            type: 'GET',
	            success: function (datos) {
	            	console.log(datos);
	                if (datos)
	                {
	                	$('#contenido').html(datos);
	                }
	            }
	        }).fail(function () {
	            location.reload();
	        });
		}
		else
		{
			$('#mensaje_modal').text("La fecha inicial no puede ser mayor a la fecha final");
         	$('#ex1').modal("show");  
		}
		
	})

	$('#fecha_final').change('', function(){
		var fecha_inicio =  $('#fecha_inicio').val();
		var fecha_final =  $('#fecha_final').val();
		if(fecha_final < fecha_inicio)
		{
			$('#mensaje_modal').text("La fecha final no puede ser menor a la fecha inicial");
         	$('#ex1').modal("show")
		}
		else
		{
			url = $('#informacion_historial').data("field-id");
			url = url.replace("fecha_inicio", fecha_inicio);
			url = url.replace("fecha_final", fecha_final);
			$.ajax({
	            url: url,
	            type: 'GET',
	            success: function (datos) {
	            	console.log(datos);
	                if (datos)
	                {
	                	$('#contenido').html(datos);
	                }
	            }
	        }).fail(function () {
	            location.reload();
	        });
		}
		
	})
</script>  
@endsection