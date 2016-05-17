<!DOCTYPE html>
<html>
<head>
	@include('head')
</head>
<body>
	@include('nav')
	<div class="container">
		<div class="col-md-12">
			<h3><b>{{$title}}</b></h3>
			<hr>
		</div>
		{!!Form::open(array('action'=>'TugasController@userTask','files'=>true))!!}
		<div class="col-md-12">
			<div class="col-md-12" style="padding:2%;margin-bottom:2%;border:#eee solid 1px;">

				<div class="col-md-9">
					<h3>Common Task </h3>
					<hr>
					<p>{{$tugasUmum->deskripsi}}</p>
				</div>
				<div class="col-md-3" style="padding:4%;">
					{!! Form::label('common','Upload Common Task(.zip/.rar)') !!}
					{!! Form::file('common',array('class'=>'btn btn-default form-control','')) !!}
				</div>
			</div>

			@foreach($tugasBidang as $list)
			<div class="col-md-12" style="padding:2%;margin-bottom:2%;border:#eee solid 1px;">
				<div class="col-md-9">
					<h3>Task : {{$list->name}}</h3>
					<hr>
					<p>{{$list->deskripsi}}</p>
				</div>
				<div class="col-md-3" style="padding:4%;">
					{!! Form::label($list->idbidang,'Upload Task(.zip/.rar)') !!}
					{!! Form::file($list->idbidang,array('class'=>'btn btn-default form-control','')) !!}
				</div>

			</div>
			@endforeach
			{!!Form::submit('UPLOAD DOCUMENT',['class'=>'btn btn-lg btn-primary text-center col-md-3 pull-right','onclick'=>'return confirm("Are you sure? When You Submit this you cant unjoin and unchoice field")'])!!}

		</div>

	</div>
	{!! Form::close() !!}
</div>
@include('footer')

</body>
</html>