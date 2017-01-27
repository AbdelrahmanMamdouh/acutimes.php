<?php

	/**
 	* get shortcodes from given string content.
 	* @param string content.
 	* @return array of shortcodes.
 	*/
	function get_shortcodes($content = null)
	{
		$pattern = get_shortcode_regex(); // Regex of all shortcodes.
    	preg_match_all('/'. $pattern .'/s', $content, $matches); // Compare with the content.

    	for ( $i = 0; $i < count( $matches[0] ); $i++ ) {

        	if ( isset( $matches[0][$i] ) ) {
           		$shortcodes[] = $matches[0][$i]; // Get the full shortcodes part out of the matches result. 
        	}

    	}

    	return $shortcodes;
	}