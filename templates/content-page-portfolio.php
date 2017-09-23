<?php 
  // global $wp_query;

  // $med = $wp_query->query_vars['portfolio-medium'];
  // $medium = intval($med);
  // $tag = $wp_query->query_vars['portfolio-tags'];
  // $tags = intval($tag);
  // $cat = $wp_query->query_vars['portfolio-category'];
  // $cats = intval($cat);

  // $medium = get_query_var('portfolio-medium');
  // $tags = get_query_var('portfolio-tags');
  // $cats = get_query_var('portfolio-category');
  // var_dump($medium);
  // var_dump($tags);
  // var_dump($cats);
  ?>

<section class="page-section">


<?php 

 $args = array(
	'show_option_all'    => 'all genres',
	'show_option_none'   => '',
	'option_none_value'  => '-1',
	'orderby'            => 'ID', 
	'order'              => 'ASC',
	'show_count'         => 0,
	'hide_empty'         => true, 
	'child_of'           => 0,
	'exclude'            => '',
	'echo'               => 1,
	'selected'           => 0,
	'hierarchical'       => 0, 
	'name'               => 'portfolio-category',
	'id'                 => 'portfolio-category',
	'class'              => 'postform',
	'depth'              => 0,
	'tab_index'          => 0,
	'taxonomy'           => 'portfolio-category',
	'hide_if_empty'      => true,
	'value_field'	     => 'term_id',	
);
 ?>
 <?php 
 $args_2 = array(
	'show_option_all'    => 'all tags',
	'show_option_none'   => '',
	'option_none_value'  => '-1',
	'orderby'            => 'ID', 
	'order'              => 'ASC',
	'show_count'         => 0,
	'hide_empty'         => true, 
	'child_of'           => 0,
	'exclude'            => '',
	'echo'               => 1,
	'selected'           => 0,
	'hierarchical'       => 0, 
	'name'               => 'portfolio-tags',
	'id'                 => 'portfolio-tags',
	'class'              => 'postform',
	'depth'              => 0,
	'tab_index'          => 0,
	'taxonomy'           => 'portfolio-tags',
	'hide_if_empty'      => true,
	'value_field'	     => 'term_id',	
);
 ?>
 <?php 
 $args_3 = array(
	'show_option_all'    => 'all medium',
	'show_option_none'   => '',
	'option_none_value'  => '-1',
	'orderby'            => 'ID', 
	'order'              => 'ASC',
	'show_count'         => 0,
	'hide_empty'         => true, 
	'child_of'           => 0,
	'exclude'            => '',
	'echo'               => 1,
	'selected'           => 0,
	'hierarchical'       => 0, 
	'name'               => 'portfolio-medium',
	'id'                 => 'portfolio-medium',
	'class'              => 'postform',
	'depth'              => 0,
	'tab_index'          => 0,
	'taxonomy'           => 'portfolio-medium',
	'hide_if_empty'      => true,
	'value_field'	     => 'term_id',	
);
 ?>



	<div class="row align-center">
		<div class="column small-10 medium-10 medium-centered  small-centered large-3 large-order-2 portfolio-selector-wrapper">
		<h3 class="section-headline">Filters</h3>
		<h4 class="portfolio-selector">
		I want to see  
		<?php wp_dropdown_categories( $args ); ?>,  painted with <?php wp_dropdown_categories( $args_3 ); ?> and tagged with 

		<?php wp_dropdown_categories( $args_2 ); ?>.</h4>


		</div>

		<div class="columns small-12 large-9 medium-12  portfolio-grid-wrapper">
			<div id="loader"></div>
			
		<?php 	
			
			 global $wp_query, $paged;

		    if( get_query_var('paged') ) {
		        $paged = get_query_var('paged');
		    }else if ( get_query_var('page') ) {
		        $paged = get_query_var('page');
		    }else{
		        $paged = 1;
		    }
		    
				$args = array(
					'post_type'   => 'portfolio',
					'post_status' => array(
						'publish',
						),
					// 'posts_per_page'         => 9,
					'paged' => $paged,
				);

			$count = 0;
			$wp_query = new WP_Query( $args );

				echo '<section class="portfolio-grid ">';
				echo '<div class="row facetwp-template">';

			if ( $wp_query->have_posts() ) : 
				
				while ( $wp_query->have_posts() ) : $wp_query->the_post();
				
				if ($count % 2 == 0){ ?>
				<div class="columns  medium-6 small-12 portfolio-grid-item 
				<?php $taxonomy = 'portfolio-tags';
							$tax_terms = get_terms($taxonomy);
							foreach ($tax_terms as $tax_term) {
								 echo $tax_term->name . ' '; } 


					?> 
					" >
				<?php } else { ?>
				<div class="columns  medium-6 small-12 portfolio-grid-item 
				<?php $taxonomy = 'portfolio-tags';
							$tax_terms = get_terms($taxonomy);
							foreach ($tax_terms as $tax_term) {
								 echo $tax_term->name . ' '; } ?> ">
				<?php } ?>
					<?php 
					echo '<a href="' . get_the_permalink() . '">';
					if ( has_post_thumbnail() ) {
					echo '<div class="portfolio-grid-item-inner"';
					 if (get_field('accent_background_color')){
			      echo  'style="background-color:' . get_field('accent_background_color') .';"';
			      }
					echo '>';
						the_post_thumbnail("large");
						echo '<h2>' . get_the_title(  ). '</h2>';
						echo '<h4>' .  get_field('item_medium') . '</h4>';
						echo '<p class="learn-more">Learn More</p>';
						echo '</div></a>';
					} 
					

			 ?>
				</div>
			<?php 
			$count++;
			endwhile; ?>
			<!-- post navigation -->
			<?php else: ?>
			<!-- no posts found -->
			</div>
			</section>
			<?php endif; 
				wp_reset_postdata();
			?>
			
			
		</div>
	</div>
	</div>

	
		
		
	<?php
			 
		 	echo '<div class="row><div class="small-12"><nav class="navigation posts-navigation" role="navigation"><div class="nav-links">';
			 
			 next_posts_link();
			 previous_posts_link();
		  
			 	echo '</div></div></nav>';
			 
			 ?>

</section>


