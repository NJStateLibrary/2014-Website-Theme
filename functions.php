<?php

/**
 * Include integration files for certain plugins
 */
include 'include/plugin.basic-facets.php';
include 'include/plugin.breadcrumb-trail.php';
include 'include/plugin.crafty-social-buttons.php';
include 'include/plugin.njsl-databases.php';
include 'include/plugin.the-events-calendar.php';

/**
 * Include fallback menu functions
 */
include 'include/menu.php';

/**
 * Include responsive header image
 */
include 'include/custom-header.php';

/**
 * Declare thumbnail support
 */
add_theme_support( 'post-thumbnails' );

/**
 * Add feed links to everything
 */
add_theme_support( 'automatic-feed-links' );

/**
 * Add basic HTML5 support -- search form only, for better compat with old browsers
 */
$args = array(
	'search-form'
);
add_theme_support( 'html5', $args );

/**
 * Allow admins to set a custom background image/color
 */
add_theme_support( 'custom-background', apply_filters( 'njsl_custom_background', array(
	'default-color' => 'eaf5e9',
) ) );

/**
 * Allow admins to set a custom header image
 */
add_theme_support( 'custom-header', apply_filters( 'njsl_custom_header', array(
	'default-image'    => get_template_directory_uri() . '/images/logos/NJSL-Header-70x490.png',
	'height'           => '70',
	'width'            => '490',
	'uploads'          => true
) ) );

/**
 * Create the main menu
 */

add_theme_support( 'menus' );
register_nav_menu( 'main_menu', 'Main Site Navigation' );

/**
 * Enqueue needed scripts and stylesheets
 */
add_action( 'wp_print_scripts', 'njsl_include_scripts' );
add_action( 'wp_print_styles',  'njsl_include_styles' );

/**
 * Kill the admin bar on the frontend for loggedin users
 */
add_filter('show_admin_bar', '__return_false');

/**
 * Remove spammy menu items from the admin menu bar
 */
add_action( 'admin_bar_init', 'njsl_cleanup_admin_bar', 99 );
function njsl_cleanup_admin_bar() {
	
	remove_action( 'admin_bar_menu', 'wpseo_admin_bar_menu', 95 );
	remove_action( 'admin_bar_menu', 'wp_edit_admin_bar_links', 500 );
	define( 'TRIBE_DISABLE_TOOLBAR_ITEMS', true );	
}

/**
 * Set default content width for compatibility
 */
if ( ! isset( $content_width ) ) $content_width = 900;

/**
 * Functions
 */
