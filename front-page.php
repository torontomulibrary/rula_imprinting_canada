<?php
/**
 * The template for displaying the front page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rula_imprinting_canada
 */

get_header();
?>
  <style type="text/css">
    #book-splash {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      transition: box-shadow 0.1s ease-in-out;
    }

    #book-splash:hover {
      box-shadow: 0px 0px 5px #fff;
    }
  </style>

  <div id="primary" class="content-area">
    <main id="main" class="site-main">
      <a href="/preface"><img id="book-splash" src="/wp-content/themes/rula_imprinting_canada/images/homepage-book.png"></a>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
