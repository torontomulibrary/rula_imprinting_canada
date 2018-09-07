<?php
/**
 * Template part for displaying chapter contents.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rula_imprinting_canada
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <div class="chapter-title-wrap">
      <div class="chapter-number"><?php the_title() ?></div>
      <h1 class="entry-title"><?php the_field('chapter_title') ?></h1>
      <div class="chapter-author"><?php the_field('chapter_author') ?></div>
    </div>
  </header><!-- .entry-header -->

  <?php rula_imprinting_canada_post_thumbnail(); ?>

  <div class="entry-content">
    <?php
    the_content();

    //wp_link_pages( array(
    //  'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rula_imprinting_canada' ),
    //  'after'  => '</div>',
    //) );
    ?>
    <div class="page-links">
      <span class="entry-title"><?php the_field('chapter_title') ?></span> | <a href="#">Essays</a> &bull; <a href="#">Case Studies</a>
    </div>
  </div><!-- .entry-content -->

  <?php if ( get_edit_post_link() ) : ?>
    <footer class="entry-footer">
      <?php
      edit_post_link(
        sprintf(
          wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
            __( 'Edit <span class="screen-reader-text">%s</span>', 'rula_imprinting_canada' ),
            array(
              'span' => array(
                'class' => array(),
              ),
            )
          ),
          get_the_title()
        ),
        '<span class="edit-link">',
        '</span>'
      );
      ?>
    </footer><!-- .entry-footer -->
  <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
