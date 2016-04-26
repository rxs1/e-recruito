<!DOCTYPE html>
<html>
<head>
	@include('head')
</head>
<body>
	@include('nav')
	<div class="container">
		@if(session()->get('message') == 'Success Accept Instance')
		<div class="alert alert-success">
			{{session()->get('message')}}
		</div>
		@endif
		<div class="col-md-12">
			<h1>
				Request Of New Instance
			</h1>
			<hr>
			<div class="col-md-12">

				@if(count($instansiNotAccept))

				@foreach($instansiNotAccept as $list)

				<div class="col-md-4 col-md-offset-1">
					<div class="col-md-5">
						<img height="100" width="100" src="{{url().'/public/assets/img/logo-instansi/'.$list['foto']}}">
					</div>
					<div class="col-md-7">
						<h4><b>{{$list['name']}}</b></h4>
						<a class="btn btn-primary" href="{{url().'/file-server/file-prove-instansi/'.$list['fileproveinstansi']}}" style="font-size: 80%">Download Prove of Existence </a>
						<br><br><br>
						<div class="col-md-12" style="margin-bottom: ">
							<div class="col-md-6">
								<a href="{{url().'/instansi/status/accept/'.$list['id']}}" class="text-success">Agree</a>
							</div>
							<div class="col-md-6">
								<a href="{{url().'/instansi/status/ignore/'.$list['id']}}" class="text-danger">Ignore</a>
							</div>
						</div>
					</div>

				</div>


				@endforeach

				@else
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Not Have Request Instance</strong> 
				</div>
				@endif
			</div>

		</div>

	</div>
	@include('footer')

</body>
</html>