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
  $acf_object_type = get_field('type', $attachment_id);

  $html = "";
  $html .= '<div class="modal-body">';
  $html .= '<div class="ic_modal_image">';
  $html .= '<img src="' . $attachment_url . '">';
  $html .= '</div>';
  $html .= '<div class="ic_modal_metadata">';
  $html .= '<div>' . $acf_object_type . '</div>';
  $html .= '</div>';
  $html .= '</div>';
  
  return $html;
}

function rula_ic_metadata_modal_content_footer($attachment_id) {
  return '';
}
