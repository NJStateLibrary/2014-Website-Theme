<?php

/**
 * Default menu functions
 * These functions are used to build a top navigation menu. They are
 *   only called if a custom menu is not assigned to the Main Site Navigation menu
 */

/**
 * Define pages to hide from the menu
 * Each page should be listed by its root-relative path
 */
function njsl_hidden_pages() {
	return array(
		'access_denied',
		'blog',
        'media',
		'research_library/collections/did_not_find',
		'research_library/services_for/state_government/refusa_registration_form',
        'research_library/request_books_and_articles/request-a-book-or-article',
        'research_library/electronic_resources/ebooks-and-audiobooks'
	);
}

/**
 * Build a menu -- called by wp_nav_menu in header.php if a custom menu is not defined
 */
function njsl_page_menu( $args = array() ) {
	
	$defaults = array(
		'sort_column' => 'menu_order, post_title', 
		'echo' => true, 
		'link_before' => '',
		'link_after' => '',
		'container'  => false,
		'menu_class' => 'nav sf-menu nav-justified',
	);
	
	$args = wp_parse_args( $args, $defaults );
	$args = apply_filters( 'wp_page_menu_args', $args );
	
	$menu = '';

	$list_args = $args;

	// Show Home in the menu
	if ( ! empty($args['show_home']) ) {
		if ( true === $args['show_home'] || '1' === $args['show_home'] || 1 === $args['show_home'] )
			$text = __( 'Home', 'njsl-2014' );
		else
			$text = $args['show_home'];
		$class = '';
		if ( is_front_page() && !is_paged() )
			$class = 'class="current_page_item"';
		$menu .= '<li ' . $class . '><a href="' . esc_url( home_url( '/' ) ) . '">' . $args['link_before'] . $text . $args['link_after'] . '</a></li>';
		// If the front page is a page, add it to the exclude list
		if (get_option('show_on_front') == 'page') {
			if ( !empty( $list_args['exclude'] ) ) {
				$list_args['exclude'] .= ',';
			} else {
				$list_args['exclude'] = '';
			}
			$list_args['exclude'] .= get_option('page_on_front');
		}
	}

	$list_args['echo'] = false;
	$list_args['title_li'] = '';
	$menu .= str_replace( array( "\r", "\n", "\t" ), '', wp_list_pages($list_args) );

	if ( $menu )
		$menu = '<ul class="' . esc_attr($args['menu_class']) . '">' . $menu . '</ul>';

//	$menu = '<div class="' . esc_attr($args['menu_class']) . '">' . $menu . "</div>\n";
	$menu = apply_filters( 'wp_page_menu', $menu, $args );
	if ( $args['echo'] )
		echo $menu;
	else
		return $menu;
}

/**
 * Get a list of pages hidden from fallback menu
 * Converts the paths into page IDs, and caches the result
 */
function njsl_get_hidden_pages( $format = 'list' ) {
	
	$pages = wp_cache_get( 'njsl-hidden-pages' );
	
	if( false !== $pages ) {
		
		if( 'list' == $format )
			return $pages;
		return explode( ',', $pages );
		
	} else {
		
		$hidden_pagenames = njsl_hidden_pages();
		
		$hidden_pages = array();
		
		foreach( $hidden_pagenames as $page ) {
			
			$page = get_page_by_path( $page );
			
			if( $page ) {
				$hidden_pages[] = $page->ID;
			}
			
		}
		
		wp_cache_set(
			'njsl-hidden-pages',
			join( ',', $hidden_pages )
		);
		
		if( 'list' == $format )
			return join( ',', $hidden_pages );
		return $hidden_pages;
	}
	
}

/**
 * Hide certain pages from search results -- currently disabled
 */
//add_filter( 'pre_get_posts', 'njsl_hide_search_results' );
function njsl_hide_search_results( $query ) {
	
//	$pages = njsl_get_hidden_pages( 'array' );
	
	$query->set( 'post_type', 'any' );
	
//	$query->set( 'post__not_in', $pages );
	
	return $query;
}
