<?php
/**
 * Template Name: Chapter Template
 *
 * Description: Custom template that displays chapter content.
 */

get_header();
?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main">

    <?php
    while ( have_posts() ) :
      the_post();

      get_template_part( 'template-parts/content', 'chapter' );

      // If comments are open or we have at least one comment, load up the comment template.
      if ( comments_open() || get_comments_number() ) :
        comments_template();
      endif;

    endwhile; // End of the loop.
    ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<img class="watermark-beaver" src="/wp-content/themes/rula_imprinting_canada/images/beaver.svg">

<div style="text-align:right;"><a href="#content">Back to top</a></div>

<?php
get_sidebar();
get_footer();
