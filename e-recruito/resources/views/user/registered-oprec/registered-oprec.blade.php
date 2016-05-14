<!DOCTYPE html>
<html>
<head>
	@include('head')
	<?php
		function getOprecById($idoprec) {
			$oprec = App\Oprec::where('id',$idoprec)->first();
			return $oprec;
		}
	?>
</head>
<body>
	@include ('nav')
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-12">
						<h2>Registered Open Recruitment</h2>
						<hr>
						<div class="row">
							@if(session()->get('message') == 'joined')
								<h5 class="aler alert-success">Congratulation! You are successfully registered on: {{$oprecName}}</h5>
							@endif
						</div>
					</div>
					@if(count($allJoined))
					@foreach($allJoined as $join)
						<div class="col-md-4" style="margin-bottom:3%">
							<img src="{{url('public/assests/img/brosur-oprec/'.$join['brosur'])}}" height="200" width="100%">
							<h3><?php $oprec = getOprecById($join->idoprec); echo $oprec->name ?></h3>
							<p>Days to deadline: <?php $deadline = new DateTime($oprec->deadline); 
							$today = new DateTime(date("Y-m-d"));
							$interval = $deadline->diff($today);
							$interval = $today->diff($deadline);
							$days = $interval->format('%a');
							if($days <= 0) {$days = 0;} 
							echo $days." ";?></p>
							<a href="#">View Task</a>
						</div>
					@endforeach
					@else
					<div class="aler alert-danger">Doesn't Have any registered Open Recruitment</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</body>
<footer>
	@include('footer')
</footer>
</html>