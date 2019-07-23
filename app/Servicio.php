<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
   	protected $table = 'services';
	protected $primaryKey = 'id_service';

	protected $fillable = ['id_service', 'name'];

	public $timestamps = false;

    public function Horas(){
        return $this->hasMany('App\Hora', 'id_service', 'id_service');
    }
}
