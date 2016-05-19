	<!DOCTYPE html>
	<html>
	<head>
		<<?php 
		$user = session()->get('isLogin');

		function getUserById($iduser){

			$user =  App\Users::where('id',$iduser)->first();
			return $user;
		}

		function getSlotTugasUmum($iduser,$idoprec){

			$slot =  App\SlotTugasUmum::where('iduser',$iduser)->where('idoprec',$idoprec)->first();
			return $slot;
		}

		function getSlotTugasBidang($iduser,$idbidang){

			$slot =  App\SlotTugasBidang::where('iduser',$iduser)->where('idbidang',$idbidang)->first();
			return $slot;
		}



		?>

		@include('head')
	</head>
	<body>
		@include('nav')
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>{{$title}}</h2>
					<div class="col-md-12">
						<hr>
					</div>
					<div class="col-md-12 pull-right" style="margin: 1%">
						<a  class="btn btn-warning " onClick='history.go(-1);' >BACK</a>
					</div>
					<div class="col-md-8 col-md-offset-2" style="padding:7%">
						@if(count($pendaftarBidang))
						<table class="table table-bordered text-center">
							<thead>
								<tr>
									<th class="text-center">No</th>
									<th class="text-center">Name</th>
									<th class="text-center">Email</th>
									<th class="text-center">Field Task</th>
									<th class="text-center">Common Task</th>

								</tr>
							</thead>
							<tbody>
								<?php $i=1?>
								@foreach($pendaftarBidang as $list)
								<tr>
									<td>{{$i}}</td>
									<td><a href="{{url('/view/user/'.$list->iduser)}}">{{getUserById($list->iduser)->name}}</a></td>
									<td>{{getUserById($list->iduser)->email}}</td>
									<td>
										@if(getSlotTugasBidang(getUserById($list->iduser)->id,$bidang->id))
										<a class="btn btn-success">Download Now</a>
										@else
										<a class="btn btn-danger">Not Uploaded</a>
										@endif

									</td>
									<td>
										@if(getSlotTugasUmum(getUserById($list->iduser)->id,$idoprec))
										<a class="btn btn-success">Download Now</a>
										@else
										<a class="btn btn-danger">Not Uploaded</a>
										@endif

									</td>
									<?php $i++ ?>
								</tr>
								@endforeach
							</tbody>
						</table>
						@else
						<p class="alert alert-danger">Still Dont Have Registrant</p>
						@endif
					</div>
				</div>
			</div>
		</div>
		@include('footer')

	</body>
	</html>