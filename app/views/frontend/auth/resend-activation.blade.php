@extends('frontend.layouts.default')

{{-- title --}}
@section('title')
Resend activation mail
@parent
@stop

{{-- styles --}}
@section('styles')
@parent
{{ HTML::style('css/frontend/activate.css') }}
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
<form class="form-activate" action="{{ route('auth.resend-activation.process') }}" method="POST" role="form" autocomplete="off">
	<h2 class="form-activate-heading">Resend activation mail</h2>
	
	{{-- Email --}}
	<div class="form-group {{ $errors->first('email', ' has-error has-feedback') }}">
		<input id="email" name="email" type="email" class="form-control" placeholder="Email address" value="{{ Input::old('email') }}" required="" autofocus="">
		{{ $errors->first('email', '<label class="control-label" for="email">:message</label>') }}
	</div>

	{{-- CSRF Token --}}
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<button class="btn btn-lg btn-primary btn-block" type="submit">Resend</button>
</form>

<p class="more-actions">
    <a href="{{ route('auth.signup.index') }}" rel="nofollow">Sign up</a> /
    <a href="{{ route('auth.signin.index') }}" rel="nofollow">Sign in</a> /
    <a href="{{ route('auth.forgot-password.index') }}" rel="nofollow">Forget password?</a>
</p>
@stop
