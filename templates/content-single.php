<?php
  while (have_posts()) : the_post(); ?>
  
  <article <?php post_class(); ?>>
    <div class="row align-center">
      <div class="small-10 medium-8 column">
        <header class="post-title">
          <h1 class="entry-title"><?php the_title(); ?></h1>
        </header>
      </div>
    </div>
    <?php
    if ( has_post_thumbnail() ) {
      echo '<div class="row column"><div class="featured-image-wrapper">';
        the_post_thumbnail("full");
      echo '</div></div>';
      }
      ?>
    <div class="entry-content post-content">
       <div class="main-content">
        <div class="row align-center">
          <div class="small-10 medium-8 column">
          <?php the_content(); ?>
        </div>
      </div>
      </div>
      <?php get_template_part('templates/flexible', 'layouts'); ?>
    </div>

    <footer class="post-footer">
        <?php get_template_part('templates/social-share'); ?>
        <div class="meta-tags page-module__large">
            <h5>posted in:
            <?php the_category( ' / ' );?>
            </h5>
            <h5>
               <?php the_tags(); ?>
            </h5>
        </div>
        <div class="text-left">
            <div class="row align-center">
                <div class="columns large-8">
                    <?php comments_template('/templates/comments.php'); ?>
                </div>
            </div>
        </div>
        <div class="page-module__large">

                <?php get_template_part('/templates/related-posts'); ?>

        </div>
    </footer>


  </article>
  
<?php endwhile; ?>

