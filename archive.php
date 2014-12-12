<?php 
/**
 * Display archive page
 */

get_header(); 
?>
	<div class="col-md-12">
		<div id="primary" class="site-content">
			<div id="content" role="main">
			
				<?php if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail(); ?>
				
			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php
						if ( is_category() ) :
							
							printf( __( '%s Items', 'njsl-2014' ), ucwords( single_cat_title( '', false ) ) );
							
							category_description();
							
						elseif (is_tag()) :
							single_tag_title();

						elseif (is_author()) :
							/* Queue the first post, that way we know
							 * what author we're dealing with (if that is the case).
							 */
							the_post();
							printf(__( 'Posts by: %s', 'njsl-2014' ), '<span class="vcard">' . get_the_author() . '</span>');
							/* Since we called the_post() above, we need to
							 * rewind the loop back to the beginning that way
							 * we can run the loop properly, in full.
							 */
							rewind_posts();

						elseif (is_day()) :
							printf(__( 'Day: %s', 'njsl-2014' ), '<span>' . get_the_date() . '</span>');

						elseif (is_month()) :
							printf(__( 'Month: %s', 'njsl-2014' ), '<span>' . get_the_date('F Y') . '</span>');

						elseif (is_year()) :
							printf(__( 'Year: %s', 'njsl-2014' ), '<span>' . get_the_date('Y') . '</span>');

						elseif (is_tax('post_format', 'post-format-aside')) :
							_e( 'Asides', 'njsl-2014' );

						elseif (is_tax('post_format', 'post-format-image')) :
							_e( 'Images', 'njsl-2014' );

						elseif (is_tax('post_format', 'post-format-video')) :
							_e( 'Videos', 'njsl-2014' );

						elseif (is_tax('post_format', 'post-format-quote')) :
							_e( 'Quotes', 'njsl-2014' );

						elseif (is_tax('post_format', 'post-format-link')) :
							_e( 'Links', 'njsl-2014' );

						else :
							$post_type = get_post_type();
							if( 'post' !== $post_type )
								printf( __('%s Archive', 'njsl-2014' ), ucwords(str_replace( '_',' ', $post_type ) ) );
							else
								_e( 'Archives', 'njsl-2014' );

						endif;
						?> 
					</h1>
					
					<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty($term_description ) ) {
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					} //endif;
					?>
				</header><!-- .page-header -->
						
				<?php 
				/* Start the Loop */
				while ( have_posts() ) {
					the_post();

					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */

					if( 'post' != get_post_type() )
						get_template_part( 'content', get_post_type() );
					else
						get_template_part( 'content', get_post_format() );

					if( in_array( get_post_type(), array( 'post', 'news' ) ) )
						do_action('crafty-social-share-buttons');
					
				} //endwhile; 
				?> 

				<?php if( function_exists( 'twentyfourteen_paging_nav' ) ) twentyfourteen_paging_nav(); ?> 

			<?php else: ?> 

				<?php get_template_part( 'content', 'none' ); ?> 

			<?php endif; ?> 
			</div><!-- #content -->
			<hr>
		</div><!-- #primary .container -->
	</div>

<?php // get_sidebar(); // No sidebar in current theme ?>
<?php get_footer(); ?>