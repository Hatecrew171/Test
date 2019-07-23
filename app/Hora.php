<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hora extends Model
{
   	protected $table = 'appointments';
	protected $primaryKey = 'id_appointment';

	protected $fillable = ['id_appointment', 'date', 'price', 'id_dentist', 'id_patient', 'id_service'];

	public $timestamps = false;

    public function Pacientes(){
        return $this->belongsTo('App\Paciente', 'id_patient', 'id_patient');
    }

    public function Servicios(){
        return $this->belongsTo('App\Servicio', 'id_service', 'id_service');
    }

    public function Dentistas(){
        return $this->belongsTo('App\Medico', 'id_dentist', 'id_dentist');
    }
}
