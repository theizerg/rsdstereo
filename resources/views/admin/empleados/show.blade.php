@extends('layouts.admin')

@section('title', 'Empleados')
@section('page_title', 'Empleados')
@section('page_subtitle', 'Datos')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ url('empleados') }}">Empleados</a></li>
    <li class="active">datos</li>
@endsection

@section('content')

<section class="card card-primary card-outline">

    <div class="col-xs-12">
      <div class=" card-header">
        <h2 class="card-title">
        <i class="fa fa-user"></i> Datos del empleado:
        <small class="pull-right">{{ $empleado->tx_nombres }} {{ $empleado->tx_apellidos }}</small>
      </h2>
    </div>
    </div>
    <div class="car-body">
      <div class="row card-body">
       <div class="col-sm-3 invoice-col">
        <strong>Nombre completo</strong><br>
          {{ $empleado->tx_nombres }} {{ $empleado->tx_apellidos }}
      </div>
      <div class="col-sm-3 invoice-col">
        <strong>Cédula</strong>
        <br>
      	 {{ $empleado->nu_cedula }}
      </div>
      <div class="col-sm-3 invoice-col">
        <strong>Edad</strong>
        <br>
        {{ $empleado->nu_edad }}
      </div>
      <div class="col-sm-3 invoice-col">
        <strong>Correo electrónico</strong><br>
     		{{ $empleado->tx_correo }}
      </div>
    </div>
    <br>
    <div class="row card-body">
      <div class="col-sm-3 invoice-col">
        <strong>Teléfono</strong><br>
        {{ $empleado->nu_telefono }} 
      </div>
      <div class="col-sm-3 invoice-col">
        <strong>Fecha de nacimiento</strong>
        <br>
        {{ $empleado->fe_nacimiento }} 
      </div>
      <div class="col-sm-3 invoice-col">
        <strong>Lugar de nacimiento</strong><br>

       {{ $empleado->empPais->nb_pais }}
      </div>
      <div class="col-sm-3 invoice-col">
        <strong>Nacionalidad</strong><br>
        {{ $empleado->empNacionalidad->nb_nacionalidad }}
      </div>
    </div>
    <br>
    <div class="row card-body">
     <div class="col-sm-3 invoice-col">
        <strong>Dirección</strong><br>
     		{{ $empleado->tx_direccion }}
      </div>
     <div class="col-sm-3 invoice-col">
        <strong>Género</strong><br>
     	 {{ $empleado->empGenero->nb_genero }}
      </div>
    	<div class="col-sm-3 invoice-col">
        <strong>Estado civil</strong><br>
     	 {{ $empleado->empEstadoCivil->nb_estado_civil }}
      </div>  
     	<div class="col-sm-3 invoice-col">
        <strong>Grado de instrucción</strong><br>
     	 {{ $empleado->empGradoInstruccion->nb_grado_instruccion }}
      </div><br>
      <div class="col-sm-3 invoice-col"><br>
        <strong>Ocupación</strong><br>
       {{ $empleado->nb_ocupacion }}
      </div><br>
            <div class="col-sm-3 invoice-col"><br>
        <strong>Fecha de ingreso</strong><br>

       {{ $empleado->fe_ingreso }}
      </div>
     </div>
     <br>
      <div class="row card-body">
      <div class="col-sm-4 invoice-col">
        <strong>¿Sufre de alguna enfermedad?</strong><br>
          {{ $empleado->nb_sufre_enfermedad }}
      </div>
      <div class="col-sm-4 invoice-col">
        <strong>Describa la enfermedad</strong>
        <br>
      	 {{ $empleado->nb_descripcion_enfermedad }}
      </div>
      <div class="col-sm-4 invoice-col">
        <strong>Tipo de sangre</strong>
        <br>
        {{ $empleado->empTipoSangre->nb_tipo_sangre }}
      </div>
    </div>
    <br>
    <br>
    <div class="card-footer">
      <div class="col-md-6">
        <div class="btn-group">
          <a href="{{ url('empleados', [$empleado->id, 'edit']) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</a>
          
        </div>
        <div class="btn-group">
          <a href="{{ url('imprimir', [$empleado->id]) }}" class="btn btn-success"><i class="fa fa-print"></i> Imprimir</a>
        </div>
        <div class="btn-group">              
          <a href="#confirm-modal" id="{{ $empleado->id }}"  class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash"></i> Eliminar</a></li>              
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
