<?php

/**
 * Functions for Breadcrumb Trail -- https://wordpress.org/plugins/breadcrumb-trail/
 */


/**
 * Make breadcrumbs take less space on the page
 */
add_filter( 'breadcrumb_trail_args', 'njsl_breadcrumb_add_defaults' );

function njsl_breadcrumb_add_defaults( $args ) {
	
	return array_merge(
		$args,
		array(
			'show_browse' => false,
			'labels' => array(
				'home'   => '<i class="fa fa-home fa-2x" title="' . esc_attr( sprintf( __( 'Return to %s Home', 'njsl-2014' ), get_bloginfo( 'name' ) ) ) . '"></i>'
			)
		)
	);
	
}
