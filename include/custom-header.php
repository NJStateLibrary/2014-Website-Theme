<?php
/**
 * Custom header image functions
 */

add_filter( 'njsl_header_image_class', 'njsl_custom_header_hide_image' );
add_action( 'njsl_header_image_after', 'njsl_custom_header_add_responsive' );

/**
 * Hide the default header image on very small screens
 */
function njsl_custom_header_hide_image( $class ) {
	return 'hidden-xs';
}

/**
 * Display a smaller alternate header image on very small screens
 */
function njsl_custom_header_add_responsive() {
	?>
	<img 
		class="visible-xs"
		src="<?php echo get_template_directory_uri(); ?>/images/logos/njsl_logo_darkblue.png" 
		alt="<?php echo esc_attr( sprintf( __( '%s Logo', 'njsl-2014' ), get_bloginfo( 'name' ) ) ) ?>"
		style="margin: 0 auto; height: 70px;"
	>	
	<?php
}