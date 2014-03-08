@extends('frontend.layouts.default')

{{-- title --}}
@section('title')
Signin
@parent
@stop

{{-- styles --}}
@section('styles')
@parent
{{ HTML::style('css/frontend/signin.css') }}
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
<form class="form-signin" action="{{ route('auth.signin.process') }}" method="POST" role="form">
	<h2 class="form-signin-heading">Sign in your account</h2>
	
	{{-- Email --}}
	<div class="form-group {{ $errors->first('email', ' has-error') }}">
		<input id="email" name="email" type="email" class="form-control" placeholder="Email address" required="" autofocus="" value="{{ Input::old('email') }}">
		{{ $errors->first('email', '<label class="control-label" for="email">:message</label>') }}
	</div>

	{{-- Password --}}
	<div class="form-group {{ $errors->first('password', ' has-error') }}">
		<input id="password" name="password" type="password" class="form-control" placeholder="Password" required="">
		{{ $errors->first('password', '<label class="control-label" for="password">:message</label>') }}
	</div>

	{{-- Remember me --}}
	<label class="checkbox">
	  <input id="remember-me" name="remember-me" type="checkbox" value="1"> Remember me
	</label>
	
	{{-- CSRF Token --}}
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>

<p class="more-actions">
    <a href="{{ route('auth.signup.index') }}" rel="nofollow">Sign up</a> /
    <a href="{{ route('auth.forgot-password.index') }}" rel="nofollow">Forget password?</a> /
    <a href="{{ route('auth.resend-activation.index') }}" rel="nofollow">Resend activation mail</a>
</p>
@stop