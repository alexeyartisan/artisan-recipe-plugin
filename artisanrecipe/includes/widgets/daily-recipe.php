<?php

class AR_DAILY_RECIPE_WIDGET extends WP_WIDGET
{
	public function __construct() {
		parent::__construct( 'r_daily_recipe_widget', 'Recipe of the day', array(
			'description' => 'Displays a random recipe each day'
		) );
	}
 
    public function widget( $args, $instance ) {
        extract( $args );
		extract( $instance );
		
		$title = apply_filters( 'widget_title', $title );
		
		echo $before_widget;
		echo $before_title . $title . $after_title;
		
		$recipe_id = get_transient( 'ar_daily_recipe' );
		?>
		<a href="<?php echo get_permalink( $recipe_id ); ?>"><?php echo get_the_title( $recipe_id ); ?></a>
		<?php
		
		echo $after_widget;
    }
 
    public function form( $instance ) {
        $default = array( 'title' => 'Recipe of the day' );
		$instance = wp_parse_args( (array) $instance, $default );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
			name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>">
		</p>
		<?php
    }
 
    public function update( $new_instance, $old_instance ) {		
        $instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );
		
		return $instance;
    }
}