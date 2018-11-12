<?php
/*
Plugin Name: clickDatos RGPD
Plugin URI: 
Description: Plugin para adecuación a RGPD LOPD. Páginas legales, banner de cookies, cláusulas legales
Version: 2.1
Author: clickDatos
Author URI: https://clickdatos.es/?utm_source=wordpress&utm_medium=url_link&utm_campaign=%5BLD%5D%20Plugin%20RGPD
Text Domain: click-datos-lopd
Domain Path: /languages
License:     GPL2
*/
// Añadimos seguridad y definimos constantes
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'CDLOPD_PLUGIN_URL' ) ) {
	define( 'CDLOPD_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

if ( is_admin() ) {
	require_once dirname( __FILE__ ) . '/admin/class-cdlopd-admin.php';
	$CDLOPD_Admin = new CDLOPD_Admin();
	$CDLOPD_Admin -> init();

	
	
} else {
	require_once dirname( __FILE__ ) . '/public/class-cdlopd-public.php';
	$CDLOPD_Public = new CDLOPD_Public();
	$CDLOPD_Public -> init();
}
require_once dirname( __FILE__ ) . '/public/customizer.php';


function cdlopd_load_plugin_textdomain() {
    load_plugin_textdomain( 'click-datos-lopd', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'cdlopd_load_plugin_textdomain' );


