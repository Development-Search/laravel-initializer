@extends('frontend.layouts.default')

{{-- title --}}
@section('title')

@parent
@stop

{{-- styles --}}
@section('styles')
@parent
{{-- HTML::style('css/frontend/*.css') --}}
@stop

{{-- scripts --}}
@section('scripts')
@parent
{{-- HTML::script('js/frontend/*.js') --}}
<script type="text/javascript">

</script>
@stop

{{-- content --}}
@section('content')

@stop