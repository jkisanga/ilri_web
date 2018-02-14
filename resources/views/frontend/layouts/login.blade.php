<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ag Policy Web App</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">

</head>
<body>

<div class="container">
    <div class="row vertical-center-row">

      @yield('content')
    </div>
</div>

</body>

   <!-- core js files -->
    <script src="{{asset('asset/js/jquery-1.11.0.min.js')}}"></script>
    <script src="{{asset('asset/js/bootstrap.min.js')}}"></script>


    <!-- core js files -->
</html>