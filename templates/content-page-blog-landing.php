
<?php 
while (have_posts()) : the_post(); 



if (isset($featured_count) && $featured_count == 0 ){ ?>
<div class="row align-stretch">
	<article class="column align-self-stretch small-12 medium-6 post-listing-square post-card">
		<?php 
		if ( has_post_thumbnail() ) {
						echo '<a href="' . get_the_permalink() . '" class="white"><div class="post-listing-image" style="background-image: url(\''. get_the_post_thumbnail_url() . '\');">';
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
			}?>
	</article>

	<?php $featured_count = 1; ?>

	<div class="column medium-6 small-12">
	<div class="row "><!-- start -->


	<?php } elseif(isset($secondary_count) && $secondary_count <= 1 ) { ?>
	
		<article class="column small-12 post-listing-square post-card">
<?php 
if ( has_post_thumbnail() ) {
				echo '<a href="' . get_the_permalink() . '"  class="white"><div class="post-listing-image" style="background-image: url(\''. get_the_post_thumbnail_url() . '\');">';
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


		<?php $secondary_count++; ?>
		<?php if ( $secondary_count == 2 ){
						echo '</div></div></div><div class="row post-card-triple-row">';
					}

				} elseif ($row_count <= 2 )  {?>
					





<article class="small-12 medium-6 large-4 column post-listing-square post-card">
<?php 
if ( has_post_thumbnail() ) {
				echo '<a href="' . get_the_permalink() . '" class="white"><div class="post-listing-image" style="background-image: url(\''. get_the_post_thumbnail_url() . '\');">';
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

<?php $row_count++; ?>

<?php } elseif ($big_count <= 0 ) {?>
</div><div class="row ">

<article class="small-12  column post-listing-square post-card post-card-large">
<?php 
if ( has_post_thumbnail() ) {
				echo '<a href="' . get_the_permalink() . '" class="white"><div class="post-listing-image" style="background-image: url(\''. get_the_post_thumbnail_url() . '\');">';
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
</div>
<div class="row post-card-triple-row">

<?php $big_count++;
$row_count = 0;?>


<?php 
	
} 

	endwhile; 
	?>


	
	

