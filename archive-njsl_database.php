<?php
/**
 * Archive page for Electronic resource / database listing
 *
 */

get_header(); 

?>

	<div class="col-md-12">
		<div id="primary" class="site-content">
			<div id="content" role="main">
			<?php if ( have_posts() ) : ?>
	
				<?php if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail(); ?>
				
				<h1>Databases</h1>
				
				<p>
					Visitors to the library have access to a wide variety of electronic databases; however, remote access to subscription databases is restricted to State Library authorized users: state employees and, unless otherwise noted, Thomas Edison staff and students. Authorized users needing a State Library access card, should complete the <a href="<?php echo esc_url( home_url( 'research_library/get_a_library_card' ) ) ?>">appropriate online registration form</a>.
				</p>
				<p><em>Transmission or reproduction of items beyond that permitted by fair use requires the permission of the copyright owners.  It is the user's responsibility to determine and comply with all restrictions based upon the intended use of the materials.</em></p>
				<p><em>All users are expected to respect the intellectual property rights of licensed material. Failure to do so will result in loss of access.</em></p>

				<p>You can browse through our databases below, or use the following menus to narrow your search:

				<div class="form-group" id="njsl_database_filters">
					<label for="njsl_database_by_title" class="col-sm-2 control-label">By Title:</label>
					<div class="col-sm-10">
						<select name="by_title" id="njsl_database_by_title">
							<option value="" disabled="true" selected="true"></option>
							<?php for( $x = ord('a'); $x <= ord('z'); $x++ ) { ?>
							<option value="<?php echo chr($x) ?>"><?php echo strtoupper( chr($x) ) ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="clearfix"></div>
					<label for="njsl_database_by_subject" class="col-sm-2 control-label">By Subject:</label>
					<div class="col-sm-10">
						<?php
							$cats = get_terms('database_category');
						?>
						<select name="by_subject" id="njsl_database_by_subject">
							<option value="" disabled="true" selected="true">SUBJECT</option>
							<?php foreach( $cats as $cat ) : ?>
							<option value="<?php echo esc_attr( $cat->slug ) ?>"><?php echo $cat->name ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				
				<div class="clearfix"></div>
				<hr>
				
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php if( in_array( get_post_type(), array( 'post', 'page' ) ) ) : ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
					<?php else: ?>
						<?php get_template_part( 'content', get_post_type() ); ?>
					<?php endif; ?>
				<?php endwhile; ?>
	
				<?php twentyfourteen_paging_nav(); ?> 
				
			<?php else : ?>
	
				<article id="post-0" class="post no-results not-found">
	
				<?php if ( current_user_can( 'edit_posts' ) ) :
					// Show a different message to a logged-in user who can add posts.
				?>
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'No posts to display', 'twentytwelve' ); ?></h1>
					</header>
	
					<div class="entry-content">
						<p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'twentytwelve' ), admin_url( 'post-new.php' ) ); ?></p>
					</div><!-- .entry-content -->
	
				<?php else :
					// Show the default message to everyone else.
				?>
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentytwelve' ); ?></h1>
					</header>
	
					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'twentytwelve' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				<?php endif; // end current_user_can() check ?>
	
				</article><!-- #post-0 -->
	
			<?php endif; // end have_posts() check ?>
	
			</div><!-- #content -->
			<hr>
		</div><!-- #primary .container -->
	</div>

<?php // get_sidebar(); // No sidebar in current theme ?>
<?php get_footer(); ?>