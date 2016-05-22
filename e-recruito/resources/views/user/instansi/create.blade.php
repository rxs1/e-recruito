<!DOCTYPE html>
<html>
<head>
	@include('user.instansi.headmyinstance')
</head>
<body>
	@include('nav')
	<div class="container" style="margin-top: 5%">
		<div class="col-md-12 instance">
			<h2>{{$title}}</h2>
			<hr>
			<div class="col-md-6">
				@foreach($errors->all() as $error) 
				<p class='alert alert-danger'>{{$error}}</p>
				@endforeach
				@if(session()->get('message') == 1)
				<div class="alert alert-success">
					Your Request Send
				</div>
				@endif
				{!! Form::model(new App\Instansi, ['route'=>['instansi.store'],'files'=>true]) !!}
				<div class="form-group">
					{!! Form::label('foto','Logo (.jpg/.png)', ['class'=>'col-md-4 control-label']) !!}
					{!! Form::file('foto',array('class'=>'foto form-control')) !!}
				</div>
				<div class="form-group">
					{!! Form::label('name','Instance Name', ['class'=>'col-md-4 control-label']) !!}
					{!! Form::text('name','',array('class'=>'name form-control','placeholder'=>'Name')) !!}
				</div>
				<div class="form-group">
					{!! Form::label('fileproveinstansi','Prove Of The Instance Existance(.zip/.rar)', ['class'=>'col-md-12 control-label']) !!}
					{!! Form::file('fileproveinstansi',array('class'=>'name form-control','')) !!}
				</div>
				<div class="col-md-6 col-md-offset-3">
					{!! Form::submit('Send Request ', ['class'=>'btn btn-primary form-control']) !!}
				</div>
				{!! Form::close() !!}
			</div>
			<div class="col-md-6">
				<h3>
					Term And Condition
				</h3>
				<p>(Upload file existence.zip to Prove intance Existance )</p>
				<ul>
					<li>Mencantumkan Logo Atau Gambar Dan Instansi</li>
					<li>Mencantumkan Latar Belakang Instansi</li>
					<li>Mencantumkan Deskripsi Singkat Instansi</li>
					<li>Mencantumkan Penjelasan Tujuan dari Instansi</li>
					<li>Mencantumkan Visi Dan Misi Instansi</li>
				</ul>
			</div>
		</div>
	</div>
	@include('footer')
</body>
</html>