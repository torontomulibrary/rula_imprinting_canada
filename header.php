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
	<img class="body-bg" src="/wp-content/themes/rula_imprinting_canada/images/background-table.png">

<div class="container">
	<div class="row">
		<div class="col">
			
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'rula_imprinting_canada' ); ?></a>

	<nav id="site-navigation" class="main-navigation">
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'rula_imprinting_canada' ); ?></button>
		<div class="navigation-container">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary-navigation',
				'container' => false
			) );
			?>

			<?php $chapters_query = new WP_Query(array('post_type' => 'page', 'posts_per_page' => -1, 'order' => 'ASC', 'order_by' => 'title', 'depth' => 1, 'meta_key' => '_wp_page_template', 'meta_value' => 'chapter.php' )); ?>
			<?php if ( $chapters_query->have_posts() ) : ?>
			<div class="content-navigation">
				<div class="h1">Contents</div>
				<ul>
						<?php while ( $chapters_query->have_posts() ) : $chapters_query->the_post(); ?>
							<li>
								<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
								<ul>
									<li><a href="<?php the_permalink() ?>essays">Essays</a></li>
									<li><a href="<?php the_permalink() ?>case-studies">Case Studies</a></li>
								</ul>
							</li>
				    <?php endwhile; ?>
		    </ul>
			</div>
		  <?php endif ?>
		  <?php wp_reset_postdata(); ?>

			<?php
			wp_nav_menu( array(
				'theme_location' => 'secondary-navigation',
				'container' => false
			) );
			?>
			<button class="menu-toggle close-menu" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Close', 'rula_imprinting_canada' ); ?></button>
		</div>
	</nav><!-- #site-navigation -->

	<div id="content" class="site-content">
