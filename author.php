<?php
/**
 * Template for author pages
 */

 // TODO: list all posts, pages, news items, etc. separately
 
 get_header(); 
?>
	<div class="col-md-12">
		<div id="primary" class="site-content">
			<div id="content" role="main">
			
				<?php if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail(); ?>
				
				<?php
				$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
				?>
				
				<header class="page-header">
					<span class="author-avatar pull-right img-thumbnail">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ) ) ?>
					</span>
					<h1 class="page-title">
						<?php printf(__( 'About %s', 'njsl-2014' ), '<span class="vcard">' . $curauth->display_name . '</span>'); ?> 
					</h1>
					
					<?php if( ! empty( $curauth->description ) ) : ?>
					<div class="author-description">
						<p><?php the_author_meta( 'description' ); ?></p>
					</div>
					<?php else: ?>
					<div class="author-description">
						<p><?php _e( 'This user has not entered a bio.', 'njsl-2014' ) ?></p>
					</div>
					<?php endif; ?>
					
					<!-- Social Media links -->
					<?php /** These contact methods are added to the profile by WordPress SEO */ ?>
					
					<ul class="list-inline social-media-list">
					
						<?php if( ! empty( $curauth->twitter ) ) : ?>
						<li><a href="https://twitter.com/<?php echo esc_attr( $curauth->twitter ) ?>" title="<?php echo esc_attr( __('Follow me on Twitter', 'njsl-2014' ) ); ?>">
							<i class="fa fa-fw fa-2x fa-twitter text-twitter"></i>
							<span class="sr-only"><?php _e('Follow me on Twitter', 'njsl-2014' ); ?></span>
						</a></li>
						<?php endif; ?>
						
						<?php if( ! empty( $curauth->facebook ) ) : ?>
						<li><a href="<?php echo esc_url( $curauth->facebook ) ?>" title="Facebook">
							<i class="fa fa-fw fa-2x fa-facebook-square text-facebook"></i>
							<span class="sr-only">Facebook</span>
						</a></li>
						<?php endif; ?>
					
						<?php if( ! empty( $curauth->googleplus ) ) : ?>
						<li><a href="<?php echo esc_url( $curauth->googleplus ) ?>" title="Google&#43;">
							<i class="fa fa-fw fa-2x fa-google-plus text-gplus"></i>
							<span class="sr-only"><?php _e( 'Google Plus', 'njsl-2014' ) ?></span>
						</a></li>
						<?php endif; ?>
						
					</ul>
					
					<!-- End Social Media links -->
					
				</header><!-- .page-header -->
						
			<?php if ( have_posts() ) : ?>
				<h2><?php printf( __( 'All content by %s', 'njsl-2014' ), $curauth->display_name ); ?></h2>
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
						get_template_part( 'content', get_post_format() );

					if( in_array( get_post_type(), array( 'post', 'news' ) ) )
						do_action( 'crafty-social-share-buttons' );
					
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