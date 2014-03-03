<?php
/*
 *  Shortcode Widget Displat
 *  Name: Centauri Testimonials
 *  Class: widget-testimonial
 *  Function: widget_testimonial
 *
 *  Author: Patrick James Garcia
 *  Company: Beenest Technology Solutions, Inc.
 *  Author URI: http://www.beenest-tech.com
 *  
 */

add_action( 'widgets_init', 'bn_shortcode_widget' );

function bn_shortcode_widget() {
	register_widget( 'shortcode_widget' );
}

class shortcode_widget extends WP_Widget {
	function shortcode_widget() {  
        $widget_ops = array(
        	'classname' => 'widget-shortcode', 
        	'description' => __('A widget that displays any shortcode as widget', 'bn_shortcode_widget') 
        );

        $control_ops = array(
        	'id_base' => 'bn_shortcode_widget'
        );

        $this->WP_Widget(
        	'bn_shortcode_widget', 
        	__('<span style="color: #ff5400;">[Chum]</span> Shortcode Display', 'bn_shortcode_widget'), 
        	$widget_ops, $control_ops );  
	}

	function widget( $args, $instance ) {
		extract( $args );

		//Our variables from the widget settings.
		$title		= apply_filters('widget_title', $instance['title'] );
		$shortcode	= $instance['shortcode'];



		$html = '<aside class="widget widget-shortcode-post"><h3 class="widget-title">' . $title . '</h3>';

		$html .= do_shortcode( $shortcode );

		$html .= '</aside>';
		echo $html;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;  
	    //Strip tags from title and name to remove HTML  
	    $instance['title'] = strip_tags( $new_instance['title'] );  
	    $instance['shortcode'] = strip_tags( $new_instance['shortcode'] ); 
	  
	    return $instance;  
	}
	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array( 
			'title' => __('Contact Form', 'bn_shortcode_widget'), 
			'shortcode' => __('[contact_form]', 'bn_shortcode_widget')
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

?>

<!-- Widget Title: Text Input -->
		<style>
			small {display: block; padding: 0 2px;}
			.widefat {margin-bottom: 3px;}
			#extended-text-widget-delete {
				color: red;
				margin-left: 5px;
			}
			#extended-text-widget-delete:hover {
				color: maroon;
			}
			select[id*="link_url"] {
				width: 100%;
			}
		</style>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'bn_shortcode_widget'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'shortcode' ); ?>"><?php _e('Shortcode:', 'bn_shortcode_widget'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'shortcode' ); ?>" name="<?php echo $this->get_field_name( 'shortcode' ); ?>" value="<?php echo $instance['shortcode']; ?>" type="text" />
		</p>


<?php
	} //form
} //Testimonial_Widget
