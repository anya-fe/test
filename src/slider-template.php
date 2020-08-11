<?php
/*
 * Template Name: Slider
 * Template Post Type: post
 */
  
 get_header();  ?>

<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) :
			the_post();


			get_template_part( './template-parts/slider.php' );
			the_post_navigation();
			

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
