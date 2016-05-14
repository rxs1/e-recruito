$(document).ready(function() {
	var max_fields	= 100;
	var wrapper	= $(".input_fields_wrap");
	var add_button = $(".addfield");
				
	var x = 1;
	$(add_button).click(function(e) {
		e.preventDefault();
		
		if(x < max_fields) {
			x++;
			$(wrapper).append('<p><input type="text" name="div_'+ x + '" class="form-control input-md" placeholder="" required=""/><a href="#" class="removefield btn btn-default"><span class="glyphicon glyphicon-trash"></span> Remove</p></div>');
		}
	});
				
	$(wrapper).on("click",".removefield", function(e) {
		e.preventDefault();
		$(this).parent('p').remove();
		x--;
	})
});