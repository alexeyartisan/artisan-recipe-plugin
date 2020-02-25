<?php

function ar_add_new_recipe_columns( $columns ) {
	$new_columns = array();
	$new_columns['cb'] = '<input type="checkbox">';
	$new_columns['title'] = __( 'Title', 'artisanrecipe' );
	$new_columns['author'] = __( 'Author', 'artisanrecipe' );
	$new_columns['categories'] = __( 'Categories', 'artisanrecipe' );
	$new_columns['count'] = __( 'Ratings Count', 'artisanrecipe' );
	$new_columns['rating'] = __( 'Average Rating', 'artisanrecipe' );
	$new_columns['date'] = __( 'Date', 'artisanrecipe' );
	
	return $new_columns;
}

function ar_manage_recipe_columns( $column_name, $id ) {
	switch($column_name) {
		case 'count':
			$recipe_data = get_post_meta( $id, 'recipe_data', true );
			echo $recipe_data['rating_count'];
			break;
		case 'rating':
			$recipe_data = get_post_meta( $id, 'recipe_data', true );
			echo $recipe_data['rating'];
			break;
		default:
			break;
	}
}