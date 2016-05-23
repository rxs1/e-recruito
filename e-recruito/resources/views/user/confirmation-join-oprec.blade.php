<!DOCTYPE html>
<html>
<head>
	@include('user.instansi.headmyinstance')
</head>
<body>
	@include ('nav')
	
	<div class="containter-fluid">
		<div class="container">
			<h2>Join Open Recruitment: "{{$oprec->name}}"</h2>
			<hr>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 oprec">
					<p>Do you want to join "{{$oprec->name}}" Open Recruitment?</p>
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-2">
						<a href="{{url('/pengguna/confirm-oprec/confirm/'.$user->id.'/'.$oprec->id)}}" class="btn btn-primary"> YES</a>
						
						</div>
						<div class="col-md-6">
							<a class="btn btn-primary" href="{{url('/pengguna')}}">NO</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('footer')

</body>
</html>