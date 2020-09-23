<!DOCTYPE html>
<html lang="en">
<head>
     <title>JPSchool - Best E-School Platform</title>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="{{asset('/public/front/css/bootstrap.min.css')}}">
     <link rel="stylesheet" href="{{asset('/public/front/css/font-awesome.min.css')}}">
     <link rel="stylesheet" href="{{asset('/public/front/css/owl.carousel.css')}}">
     <link rel="stylesheet" href="{{asset('/public/front/css/owl.theme.default.min.css')}}">
     <!-- MAIN CSS -->
     <link rel="stylesheet" href="{{asset('/public/front/css/templatemo-style.css')}}">
</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
     @include('includes.front_header')

     @yield('content')

     @include('includes.front_footer')
     

     <!-- SCRIPTS -->
     <script src="{{asset('/public/front/js/jquery.js')}}"></script>
     <script src="{{asset('/public/front/js/bootstrap.min.js')}}"></script>
     <script src="{{asset('/public/front/js/owl.carousel.min.js')}}"></script>
     <script src="{{asset('/public/front/js/smoothscroll.js')}}"></script>
     <script src="{{asset('/public/front/js/custom.js')}}"></script>

</body>
</html>