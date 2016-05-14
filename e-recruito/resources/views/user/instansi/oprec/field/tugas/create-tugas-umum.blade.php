<!DOCTYPE html>
<html>
<head>
	@include('head')
</head>
<body>
	@include('nav')
<<<<<<< HEAD

=======
	<div class="container">
		<div class="col-md-10 col-md-offset-1" style="border: 2px solid #eee ; margin-top:7%">

			<h3>Common Task "<?php echo $oprec['name']; ?>" </h3>
			{!! Form::model(new App\TugasUmum, ['route'=>['tugas-umum.store'],'files'=>true]) !!}
			@if(($errors->all()))

			@foreach($errors->all() as $error) 
			<p class='alert alert-danger'>{{$error}}</p>
			@endforeach
			@endif
			<div class="form-group">
				{!! Form::label('cp','Deskripsi', ['class'=>'col-md-6 control-label']) !!}
				<textarea style="height:200px;" name="deskripsi" class="form-control">{{$tugasumum['deskripsi']}}</textarea>
			</div>

			<div class="col-md-4 col-md-offset-8">
				{!! Form::hidden('idoprec',$idoprec) !!}
				{!! Form::hidden('idinstansi',$idinstansi) !!}
				{!! Form::submit('SAVE', ['class'=>'btn btn-primary form-control']) !!}
			</div>
			{!! Form::close() !!}
			<br><br><br><br>
		</div>
		
	</div>
>>>>>>> saufi
	@include('footer')
</body>
</html>