<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 * 
 * TODO: update and customize
 * 
 */

get_header(); ?>

	<div class="col-md-12">
		<div id="primary" class="site-content">
			<div id="content" role="main">
	
				<?php if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail(); ?>
				
				<?php while ( have_posts() ) : the_post(); ?>
	
					<?php if( in_array( get_post_type(), array( 'post', 'page' ) ) ) : ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
					<?php else: ?>
						<?php get_template_part( 'content', get_post_type() ); ?>
					<?php endif; ?>
	
					<?php comments_template( '', true ); ?>
	
				<?php endwhile; // end of the loop. ?>
	
			</div><!-- #content -->
		</div><!-- #primary -->
	</div><!-- .col-md-12 -->
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>