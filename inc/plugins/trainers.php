<?php
/*
Plugin Name: Classes
Plugin URI: http://www.skatdesign.com/
Description: A simple widget to display fitness class.
Version: 1.00
Author: Skat
Author URI: http://www.skatdesign.com/
*/

// The widget class
class sd_class_widget extends WP_Widget {
	
	// Widget Settings
	function sd_class_widget() {
	
		$widget_ops = array( 'classname' => 'sd_class_widget', 'description' => __('A widget that displays your fitness class.', 'sd-sd-framework') );
		$control_ops = "";
		$this->WP_Widget( 'sd_class_widget', __('Classes', 'sd-framework'), $widget_ops, $control_ops );
	}
	
	// Widget Output
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);

		// Before the widget
		echo $before_widget;

		// Display the widget title if one was input
		if ( $title )
		echo $before_title . $title . $after_title;
		?>
<div class="sd-class">
	<ul class="list-unstyled no-margin-left">
		<?php 
			global $post;
			$recent_posts = new WP_Query();
			$recent_posts->query('showposts='.$instance['postcount'].'&post_type=class');
			while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
		<li>
			<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : /* if post has post thumbnail */ ?>
			
				<div class="row middle-sm">
					<a class="col-md-4" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
					<div class="col-md-8">
						<p class="h5"><?php the_title(); ?></p>
					</div>
				</div>
			
			<!--image-->
			<?php endif; ?>
		
		</li>
		<?php endwhile; ?>
		<?php wp_reset_query(); ?>
	</ul>
</div>
<?php 
		// After the widget
		echo $after_widget;
	}
	// Update the widget		
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['postcount'] = strip_tags( $new_instance['postcount'] );

		return $instance;
	}

	// Widget panel settings
	function form( $instance ) {

	// Default widgets settings
		$defaults = array(
		'title' => 'Our Classes',
		'postcount' => '4'
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

<!-- Widget Title: Text Input -->
<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>">
		<?php _e('Title:', 'sd-framework') ?>
	</label>
	<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
</p>

<!-- Post Count: Text Input -->
<p>
  <label for="<?php echo $this->get_field_id( 'postcount' ); ?>">
    <?php _e('Show:', 'sd-framework') ?>
  </label>
  <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'postcount' ); ?>" name="<?php echo $this->get_field_name( 'postcount' ); ?>" value="<?php echo $instance['postcount']; ?>" />
</p>
<?php
	}
}
// Register and load the widget
function sd_class_widget() {
	register_widget( 'sd_class_widget' );
}
add_action( 'widgets_init', 'sd_class_widget' );
?>
