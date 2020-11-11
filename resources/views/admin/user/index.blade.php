@extends('layouts.admin')

@section('title', 'Usuarios')
@section('page_title', 'Usuarios')
@section('page_subtitle', 'Listado')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ url('user') }}">usuarios</a></li>
    <li class="active">Listado</li>
@endsection

@section('content')

    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="btn-group">
            @can('add_users')
            <a href="{{ url('user/create') }}" class="btn btn-primary"><i class="fa fa-plus-square"></i> Ingresar</a>
            @endcan
          </div>
        </div>
      </div>
      <br>
     <div class="card card-primary card-outline">
            <div class=" card-header">
              <h3 class="card-title">Listado de usuario</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Usuario</th>
                  <th>Tipo</th>
                  <th>Correo electrónico</th>
                  <th>Acceso</th>
                  <th>Creado</th>
                  <th>Actualizado</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                 @foreach ($users as $user)
                <tr class="row{{ $user->encode_id }}">
                  <td>{{ $user->full_name }}</td>
                  <td>{!! $user->hasRole('admin') ? '<b>Administrador</b>' : 'Usuario' !!}</td>
                  <td>{{ $user->email  }}</td>
                  <td><span class="badge {{ $user->status ? 'bg-green' : 'bg-red' }}">{{ $user->display_status }}</span></td>
                  <td>{{ $user->created_at }}</td>
                  <td>{{ $user->updated_at }}</td>
                  <td>
                    <div class="dropdown">
                      <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                        <i class="fa fa-cogs"></i> <span class="caret"></span>
                      </button>
                      <ul class=" dropdown-menu dropdown-menu-right">
                        <li><a href="{{  url('user', [$user->encode_id]) }}"><i class="fa fa-eye"></i> Perfil</a></li>
                        @can('edit_users')
                        <li><a href="{{ url('user', [$user->encode_id, 'edit']) }}"><i class="fa fa-edit"></i> Editar</a></a></li>
                        @endcan
                        @can('view_logins')
                        <li class="divider"><li>
                        <li><a href="{{ url('user/login', [$user->encode_id]) }}"><i class="fa fa-sign-in"></i> Logins</a></li>
                        @endcan
                        @if(auth()->user()->can('delete_users') && Auth::user()->id != $user->id)
                        <li class="divider"><li>
                        <li><a href="#confirm-modal" id="{{ $user->encode_id }}"  class="del-btn" data-toggle="modal"><i class="fa fa-trash"></i> Eliminar</a></li>
                        @endif
                      </ul>
                    </div>
                  </td>
                </tr>
                @endforeach
                </tr>
                </tbody>
                
              </table>
            </div>
            <!-- /.card-body -->
          </div>
     
    </section>




@endsection

@push('scripts')
  <script>
  @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif
  
  </script>

  <script> 
  
  $(function () {
    $("#example1").DataTable();
  
  });
  
  </script>
@endpush
