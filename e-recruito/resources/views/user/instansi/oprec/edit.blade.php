<!DOCTYPE html>
<html>
<head>
	@include('head')
</head>
<body>
	@include('nav')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>{{$title}}</h2>
				<hr>
				{!!Form::open(array('action'=>'OprecController@updateOprec','files'=>true,'method'=>'post'))!!}

				{{--@foreach($errors->all() as $error)
				<p class='alert alert-danger'>{{$error}}</p>
				@endforeach--}}
				

				<div class="form-group">


					<div class="col-md-4">
						<img style="margin-bottom: 5%" height="150" width="`150" class="img-circle" src="{{url('/public/assets/img/brosur-oprec/'.$oprec['brosur'])}}">
					</div>
					<div class="col-md-8">
						{!! Form::label('brosur','Brosur Open Recruitment', ['class'=>'col-md-12 control-label']) !!}
						{!! Form::file('brosur',array('class'=>'foto form-control')) !!}
					</div>
				</div>
				<div class="col-md-12">
					<hr>
				</div>
				<div class="form-group" >
					
					{!! Form::label('date','Set Deadline Oprec', ['class'=>'col-md-4 control-label']) !!}
					<input type="date" name="date" class="form-control">
					<p>Now Your set Deadline is {{$oprec->deadline}}</p>
				</div>



				<div class="col-md-6 col-md-offset-3">
					{!! Form::hidden('id',$oprec->id) !!}
					{!! Form::submit('SAVE', ['class'=>'btn btn-primary form-control']) !!}

				</div>
				{!! Form::close() !!}

			</div>

		</div>
	</div>
	@include('footer')

</body>
</html>