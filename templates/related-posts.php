<?php
//for use in the loop, list 2 post titles related to first tag on current post

if (is_singular('portfolio')){
    $tags = wp_get_post_terms($post->ID, 'portfolio-tags', array("fields" => "all"));
} else {
    $tags = wp_get_post_tags($post->ID);
}
if ($tags) {

    $first_tag = $tags[0]->term_id;
    $first_tag_obj = get_term( $first_tag);
    $first_tag_name = $first_tag_obj->slug;
    if (is_singular('portfolio')){

        $args=array(
            'post__not_in' => array($post->ID),
            'posts_per_page'=>2,
            'post_type' => 'portfolio',
            'orderby' => 'rand',
            'tax_query' => array(
                array(
                    'taxonomy' => 'portfolio-tags',
                    'field'    => 'term_id',
                    'terms'    => $first_tag,
                ),
            ),
        );

    } else {
        $args=array(
            'tag__in' => array($first_tag),
            'post__not_in' => array($post->ID),
            'posts_per_page'=>2,
            'post_type' => 'post',
        );
    }


    $my_query = new WP_Query($args);
    if( $my_query->have_posts() ) {
        echo '<h3 class="section-headline constrain">Related </h3>';
        echo '<div class="related-posts constrain">';
        while ($my_query->have_posts()) : $my_query->the_post(); ?>
            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
                <div class="related-posts__post" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
                <div class="related-posts__text-content">
                    <div class="post-category"><?php echo $first_tag_name; ?></div>
                    <h2><?php the_title(); ?></h2>
                </div>
            </div>
            </a>

            <?php
        endwhile;
        echo '</div>';
    }
    wp_reset_query();
}
?>
