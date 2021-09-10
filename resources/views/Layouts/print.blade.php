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
  <body>
    <div class="col-12">
      @yield('content')
    </div>

    @stack('script-sebelum')
    @include('Includes.script')
    @stack('script-sesudah')
  </body>
</html>
