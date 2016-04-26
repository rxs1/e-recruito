<!DOCTYPE html>
<html>
<head>
	@include('head')
</head>
<body>
	@include ('nav')
	<div class="containter-fluid">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Data Users</div>
					<div class="panel-body">
						@if(session()->get('isMessage') == 1)
						<div class="alert alert-success">
							Update profile success
						</div>
						@endif
						<table class="table table-hover table-striped">
							<tr><th>ID</th><th>Username</th><th>Name</th><th>Password</th><th>Foto</th><th>Email</th><th>Role</th><th>Edit</th><th>Delete</th></tr>
							@foreach($users as $user)
							<tr>
								{!! Form::open(['class'=>'form-inline', 'method'=>'DELETE', 'onsubmit' => 'return confirm("Are you sure?")', 'route'=>['user.destroy', $user->id]]) !!}
								<td>{{ $user->id }}</td>
								<td>{{ $user->username }}</td>
								<td><a href="{{ route('user.show', $user->id) }}">{{ $user->name }}</a></td>
								<td>{{ $user->password }}</td>
								<td>{{ $user->foto }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->role }}</td>
								<td>{!! link_to_route('user.edit', 'Edit', [$user->id], ['class'=>'btn btn-info']) !!}</td>
								<td>{!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
									{!! Form::close() !!}
								</tr>
								@endforeach
							</table>
							<p> {!! link_to_route('user.create', 'Tambah User baru') !!}</p>
							{!! $users->setPath('user') !!}
						</div>
					</div>
				</div>
			</div>
		</div>
		@include('footer')

	</body>
	</html>