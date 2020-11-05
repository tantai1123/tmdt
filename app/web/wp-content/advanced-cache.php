<?php
defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

define( 'WP_ROCKET_ADVANCED_CACHE', true );
$rocket_cache_path = '/home/krfhxbdhosting/public_html/matongogd.com/wp-content/cache/wp-rocket/';
$rocket_config_path = '/home/krfhxbdhosting/public_html/matongogd.com/wp-content/wp-rocket-config/';

if ( file_exists( '/home/krfhxbdhosting/public_html/matongogd.com/wp-content/plugins/wp-rocket/inc/front/process.php' ) ) {
	include '/home/krfhxbdhosting/public_html/matongogd.com/wp-content/plugins/wp-rocket/inc/front/process.php';
} else {
	define( 'WP_ROCKET_ADVANCED_CACHE_PROBLEM', true );
}