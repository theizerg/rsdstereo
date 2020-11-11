@extends('layouts.admin')

@section('title', 'Programas')
@section('page_title', 'Programas')
@section('page_subtitle', 'Ingresar')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ url('programas') }}">programas</a></li>
    <li class="active">Ingresar</li>
@endsection

@section('content')

  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="btn-group">
          @can('view_users')
          <a href="{{ url('programas') }}" class="btn btn-primary"><i class="fa fa-sort-alpha-desc"></i> Listado</a>
          @endcan
          @can('add_users')
          <a href="{{ url('programas/create') }}" class="btn btn-primary"><i class="fa fa-plus-square"></i> Ingresar</a>
          @endcan
        </div>
      </div>
      <div class="float-right">
         <a href="{{url('programas')}}" class="brand-link">
      <img src="{{asset('images/fondo/logo-rsdstereo.png')}}"
      
       class="brand-image img-circle elevation-4"
       style="opacity: .8">
          
        </a>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary card-outline">

         {!!Form::open (['route'=>'programas.store','id'=>'empleados_form'])!!}

        <div class="col-xs-12">
          <div class=" card-header">
            <h2 class="card-title">
              <i class="fas fa-microphone"></i> Datos del programa
              <small class="pull-right"></small>
            </h2>
          </div>
        </div>
        @include('admin.programas.partials.form')
      </div>
    </div>
  </div>

       
       {!! Form::close()!!}
        
  </section>

@endsection
