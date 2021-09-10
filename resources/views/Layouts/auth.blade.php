<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title')</title>
    @include('Includes.header')
  </head>
  <body
    class="hold-transition login-page"
  >
    @include('Includes.preloader')
    @yield('content')

    <!-- jQuery -->
    @stack('script-sebelum')
    @include('Includes.script')
    @stack('script-sesudah')
  </body>
</html>
