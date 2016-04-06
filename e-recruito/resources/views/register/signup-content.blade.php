

<div class="container-fluid" style="background: url('{{asset('/public/assets/img/bg-home.png')}}');background-size:cover;">
	<div class="row">
		<div class="col-md-12">
			<img  style="margin: 1%" src="{{asset('/public/assets/img/logo.png')}}">

			<p class="pull-right" style="margin: 3%"><b>Have an account click</b> <a href="{{url('/login')}}" class="btn btn-lg btn-primary">LOGIN</a></p>
		</div>

		<div class="col-md-6 col-md-offset-3">

			<div class="panel panel-primary">
				<div class="panel-heading">
					<center>
						<h2>
							SIGN UP
						</h2>
					</div>
				</center>


				<div class="panel-body">
					{!!Form::open(array('action'=>'UserController@create'))!!}

					@foreach($errors->all() as $error)
					<p class='alert alert-danger'>{{$error}}</p>
					@endforeach
					
					<div class="form-group" >
						{!! Form::label('name','Name', ['class'=>'col-md-4 control-label']) !!}

						{!! Form::text('name',null,array('class'=>'form-control','placeholder'=>'Your name')) !!}

					</div>

					<div class="form-group">
						{!! Form::label('username','Username', ['class'=>'col-md-4 control-label']) !!}

						{!! Form::text('username',null,array('class'=>'form-control','placeholder'=>'username without space')) !!}

					</div>

					<div class="form-group">
						{!! Form::label('email','Email', ['class'=>'col-md-4 control-label']) !!}

						{!! Form::text('email',null,array('class'=>'email form-control','placeholder'=>'xyz@example.com')) !!}

					</div>

					<div class="form-group ">
						{!! Form::label('password','Password', ['class'=>'col-md-4 control-label']) !!}

						{!! Form::password('password', array('class'=>'pass form-control','placeholder'=>'your password')) !!}

					</div>

					<div class="form-group ">
						{!! Form::label('repassword', 'Confirm Password', ['class'=>'col-md-4 control-label']) !!}

						{!! Form::password('repassword', array('class'=>'pass  form-control','placeholder'=>'re-type your password')) !!}

					</div>
					<div class="col-md-6 col-md-offset-4">
						<br><br>
						{!! Form::submit('SIGN UP', ['class'=>'btn btn-lg btn-primary']) !!}
					</div>
					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
</div>

