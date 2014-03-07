<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="description" content="">
    <title>
    @section('title')
      ｜laravel-initializer backend
    @show
    </title>

    {{-- Bootstrap core CSS --}}
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/bootstrap-theme.min.css') }}
    {{ HTML::style('css/font-awesome.min.css') }}
    {{-- Global styles for backend --}}
    {{ HTML::style('css/frontend/base.css') }}

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
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}">
	<link rel="apple-touch-icon-precomposed" href="{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}">
	<link rel="shortcut icon" href="{{ asset('assets/ico/favicon.png') }}">
  </head>
  <body>

  	{{-- Navbar --}}
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="{{ route('home') }}"><i class="fa fa-home fa-fw"></i> MyProject</a>
	    </div>

	    {{-- Collect the nav links, forms, and other content for toggling --}}
	    {{-- 
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="#">Link</a></li>
	        <li><a href="#">Link</a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Action</a></li>
	            <li><a href="#">Another action</a></li>
	            <li><a href="#">Something else here</a></li>
	            <li class="divider"></li>
	            <li><a href="#">Separated link</a></li>
	            <li class="divider"></li>
	            <li><a href="#">One more separated link</a></li>
	          </ul>
	        </li>
	      </ul> --}}

	      {{-- Search --}}
	      {{-- <form class="navbar-form navbar-left" role="search">
	        <div class="form-group">
	          <input type="text" class="form-control" placeholder="Search">
	        </div>
	        <button type="submit" class="btn btn-default">Submit</button>
	      </form> --}}

	      <ul class="nav navbar-nav navbar-right">
	        @if (Sentry::check())
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hi, {{ Sentry::getUser()->first_name }} <b class="caret"></b></a>
		          <ul class="dropdown-menu">
		            <li><a href="{{ route('account.profile.index') }}"><i class="fa fa-user fa-fw"></i> My profile</a></li>
					@if(Sentry::getUser()->hasAccess('admin'))
					<li><a href="{{ route('admin.index') }}"><i class="fa fa-cog fa-fw"></i> Administration</a></li>
					@endif
		            <li class="divider"></li>
		            <li><a href="{{ route('auth.logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
		          </ul>
		        </li>
	        @else
				<li {{ (Request::is('signin') ? 'class="active"' : '') }}><a href="{{ route('auth.signin.index') }}"><i class="fa fa-sign-in fa-fw"></i> Sign in</a></li>
	        	<li {{ (Request::is('signup') ? 'class="active"' : '') }}><a href="{{ route('auth.signup.index') }}"><i class="fa fa-book fa-fw"></i> Sign up</a></li>
	        @endif
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	{{-- Container --}}
    <div class="container">

		{{-- Notifications --}}
		@include('frontend.layouts.notifications')

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
