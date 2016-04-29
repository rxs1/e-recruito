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
			<div class="col-md-12">
				<h3>Name Oprec <a href="##" class="text-warning"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> EDIT</a></h3>
				<hr>
				
				<div class="col-md-8">
					<div class="col-md-7">
						<table class="text-success">
							<tr>
								<td style="font-size: 200%">Status</td>
								<td style="font-size: 200%">&nbsp;:&nbsp;</td>
								<td style="font-size: 200%" class="text-danger"> Not Publish</td>
							</tr>
							<tr>
								<td style="font-size: 200%">max field person</td>
								<td style="font-size: 200%">&nbsp;:&nbsp;</td>
								<td style="font-size: 200%">3</td>
							</tr>
						</table>
					</div>
				</div>
				<div class="col-md-2">
					<p><a class="btn btn-primary form-control">View All Field</a></p>
					<p><a class="btn btn-primary form-control">Add New Field</a></p>
					<p><a class="btn btn-primary form-control" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Publish</a></p>


					<!-- Modal -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Publish This Oprec</h4>
								</div>
								<div class="modal-body">
									<div class="alert alert-dismissible alert-warning">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<h4>Warning!</h4>
										<p>When you publish this oprec you cant add or change the setting of oprec except deadline oprec  </a>.</p>
										

									</div>
									<form>
										<div class="form-group">
											{!! Form::label('date','Set Deadline Oprec', ['class'=>'col-md-4 control-label']) !!}
											<input type="date" name="date" class="form-control">
										</div>
										<button type="submit" class="btn btn-primary">Publish Now</button>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>
</div>
</div>
@include('footer')
</body>
</html>