@extends('layouts.admin')

@section('title', 'Asistencia')
@section('page_title', 'Asistencia')
@section('page_subtitle', 'Ingresar')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ url('asistencia') }}">asistencia</a></li>
    <li class="active">Ingresar</li>
@endsection

@section('content')

  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="btn-group">
          @can('view_users')
          <a href="{{ url('asistencia') }}" class="btn btn-primary"><i class="fa fa-sort-alpha-desc"></i> Listado</a>
          @endcan
          @can('add_users')
          <a href="{{ url('asistencia/create') }}" class="btn btn-primary"><i class="fa fa-plus-square"></i> Ingresar</a>
          @endcan
        </div>
      </div>
      <div class="float-right">
         <a href="{{url('asistencia')}}" class="brand-link">
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

         {!! Form::model($asistencia, ['route' => ['asistencia.update',$asistencia->id],'method' => 'PUT']) !!}

        <div class="col-xs-12">
          <div class=" card-header">
            <h2 class="card-title">
              <i class="fas fa-radio"></i> Editar datos del programa
              <small class="pull-right"></small>
            </h2>
          </div>
        </div>
        @include('admin.asistencia.partials.form')
      </div>
    </div>
  </div>

       
       {!! Form::close()!!}
        
  </section>

@endsection


@push('scripts')


@endpush