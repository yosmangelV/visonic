<?php


// seguridad
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function cdlopd_customize_register( $wp_customize ) {
	//  WP_Customize_Manager object.
	
	
	$wp_customize -> add_section ( 'cdlopd', array (
		'title'		=>	__( 'Consentimiento de Cookies', 'click-datos-lopd' ),
		'priority'	=> 	999
	) );
	
	$wp_customize -> add_setting( 'cdlopd_contents_settings[position]', array(
		'type' 					=> 'option', // or 'option'
		'capability' 			=> 'edit_theme_options',
		'theme_supports' 		=> '', // Rarely needed.
		'default' 				=> '',
		'transport'				=> 'refresh', // or postMessage
		'sanitize_callback' 	=> '',
		'sanitize_js_callback' 	=> '', // Basically to_json.
	) );
	$wp_customize -> add_control( 'cdlopd_content_settings[position]', array(
		'type' 					=> 'select',
		'priority' 				=> 1, // Within the section.
		'section' 				=> 'cdlopd', // Required, core or custom.
		'label' 				=> __( 'Posición', 'click-datos-lopd' ),
		'choices'				=> array (
			'top-bar' 				=> __( 'Superior', 'click-datos-lopd' ),
			'bottom-bar' 			=> __( 'Inferior', 'click-datos-lopd' ),
			'top-left-block' 		=> __( 'Superior izquierda', 'click-datos-lopd' ),
			'top-right-block' 		=> __( 'Superior derecha', 'click-datos-lopd' ),
			'bottom-left-block'	 	=> __( 'Inferior izquierda', 'click-datos-lopd' ),
			'bottom-right-block'	=> __( 'Inferior derecha', 'click-datos-lopd' ),
		),
		'description' 			=> __( 'Posición banner.', 'click-datos-lopd' )
	) );
	$wp_customize -> add_setting( 'cdlopd_content_settings[container_class]', array(
		'type' 					=> 'option', // or 'option'
		'capability' 			=> 'edit_theme_options',
		'theme_supports' 		=> '', // Rarely needed.
		'default' 				=> '',
		'transport'				=> 'refresh', // or postMessage
		'sanitize_callback' 	=> '',
		'sanitize_js_callback' 	=> '', // Basically to_json.
	) );
	
	$wp_customize -> add_setting( 'cdlopd_content_settings[enqueue_styles]', array(
		'type' 					=> 'option', // or 'option'
		'capability' 			=> 'edit_theme_options',
		'theme_supports' 		=> '', // Rarely needed.
		'default' 				=> '',
		'transport'				=> 'refresh', // or postMessage
		'sanitize_callback' 	=> '',
		'sanitize_js_callback' 	=> '', // Basically to_json.
	) );
	$wp_customize -> add_control( 'cdlopd_content_settings[enqueue_styles]', array(
		'type' 					=> 'checkbox',
		'priority' 				=> 4, // Within the section.
		'section' 				=> 'cdlopd', // Required, core or custom.
		'label' 				=> __( 'Enqueue Styles', 'click-datos-lopd' ),
		'description' 			=> __( 'Deselect this to dequeue the plugin stylesheet.', 'click-datos-lopd' )
	) );
	$wp_customize -> add_setting( 'cdlopd_content_settings[rounded_corners]', array(
		'type' 					=> 'option', // or 'option'
		'capability' 			=> 'edit_theme_options',
		'theme_supports' 		=> '', // Rarely needed.
		'default' 				=> '',
		'transport'				=> 'refresh', // or postMessage
		'sanitize_callback' 	=> '',
		'sanitize_js_callback' 	=> '', // Basically to_json.
	) );
	$wp_customize -> add_control( 'cdlopd_content_settings[rounded_corners]', array(
		'type' 					=> 'checkbox',
		'priority' 				=> 6, // Within the section.
		'section' 				=> 'cdlopd', // Required, core or custom.
		'label' 				=> __( 'Redondeo esquinas', 'click-datos-lopd' ),
		'description' 			=> __( 'Redondear esquinas.', 'click-datos-lopd' )
	) );
	$wp_customize -> add_setting( 'cdlopd_content_settings[drop_shadow]', array(
		'type' 					=> 'option', // or 'option'
		'capability' 			=> 'edit_theme_options',
		'theme_supports' 		=> '', // Rarely needed.
		'default' 				=> '',
		'transport'				=> 'refresh', // or postMessage
		'sanitize_callback' 	=> '',
		'sanitize_js_callback' 	=> '', // Basically to_json.
	) );
	$wp_customize -> add_control( 'cdlopd_content_settings[drop_shadow]', array(
		'type' 					=> 'checkbox',
		'priority' 				=> 8, // Within the section.
		'section' 				=> 'cdlopd', // Required, core or custom.
		'label' 				=> __( 'Sombra', 'click-datos-lopd' ),
		'description' 			=> __( 'Añadir sombra.', 'click-datos-lopd' )
	) );
	$wp_customize -> add_setting( 'cdlopd_content_settings[display_accept_with_text]', array(
		'type' 					=> 'option', // or 'option'
		'capability' 			=> 'edit_theme_options',
		'theme_supports' 		=> '', // Rarely needed.
		'default' 				=> '',
		'transport'				=> 'refresh', // or postMessage
		'sanitize_callback' 	=> '',
		'sanitize_js_callback' 	=> '', // Basically to_json.
	) );
	$wp_customize -> add_control( 'cdlopd_content_settings[display_accept_with_text]', array(
		'type' 					=> 'checkbox',
		'priority' 				=> 9, // Within the section.
		'section' 				=> 'cdlopd', // Required, core or custom.
		'label' 				=> __( 'Mostrar boton con text', 'click-datos-lopd' ),
		'description' 			=> __( 'No mostrar boton a la derecha', 'click-datos-lopd' )
	) );
	$wp_customize -> add_setting( 'cdlopd_content_settings[x_close]', array(
		'type' 					=> 'option', // or 'option'
		'capability' 			=> 'edit_theme_options',
		'theme_supports' 		=> '', // Rarely needed.
		'default' 				=> '',
		'transport'				=> 'refresh', // or postMessage
		'sanitize_callback' 	=> '',
		'sanitize_js_callback' 	=> '', // Basically to_json.
	) );
	$wp_customize -> add_control( 'cdlopd_content_settings[x_close]', array(
		'type' 					=> 'checkbox',
		'priority' 				=> 10, // Within the section.
		'section' 				=> 'cdlopd', // Required, core or custom.
		'label' 				=> __( 'Usar X para cerrar', 'click-datos-lopd' ),
		'description' 			=> __( 'Cambiar X por icono', 'click-datos-lopd' )
	) );
	$wp_customize -> add_setting( 'cdlopd_content_settings[text_color]', array(
		'type' 					=> 'option', // or 'option'
		'capability' 			=> 'edit_theme_options',
		'theme_supports' 		=> '', // Rarely needed.
		'default' 				=> '',
		'transport'				=> 'refresh', // or postMessage
		'sanitize_callback' 	=> '',
		'sanitize_js_callback' 	=> '', // Basically to_json.
	) );
	$wp_customize -> add_control( 'cdlopd_content_settings[text_color]', array(
		'type' 					=> 'color',
		'priority' 				=> 15, // Within the section.
		'section' 				=> 'cdlopd', // Required, core or custom.
		'label' 				=> __( 'Color de texto', 'click-datos-lopd' ),
		'description' 			=> __( 'Color de texto de notificación.', 'click-datos-lopd' )
	) );
	$wp_customize -> add_setting( 'cdlopd_content_settings[bg_color]', array(
		'type' 					=> 'option', // or 'option'
		'capability' 			=> 'edit_theme_options',
		'theme_supports' 		=> '', // Rarely needed.
		'default' 				=> '',
		'transport'				=> 'refresh', // or postMessage
		'sanitize_callback' 	=> '',
		'sanitize_js_callback' 	=> '', // Basically to_json.
	) );
	$wp_customize -> add_control( 'cdlopd_content_settings[bg_color]', array(
		'type' 					=> 'color',
		'priority' 				=> 20, // Within the section.
		'section' 				=> 'cdlopd', // Required, core or custom.
		'label' 				=> __( 'Color de fondo', 'click-datos-lopd' ),
		'description' 			=> __( 'Color de fondo.', 'click-datos-lopd' )
	) );
	$wp_customize -> add_setting( 'cdlopd_content_settings[link_color]', array(
		'type' 					=> 'option', // or 'option'
		'capability' 			=> 'edit_theme_options',
		'theme_supports' 		=> '', // Rarely needed.
		'default' 				=> '',
		'transport'				=> 'refresh', // or postMessage
		'sanitize_callback' 	=> '',
		'sanitize_js_callback' 	=> '', // Basically to_json.
	) );
	$wp_customize -> add_control( 'cdlopd_content_settings[link_color]', array(
		'type' 					=> 'color',
		'priority' 				=> 30, // Within the section.
		'section' 				=> 'cdlopd', // Required, core or custom.
		'label' 				=> __( 'Color del link', 'click-datos-lopd' ),
		'description' 			=> __( 'Color de texto de link.', 'click-datos-lopd' )
	) );
	$wp_customize -> add_setting( 'cdlopd_content_settings[button_color]', array(
		'type' 					=> 'option', // or 'option'
		'capability' 			=> 'edit_theme_options',
		'theme_supports' 		=> '', // Rarely needed.
		'default' 				=> '',
		'transport'				=> 'refresh', // or postMessage
		'sanitize_callback' 	=> '',
		'sanitize_js_callback' 	=> '', // Basically to_json.
	) );
	$wp_customize -> add_control( 'cdlopd_content_settings[button_color]', array(
		'type' 					=> 'color',
		'priority' 				=> 40, // Within the section.
		'section' 				=> 'cdlopd', // Required, core or custom.
		'label' 				=> __( 'Color de Boton', 'click-datos-lopd' ),
		'description' 			=> __( 'Color de texto del boton.', 'click-datos-lopd' )
	) );
	$wp_customize -> add_setting( 'cdlopd_content_settings[button_bg_color]', array(
		'type' 					=> 'option', // or 'option'
		'capability' 			=> 'edit_theme_options',
		'theme_supports' 		=> '', // Rarely needed.
		'default' 				=> '',
		'transport'				=> 'refresh', // or postMessage
		'sanitize_callback' 	=> '',
		'sanitize_js_callback' 	=> '', // Basically to_json.
	) );
	$wp_customize -> add_control( 'cdlopd_content_settings[button_bg_color]', array(
		'type' 					=> 'color',
		'priority' 				=> 50, // Within the section.
		'section' 				=> 'cdlopd', // Required, core or custom.
		'label' 				=> __( 'Color fondo del boton', 'click-datos-lopd' ),
		'description' 			=> __( 'Color de fondo del boton.', 'click-datos-lopd' )
	) );
	$wp_customize -> add_setting( 'cdlopd_content_settings[flat_button]', array(
		'type' 					=> 'option', // or 'option'
		'capability' 			=> 'edit_theme_options',
		'theme_supports' 		=> '', // Rarely needed.
		'default' 				=> '',
		'transport'				=> 'refresh', // or postMessage
		'sanitize_callback' 	=> '',
		'sanitize_js_callback' 	=> '', // Basically to_json.
	) );
	$wp_customize -> add_control( 'cdlopd_content_settings[flat_button]', array(
		'type' 					=> 'checkbox',
		'priority' 				=> 60, // Within the section.
		'section' 				=> 'cdlopd', // Required, core or custom.
		'label' 				=> __( 'Boton plano', 'click-datos-lopd' ),
		'description' 			=> __( 'Deseleccionar', 'click-datos-lopd' )
	) );
}
add_action( 'customize_register', 'cdlopd_customize_register' );