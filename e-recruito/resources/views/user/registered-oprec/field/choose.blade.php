<!DOCTYPE html>
<html>
<head>
	@include('head')
</head>
<body>
	@include('nav')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h2>{{$title}}</h2>

				<hr>
				<p class="alert alert-warning col-md-3 pull-right text-center"><b>You can choose max {{$oprec['max-field-person'] }} field</b></p>
				@if(session()->get('message') == -1)

				<p class="alert alert-danger col-md-12 text-center"><b>You must choose at least one field</b></p>
				@endif
				@if(session()->get('message') == -2)

				<p class="alert alert-danger col-md-12 text-center"><b>Your choice is more than the maximum that has been set</b></p>
				@endif
				@if(session()->get('message') == 1)

				<p class="alert alert-success col-md-12 text-center"><b>Success</b></p>
				@endif
				<div class="caption">
					{!!Form::open(array('action'=>'PendaftarBidangController@choosedField','files'=>true))!!}
					<div class="col-md-12">
						<hr>
					</div>
					
					@foreach($allbidang as $list)
					<div class="col-md-12">
						<div class="col-md-10">
							<h3>{{$list->name}}</h3>
							{{$list->deskripsi}}
							<p>

							</p>
						</div>

						<div class="col-md-2 text-center" style="border-left: 5px solid #eee">
							<p><b>Choose</b></p>
							<p>
								{!! Form::checkbox('choose[]', $list->id)!!}	
							</p>
						</div>
					</div>
					<div class="col-md-12">
						<hr>
					</div>

					@endforeach

				</div>

			</div>
			
			<div class="cool-md-3 text-center">
				{!! Form::hidden('idoprec',$idoprec) !!}
				{!! Form::hidden('idinstansi',$idinstansi) !!}
				{!!Form::submit('Submit',['class'=>'btn btn-primary text-center','onclick'=>'return confirm("Are you sure? When You Submit this you cant unjoin and unchoice field")'])!!}
			</div>
			
			{!! Form::close() !!}		
		</div>
	</div>
	@include('footer')
</body>
</html>