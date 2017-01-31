<?php

add_filter('essgrid_post_meta_handle', 'eg_add_post_option');
add_filter('essgrid_post_meta_content', 'eg_add_post_content', 10, 4);

function eg_add_post_option($post_options) {

    // where 'theme_dir' is the attribute of the data to pull in
    $post_options['theme_dir'] = array('name' => 'Theme Directory');

    // where 'genres_list' is the attribute of the data to pull in
    $post_options['genres_list'] = array('name' => 'Genres List');

    return $post_options;
}

function eg_add_post_content($meta_value, $meta, $post_id, $post) {

    // where 'theme_dir' is the attribute of the data to pull in
    if ($meta === 'theme_dir') {

        // return current theme directory
        return get_template_directory_uri();
    }

    // where 'genres_list' is the attribute of the data to pull in
    if ($meta === 'genres_list') {

    	$genres = wp_get_post_terms( $post_id, 'genre');

    	foreach ($genres as $genre)	{	
    		$genres_names[] = $genre->name;
    	}

        return implode(", ", $genres_names);
    }

}

?>