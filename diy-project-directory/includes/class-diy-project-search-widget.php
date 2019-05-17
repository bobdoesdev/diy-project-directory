<?php
/**
 * Widget API: WP_Widget_Search class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */

/**
 * Core class used to implement a Search widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class DIY_Project_Search_Widget extends WP_Widget {

	/**
	 * Sets up a new Search widget instance.
	 *
	 * @since 2.8.0
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'widget_search',
			'description' => __( 'A search form for your site.' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'search', _x( 'DIY Project Search', 'DIY Project Search widget' ), $widget_ops );

		add_action( 'widgets_init', array($this, 'register_new_widget') );
	}

	public function register_new_widget() {
		register_widget( 'DIY_Project_Search_Widget' );
	}

	/**
	 * Outputs the content for the current Search widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Search widget instance.
	 */
	public function widget( $args, $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		echo $args['before_widget'];
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		?>
		<form method="get" id="searchform" action="<?php echo home_url(); ?>/" class="form-inline">
			<div class="form-group">
		    <label class="sr-only" for="exampleInputAmount"  for="s"><?php _e('Search:', 'dei'); ?></label>
		 		<div class="input-group">
		 			<input type="hidden" name="post_type" value="diy-project" />
					<input type="text" class="form-control"  value="<?php the_search_query(); ?>" placeholder="Search:" name="s" id="s" />
				</div>
				
				<button type="submit" id="searchsubmit" class="btn btn-primary"><i class="fa fa-search"></i></button>
		  </div>
		</form>

		<?php

		echo $args['after_widget'];
	}

	/**
	 * Outputs the settings form for the Search widget.
	 *
	 * @since 2.8.0
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
		$title = $instance['title'];
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
		<?php
	}

	/**
	 * Handles updating settings for the current Search widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$new_instance = wp_parse_args((array) $new_instance, array( 'title' => ''));
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		return $instance;
	}

}


$diy_project_search_widget = new DIY_Project_Search_Widget();