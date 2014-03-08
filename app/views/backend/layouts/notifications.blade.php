@if ($errors->any())
<div class="alert alert-dismissable alert-danger backend-hud">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>Error</strong> Please check the form below for errors
</div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-dismissable alert-success backend-hud">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Success!</strong> {{ $message }}
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-dismissable alert-danger backend-hud">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>Error!</strong> {{ $message }}
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-dismissable alert-warning backend-hud">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>Warning!</strong> {{ $message }}
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-dismissable alert-info backend-hud">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>Info</strong> {{ $message }}
</div>
@endif
