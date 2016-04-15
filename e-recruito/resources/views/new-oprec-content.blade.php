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
				<h1>Create New Oprec</h1>
				<br><br>
			</div>

			<div class="row">
				<form class="form-horizontal">
					<fieldset>

						<!-- Text input: Oprec Name -->
						<div class="form-group">
							<div class="col-md-4">
								<p><strong>Oprec Name</strong></p>
								<input id="oprecname" name="oprecname" type="text" placeholder="" class="form-control input-md" required="">
								<br>
							</div>
						</div>

						<!-- Textarea: Oprec Description -->
						<div class="form-group">
							<div class="col-md-4">
								<p><strong>Oprec Description</strong></p>
								<textarea class="form-control" id="oprecdesc" name="oprecdesc" required=""></textarea>
								<br>
							</div>
						</div>

						<!-- Text input: Oprec Dateline -->
						<div class="form-group">
							<div class="col-md-4">
								<p><strong>Oprec Dateline</strong></p>
								<input id="oprecdl" name="oprecdl" type="text" placeholder="" class="form-control input-md" required="">
								<br>
							</div>
						</div>

						<!-- File Button: General Assignment --> 
						<div class="form-group">
							<div class="col-md-4">
								<p><strong>General Assignment</strong></p>
								<input id="genassign" name="genassign" class="input-file" type="file">
								<br>
							</div>
						</div>

						<!-- Text input: Opened Division -->
						<div class="form-group">
							<div class="input_fields_wrap col-md-4">
								<p><strong>Opened Divisions</strong></p>
								<p>
									<input type="text" name="div_1" class="form-control input-md" placeholder="" required="">
								</p>
							</div>
						</div>
						
						<!-- Button: Add More Divisions -->
						<div class="form-group">
							<div class="col-md-4">
								<button class="btn btn-default addfield"><span class="glyphicon glyphicon-plus"></span> Add More Divisions</button>
								<br><br>
							</div>
						</div>

						<!-- File Button: Division Assignment --> 
						<div class="form-group">
							<div class="col-md-4">
								<p><strong>Division Assignment</strong></p>
								<input id="divassign" name="divassign" class="input-file" type="file">
								<br>
							</div>
						</div>

						<!-- Multiple Checkboxes: Interview Form -->
						<div class="form-group">
							<div class="col-md-4">
								<p><strong>Interview Form</strong></p>
								<div class="checkbox">
									<label for="intervform-0">
										<input type="checkbox" name="intervform" id="intervform-0" value="yes">
										Yes, I would like to use it.
									</label>
								</div>
							
								<div class="checkbox">
									<label for="intervform-1">
										<input type="checkbox" name="intervform" id="intervform-1" value="no">
										No, I don't want to use it.
									</label>
								</div>
								<br>
							</div>
						</div>

						<!-- Button: Post -->
						<div class="form-group">
							<div class="col-md-4">
								<button id="postnewoprec" name="postnewoprec" class="btn btn-lg btn-default"><span class="glyphicon glyphicon-ok-sign"></span> Post Oprec</button>
							</div>
						</div>

					</fieldset>
				</form>
			</div> <!-- Row -->
		</div> <!-- Container -->
