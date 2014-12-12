<?php
/**
 * Default Events Template
 * This file is the basic wrapper template for all the views if 'Default Events Template' 
 * is selected in Events -> Settings -> Template -> Events Template.
 * 
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * @package TribeEventsCalendar
 * @since  3.0
 * @author Modern Tribe Inc.
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); }

get_header(); ?>

	<div class="col-md-12">
		<div id="primary" class="site-content">
			<div id="content" role="main">
	
				<?php // if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail(); ?>

<div id="tribe-events-pg-template">
	<?php tribe_events_before_html(); ?>
	<?php tribe_get_view(); ?>
	<?php tribe_events_after_html(); ?>
</div> <!-- #tribe-events-pg-template -->

			</div><!-- #content -->
		</div><!-- #primary -->
	</div><!-- .col-md-12 -->


<?php get_footer(); ?>