<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.js"></script>

    @include('Includes.header')

  </head>
  <body
    class=" hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed"
  >
    <div class="wrapper">
      <!-- Preloader -->
      @include('Includes.preloader')

      <!-- Navbar -->
      @include('Includes.navbar')
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      @include('Includes.sidebar')

      <!-- Content Wrapper. Contains page content -->
      @yield('content')
      <!-- /.content-wrapper -->

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script>
        $(document).ready( function () {
            $('#table-data').DataTable();
        } );
    </script>
    @stack('script-sebelum')
    @include('Includes.script')
    @stack('script-sesudah')
  </body>
</html>
