<?php

function ar_filter_recipe_content( $content ) {
	if ( !is_singular( 'recipe' ) ) {
		return $content;
	}

	global $post, $wpdb;

	$recipe_data = get_post_meta( $post->ID, 'recipe_data', true );
	$recipe_html = file_get_contents( 'recipe-template.php', true );

	$recipe_html = str_replace( "INGREDIENTS_I18N", __( 'Ingredients:', 'artisanrecipe' ), $recipe_html );
	$recipe_html = str_replace( "COOKING_TIME_I18N", __( 'Cooking time:', 'artisanrecipe' ), $recipe_html );
	$recipe_html = str_replace( "UTENCILS_I18N", __( 'Utencils:', 'artisanrecipe' ), $recipe_html );
	$recipe_html = str_replace( "LEVEL_I18N", __( 'Level:', 'artisanrecipe' ), $recipe_html );
	$recipe_html = str_replace( "TYPE_I18N", __( 'Meal type:', 'artisanrecipe' ), $recipe_html );
	$recipe_html = str_replace( "RATE_I18N", __( 'Rating:', 'artisanrecipe' ), $recipe_html );

	$recipe_html = str_replace( "INGREDIENTS_PH", $recipe_data['ingredients'], $recipe_html );
	$recipe_html = str_replace( "COOKING_TIME_PH", $recipe_data['time'], $recipe_html );
	$recipe_html = str_replace( "UTENCILS_PH", $recipe_data['utensils'], $recipe_html );
	$recipe_html = str_replace( "LEVEL_PH", $recipe_data['level'], $recipe_html );
	$recipe_html = str_replace( "TYPE_PH", $recipe_data['meal_type'], $recipe_html );
	$recipe_html = str_replace( "RECIPE_ID", $post->ID, $recipe_html );
	$recipe_html = str_replace( "RECIPE_RATING", $recipe_data['rating'], $recipe_html );

	$user_ip = $_SERVER['REMOTE_ADDR'];

	$rating_count = $wpdb->get_var( $wpdb->prepare(
		"SELECT COUNT(id) FROM `" . $wpdb->prefix . "recipe_ratings` WHERE `recipe_id`=%d AND `user_ip`=%s",
		$post->ID, $user_ip
	) );

	$readonly_placeholder = '';

	if ( $rating_count > 0 ) {
		$readonly_placeholder = 'data-rateit-readonly="true"';
	}

	$recipe_html = str_replace( "READONLY_PLACEHOLDER", $readonly_placeholder, $recipe_html );

	return $recipe_html . $content;
}