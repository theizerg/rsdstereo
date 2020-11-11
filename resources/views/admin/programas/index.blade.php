 @extends('layouts.admin')

@section('title', 'Programas')
@section('page_title', 'Programas')
@section('page_subtitle', 'Listado')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ url('programas') }}">programas</a></li>
    <li class="active">Listado</li>
@endsection

@section('content')
<div class="row">
        <div class="col-md-6">
          <div class="btn-group">
            @can('add_users')
            <a href="{{ url('programas/create') }}" class="btn btn-primary"><i class="fa fa-plus-square"></i> Ingresar</a>
            @endcan
          </div>
     </div>
</div>
<br>
 <div class="row">
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Listado de programas</h3>
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
                    <th>Moderador</th>
                    <th>Tipo de programa</th>
                    <th>Desde - Hasta</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($programas as $value)
                <tr>
                  <td>{{ $value->nb_nombre}}</td>
                  <td>{{ $value->nb_moderador}}</td>
                  <td>{{ $value->empTipoPrograma->nb_tipo_programa }}</td>
                  <td>{{ $value->nb_desde}} - {{ $value->nb_hasta}}</td>
                  <td><span class="badge {{ $value->status ? 'bg-green' : 'bg-red' }}">{{ $value->display_status }}</span></td>
                  <td>
                    <a href="{{route('programas.edit',$value->id)}}" class="btn btn-primary" ><i class="fas fa-edit"></i>Editar</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
              </table>

              <div class="card-footer clearfix">
                  {{ $programas->links() }}
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


