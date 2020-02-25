jQuery(function($){
	$('#recipe_rating').bind('rated', function() {
		$(this).rateit('readonly', true);

		var formObj = {
			action: 'ar_rate_recipe',
			rid: $(this).data('rid'),
			rating: $(this).rateit('value')
		};

		$.post(recipe_obj.ajax_url, formObj, function(data){
			console.log(data);
		});
	});
	
	$(document).on('submit', '#recipeForm', function(e) {
		e.preventDefault();
		
		$(this).hide();
		$('#recipeStatus').html('<div class="alert alert-info">Please wait! Submitting Your recipe...</div>');
		
		var formObj = {
			action: 'ar_submit_user_recipe',
			title: $('#ar_inputTitle').val(),
			content: tinymce.activeEditor.getContent(),
			ingredients: $('#ar_inputIngredients').val(),
			time: $('#ar_inputTime').val(),
			utensils: $('#ar_inputUtencils').val(),
			level: $('#ar_inputLevel').val(),
			meal_type: $('#ar_inputMealType').val(),
		};
		
		$.post(recipe_obj.ajax_url, formObj, function(data){
			console.log(data);
			
			if (data.status == 2) {
				$('#recipeStatus').html('<div class="alert alert-success">Recipe submitted successfully!</div>');
			} else {
				$('#recipeStatus').html('<div class="alert alert-danger">Error occured!</div>');
				$('#recipeForm').show();
			}
		});
	});
});