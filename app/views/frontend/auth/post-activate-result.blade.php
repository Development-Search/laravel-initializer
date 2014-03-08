@extends('frontend.layouts.default')

{{-- title --}}
@section('title')
Activation success!
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
<h1>Congradulation!</h1>
<p>Your account activation process was complete! Now <a href="{{ route('auth.signin.index') }}"signin</a> and start using your account.</p>
@stop