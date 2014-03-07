@extends('frontend.layouts.default')

{{-- title --}}
@section('title')
Reset your password
@parent
@stop

{{-- styles --}}
@section('styles')
@parent
{{ HTML::style('css/frontend/forgot-password.css') }}
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
<form class="form-forgot" action="" method="POST" role="form" autocomplete="off">
	<h2 class="form-forgot-heading">Reset your password</h2>

	{{-- Password --}}
	<div class="form-group {{ $errors->first('password', ' has-error has-feedback') }}">
		<input id="password" name="password" type="password" class="form-control form-forgot-password" placeholder="Password" autofocus="" required="">
		{{ $errors->first('password', '<label class="control-label" for="password">:message</label>') }}
	</div>
	
	{{-- Password Confirm --}}
	<div class="form-group {{ $errors->first('password_confirm', ' has-error has-feedback') }}">
		<input id="password_confirm" name="password_confirm" type="password" class="form-control form-forgot-password_confirm"placeholder="Password Confirm" required="">
		{{ $errors->first('password_confirm', '<label class="control-label" for="password_confirm">:message</label>') }}
	</div>

	{{-- CSRF Token --}}
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<button class="btn btn-lg btn-primary btn-block" type="submit">Reset</button>
</form>

<p class="more-actions">
    <a href="{{ route('auth.signup.index') }}" rel="nofollow">Sign up</a> /
    <a href="{{ route('auth.signin.index') }}" rel="nofollow">Sign in</a> /
    <a href="{{ route('auth.resend-activation.index') }}" rel="nofollow">Resend activation mail</a>
</p>
@stop
