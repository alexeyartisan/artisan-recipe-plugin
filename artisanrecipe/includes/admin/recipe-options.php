<?php

function ar_recipe_options_mb( $post ) {

$recipe_data = get_post_meta( $post->ID, 'recipe_data', true );

if ( empty( $recipe_data ) ) {
	$recipe_data = array(
		'ingredients' => '',
		'time' => '',
		'utensils' => '',
		'level' => '',
		'meal_type' => '',
	);
}

?>
<table class="form-table">
    <tr>
	    <th scope="row">
	        <label for="ar_inputIngredients"><?php _e( 'Ingredients:', 'artisanrecipe' ); ?></label>
	    </th>			 
	    <td>
	        <input type="text" value="<?php echo $recipe_data['ingredients']; ?>" id="ar_inputIngredients" name="ar_inputIngredients" class="regular-text">
	    </td>
	</tr>
	<tr>
	    <th scope="row">
	        <label for="ar_inputTime"><?php _e( 'Cooking time:', 'artisanrecipe' ); ?></label>
	    </th>			 
	    <td>
	        <input type="text" value="<?php echo $recipe_data['time']; ?>" id="ar_inputTime" name="ar_inputTime" class="regular-text">
	    </td>
	</tr>
	<tr>
	    <th scope="row">
	        <label for="ar_inputUtensils"><?php _e( 'Cooking utensils:', 'artisanrecipe' ); ?></label>
	    </th>			 
	    <td>
	        <input type="text" value="<?php echo $recipe_data['utensils']; ?>" id="ar_inputUtensils" name="ar_inputUtensils" class="regular-text">
	    </td>
	</tr>
	<tr>
	    <th scope="row">
	        <label for="art_inputLevel"><?php _e( 'Cooking level:', 'artisanrecipe' ); ?></label>
	    </th>			 
	    <td>
	        <select name="art_inputLevel" class="regular-text">
	        	<option value="Beginner">Beginner</option>
	        	<option value="Intermediate" <?php echo $recipe_data['level'] == 'Intermediate' ? 'selected': '' ?>>Intermediate</option>
	        	<option value="Expert" <?php echo $recipe_data['level'] == 'Expert' ? 'selected': '' ?>>Expert</option>
	        </select>
	    </td>
	</tr>
	<tr>
	    <th scope="row">
	        <label for="ar_inputMealType"><?php _e( 'Meal type:', 'artisanrecipe' ); ?></label>
	    </th>			 
	    <td>
	        <input type="text" value="<?php echo $recipe_data['meal_type']; ?>" id="ar_inputMealType" name="ar_inputMealType" class="regular-text">
	    </td>
	</tr>
</table>
<?php
}