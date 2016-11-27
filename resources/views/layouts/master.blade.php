<!DOCTYPE html>
<html>
<head>
<!--header-->
 @include('shared.header')
 <style type="text/css">
 .help-block{
  color: red;
 }
 </style>
 @yield('style')
<!--header-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!--topnav-->
    @include('shared.topnav')
    <!--topnav-->
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
   <!--sidebar-->
   @include('shared.sidebar')
   <!--sidebar-->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!--main-content-->
    @yield('main')
  <!--main-content-->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <!--footer-->
    @include('shared.footer')
    <!--footer-->
  </footer>
</div>
<!-- ./wrapper -->

@include('shared.scripts')
@yield('script')
</body>
</html>
