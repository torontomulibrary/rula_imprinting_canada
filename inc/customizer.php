<?php
/**
 * rula_imprinting_canada Theme Customizer
 *
 * @package rula_imprinting_canada
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function rula_imprinting_canada_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'rula_imprinting_canada_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'rula_imprinting_canada_customize_partial_blogdescription',
		) );
	}

	$wp_customize->add_section( 'rula_imprinting_canada_ga' , array(
    'title'      => __( 'Google Analytics', 'rula_imprinting_canada' ),
    'priority'   => 200,
	) );
	$wp_customize->add_setting( 'ga_property_id' , array(
    'default'   => false,
    'transport' => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'link_color', array(
		'label'      => __( 'Google Analytics Property ID', 'rula_imprinting_canada' ),
		'section'    => 'rula_imprinting_canada_ga',
		'settings'   => 'ga_property_id',
	) ) );

}
add_action( 'customize_register', 'rula_imprinting_canada_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function rula_imprinting_canada_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function rula_imprinting_canada_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function rula_imprinting_canada_customize_preview_js() {
	wp_enqueue_script( 'rula_imprinting_canada-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'rula_imprinting_canada_customize_preview_js' );
