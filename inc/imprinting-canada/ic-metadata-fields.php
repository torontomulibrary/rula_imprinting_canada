<?php
/**
 * Renders the HTML for the flexible content (metadata) fields
 */
function rula_ic_metadata_field_creator() {
  $html = '';

  if ( get_sub_field('creator') ) :
    $html .= '<h6>Creator</h6>';
    $html .= '<p>' . get_sub_field('creator') . '</p>';
  endif;

  return $html;
}

function rula_ic_metadata_field_notes() {
  $html = '';

  if ( have_rows('notes') ) :
    while ( have_rows('notes') ) : the_row();
      $html .= '<h6>'. get_sub_field('label')  .'</h6>';
      $html .= '<p>'. get_sub_field('notes')  .'</p>';
    endwhile;
  endif;

  return $html;
}

function rula_ic_metadata_field_title_proper_and_subtitle() {
  return '';
}

function rula_ic_metadata_field_alternative_titles() {
  return '';
}

function rula_ic_metadata_field_place_of_publication() {
  return '';
}

function rula_ic_metadata_field_name_of_publisher() {
  return '';
}

function rula_ic_metadata_field_secondary_place_of_publications() {
  return '';
}

function rula_ic_metadata_field_secondary_name_of_publishers() {
  return '';
}

function rula_ic_metadata_field_dates() {
  return '';
}

function rula_ic_metadata_field_stated_edition_or_impression() {
  return '';
}

function rula_ic_metadata_field_pagination() {
  return '';
}

function rula_ic_metadata_field_source() {
  return '';
}

function rula_ic_metadata_field_series_title_with_number() {
  return '';
}

function rula_ic_metadata_field_creators() {
  return '';
}