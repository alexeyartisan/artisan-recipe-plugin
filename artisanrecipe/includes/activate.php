<?php

function ar_activate_plugin() {
	if ( version_compare( get_bloginfo('version'), '5.0', '<') ) {
		wp_die( __( 'You must have a minimum version of 5.0 to use this theme!', 'artisanrecipe' ) );
	}
	
	ar_init();
	flush_rewrite_rules();

	global $wpdb;

	$create_sql = "
	CREATE TABLE `" . $wpdb->prefix . "recipe_ratings` (
	  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
	  `recipe_id` bigint(20) UNSIGNED NOT NULL,
	  `rating` float(3,1) UNSIGNED NOT NULL,
	  `user_ip` varchar(32) NOT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB " . $wpdb->get_charset_collate() . ";
	";

	require( ABSPATH . '/wp-admin/includes/upgrade.php' );

	dbDelta( $create_sql );
	
	wp_schedule_event( time(), 'daily', 'ar_daily_recipe_hook' );
}