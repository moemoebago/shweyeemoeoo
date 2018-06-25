<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>
    @yield('title')
  </title>

  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

  <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">

  <!-- <link rel="stylesheet" href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') }}">

  <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

  <link rel="stylesheet" href="{{ asset('css/style.css') }}"> -->
</head>
<body>

  

  @yield('content')

  
  <script src="{{ asset('js/jquery.js') }}"></script>

  <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>

  <script src="{{ asset('js/wow.min.js') }}"></script>

  <script src="{{ asset('js/bootstrap.min.js') }}"></script>

  @stack('scripts')

 <!--  <script>
    new WOW().init();
  </script> -->

</body>
</html>