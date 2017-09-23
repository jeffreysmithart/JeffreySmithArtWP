<?php if ( $post->post_content!=="" ) : ?>
	<section class="page-section">
		<div class="row align-center">
			<article class=" small-11 medium-7">
				<?php the_content(); ?>
			</article>
		</div>
	</section>
<?php endif; ?>

<section class="page-section"><!--Recent painting/portfolio section -->
	<div class="row">
		<h2 class="blog-feed-headline columns" >Recent Paintings</h2>
	</div>
	<div class="row align-center" >
		<?php
		
			$args = array(
				//Choose ^ 'any' or from below, since 'any' cannot be in an array
				'post_type' => 'portfolio',
				'post_status' => 'publish',
				'order'               => 'DESC',
				'orderby'             => 'date',
				
				//Pagination Parameters
				'posts_per_page'         => 4,
				'post__not_in' =>  array($GLOBALS['featured']),
				//Parameters relating to caching
				'no_found_rows'          => false,
				'cache_results'          => true,
				'update_post_term_cache' => true,
				'update_post_meta_cache' => true,
				
			);
		$the_query = new WP_Query( $args );
			// The Loop
			if ( $the_query->have_posts() ) {
				// echo '<section class="row align-stretch">';
					echo '<div class="columns small-12 medium-12 large-12 portfolio-items-wrapper " data-equalizer data-equalize-by-row="true" id="portfolio" ><div class="row">';
						while ( $the_query->have_posts() ) {
					
							$the_query->the_post();
							
							echo '<article class="small-12 large-4  medium-6 columns portfolio-item front-page"><div class="portfolio-item-inner" data-equalizer-watch>';
								
								if ( has_post_thumbnail() ) {
									echo '<a href="' . get_the_permalink() . '">';
										the_post_thumbnail('large');
									echo '</a>';
								}
							echo '</div>';
							echo '<h3 class="portfolio-headline"  ><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>';
							echo '<h4>' .  get_field('item_medium') . '</h4>';
						echo '</article>';
					}
					
				} else {
					// no posts found
				}
	wp_reset_postdata(); 
?>
	<div class="columns large-8 small-12 medium-12 cta-card-wrapper " style="background-image:url('<?php the_field('cta_background_image'); ?>')">
		<div class=" cta-card " >
			<div class="cta-card-inner">
				<div class="cta-text-content">
					<a href="<?php the_field('cta_button_page_link_'); ?>" ><?php the_field('cta_text'); ?></a>
					<a href="<?php the_field('cta_button_page_link_');
						?>" class="button  secondary"><?php the_field('cta_button_text'); ?></a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="page-section shop-feed clearfix "> <!--shop section -->
	<div class="shop-feed-inner">
		<div class="shop-headline-wrapper">
			<h2 class="shop-headline" >From the Shop</h2>
		</div>
		<?php echo do_shortcode('[recent_products per_page="3" columns="3"]');?>

		<div class="row ">
			<div class="columns shop-cta  " >
				<div class="cta-card__simple" >	
					<a href="<?php the_field('cta_button_page_link_');?>" >
						<div class="cta-card__simple-inner">
							<?php the_field('shop_cta_text'); ?>
							<span class="button secondary "><?php the_field('shop_cta_button_text'); ?></span>
						</div>
					</a>
				</div>
			</div>
		</div>
</section>