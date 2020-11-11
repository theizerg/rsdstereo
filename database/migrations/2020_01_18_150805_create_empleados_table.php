<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
           $table->increments('id');
            $table->string('tx_nombres');
            $table->string('tx_apellidos');
            $table->string('nu_cedula')->unique();
            $table->string('nu_edad');
            $table->string('tx_correo')->unique();
            $table->string('tx_direccion');
            $table->string('nu_telefono');
            $table->string('fe_ingreso');
            $table->string('nb_sufre_enfermedad');
            $table->string('nb_descripcion_enfermedad');
            $table->integer('tipo_sangre_id');
            
            $table->string('nb_ocupacion');
            $table->integer('lugar_nacimiento_id')->unsigned();
            $table->integer('nacionalidad_id')->unsigned();
            $table->date('fe_nacimiento');
            $table->integer('genero_id')->unsigned();
            $table->integer('grado_instruccion_id')->unsigned();
            $table->integer('estado_id')->unsigned();
            $table->integer('estado_civil_id')->unsigned();
            $table->string('picture')->nullable();
            $table->integer('users_id');
            /**
             *  Add foreign key constraints to these columns
             */

            $table->foreign('lugar_nacimiento_id')->references('id')->on('pais');
            $table->foreign('nacionalidad_id')->references('id')->on('nacionalidad');
            $table->foreign('grado_instruccion_id')->references('id')->on('grado_instruccion');
            $table->foreign('estado_id')->references('id')->on('estado');
            $table->foreign('estado_civil_id')->references('id')->on('estado_civil');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
