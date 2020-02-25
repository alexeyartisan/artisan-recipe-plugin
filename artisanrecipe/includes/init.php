<?php

function ar_init() {
	$labels = array(
		'name' => __( 'Recipe', 'artisanrecipe' ),
		'singular_name' => __( 'Recipe', 'artisanrecipe' ),
		'menu_name' => __( 'Recipes', 'artisanrecipe' ),
		'name_admin_bar' => __( 'Recipe', 'artisanrecipe' ),
		'add_new' => __( 'Add New', 'artisanrecipe' ),
		'add_new_item' => __( 'Add New Recipe', 'artisanrecipe' ),
		'new_item' => __( 'New Recipe', 'artisanrecipe' ),
		'edit_item' => __( 'Edit Recipe', 'artisanrecipe' ),
		'view_item' => __( 'View Recipe', 'artisanrecipe' ),
		'all_items' => __( 'All Recipes', 'artisanrecipe' ),
		'search_items' => __( 'Search Recipes', 'artisanrecipe' ),
		'parent_item_colon' => __( 'Parent Recipes:', 'artisanrecipe' ),
		'not_found' => __( 'No recipes found.', 'artisanrecipe' ),
		'not_found_in_trash' => __( 'No recipes found in Trash.', 'artisanrecipe' )
	);

	$args = array(
		'labels' => $labels,
		'description' => __( 'A custom post type for recipes', 'artisanrecipe' ),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'recipe' ),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 20,
		'supports' => array( 'title', 'editor', 'author', 'thumbnail' ),
		'taxonomies' => array( 'category', 'post_tag' )
	);

	register_post_type( 'recipe', $args );
}