<?php

function load_my_css(){
    wp_enqueue_style('./style.css');
 }

remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta',40);
add_action('woocommerce_single_product_summary','woocommerce_template_single_meta',8);



remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price',10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price',20);


remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',20);
add_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',40);

add_filter( 'woocommerce_get_availability', 'wcs_custom_get_availability', 1, 2);
function wcs_custom_get_availability( $availability, $_product ) {
   global $product;

    // Change in Stock Text to only 1 or 2 left
    if ( $_product->is_in_stock() && $product->get_stock_quantity() <= 3 ) {
    	$availability['availability'] = sprintf( __('There are just %s products left', 'woocommerce'), $product->get_stock_quantity());
	}

    // Change Out of Stock Text
    if ( ! $_product->is_in_stock() ) {
    	$availability['availability'] = __('Sorry, All sold out!', 'woocommerce');
    }

    return $availability;
}




