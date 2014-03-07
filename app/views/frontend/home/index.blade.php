@extends('frontend.layouts.default')

{{-- title --}}
@section('title')
Homepage
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
<h1>Homepage</h1>
<p>Welcome! This is your homepage.</p>
@stop