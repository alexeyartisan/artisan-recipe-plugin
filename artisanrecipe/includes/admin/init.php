<?php

function ar_admin_init() {
	require( 'create-metaboxes.php' );
	require( 'recipe-options.php' );
	require( 'enqueue.php' );
	require( 'columns.php' );

	add_action( 'add_meta_boxes_recipe', 'ar_create_metaboxes' );
	add_action( 'admin_enqueue_scripts', 'ar_admin_enqueue' );
	add_filter( 'manage_edit-recipe_columns', 'ar_add_new_recipe_columns' );
	add_action( 'manage_recipe_posts_custom_column', 'ar_manage_recipe_columns', 10, 2 );
}