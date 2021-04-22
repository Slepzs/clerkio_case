<?php
/*
Plugin Name: Tobias Heide Clerk Case
Plugin URI: ...
Version: 999
Author: Tobias Heide
Author URI: ..
*/


if( ! defined( 'ABSPATH' ) ) {
    die;
}


class clerk
{

    function __construct() {
    	// On init add menu item
        add_action('admin_menu', array($this, 'clerk_menu'));
    }

    function register() {
        add_action( 'admin_enqueue_scripts',  array($this, 'enqueue_clerk_styles'));
	}

    function activate() {
        // flush rewrite rules
        flush_rewrite_rules();
    }

    function deactivate() {
        // flush rewrite rules
        flush_rewrite_rules();
    }


    function clerk_menu() {
        add_menu_page('Clerk << admin page', 'Clerk.io', 'manage_options', 'my-page-slug', array($this, 'clerk_admin_page'));
    }

    function clerk_admin_page() {
        return include('templates/admin.php');
    }


	function enqueue_clerk_styles() {
		wp_enqueue_style(
			'clerk-styles',
			str_replace( array( 'http:', 'https:' ), '', plugins_url( '/scss/dist/clerk.css' , __FILE__ ))
		);
		wp_enqueue_script(
			'clerk-scripts',
			str_replace( array( 'http:', 'https:' ), '', plugins_url( '/js/dist/clerk.min.js' , __FILE__ ))
		);
	}

}

if( class_exists( 'clerk' ) ) {
    $clerk = new Clerk();
	$clerk->register();
}

/** Activation plugin **/
register_activation_hook( __FILE__, array( $clerk, 'activate' ) );

/** Deactivate plugin **/
register_deactivation_hook( __FILE__, array( $clerk, 'deactivate' ) );

