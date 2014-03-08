@extends('backend.layouts.default')

{{-- title --}}
@section('title')
Group Management @parent
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
<h1>Group Management</h1>
<p>manage your groups.</p>
<a href="{{ route('group.create.index') }}" class="btn btn-primary pull-right"><i class="fa fa-plus fa-fw"></i> Create</a>

<table class="table table-hover listed">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Amount</th>
      <th>Created at</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
  	@if ($groups->count())
      @foreach ($groups as $group)
      <tr>
        <td>{{ $group->id }}</td>
        <td>{{ $group->name }}</td>
        <td>{{ $group->users()->count() }}</td>
		<td>{{ $group->created_at->diffForHumans() }}</td>
        <td>
			<a href="{{ route('group.update.index', $group->id) }}" class="btn btn-default">Edit</a>
			<a href="{{ route('group.delete.index', $group->id) }}" class="btn">Delete</a>
        </td>
      </tr>
      @endforeach
    @else
    <tr>
      <td colspan="5" class="text-center">There are no data to list.</td>
    </tr>
    @endif
  </tbody>
</table>

<div class="text-center">
{{ $groups->links() }}
</div>
@stop
