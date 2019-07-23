<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
   	protected $table = 'dentists';
	protected $primaryKey = 'id_dentist';

	protected $fillable = ['id_dentist', 'name'];

	public $timestamps = false;

    public function Horas(){
        return $this->hasMany('App\Hora', 'id_dentist', 'id_dentist');
    }
}
