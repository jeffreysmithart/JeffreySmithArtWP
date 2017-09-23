<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;

/**
 * Theme setup
 */
function setup() {
  // Enable features from Soil when plugin is activated
  // https://roots.io/plugins/soil/
  add_theme_support('soil-clean-up');
  add_theme_support('soil-nav-walker');
  add_theme_support('soil-nice-search');
  add_theme_support('soil-jquery-cdn');
  add_theme_support('soil-relative-urls');
  // add_theme_support('soil-google-analytics', 'UA-2555733-1', 'wp_head'); 
  add_theme_support( 'wc-product-gallery-zoom' );
  add_theme_support( 'wc-product-gallery-lightbox' );
  add_theme_support( 'wc-product-gallery-slider' );


  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/sage-translations
  load_theme_textdomain('sage', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus([
    'primary_navigation' => __('Primary Navigation', 'sage'),
    'utility_navigation' => __('Utility Navigation', 'sage'),
  ]);

  // Enable post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');

  add_image_size( 'square', 300, 300, true );
  add_image_size( 'bigsquare', 600, 600, true );
  add_image_size( 'smallsquare', 600, 300, true );
  add_image_size( 'pageheader', 1600, 400, true );
  add_image_size( 'giant', 1600, 9999999, true );

 
  // Enable post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

  // Enable HTML5 markup support
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

  // Use main stylesheet for visual editor
  // To add custom styles edit /assets/styles/layouts/_tinymce.scss
  add_editor_style(Assets\asset_path('styles/main.css'));


  //WooCommerce support
   add_theme_support( 'woocommerce');
}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');






/**
 * Register sidebars
 */
function widgets_init() {
  register_sidebar([
    'name'          => __('Primary', 'sage'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);
  register_sidebar([
    'name'          => __('Footer-top', 'sage'),
    'id'            => 'sidebar-footer-top',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);
  register_sidebar([
    'name'          => __('Footer-left', 'sage'),
    'id'            => 'sidebar-footer-left',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);
  register_sidebar([
    'name'          => __('Footer-right', 'sage'),
    'id'            => 'sidebar-footer-right',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);

  register_sidebar([
    'name'          => __('Footer-bottom', 'sage'),
    'id'            => 'sidebar-footer-bottom',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);
  register_sidebar([
    'name'          => __('Sign up form', 'sage'),
    'id'            => 'sidebar-sign-up',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '',
    'after_title'   => ''
  ]);
  register_sidebar([
    'name'          => __('Search', 'sage'),
    'id'            => 'sidebar-search',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]); 
   register_sidebar([
    'name'          => __('Facet', 'sage'),
    'id'            => 'sidebar-facet',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '',
    'after_title'   => ''
  ]);
}
add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');

/**
 * Determine which pages should NOT display the sidebar
 */
function display_sidebar() {
  static $display;

  isset($display) || $display = !in_array(true, [
    // The sidebar will NOT be displayed if ANY of the following return true.
    // @link https://codex.wordpress.org/Conditional_Tags
    is_404(),
    is_front_page(),
    is_page_template('template-custom.php'),
    is_page_template('template-fullwidth.php'),
    is_page_template('template-portfolio.php'),
    is_home(),
    is_single(),
    is_archive(),
    is_cart(),
    is_checkout(),
    is_product(),
    is_search()

  ]);

  return apply_filters('sage/display_sidebar', $display);
}

/**
 * Theme assets
 */
function assets() {
  wp_enqueue_style('sage/css', Assets\asset_path('styles/main.css'), null, null);

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  if (is_woocommerce() ){
    wp_enqueue_script('customWoo.js', Assets\asset_path('scripts/customWoo.js'), ['jquery'], null, true);
  }
  // if (is_archive() || is_singular('product') ){
  //   wp_enqueue_script('post-ajax.js', Assets\asset_path('scripts/post-ajax.js'), ['jquery'], null, false);
  // }

  // wp_enqueue_script( 'gsap-js', 'http://cdnjs.cloudflare.com/ajax/libs/gsap/1.13.2/TweenMax.min.js', array(), null, true );
  wp_enqueue_script('sage/js', Assets\asset_path('scripts/main.js'), ['jquery'], null, true);
  // wp_enqueue_script('foundation.sticky.js', Assets\asset_path('scripts/foundation.sticky.js'), ['jquery'], null, true);
  // wp_enqueue_script('foundation.util.mediaQuery.js', Assets\asset_path('scripts/foundation.util.mediaQuery.js'), ['jquery'], null, true);
  // wp_enqueue_script('foundation.util.triggers.js', Assets\asset_path('scripts/foundation.util.triggers.js'), ['jquery'], null, true);
  wp_enqueue_script('foundation.min.js', Assets\asset_path('scripts/foundation.min.js'), ['jquery'], null, true);
  // wp_enqueue_script('scrollme', Assets\asset_path('scripts/jquery.scrollme.min.js'), ['jquery'], null, true);
  
}
  

add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);


// function addtoany_add_services( $services ) {
//     $services['example_share_service'] = array(
//         'name'        => 'Example Share Service',
//         'icon_url'    => 'https://www.google.com/favicon.ico',
//         'icon_width'  => 32,
//         'icon_height' => 32,
//         'href'        => 'https://www.example.com/share?url=A2A_LINKURL&title=A2A_LINKNAME'
//     );
//     return $services;
// }
// add_filter( 'A2A_SHARE_SAVE_services', 'addtoany_add_services', 10, 1 );


//[follow me]
function follow_me_func(){

  return' <div class="a2a_kit a2a_kit_size_32 a2a_default_style a2a_follow text-center"><a class="a2a_button_twitter" data-a2a-follow="jeffreysmithart"></a><a class="a2a_button_facebook" data-a2a-follow="jeffrey.smith.1848"></a><a class="a2a_button_instagram" data-a2a-follow="jeffreysmithart"></a><a class="a2a_button_pinterest" data-a2a-follow="jeffreysmithart"></a>
    </div>

    <script async src="//static.addtoany.com/menu/page.js"></script>';

}
add_shortcode( 'follow_me', 'follow_me_func' );

function donatebutton() {
    return '<a href="/donate/" class="donate-button">Donate!</a>';
}
add_shortcode('donate', 'donatebutton');


