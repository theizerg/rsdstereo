@extends('layouts.adminfront')

@section('title', 'Login')

@section('content')

    <div class="login-box" id="login-box-body">
      <div class="login-logo">
          <a href="{{ url('/') }}" id="titulo"> <img src="{{asset('images/fondo/logo-rsdstereo.png')}}" class="animated infinite bounce delay-2s" id="animado"></a>

      </div>
      <div class="login-box-body" >
        <p class="login-box-msg">Ingrese su correo y su contraseña.</p>
        <form id="main-form">
          <input type="hidden" id="_url" value="{{ url('login') }}">
          <input type="hidden" id="_redirect" value="{{ url('') }}">
          <input type="hidden" id="_token" value="{{ csrf_token() }}">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" id="email" name="email" placeholder="Correo electrónico">
            <span class="fa fa-envelope form-control-feedback"></span>
            <span class="missing_alert text-danger" id="email_alert"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
            <span class="fa fa-lock form-control-feedback"></span>
            <span class="missing_alert text-danger" id="password_alert"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block ajax"id="ingresar" >
                <i id="ajax-icon" class="fa fa-sign-in" ></i> Ingresar
              </button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        
      </div>
    </div>

@endsection

<style>

#ingresar{


background: rgba(0,129,194,1);
background: -moz-linear-gradient(left, rgba(0,129,194,1) 0%, rgba(70,94,138,1) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(0,129,194,1)), color-stop(100%, rgba(70,94,138,1)));
background: -webkit-linear-gradient(left, rgba(0,129,194,1) 0%, rgba(70,94,138,1) 100%);
background: -o-linear-gradient(left, rgba(0,129,194,1) 0%, rgba(70,94,138,1) 100%);
background: -ms-linear-gradient(left, rgba(0,129,194,1) 0%, rgba(70,94,138,1) 100%);
background: linear-gradient(to right, rgba(0,129,194,1) 0%, rgba(70,94,138,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#0081c2', endColorstr='#465e8a', GradientType=1 );
-webkit-box-shadow: -2px 11px 13px -6px rgba(0,0,0,1);
-moz-box-shadow: -2px 11px 13px -6px rgba(0,0,0,1);
box-shadow: -2px 11px 13px -6px rgba(0,0,0,1);
border: 0px solid #000000;


}

#titulo{
  color: #ffff;
  font-size: 35px;
}





#login-box-body{




      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#0081c2', endColorstr='#465e8a', GradientType=1 );
      -webkit-box-shadow: -2px 11px 13px -6px rgba(0,0,0,1);
      -moz-box-shadow: -2px 11px 13px -6px rgba(0,0,0,1);
      box-shadow: -2px 11px 13px -6px rgba(0,0,0,1);
      float: left;

    

      background: rgba(4,92,122,1);
      background: -moz-linear-gradient(left, rgba(4,92,122,1) 0%, rgba(4,92,122,0.55) 58%, rgba(21,142,212,0.22) 100%);
      background: -webkit-gradient(left top, right top, color-stop(0%, rgba(4,92,122,1)), color-stop(58%, rgba(4,92,122,0.55)), color-stop(100%, rgba(21,142,212,0.22)));
      background: -webkit-linear-gradient(left, rgba(4,92,122,1) 0%, rgba(4,92,122,0.55) 58%, rgba(21,142,212,0.22) 100%);
      background: -o-linear-gradient(left, rgba(4,92,122,1) 0%, rgba(4,92,122,0.55) 58%, rgba(21,142,212,0.22) 100%);
      background: -ms-linear-gradient(left, rgba(4,92,122,1) 0%, rgba(4,92,122,0.55) 58%, rgba(21,142,212,0.22) 100%);
      background: linear-gradient(to right, rgba(4,92,122,1) 0%, rgba(4,92,122,0.55) 58%, rgba(21,142,212,0.22) 100%);
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#045c7a', endColorstr='#158ed4', GradientType=1 );

      -webkit-box-shadow: -2px 11px 13px -6px rgba(0,0,0,1);
      -moz-box-shadow: -2px 11px 13px -6px rgba(0,0,0,1);
      box-shadow: -2px 11px 13px -6px rgba(0,0,0,1);
      border: 0px solid #000000;
    
    }

</style>



@push('scripts')
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
    <script src="{{ asset('js/admin/auth/login.js') }}"></script>
@endpush
