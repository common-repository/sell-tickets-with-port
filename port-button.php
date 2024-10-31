<?php
/**
* Plugin Name: Sell tickets with Port
* Plugin URI: https://sellwithport.com/
* Description: Sell tickets directly from your Wordpress site with no redirects with Port. 
* Version: 1.0
* Author: Port
* Author URI: https://sellwithport.com
*/

if ( ! function_exists( 'add_tags_to_pages' ) ) {
    function add_tags_to_pages() {
        register_taxonomy_for_object_type( 'post_tag', 'page' );
    }
    
    add_action( 'admin_init', 'add_tags_to_pages' );
}

if ( ! function_exists('register_port_button' ) ) {
    function register_port_button() {
        if ( !is_admin() ) {
            wp_register_script( 'port-js', plugins_url( '', __FILE__ ) . '/port-js.js' );
            
            if( has_tag('port-button') ) {
                wp_enqueue_script( 'port-js' );
            }
        }
    }
    
    add_action( 'wp_enqueue_scripts', 'register_port_button' );
}



