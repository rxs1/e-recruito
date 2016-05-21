<!DOCTYPE html>
<html>
<head>
	@include('head')
</head>
<body>
	@include('nav')
	<div class="container">
		<h2>{{$title}}</h2>
		<hr>

		@if(session()->get('message') == 2)
		<p class="alert alert-success"> Common Task was Saved</p>
		@endif
		@if(session()->get('message') == 3)
		<p class="alert alert-success"> Field "{{session()->get('namefield')}}" Task was Saved</p>
		@endif
		<div class="col-md-12" style="margin-bottom: 2%">
			<a href="{{url('/pengguna/instansi/'.$idinstansi.'/oprec/'.$idoprec.'/create-common-task')}}" class="btn btn-primary pull-right" style="margin-left: 2%">Describe Common Task </a><span></span><a href="{{url('pengguna/instansi/'.$idinstansi.'/alloprec')}}" class="btn btn-warning pull-right">Back To All Oprec </a>
		</div>
		
		<div class="row">


			@if(count($allField))
			@foreach($allField as $list)
			<div class="col-md-12" style="border: solid #eee 3px">
				<h3>{{$list->name}} </h3>
				<hr>
				
				<div class="col-md-8">
					<div class="col-md-7">
						{{$list->deskripsi}}
						<hr>
					</div>
					<div class="col-md-7"  style="padding-bottom: 3%">
						CP: {{$list->cp}}
					</div>
				</div>
				<div class="col-md-2">
					<a href="{{url('/pengguna/instansi/'.$idinstansi.'/oprec/'.$idoprec.'/field/'.$list->id.'/create-field-task')}}" class="btn btn-primary">Describe Field Task </a>
				</div>
			</div>
			@endforeach
			@else
			<div class="text-danger"> EMPTY</div>
			@endif

		</div>

	</div>

	@include('footer')
</body>
</html>