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
		@if(session()->get('message') == 'Success Ignore Instance')
		<div class="alert alert-danger">
			{{session()->get('message')}}
		</div>
		@endif
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#request" aria-controls="request" role="tab" data-toggle="tab">Request Instance</a></li>
			<li role="presentation"><a href="#ignored" aria-controls="ignored" role="tab" data-toggle="tab">Ignored Instance</a></li>
			<li role="presentation"><a href="#active" aria-controls="active" role="tab" data-toggle="tab">Active Inctance</a></li>

		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="request">	<div class="col-md-12">
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
									<a onclick="return confirm('Are you sure?')" href="{{url().'/instansi/status/accept/'.$list['id']}}" class="text-success">Accept</a>
								</div>
								<div class="col-md-6">

									<a onclick="return confirm('Are you sure?')" href="{{url().'/instansi/status/ignore/'.$list['id']}}" class="text-danger">Ignore</a>
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

		<!--Awal tab-->
		<div role="tabpanel" class="tab-pane" id="ignored">
			<div class="col-md-12">
				<h1>
					Ignored Request
				</h1>
				<hr>
				<div class="col-md-12">

					@if(count($instansiIgnored))

					@foreach($instansiIgnored as $list)

					<div class="col-md-4 col-md-offset-1">
						<div class="col-md-5">
							<img height="100" width="100" src="{{url().'/public/assets/img/logo-instansi/'.$list['foto']}}">
						</div>
						<div class="col-md-7">
							<h4><b>{{$list['name']}}</b></h4>
							<a class="btn btn-primary" href="{{url().'/file-server/file-prove-instansi/'.$list['fileproveinstansi']}}" style="font-size: 80%">Download Prove of Existence </a>
							<br><br><br>
							<div class="col-md-12" style="margin-bottom: ">
								
								<div class="col-md-12">

									<a href="{{url().'/pengguna/instansi/delete/'.$list['id']}}"><button onclick="return confirm('Are you sure to delete instance ?')" class="btn btn-danger" type="submit" >Delete Instance</button></a>
									
									
								</div>
							</div>
						</div>
					</div>
					@endforeach

					@else
					<div class="alert alert-dismissible alert-danger">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Not Have Ignored Instance</strong> 
					</div>
					@endif
				</div>

			</div>
		</div>
		<!--akhir tab-->
		<div role="tabpanel" class="tab-pane" id="active">
			<div class="col-md-12">
				<h1>
					Active Instance
				</h1>
				<hr>
				<div class="col-md-12">

					@if(count($instansiAccept))

					@foreach($instansiAccept as $list)

					<div class="col-md-4 col-md-offset-1">
						<div class="col-md-5">
							<img height="100" width="100" src="{{url().'/public/assets/img/logo-instansi/'.$list['foto']}}">
						</div>
						<div class="col-md-7">
							<h4><b>{{$list['name']}}</b></h4>
							<a class="btn btn-primary" href="{{url().'/file-server/file-prove-instansi/'.$list['fileproveinstansi']}}" style="font-size: 80%">Download Prove of Existence </a>
							<br><br><br>
							<div class="col-md-12" style="margin-bottom: ">
								<p class="text-success">This Instance Active</p>
							</div>
						</div>
					</div>
					@endforeach

					@else
					<div class="alert alert-dismissible alert-danger">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Not Have Accept Instance</strong> 
					</div>
					@endif
				</div>

			</div>
		</div>
	</div>

</div>




</div>
@include('footer')

</body>
</html>