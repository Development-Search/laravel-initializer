@extends('frontend.layouts.default')

{{-- title --}}
@section('title')
Signin
@parent
@stop

{{-- styles --}}
@section('styles')
@parent
{{ HTML::style('css/frontend/signup.css') }}
{{-- HTML::style('css/*.css') --}}
@stop

{{-- scripts --}}
@section('scripts')
@parent
{{-- HTML::script('js/*.js') --}}
<script type="text/javascript">

</script>
@stop

{{-- content --}}
@section('content')
<form class="form-signup" action="{{ route('auth.signup.process') }}" method="POST" role="form" autocomplete="off">
	<h2 class="form-signup-heading">Sign up</h2>
	
	{{-- Email --}}
	<div class="form-group {{ $errors->first('email', ' has-error has-feedback') }}">
		<input id="email" name="email" type="email" class="form-control form-signup-email" placeholder="Email address" value="{{ Input::old('email') }}" required="" autofocus="">
		{{ $errors->first('email', '<label class="control-label" for="email">:message</label>') }}
	</div>

	{{-- Password --}}
	<div class="form-group {{ $errors->first('password', ' has-error has-feedback') }}">
		<input id="password" name="password" type="password" class="form-control form-signup-password" placeholder="Password" required="">
		{{ $errors->first('password', '<label class="control-label" for="password">:message</label>') }}
	</div>
	
	{{-- Password Confirm --}}
	<div class="form-group {{ $errors->first('password_confirm', ' has-error has-feedback') }}">
		<input id="password_confirm" name="password_confirm" type="password" class="form-control form-signup-password_confirm"placeholder="Password Confirm" required="">
		{{ $errors->first('password_confirm', '<label class="control-label" for="password_confirm">:message</label>') }}
	</div>

	{{-- TOS --}}
	<label class="checkbox">
	  <input id="tos" name="tos" type="checkbox" value="1" required="" checked=""> I already accept the <a href="{{ route('tos') }}" target="_blank">terms of service</a>
	</label>
	{{ $errors->first('tos', '<div class="form-group has-error"><label class=" control-label" for="tos">:message</label></div>') }}

	{{-- CSRF Token --}}
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
</form>

<p class="more-actions">
    <a href="{{ route('auth.signin.index') }}" rel="nofollow">Sign in</a> /
    <a href="{{ route('auth.forgot-password.index') }}" rel="nofollow">Forget password?</a> /
    <a href="{{ route('auth.resend-activation.index') }}" rel="nofollow">Resend activation mail</a>
</p>
@stop
