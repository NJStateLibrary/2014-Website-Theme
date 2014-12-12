<?php
/**
 * Template for campaign posts
 *
 * Used for both single and index/archive/search.
 *
 */

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php if ( is_singular() ) : ?>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
				<div class="clearfix"></div>
				<h1 class="entry-title">
					<?php
						if( is_search() ) {
							echo njsl_get_posticon( get_post_type() );
						}
					?>
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
			<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'thumbnail pull-left' ) ); ?>
			<?php the_excerpt(); ?>
			<ul class="list-inline">
				<li>
					<a class="btn btn-default" href="<?php the_permalink(); ?>"><?php printf( __( 'Read More %s','njsl-2014' ), '<i class="fa fa-fw fa-long-arrow-right"></i>' ) ?></a>
				</li>
				<?php do_action( 'njsl_campaign_excerpt_action_line' ); ?>
			</ul>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			
			<?php the_content( sprintf( __( 'Continue reading %s', 'njsl-2014' ), '<i class="fa fa-fw fa-long-arrow-right"></i>' ) ); ?>
			
			<?php if( is_singular() ) : ?>
				<?php njsl_list_attachments(); ?>
			<?php endif; ?>
			<?php do_action('crafty-social-share-buttons'); ?>
			
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'njsl-2014' ), 'after' => '</div>' ) ); ?>
			
		</div><!-- .entry-content -->
		<?php endif; ?>

		<div class="clearfix"></div>
		<footer class="entry-meta">
			<?php edit_post_link( __( sprintf( 'Edit This %s', njsl_get_friendly_post_type() ) ), '<span class="edit-link">', '</span>' ); ?>
			<?php njsl_display_author_info(); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
