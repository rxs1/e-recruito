		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<a class="navbar-brand" href="#">E-Recruito</a>
				</div>

				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-left">
						<li><a href="#">Home</a></li>
						<li><a href="#">FAQ</a></li>
					</ul>

					<ul class="nav navbar-nav navbar-right">
						<li><a href="#"><img src="assets/img/placeholder.png" width="25"></a></li>
						<li><a href="#">Hi, User!</a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="container content">
			<div class="row">
				<h1>Update Instance</h1>
				<br><br>
			</div>
		
			<div class="row">
				<form class="form-horizontal">
					<fieldset>

						<!-- File Button: Instance Picture -->
						<div class="form-group">
							<div class="col-md-4">
								<p><strong>Instance Picture</strong></p>
								<input id="instpict" name="instpict" class="input-file" type="file">
								<br>
							</div>
						</div>

						<!-- Text input: Instance Name -->
						<div class="form-group">
							<div class="col-md-4">
								<p><strong>Instance Name</strong></p>
								<input id="instname" name="instname" type="text" placeholder="" class="form-control input-md" required="">
								<br>
							</div>
						</div>

						<!-- Textarea: Instance Description -->
						<div class="form-group">
							<div class="col-md-4"> 
								<p><strong>Instance Description</strong></p>
								<textarea class="form-control" id="instdesc" name="instdesc" required=""></textarea>
								<br>
							</div>
						</div>
						
						<!-- Button: Save Update -->
						<div class="form-group">
							<div class="col-md-4">
								<button id="updateinstsubmit" name="updateinstsubmit" class="btn btn-lg btn-default"><span class="glyphicon glyphicon-floppy-disk"></span> Save Update</button>
							</div>
						</div>

					</fieldset>
				</form>
			</div> <!-- Row -->
		</div> <!-- Container -->
