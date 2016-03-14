<html>

<head>
	
</head>
<body>
	
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<h1>tes</h1>
		
		<hr>
	
		{!! Form::open(array('action'=>'SusuController@login')) !!}
		{!! Form::label('email','USERNAME') !!}
		<br>
		{!! Form::text('email','',['class'=>'username form-control','required' => 'required']) !!}
		<br><br>
		{!! Form::label('pass','PASSWORD') !!}
		<br>
		{!! Form::password('pass',['class'=>'pass form-control','required' => 'required']) !!}
		<br><br>
		<center>{!! Form::submit('Login',array('class'=>'btn btn-lg btn-primary')) !!}</center>
		{!! Form::close() !!}
	</div>
	<div class="col-md-4"></div>
</body>

</html>
