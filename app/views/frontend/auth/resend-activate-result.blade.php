@extends('frontend.layouts.default')

{{-- title --}}
@section('title')
Resend activation code
@parent
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
<h1>Please check your email</h1>
<p>We'll send you a activation code email. Please check your inbox first, and then click the link to activate your account.</p>
@stop
