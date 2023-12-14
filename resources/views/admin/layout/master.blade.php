@include('admin.layout.partials.head')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <x-admin-header-component />

    

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <x-admin-footer-component />

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('admin.layout.partials.foot')
</body>

</html>