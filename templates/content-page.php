<?php the_content(); ?>
<?php get_template_part('templates/repeater', 'layout-portfolio-items'); ?>
<?php get_template_part('templates/flexible', 'layouts'); ?>
<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
