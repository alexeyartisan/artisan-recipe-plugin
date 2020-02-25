<?php

/*
	Plugin Name: Artisan Recipe
	Description: A simple WordPress plugin that allows users to create their recipes and rate them
	Version: 1.0
	Author: Alexey Stetsyura
	Author URI: https://github.com/alexeyartisan/
	Text Domain: artisanrecipe
*/

if ( !function_exists( 'add_action' ) ) {
	echo "Not allowed!";
	exit();
}

// Setup

define( 'RECIPE_PLUGIN_URL', __FILE__ );

// Includes

require( 'includes/activate.php' );
require( 'includes/deactivate.php' );
require( 'includes/init.php' );
require( 'includes/admin/init.php' );
require( 'process/save-post.php' );
require( 'process/filter-content.php' );
require( 'includes/front/enqueue.php' );
require( 'process/rate-recipe.php' );
require( dirname( RECIPE_PLUGIN_URL ) . '/includes/widgets.php' );
require( dirname( RECIPE_PLUGIN_URL ) . '/includes/widgets/daily-recipe.php' );
require( 'includes/cron.php' );
require( 'includes/shortcodes/creator.php' );
require( 'process/submit-user-recipe.php' );
require( 'includes/admin/dashboard-widgets.php' );

// Hooks

register_activation_hook( __FILE__, 'ar_activate_plugin' );
register_deactivation_hook( __FILE__, 'ar_deactivate_plugin' );
add_action( 'init', 'ar_init' );
add_action( 'admin_init', 'ar_admin_init' );
add_action( 'save_post_recipe', 'ar_save_post_admin', 10, 3 );
add_action( 'wp_enqueue_scripts', 'ar_enqueue_scripts' );
add_action( 'wp_ajax_ar_rate_recipe', 'ar_rate_recipe' );
add_action( 'wp_ajax_nopriv_ar_rate_recipe', 'ar_rate_recipe' );
add_filter( 'the_content', 'ar_filter_recipe_content' );
add_action( 'widgets_init', 'ar_widgets_init' );
add_action( 'ar_daily_recipe_hook', 'ar_generate_dayly_recipe' );
add_action( 'wp_ajax_ar_submit_user_recipe', 'ar_submit_user_recipe' );
add_action( 'wp_ajax_nopriv_ar_submit_user_recipe', 'ar_submit_user_recipe' );
add_action( 'wp_dashboard_setup', 'ar_add_dashboard_widgets' );

// Shortcodes

add_shortcode( 'recipe_creator', 'ar_recipe_creator_shortcode' );