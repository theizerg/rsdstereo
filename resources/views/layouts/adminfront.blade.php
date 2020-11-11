<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ env('APP_NAME') }} - @yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animated.css') }}">
    @stack('styles')
  </head>

  <body class="hold-transition login-page" id="body">
    <!--Page Content Here -->
    @yield('content')

    <!-- REQUIRED JS SCRIPTS -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')


    <style>
    
    #body{

            background-attachment: fixed;
            background-position: center center;
            background-size: cover;
            background-image: url("/images/fondo/salto-angel.jpg");
    }
    
    </style>
  </body>
</html>
