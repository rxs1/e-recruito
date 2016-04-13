<?php $user = session()->get('isLogin') ?>
<!DOCTYPE html>
<html>
<head>
	@include('head')
</head>
<body>
	@include('user.user-nav')
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">

					<div class="panel panel-primary">
						<div class="panel-heading">
							<center>
								<h2>
									UPDATE PROFILE
								</h2>

							</center>
						</div>

						<div class="panel-body">
							{!!Form::open(array('action'=>'UserController@editProfile','files'=>true))!!}

							@foreach($errors->all() as $error)
							<p class='alert alert-danger'>{{$error}}</p>
							@endforeach

							<div class="form-group">
								{!! Form::label('foto','Avatar', ['class'=>'col-md-4 control-label']) !!}
								
								<div class="col-md-4">
									<img style="margin-bottom: 5%" height="150" width="`150" class="img-circle" src="{{url('/public/assets/img/avatar/'.$user['foto'])}}">
								</div>
								<div class="col-md-8">
									{!! Form::file('foto',array('class'=>'foto form-control')) !!}
								</div>
							</div>
							<div class="col-md-12">
								<hr>
							</div>
							<div class="form-group" >
								{!! Form::label('name','Name', ['class'=>'col-md-4 control-label']) !!}

								{!! Form::text('name',$user['name'],array('class'=>'form-control','placeholder'=>'Your name')) !!}

							</div>

							<div class="form-group">
								{!! Form::label('username','Username', ['class'=>'col-md-4 control-label']) !!}

								{!! Form::text('username',$user['username'],array('class'=>'form-control','placeholder'=>'username without space')) !!}

							</div>

							<div class="form-group">
								{!! Form::label('email','Email', ['class'=>'col-md-4 control-label']) !!}

								{!! Form::text('email',$user['email'],array('class'=>'email form-control','placeholder'=>'xyz@example.com')) !!}

							</div>

							<div class="col-md-6 col-md-offset-3">

								{!! Form::submit('UPDATE', ['class'=>'btn btn-primary form-control']) !!}

							</div>
							{!! Form::close() !!}

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	@include('footer')
</body>
</html>