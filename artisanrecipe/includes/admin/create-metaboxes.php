<?php

function ar_create_metaboxes() {
	add_meta_box(
		'ar_recipe_options_mb',
		__( 'Recipe Options', 'artisanrecipe' ),
		'ar_recipe_options_mb',
		'recipe',
		'normal',
		'high'
	);
}