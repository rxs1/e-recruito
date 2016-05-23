<!DOCTYPE html>
<html>
<head>
	@include('head')
	<?php $not_yet = true;
	$not_yet2 = true; ?>
	<?php
	function getTugasBidang($idbidang) {
		$tugasBidang = App\TugasBidang::where('idbidang',$idbidang)->first();
		return $tugasBidang;
	}
	?>
</head>
<body>
	@include('nav')
	<div class="container">
		<div class="col-md-12">
			<h3><b>{{$title}}</b></h3>
			<hr>
		</div>
		<div class="col-md-12 text-right" >

			<a  class="btn btn-warning" onClick='history.go(-1);' style="margin-right: 2%">BACK</a>
			<br>
			<br>
			
		</div>
		@foreach($errors->all() as $error)
		<?php $msg = 'At least one field is required';
		if ($error == $msg) {
			if ($not_yet) {
				$not_yet = false;
				echo '<span class="alert alert-danger">'.$error.'</span>';
			}
		} else {
			if ($not_yet2) {
				$not_yet2 = false;
				echo '<span class="alert alert-danger">'.$error.'</span>';
			}
		} ?>
		@endforeach
		@if(session()->get('uploaded') == '1')
		<span class="alert alert-success">File has been saved</span>
		@endif
		
		{!!Form::open(array('action'=>'TugasController@uploadUserTask','files'=>true))!!}
		<div class="col-md-12">
			<div class="col-md-12" style="padding:2%;margin-bottom:2%;margin-top:2%border:#eee solid 1px;">

				<div class="col-md-9">

					<h3>Common Task </h3>
					<hr>
					@if($tugasUmum)
					<p>{{$tugasUmum->deskripsi}}</p>
					
				</div>
				<div class="col-md-3" style="padding:4%;">
					{!! Form::label('common','Upload Common Task(.zip/.rar)') !!}
					{!! Form::file('common',array('class'=>'btn btn-default form-control','')) !!}
				</div>
				@else
				<p class="alert alert-danger">The Common task of this Open Recruitment still not define</p>

				@endif
			</div>	
			@if($tugasBidang)
			@foreach($tugasBidang as $list)
			<div class="col-md-12" style="padding:2%;margin-bottom:2%;border:#eee solid 1px;">
				<div class="col-md-9">
					<h3>Task : {{$list->name}}</h3>
					<hr>
					<?php $tgs = getTugasBidang($list->id); ?>
					<p>{{$tgs->deskripsi}}</p>
				</div>
				<div class="col-md-3" style="padding:4%;">
					{!! Form::label($list->idbidang,'Upload Task(.zip/.rar)') !!}
					{!! Form::file($list->idbidang,array('class'=>'btn btn-default form-control','')) !!}
				</div>

			</div>
			@endforeach
			{!! Form::hidden('idinstansi',$idinstansi) !!}
			{!! Form::hidden('idoprec',$idoprec) !!}
			{!!Form::submit('UPLOAD DOCUMENT',['class'=>'btn btn-lg btn-primary text-center col-md-3 pull-right','onclick'=>'return confirm("Are you sure to upload this document?")'])!!}
			@else
			<div class="col-md-12">
				<p class="alert alert-danger">The Field task of this Open Recruitment still not define</p>
			</div>
			@endif
		</div>

	</div>

	{!! Form::close() !!}
</div>
@include('footer')

</body>
</html>