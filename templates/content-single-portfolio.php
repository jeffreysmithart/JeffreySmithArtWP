<div class="row collapse">
<div class="column small-12">
<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <?php
      if ( has_post_thumbnail() ) {
        echo '<div class="featured-image-wrapper"';
        if (get_field('accent_background_color')){
        echo  'style="background-color:' . get_field('accent_background_color') .';"';
        }
        echo '>';
          echo '<div class="featured-image-inner">';
            the_post_thumbnail("full");?>
          </div><!-- close featured-image-inner -->
        </div><!-- featured-image-wrapper-->
      </header>
      <?php
      }
      ?>
    <div class="row align-center">
      <div class="small-12 large-11 medium-11 columns portfolio-text">

        <div class="row align-center">
          <div class="medium-4 small-12 columns">
            <h1 class="entry-title featured-title"><span><?php the_title(); ?></span></h1>
              <div class="portfolio-item-meta show-for-medium">
                <h5>
                  <?php echo get_the_term_list( $post->ID, 'portfolio-category', 'posted in:  ', '/', '' ); ?>
                </h5>
                <h5>
                  <?php echo get_the_term_list( $post->ID, 'portfolio-tags', 'tags: ', ',', '' ); ?>
                </h5>
              </div>
          </div>
          <div class="medium-7 large-6 small-12 large-offset-1 columns">
            <div class="entry-content post-content"><!-- item text content -->
              <div class="main-content">
                <?php the_content(); ?>
              </div>
              <?php get_template_part('templates/flexible', 'layouts'); ?>
            </div>
   

    <?php if(get_field('item_title')){ ?><!-- about this painting box -->
      <div class="portfolio-details">
        <h3>About This Painting</h3>
          <?php if (get_field('item_title')){
            echo '<h4>Title: <em>' . get_field('item_title') . '</em></h4>';
            }
            if (get_field('item_medium')){
            echo '<h4>Medium: <em>' . get_field('item_medium') . '</em></h4>';
            }
           if (get_field('item_surface')){
            echo '<h4>Surface: <em>' . get_field('item_surface') . '</em></h4>';
            }
            if (get_field('item_size')){
            echo '<h4>Size: <em>' . get_field('item_size') . '</em></h4>';
            }
         ?>
      </div>
    <?php } ?>

   </div>  
  </div> 

    <footer class="post-footer"> <!-- item meta information -->
      <div class="hide-for-medium">
        <h5>
          <?php echo get_the_term_list( $post->ID, 'portfolio-category', 'posted in:  ', '/', '' ); ?>
        </h5>
        <h6>
          <?php echo get_the_term_list( $post->ID, 'portfolio-tags', 'tags: ', ',', '' ); ?>
        </h6>
      </div>   
    </footer>
    <div class="row align-center">
      <div class="columns medium-12 large-11">
        <?php get_template_part('templates/social-share'); ?> 
      </div>
    </div>


  </article>
  
<?php endwhile; ?>
</div>
</div>
</div>
</div>