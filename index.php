<?php
/**
 * The main template file -- overriden by content.php
 */

get_header(); ?>

	<div class="col-md-12">
		<div id="primary" class="site-content">
			<div id="content" role="main">
			<?php if ( have_posts() ) : ?>
	
				<?php if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail(); ?>
				
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php if( in_array( get_post_type(), array( 'post', 'page' ) ) ) : ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
					<?php else: ?>
						<?php get_template_part( 'content', get_post_type() ); ?>
					<?php endif; ?>
				<?php endwhile; ?>
	
			<?php else : ?>
	
				<article id="post-0" class="post no-results not-found">
	
					<?php if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail(); ?>
					
					<?php get_template_part( 'content','none' ); ?>
	
				</article><!-- #post-0 -->
	
			<?php endif; // end have_posts() check ?>
	
			</div><!-- #content -->
			<hr>
		</div><!-- #primary .container -->
	</div>

<?php // get_sidebar(); // No sidebar in current theme ?>
<?php get_footer(); ?>