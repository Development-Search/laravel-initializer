<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
    @section('title')
    | laravel-initializer backend
    @show
    </title>

    {{-- Bootstrap core CSS --}}
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/bootstrap-theme.min.css') }}
    {{ HTML::style('css/font-awesome.min.css') }}
    {{-- Global styles for backend --}}
    {{ HTML::style('css/backend/base.css') }}

    {{-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --}}
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	{{-- Custom styles for pages --}}
    @section('styles')
    @show

	{{-- Favicons --}}
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
  </head>
  <body>

	{{-- Navigation --}}
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ route('admin.index') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            {{-- <li class="{{ (Request::is('admin/groups') ? 'active' : '') }}"><a href="{{ route('') }}">Go</a></li> --}}
            <li class="dropdown{{ (Request::is('admin/users*|admin/groups*') ? ' active' : '') }}">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user fa-fw"></i> Users <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header">User Management</li>
                <li><a href="{{ route('user.index') }}"><i class="fa fa-user fa-fw"></i> Users</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Permission Setup</li>
                <li><a href="{{ route('group.index') }}"><i class="fa fa-group fa-fw"></i> Groups</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Sentry::getUser()->first_name }} <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class=""><a href="{{ route('home') }}"><i class="fa fa-globe fa-fw"></i> View Site</a></li>
                <li class=""><a href="#"><i class="fa fa-cog fa-fw"></i> Settings</a></li>
                <li class="divider"></li>
                <li><a href="{{ route('auth.logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
              </ul>
            </li>
            
          </ul>
        </div>{{--/.nav-collapse --}}
      </div>
    </div>

	{{-- Container --}}
    <div class="container">
		{{-- Notifications --}}
		@include('backend.layouts.notifications')

		{{-- Content --}}
		@yield('content')

		<hr>

		{{-- Footer --}}
		<footer>
			<p class="copyright text-right">&copy; laravel-initializer {{ date('Y') }}</p>
		</footer>
    </div>{{-- /.container --}}

    {{-- jQuery (necessary for Bootstrap's JavaScript plugins) --}}
    {{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}
    {{-- Include all compiled plugins (below), or include individual files as needed --}}
    {{ HTML::script('js/bootstrap.min.js') }}

	{{-- Custom scripts for pages --}}
    @section('scripts')
    @show
  </body>
</html>
