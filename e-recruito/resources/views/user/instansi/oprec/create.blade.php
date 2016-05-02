<!DOCTYPE html>
<html>
<head>
	@include('head')
</head>
<body>
	@include('nav')
	<div class="container" style="margin-top: 10%">
		<div class="col-md-12">
			<h2> Create Oprec</h2>
			<hr>
			<div class="col-md-6 col-md-offset-1">
				@foreach($errors->all() as $error) 
				<p class='alert alert-danger'>{{$error}}</p>
				@endforeach
				
				{!! Form::model(new App\Oprec, ['route'=>['oprec.store'],'files'=>true]) !!}
				<div class="form-group">
					{!! Form::label('name','Open Recruitment Name', ['class'=>'col-md-6 control-label']) !!}
					{!! Form::text('name','',array('class'=>'name form-control','placeholder'=>'Name')) !!}
				</div>

				<div class="form-group">
					{!! Form::label('max-field-person','Max Field/Person', ['class'=>'col-md-4 control-label']) !!}
					{!! Form::input('number','max-field-person','',array('class'=>'name form-control','placeholder'=>'1','min'=>'1')) !!}
				</div>
				<div class="col-md-4 col-md-offset-8">
					{!! Form::hidden('idinstansi',$idinstansi) !!}
					{!! Form::submit('Create', ['class'=>'btn btn-primary form-control']) !!}
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	@include('footer')

</body>
</html>