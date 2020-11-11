<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
   protected $table = 'asistencia';

      protected $fillable = [
        'empleado_id',
        'nu_cedula',
        'nb_dia',
        'h_llegada',
        'h_salida',
        'users_id'
    ];




    /**
     * @return object
     */
    public function empEmpleado(){
        return $this->belongsTo('App\Models\Empleados','empleado_id');
    }


        /**
     * @return object
     */
    public function empDias(){
        return $this->belongsTo('App\Models\DiaSemanales','nb_dia');
    }

}
