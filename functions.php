<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
/** Specify whether to load Advanced Custom Fields configuration from wp_posts (true) or a PHP export file (false) */
define( 'USE_LOCAL_ACF_CONFIGURATION', true );

if ( ! defined( 'USE_LOCAL_ACF_CONFIGURATION' ) || ! USE_LOCAL_ACF_CONFIGURATION ) {
  require_once dirname( __FILE__ ) . '/advanced-custom-fields.php';
}




$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php', // Theme customizer
  'lib/fields.php',     // Custom fields
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

add_filter( 'facetwp_is_main_query', function( $is_main_query, $query ) {
    if ( isset( $query->query_vars['facetwp'] ) ) {
        $is_main_query = (bool) $query->query_vars['facetwp'];
    }
    return $is_main_query;
}, 10, 2 );


function hex2rgb($hex) {
    $hex = str_replace("#", "", $hex);

    if(strlen($hex) == 3) {
        $r = hexdec(substr($hex,0,1).substr($hex,0,1));
        $g = hexdec(substr($hex,1,1).substr($hex,1,1));
        $b = hexdec(substr($hex,2,1).substr($hex,2,1));
    } else {
        $r = hexdec(substr($hex,0,2));
        $g = hexdec(substr($hex,2,2));
        $b = hexdec(substr($hex,4,2));
    }
    $rgb = array($r, $g, $b);

    return $rgb; // returns an array with the rgb values
}

// adds is_subpage conditional check
function is_subpage() {
    global $post;                              // load details about this page

    if ( is_page() && $post->post_parent ) {   // test to see if the page has a parent
        return $post->post_parent;             // return the ID of the parent post

    } else {                                   // there is no parent so ...
        return false;                          // ... the answer to the question is false
    }
}



/**
*[follow me] short code
* TODO move to global content and an include via flexible content and ACF
*/
function follow_me_func(){

  return' <div class="a2a_kit a2a_kit_size_32 a2a_default_style a2a_follow text-center"><a class="a2a_button_twitter" data-a2a-follow="jeffreysmithart"></a><a class="a2a_button_facebook" data-a2a-follow="jeffrey.smith.1848"></a><a class="a2a_button_instagram" data-a2a-follow="jeffreysmithart"></a><a class="a2a_button_pinterest" data-a2a-follow="jeffreysmithart"></a>
    </div>

    <script async src="//static.addtoany.com/menu/page.js"></script>';

}
add_shortcode( 'follow_me', 'follow_me_func' );


wp_enqueue_script( 'wp-api' );




// Move Yoast Meta Box to bottom
function yoasttobottom() {
  return 'low';
}

add_filter( 'wpseo_metabox_prio', 'yoasttobottom');




// Active Menu highlighting for cusotm post types

function custom_menu_item_classes($classes = array(), $menu_item = false){
 // $blog_menu_item = get_option( 'page_for_posts' );
  // use this format for removing highlighting
    if( ( is_singular('portfolio') || is_post_type_archive('portfolio') ) && $menu_item->post_title == "Blog") {
      
    $classes = array();
  }
  
  // // use this format for adding highlighting
  //   if((is_singular('portfolio') || is_post_type_archive('portfolio')) && $menu_item->ID == $cpt_menu_item) {
  //   $classes[] = 'active';
  // }
  
  return $classes;
}
add_filter( 'nav_menu_css_class', 'custom_menu_item_classes', 10, 2 );


/* ================================== WooCommerce Modifications below this point ===============================*/


/**
*   Remove each of the WooCommerce styles one by one
*
*/
function jk_dequeue_styles( $enqueue_styles ) {
    unset( $enqueue_styles['woocommerce-general'] );  // Remove the gloss
    unset( $enqueue_styles['woocommerce-layout'] );   // Remove the layout
    unset( $enqueue_styles['woocommerce-smallscreen'] );  // Remove the smallscreen optimisation
    return $enqueue_styles;
}

add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );



/**
 * Manage WooCommerce styles and scripts.
 */
