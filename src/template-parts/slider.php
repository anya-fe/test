<?php
/**
 * The Slider template file
 *
 */
?>

<div class="slider">
<?php if( have_rows('slides') ): ?>

    <div class='slider-item' >

    <?php while( have_rows('slides') ): the_row(); 
        //Vars
        $image = get_sub_field('image');
        $product_name = get_sub_field('product_name');
        $manufacturer = get_sub_field('manufacturer');
        $regular_price = get_sub_field('regular_price');
        $sale_price = get_sub_field('sale_price');
        $rating = get_sub_field('rating');
        $reviews = get_sub_field('reviews');
        ?>

        <div class='slogan-box'>
            
           <img class='slogan-box__image' src='<?php echo wp_get_attachment_image($image); ?>'/>
           <div class="slogan-box__rating">
                <ul class="woocommerce ">
                    <li>
                        <?php if ($average = $rating->get_average_rating()) : ?>
                        <?php echo '<div class="star-rating" title="'.sprintf(__( 'Rated %s out of 5', 'woocommerce' ), $average).'"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.$average.'</strong> '.__( 'out of 5', 'woocommerce' ).'</span></div>'; ?>
                    <?php endif; ?>
                    </li>
                </ul>
                <a href="#reviews" class="woocommerce-review-link " rel="nofollow">
                    <?php printf( _n( '%s Review', '%s Reviews', $reviews, 'woocommerce' ), '<span class="count">' . esc_html( $reviews ) . '</span>' ); ?>
                </a>
           </div>
            <h2 class='slogan-box__title'>
               <?php echo $product_name;?>
            </h1>
            <p class='slogan-box__manufacturer'><?php echo $product_name;?></p>
            <div class="slogan-box__price woocommerce-Price-amount amount">
                <ins>
                    <p class='slogan-box__price slogan-box__price_regular woocommerce-Price-amount amount'><span class="woocommerce-Price-currencySymbol">$</span><?php echo $regular_price;?></p>
                </ins>                
                <del>
                    <p class='slogan-box__price slogan-box__price_sale woocommerce-Price-amount amount'><span class="woocommerce-Price-currencySymbol">$</span><?php echo $sale_price;?></p>
                </del>
                <span class='"slogan-box__price "slogan-box__price_badge'></span>
            </div>                
        </div>
    <?php endwhile; ?>
    </div>
<?php endif; ?>

    <div class="slider-dots"></div>                       
</div>