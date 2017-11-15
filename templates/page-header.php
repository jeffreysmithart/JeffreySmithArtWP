<?php use Roots\Sage\Titles; ?>


<?php if (is_search() ) : ?>
	<div class="row align-center">
		<div class="small-12 medium-7">
				<div class="page-header"> 
					<h1><?= Titles\title(); ?></h1>
				</div>
			</div>	
		</div>
<?php endif; ?>


<?php

	$image = get_field('page_header_image' );
	if (is_shop()){
        $image = get_field('shop_page_header_image', 'options' );
    }

	if( !empty($image) ) { 

		if (is_page_template('template-portfolio.php') || is_shop()):
		$size = 'pageheader';
	else : 
		$size = 'giant';
	endif;

		$url = $image['sizes'][$size];
?>
		<section class="image-header ">
					<img src="<?php echo $url; ?>" alt="<?php echo $image['alt']; ?>" />
		</section>

	<?php } ?>


<?php
	$headline = null;
	if ( !is_home() &&  !is_post_type_archive() &&  !is_page_template('template-portfolio.php') && !is_tax() ):

		if (get_field('on_page_title' )) : 
			$headline = get_field('on_page_title' );
		else : 
			$headline = get_the_title();
		endif;

		if (is_page()):
			$class_list = 'on_page_title';
		endif;
?>
<?php endif; ?>
<?php if ( $headline !== null) : ?>
	<section class="<?php echo $class_list; ?> row align-center">
		<div class="small-10 medium-8 column text-center">
			<h1 ><?php echo $headline;?></h1>
		</div>
	</section>
<?php endif; ?>
