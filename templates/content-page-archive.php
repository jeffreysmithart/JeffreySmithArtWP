<section class="row align-center" >
<?php 
	$classes = array(
		'columns',
		'small-12',
		'medium-11',
		'large-9',
		'page-section',
	);
 ?>
<article <?php post_class($classes); ?>>
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <hr>
  </header>
  <?php 
    	if ( has_post_thumbnail() ) {
  		echo '<div class="row">';
			echo '<div class="medium-4 small-12 columns"><a href="' . get_the_permalink() . '">';
				the_post_thumbnail("medium");
				echo '</a></div>';
			} 
     ?>
  <div class="entry-summary <?php if ( has_post_thumbnail() ) { echo 'medium-8 small-12 columns'; } ?> ">
    <?php the_excerpt(); ?>
    <a href="<?php the_permalink(); ?>" class="button hollow small">Learn More</a>
  </div>
  <?php if ( has_post_thumbnail() ) { echo '</div>'; } ?>
</article>
</section>
<!-- <div><?php //the_content( ); ?></div> -->