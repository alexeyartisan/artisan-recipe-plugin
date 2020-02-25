<?php

function ar_generate_dayly_recipe() {
	global $wpdb;
	
	$recipe_id = $wpdb->get_var(
		"SELECT `id` FROM `" . $wpdb->posts . "` WHERE post_status='publish' AND post_type='recipe' ORDER BY rand() LIMIT 1"
	);
	
	set_transient( 'ar_daily_recipe', $recipe_id, 24 * 60 * 60 );
}