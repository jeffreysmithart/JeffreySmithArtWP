<?php
/**
 * Template Name: Portfolio Template
 */
?>


	<?php while (have_posts()) : the_post(); ?>  
	  <?php get_template_part('templates/content', 'page-portfolio-facet'); ?>
	<?php endwhile; ?>
