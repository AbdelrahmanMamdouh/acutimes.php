function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Genres.
	 */

	$labels = array(
		"name" => __( 'Genres', 'cairo-jazz-club' ),
		"singular_name" => __( 'Genre', 'cairo-jazz-club' ),
	);

	$args = array(
		"label" => __( 'Genres', 'cairo-jazz-club' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Genres",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'genre', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "genre", array( "artist" ), $args );

	/**
	 * Taxonomy: Night Types.
	 */

	$labels = array(
		"name" => __( 'Night Types', 'cairo-jazz-club' ),
		"singular_name" => __( 'Night Type', 'cairo-jazz-club' ),
	);

	$args = array(
		"label" => __( 'Night Types', 'cairo-jazz-club' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Night Types",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'night-type', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "night-type", array( "artist" ), $args );

	/**
	 * Taxonomy: Artists Status.
	 */

	$labels = array(
		"name" => __( 'Artists Status', 'cairo-jazz-club' ),
		"singular_name" => __( 'Artist Status', 'cairo-jazz-club' ),
	);

	$args = array(
		"label" => __( 'Artists Status', 'cairo-jazz-club' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Artists Status",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'artist_status', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "artist_status", array( "artists" ), $args );
}

add_action( 'init', 'cptui_register_my_taxes' );
