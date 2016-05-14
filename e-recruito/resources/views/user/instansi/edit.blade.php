<!DOCTYPE html>
<html>
<head>
	@include('head')
</head>
<body>
	@include('nav')
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">

					<div class="panel panel-primary">
						<div class="panel-heading">
							<center>
								<h2>
									UPDATE PROFILE INSTANCE ({{$instansi['name']}})
								</h2>

							</center>
						</div>

						<div class="panel-body">
							{!!Form::open(array('action'=>'InstansiController@updateInstance','files'=>true))!!}

							@foreach($errors->all() as $error)
							<p class='alert alert-danger'>{{$error}}</p>
							@endforeach

							<div class="form-group">

								
								<div class="col-md-4">
									<img style="margin-bottom: 5%" height="150" width="`150" class="img-circle" src="{{url('/public/assets/img/logo-instansi/'.$instansi['foto'])}}">
								</div>
								<div class="col-md-8">
									{!! Form::label('foto','Logo', ['class'=>'col-md-4 control-label']) !!}
									{!! Form::file('foto',array('class'=>'foto form-control')) !!}
								</div>
							</div>
							<div class="col-md-12">
								<hr>
							</div>
							<div class="form-group" >
								{!! Form::label('email','Email', ['class'=>'col-md-4 control-label']) !!}
								{!! Form::text('email',$instansi['email'],array('class'=>'form-control','placeholder'=>'xyz@domain.com')) !!}
							</div>

							<div class="form-group" >
								{!! Form::label('deskripsi','Deskripsi', ['class'=>'col-md-4 control-label']) !!}
								<textarea style="height: 300px"  name="deskripsi" class="form-control">{{$instansi['deskripsi']}}</textarea>

							</div>


							<div class="col-md-6 col-md-offset-3">
								{!! Form::hidden('id',$instansi['id']) !!}
								{!! Form::submit('SAVE', ['class'=>'btn btn-primary form-control']) !!}

							</div>
							{!! Form::close() !!}

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('footer')
</body>
</html>