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

				{!! Form::model(new App\Oprec, ['route'=>['oprec.store'],'files'=>true]) !!}
				<div class="form-group">
					{!! Form::label('name','Open Recruitment Name', ['class'=>'col-md-6 control-label']) !!}
					{!! Form::text('name','',array('class'=>'name form-control','placeholder'=>'Name')) !!}
				</div>

				<div class="form-group">
					{!! Form::label('max','Max Field/Person', ['class'=>'col-md-4 control-label']) !!}
					{!! Form::text('max','',array('class'=>'name form-control','placeholder'=>'Name')) !!}
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