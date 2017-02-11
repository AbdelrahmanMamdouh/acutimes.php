<?php
//	wp-json/cjc/calendar/events/
add_action( 'rest_api_init', function() {
	register_rest_route( 'cjc/', 'calendar/events', array(
			'methods' => 'GET',
			'callback' => 'restapi_cjc_calendar_events',
		) );
} );	

function restapi_cjc_calendar_events(){
	$args = array(
	'post_type' => 'avent',
	'post_status' => 'publish',
	'posts_per_page' => -1, // all
	'orderby' => 'title',
	'order' => 'ASC'
	);
	
	$query = new WP_Query( $args );
	
	$events = array();
	
	while( $query->have_posts() ) : $query->the_post();
	
		$thumb_id = get_post_thumbnail_id();
		$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'event-calendar', true);
		$thumb_url = $thumb_url_array[0];
		$event_id = get_the_id();

		$term_list = wp_get_post_terms($event_id, 'night-type');

		// Add a event entry
		$events[] = array(
			'title' => get_the_title(),
			'startDate' => get_field('date'),
			'img' => $thumb_url,
			'url' => get_the_permalink(),
			'id' => $event_id,
			'type' => $term_list[0]->slug
		);
	
	endwhile;
	
	wp_reset_query();
	
	return $events;
};