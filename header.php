<?php
/**
 * The Header for NJSL 2014 theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title( '|', true, 'right' ); /* bloginfo('name'); */ ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>

	<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
	<!--[if lt IE 8]>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/IE7-compat.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/bootstrap-IE7.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/font-awesome-ie7.css">
	<![endif]-->
	
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.min.js" type="text/javascript"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js" type="text/javascript"></script>
	<![endif]-->
	
</head>
<body <?php body_class(); ?>>

<div class="container" style="position: relative">
	
	<!-- Collapse menu box for small screens -->
	<div class="navbar-header">
      <button type="button" class="navbar-toggle btn btn-default pull-left" data-toggle="collapse" data-target="#main-menu-collapse">
        <span class="sr-only">Toggle navigation</span>
        <i class="fa fa-bars"></i>
      </button>
    </div>
    
	<!-- Site search box -->
	<form id="search-form" role="search" class="navbar-form navbar-right hidden-xs hidden-print" method="GET" action="<?php echo esc_url( home_url('/') ) ?>" style="position: absolute; right: 0" role="search">
		<div class="form-group">
			<input type="search" class="form-control" name="s" placeholder="<?php _e( 'Search this site', 'njsl-2014' ) ?>">
		</div>
		<button type="submit" class="btn btn-default">
			<i class="fa fa-fw fa-search" title="<?php _e( 'Search', 'njsl-2014' ) ?>"></i>
			<span class="sr-only"><?php _e( 'Search', 'njsl-2014' ) ?></span>
		</button>
		<?php
			// Display social icons from Crafty Social Buttons if available
			if( class_exists( 'SH_Crafty_Social_Buttons_Shortcode' ) ) {
				echo '<div class="clearfix"></div>';
				do_action( 'crafty-social-link-buttons' );
			}
		?>
	</form>
	<div class="navbar-inner">
		<h1 class="sr-only"><?php echo get_bloginfo( 'name' ) ?></h1>
		<a 
			class="header-logo" 
			href="<?php  echo esc_url( home_url( '/' ) ) ?>" 
			title="<?php echo esc_attr( sprintf( __( '%s Home', 'njsl-2014' ), get_bloginfo( 'name' ) ) ) ?>"
		>
			<img 
				class="<?php echo esc_attr( apply_filters( 'njsl_header_image_class', 'hidden-xs' ) ) ?>"
				src="<?php header_image(); ?>" 
				height="<?php echo get_custom_header()->height; ?>" 
				width="<?php  echo get_custom_header()->width; ?>" 
				style="height: <?php echo get_custom_header()->height; ?>px; width: <?php echo get_custom_header()->width; ?>px;"
				alt="<?php echo esc_attr( sprintf( __( '%s Logo', 'njsl-2014' ), get_bloginfo( 'name' ) ) ) ?>"
			>
			<?php do_action( 'njsl_header_image_after' ); ?>
		</a>
	</div>
	
	<main>
		<header class="hidden-print">
			<nav>
				<h1 class="sr-only">Navigation menu</h1>
				<div class="collapse navbar-collapse" id="main-menu-collapse">
				<?php wp_nav_menu(
					array(
						'menu' => 'main_menu',
						'container'  => false,
						'theme_location' => 'main_menu',
						'menu_class' => 'nav nav-justified sf-menu',
						'depth' => 3,
						'exclude' => njsl_get_hidden_pages(), // Exclude the "access denied" and "Horizon" pages
						'fallback_cb' => 'njsl_page_menu'
					)
				) ?>
				</div>
			</nav>
		</header>
		<?php if( is_home() ) : ?>
			<div class="home-page">
		<?php endif; ?>
		<div class="row">
		<!-- Page goes here -->