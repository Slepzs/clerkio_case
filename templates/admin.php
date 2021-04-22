<?php
defined( 'ABSPATH' ) || exit;
require_once plugin_dir_path( __FILE__ ) . '../autoloader.php';


/** WP **/
/** Current PHP VERSION & WP_VERSION using static methods **/
$wp = clerk_Wordpress::wp_version();
$php = clerk_Wordpress::php_version();

/** WOO **/
$woo = new clerk_Woocommerce();
$active = $woo->isWoocommerceActive(); // Wocommerce is active.
if($active) {
	$products = $woo->singleOrMultiple($woo->woo_amount_of_products(), 'product');
	$wooVers = $woo->woo_version_number();
	$categories = $woo->woo_cats();
	$orders = $woo->singleOrMultiple($woo->woo_amount_of_orders(), 'order');
} else {
	$wooVers = $categories = $orders = $products = null;
}

?>


<div class="clerk">

    <div class="clerk-wrapper">
        <div class="clerk-container">
            <div class="clerk-header">
                <h2>ClerkPlugin </h2>
            </div>

                <p>Current WP Version is <?= $wp ?> and your php version is <?= $php ?></p>
                <hr>
                Currently active version of woocommerce is <?= $wooVers ?>
               <div class="clerk_woo_info">
                   <p>
                       You currently have <?= $products ?> stored.
                   </p>
                   <p>
                       You currently have  <?= $orders ?>.
                   </p>
                   <p>You have <?= $woo->singleOrMultiple(count($categories), 'category') ?> in your collection</p>
               </div>

            <h3>Categories are as following:</h3>
            <ul>
	            <?php
	            if ($categories) {
		            foreach($categories as $value) {
			            echo '<li>'. $value->name .'</li>';
                    }
	            }   else {
		            echo 'No Categories listed here..';
	            }
	            ?>
            </ul>


        </div>
    </div>

</div