<!DOCTYPE html>
<html>
<head>
	@include('head')
</head>
<body>
	@include ('admin.admin-nav')
	<div class="containter-fluid">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">{{ $specificUser->name }}</div>
					<div class="panel-body">

					</div>
				</div>
			</div>
		</div>
	</div>
	@include('footer')

</body>
</html>