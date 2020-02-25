<?php 

function ar_add_dashboard_widgets() {
	wp_add_dashboard_widget(
		'ar_latest_recipe_widget',
		'Latest Recipe Ratings',
		'ar_latest_recipe_rating_display'
	);
}

function ar_latest_recipe_rating_display() {
	global $wpdb;
	
	$lates_ratings = $wpdb->get_results(
		"SELECT * FROM`" . $wpdb->prefix . "recipe_ratings` ORDER BY `id` DESC LIMIT 3"
	);
	
	echo "<ul>";
	
	foreach( $lates_ratings as $rating ) {
		$title = get_the_title( $rating->recipe_id );
		$permalink = get_the_permalink( $rating->recipe_id );
		?>
		<li>
			<a href="<?php echo $permalink; ?>"><?php echo $title; ?></a> received a rating of <?php echo $rating->rating; ?>
		</li>
		<?php
	}
	
	echo "</ul>";
}