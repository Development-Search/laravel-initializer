@extends('frontend.layouts.account')

{{-- title --}}
@section('title')
Change your password
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
<form action="{{ route('account.change-password.process') }}" method="POST" role="form">
	<h2>Change your Password</h2>
	
	{{-- Old Password --}}
	<div class="form-group {{ $errors->first('old_password', ' has-error has-feedback') }}">
		<label for="old_password">Current password: </label>
    	<input id="old_password" name="old_password" type="password" class="form-control"  placeholder="Your current password" required="" autofocus="" value="{{ Input::old('old_password') }}">
		{{ $errors->first('old_password', '<label class="control-label" for="old_password">:message</label>') }}
	</div>

	{{-- New Password --}}
	<div class="form-group {{ $errors->first('password', ' has-error has-feedback') }}">
		<label for="password">New password: </label>
    	<input id="password" name="password" type="password" class="form-control"  placeholder="Your first name" required="" value="{{ Input::old('password') }}">
		{{ $errors->first('password', '<label class="control-label" for="password">:message</label>') }}
	</div>

	{{-- Confirm New Password --}}
	<div class="form-group {{ $errors->first('password_confirm', ' has-error has-feedback') }}">
		<label for="password_confirm">Confirm new password: </label>
    	<input id="password_confirm" name="password_confirm" type="password" class="form-control"  placeholder="Your first name" required="" value="{{ Input::old('password_confirm') }}">
		{{ $errors->first('password_confirm', '<label class="control-label" for="password_confirm">:message</label>') }}
	</div>

	{{-- CSRF Token --}}
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	
	<button class="btn btn-primary pull-right" type="submit">Update</button>
</form>
@stop
