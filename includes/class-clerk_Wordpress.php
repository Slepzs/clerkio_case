<?php

defined( 'ABSPATH' ) || exit;

class clerk_Wordpress
{

	public static function wp_version()
    {
    	// Get variable
        global $wp_version;

		// Return it for use.
        return $wp_version;

    }

    public static function php_version() {

    	return phpversion();

    }


}