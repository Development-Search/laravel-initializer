@extends('backend.layouts.default')

{{-- title --}}
@section('title')
Dashboard
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
<h1>Dashboard</h1>
<p>manage your system using navigation.</p>
@stop
