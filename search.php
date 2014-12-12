<?php 
/**
 * Display search results page
 */

get_header(); 

global $wp_query;

?>
	<?php if ( have_posts() ) : ?>
	<div class="col-md-12">
		<div id="primary" class="site-content">
			<div id="content" class="row" role="main">
				<div class="search-content <?php echo ( is_active_sidebar( 'search_facets' ) ? 'col-md-9' : 'col-md-12' ) ?>">
			
				<?php if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail(); ?>
				
				<?php
					// Get total result count
					$allsearch = new WP_Query("s=$s&showposts=-1");
					$result_count = $allsearch->post_count;
					wp_reset_query();
				?>
				
				<header class="page-header">
					<h1 class="page-title">
						<?php printf( _n( '%d result for: %s', '%d results for: %s', $result_count, 'njsl' ), $result_count, get_search_query() ); ?>
					</h1>
					
					<?php
					// Show an optional term description.
					$term_description = term_description();
					if (!empty($term_description)) {
						printf('<div class="taxonomy-description">%s</div>', $term_description);
					} //endif;
					?>
				</header><!-- .page-header -->
						
				<?php 
				/* Start the Loop */
				while (have_posts()) {
					the_post();

					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					if( 'post' != get_post_type() )
						get_template_part( 'content', get_post_type() );
					else
						get_template_part('content', get_post_format());
				} //endwhile; 
				?> 

				<?php if( function_exists( 'twentyfourteen_paging_nav' ) ) twentyfourteen_paging_nav(); ?> 
				
				</div>
				<?php if( is_active_sidebar( 'search_facets' ) ) : ?>
				<div class="col-md-3">
					<?php dynamic_sidebar( 'search_facets' ); ?>
				</div>
				<?php endif; // endif search sidebar is active ?>
				
			</div><!-- #content -->
			<hr>
		</div><!-- #primary .container -->
	</div>
	<?php else: /** This is displayed if no results are found */ ?> 
	<div class="col-md-12">
		<div id="primary" class="site-content">
			<div id="content" role="main">
			<?php get_template_part('content', 'none'); ?> 
			</div><!-- #content -->
			<hr>
		</div><!-- #primary .container -->
	</div>
	<?php endif; ?> 

<?php // get_sidebar(); // No sidebar in current theme ?>
<?php get_footer(); ?>