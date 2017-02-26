<?php
function cptui_register_my_cpts() {

	/**
	 * Post Type: Events.
	 */

	$labels = array(
		"name" => __( 'Events', 'cairo-jazz-club' ),
		"singular_name" => __( 'Event', 'cairo-jazz-club' ),
	);

	$args = array(
		"label" => __( 'Events', 'cairo-jazz-club' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "events", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 20,
		"supports" => array( "title", "editor", "thumbnail" ),
		"taxonomies" => array( "genre", "night-type" ),
	);

	register_post_type( "avent", $args );

	/**
	 * Post Type: Videos.
	 */

	$labels = array(
		"name" => __( 'Videos', 'cairo-jazz-club' ),
		"singular_name" => __( 'Video', 'cairo-jazz-club' ),
	);

	$args = array(
		"label" => __( 'Videos', 'cairo-jazz-club' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "video", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 19,
		"supports" => array( "title", "thumbnail" ),
	);

	register_post_type( "video", $args );

	/**
	 * Post Type: Artists.
	 */

	$labels = array(
		"name" => __( 'Artists', 'cairo-jazz-club' ),
		"singular_name" => __( 'Artist', 'cairo-jazz-club' ),
	);

	$args = array(
		"label" => __( 'Artists', 'cairo-jazz-club' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "artists", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 12,
		"menu_icon" => "dashicons-admin-users",
		"supports" => array( "title", "editor", "thumbnail" ),
		"taxonomies" => array( "genre", "night-type", "calendar", "venue" ),
	);

	register_post_type( "artists", $args );

	/**
	 * Post Type: Albums.
	 */

	$labels = array(
		"name" => __( 'Albums', 'cairo-jazz-club' ),
		"singular_name" => __( 'Album', 'cairo-jazz-club' ),
	);

	$args = array(
		"label" => __( 'Albums', 'cairo-jazz-club' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "albums",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "albums", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 17,
		"menu_icon" => "dashicons-format-gallery",
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "albums", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );
