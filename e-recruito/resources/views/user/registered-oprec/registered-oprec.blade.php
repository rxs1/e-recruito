<!DOCTYPE html>
<html>
<head>
	@include('head')
	<?php
	$user = session()->get('isLogin');

	function getAllRegisteredBidangByIdOprec($idoprec){
		$user = session()->get('isLogin');
		$allRegisteredBidang =  App\PendaftarBidang::where('iduser',$user->id)->where('idoprec',$idoprec)->get();
		return $allRegisteredBidang;
	}
	function getOprecById($idoprec) {
		$oprec = App\Oprec::where('id',$idoprec)->first();
		return $oprec;
	}
	function getBidangById($idbidang) {
		$bidang = App\Bidang::where('id',$idbidang)->first();
		return $bidang;
	}

	function chosenField($iduser,$idoprec) {
		$fields = App\PendaftarBidang::where('iduser',$iduser)->where('idoprec',$idoprec)->get();
		return $fields;
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
							<h5  class="alert alert-success">Congratulation! You are successfully registered on: {{session()->get('oprecName')}}</h5>
							@endif
							@if(session()->get('message') == 1)
							<?php $oprec =session()->get('oprec'); ?>
							<h5  class="alert alert-success">Congratulation! You are successfully choose your field and registered on: "{{$oprec->name}}"</h5>
							@endif
						</div>
					</div>
					@if(count($allJoined))
					@foreach($allJoined as $join)
					<div class="col-md-4" style="margin-bottom:3%;border: 2px solid #eee; padding:2%;">
						<img src="{{url('public/asse	ts/img/brosur-oprec/'.getOprecById($join->idoprec)->brosur)}}" height="200" width="100%">
						<h3><a href="{{url('oprec/'.$join->idoprec)}}"><?php $oprec = getOprecById($join->idoprec); echo $oprec->name ?></a></h3>
						@if(count(chosenField($user->id, $oprec->id)))
						<div class="col-md-12">
							
						</div>
						
						<?php $allRegisteredBidang =getAllRegisteredBidangByIdOprec($join->idoprec);?>
						<p>You've Choose field:</p>
						<p><a href="{{url('/pengguna/instansi/'.$oprec->idinstansi.'/oprec/'.$join->idoprec.'/yourTask')}}" class="btn btn-default pull-right"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> All Task </a></p>
						<ul>
							@foreach($allRegisteredBidang as $list)
							<p>
								<li>
									<?php $bidang = getBidangById($list->idbidang);
									echo $bidang->name;
									?>
								</li>
							</p>
							@endforeach
						</ul>


						@else
						You have not chosen any field yet. Choose <a href="{{url('/pengguna/instansi/'.getOprecById($join->idoprec)->idinstansi.'/oprec/'.$join->idoprec.'/choose-field')}}">here</a>
						@endif
						<p>Days to deadline: <?php $deadline = new DateTime($oprec->deadline); 
							$today = new DateTime(date("Y-m-d"));
							$interval = $deadline->diff($today);
							$days = $interval->format('%a');
							if(strtotime(date("Y-m-d")) > strtotime($oprec->deadline)) {$days = 0;} 
							echo $days."";?></p>
							<a href="{{url('oprec/'.$join->idoprec)}}" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Open Recruitment</a>
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