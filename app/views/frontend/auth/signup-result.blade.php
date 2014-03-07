@extends('frontend.layouts.default')

{{-- title --}}
@section('title')
Signup success!
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
<h1>Thanks for you sign up!</h1>
<p>We'll send you a activation email. Please check your inbox first, then go <a href="{{ route('auth.activate') }}">activation page</a> to verify</p>
<p>Don't get the mail? We could <a href="{{ route('auth.resend-activation.index') }}">resend to you!</a></p>
@stop