function njsl_include_scripts() {
	wp_enqueue_script( 'bootstrap',   get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'hoverintent', get_stylesheet_directory_uri() . '/js/hoverIntent.js', array( 'jquery' ) );
	wp_enqueue_script( 'superfish',   get_stylesheet_directory_uri() . '/js/superfish.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'supposition',   get_stylesheet_directory_uri() . '/js/supposition.js', array( 'jquery' ) );
	wp_enqueue_script( 'responsive-tabs',   get_stylesheet_directory_uri() . '/js/bootstrap-responsive-tabs.js', array( 'jquery' ) );
	wp_enqueue_script( 'column-repair',   get_stylesheet_directory_uri() . '/js/column-repair.js', array( 'jquery' ) );
	wp_enqueue_script( 'NJSL',   get_stylesheet_directory_uri() . '/js/NJSL.js', array( 'jquery', 'column-repair' ), false, true );
}

function njsl_include_styles() {
	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'fontawesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'superfish', get_stylesheet_directory_uri() . '/css/superfish.css' );
	wp_enqueue_style( 'NJSL-ninja-forms', get_stylesheet_directory_uri() . '/css/NJSL-ninja-forms.css' );
	wp_enqueue_style( 'NJSL', get_stylesheet_directory_uri() . '/css/NJSL.css', array(), false, 'all' );
}

/**
 * The NJSL home page consists of two columns. Create a widget area for
 *   each column so content can be moved around freely
 */
function njsl_widgets_init() {

	register_sidebar( array(
		'name' => __('Alert Panel', 'njsl-2014'),
		'description' => __( 'Area for closing notices or other important announcements', 'njsl-2014' ),
		'id' => 'alert_panel',
		'before_widget' => '<div class="col-md-12">',
		'after_widget' => '</div>'
	) );
	
	register_sidebar( array(
		'name' => __('Home Page - Main Column Lead', 'njsl-2014'),
		'id' => 'home_main_top',
		'before_widget' => '',
		'after_widget' => ''
	) );
	
	register_sidebar( array(
		'name' => __( 'Home Page - Main Column', 'njsl-2014' ),
		'id' => 'home_main',
		'before_widget' => '',
		'after_widget' => ''
	) );
	
	register_sidebar( array(
		'name' => __( 'Home Page - Sidebar Lead', 'njsl-2014' ),
		'id' => 'home_sidebar1_top',
		'before_widget' => '',
		'after_widget' => ''
	) );
	
	register_sidebar( array(
		'name' => __( 'Home Page - Sidebar', 'njsl-2014' ),
		'id' => 'home_sidebar1',
		'before_widget' => '',
		'after_widget' => ''
	) );

	register_sidebar( array(
		'name' => __( 'Footer', 'njsl-2014' ),
		'description' => __( 'Custom footer displayed on all pages', 'njsl-2014' ),
		'id' => 'footer',
		'before_widget' => '',
		'after_widget' => ''
	) );
	
	register_sidebar( array(
		'name' => __( 'Search - Facets', 'njsl-2014' ),
		'description' => __( 'Used for narrowing search results. Displayed on search results page only.', 'njsl-2014' ),
		'id' => 'search_facets',
		'before_widget' => '',
		'after_widget' => ''
	) );
	
}
add_action( 'widgets_init', 'njsl_widgets_init' );

/**
 * Add bootstrap button classes to links passed through this filter
 */
function njsl_bootstrapify_link( $link, $post_ID ) {
	
	return preg_replace(
		'/class="(.*?)"/',
		'class="btn btn-primary $1"',
		$link
	);
	
}
add_filter( 'edit_post_link', 'njsl_bootstrapify_link', 10, 2 );

add_filter( 'pre_get_posts', 'njsl_expand_author_page' );
function njsl_expand_author_page( $query ) {
	
	if( $query->is_author ) {
		$query->set( 'post_type', 'any' );
		remove_filter( 'pre_get_posts', 'njsl_expand_author_page' );
	}
	
	return $query;
}


/**************************************************
 * Prepare alternatives for post type names for display
 *   throughout the site
 */

/**
 * Return a friendly version of the post_type
 */
function njsl_get_friendly_post_type( $name = null ) {
	if( is_null( $name ) )
		$name = get_post_type();
	return ucwords( str_replace( '_', ' ', apply_filters( 'njsl_friendly_post_type_name', $name ) ) );
}

/**
 * Replace specific post type names with friendly equivalents
 */
add_filter( 'njsl_friendly_post_type_name', 'njsl_post_type_name' );
function njsl_post_type_name( $post_type ) {
	
	if( 'tribe_events' == $post_type )
		$post_type = 'event';
	
	if( 'njsl_database' == $post_type )
		$post_type = 'electronic_resource';
	
	if( 'news' == $post_type )
		$post_type = 'news_item';
	
	if( 'post' == $post_type )
		$post_type = 'blog_post';
	
	return $post_type;
}


/*************************************************
 * Prepare icons for post types and attachment MIME types for display
 *   throughout the site
 */

/**
 * Get an appropriate icon for an attachment based on the MIME type
 */
function njsl_get_mimeicon( $mime_type ) {
	
	// Video and flash video
	if(
		false !== strpos( $mime_type, 'video' ) ||
		false !== strpos( $mime_type, 'flash' )
	) {
		return '<i class="fa fa-fw fa-file-video-o" title="Video file"></i>';
	}
	
	// Images
	if( false !== strpos( $mime_type, 'image' ) ) {
		return '<i class="fa fa-fw fa-file-image-o" title="Image file"></i>';
	}
	
	// Audio
	if( false !== strpos( $mime_type, 'audio' ) ) {
		return '<i class="fa fa-fw fa-file-audio-o" title="Audio file"></i>';
	}
	
	// Executables
	if( false !== strpos( $mime_type, 'octet' ) ) {
		return '<i class="fa fa-fw fa-floppy-o" title="Executable file"></i>';
	}

	// Presentation files
	if(
		false !== strpos( $mime_type, 'powerpoint' ) ||
		false !== strpos( $mime_type, 'presentation' )
	) {
		return '<i class="fa fa-fw fa-file-powerpoint-o" title="Presentation document"></i>';
	}
	
	// Spreadsheet and tabular data
	if( false !== strpos( $mime_type, 'excel' ) ) {
		return '<i class="fa fa-fw fa-file-excel-o" title="Spreadsheet document"></i>';
	}
	
	// PDF files
	if( false !== strpos( $mime_type, 'pdf' ) ) {
		return '<i class="fa fa-fw fa-file-pdf-o" title="Adobe Acrobat document"></i>';
	}
	
	// Archive files
	if( false !== strpos( $mime_type, 'zip' ) ) {
		return '<i class="fa fa-fw fa-file-archive-o" title="Compressed file"></i>';
	}
	
	// Text documents
	if(
		false !== strpos( $mime_type, 'document' ) || 
		false !== strpos( $mime_type, 'text' ) ||
		false !== strpos( $mime_type, 'msword' )
	) {
		return '<i class="fa fa-fw fa-file-text-o" title="Text document"></i>';
	}
	
	return '<i class="fa fa-fw fa-file-o" title="General file"></i>';
	
}

/**
 * Get an appropriate icon for a post based on post type
 */
function njsl_get_posticon( $post_type ) {
	
	if( 'page' == $post_type )
		return '<i class="fa fa-fw fa-file-text-o" title="Page"></i> ';
	
	if( 'post' == $post_type )
		return '<i class="fa fa-fw fa-pencil" title="Blog post"></i> ';
	
	if( 'news' == $post_type )
		return '<i class="fa fa-fw fa-newspaper-o" title="News item"></i> ';
	
	if( 'tribe_events' == $post_type )
		return '<i class="fa fa-fw fa-calendar" title="Event"></i> ';
	
	if( 'njsl_database' == $post_type )
		return '<i class="fa fa-fw fa-archive" title="Electronic Resource"></i> ';
	
	if( 'press_release' == $post_type )
		return '<i class="fa fa-fw fa-rss" title="Press Release"></i> ';
	
	return '';
	
}


/****************************************************
 * Miscellaneous template tags
 */


/**
 * Display a table of all files attached to the current post
 */
function njsl_list_attachments() {
	
	// Attachments
	
	$attachments = get_posts(
		array(
			'post_type'  => 'attachment',
			'post_parent' => get_the_ID(),
			'posts_per_page' => -1,
			'orderby' => 'title',
			'order'   => 'ASC',
		)
	);
	
	if( ! empty( $attachments ) ) { 
		
		if( 1 == count( $attachments ) && $attachments[0]->ID == get_post_thumbnail_id( get_the_ID() ) ) {
			
			// Just a featured image -- return
			return;
		}
		
		$attach_count = 0;
		foreach( $attachments as $attach ) {
			
			$show_attachment = false;
			
			$source = maybe_unserialize(
				get_post_meta(
					$attach->ID,
					'_drupal_source',
					true
				)
			);

			if( is_array( $source ) )
				$source = $source[0];
			
			if( 'upload' == $source ) {

				$display = maybe_unserialize(
					get_post_meta(
						$attach->ID,
						'_drupal_list_upload',
						true
					)
				);
				
				if( $display )
					$show_attachment = true;
				
			} else if( in_array( $source, array( 'field_attached_video_fid' ) ) ) {
				
				$show_attachment = true;
				
			} else if( empty( $source ) ) {
				
				$show_attachment = true;
				
			}
			
			if( ! $show_attachment )
				continue;
			
			$attach_count++;
			
		}

		if( 0 == $attach_count )
			return;

		?>
		<div class="clearfix"></div>
		<hr>
		<h3><?php _e('Attached Files', 'njsl-2014' ) ?></h3>
		<table class="table responsive">
			<thead>
				<tr>
					<th scope="col"><?php _e( 'File', 'njsl-2014'); ?></th>
					<th scope="col"><?php _e( 'Size', 'njsl-2014'); ?></th>
				</tr>
			</thead>
			<tbody>
		<?php foreach( $attachments as $attach ) { ?>
			<?php if( $attach->ID == get_post_thumbnail_id( get_the_ID() ) ) continue; ?>
			<?php
					$show_attachment = false;
					
					$source = maybe_unserialize(
						get_post_meta(
							$attach->ID,
							'_drupal_source',
							true
						)
					);
		
					if( is_array( $source ) )
						$source = $source[0];
					
					if( 'upload' == $source ) {
		
						$display = maybe_unserialize(
							get_post_meta(
								$attach->ID,
								'_drupal_list_upload',
								true
							)
						);
						
						if( $display )
							$show_attachment = true;
						
					} else if( in_array( $source, array( 'field_attached_video_fid' ) ) ) {
						
						$show_attachment = true;
						
					} else if( empty( $source ) ) {
				
						$show_attachment = true;
				
					}
					
					if( ! $show_attachment )
						continue;
					
			?>
			<tr>
				<th scope="row">
					<?php echo njsl_get_mimeicon( $attach->post_mime_type ) . ' ' ?>
					<?php echo wp_get_attachment_link( $attach->ID, 'thumbnail', false, false, $attach->post_title ) ?>
				</th>
				<td>
					<?php
					$size = @filesize( get_attached_file( $attach->ID ) );
					
					if( $size )
						echo size_format( $size );
					else
						echo __( 'Size unknown', 'njsl-2014' ); 
					?>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
		<?php
	}

	
}

/**
 * Display the post thumbnail and link when one exists
 */
function njsl_post_thumbnail() {
	
	if( has_post_thumbnail() ) {
		?>
		<a class="thumbnail post-thumbnail" href="<?php echo esc_url( get_the_permalink() ) ?>" rel="bookmark">
			<?php the_post_thumbnail(); ?>
		</a>
		<?php
	}
	
}

/**
 * Display information about the author
 */
function njsl_display_author_info() {
	
	// Allow author info to be hidden
	if( apply_filters( 'njsl_hide_author_info', false ) )
		return;
	?>
	<?php if( is_single() && is_multi_author() ) : ?>
		<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries. ?>
			<div class="author-info">
				<div class="author-avatar">
					<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
				</div><!-- .author-avatar -->
				<div class="author-description">
					<h2><?php printf( __( 'About %s', 'njsl-2014' ), get_the_author() ); ?></h2>
					<p><?php the_author_meta( 'description' ); ?></p>
					<div class="author-link">
						<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
							<?php printf( __( 'View all content by %s %s', 'njsl-2014' ), get_the_author(), '<i class="fa fa-fw fa-long-arrow-right"></i>' ); ?>
						</a>
					</div><!-- .author-link	-->
				</div><!-- .author-description -->
			</div><!-- .author-info -->
		<?php elseif( get_the_author_meta( 'ID' ) ): ?>
			<hr>
			<div class="author-info">
				<div class="author-description">
					<div class="author-link">
						<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
							<?php printf( __( 'View all content by %s %s', 'njsl-2014' ), get_the_author(), '<i class="fa fa-fw fa-long-arrow-right"></i>' ); ?>
						</a>
					</div><!-- .author-link	-->
				</div><!-- .author-description -->
			</div><!-- .author-info -->
		<?php endif; // endif author has a description ?>
	<?php endif; // endif is_singular ?>
	<?php
}

if ( ! function_exists( 'twentyfourteen_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since Twenty Fourteen 1.0
 *
 * @global WP_Query   $wp_query   WordPress Query object.
 * @global WP_Rewrite $wp_rewrite WordPress Rewrite object.
 */
function twentyfourteen_paging_nav( $query = null ) {

	if( is_null( $query ) )
		$query = &$GLOBALS['wp_query'];

	// Don't print empty markup if there's only one page.
	if ( $query->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $query->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '&larr; Previous', 'twentyfourteen' ),
		'next_text' => __( 'Next &rarr;', 'twentyfourteen' ),
		'type'      => 'array',
	) );

	if ( $links ) :
		
		// Format links as bootstrap buttons
		
		foreach( $links as $key => $link ) :
			if( false !== strpos( $link, '<a' ) )
				$links[$key] = str_replace( 'page-numbers', 'btn btn-default', $link );
		endforeach;
		$links = join( "\n", $links );
		
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="sr-only"><?php _e( 'Posts navigation', 'twentyfourteen' ); ?></h1>
		<div class="pagination loop-pagination">
			<?php echo $links; ?>
		</div><!-- .pagination -->
	</nav><!-- .navigation -->
	<?php
	endif;
}
endif;

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function twentyfourteen_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentyfourteen' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'twentyfourteen_wp_title', 10, 2 );


?>