<?php

function load_my_css(){
    wp_register_style('style', get_stylesheet_directory_uri() . './style.css',time() );
    wp_enqueue_style('style');
 }

function load_my_js(){
    wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
    
    wp_register_script('index', get_stylesheet_directory_uri() . '/index.js',array('jquery'), time(), true);
    wp_enqueue_script('index');
 }
 add_action( 'wp_enqueue_scripts', 'load_my_js' );

 function move_variation_price() {

    remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation', 10 );
    add_action( 'woocommerce_after_single_variation', 'woocommerce_single_variation', 10 );

}
add_action( 'woocommerce_before_add_to_cart_form', 'move_variation_price' );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 30 );

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['reviews'] ); 			// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab

    return $tabs;

}

remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta',40);
add_action('woocommerce_single_product_summary','woocommerce_template_single_meta',8);

remove_action('woocommerce_single_variation','woocommerce_single_variation',10);
add_action('woocommerce_single_variation','woocommerce_single_variation',30);
add_action('woocommerce_single_variation','woocommerce_single_variation_add_to_cart_button',20);



remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price',10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price',20);


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




