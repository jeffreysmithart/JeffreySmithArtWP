<?php use Roots\Sage\Titles; ?>

	

	<?php
	$args = array(
		'post_type' => 'portfolio',
		'post_status' => 'publish',
		'order'               => 'DESC',
		'orderby'             => 'rand',

		'meta_query' => array(     
       array(
         'key' => 'display_home',                 
         'value' => 1,
         'compare' => '=',
       )
     ),
		'posts_per_page'         => 1,
		'no_found_rows'          => false,
		'cache_results'          => true,
		'update_post_term_cache' => true,
		'update_post_meta_cache' => true,
		
	);


$some_query = new WP_Query( $args );

	if ( $some_query->have_posts() ) {		
		while ( $some_query->have_posts() ) {
			$some_query->the_post();
			$GLOBALS['featured'] = get_the_ID();
				if ( has_post_thumbnail() ) {
					?>
					<div class="page-header"<?php if (get_field('accent_background_color')){

                        $Hex_color = get_field('accent_background_color');
                        $RGB_color = hex2rgb($Hex_color);
                        $Final_Rgb_color = implode(", ", $RGB_color);
                        echo'style="background-image: linear-gradient(to bottom, rgba('. $Final_Rgb_color .',1) 0%,rgba('. $Final_Rgb_color .',0.2) 60%,rgba('. $Final_Rgb_color .',0) 100%);"';
                    } ?>>
					<div class="row align-center">

					<div class="small-12 medium-8  columns featured-painting medium-order-2">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail(); ?>
						</a>
					</div>

					<div class="small-12 medium-4 columns about-card">
					<?php
						}
							echo '<article class="about-card-inner"><div class="portfolio-item-inner">';
							echo '<h3 class="post-headline"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3><div class="button  secondary" ><a href="'. get_the_permalink() . '">Learn more</a></div>';
							echo '</div></article> </div>';
						}
					} 

		  	?>
		</div>

	<?php 
		wp_reset_postdata();
	 ?>
</div>

