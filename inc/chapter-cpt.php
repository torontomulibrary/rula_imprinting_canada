<?php 
/**
 * Creates the Chapter custom post type
 * @since RULA 1.0.x
 */
function rula_imprinting_canada_create_chapter_cpt() {
  register_post_type( 'chapters',
    array(
      'labels' => array(
        'name' => __( 'Chapters' ),
        'singular_name' => __( 'Chapter' ),
        'add_new_item' => __( 'Add new chapter' ),
        'edit_item' => __( 'Edit chapter' ),
        'new_item' => __( 'New chapter' ),
        'view_item' => __( 'View chapter' ),
        'view_items' => __( 'View chapters' ),
        'search_items' => __( 'Search chapters' ),
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