<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Programas extends Model
{
    use Notifiable;

	 protected $table = 'programas';

     protected $dates = ['deleted_at'];





     public function empTipoPrograma(){
        /**
         *  return department which belongs to an employee.
         *  first parameter is the model and second is a
         *  foreign key.
         */
        return $this->belongsTo('App\Models\Tipo_Programa','tipo_programa_id');
    }


     public function getDisplayStatusAttribute()
    {
        return $this->status == 1 ? 'Activo' : 'Inactivo';
    }
}
