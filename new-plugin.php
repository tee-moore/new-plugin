<?php
/*
Plugin Name:  new-plugin
Plugin URI:   
Description:  
Version:      1.0
Author:       Timur Panchenko
Author URI:   2teemoore@gmail.com
Text Domain:  
Domain Path:  /languages
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
*/

/**
 * Define constants
 */
define( "NEW_PLUGIN", plugin_dir_path( __FILE__ ) );


/**
 * Exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * Plugin version
 */
define( 'NEW_PLUGIN_VERSION', '1.0.0' );


/**
 * Add textdomain
 */
add_action('init', 'new_plugin_locale');
function new_plugin_locale() {
     load_plugin_textdomain( 'new_plugin', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}


/**
 * Add scripts and styles
 */
add_action( 'wp_enqueue_scripts', 'new_plugin_enqueue_scripts' );
function new_plugin_enqueue_scripts(){
    wp_enqueue_script( 'new-plugin-script', plugins_url('/js/new-plugin-script-front.js', __FILE__), array('jquery'), null, true);
    wp_enqueue_style( 'new-plugin-style', plugins_url('/css/new-plugin-style-front.css', __FILE__), array(), null, 'all' );
    wp_localize_script('new-plugin-script', 'myajax', 
        array(
            'url' => admin_url('admin-ajax.php')
        )
    );
}

add_action( 'admin_enqueue_scripts', 'new_plugin_admin_enqueue_scripts' );
function new_plugin_admin_enqueue_scripts(){
    //wp_enqueue_media();
    wp_enqueue_script( 'new-plugin-script', plugins_url('/js/new-plugin-script-admin.js', __FILE__), array('jquery'), null, true);
    wp_enqueue_style( 'ordin-admin-style', plugins_url('/css/new-plugin-style-admin.css', __FILE__), array(), null, 'all' );
}


/**
 * Registers a function to be run when the plugin is activated. 
 */
register_activation_hook( __FILE__, 'new_plugin_activate' );
function new_plugin_activate() {
    
}


/**
 * Include options page
 */
require_once dirname( __FILE__ ) . '/admin/options.php';


/**
 * Include custom post type
 */
require_once dirname( __FILE__ ) . '/inc/custom-post-type.php';


/**
 * Include meta box
 */
require_once dirname( __FILE__ ) . '/inc/meta-box.php';


/**
 * Include widgets
 */
require_once dirname( __FILE__ ) . '/widgets/widget.php';
