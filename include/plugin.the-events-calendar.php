<?php

/**
 * Functions for The Events Calendar -- https://wordpress.org/plugins/the-events-calendar/
 */

/**
 * Replace the word "Website" with "Register" on event pages
 *  -- this filter is no longer used directly by The Events Calendar
 */
add_filter( 'tribe_events_single_event_meta', 'njsl_replace_tribe_events_website_label' );
function njsl_replace_tribe_events_website_label( $html ) {
	return str_replace( __( 'Website:', 'tribe-events-calendar' ), __( 'Register:', 'njsl-2014' ), $html );
}

/**
 * Recreate the above events filter by buffering and then filtering the event meta contents
 */
add_action( 'tribe_events_single_meta_details_section_start', 'njsl_replace_tribe_events_website_label_start' );
add_action( 'tribe_events_single_meta_details_section_end', 'njsl_replace_tribe_events_website_label_end' );

function njsl_replace_tribe_events_website_label_start() {
	ob_start();	
}

function njsl_replace_tribe_events_website_label_end() {
	$buffer = ob_get_clean();
	echo apply_filters( 'tribe_events_single_event_meta', $buffer );
}

/**
 * Use the normal search template for filtered searches of events instead of the TEC default
 */
add_filter( 'tribe_events_template_default-template.php', 'njsl_maybe_override_tribe_search_results_template' );
function njsl_maybe_override_tribe_search_results_template( $file ) {
	
	if( is_search() ) {
		return get_stylesheet_directory() . DIRECTORY_SEPARATOR . 'search.php';
	}
	
	return $file;
	
}