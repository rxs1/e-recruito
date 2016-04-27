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
						{!! Form::model($user, ['method'=>'PATCH', 'route'=>['user.update', $user->id],'files'=>true]) !!}
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
							{!! Form::label('name','Name', ['class'=>'col-md-4 control-label', 'placeholder'=>'Enter the name']) !!}

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

						<div class="form-group" >
							{!! Form::label('motto','Motto', ['class'=>'col-md-4 control-label']) !!}

							{!! Form::text('motto',$user['motto'],array('class'=>'form-control','placeholder'=>'ex: Always Be the One')) !!}
						</div>

						<div class="form-group" >
							{!! Form::label('region','Region', ['class'=>'col-md-4 control-label']) !!}

							{!! Form::text('region',$user['region'],array('class'=>'form-control','placeholder'=>'Depok')) !!}

						</div>

						<div class="form-group" >
							{!! Form::label('profesi','Profession', ['class'=>'col-md-4 control-label']) !!}

							{!! Form::text('profesi',$user['profesi'],array('class'=>'form-control','placeholder'=>'Student')) !!}
						</div>

						<div class="form-group" >
							{!! Form::label('birthdate','Birthday', ['class'=>'col-md-4 control-label']) !!}
							<br>
							<p style="text-align: left;float: left">
								User's Birthday = 
								@if(!$user['birthdate'])
								Not Define
								@endif
								{{$user['birthdate']}}
							</p> 
							<input name="birthdate" type="date" class="form-control">
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