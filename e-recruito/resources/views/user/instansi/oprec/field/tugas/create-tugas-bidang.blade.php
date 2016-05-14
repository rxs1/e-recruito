<!DOCTYPE html>
<html>
<head>
	@include('head')
</head>
<body>
	@include('nav')

	<div class="container">
		<div class="col-md-10 col-md-offset-1" style="border: 2px solid #eee ; margin-top:7%">

			<h3>Field Task {{$bidang['name']}} "{{$oprec['name']}}" </h3>
			{!! Form::model(new App\TugasBidang, ['route'=>['tugas-bidang.store'],'files'=>true]) !!}
			@if(($errors->all()))

			@foreach($errors->all() as $error) 
			<p class='alert alert-danger'>{{$error}}</p>
			@endforeach
			@endif
			<div class="form-group">
				{!! Form::label('cp','Deskripsi', ['class'=>'col-md-6 control-label']) !!}
				<textarea style="height:200px;" name="deskripsi" class="form-control">
					{{$tugasbidang['deskripsi']}}

				</textarea>
			</div>

			<div class="col-md-4 col-md-offset-8">
				{!! Form::hidden('idoprec',$idoprec) !!}
				{!! Form::hidden('idinstansi',$idinstansi) !!}
				{!! Form::hidden('idbidang',$idbidang) !!}
				{!! Form::submit('SAVE', ['class'=>'btn btn-primary form-control']) !!}
			</div>
			{!! Form::close() !!}
			<br><br><br><br>
		</div>
		
	</div>

	@include('footer')
</body>
</html>