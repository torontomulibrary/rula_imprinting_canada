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
  $html = '';
  $html .= '<h6>Title Proper and Subtitle</h6>';
  $html .= '<p>' . get_sub_field('title_proper_and_subtitle') . '</p>';
  return $html;
}

function rula_ic_metadata_field_alternative_titles() {
  $html = '';

  if ( have_rows('alternative_titles') ) :
    $html .= '<h6>Alternative Titles</h6>';
    while ( have_rows('alternative_titles') ) : the_row();
      $html .= '<p>' . get_sub_field('alternative_title_text') . ' (<i>' . get_sub_field('alternative_title_type') . '</i>)</p>';
    endwhile;
  endif;

  return $html;
}

function rula_ic_metadata_field_place_of_publication() {
  $html = '';
  $html .= '<h6>Place of publication</h6>';
  $html .= '<p>' . get_sub_field('place_of_publication') . '</p>';
  return $html;
}

function rula_ic_metadata_field_name_of_publisher() {
  $html = '';
  $html .= '<h6>Name of publisher</h6>';
  $html .= '<p>' . get_sub_field('name_of_publisher') . '</p>';
  return $html;
}

function rula_ic_metadata_field_secondary_place_of_publications() {
  $html = '';
  if ( have_rows('secondary_place_of_publications') ) :
    $html .= '<h6>Secondary place of publication(s)</h6>';
    while ( have_rows('secondary_place_of_publications') ) : the_row();
      $html .= '<p>' . get_sub_field('place_of_publication') . '</p>';
    endwhile;
  endif;
  return $html;
}

function rula_ic_metadata_field_secondary_name_of_publishers() {
  $html = '';
  $html .= '<h6>Secondary Name of Publisher(s)</h6>';
  while ( have_rows('secondary_name_of_publishers') ) : the_row();
    $html .= '<p>' . get_sub_field('name_of_publisher') . '</p>';
  endwhile;
  return $html;
}

function rula_ic_metadata_field_dates() {
  $html = '';
  if ( have_rows('dates') ) :
    $html .= '<h6>Dates</h6>';
    while ( have_rows('dates') ) : the_row();
      $html .= '<p>' . get_sub_field('date') . '</p>';
    endwhile;
  endif;
  return $html;
}

function rula_ic_metadata_field_stated_edition_or_impression() {
  $html = '';
  $html .= '<h6>Stated edition or impression</h6>';
  $html .= '<p>' . get_sub_field('stated_edition_or_impression') . '</p>';
  return $html;
}

function rula_ic_metadata_field_pagination() {
  $html = '';
  $html .= '<h6>Pagination</h6>';
  $html .= '<p>' . get_sub_field('pagination') . '</p>';
  return $html;
}

function rula_ic_metadata_field_source() {
  $html = '';
  $html .= '<h6>Source</h6>';
  $html .= '<p>' . get_sub_field('source') . '</p>';
  return $html;
}

function rula_ic_metadata_field_series_title_with_number() {
  $html = '';
  $html .= '<h6>Series title with number</h6>';
  $html .= '<p>' . get_sub_field('series_title_with_number') . '</p>';
  return $html;
}

function rula_ic_metadata_field_creators() {
  $html = '';
  if ( have_rows('creators') ) :
    $html .= '<h6>Creators</h6>';
    while ( have_rows('creators') ) : the_row();
      if ( get_sub_field('contribution_type') == "Other" ) {
        $html .= '<p>' . get_sub_field('name') . '(' . get_sub_field('contribution_type_other') . ')' . '</p>';
      } else {
        $html .= '<p>' . get_sub_field('name') . '(' . get_sub_field('contribution_type') . ')' . '</p>';
      }
    endwhile;
  endif;
  return $html;
}
