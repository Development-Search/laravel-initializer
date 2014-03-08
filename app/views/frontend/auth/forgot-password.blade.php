@extends('frontend.layouts.default')

{{-- title --}}
@section('title')
Activation
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
<form class="form-forgot" action="{{ route('auth.forgot-password.index') }}" method="POST" role="form">
	<h2 class="form-forgot-heading">Forgot password?</h2>
	
	{{-- Email --}}
	<div class="form-group {{ $errors->first('email', ' has-error has-feedback') }}">
		<input id="email" name="email" type="text" class="form-control" placeholder="Your Email" required="" autofocus="" value="{{ Input::old('email') }}">
		{{ $errors->first('email', '<label class="control-label" for="email">:message</label>') }}
	</div>

	{{-- CSRF Token --}}
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
</form>

<p class="more-actions">
    <a href="{{ route('auth.signup.index') }}" rel="nofollow">Sign up</a> / 
    <a href="{{ route('auth.signin.index') }}" rel="nofollow">Sign in</a> / 
    <a href="{{ route('auth.resend-activation.index') }}" rel="nofollow">Resend activation mail</a>
</p>
@stop
