<!DOCTYPE html>
<html>
<head>
	@include('head')
</head>
<body>
	@include('nav')

	<div class="container">
		<div class="col-md-12">
			<h1>My Instance</h1>
			<hr>
		</div>
		<div class="col-md-12">
			@if(session()->get('message') == 'Update Success ')
			<div class="alert alert-success">
				{{session()->get('message').session()->get('name')}}
			</div>
			@endif
		</div>
		@foreach($myinstansi as $list)
		<div class="col-md-12">

			<div class="col-md-3">
				<img height="200" width="200" src="{{url().'/public/assets/img/logo-instansi/'.$list['foto']}}">
			</div>

			<div class="col-md-6">
				<h3>{{$list['name']}}</h3>
				<hr>
				
				@if($list['status'] == 1)
				@if($list['deskripsi'])
				{{$list['deskripsi']}}
				
				<a href="{{url().'/pengguna/instansi/update/'.$list['id']}}" class="text-warning"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> EDIT</a>
				@else
				<div class="text-danger"> Deskripsi Not Define</div>
				<br>
				<p class="text-success">Accepted Please Fill Your Description <a href="{{url().'/pengguna/instansi/update/'.$list['id']}}" >here</a></p>
				<br>
				<p>Regards, </p>
				<p>Erecruito Crew</p>
				@endif
				@elseif($list['status'] == 0)
				<div class="text-warning"> Status : Waiting To Aprove</div>
				@else
				<div class="text-danger"> Status : Rejected</div>
				<p>If you want to know what the problem, please contact Us in chat. </p>
				<p>Regards, </p>
				<p>Erecruito Crew</p>
				<a href="{{url().'/pengguna/instansi/delete/'.$list['id']}}">
					<button onclick="return confirm('Are you sure to delete instance ?')" class="btn btn-danger" type="submit" >Delete Instance</button>
				</a>
				@endif


			</div>

			<div class="col-md-3">
				@if($list['status'] == 1)
				<a class="btn btn-primary form-control">View All Oprec</a>
				<br>
				<br>
				<a href="{{url().'/pengguna/instansi/'.$list->id.'/make/oprec'}}" class="btn btn-primary form-control"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Oprec</a>
				@endif
			</div>

		</div>

		@endforeach


	</div>

	@include('footer')
</body>
</html>