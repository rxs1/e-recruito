<!DOCTYPE html>
<html>
<head>
	@include('user.instansi.headmyinstance')
</head>
<body>
	@include('nav')
	<div class="container" style="border: solid #eee 3px">
		<div class="row">
			<div class="col-md-12 instance">
				<h3>{{$title}}</h3>
				<hr>
				<div class="col-md-3">
					<div class="thumbnail">
						<img src="{{url('public/assets/img/brosur-oprec/'.$oprec['brosur'])}}">
					</div>
					
				</div>
				<div class="col-md-8">
					<div class="panel panel-default">
						<div class="panel-body">
							Owner Of This Open Recruitment is <strong>{{$instansi->name}}</strong>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-body">
							Deadline Of This Open recruitment <strong><div class="text-warning" style="font-size: 32px">{{$oprec->deadline}}</div></strong>
						</div>
					</div>
				</div>
				<div class="col-md-12" style="border:solid #eee 1px;margin-bottom: 3%">
					<h3>Field Open</h3>
					<hr>
					@if(count($field))
					@foreach($field as $list)
					<div class="panel panel-default">
						<div class="panel-body">
							<h4 class="text-danger">{{$list->name}}</h4>
							<hr>
							<h4>{{$list->deskripsi}}</h4>	
						</div>
					</div>
					@endforeach
					@else
					<p class="col-md-12 alert alert-danger">Sorry This Open Recruitment Still not have field </p>		
					@endif
				</div>
				<div class="col-md-12" style="margin-bottom: 3%">
					<input type='button' class="btn btn-warning" VALUE='Back' onClick='history.go(-1);' style="margin-right: 2%"><a class="btn btn-success">Join Us</a>
				</div>
				
			</div>
		</div>
	</div>
	@include('footer')
</body>
</html>