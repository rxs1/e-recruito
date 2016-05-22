<!DOCTYPE html>
<html>
<head>
	@include('user.instansi.headmyinstance')
</head>
<body>
	@include('nav')
	<div class="container" style="margin-top: 10%">
		<div class="col-md-12 instance">
			<h2> Create Field</h2>
			<hr>
			<div class="col-md-6 col-md-offset-1">

				{!! Form::model(new App\Bidang, ['route'=>['bidang.store'],'files'=>true]) !!}
				<div class="form-group">
					{!! Form::label('name','Field Name', ['class'=>'col-md-6 control-label']) !!}
					{!! Form::text('name','',array('class'=>'name form-control','placeholder'=>'Name')) !!}
				</div>

				<div class="form-group">
					{!! Form::label('cp','Contact Person', ['class'=>'col-md-6 control-label']) !!}
					{!! Form::text('cp','',array('class'=>'name form-control','placeholder'=>'087877828928')) !!}
				</div>
				<div class="form-group">
					{!! Form::label('cp','Deskripsi', ['class'=>'col-md-6 control-label']) !!}
					<textarea name="deskripsi" class="form-control"></textarea>
				</div>
				<div class="col-md-4 col-md-offset-8">
					{!! Form::hidden('idoprec',$idoprec) !!}
					{!! Form::hidden('idinstansi',$idinstansi) !!}
					{!! Form::submit('Create field', ['class'=>'btn btn-primary form-control']) !!}
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	@include('footer')

</body>
</html>