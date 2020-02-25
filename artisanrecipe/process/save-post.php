<?php

function ar_save_post_admin( $post_id, $post, $update ) {
	if ( !$update ) {
		return;
	}

	$recipe_data = array();

	$recipe_data['ingredients'] = sanitize_text_field( ar_fill_post_nulls('ar_inputIngredients') );
	$recipe_data['time'] = sanitize_text_field( ar_fill_post_nulls('ar_inputTime') );
	$recipe_data['utensils'] = sanitize_text_field( ar_fill_post_nulls('ar_inputUtensils') );
	$recipe_data['level'] = sanitize_text_field( ar_fill_post_nulls('art_inputLevel') );
	$recipe_data['meal_type'] = sanitize_text_field( ar_fill_post_nulls('ar_inputMealType') );
	$recipe_data['rating'] = 0;
	$recipe_data['rating_count'] = 0;

	update_post_meta( $post_id, 'recipe_data', $recipe_data );
}

function ar_fill_post_nulls( $index ) {
	if ( isset( $_POST[$index] ) ) {
		return $_POST[$index];
	}
	
	return '';
}