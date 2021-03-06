<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MusicUnites
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'mu' ); ?></a>

	<div class="header-area full">
		<div class="main-page">
			<header id="masthead" class="site-header inner" role="banner">
				<div id="header-image">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
		<!--			<img src="<?php echo get_template_directory_uri(); ?>/images/1.png" alt="Logo" width="86" height="83" />-->
					</a>
				</div>
				<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
					<p class="site-description" color="background-color:#fff"><a  style="color:#fff"  href="http://139.59.225.214/join-our-orchestra/">Sign up on our website to join the Orchestra</a></p>

				<nav id="site-navigation" class="main-navigation" role="navigation">
					<div class="menu-toggle"><i class="fa fa-bars"></i></div>
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'mu' ); ?></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				</nav>

			</header>
		</div>
	</div>

	<div class="main-content-area full">
		<div class="main-page">
			<div id="content" class="site-content inner">
