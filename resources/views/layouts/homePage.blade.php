<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AboveMax</title>
    @include('panels.style')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    @include('panels.navbar')
    @include('panels.sidebar')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        @yield('content')
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    @include('panels.footer')
</div>
<!-- ./wrapper -->
@include('panels.scripts')
</body>
</html>
