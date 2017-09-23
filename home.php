<section class="page-section blog-index">
	<?php
		if( is_home() && !is_paged() ) {
			global $query_string;
			query_posts( $query_string . '&posts_per_page=12' );
		}
		
		$featured_count = 0;
		$secondary_count = 0;
		$big_count = 0;
		$row_count = 0;
		include( locate_template( 'templates/content-page-blog-landing.php'));
		$featured_count = 1;
		
		?>
 
</section>

<section class="row post-nav align-center ">
	<div class="shrink columns">
		<?php $args= ['show_all'=> false, 'mid_size'=> 3,'prev_text'=> __('← Previous'),'next_text'=> __('Next →'),]; echo paginate_links( $args ); ?>
		
		<!-- <?php //wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?> -->

	</div>
</section>


