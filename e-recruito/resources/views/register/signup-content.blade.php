<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<img  class="header" src="{{asset('/public/assets/img/logo.png')}}">			
		</div>

		<div class="col-md-6 col-md-offset-3">

			<div class="panel panel-primary">
				<div class="panel-heading">
					<center>
						<h2 id="greeting">
							SIGN UP HERE
						</h2>
						
					</center>
				</div>

				<div class="panel-body">
					{!!Form::open(array('action'=>'UserController@register'))!!}

					@foreach($errors->all() as $error)
					<p class='alert alert-danger'>{{$error}}</p>
					@endforeach
					<!-- untuk cek satu error -->
					@if($errors->first('name'))
					{{$errors->first('name')}}
					@endif
					
					<div class="form-group" >
						{!! Form::label('name','Fullname', ['class'=>'col-md-4 control-label']) !!}

						{!! Form::text('name',null,array('class'=>' form-control','placeholder'=>'Enter your fullname')) !!}
					</div>

					<div class="form-group">
						{!! Form::label('email','Email', ['class'=>'col-md-4 control-label']) !!}
						{!! Form::text('email',null,array('class'=>'email form-control','placeholder'=>'Enter your email, example: xyz@example.com')) !!}
					</div>

					<div class="form-group ">
						{!! Form::label('password','Password', ['class'=>'col-md-4 control-label']) !!}
						{!! Form::password('password', array('class'=>'pass form-control','placeholder'=>'Enter your password')) !!}

					</div>

					<div class="form-group ">
						{!! Form::label('repassword', 'Confirm Password', ['class'=>'col-md-4 control-label']) !!}

						{!! Form::password('repassword', array('class'=>'pass  form-control','placeholder'=>'Repeat your password')) !!}

					</div>
					<div class="col-md-6 col-md-offset-3">

						{!! Form::submit('SIGN UP', ['class'=>'btn btn-primary form-control']) !!}
						<center>
							<p style="margin: 3%"><b>Already have account? login</b> <a href="{{url('/login')}}" >here</a></p>
						</center>
					</div>
					{!! Form::close() !!}
					
				</div>
			</div>
		</div>
	</div>
</div>

