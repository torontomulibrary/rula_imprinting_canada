<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rula_imprinting_canada
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="container">
	<div class="row">
		<div class="col">
			
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'rula_imprinting_canada' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$rula_imprinting_canada_description = get_bloginfo( 'description', 'display' );
			if ( $rula_imprinting_canada_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $rula_imprinting_canada_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->


	</header><!-- #masthead -->

	<nav id="site-navigation" class="main-navigation">
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'rula_imprinting_canada' ); ?></button>
		<div class="navigation-container">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary-navigation',
				'container' => false
			) );
			?>
			<div class="content-navigation">
				<div class="h1">Contents</div>
				<ul>
					<li>Chapter 1</li>
		      <li>Chapter 2</li>
		      <li>Chapter 3</li>
		    </ul>
			</div>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'secondary-navigation',
				'container' => false
			) );
			?>
		</div>
	</nav><!-- #site-navigation -->

	<div id="content" class="site-content">
