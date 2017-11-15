<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

?>
<?php get_template_part('templates/page', 'header'); ?>
<section class="page-section">

<div class="row align-middle filtering">
			<div class="column filtering__results"><?php echo do_shortcode('[facetwp selections="true"]'); ?>
			</div>
			<div class="column filtering__sort">
				<?php echo do_shortcode('[facetwp sort="true"]'); ?>
			</div>
			<div class="column filtering__sort">
				<?php echo do_shortcode('[facetwp per_page="true"]'); ?>
			</div>
			<div class="column filtering__results">
				<span>Showing <?php echo do_shortcode('[facetwp counts="true"]' ); ?> results</span>
			</div>
			
		</div>

    <div class="expanded button-group show-for-small-only"><!-- mobile filter and sort -->
        <a class="button filter" id="button-filer" type="button" data-filter="controls-filter">Filter</a>
    </div>





	<?php
        /**
         * woocommerce_before_main_content hook.
         *
         * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
         * @hooked woocommerce_breadcrumb - 20
         * @hooked WC_Structured_Data::generate_website_data() - 30
         */
		do_action( 'woocommerce_before_main_content' );
	?>

    <header class="woocommerce-products-header">

        <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

            <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>

        <?php endif; ?>

        <?php
        /**
         * woocommerce_archive_description hook.
         *
         * @hooked woocommerce_taxonomy_archive_description - 10
         * @hooked woocommerce_product_archive_description - 10
         */
        do_action( 'woocommerce_archive_description' );
        ?>

    </header>

    <div class="fascetwp-template">

        <?php if ( have_posts() ) : ?>
			<div class="row woo-shop-wrapper">
			
			<div class="column medium-3 small-order-2 medium-order-1 small-12 shop-filter">
			<?php
                /**
                 * woocommerce_before_shop_loop hook.
                 *
                 * @hooked wc_print_notices - 10
                 * @hooked woocommerce_result_count - 20
                 * @hooked woocommerce_catalog_ordering - 30
                 */
				do_action( 'woocommerce_before_shop_loop' );
			?>
				<div class="shop-taxonomy">
					<?php
					/**
					 * woocommerce_sidebar hook.
					 *
					 * @hooked woocommerce_get_sidebar - 10
					 */?>
                    <div class="control-pane controls-filter" id="controls-filter" >
					<button class="close-button hide-for-medium" data-close aria-label="Close Accessible Modal" type="button">
		      			<span aria-hidden="true">&times;</span>
	      			</button>
                <?php
					dynamic_sidebar('sidebar-primary');
				?>
                    </div>
				</div>
		</div>
			<div class="medium-9 small-12 column small-order-1 medium-order-2">

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<div class=" porfolio-fascet-nav">
			
				<div class="post-navigation text-center">
					
					<?php echo do_shortcode('[facetwp pager="true"]' ); ?>
				</div>
	
	
		</div>

			</div>
			</div>

			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>
</div>
	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>



</section>


