<?php
/*
 * Template Post Type: post
 */
  
 get_header();  ?>

<?php 
$args=array(
	'posts_per_page' => '4'
);

// запрос
$query = new WP_Query( $args ); 
$title = get_the_title();
?>


<?php if ( $query->have_posts() ) : ?>
	<h2 class="post-title"><?php echo $title;?></h2>
	<div class="slider">
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<?php get_template_part('/template-parts/slider') ?>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</div>
	<div class="slider-dots"></div> 
	

<?php else : ?>
	<p><?php esc_html_e( 'No related posts!' ); ?></p>
	<?php endif; ?>
