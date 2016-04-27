<!DOCTYPE html>
<html>
<head>
	@include('head')
</head>
<body>
	@include ('nav')
	<div class="containter-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-10 col-md-offset-1">
					<h2>{{ $specificUser->name }}</h2>
					<hr>
				</div>
				<div class="col-md-12">
					<div class="col-md-10 col-md-offset-1">
						<center>
							<img height="150" width="150" class="img-circle" src="{{url('/public/assets/img/avatar/'.$specificUser['foto'])}}">
						</center>
						<div class="col-md-12">
							<hr>
						</div>
					</div>
					<div class="col-md-10 col-md-offset-1">
						<div class="col-md-2">
							<p>Name</p>
						</div>
						<div class="col-md-1">:</div>
						<div class="col-md-7">
							<p>{{$specificUser['name']}}</p>
						</div>
						<div class="col-md-12">
							<hr>
						</div>
					</div>
					<div class="col-md-10 col-md-offset-1">
						<div class="col-md-2">
							<p>Motto</p>
						</div>
						<div class="col-md-1">:</div>
						<div class="col-md-7">
							<p>{{$specificUser['motto']}}</p>
						</div>
						<div class="col-md-12">
							<hr>
						</div>
					</div>
					<div class="col-md-10 col-md-offset-1">
						<div class="col-md-2">
							<p>email</p>
						</div>
						<div class="col-md-1">:</div>
						<div class="col-md-7">
							<p>{{$specificUser['email']}}</p>
						</div>
						<div class="col-md-12">
							<hr>
						</div>
					</div>
					<div class="col-md-10 col-md-offset-1">
						<div class="col-md-2">
							<p>Region</p>
						</div>
						<div class="col-md-1">:</div>
						<div class="col-md-7">
							<p>{{$specificUser['region']}}</p>
						</div>
						<div class="col-md-12">
							<hr>
						</div>
					</div>
					<div class="col-md-10 col-md-offset-1">
						<div class="col-md-2">
							<p>Profession</p>
						</div>
						<div class="col-md-1">:</div>
						<div class="col-md-7">
							<p>{{$specificUser['profesi']}}</p>
						</div>
						<div class="col-md-12">
							<hr>
						</div>
					</div>
					<div class="col-md-10 col-md-offset-1">
						<div class="col-md-2">
							<p>Birthday</p>
						</div>
						<div class="col-md-1">:</div>
						<div class="col-md-7">
							<p>{{$specificUser['birthdate']}}</p>
						</div>
						<div class="col-md-12">
							<hr>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('footer')

</body>
</html>