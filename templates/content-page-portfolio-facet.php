<section class="page-section ">

		<div class="row align-middle filtering">
			<div class="column filtering__results"><?php echo do_shortcode('[facetwp selections="true"]'); ?>
			</div>
			<div class="column filtering__sort">
				<?php echo do_shortcode('[facetwp sort="true"]'); ?>
			</div>
			<div class="column filtering__sort">
				<?php echo do_shortcode('[facetwp per_page="true"]'); ?>
			</div>
			<div class="column filtering__results">
				<span>Showing <?php echo do_shortcode('[facetwp counts="true"]' ); ?> results</span>
			</div>
			
		</div>

	<div class="row align-center">
		<aside class="column small-12 medium-4 small-centered  large-3  ">
		<div class="portfolio-selector-wrapper">
			
				
				<div class="expanded button-group show-for-small-only"><!-- mobile filter and sort -->
					<a class="button filter" id="button-filer" type="button" data-filter="controls-filter">Filter</a>
<!--					<a class="button  filter" id="button-sort" type="button" data-filter="controls-sort">Sort</a>-->
				</div>

				<div class="control-pane controls-filter" id="controls-filter" >
					<button class="close-button hide-for-medium" data-close aria-label="Close Accessible Modal" type="button">
		      			<span aria-hidden="true">&times;</span>
	      			</button>
				<h3 class="section-headline">Medium</h3>
				<?php echo do_shortcode('[facetwp facet="categories"]'); ?>
				<h3 class="section-headline">Genre</h3>
				<?php echo do_shortcode('[facetwp facet="genre"]'); ?>
				<h3 class="section-headline">Tags</h3>
				<?php echo do_shortcode('[facetwp facet="portfolio_tags"]'); ?>
                <h3 class="section-headline">Color</h3>
                <?php echo do_shortcode('[facetwp facet="porfolio_color"]'); ?>
				</div>

				<div class="control-pane controls-sort" id="controls-sort" >
				<button class="close-button hide-for-medium" data-close aria-label="Close Accessible Modal" type="button">
                      <span aria-hidden="true">&times;</span>
                  </button>
						
				</div>


		</div>

		

		</aside>


		<div class="columns small-12 large-9 medium-8  portfolio-grid-wrapper">
			

        <?php
			$my_id = 2;
			$post_id_5369 = get_post($my_id);
			$content = $post_id_5369->post_content;
			$content = apply_filters('the_content', $content);
			$content = str_replace(']]>', ']]>', $content);
			echo $content;
			?>



		<div class=" porfolio-fascet-nav">
			
				<div class="post-navigation text-center">
					
					<?php echo do_shortcode('[facetwp pager="true"]' ); ?>
				</div>
	
	
		</div>
			
	</div>
</section>
			
<?php	wp_reset_postdata();?>
			

