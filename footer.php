<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rula_imprinting_canada
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'rula_imprinting_canada' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'rula_imprinting_canada' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'rula_imprinting_canada' ), 'rula_imprinting_canada', '<a href="http://underscores.me/">Underscores.me</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<style type="text/css">
	.fixed-footer-wrapper {
		background-color: #fff;
		color: #000;
		position: fixed;
		bottom: 0;
		width: 100%;
	}
	.fixed-footer-wrapper .col {
		display: flex;
		flex-direction: row;
		justify-content: space-between;
		flex-wrap: wrap;
		padding-top: 5px;
		padding-bottom: 5px;
	}

	.fixed-footer-wrapper img {
		display: flex;
		margin-top: 5px;
		margin-bottom: 5px;
	}
</style>

<div class="fixed-footer-wrapper">
	<div class="container">
		<div class="row">
			<div class="col">
				<img style="height: 32px;" src="/wp-content/themes/rula_imprinting_canada/images/logo-ryerson.png">
				<img style="height: 25px;" src="/wp-content/themes/rula_imprinting_canada/images/logo-sshrcc.png">
				<img style=" height: 30px" src="/wp-content/themes/rula_imprinting_canada/images/logo-ccbync.png">
			</div>
		</div>	
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>
