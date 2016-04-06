

<div class="container-fluid" style="background: url('{{asset('/public/assets/img/bg-login.png')}}');background-size:cover;padding-bottom: 10%">
	<div class="row">
		<div class="col-md-12">
			<img  style="margin: 1%" src="{{asset('/public/assets/img/logo.png')}}">

			
		</div>
		<div class="col-md-12">
			<hr>
		</div>
		<div class="col-md-6 col-md-offset-3">

			<div class="panel panel-primary">
				<div class="panel-heading">
					<center>
						<h2>
							LOGIN HERE
						</h2>

					</center>
				</div>

				<div class="panel-body">
					{!! Form::open(array('action'=>'UserController@authentication')) !!}
					

					<div class="form-group">
						{!! Form::label('username','Username/email', ['class'=>'col-md-4 control-label']) !!}

						{!! Form::text('username',null,array('class'=>'form-control','placeholder'=>'username/email')) !!}

					</div>


					<div class="form-group ">
						{!! Form::label('password','Password', ['class'=>'col-md-4 control-label']) !!}

						{!! Form::password('password', array('class'=>'pass form-control','placeholder'=>'your password')) !!}

					</div>

					<div class="col-md-6 col-md-offset-3 ">
						
						{!! Form::submit('LOGIN', ['class'=>'btn form-control btn-primary']) !!}
					</div>

					{!! Form::close() !!}

				</div>
				<center><p>Not registered yet? Sign Up <a href="{{url('/')}}">here</a></p></center>
			</div>
		</div>
	</div>
</div>

