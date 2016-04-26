<!DOCTYPE html>
<html>
<head>
	@include('head')
</head>
<body>
	@include ('nav')
	<div class="containter-fluid">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-primary">
					<div class="panel-heading">Edit data User</div>
					<div class="panel-body">
						{!! Form::model($user, ['method'=>'PATCH', 'route'=>['user.update', $user->id]]) !!}
						@foreach($errors->all() as $error) 
						<p class='alert alert-danger'>{{$error}}</p>
						@endforeach

						<div class="form-group" >
							{!! Form::label('username','Username', ['class'=>'col-md-4 control-label', 'placeholder'=>'enter the username']) !!}

							{!! Form::text('username',$user->username,array('class'=>' form-control')) !!}
						</div>

						<div class="form-group" >
							{!! Form::label('name','Full Name', ['class'=>'col-md-4 control-label', 'placeholder'=>'Enter the name']) !!}

							{!! Form::text('name',$user->name,array('class'=>' form-control')) !!}
						</div>

						<div class="form-group ">
							{!! Form::label('password','Password', ['class'=>'col-md-4 control-label']) !!}

							{!! Form::password('password', array('class'=>'pass form-control','placeholder'=>'Enter the password')) !!}
						</div>

						<div class="form-group">
							{!! Form::label('email','Email', ['class'=>'col-md-4 control-label']) !!}

							{!! Form::text('email',$user->email,array('class'=>'email form-control','placeholder'=>'Enter the email, example: xyz@example.com')) !!}
						</div>

						<div class="form-group">
							{!! Form::label('role','Role', ['class'=>'col-md-4 control-label']) !!}

							{!! Form::select('role', ['user','admin'], null, ['class'=>'col-md-2']) !!}
						</div>

						<br>
						<div class="col-md-6 col-md-offset-3">
							{!! Form::submit('Save', ['class'=>'btn btn-primary form-control']) !!}
						</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('footer')

</body>
</html>