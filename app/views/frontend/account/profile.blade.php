@extends('frontend.layouts.account')

{{-- title --}}
@section('title')
Profile
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
<form action="{{ route('account.profile.process') }}" method="POST" role="form">
	<h2>Update your profile</h2>
	
	{{-- First Name --}}
	<div class="form-group {{ $errors->first('first_name', ' has-error has-feedback') }}">
		<label for="first_name">First name: </label>
    	<input id="first_name" name="first_name" type="text" class="form-control"  placeholder="Your first name" required="" autofocus="" value="{{ Input::old('first_name') }}">
		{{ $errors->first('first_name', '<label class="control-label" for="first_name">:message</label>') }}
	</div>

	{{-- Last Name --}}
	<div class="form-group {{ $errors->first('last_name', ' has-error has-feedback') }}">
		<label for="last_name">Last name: </label>
    	<input id="last_name" name="last_name" type="text" class="form-control"  placeholder="Your last name" required="" value="{{ Input::old('last_name') }}">
		{{ $errors->first('last_name', '<label class="control-label" for="last_name">:message</label>') }}
	</div>

	{{-- CSRF Token --}}
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	
	<button class="btn btn-primary pull-right" type="submit">Update</button>
</form>
@stop