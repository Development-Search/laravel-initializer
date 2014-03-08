@extends('backend.layouts.default')

{{-- title --}}
@section('title')
User Management @parent
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
<h1>User Management</h1>
<p>manage your users.</p>
<a href="{{ route('user.create.index') }}" class="btn btn-primary pull-right"><i class="fa fa-plus fa-fw"></i> Create</a>

<ul class="nav nav-tabs">
  <li{{ (Request::is('admin/users'))? ' class="active"' : '' }}><a href="{{ route('user.index') }}">Activated <span class="badge">{{{ $activated_users_count }}}</span></a></li>
  <li{{ (Request::is('admin/users/non-activate'))? ' class="active"' : '' }}><a href="{{ route('user.non-activate') }}">non-Activated <span class="badge">{{{ $non_activated_users_count }}}</span></a></li>
  <li{{ (Request::is('admin/users/deleted'))? ' class="active"' : '' }}><a href="{{ route('user.activate') }}">Deleted <span class="badge">{{{ $deleted_users_count }}}</span></a></li>
  <li{{ (Request::is('admin/users/all'))? ' class="active"' : '' }}><a href="{{ route('user.all') }}">All <span class="badge">{{{ $all_users_count }}}</span></a></li>
</ul>

<table class="table table-hover listed">
  <thead>
    <tr>
      <th>#</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Activated?</th>
      <th>Created at</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
  	@if ($users->count())
      @foreach ($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->first_name }}</td>
        <td>{{ $user->last_name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ ($user->isActivated() ? 'v' : 'x') }}</td>
        <td>{{ $user->created_at->diffForHumans() }}</td>
        <td>
          <a href="{{ route('user.update.index', $user->id) }}" class="btn btn-default">Edit</a>
          @if ( ! is_null($user->deleted_at))
            <a href="{{ route('user.restore.index', $user->id) }}" class="btn">Restore</a>
          @else
            @if (Sentry::getId() !== $user->id)
              <a href="{{ route('user.delete.index', $user->id) }}" class="btn">Delete</a>
            @else
              <a class="btn disabled">Delete</a>
            @endif
          @endif
        </td>
      </tr>
      @endforeach
    @else
    <tr>
      <td colspan="7" class="text-center">There are no data to list.</td>
    </tr>
    @endif
  </tbody>
</table>

<div class="text-center">
{{ $users->links() }}
</div>
@stop
