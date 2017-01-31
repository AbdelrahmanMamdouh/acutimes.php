<?php

class CJC_Android_IOS_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'cjc_android-ios_widget', // Base ID
			esc_html__( 'CJC play store & app store', 'cairo-jazz-club' ), // Name
			array( 'description' => esc_html__( 'a widget for contact us', 'cairo-jazz-club' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args	 Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		$title= (!empty( $instance['title'] ))?apply_filters( 'widget_title', $instance['title'] ):'';
		$ios = get_theme_mod('cjc-identity-ios');
		$android = get_theme_mod('cjc-identity-android');

		if($android || $ios){
		?>
			<p><?php echo $title ?></p>
			<div class="download-app">
				<ul>
					<?php if ($android) { ?>
						<li><a href="<?php echo $android ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/android-store.png" alt=""></a></li>
					<?php } ?>

					<?php if ($ios) { ?>
						<li><a href="<?php echo $ios ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/apple-store.png" alt=""></a></li>
					<?php } ?>
				</ul>
			</div>
		<?php
		}

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Download our App', 'text_domain' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

}