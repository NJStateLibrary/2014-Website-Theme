<?php
/**
 * The Template for displaying the "Blogs" page
 * 
 * Displays a category listing above a roll of the most recent posts across categories
 *
 */

get_header(); ?>

	<div class="col-md-12">
		<div id="primary" class="site-content">
			<div id="content" role="main">
	
				<?php if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail(); ?>
				
				<header class="entry-header">
					<?php // the_post_thumbnail(); ?>
					<?php if ( is_singular() ) : ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php else : ?>
						<div class="clearfix"></div>
						<h1 class="entry-title">
							<?php if( is_search() ) : ?>
									<?php echo njsl_get_posticon( get_post_type() ); ?>
							<?php endif; ?>
							<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
						</h1>
						<p>
							Posted 
							<?php the_time( get_option( 'date_format' ) ); ?> 
							by 
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php the_author() ?></a>
						</p>
					<?php endif; // is_single() ?>
				</header><!-- .entry-header -->
		
				<?php if ( is_search() || is_archive() ) : // Only display Excerpts for search results and category listings ?>
				<div class="entry-summary">
					<?php the_excerpt(); ?>
					<a class="btn btn-default" href="<?php the_permalink(); ?>">Read More <span class="meta-nav">&rarr;</span></a>
				</div><!-- .entry-summary -->
				<?php else : ?>
				<div class="entry-content">
					
					<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
					
					<?php if( is_singular() ) : ?>
						<?php njsl_list_attachments(); ?>
					<?php endif; ?>
					
					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
					
				</div><!-- .entry-content -->
				<?php endif; ?>

				<?php
					echo wp_list_categories(
						array(
							'title_li'   => 'State Library Blogs',
							'show_count' => true,
							'style'      => 'none',
							'exclude'    => '1',
						)
					);
				?>

				<h2>All Blog Posts</h2>
				<?php 
				
				// Pick out blog posts
				
				// Add pagination if present
				$posts_args = 'posts_per_page=20';
				if( preg_match( '/page\/(\d+)/', $_SERVER['REQUEST_URI'], $matches ) ) {
					$posts_args .= '&paged=' . (int)$matches[1];
				}
				
				$blog_posts = new WP_Query( $posts_args );
				
				$page_query = $GLOBALS['wp_query'];
				$GLOBALS['wp_query'] = $blog_posts;
				
				/* Start the Loop */
				while ( $blog_posts->have_posts() ) {
					$blog_posts->the_post();

					?>
					<header>
						<div class="clearfix"></div>
						<h1 class="entry-title">
							<?php njsl_post_thumbnail(); ?>
							<a href="<?php the_permalink(); ?>" rel="bookmark">
								<?php the_title(); ?>
							</a>
						</h1>
						<p>
							Posted 
							<?php the_time(get_option('date_format')); ?> 
							by 
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php the_author() ?></a>
							<?php
							
							$categories = get_the_category();
							
							// print_r( $categories);
							
							if( ! empty( $categories ) && 'uncategorized' != $categories[0]->name ) :
							?>
							in <a href="<?php echo get_category_link( $categories[0]->cat_ID ) ?>"><?php echo apply_filters( 'njsl_category_friendly_name', ucwords( $categories[0]->name ) ); ?></a>
							<?php endif; ?>
						</p>
					</header><!-- .entry-header -->
	
					<div class="entry-summary">
						<?php the_excerpt(); ?>
						<a class="btn btn-default" href="<?php the_permalink(); ?>">Read More <span class="meta-nav">&rarr;</span></a>
						<?php do_action('crafty-social-share-buttons'); ?>					
					</div>
					
				<?php } //endwhile; 
				?> 
		
				<?php if( function_exists( 'twentyfourteen_paging_nav' ) ) twentyfourteen_paging_nav(); ?> 
				
				<?php
				$GLOBALS['wp_query'] = $page_query;
				?>
				
				<?php wp_reset_query() ?>
				
			</div><!-- #content -->
		</div><!-- #primary -->
	</div><!-- .col-md-12 -->
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>