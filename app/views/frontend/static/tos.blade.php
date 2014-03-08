@extends('frontend.layouts.default')

{{-- title --}}
@section('title')
Terms of service
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
<h1>Terms of service</h1>
<p>The tos page</p>
@stop