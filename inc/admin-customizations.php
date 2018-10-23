<?php

/**
 * Add in a core button that's disabled by default
 */
function rula_imprinting_canada_mce_buttons_2( $buttons ) { 
  $buttons[] = 'superscript';
  $buttons[] = 'subscript';

  return $buttons;
}
add_filter( 'mce_buttons_2', 'rula_imprinting_canada_mce_buttons_2' );

/**
 * Restrict admin menu links for editors to only essential functions
 */
function rula_imprinting_canada_admin_menu() {
    global $submenu;

    // Remove media for non-admins
    if( !current_user_can('manage_options') ) {
      remove_menu_page( 'edit.php' );                   // Posts
      remove_menu_page( 'edit-comments.php' );          // Comments
      remove_menu_page( 'tools.php' );                  // Tools
    }
}
add_action( 'admin_menu', 'rula_imprinting_canada_admin_menu' );

function ic_media_library_style() {
    wp_enqueue_style('ic-media-library-admin-style', get_template_directory_uri() . '/css/admin/ic_media_library.css');
}
add_action('admin_enqueue_scripts', 'ic_media_library_style');