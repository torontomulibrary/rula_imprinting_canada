<?php

/**
 * Our shortcode for the metadata modal
 */
add_shortcode('ic_media_modal', 'rula_ic_metadata_modal_shortcode');
function rula_ic_metadata_modal_shortcode($atts = array(), $content = null, $tag) {
  $attachment_id = $atts['media-id'];
  $float = $atts['float'];

  $html = "";
  $html .= rula_ic_metadata_modal_button($attachment_id, $float);
  $html .= rula_ic_metadata_modal_content($attachment_id);

  return $html;
}

/**
 * Renders the HTML for the button that triggers the modal
 */
function rula_ic_metadata_modal_button($attachment_id, $float) {
  $classes = array('btn', 'btn-primary', 'ic_media_modal');
  if ( $float == 'right' ) {
    $classes[] = 'float-right';
  } elseif ( $float == 'left' ) {
    $classes[] = 'float-left';
  }

  $html = '<button type="button" class="' . implode(" ", $classes) . '" data-toggle="modal" data-target="#ic_media_' . $attachment_id . '">';
  $html .= rula_ic_metadata_modal_button_image($attachment_id);
  $html .= rula_ic_metadata_modal_button_caption($attachment_id);
  $html .= '</button>';

  return $html;
}

function rula_ic_metadata_modal_button_image($attachment_id) {
  return '<img src="' . wp_get_attachment_url($attachment_id) . '">';
}

function rula_ic_metadata_modal_button_caption($attachment_id) {
  return '<div class="caption">' . get_the_title($attachment_id) . '</div>';
}

function rula_ic_metadata_modal_content($attachment_id) {
  $html = "";
  $html .= '<div class="modal fade ic_media_modal" id="ic_media_' . $attachment_id . '" tabindex="-1" role="dialog" aria-labelledby="ic_media_' . $attachment_id . '_label" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content">';
  $html .= rula_ic_metadata_modal_content_header($attachment_id);
  $html .= rula_ic_metadata_modal_content_body($attachment_id);
  $html .= rula_ic_metadata_modal_content_footer($attachment_id);
  $html .= "</div></div></div>";

  return $html;
}

function rula_ic_metadata_modal_content_header($attachment_id) {
  $title = get_the_title($attachment_id);

  return '<div class="modal-header"><h5 class="modal-title" id="ic_media_' . $attachment_id . '_label">' . $title . '</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
}

function rula_ic_metadata_modal_content_body($attachment_id) {
  $attachment_url = wp_get_attachment_url($attachment_id);

  $html = "";
  $html .= '<div class="modal-body">';
  $html .= '<div class="ic_modal_image"><img src="' . $attachment_url . '"></div>';

  if ( have_rows('metadata', $attachment_id) ) :
    while ( have_rows('metadata', $attachment_id) ) : the_row();
      $html .= '<div class="ic_modal_metadata">';

      if ( get_row_layout() == 'book' ) :
        $html .= rula_ic_metadata_layout_book($attachment_id);
      elseif ( get_row_layout() == 'book_cover' ) :
        $html .= rula_ic_metadata_layout_book_cover($attachment_id);
      elseif ( get_row_layout() == 'book_jacket' ) :
        $html .= rula_ic_metadata_layout_book_jacket($attachment_id);
      elseif ( get_row_layout() == 'title_page' ) :
        $html .= rula_ic_metadata_layout_title_page($attachment_id);
      elseif ( get_row_layout() == 'text_page' ) :
        $html .= rula_ic_metadata_layout_text_page($attachment_id);
      elseif ( get_row_layout() == 'illustration' ) :
        $html .= rula_ic_metadata_layout_illustration($attachment_id);
      elseif ( get_row_layout() == 'other' ) :
        $html .= rula_ic_metadata_layout_other($attachment_id);
      endif;

      $html .= '</div>';
    endwhile;
  else :
    $html .= "<div>No layouts found!</div>";
  endif;

  $html .= '</div>';

  return $html;
}

function rula_ic_metadata_modal_content_footer($attachment_id) {
  return '';
}


/**
 * Renders the HTML for the flexible content (metadata) options
 */
function rula_ic_metadata_layout_book($attachment_id) {

  return 'This is a book';
}

function rula_ic_metadata_layout_book_cover($attachment_id) {
  $html = '';

  if ( get_sub_field('creator') ) :
    $html .= '<h6>Creator</h6>';
    $html .= '<p>' . get_sub_field('creator') . '</p>';
  endif;

  return $html;
}

function rula_ic_metadata_layout_book_jacket($attachment_id) {
  return 'This is a book jacket';
}

function rula_ic_metadata_layout_title_page($attachment_id) {
  return 'This is a title page';
}

function rula_ic_metadata_layout_illustration($attachment_id) {
  return 'This is an illustration';
}

function rula_ic_metadata_layout_other($attachment_id) {
  return 'This is something else';
}
