<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
   	protected $table = 'patients';
	protected $primaryKey = 'id_patient';

	protected $fillable = ['id_patient', 'name'];

	public $timestamps = false;

    public function Horas(){
        return $this->hasMany('App\Hora', 'id_patient', 'id_patient');
    }
}
