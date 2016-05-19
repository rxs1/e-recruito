	<!DOCTYPE html>
	<html>
	<head>
		<<?php 
		$user = session()->get('isLogin');

		function countRegistrant($idbidang){

			$allRegistrantBidang =  App\PendaftarBidang::where('idbidang',$idbidang)->get();
			return count($allRegistrantBidang);
		}



		?>

		@include('head')
	</head>
	<body>
		@include('nav')
		<div class="container">
			<h2>{{$title}}</h2>
			<div class="col-md-12">
				<hr>
			</div>
			<div class="col-md-12 text-right" style="margin: 2%">
				<a  class="btn btn-warning " onClick='history.go(-1);' >BACK</a>
			</div>
			<div class="col-md-12">
				<div class="col-md-12">
					@if(count($allField))
					@foreach($allField as $list)
					<div class="col-md-12" style="border: solid #eee 3px">
						<h3>{{$list->name}} </h3>
						<hr>

						<div class="col-md-8">
							<div class="col-md-7">
								{{$list->deskripsi}}
								<hr>
							</div>
							<div class="col-md-7"  style="padding-bottom: 3%">
								<p><a href="{{url('/pengguna/instansi/'.$idinstansi.'/oprec/'.$idoprec.'/field/'.$list->id.'/allregistrant')}}"><b>Registrant</b></a> : {{countRegistrant($list->id)}}</p>
							</div>
						</div>
						<div class="col-md-2">
							<a href="{{url('/pengguna/instansi/'.$idinstansi.'/oprec/'.$idoprec.'/field/'.$list->id.'/allregistrant')}}" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> All Registrant </a>
						</div>
					</div>
					@endforeach
					@else
					<div class="text-danger"> EMPTY</div>
					@endif
				</div>
			</div>
		</div>
		@include('footer')

	</body>
	</html>