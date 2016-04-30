<!DOCTYPE html>
<html>
<head>
	@include('head')
</head>
<body>
	@include('nav')
	<div class="container">
		<div class="col-md-12">
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
					{!! Form::input('number','max-field-person','',array('class'=>'name form-control','placeholder'=>'0')) !!}
				</div>

				<div class="form-group">
					{!! Form::label('deadline', 'Closed At', ['class'=>'col-md-4 control-label']) !!}
					<input name="deadline" type="date" class="form-control">
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