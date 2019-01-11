<?php
// Shortcode for formatting footnotes
add_shortcode('footnotes', 'rula_ic_footnotes_shortcode');
function rula_ic_footnotes_shortcode($atts, $content) {
  $atts = shortcode_atts(array(
  ), $atts);
  return '<div class="footnotes">' . do_shortcode($content) . '</div>';
}