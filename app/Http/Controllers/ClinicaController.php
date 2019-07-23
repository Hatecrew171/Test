<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;
use App\Medico;
use App\Servicio;
use App\Hora;
use Redirect;

class ClinicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('main.index');
    }

    public function agendar_hora()
    {
    	$servicios = Servicio::all()->pluck('name', 'id_service')->toArray();
    	$medicos = Medico::all()->pluck('name', 'id_dentist')->toArray();
    	$pacientes = Paciente::all()->pluck('name', 'id_patient')->toArray();
        return view('agendar_hora', compact('servicios', 'medicos', 'pacientes'));
    }

    public function obtener_precio($id_servicio)
    {
    	$servicio = Servicio::find($id_servicio);
    	if (!empty($servicio))
    	{
    		$precio = $servicio->price;
    		return json_encode($precio);
    	}
    	else
    	{
    		return 0;
    	}
    }

    public function editar_hora($id)
    {
    	$hora = Hora::find($id);
    	$servicios = Servicio::all()->pluck('name', 'id_service')->toArray();
    	$medicos = Medico::all()->pluck('name', 'id_dentist')->toArray();
    	$pacientes = Paciente::all()->pluck('name', 'id_patient')->toArray();
        return view('editar_hora', compact('hora', 'servicios', 'medicos', 'pacientes'));
    }

    public function eliminar_hora($id)
    {
    	$hora = Hora::find($id);
    	$hora->delete();
        return redirect::action('ClinicaController@historial');
    }

    public function historial()
    {
    	$horas = Hora::with('pacientes', 'servicios', 'dentistas')->get();
    	$datos = [];
    	$total = 0;
    	foreach ($horas as $hora) {
    		$fila = New \stdClass();
    		$fila->id = $hora->id_appointment;
    		$fila->fecha = $hora->date;
    		$fila->paciente = $hora->pacientes->name;
    		$fila->servicio = $hora->servicios->name;
    		$fila->medico = $hora->dentistas->name;
    		$fila->costo_servicio = $hora->servicios->price;
    		$total += $fila->costo_servicio;
    		$datos[] = $fila;	
    	}
        return view('historial', compact('datos', 'total'));
    }

    public function historial_detalle()
    {
        return view('historial_detalle');
    }

    public function informacion_historial($fecha_inicio, $fecha_final)
    {
    	$horas = Hora::with('pacientes', 'servicios', 'dentistas')->where('date', '>=', $fecha_inicio)->where('date', '<=', $fecha_final)->get();
    	$datos = [];
    	$total = 0;
    	foreach ($horas as $hora) {
    		$fila = New \stdClass();
    		$fila->id = $hora->id_appointment;
    		$fila->fecha = $hora->date;
    		$fila->paciente = $hora->pacientes->name;
    		$fila->servicio = $hora->servicios->name;
    		$fila->medico = $hora->dentistas->name;
    		$fila->costo_servicio = $hora->servicios->price;
    		$total += $fila->costo_servicio;
    		$datos[] = $fila;
    	}
    	return view('contenido_historial', compact('datos', 'total'));	
    }

    public function guardar_hora(Request $request)
    {
    	$datos = [
    		 'id_service' => $request->servicio,
            'id_dentist' => $request->medico,
            'id_patient' => $request->paciente,
            'price' => $request->costo_servicio,
            'date' => $request->fecha_servicio,
    	];
    	$hora = New Hora();
    	$hora->fill($datos)->save();
    	return redirect::action('ClinicaController@index');
    }

    public function update_hora(Request $request)
    {
    	$id = $request->id_hora;
    	$hora = Hora::findOrFail($id);
    	$hora->id_service = $request->servicio;
    	$hora->id_dentist = $request->medico;
    	$hora->id_patient = $request->paciente;
    	$hora->price = $request->costo_servicio;
    	$hora->date = $request->fecha_servicio;
    	$hora->save();
    	return redirect::action('ClinicaController@historial');
    }
}