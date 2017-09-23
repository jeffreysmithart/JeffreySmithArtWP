
<?php 
while (have_posts()) : the_post(); 

if (is_home() && !is_paged()){

if (isset($featured_count) && $featured_count == 0 ){ ?>
	<article class="featured-post">


				<div class="row align-middle">
				<?php 
				echo '<div class="medium-6 small-12 columns"><div class="featured-post-text"><h2><a href="' . get_the_permalink() . '">'. get_the_title() . '</a></h2><a href="'. get_the_permalink() . '" class="read-more-link">Read More</a></div></div>';
						if ( has_post_thumbnail() ) {
							echo '<div class="medium-6 small-12 columns"><a href="' . get_the_permalink() . '"><div class="featured-post-media">';
								the_post_thumbnail("large");
								echo '</a></div></div>';
							} 
						
				?>

		</div>
	</article>

<?php 
$featured_count = 1;

} else {  

if (isset($count) && $count === "first"){ ?>
<div class="row">
<div class="columns small-12 medium-12 large-12 portfolio-items-wrapper ">
<section class="row">

<?php $count = "notfirst"; ?>
<?php  } ?>

<article class="small-12 medium-6 large-4 column post-listing-square post-card">
<?php 
if ( has_post_thumbnail() ) {
				echo '<a href="' . get_the_permalink() . '"><div class="post-listing-image" style="background-image: url(\''. get_the_post_thumbnail_url() . '\');">';
					echo '<div class="post-text-content ">';
					echo '<div class="post-category">';

						$categories = get_the_category();
			 
						if ( ! empty( $categories ) ) {
						    echo esc_html( $categories[0]->name );   
						}
						echo '</div>';
					echo '<h2 class="post-headline">' . get_the_title() . '</h2></div>';
					echo '</div>';
					echo '</a>';
			} else {
				echo '<a href="' . get_the_permalink() . '" class="post-test-listing-link"><div>';
	
				echo '<h2 class="post-text-listing">'. get_the_title() . '</h2></div></a>';
			}



?>
</article>
<?php } ?>
<?php } else {?>

<?php
if (isset($count) && $count === "first"){ ?>
<div class="row">
<div class="columns small-12 medium-12 large-12 portfolio-items-wrapper ">
<section class="row">

<?php $count = "notfirst"; ?>
<?php  } ?>


<article class="small-12 medium-6 large-4 column post-listing-square post-card">
<?php 
if ( has_post_thumbnail() ) {
				echo '<a href="' . get_the_permalink() . '"><div class="post-listing-image" style="background-image: url(\''. get_the_post_thumbnail_url() . '\');">';
					echo '<div class="post-text-content ">';
					echo '<div class="post-category">';

						$categories = get_the_category();
			 
						if ( ! empty( $categories ) ) {
						    echo esc_html( $categories[0]->name );   
						}
						echo '</div>';
					echo '<h2 class="post-headline">' . get_the_title() . '</h2></div>';
					echo '</div>';
					echo '</a>';
			} else {
				echo '<a href="' . get_the_permalink() . '" class="post-test-listing-link"><div>';
	
				echo '<h2 class="post-text-listing">'. get_the_title() . '</h2></div></a>';
			}



?>
</article>


	<?php 
	
} 

	endwhile; 
	?>

	
	</section>
	</div>
	</div>
	

