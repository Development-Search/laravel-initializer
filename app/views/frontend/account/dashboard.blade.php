@extends('frontend.layouts.account')

{{-- title --}}
@section('title')
Dashboard
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
@section('account-content')
<h2>Your dashboard</h2>
@stop