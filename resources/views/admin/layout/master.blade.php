@include("admin.layout.partials.head")


<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

 
 
  <x-admin-header-component/>

  

  @yield('content')


  <x-admin-footer-component/>


  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
@include('admin.layout.partials.foot')

</body>
</html>