<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('test/font-awesome/css/font-awesome.css') }}" crossorigin="anonymous">
  <!-- Bootstrap core CSS -->
  <link href="{{asset('test/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{asset('test/css/mdb.min.css') }}" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="{{asset('test/css/style.css') }}" rel="stylesheet">
  
      
</head>

<body>

  <!-- Start your project here-->
  @include('layouts.navbar')

  @yield('content')

  @include('layouts.footer')


  <!-- Start your project here-->

  <!-- SCRIPTS -->
  <!-- JQuery -->


  <script type="text/javascript" src="{{ asset('test/js/jquery-3.4.1.min.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{ asset('test/js/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{ asset('test/js/bootstrap.min.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{ asset('test/js/mdb.min.js')}}"></script>

  <!-- Costumized JavaScript -->
  <script type="text/javascript" src="{{ asset('test/js/script.js')}}"></script>

  
</script>

</body>

</html>
