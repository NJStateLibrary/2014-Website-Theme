<?php
/**
 * Functions for Crafty Social Buttons -- https://wordpress.org/plugins/crafty-social-buttons/
 */

add_action( 'crafty-social-link-buttons', 'njsl_crafty_override_rss_title_start', 1 );
add_action( 'crafty-social-link-buttons', 'njsl_crafty_override_rss_title_end',  99 );

/**
 * Buffer the output of the link button action
 */
function njsl_crafty_override_rss_title_start() {
	ob_start();
}

/**
 * Change the title attribute of the RSS icon to "Blog"
 */
function njsl_crafty_override_rss_title_end() {
	
	$result = ob_get_clean();
	
	// Get a dummy instance of the RSS button
	$rss_class = new SH_RSS( '', array(
		'_image_set'  => '',
		'_image_size' => '',
		'open_in'     => ''
	),'' );
	
	$result = str_replace( $rss_class->getLinkButtonTitle(), __( 'Blogs', 'njsl-2014' ), $result );
	
	echo $result;
	
}

