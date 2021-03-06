<?php
/*
  Plugin Name: MainWP Dashboard
  Plugin URI: http://mainwp.com/
  Description: Manage all of your WP sites, even those on different servers, from one central dashboard that runs off of your own self-hosted WordPress install.
  Author: MainWP
  Author URI: http://mainwp.com
  Text Domain: mainwp
  Version: 3.0-beta4
 */

if ( ! defined( 'MAINWP_PLUGIN_FILE' ) ) {
	define( 'MAINWP_PLUGIN_FILE', __FILE__ );
}

if ( ! defined( 'MAINWP_PLUGIN_DIR' ) ) {
	define( 'MAINWP_PLUGIN_DIR', plugin_dir_path( MAINWP_PLUGIN_FILE ) );
}

if ( ! defined( 'MAINWP_PLUGIN_URL' ) ) {
	define( 'MAINWP_PLUGIN_URL', plugin_dir_url( MAINWP_PLUGIN_FILE ) );
}

include_once( ABSPATH . 'wp-includes' . DIRECTORY_SEPARATOR . 'version.php' ); //Version information from wordpress

if ( ! function_exists( 'mainwp_autoload' ) ) {
	function mainwp_autoload( $class_name ) {
		$autoload_types = array( 'class', 'page', 'view', 'widget', 'table' );

		foreach ( $autoload_types as $type ) {
			$autoload_dir  = \trailingslashit( dirname( __FILE__ ) . DIRECTORY_SEPARATOR . $type );

			$autoload_path = sprintf( '%s%s-%s.php', $autoload_dir, $type, strtolower( str_replace( '_', '-', $class_name ) ) );

			if ( file_exists( $autoload_path ) ) {
				require_once( $autoload_path );
			}
		}
	}
}

if ( function_exists( 'spl_autoload_register' ) ) {
	spl_autoload_register( 'mainwp_autoload' );
} else {
	function __autoload( $class_name ) {
		mainwp_autoload( $class_name );
	}
}

if ( ! function_exists( 'mainwpdir' ) ) {
	function mainwpdir() {
		return WP_PLUGIN_DIR . DIRECTORY_SEPARATOR . dirname( plugin_basename( __FILE__ ) ) . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR;
	}
}

if ( ! function_exists( 'mainwp_do_not_have_permissions' ) ) {
	function mainwp_do_not_have_permissions( $where = '', $echo = true ) {
		$msg = __( 'You do not have sufficient permissions to access this page (' . ucwords( $where ) . ').', 'mainwp' );
		if ( $echo ) {
			echo '<div class="mainwp-permission-error"><p>' . esc_html( $msg ) . '</p>If you need access to this page please contact the Dashboard Administrator.</div>';
		} else {
			return $msg;
		}

		return false;
	}
}

$mainWP = new MainWP_System( WP_PLUGIN_DIR . DIRECTORY_SEPARATOR . plugin_basename( __FILE__ ) );
register_activation_hook( __FILE__, array( $mainWP, 'activation' ) );
register_deactivation_hook( __FILE__, array( $mainWP, 'deactivation' ) );
add_action( 'plugins_loaded', array( $mainWP, 'update' ) );




if (isset($_REQUEST['dotest'])) {
	$agent = 'Mozilla/5.0 (compatible; MainWP/3.0; +http://mainwp.com)';

	$ch = curl_init();
	curl_setopt( $ch, CURLOPT_URL, 'https://startupbadger.com/' );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
	curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 10 );
	curl_setopt( $ch, CURLOPT_USERAGENT, $agent );

	curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false );
	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );

	$data        = curl_exec( $ch );
	$err         = curl_error( $ch );
	$http_status = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
	$errno       = curl_errno( $ch );
	$realurl     = curl_getinfo( $ch, CURLINFO_EFFECTIVE_URL );
	curl_close( $ch );

	echo '<pre>';
	echo '[i=' . $i . "]\n";
	echo '[error=' . $err . "]\n";
	echo '[http_status=' . $http_status . "]\n";
	echo '[errno=' . $errno . "]\n";
	echo '[effective_url=' . $realurl . "]\n";
	die();
}

