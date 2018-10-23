<?php
/**
 * Template Name: Chapters Index Template
 *
 * Description: Custom template that displays a table of contents type structure of all chapters
 */

get_header();
?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main">

      <?php while ( have_posts() ): the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

          <header class="entry-header">
            <div class="entry-header-wrapper">
              <!-- <div class="entry-header-topper"><?php the_title() ?></div> -->
              <h1 class="entry-title">Contents</h1>
              <!-- <div class="entry-author"><?php the_field('chapter_author') ?></div> -->
            </div>
          </header><!-- .entry-header -->

          <?php $query = new WP_Query(array(
            'post_type' => 'page',
            'posts_per_page' => '5',
            'order' => 'asc',
            'orderby' => 'title',
            'meta_key' => '_wp_page_template',
            'meta_value' => 'chapter.php'
          )); ?>
          <?php if ( $query->have_posts() ) : ?>
            <div class="entry-content">
              <div class="table-of-contents">
                <table>
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                  <tr>
                    <td class="chapter-number"><?php the_title(); ?></td>
                    <td>&mdash;</td>
                    <td class="chapter-title"><a href="<?php the_permalink() ?>"><?php the_field('chapter_title'); ?></a></td>
                  </tr>
                <?php endwhile; ?>
                </table>
              </div>
            </div>
          <?php endif; ?>
          <?php wp_reset_query(); ?>
            
          <?php
          //the_content();
          ?>
          <!--
          <div class="page-links">
            <a href="<?php the_permalink(); ?>"><em><?php the_field('chapter_title') ?></em></a> | <a href="essays">Essays</a> &bull; <a href="case-studies">Case Studies</a>
          </div>
          -->


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
        </article>
      <?php endwhile; ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
