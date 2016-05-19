<!DOCTYPE html>
<html>
<head>

	@include('head')
</head>
<body>
	@include('nav')
	<div class="container">
		<h2>{{$title}}</h2>
		<hr>
		<div class="row">
			@if(($errors->all()))
			<h5 class="alert alert-danger">error from {{ session()->get('message') }}</h5>
			@foreach($errors->all() as $error) 
			<p class='alert alert-danger'>{{$error}}</p>
			@endforeach
			@endif
			@if(session()->get('message') == 'Published')
			<h5 class="alert alert-success">{{ session()->get('message') }}</h5>
			@endif
			@if(session()->get('message') == 'Change to Not Published')
			<h5 class="alert alert-danger">{{ session()->get('message') }}</h5>
			@endif
			@if(session()->get('message') == 'Edited')
			<h5 class="alert alert-success">
				{{session()->get('message')}}
			</h5>
			@endif
			@if(count($allOprec))
			@foreach($allOprec as $list)
			@if($list->statuspublis)
			<div class="col-md-12" style="border: solid #eee 3px;margin-bottom: 3%">
				<h3>{{$list->name}} <a href="{{url('/oprec/edit/'.$list->id)}}" class="text-warning"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> EDIT</a></h3>
				<hr>
				
				<div class="col-md-8">
					<div class="col-md-7">
						<table class="text-success">
							<tr>
								<td style="font-size: 150%">Status</td>
								<td style="font-size: 150%">&nbsp;:&nbsp;</td>
								@if($list->statuspublis)
								<td style="font-size: 150%" class="text-succses">
									Published 
								</td>
								@else
								<td style="font-size: 150%" class="text-danger">
									Not Published 
								</td>
								@endif

								
							</tr>
							<tr>
								<td style="font-size: 150%">Max Field Person</td>
								<td style="font-size: 150%">&nbsp;:&nbsp;</td>
								<td style="font-size: 150%">{{$list['max-field-person']}}</td>
							</tr>
							<tr>
								<td style="font-size: 150%">Deadline</td>
								<td style="font-size: 150%">&nbsp;:&nbsp;</td>
								<td style="font-size: 150%">{{$list['deadline']}}</td>
							</tr>
						</table>
					</div>
				</div>
				<div class="col-md-2">
					<p><a href="{{url('/pengguna/instansi/'.$idinstansi.'/oprec/'.$list->id.'/registrantfield')}}"  class="btn btn-primary form-control"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Registrant</a></p>
					<p><a href="{{url('/pengguna/instansi/'.$idinstansi.'/oprec/'.$list->id.'/allfield')}}"  class="btn btn-primary form-control">View All Field</a></p>
					<p><a href="{{url('/unpublish/'.$idinstansi.'/'.$list->id)}}"  class="btn btn-danger form-control">Unpublish</a></p>


				</div>
			</div>
			@else
			<div class="col-md-12" style="border: solid #eee 3px;margin-bottom: 3%">
				<h3>{{$list->name}}</h3>
				<hr>

				<div class="col-md-8">
					<div class="col-md-7">
						<table class="text-success">
							<tr>
								<td style="font-size: 150%">Status</td>
								<td style="font-size: 150%">&nbsp;:&nbsp;</td>
								@if($list->statuspublis)
								<td style="font-size: 150%" class="text-succses">
									Published 
								</td>
								@else
								<td style="font-size: 150%" class="text-danger">
									Not Published 
								</td>
								@endif

							</tr>
							<tr>
								<td style="font-size: 150%">Max Field Person</td>
								<td style="font-size: 150%">&nbsp;:&nbsp;</td>
								<td style="font-size: 150%">{{$list['max-field-person']}}</td>
							</tr>
						</table>
					</div>
				</div>
				<div class="col-md-2">
					<p><a href="{{url('/pengguna/instansi/'.$idinstansi.'/oprec/'.$list->id.'/registrantfield')}}"  class="btn btn-primary form-control"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Registrant</a></p>
					<p><a href="{{url('/pengguna/instansi/'.$idinstansi.'/oprec/'.$list->id.'/allfield')}}"  class="btn btn-primary form-control">View All Field</a></p>
					<p><a href="{{url('/pengguna/instansi/'.$idinstansi.'/oprec/'.$list->id.'/make/field')}}" class="btn btn-primary form-control">Add New Field</a></p>
					<p><a class="btn btn-primary form-control" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Publish</a></p>
					@include('user.instansi.oprec.modalpublish')
				</div>
			</div>

			@endif
			@endforeach
			@endif

		</div>

	</div>

	@include('footer')
</body>
</html>