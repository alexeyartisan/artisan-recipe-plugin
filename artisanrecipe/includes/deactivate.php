<?php

function ar_deactivate_plugin() {
	wp_clear_scheduled_hook( 'ar_daily_recipe_hook' );
}