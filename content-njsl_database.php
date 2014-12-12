<?php
/**
 * 
 * Display an electronic resource / database entry
 * 
 */

// On the old Drupal site, resources that allow remote access linked directly to the resource,
//   while those without link to a record detail page

$remote_access = get_post_meta( get_the_ID(), 'database_remote_access', true );

$title_link = get_permalink( get_the_ID() );
$title_link = get_post_meta( get_the_ID(), 'database_url', true );


?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php the_post_thumbnail(); ?>
			<h1 class="entry-title">
				<?php
					if( is_search() ) {
						echo njsl_get_posticon( get_post_type() );
					}
				?>
				<?php if( false !== stripos( get_the_title(), 'Bloomberg' ) ) : ?>
					<?php the_title(); ?>
				<?php else: ?>
					<a href="<?php echo esc_url( $title_link ) ?>" rel="bookmark"><?php the_title(); ?></a>
				<?php endif; ?>
			</h1>
			<p><strong><?php printf( __( 'Remote access: %s','njsl-2014' ), ucwords( $remote_access ) ) ?></strong></p>
		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( sprintf( __( 'Continue reading %s', 'njsl-2014' ), '<i class="fa fa-fw fa-long-arrow-right"></i>' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'njsl-2014' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<footer class="entry-meta">
			<?php edit_post_link( sprintf( __('Edit This %s', 'njsl-2014' ), njsl_get_friendly_post_type() ), '<span class="edit-link">', '</span>' ); ?>
			<?php njsl_display_author_info(); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
