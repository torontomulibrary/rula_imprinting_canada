<?php 
/**
 * Creates the Chapter custom post type
 * @since RULA 1.0.x
 */
function rula_imprinting_canada_create_chapter_cpt() {
  register_post_type( 'chapters',
    array(
      'labels' => array(
        'name' => __( 'Content' ),
        'all_items' => __( 'All Content' ),
        'singular_name' => __( 'Content' ),
        'add_new_item' => __( 'Add new content' ),
        'edit_item' => __( 'Edit content' ),
        'new_item' => __( 'New content' ),
        'view_item' => __( 'View content' ),
        'view_items' => __( 'View content' ),
        'search_items' => __( 'Search content' ),
        'attributes' => __( 'Chapter Attributes' )
      ),
      'public' => true,
      'menu_position' => 25,
      'menu_icon' => 'dashicons-book',
      'hierarchical' => true,
      'supports' => array('title', 'editor', 'revisions', 'page-attributes'),
      'has_archive' => true
    )
  );
}
add_action( 'init', 'rula_imprinting_canada_create_chapter_cpt' );