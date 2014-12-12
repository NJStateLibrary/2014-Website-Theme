<?php
/**
 * Template for page not found (404) screen
 */

get_header(); ?>
	<div class="col-md-12">
		<div id="primary" class="site-content">
			<div id="content" role="main">
	
				<?php if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail(); ?>
				<?php get_template_part( 'content', 'none' ); ?>
	
			</div><!-- #content -->
		</div><!-- #primary -->
	</div><!-- .col-md-12 -->
	
<?php get_sidebar(); ?>
<?php get_footer();