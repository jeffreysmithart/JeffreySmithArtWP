<?php 

/*
*  Loop through a Flexible Content field and display it's content with different views for different layouts
*/

while(the_flexible_field("layout_selector")): ?>
<div class="flexible-content">
	<div class="row align-center">
    <div class="column">

	<?php if(get_row_layout() == "big_image"): ?>
		
		<div class="post-big-image post-section">

			<?php if (get_sub_field("big_image_img")) { ?>
				<?php 

					$image = get_sub_field('big_image_img');
					
					if( !empty($image) ): 

						// vars
						$url = $image['url'];
						$title = $image['title'];
						$alt = $image['alt'];
						$caption = $image['caption'];

						// full
						$size = 'large';
						$thumb = $image['sizes'][ $size ];
						$width = $image['sizes'][ $size . '-width' ];
						$height = $image['sizes'][ $size . '-height' ];

						if( $caption ): ?>

							<div class="wp-caption">

						<?php endif; ?>

						<a href="<?php echo $url; ?>" title="<?php echo $title; ?>">

							<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />

						</a>

						<?php if( $caption ): ?>

								<p class="wp-caption-text"><?php echo $caption; ?></p>

							</div>

						<?php endif; ?>

					<?php endif; ?>


			<?php } ?>
		</div>

	<?php elseif(get_row_layout() == "full_width_rich_text"): ?>
		
		<div class="post-full-width-text post-section">

		<?php if(get_sub_field('narrow_wrapper') ) : ?>
			<div class="row align-center">
			<div class="column large-8  medium-11  small-12">
		<?php endif; ?>

			<?php if (get_sub_field("rich_text_area")) { ?>
				<?php the_sub_field("rich_text_area"); ?>
			<?php } ?>

		<?php if(get_sub_field('narrow_wrapper') ) : ?>
			</div>
			</div>
		<?php endif; ?>

		</div>

	<?php elseif(get_row_layout() == "product_listing"): ?>
		<?php if (get_sub_field("product_page")) { ?>
			<div class="post-section  product-callout">
				<div class="product-callout-text-content">
					<h4>This painting is available in the shop</h4>
				<?php
					$myProduct = get_sub_field('product_page');
					$productId = $myProduct->ID;
					$myString = '[add_to_cart id="'. $productId .'" style="border:0 none; padding: 0 0 15px 0;"]';
					echo do_shortcode($myString);
				?>
				</div>
			</div>
	<?php } ?>
	<?php elseif(get_row_layout() == "text_over_image"): ?>
			<?php if (get_sub_field("background_image")) { ?>
			<div class=" post-section row text-over-image-outer">
			<div class="text-over-image small-12 columns" style="background-image: url('<?php the_sub_field('background_image'); ?>');">
				<div class="text-over-image-inner">
				<?php the_sub_field("text_edito"); ?>
				</div>
			</div>
			</div>

			<?php } ?>

		<?php elseif(get_row_layout() == "portfolio_items"): ?>

			<?php include( 'flexible-layout-portfolio-items.php'); ?>


			

	<?php elseif(get_row_layout() == "2_col_rich_text"): ?>
		
		<?php if (get_sub_field("left_col_rich_text")) { ?>
			<div class="row  post-section">
				<div class="columns small-12 medium-6">
					<?php the_sub_field("left_col_rich_text"); ?>
				</div>
				<div class="columns small-12 medium-6">
					<?php the_sub_field("right_col_rich_text"); ?>
				</div>
			</div>
			<?php } ?>

		<?php elseif(get_row_layout() == "image_grid"): ?>
		
		<?php if (get_sub_field("big_image")) { ?>
			<div class="row  post-section collapse image-grid">
				<div class="columns small-6 medium-6">
				<div class="image-grid-image">
					<?php
					$image = get_sub_field('big_image');
					if( !empty($image) ): 
						// vars
						$url = $image['url'];
						$alt = $image['alt'];
						$size = 'bigsquare';
						$thumb = $image['sizes'][ $size ];
						$width = $image['sizes'][ $size . '-width' ];
						$height = $image['sizes'][ $size . '-height' ];?>

							<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
					<?php endif; ?>
				</div>
				</div>
				<div class="columns small-6 medium-6">
				<div class="small-image top image-grid-image">
					<?php
					$image = get_sub_field('small_image_top');
					if( !empty($image) ): 
						// vars
						$url = $image['url'];
						$alt = $image['alt'];
						$size = 'smallsquare';
						$thumb = $image['sizes'][ $size ];
						$width = $image['sizes'][ $size . '-width' ];
						$height = $image['sizes'][ $size . '-height' ];?>

							<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
					<?php endif; ?>
				</div>
				<div class="small-image bottom image-grid-image">
					<?php
					$image = get_sub_field('small_image_bottom');
					if( !empty($image) ): 
						// vars
						$url = $image['url'];
						$alt = $image['alt'];
						$size = 'smallsquare';
						$thumb = $image['sizes'][ $size ];
						$width = $image['sizes'][ $size . '-width' ];
						$height = $image['sizes'][ $size . '-height' ];?>

							<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
					<?php endif; ?>
				</div>
			</div>
			<?php if (get_sub_field('image_grid_caption') ) : ?>
				<p class="grid-caption"><?php the_sub_field('image_grid_caption'); ?></p>
			<?php endif; ?>
			</div>
			<?php } ?>

	<?php endif; ?>
</div>
</div>
</div>
<?php endwhile; ?>