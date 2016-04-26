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
					<div class="panel-heading">Tambah User</div>
					<div class="panel-body">
						{!! Form::model(new App\Users, ['route'=>['user.store']]) !!}
						@foreach($errors->all() as $error) 
						<p class='alert alert-danger'>{{$error}}</p>
						@endforeach

						<div class="form-group" >
							{!! Form::label('username','Username', ['class'=>'col-md-4 control-label']) !!}

							{!! Form::text('username',null,array('class'=>' form-control', 'placeholder'=>'enter the username')) !!}
						</div>

						<div class="form-group" >
							{!! Form::label('name','Full Name', ['class'=>'col-md-4 control-label']) !!}

							{!! Form::text('name',null,array('class'=>' form-control', 'placeholder'=>'Enter the name')) !!}
						</div>

						<div class="form-group ">
							{!! Form::label('password','Password', ['class'=>'col-md-4 control-label']) !!}

							{!! Form::password('password', array('class'=>'pass form-control','placeholder'=>'Enter the password')) !!}
						</div>

						<div class="form-group">
							{!! Form::label('email','Email', ['class'=>'col-md-4 control-label']) !!}

							{!! Form::text('email',null,array('class'=>'email form-control','placeholder'=>'Enter the email, example: xyz@example.com')) !!}
						</div>

						<div class="form-group">
							{!! Form::label('role','Role', ['class'=>'col-md-4 control-label']) !!}

							{!! Form::select('role', ['user','admin'], null, ['class'=>'col-md-2']) !!}
						</div>

						<br>
						<div class="col-md-6 col-md-offset-3">
							{!! Form::submit('Add User', ['class'=>'btn btn-primary form-control']) !!}
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