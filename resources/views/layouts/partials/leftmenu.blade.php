 <!-- Brand Logo -->
 <a href="{{url('/')}}" class="brand-link">
  <img src="{{asset('images/fondo/logo-rsdstereo.png')}}"
       alt="AdminLTE Logo"
       class="brand-image img-circle elevation-3"
       style="opacity: .8">
  <span class="brand-text font-weight-light">Rsd Stereo</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
     <!-- <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">-->
    </div>
    <div class="info">
    <a href="{{url('/')}}" class="d-block">{{ Auth::user()->full_name}} <i class="fa fa-online" aria-hidden="true"></i></i></a>
    </div>
  </div>
  <!-- Sidebar Menu -->
    <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
     @can('add_users')
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-header">OPCIONES</li>
      
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link active">
          <i class="nav-icon fas fa-cogs"></i>
          <p>
            Administración
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
       
        <ul class="nav nav-treeview">
          <li class="nav-item">
          <a href="{{url('user')}}" class="nav-link">
              <i class="far fa-user nav-icon"></i>
              <p>Usuarios</p>
            </a>
          </li>
       
         
          <li class="nav-item">
            <a href="{{url('permissions')}}" class="nav-link">
              <i class="far fa-file-archive nav-icon"></i>
              <p>Permisos</p>
            </a>
          </li>
    
          <li class="nav-item">
            <a href="{{url('logins')}}" class="nav-link">
              <i class="fas fa-id-card-alt nav-icon"></i>
              <p>Logins</p>
            </a>
          </li>
        </ul>
      </li>
         @endcan
       @can('add_empleados')  
      <li class="nav-header">REGISTRO</li>
       
       <li class="nav-item has-treeview">
        <a href="#" class="nav-link active">
          <i class="nav-icon fas fa-users"></i>
          <p>
            Empleados
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
          <a href="{{url('empleados')}}" class="nav-link">
              <i class="far fa-user nav-icon"></i>
              <p>Empleados</p>
            </a>
          </li>
        </ul>
      </li>
      @endcan
       @can('add_programas')
      <li class="nav-header">REGISTRO</li>
       <li class="nav-item has-treeview">
        <a href="#" class="nav-link active">
          <i class="nav-icon fas fa-users"></i>
          <p>
            PROGRAMAS
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
       
        <ul class="nav nav-treeview">
          <li class="nav-item">
          <a href="{{url('programas')}}" class="nav-link">
              <i class="fas fa-microphone nav-icon"></i>
              <p>Programas</p>
            </a>
          </li>
        </ul>
      </li>
      @endcan
       <li class="nav-header">CONTROL</li>
       <li class="nav-item has-treeview">
        <a href="#" class="nav-link active">
          <i class="nav-icon fas fa-users"></i>
          <p>
            Asistencia
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        @can('add_asistencia')
        <ul class="nav nav-treeview">
          <li class="nav-item">
          <a href="{{url('asistencia')}}" class="nav-link">
              <i class="fas fa-address-book nav-icon"></i>
              <p>Asistencia</p>
            </a>
          </li>
        </ul>
        @endcan
      </li>
    </ul>
  </nav>

  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->