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

</div><!-- #page -->

</div><!-- .col -->
</div><!-- .row -->
</div><!-- .container -->

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
