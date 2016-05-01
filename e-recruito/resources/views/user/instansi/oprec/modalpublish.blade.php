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
					<p>When you publish this oprec you cant add or change the setting of oprec except deadline oprec, brosur oprec and max field per person you must unpublish this before you add more setting</a>.</p>
					<a href="{{url()}}"></a>
					
				</div>

				{!!Form::open(array('action'=>'OprecController@publish','files'=>true))!!}
				<div class="form-group">
					{!! Form::label('date','Set Deadline Oprec', ['class'=>'col-md-4 control-label']) !!}
					<input type="date" name="date" class="form-control">
				</div>
				<div class="form-group">
					{!! Form::hidden('idinstansi',$list->idinstansi)!!}
					{!! Form::hidden('idoprec',$list->id)!!}
					{!! Form::label('brosur','Brosur Open Recruitment', ['class'=>'col-md-12 control-label']) !!}
					{!! Form::file('brosur',array('class'=>'foto form-control')) !!}
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