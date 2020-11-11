 @extends('layouts.admin')

@section('title', 'Asistencia')
@section('page_title', 'Asistencia')
@section('page_subtitle', 'Listado')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ url('asistencia') }}">asistencia</a></li>
    <li class="active">Listado</li>
@endsection

@section('content')
<div class="row">
        <div class="col-md-6">
          <div class="btn-group">
            @can('add_asistencia')
            <a href="{{ url('asistencia/create') }}" class="btn btn-primary"><i class="fa fa-plus-square"></i> Ingresar</a>
            @endcan
          </div>
        </div>
      </div>
<br>
 <div class="row">
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Listado de asistencia</h3>
              <div class="card-tools">
                <form>
                  <input type="hidden" id="_url" value="{{ url('') }}">
                  <input type="hidden" id="_token" value="{{ csrf_token() }}">
                 </form>
              </div>
            </div>
            <div class="card-body table-responsive table-striped">
              <table id="example2" class="table table-bordered table-hover">
               <thead>
                <tr>
                    <th>Nombres</th>
                    <th>Dia de la semana</th>
                    <th>Hora de llegada</th>
                    <th>Hora de salida</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($asistencia as $value)
                <tr>
                  <td>{{ $value->empEmpleado->tx_nombres}}</td>
                  <td>{{ $value->empDias->nb_dia_semanales}}</td>
                  <td>{{ $value->h_llegada}}</td>
                  <td>{{ $value->h_salida}}</td>
                  <td>
                    <a href="{{route('asistencia.edit',$value->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
              </table>

              <div class="card-footer clearfix">
                  {{ $asistencia->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    @endsection


@push('scripts')
    <script src="{{ asset('js/DataTables.js') }}"></script>
    <script src="{{ asset('js/DataTablesBootstrap.js') }}"></script>

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
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
@endpush


