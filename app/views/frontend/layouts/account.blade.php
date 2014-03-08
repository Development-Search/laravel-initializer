@extends('frontend.layouts.default')

@section('styles')
@parent
{{ HTML::style('css/frontend/profile.css') }}
{{-- HTML::style('css/frontend/*.css') --}}
@stop

{{-- content --}}
@section('content')
<div class="row">
	<div class="col-md-3">
		<div class="">
			<img src="http://placehold.it/255x255" class="img-responsive thumbnail profile-image" alt="profile image">
		</div>
		<ul class="nav nav-pills nav-stacked">
		  <li{{ Request::is('account') ? ' class="active"' : '' }}><a href="{{ route('account.index') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
		  <li{{ Request::is('account/profile') ? ' class="active"' : '' }}><a href="{{ route('account.profile.index') }}"><i class="fa fa-user fa-fw"></i> Profile</a></li>
		  <li{{ Request::is('account/change-password') ? ' class="active"' : '' }}><a href="{{ route('account.change-password.index') }}"><i class="fa fa-key fa-fw"></i> Change Password</a></li>
		  <li{{ Request::is('account/change-email') ? ' class="active"' : '' }}><a href="{{ route('account.change-email.index') }}"><i class="fa fa-envelope fa-fw"></i> Change Email</a></li>
		  <li{{ Request::is('account/settings') ? ' class="active"' : '' }}><a href="{{ route('account.settings.index') }}"><i class="fa fa-cogs fa-fw"></i> Settings</a></li>
		</ul>
	</div>
	<div class="col-md-9">
		@yield('account-content')
	</div>
</div>
@stop
