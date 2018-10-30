<?php
/**
 * rula_imprinting_canada functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package rula_imprinting_canada
 */

define("CSS_URI", get_template_directory_uri() . '/css/');
define("SCRIPTS_URI", get_template_directory_uri() . '/js/');
define("VENDOR_URI", get_template_directory_uri() . '/vendor/');

include_once( get_template_directory() . '/inc/helpers.php');

if ( ! function_exists( 'rula_imprinting_canada_setup' ) ) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function rula_imprinting_canada_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on rula_imprinting_canada, use a find and replace
     * to change 'rula_imprinting_canada' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'rula_imprinting_canada', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
      'primary-navigation' => esc_html__( 'Primary Navigation', 'rula_imprinting_canada' ),
      'secondary-navigation' => esc_html__( 'Secondary Navigation', 'rula_imprinting_canada' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );

    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'rula_imprinting_canada_custom_background_args', array(
      'default-color' => 'ffffff',
      'default-image' => '',
    ) ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support( 'custom-logo', array(
      'height'      => 250,
      'width'       => 250,
      'flex-width'  => true,
      'flex-height' => true,
    ) );
  }
endif;
add_action( 'after_setup_theme', 'rula_imprinting_canada_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rula_imprinting_canada_content_width() {
  // This variable is intended to be overruled from themes.
  // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
  // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
  $GLOBALS['content_width'] = apply_filters( 'rula_imprinting_canada_content_width', 640 );
}
add_action( 'after_setup_theme', 'rula_imprinting_canada_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rula_imprinting_canada_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar', 'rula_imprinting_canada' ),
    'id'            => 'sidebar-1',
    'description'   => esc_html__( 'Add widgets here.', 'rula_imprinting_canada' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'rula_imprinting_canada_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rula_imprinting_canada_scripts() {
  // Bootstrap 4.1.2
  wp_enqueue_style( 'bootstrap-style', VENDOR_URI . 'bootstrap-4.1.2/css/bootstrap.min.css', array(), '4.1.2' );
  wp_enqueue_script( 'bootstrap-bundle-js', VENDOR_URI . 'bootstrap-4.1.2/js/bootstrap.bundle.min.js', array('jquery'), '4.1.2', true );

  wp_enqueue_style( 'rula_imprinting_canada-style', get_stylesheet_uri() );

  wp_enqueue_script( 'rula_imprinting_canada-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

  wp_enqueue_script( 'rula_imprinting_canada-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'rula_imprinting_canada_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
  require get_template_directory() . '/inc/jetpack.php';
}

// Include our admin customizations
require get_template_directory() . '/inc/admin-customizations.php';

// Include our extra theme template functions
require get_template_directory() . '/inc/ic-template-functions.php';


// Include chapter custom post type
// include_once( get_template_directory() . '/inc/chapter-cpt.php');



add_shortcode('ic_media_modal', 'rula_imprinting_canada_media_modal_shortcode');
function rula_imprinting_canada_media_modal_shortcode($atts = array(), $content = null, $tag) {
  $attachment_id = $atts['media-id'];
  $float = $atts['float'];
  $html = "";
  $html .= rula_imprinting_canada_media_modal_button($attachment_id, $float);
  $html .= rula_imprinting_canada_media_modal_content($attachment_id);
  return $html;
}

function rula_imprinting_canada_media_modal_button($attachment_id, $float) {
  $classes = array('btn', 'btn-primary', 'ic_media_modal');
  if ( $float == 'right' ) {
    $classes[] = 'float-right';
  } elseif ( $float == 'left' ) {
    $classes[] = 'float-left';
  }

  $html = '<button type="button" class="' . implode(" ", $classes) . '" data-toggle="modal" data-target="#ic_media_' . $attachment_id . '">';
  $html .= rula_imprinting_canada_media_button_image($attachment_id);
  $html .= rula_imprinting_canada_media_button_caption($attachment_id);
  $html .= '</button>';

  return $html;
}

function rula_imprinting_canada_media_button_image($attachment_id) {
  return '<img src="' . wp_get_attachment_url($attachment_id) . '">';
}

function rula_imprinting_canada_media_button_caption($attachment_id) {
  return '<div class="caption">' . get_the_title($attachment_id) . '</div>';
}

function rula_imprinting_canada_media_modal_content($attachment_id) {
  $html = "";
  $html .= '<div class="modal fade ic_media_modal" id="ic_media_' . $attachment_id . '" tabindex="-1" role="dialog" aria-labelledby="ic_media_' . $attachment_id . '_label" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content">';
  $html .= rula_imprinting_canada_media_modal_header($attachment_id);
  $html .= rula_imprinting_canada_media_modal_body($attachment_id);
  $html .= rula_imprinting_canada_media_modal_footer($attachment_id);
  $html .= "</div></div></div>";

  return $html;
}

function rula_imprinting_canada_media_modal_header($attachment_id) {
  $title = get_the_title($attachment_id);
  return '<div class="modal-header"><h5 class="modal-title" id="ic_media_' . $attachment_id . '_label">' . $title . '</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
}

function rula_imprinting_canada_media_modal_body($attachment_id) {
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

function rula_imprinting_canada_media_modal_footer($attachment_id) {
  return '';
}