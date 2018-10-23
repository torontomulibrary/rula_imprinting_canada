<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rula_imprinting_canada
 */

?>

<?php 
  $post_ancestors = get_post_ancestors($post->ID); 
  end($post_ancestors);
  $chapter_id = prev($post_ancestors);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <div class="page-links">
    <a href="<?php echo get_permalink($chapter_id); ?>"><em><?php the_field('chapter_title', $chapter_id) ?></em></a> | <a href="<?php the_permalink($chapter_id); ?>essays">Essays</a> &bull; <a href="<?php the_permalink($chapter_id); ?>case-studies">Case Studies</a>
  </div>

  <header class="entry-header">
    <div class="entry-header-wrapper">
      <div class="entry-header-topper"><?php echo get_the_title($chapter_id) ?>: Case Study</div>
      <h1 class="entry-title"><?php the_title() ?></h1>
      <div class="entry-author"><?php the_field('case_study_author') ?></div>
    </div>
  </header><!-- .entry-header -->

  <?php rula_imprinting_canada_post_thumbnail(); ?>

  <div class="entry-content">

    <?php
    the_content();
    ?>

    <div class="page-links">
      <a href="<?php echo get_permalink($chapter_id); ?>"><em><?php the_field('chapter_title', $chapter_id) ?></em></a> | <a href="<?php the_permalink($chapter_id); ?>essays">Essays</a> &bull; <a href="<?php the_permalink($chapter_id); ?>case-studies">Case Studies</a>
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
