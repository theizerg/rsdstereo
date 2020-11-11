@extends('layouts.admin')

@section('title', 'Inicio')
@section('page_title', 'Inicio')
@section('page_subtitle', 'Principal')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Principal</li>
@endsection

@section('content')

<div id="app">

<h3>Ejemplo para realizar el control de asistencia RSD STEREO</h3>
<input type="datetime" name="" id="" value="{{ $fecha }}">


</div>

@endsection
