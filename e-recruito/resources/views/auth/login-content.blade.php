<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<img class="header" src="{{asset('/public/assets/img/logo.png')}}">
		</div>
		
		<div class="col-md-6 col-md-offset-3">
			@if(Session::get('message') == '1')
			<div class="alert alert-success">
				Your account has been created successfully, login now ! 
			</div>
			@endif




			<div class="panel panel-primary content">
				<div class="panel-heading">
					<center>
						<h2 id="greeting">
							LOGIN HERE
						</h2>

					</center>
				</div>

				<div class="panel-body">
					{!! Form::open(array('action'=>'UserController@authentication')) !!}
					@if(Session::get('error') == 1)
					<p class='alert alert-danger'>Wrong Password !</p>
					@elseif(Session::get('error') == 2)
					<p class='alert alert-danger'>Wrong Email !</p>
					
					@endif


					@foreach($errors->all() as $error)
					<p class='alert alert-danger'>{{$error}}</p>
					@endforeach

					<div class="form-group">
						{!! Form::label('email','Email', ['class'=>'col-md-4 control-label']) !!}

						{!! Form::text('email',null,array('class'=>'form-control','placeholder'=>'Enter your email')) !!}

					</div>


					<div class="form-group ">
						{!! Form::label('password','Password', ['class'=>'col-md-4 control-label']) !!}

						{!! Form::password('password', array('class'=>'pass form-control','placeholder'=>'Enter your password')) !!}

					</div>

					<div class="col-md-6 col-md-offset-3 ">

						{!! Form::submit('LOGIN', ['class'=>'btn form-control btn-primary']) !!}
					</div>

					{!! Form::close() !!}

				</div>
				<center><p>Not registered yet? Sign Up <a href="{{url('/signup')}}">here</a></p></center>
			</div>
		</div>
	</div>
</div>

