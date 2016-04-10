<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"><img style="margin-top: -5px" src="{{asset('/public/assets/img/logo.png')}}" height="35" width="45"></a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li ><a href="{{url('/user')}}">Home</a></li>
				<li><a href="{{url('/FAQ')}}">FAQ</a></li>
			</ul>
			
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<?php $user = session()->get('isLogin') ?>

					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img style="margin-top: -5px"  src="{{url('/public/assets/img/avatar/'.$user['foto'])}}" height="30" width="30"> Hi {{$user['name']}}<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{url('user/my-profile')}}">My Profile</a></li>
						<li><a href="#">Setting</a></li>
						<li><a href="{{url('/logout')}}">Logout</a></li>
						
					</ul>
				</li>

			</ul>
		</div>
	</div>
</nav>
