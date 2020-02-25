<?php

function ar_enqueue_scripts() {
	wp_register_style( 'ar_rateit', plugins_url( 'assets/rateit/rateit.css', RECIPE_PLUGIN_URL ), array(), '1.0', false );
	wp_enqueue_style( 'ar_rateit' );

	wp_register_script( 'ar_rateit', plugins_url( 'assets/rateit/jquery.rateit.min.js', RECIPE_PLUGIN_URL ), array( 'jquery' ), '1.0', true );
	wp_register_script( 'ar_main', plugins_url( 'assets/scripts/main.js', RECIPE_PLUGIN_URL ), array(), '1.0', true );

	wp_localize_script( 'ar_main', 'recipe_obj', array(
		'ajax_url' => admin_url( 'admin-ajax.php' )
	) );

	wp_enqueue_script( 'ar_rateit' );
	wp_enqueue_script( 'ar_main' );
}