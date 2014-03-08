@extends('frontend.layouts.default')

{{-- title --}}
@section('title')
Update your profile
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
<form class="form-activate" action="{{ route('auth.post-activation') }}" method="POST" role="form" autocomplete="off">
	<h2 class="form-activate-heading">Update your profile</h2>
	
	{{-- First Name --}}
	<div class="form-group {{ $errors->first('first_name', ' has-error has-feedback') }}">
		<input id="first_name" name="first_name" type="text" class="form-control" placeholder="First name" required="" autofocus="" value="{{ Input::old('first_name') }}">
		{{ $errors->first('first_name', '<label class="control-label" for="first_name">:message</label>') }}
	</div>

	{{-- Last Name --}}
	<div class="form-group {{ $errors->first('last_name', ' has-error has-feedback') }}">
		<input id="last_name" name="last_name" type="text" class="form-control" placeholder="Last name" required="" value="{{ Input::old('last_name') }}">
		{{ $errors->first('last_name', '<label class="control-label" for="last_name">:message</label>') }}
	</div>

	{{-- CSRF Token --}}
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	{{-- Activation Code --}}
	<input type="hidden" name="activation_code" value="{{ $activationCode }}">

	<button class="btn btn-lg btn-primary btn-block" type="submit">Save</button>
</form>
@stop
