<?php
/**
 * Forces WordPress to use the attachment title as the caption if there is no 
* caption set for the image.
 */
add_action( 'image_add_caption_text', 'rula_ic_image_add_caption_text', 10, 2);
function rula_ic_image_add_caption_text($caption, $id) {
  if ( empty($caption) ) {
    return get_the_title($id);
  }
  return $caption;
}

/** 
 * Hijacks the caption shortcode to display a modal.
 */
add_filter( 'img_caption_shortcode', 'rula_ic_img_caption_shortcode', 10, 3 );
function rula_ic_img_caption_shortcode( $empty, $attr, $content ) {
  $atts = shortcode_atts( array(
    'id'      => '',
    'align'   => 'alignnone',
    'width'   => '',
    'caption' => '',
    'class'   => '',
  ), $attr, 'caption' );
  // Strip out the "attachment_" part of the id and save it
  $attachment_id = (int) str_replace('attachment_', '', $atts['id']);
  $atts['width'] = (int) $atts['width'];
  if ( $atts['width'] < 1 || empty( $atts['caption'] ) )
    return $content;
  if ( ! empty( $atts['id'] ) )
    $atts['id'] = 'id="' . esc_attr( sanitize_html_class( $atts['id'] ) ) . '" ';
  $class = trim( 'wp-caption ' . $atts['align'] . ' ' . $atts['class'] );
  $html5 = current_theme_supports( 'html5', 'caption' );
        // HTML5 captions never added the extra 10px to the image width
  $width = $html5 ? $atts['width'] : ( 10 + $atts['width'] );
  /**
   * Filters the width of an image's caption.
   *
   * By default, the caption is 10 pixels greater than the width of the image,
   * to prevent post content from running up against a floated image.
   *
   * @since 3.7.0
   *
   * @see img_caption_shortcode()
   *
   * @param int    $width    Width of the caption in pixels. To remove this inline style,
   *                         return zero.
   * @param array  $atts     Attributes of the caption shortcode.
   * @param string $content  The image element, possibly wrapped in a hyperlink.
   */
  $caption_width = apply_filters( 'img_caption_shortcode_width', $width, $atts, $content );
  $style = '';
  if ( $caption_width ) {
    $style = 'style="width: ' . (int) $caption_width . 'px" ';
  }
  $bs_modal = '';
  if ( have_rows('metadata', $attachment_id) ) {
    $bs_modal = 'data-toggle="modal" data-target="#attachment_' . $attachment_id . '_metadata" ';
  }
  if ( $html5 ) {
    $html = '<figure ' . $atts['id'] . $style . $bs_modal . 'class="' . esc_attr( $class ) . '">'
    . do_shortcode( $content ) . '<figcaption class="wp-caption-text">' . rula_ic_get_attachment_caption($attachment_id) . '</figcaption></figure>';
  } else {
    $html = '<div ' . $atts['id'] . $style . $bs_modal . 'class="' . esc_attr( $class ) . '">'
    . do_shortcode( $content ) . '<p class="wp-caption-text">' . $atts['caption'] . '</p></div>';
  }
  if ( have_rows('metadata', $attachment_id) ) {
    global $rula_ic_modal_html;
    $rula_ic_modal_html .= rula_ic_metadata_modal_content($attachment_id);
  }
  return $html;
}

function rula_ic_get_attachment_caption($attachment_id) {
  $caption = wp_get_attachment_caption($attachment_id);

  if ( empty($caption) ) {
    return get_the_title($attachment_id);
  }
  
  return $caption;
}

function rula_ic_metadata_modal_content($attachment_id) {
  $html = "";
  $html .= '<div class="modal fade ic_media_modal" id="attachment_' . $attachment_id . '_metadata" tabindex="-1" role="dialog" aria-labelledby="ic_media_' . $attachment_id . '_label" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content">';
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
      // Get the field names for the row, minus acf_fc_layout
      $field_names = array_keys( get_row( true ) );
      array_shift($field_names);

      $html .= '<div class="ic_modal_metadata">';
      // Loop thru all the field names, and call the respective field function
      foreach ($field_names as $field_name) :
        if ( get_sub_field($field_name) ) {
          $html .= '<div class="ic_modal_metadata_field">';
          $html .= call_user_func('rula_ic_metadata_field_' . $field_name);
          $html .= '</div>';
        }
      endforeach;

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

// Global variable so we can render the modal content later
global $rula_ic_modal_html;
$rula_ic_modal_html = '';

// Template function for rendering the modal content
function the_rula_ic_metadata_modals() {
  global $rula_ic_modal_html;
  echo $rula_ic_modal_html;
}
