<?php
function hasJoined($idoprec) {
	$user = session()->get('isLogin');
	$pendaftarOprec = App\PendaftarOprec::where('iduser',$user['id'])->where('idoprec',$idoprec)->get();
	if(count($pendaftarOprec)) {
		return 1;
	} else {
		return 0;
	}
}
?>

<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-12">
					<h2>Newest Open Recruitment</h2>
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


				@if(count($allOprec))
				@foreach($allOprec as $list)
				@if(!hasJoined($list['id']))
				<div class="col-md-4 oprec" style="margin-bottom: 3%">
					<img src="{{url('public/assets/img/brosur-oprec/'.$list['brosur'])}}" height="200" width="100%">
					<h3>{{$list['name']}}</h3>
					<p></p>
					<a class="btn btn-success" href="{{url('/pengguna/confirm-oprec/'.$list['id'])}}">Join</a> 
					<a href="{{url('public/assets/img/brosur-oprec/'.$list['brosur'])}}" class="btn btn-default">View Brosur</a> <a href="{{url('oprec/'.$list->id)}}" class="btn btn-warning">View Oprec</a>
					
				</div>
				@endif
				@endforeach
				@else
				<div class="alert alert-danger">Doesnt Have Any Publish Open Recruitment</div>
				@endif
				<div class="col-md-12" style="text-align: center">
					<ul class="pagination">
						<li class="disabled"><a href="#">&laquo;</a></li>
						<li class="active"><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a href="#">&raquo;</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

</div>

