<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
 	

    protected $table = 'empleados';

    protected $dates = ['deleted_at'];

    

    protected $hidden = [];

    protected $appends = ['full_name'];


    protected $searchable = [
        'columns' => [
          'empleados.nb_nombre' => 5,
          'empleados.nb_apellido' => 5,
        ]
    ];


    /*
    |
    | ** Relationships model **
    |
    */

    public function logins()
    {
        return $this->hasMany('App\Models\Login');
    }

    /*
    |
    | ** Accesors model **
    |
    */

    public function getEncodeIDAttribute()
    {
        return \Hashids::encode($this->id);
    }




    public function getFullNameAttribute()
    {
        return title_case($this->nb_nombre).' '. title_case($this->nb_apellido);
    }




    public function getDisplayNameAttribute()
    {
        $nb_nombre      = explode(' ', $this->nb_nombre);
        $nb_apellido = explode(' ', $this->nb_apellido);

        return title_case($nb_nombre[0]).' '.title_case($nb_apellido[0]);
    }




    public function getDisplayStatusAttribute()
    {
        return $this->status == 1 ? 'Activo' : 'Denegado';
    }

    /*
    |
    | ** Mutators model **
    |
    */

    /*
    |
    | ** Send the custom password reset notification **
    |
    */

    
    /**
     * @return object
     */
    public function empEstado(){
        /**
         *  return department which belongs to an employee.
         *  first parameter is the model and second is a
         *  foreign key.
         */
        return $this->belongsTo('App\Models\Estado','estado_id');
    }

    /**
     * @return object
     */
    public function empEstadoCivil(){
        return $this->belongsTo('App\Models\Estado_Civil','estado_civil_id');
    }

    /**
     * @return object
     */
    public function empGenero(){
        return $this->belongsTo('App\Models\Genero','genero_id');
    }

    /**
     * @return object
     */
    public function empGradoInstruccion(){
        return $this->belongsTo('App\Models\Grado_Instruccion','grado_instruccion_id');
    }

    /**
     * @return object
     */
    public function empNacionalidad(){
        return $this->belongsTo('App\Models\Nacionalidad','nacionalidad_id');
    }

    /**
     * @return object
     */
    public function empPais(){
        return $this->belongsTo('App\Models\Pais','lugar_nacimiento_id');
    }

        /**
     * @return object
     */
    public function empTipoSangre(){
        return $this->belongsTo('App\Models\TipoSangre','tipo_sangre_id');
    }
}
