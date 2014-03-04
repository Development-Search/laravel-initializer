@extends('layouts.frontend_base')

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

{{-- main --}}
@section('main')
<h1>Homepage</h1>
@stop