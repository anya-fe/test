<?php
/**
 * The Slider template file
 *
 */
?>


<?php if( have_rows('slides') ): ?>
    
    <?php while( have_rows('slides') ): the_row(); 
        //Vars
        
        $image = get_sub_field('image');
        $product_name = get_sub_field('product_name');
        $manufacturer = get_sub_field('manufacturer');
        $regular_price = get_sub_field('regular_price');
        $sale_price = get_sub_field('sale_price');
        $rating = get_sub_field('rating');
        $reviews = get_sub_field('reviews');
        $sale = get_sub_field('sale');
        ?>
<div class='slider-item' >
        <div class='slogan-box'>
            
           <img class='slogan-box__image' src='<?php echo $image; ?>'/>
           <div class="slogan-box__rating">
                <ul class="woocommerce ">
                    <li>
                        <?php if ($average = $rating) : ?>
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
            </h2>
            <p class='slogan-box__manufacturer'><?php echo $manufacturer;?></p>
            <div class="slogan-box__price woocommerce-Price-amount amount">
                <ins>
                    <p class='slogan-box__price slogan-box__price_regular woocommerce-Price-amount amount'><span class="woocommerce-Price-currencySymbol">$</span><?php echo $regular_price;?></p>
                </ins>                
                <del>
                    <p class='slogan-box__price slogan-box__price_sale woocommerce-Price-amount amount'><?php echo $sale_price;?></p>
                </del>
                
                    <?php   if ($sale > 2):
                                echo "<span class='slogan-box__price slogan-box__price_badge'>".$sale." % </span>"; 
                            else:
                                echo '<span class="slogan-box__price slogan-box__price_badge" style="width: 0"></span>';
                            endif;
                    ?>

            </div>                
        </div>
</div>
    <?php endwhile; ?>
    
    
<?php endif; ?>

                          
