<section class="page-section">
	<div class="row align-center">
		<div class="columns small-11 large-9 medium-11">
	<?php
		if ( has_post_thumbnail() ) {?>
			<section class="featured-image-page">
					<?php the_post_thumbnail(); ?>
			</section>
		<?php } ?>
			<?php the_content(); ?>
			<?php get_template_part('templates/repeater', 'layout-portfolio-items'); ?>
			<?php get_template_part('templates/flexible', 'layouts'); ?>
			<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
		</div>
	</div>
</section>