function grd_woocommerce_script_cleaner() {

  // Unless we're in the store, remove all the cruft!
  if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
    // wp_dequeue_style( 'woocommerce-layout' );
    // wp_dequeue_style( 'woocommerce-general');
    // wp_dequeue_style( 'woocommerce-smallscreen' );
    // wp_dequeue_style( 'woocommerce_fancybox_styles' );
    // wp_dequeue_style( 'woocommerce_chosen_styles' );
    // wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
    // wp_dequeue_style( 'select2' );
    wp_dequeue_script( 'wc-add-payment-method' );
    wp_dequeue_script( 'wc-lost-password' );
    wp_dequeue_script( 'wc_price_slider' );
    wp_dequeue_script( 'wc-single-product' );
    wp_dequeue_script( 'wc-add-to-cart' );
    wp_dequeue_script( 'wc-cart-fragments' );
    wp_dequeue_script( 'wc-credit-card-form' );
    wp_dequeue_script( 'wc-checkout' );
    wp_dequeue_script( 'wc-add-to-cart-variation' );
    wp_dequeue_script( 'wc-single-product' );
    wp_dequeue_script( 'wc-cart' );
    wp_dequeue_script( 'wc-chosen' );
    wp_dequeue_script( 'woocommerce' );
    wp_dequeue_script( 'prettyPhoto' );
    wp_dequeue_script( 'prettyPhoto-init' );
    wp_dequeue_script( 'jquery-blockui' );
    wp_dequeue_script( 'jquery-placeholder' );
    wp_dequeue_script( 'jquery-payment' );
    wp_dequeue_script( 'fancybox' );
    wp_dequeue_script( 'jqueryui' );
  } else {
    // wp_dequeue_style( 'woocommerce-layout' );
    // wp_dequeue_style( 'woocommerce-general');
    // wp_dequeue_style( 'woocommerce-smallscreen' );
    // wp_dequeue_style( 'woocommerce_fancybox_styles' );
    // wp_dequeue_style( 'woocommerce_chosen_styles' );
    // wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
    // wp_dequeue_style( 'select2' );
    // wp_dequeue_script( 'wc-add-payment-method' );
    // wp_dequeue_script( 'wc-lost-password' );
    // wp_dequeue_script( 'wc_price_slider' );
    // wp_dequeue_script( 'wc-single-product' );
    // wp_dequeue_script( 'wc-add-to-cart' );
    // wp_dequeue_script( 'wc-cart-fragments' );
    // wp_dequeue_script( 'wc-credit-card-form' );
    // wp_dequeue_script( 'wc-checkout' );
    // wp_dequeue_script( 'wc-add-to-cart-variation' );
    // wp_dequeue_script( 'wc-single-product' );
    // wp_dequeue_script( 'wc-cart' );
    // wp_dequeue_script( 'wc-chosen' );
    // wp_dequeue_script( 'woocommerce' );
    // wp_dequeue_script( 'prettyPhoto' );
    // wp_dequeue_script( 'prettyPhoto-init' );
    // wp_dequeue_script( 'jquery-blockui' );
    // wp_dequeue_script( 'jquery-placeholder' );
    // wp_dequeue_script( 'jquery-payment' );
    // wp_dequeue_script( 'fancybox' );
    // wp_dequeue_script( 'jqueryui' );
  }
}
add_action( 'wp_enqueue_scripts', 'grd_woocommerce_script_cleaner', 99 );




remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);


add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<section id="main" class="woo-wrapper">';
}

function my_theme_wrapper_end() {
  echo '</section>';
}

add_filter( 'woocommerce_show_page_title' , 'JSA_woo_hide_page_title' );
/**
 * Removes the "shop" title on the main shop page
*/
function JSA_woo_hide_page_title() {
  if (is_archive() || is_tax()) {
      return false;
  }
  
}


if (is_archive() || is_tax()) {
add_filter('woocommerce_show_page_title', '__return_false');
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);

}
  
// Remove the generator tag
remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );

//remove WooBreadcrumbs
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);

