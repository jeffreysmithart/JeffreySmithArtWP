<?php if( have_rows('portfolio_section') ):?>
	<div class="columns small-12 large-12 medium-12  portfolio-grid-wrapper">
			
			<?php  while ( have_rows('portfolio_section') ) : the_row();	
			if ( get_sub_field('section_title') ){ ?>
				<h3><?php the_sub_field('section_title'); ?></h3>
			<?php } 

		if (get_sub_field('portfolio_category')){
			$cat = get_sub_field('portfolio_category');
		} else {
			$cat = null;
		}

		if (get_sub_field('portfolio_medium')){
			$med = get_sub_field('portfolio_medium');
		} else {
			$med = null;
		}

		
		   
				$args = array(
					'post_type'   => 'portfolio',
					'post_status' => array(
						'publish',
						),

					'tax_query' => array(                     //(array) - use taxonomy parameters (available with Version 3.1).
				    'relation' => 'OR',                   
							array(
					        'taxonomy' => 'portfolio-category',                //(string) - Taxonomy.
					        'field' => 'id',                    //(string) - Select taxonomy term by ('id' or 'slug')
					        'terms' => array( 
					        	$cat
					         ),    
					        'operator' => 'IN'
					      ),
					    // }
					    
				      array(
				        'taxonomy' => 'portfolio-medium',
				        'field' => 'id',
				        'terms' => array( 
				        	$med
				        	),
				        'operator' => 'IN'
				      )
				    ),
					// }
				);

			
			$wp_query = new WP_Query( $args );

				echo '<section class="portfolio-grid ">';
				echo '<div class="row">';


			if ( $wp_query->have_posts() ) : 
				
				while ( $wp_query->have_posts() ) : $wp_query->the_post();?>
				
				
				<div class="columns  medium-6 small-12 large-4 portfolio-grid-item 
				<?php $taxonomy = 'portfolio-tags';
							$tax_terms = get_terms($taxonomy);
							foreach ($tax_terms as $tax_term) {
								 echo $tax_term->name . ' '; } ?> ">
				
					<?php 
					echo '<a href="' . get_the_permalink() . '">';
					if ( has_post_thumbnail() ) {
					echo '<div class="portfolio-grid-item-inner" >';
						the_post_thumbnail("large");
						echo '<h2>' . get_the_title(  ). '</h2>';
						echo '<h4>' .  get_field('item_medium') . '</h4>';
						echo '<p class="learn-more">Learn More</p>';
						echo '</div></a>';
					} ?>

				</div>
			<?php 
			endwhile; 
			endif; 
			?>
			<?php wp_reset_postdata(); ?>
			<?php wp_reset_query(); ?>
			</div>
			</section>
		</div>

	<?php 
	endwhile;
	endif; 
	?>


