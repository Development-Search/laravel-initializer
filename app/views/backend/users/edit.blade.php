@extends('backend.layouts.default')

{{-- title --}}
@section('title')
Update a User @parent
@stop

{{-- styles --}}
@section('styles')
@parent
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
<div class="page-header">
	<h2>Update a User</h2>
	<a href="{{ route('user.index') }}" class="btn btn-primary pull-right"><i class="fa fa-caret-left fa-fw"></i> Back</a>
</div>

<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
	<li><a href="#tab-permissions" data-toggle="tab">Permissions</a></li>
</ul>

<form action="" method="POST" role="form" class="listed">
	<div class="tab-content">
		<div id="tab-general" class="tab-pane active">
		
			{{-- First Name --}}
			<div class="form-group {{ $errors->first('first_name', ' has-error has-feedback') }}">
				<label for="first_name">First name: </label>
		    	<input id="first_name" name="first_name" type="text" class="form-control"  placeholder="Your first name" required="" autofocus="" value="{{ Input::old('first_name', $user->first_name) }}">
				{{ $errors->first('first_name', '<label class="control-label" for="first_name">:message</label>') }}
			</div>

			{{-- Last Name --}}
			<div class="form-group {{ $errors->first('last_name', ' has-error has-feedback') }}">
				<label for="last_name">Last name: </label>
		    	<input id="last_name" name="last_name" type="text" class="form-control"  placeholder="Your last name" required="" value="{{ Input::old('last_name', $user->last_name) }}">
				{{ $errors->first('last_name', '<label class="control-label" for="last_name">:message</label>') }}
			</div>

			{{-- Email --}}
			<div class="form-group {{ $errors->first('email', ' has-error') }}">
				<label for="email">Email: </label>
		    	<input id="email" name="email" type="text" class="form-control"  placeholder="Your email" required="" value="{{ Input::old('email', $user->email) }}">
				{{ $errors->first('email', '<label class="control-label" for="email">:message</label>') }}
			</div>

			{{-- Password --}}
			<div class="form-group {{ $errors->first('password', ' has-error') }}">
				<label for="password">Password: </label>
		    	<input id="password" name="password" type="password" class="form-control"  placeholder="Your password" required="" value="">
				{{ $errors->first('password', '<label class="control-label" for="password">:message</label>') }}
			</div>
			
			{{-- Confirm Password --}}
			<div class="form-group {{ $errors->first('password_confirm', ' has-error has-feedback') }}">
				<label for="password_confirm">Confirm password: </label>
		    	<input id="password_confirm" name="password_confirm" type="password" class="form-control"  placeholder="Confirm password" required="" value="">
				{{ $errors->first('password_confirm', '<label class="control-label" for="password_confirm">:message</label>') }}
			</div>

			{{-- Activation Status --}}
			<div class="form-group {{ $errors->has('activated') ? 'error' : '' }}">
				<label for="activated">User Activated</label>
					<select id="activated" name="activated" class="form-control"{{ ($user->id === Sentry::getId() ? ' disabled="disabled"' : '') }}>
						<option value="1"{{ ($user->isActivated() ? ' selected="selected"' : '') }}>@lang('general.yes')</option>
						<option value="0"{{ ( ! $user->isActivated() ? ' selected="selected"' : '') }}>@lang('general.no')</option>
					</select>
					{{ $errors->first('activated', '<span class="help-inline">:message</span>') }}
			</div>

			{{-- Groups --}}
			<div class="form-group {{ $errors->has('groups') ? 'error' : '' }}">
				<label for="groups">Groups</label>
				<select name="groups[]" id="groups[]" multiple class="form-control">
					@foreach ($groups as $group)
					<option value="{{ $group->id }}"{{ (array_key_exists($group->id, $userGroups) ? ' selected="selected"' : '') }}>{{ $group->name }}</option>
					@endforeach
				</select>

				<span class="help-block">
					Select a group to assign to the user, remember that a user takes on the permissions of the group they are assigned.
				</span>
			</div>
		</div>

		<div id="tab-permissions" class="tab-pane">
			<div class="controls">
				<div class="control-group">

					@foreach ($permissions as $area => $permissions)
					<fieldset>
						<legend>{{ $area }}</legend>

						@foreach ($permissions as $permission)
						<div class="control-group">
							<label class="control-group">{{ $permission['label'] }}</label>

							<div class="radio inline">
								<label for="{{ $permission['permission'] }}_allow" onclick="">
									<input type="radio" value="1" id="{{ $permission['permission'] }}_allow" name="permissions[{{ $permission['permission'] }}]"{{ (array_get($userPermissions, $permission['permission']) === 1 ? ' checked="checked"' : '') }}>
									Allow
								</label>
							</div>

							<div class="radio inline">
								<label for="{{ $permission['permission'] }}_deny" onclick="">
									<input type="radio" value="-1" id="{{ $permission['permission'] }}_deny" name="permissions[{{ $permission['permission'] }}]"{{ (array_get($userPermissions, $permission['permission']) === -1 ? ' checked="checked"' : '') }}>
									Deny
								</label>
							</div>

							@if ($permission['can_inherit'])
							<div class="radio inline">
								<label for="{{ $permission['permission'] }}_inherit" onclick="">
									<input type="radio" value="0" id="{{ $permission['permission'] }}_inherit" name="permissions[{{ $permission['permission'] }}]"{{ ( ! array_get($userPermissions, $permission['permission']) ? ' checked="checked"' : '') }}>
									Inherit
								</label>
							</div>
							@endif
						</div>
						@endforeach

					</fieldset>
					@endforeach

				</div>
			</div>
		</div>

		{{-- CSRF Token --}}
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		
		<div class="row">
			<div class="col-md-1 pull-right">
				<button class="btn btn-primary pull-right" type="submit">Update</button>
			</div>
		</div>
	</div>
</form>
@stop
