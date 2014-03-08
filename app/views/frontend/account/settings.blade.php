@extends('frontend.layouts.account')

{{-- title --}}
@section('title')
Settings
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
<h2>Your Settings</h2>
@stop