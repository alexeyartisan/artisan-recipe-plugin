<div id="recipeStatus"></div>
<form id="recipeForm">
	<div class="form-group">
		<label>Title:</label>
		<input type="text" id="ar_inputTitle" class="form-control">
	</div>
	CONTENT_EDITOR
	<div class="form-group">
		<label>Ingredients:</label>
		<input type="text" id="ar_inputIngredients" class="form-control">
	</div>
	<div class="form-group">
		<label>Cooking Time:</label>
		<input type="text" id="ar_inputTime" class="form-control">
	</div>
	<div class="form-group">
		<label>Cooking Utencils:</label>
		<input type="text" id="ar_inputUtencils" class="form-control">
	</div>
	<div class="form-group">
		<label>Cooking Level:</label>
		<select id="ar_inputLevel" class="form-control">
			<option value="Beginner">Beginner</option>
			<option value="Intermediate">Intermediate</option>
			<option value="Expert">Expert</option>
		</select>
	</div>
	<div class="form-group">
		<label>Meal Type:</label>
		<input type="text" id="ar_inputMealType" class="form-control">
	</div>
	<div class="form-group">
		<input type="submit" value="Submit recipe" class="btn btn-primary">
	</div>
</form>