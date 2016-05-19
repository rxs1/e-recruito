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
				<h2>Search Result For "{{$search}}"</h2>
				<div class="col-md-12">
					<hr>
				</div>
				<div class="col-md-12" style="padding:3%">
					{!!Form::open(array('action'=>'OprecController@search','files'=>true))!!}
					<div class="col-md-12">
						{!! Form::submit('Search',
						array('class'=>'btn btn-default pull-right')) !!}
						<div class="col-md-5 pull-right">
							{!! Form::text('search', null,
							array('required',
							'class'=>'form-control',
							'placeholder'=>'Search for a Open Recruitment...')) !!}
						</div>

					</div>
					{!! Form::close() !!}
					
				</div>
				<div>
					
					@if (count($oprec))
					@foreach($oprec as $list)
					{{$list->name}}
					@endforeach
					@else
					<p class="text-danger">Nothing match with this keyword</p>
					@endif
				</div>
			</div>

		</div>
	</div>
	@include('footer')
</body>
</html>