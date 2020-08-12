<?php
/**
 * Single Product Sale Flash
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

?>
<?php if ( $product->is_on_sale() ) : ?>

	<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'free shipping', 'woocommerce' ) . '</span>', $post, $product ); ?>

	<?php
endif;


