


<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-12">
					<h2>Latest Open Recruitment</h2>
					<hr>
				</div>
				@if(count($allOprec))
				@foreach($allOprec as $list)
				<div class="col-md-4" >
					<img src="{{url('public/assets/img/brosur-oprec/'.$list['brosur'])}}" height="200" width="100%">
					<h3>{{$list['name']}}</h3>
					<p></p>
					<a class="btn btn-success">Join</a> <a href="{{url('public/assets/img/brosur-oprec/'.$list['brosur'])}}" class="btn btn-default">View Brosur</a> <a href="{{url('oprec/'.$list->id)}}" class="btn btn-warning">View Oprec</a>
				</div>
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

