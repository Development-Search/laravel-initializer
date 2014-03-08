@extends('frontend.layouts.default')

{{-- title --}}
@section('title')
Forgot password
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
<h1>Please check your email</h1>
<p>We'll send you a password reset email. Please check your inbox first, and then click the link to reset your password.</p>
@stop
