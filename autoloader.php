<?php
/** Autoload project files */
function autoload($class) {

    include plugin_dir_path( __FILE__ ) . 'includes/class-' . $class . '.php';
}
spl_autoload_register('autoload');