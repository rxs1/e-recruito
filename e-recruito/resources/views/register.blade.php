<html>
	<head>

	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default">
						<div class="panel-heading">Register</div>
						<div class="panel-body">
							{!! Form::open(array('url'=>'/register')) !!}
							<div class="form-group">
							{!! Form::label('name','Name', ['class'=>'col-md-4 control-label']) !!}
							<div class="col-md-6">
							{!! Form::text('name',null,array('class'=>'form-control','placeholder'=>'Your name')) !!}
							</div></div>

							<div class="form-group">
							{!! Form::label('email','Email', ['class'=>'col-md-4 control-label']) !!}
							<div class="col-md-6">
							{!! Form::text('email',null,array('class'=>'username form-control','placeholder'=>'xyz@example.com')) !!}
							</div></div>

							<div class="form-group">
							{!! Form::label('password','Password', ['class'=>'col-md-4 control-label']) !!}
							<div class="col-md-6">
							{!! Form::password('password', array('class'=>'pass form-control','placeholder'=>'your password')) !!}
						 	</div></div>

						 	<div class="form-group">
						 	{!! Form::label('repassword', 'Confirm Password', ['class'=>'col-md-4 control-label']) !!}
						 	<div class="col-md-6">
							{!! Form::password('repassword', array('class'=>'pass form-control','placeholder'=>'re-type your password')) !!}
							</div></div>

							<div class="col-md-6 col-md-offset-4">
								{!! Form::submit('Register', ['class'=>'btn btn-lg btn-primary']) !!}
							</div>
							{!! Form::close() !!}

						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>