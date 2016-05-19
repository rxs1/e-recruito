<!DOCTYPE html>
<html>
<head>
	@include('nav')
</head>
<body>
	@include('head')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<center><h2>{{$title}}</h2></center>
				<div class="col-md-12">
					<hr>
				</div>
				<div class="col-md-8 col-md-offset-2" style="border:#eee solid 3px;padding:3%;">
					
					<div class="col-md-4" style="padding:5%">
						<img style="margin-bottom: 5%" height="150" width="`150" class="img-circle" src="{{url('/public/assets/img/avatar/'.$user['foto'])}}">
					</div>
					<div>

						<div class="col-md-8" style="border-left:#eee solid 3px">
							<table class="table">
								<tr>
									<td>
										Name 
									</td>
									<td>:</td>
									<td>
										{{$user->name}}
									</td>
								</tr>
								<tr>
									<td>
										Email 
									</td>
									<td>:</td>
									<td>
										{{$user->email}}
									</td>
								</tr>
								<tr>
									<td>
										Region 
									</td>
									<td>:</td>
									<td>
										{{$user->region}}
									</td>
								</tr>
								<tr>
									<td>
										Profesion 
									</td>
									<td>:</td>
									<td>
										{{$user->profesi}}
									</td>
								</tr>
								<tr>
									<td>
										Age 
									</td>
									<td>:</td>
									<td>
										<?php
										$from = new DateTime($user->birthdate);
										$to   = new DateTime('today');
										echo $from->diff($to)->y;

										?>
									</td>
								</tr>
								<tr>
									<td>
										Motto 
									</td>
									<td>:</td>
									<td>
										"{{$user->motto}}"
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-12 text-center" style="margin: 2%">
					<a  class="btn btn-warning " onClick='history.go(-1);' >BACK</a>
				</div>
			</div>
		</div>
	</div>
	@include('footer')
</body>
</html>