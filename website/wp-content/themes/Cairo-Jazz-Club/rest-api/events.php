<?php
//	wp-json/cjc/calendar/events/{id}/artists
add_action( 'rest_api_init', function() {
	register_rest_route( 'cjc/', 'calendar/events/(?P<id>\d+)/artists', array(
			'methods' => 'GET',
			'callback' => 'restapi_cjc_calendar_events_performing_artists',
		) );
} );	

//	wp-json/cjc/calendar/events/
add_action( 'rest_api_init', function() {
	register_rest_route( 'cjc/', 'calendar/events/(?P<filter>\w+)', array(
			'methods' => 'GET',
			'callback' => 'restapi_cjc_calendar_events',
		) );
} );

function restapi_cjc_calendar_events_performing_artists($request) {
	$event_id = $request['id'];
	$artists_ids = get_field('performing_artists', $event_id, false);

	$args = array(
				'post_type' => 'artists',
				'post__in' => $artists_ids,
				'post_status' => 'any',
				'orderby' => 'post__in',
			);
	$artists = get_posts( $args );
	
	foreach( $artists as $artist ) {
		$link = get_permalink( $artist->ID );
		$img = wp_get_attachment_image_src(get_post_thumbnail_id($artist->ID), "circle", true)[0];
		
		$artists_data[] = array(
							'id' => $artist->ID,
							'title' => $artist->post_title,
							'img' => $img,
							'url' => $link
						);
	}
	return $artists_data;
}

function restapi_cjc_calendar_events($request) {

	$filter = $request['filter'];

	if ( $filter === 'all' ) {
		$args = array(
			'post_type' => 'avent',
			'post_status' => 'publish',
			'posts_per_page' => -1, // all
			'meta_key' => 'date',
			'orderby' => 'meta_value_num',
			'order' => 'ASC'
		);
	} else if ( $filter === 'upcoming' ) {
		$args = array( 
			'post_type' => 'avent',
			'post_status' => 'publish',
			'posts_per_page' => 7,
			'meta_key'  => 'date',
			'meta_value'   => current_time( "Ymd" ), // today
			'meta_compare' => '>=',
			'orderby' => 'meta_value_num',
			'order' => 'ASC'
		);
	}
	
	$query = new WP_Query( $args );
	
	$events = array();
	
	while( $query->have_posts() ) : $query->the_post();
	
		$thumb_id = get_post_thumbnail_id();
		$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'event-calendar', true);
		$thumb_url = $thumb_url_array[0];
		$event_id = get_the_id();

		$term_list = wp_get_post_terms($event_id, 'night-type');

        $artists = get_field('performing_artists',$event_id, false);
        $number_of_genres=0;  //the number of all the genres for one event
        
         if($artists != ""){
        for($j=0;$j<count($artists);$j++) //looping throw all the artists in one event
        {
            $test = count($artists);
            $genre=wp_get_post_terms($artists[$j]->ID,'genre');  // getting the genre taxonomy from the artist
        for($i=0;$i<count($genre);$i++) // looping throw the genres and get the name of each one
        {
            $genres[$i]=$genre[$i]->name;
            $number_of_genres++;
        }
        
        }
        }
		// Add a event entry
		$events[] = array(
			'title' 		=> get_the_title(),
			'startDate' 	=> get_field('date'),
			'img' 			=> $thumb_url,
			'url' 			=> get_the_permalink(),
			'id' 			=> $event_id,
			'type' 			=> isset($term_list[0]) ? $term_list[0]->slug : null,
            'genres'       =>  isset($genres) ? $genres: null
		);
	
	endwhile;
	
	wp_reset_query();
	
	return $events;
};