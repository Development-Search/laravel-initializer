@extends('frontend.layouts.default')

{{-- title --}}
@section('title')
Activation
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
<form class="form-activate" action="{{ route('auth.activate.check') }}" method="POST" role="form" autocomplete="off">
	<h2 class="form-activate-heading">Activate your account</h2>
	
	{{-- Activation Code --}}
	<div class="form-group {{ $errors->first('activation_code', ' has-error has-feedback') }}">
		<input id="activation_code" name="activation_code" type="text" class="form-control" placeholder="Your Activation Code" required="" autofocus="" value="{{ Input::old('activation_code') }}">
		{{ $errors->first('activation_code', '<label class="control-label" for="activation_code">:message</label>') }}
	</div>

	{{-- CSRF Token --}}
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<button class="btn btn-lg btn-primary btn-block" type="submit">Activate</button>
</form>

<p class="more-actions">
    <a href="{{ route('auth.signin.index') }}" rel="nofollow">Sign in</a> /
    <a href="{{ route('auth.forgot-password.index') }}" rel="nofollow">Forget password?</a> /
    <a href="{{ route('auth.resend-activation.index') }}" rel="nofollow">Resend activation mail</a>
</p>
@stop
