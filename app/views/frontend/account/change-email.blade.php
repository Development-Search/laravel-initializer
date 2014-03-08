@extends('frontend.layouts.account')

{{-- title --}}
@section('title')
Change your email
@parent
@stop

{{-- styles --}}
@section('styles')
@parent
{{-- HTML::style('css/frontend/*.css') --}}
@stop

{{-- scripts --}}
@section('scripts')
@parent
{{-- HTML::script('js/frontend/*.js') --}}
<script type="text/javascript">

</script>
@stop

{{-- content --}}
@section('account-content')
<form action="{{ route('account.change-email.process') }}" method="POST" role="form">
	<h2>Change your email</h2>
	
	{{-- New Email --}}
	<div class="form-group {{ $errors->first('email', ' has-error has-feedback') }}">
		<label for="email">New email: </label>
    	<input id="email" name="email" type="text" class="form-control"  placeholder="Your new email" required="" autofocus="" value="{{ Input::old('email') }}">
		{{ $errors->first('email', '<label class="control-label" for="email">:message</label>') }}
	</div>

	{{-- Confirm New Email --}}
	<div class="form-group {{ $errors->first('email_confirm', ' has-error has-feedback') }}">
		<label for="email_confirm">Confirm new email: </label>
    	<input id="email_confirm" name="email_confirm" type="text" class="form-control"  placeholder="Confirm your new email" required="" value="{{ Input::old('email_confirm') }}">
		{{ $errors->first('email_confirm', '<label class="control-label" for="email_confirm">:message</label>') }}
	</div>

	{{-- Current Password --}}
	<div class="form-group {{ $errors->first('current_password', ' has-error has-feedback') }}">
		<label for="current_password">Current password: </label>
    	<input id="current_password" name="current_password" type="password" class="form-control"  placeholder="Your current password" required="" value="{{ Input::old('current_password') }}">
		{{ $errors->first('current_password', '<label class="control-label" for="current_password">:message</label>') }}
	</div>

	{{-- CSRF Token --}}
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	
	<button class="btn btn-primary pull-right" type="submit">Update</button>
</form>
@stop
