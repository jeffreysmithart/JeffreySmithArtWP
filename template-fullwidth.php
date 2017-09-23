<?php
/**
 * Template Name: Full width Template
 */
?>


	<?php while (have_posts()) : the_post(); ?>
	  
	  <?php get_template_part('templates/content', 'page-fullwidth'); ?>
	<?php endwhile; ?>
