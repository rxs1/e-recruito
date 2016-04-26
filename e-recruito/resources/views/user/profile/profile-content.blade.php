

<?php $user = session()->get('isLogin') ?>
<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-12">
					<h2>My Profile</h2>
					<hr>
				</div>
				<div class="col-md-12">
					@if(session()->get('isMessage') == 1)
					<div class="alert alert-success">
						Update profile success
					</div>
					@endif
					<div class="col-md-10 col-md-offset-1">
						<center>
							<img height="150" width="`150" class="img-circle" src="{{url('/public/assets/img/avatar/'.$user['foto'])}}">
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
							<p>{{$user['name']}}</p>
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
							<p>{{$user['email']}}</p>
						</div>
						<div class="col-md-12">
							<hr>
						</div>
					</div>
					<div class="col-md-10 col-md-offset-1">
						{!! link_to_action('HomeController@eProfile','EDIT MY PROFILE',array($user->id),array('class' => 'btn btn-success')) !!}
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

