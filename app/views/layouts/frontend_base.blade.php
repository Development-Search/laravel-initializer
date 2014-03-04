<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
    @section('title')
      ｜laravel-initializer
    @show
    </title>

    <!-- Bootstrap -->
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/base.css') }}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    @section('styles')
    @show

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
  </head>
  <body>

    @yield('main')

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    {{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {{ HTML::script('js/bootstrap.min.js') }}

    @section('scripts')
    @show
  </body>
</html>