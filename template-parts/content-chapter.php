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

  <div class="page-links">
    <a href="<?php the_permalink(); ?>"><em><?php the_field('chapter_title') ?></em></a> | <a href="essays">Essays</a> &bull; <a href="case-studies">Case Studies</a>
  </div>

  <header class="entry-header">
    <div class="entry-header-wrapper">
      <div class="entry-header-topper"><?php the_title() ?></div>
      <h1 class="entry-title"><?php the_field('chapter_title') ?></h1>
      <div class="entry-author"><?php the_field('chapter_author') ?></div>
    </div>
  </header><!-- .entry-header -->

  <?php rula_imprinting_canada_post_thumbnail(); ?>

  <div class="entry-content">

    <?php
    the_content();
    ?>

    <div class="page-links">
      <a href="<?php the_permalink(); ?>"><em><?php the_field('chapter_title') ?></em></a> | <a href="essays">Essays</a> &bull; <a href="case-studies">Case Studies</a>
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