//remove the default WooCommerce sort and number indicator from the porduct archive sidebar
remove_action( 'woocommerce_before_shop_loop','woocommerce_catalog_ordering', 30, 0);
remove_action( 'woocommerce_before_shop_loop','woocommerce_result_count', 20, 0);

//remove WooCommerce pagination
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination');


/*STEP 1 - REMOVE ADD TO CART BUTTON ON PRODUCT ARCHIVE (SHOP) */

function remove_loop_button(){
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
}
add_action('init','remove_loop_button');



/*STEP 2 -ADD NEW BUTTON THAT LINKS TO PRODUCT PAGE FOR EACH PRODUCT */

add_action('woocommerce_after_shop_loop_item','replace_add_to_cart');
function replace_add_to_cart() {
global $product;
$link = $product->get_permalink();
echo do_shortcode('<a href="'.$link.'" class=" add_to_cart_button">View Painting &rarr;</a>');
}


function woo_related_products_limit() {
  global $product;
  
  $args['posts_per_page'] = 9;
  return $args;
}

add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
  function jk_related_products_args( $args ) {
  $args['posts_per_page'] = 3; // 4 related products
  $args['columns'] = 1; // arranged in 2 columns
  return $args;
}

add_filter( 'woocommerce_product_tabs', 'wcs_woo_remove_reviews_tab', 98 );
function wcs_woo_remove_reviews_tab($tabs) {
 unset($tabs['reviews']);
 return $tabs;
}

//Update prodcut description headline
add_filter('woocommerce_product_description_heading','jsa_product_description_heading');

function jsa_product_description_heading() {
return __('About This Painting', 'woocommerce');
}

//Update related prodcuts headline
add_filter('woocommerce_related_product_heading','jsa_related_product_heading');

function jsa_related_product_heading() {
return __('Related Paintings', 'woocommerce');
}



/*============= WooCommerce Product Listing page ==============================*/
/*
* New markup to support flex box layout out
*/
add_filter('woocommerce_before_shop_loop_item_title', 'JSA_add_new_markup',10);
function JSA_add_new_markup(){
echo '</a><div class="woocommerce-loop-product__product-details">';
}


add_filter('woocommerce_after_shop_loop_item', 'JSA_add_closing_markup', 15);
function JSA_add_closing_markup(){
  echo '</div>';
}


add_filter('woocommerce_before_shop_loop_item_title', 'JSA_add_product_cat');

function JSA_add_product_cat() {
  echo '<div class="shop-category">';
        $taxonomy = 'product_cat';
        $ID = get_the_id();
                $tax_terms = get_the_terms($ID, $taxonomy);
                $loop_count = 1;
                $product_cat_count = sizeof($tax_terms);
                foreach ($tax_terms as $tax_term) {
                  $workingcat = $tax_term->name;
                  if ($loop_count < $product_cat_count) :
                    $hold = $workingcat . ', ';
                    $workingcat = $hold;
                    endif;
                  $loop_count++;
                  echo $workingcat; }
                  
          
      echo '</div>';
}


/*============= WooCommerce Single Product page ==============================*/

/**
 * Remove QUANITY FILED in all product types
 */
function JSA_wc_remove_all_quantity_fields( $return, $product ) {
    return true;
}
add_filter( 'woocommerce_is_sold_individually', 'JSA_wc_remove_all_quantity_fields', 10, 2 );

//remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta' , 40 );
//add_action( 'woocommerce_after_single_product_summary', 'woocommerce_template_single_meta' , 11 );



/*============= WooCommerce Checkout Form  ==============================*/

// Hook in checkout form TO REMOVE COMPANY AND PHONE FILEDS
add_filter( 'woocommerce_checkout_fields' , 'JSA_custom_override_checkout_fields' );

// Our checkout form function - $fields is passed via the filter!
function JSA_custom_override_checkout_fields( $fields ) {
     unset($fields['billing']['billing_phone']);
     unset($fields['billing']['billing_company']);
     unset($fields['shipping']['shipping_phone']);
     unset($fields['shipping']['shipping_company']);

     return $fields;
}




