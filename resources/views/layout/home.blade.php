<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <base href="/public">
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>@yield('title')</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="homepage/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="homepage/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="homepage/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="homepage/css/responsive.css" rel="stylesheet" />
   </head>

   <body>
    @include('home.navbar')
    @yield('basic')
      <!-- jQery -->
      <script src="homepage/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="homepage/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="homepage/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="homepage/js/custom.js"></script>
 
   </body>
</html>
