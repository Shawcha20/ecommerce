<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/adminpanel/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/adminpanel/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <base href="/public">
    <link rel="stylesheet" href="/adminpanel/template/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="/adminpanel/template/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/adminpanel/template/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="/adminpanel/template/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/adminpanel/template/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="/adminpanel/template/assets/images/favicon.png" />
</head>

<body>
    <h1>
        @if(isset($success))
       <div class="alert alert-success alert-dismissible fade show" role="alert">
           {{ $success }}
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times</span>
           </button>
       </div>
       @endif</h1>
    @include('admin.adminsidebar')
    @include('admin.adminnavbar')
    @yield('admin')
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/adminpanel/template/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/adminpanel/template/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="/adminpanel/template/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="/adminpanel/template/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="/adminpanel/template/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/adminpanel/template/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/adminpanel/template/assets/js/off-canvas.js"></script>
    <script src="/adminpanel/template/assets/js/hoverable-collapse.js"></script>
    <script src="/adminpanel/template/assets/js/misc.js"></script>
    <script src="/adminpanel/template/assets/js/settings.js"></script>
    <script src="/adminpanel/template/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="/adminpanel/template/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
</body>

</html>
