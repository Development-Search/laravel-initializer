@extends('backend.layouts.default')

{{-- title --}}
@section('title')
Create a group @parent
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
	<h2>Create a group</h2>
	<a href="{{ route('group.index') }}" class="btn btn-primary pull-right"><i class="fa fa-caret-left fa-fw"></i> Back</a>
</div>

<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
	<li><a href="#tab-permissions" data-toggle="tab">Permissions</a></li>
</ul>

<form action="" method="POST" role="form" class="listed">
	<div class="tab-content">
		<div id="tab-general" class="tab-pane active">

			{{-- Name --}}
			<div class="form-group {{ $errors->first('name', ' has-error has-feedback') }}">
				<label for="name">Name: </label>
		    	<input id="name" name="name" type="text" class="form-control"  placeholder="Group name" required="" value="{{ Input::old('name') }}">
				{{ $errors->first('name', '<label class="control-label" for="name">:message</label>') }}
			</div>
			
		</div>

		<div id="tab-permissions" class="tab-pane">
			<div class="control-group">
				<div class="controls">

					@foreach ($permissions as $area => $permissions)
					<fieldset>
						<legend>{{ $area }}</legend>

						@foreach ($permissions as $permission)
						<div class="control-group">
							<label class="control-group">{{ $permission['label'] }}</label>

							<div class="radio inline">
								<label for="{{ $permission['permission'] }}_allow" onclick="">
									<input type="radio" value="1" id="{{ $permission['permission'] }}_allow" name="permissions[{{ $permission['permission'] }}]"{{ (array_get($selectedPermissions, $permission['permission']) === 1 ? ' checked="checked"' : '') }}>
									Allow
								</label>
							</div>

							<div class="radio inline">
								<label for="{{ $permission['permission'] }}_deny" onclick="">
									<input type="radio" value="0" id="{{ $permission['permission'] }}_deny" name="permissions[{{ $permission['permission'] }}]"{{ ( ! array_get($selectedPermissions, $permission['permission']) ? ' checked="checked"' : '') }}>
									Deny
								</label>
							</div>
						</div>
						@endforeach

					</fieldset>
					@endforeach

				</div>
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
