<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->

    <div class="off-canvas-wrapper">
    <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>

      <?php get_template_part('templates/offcanvas'); ?>

    <div class="off-canvas-content" data-off-canvas-content>
    <?php
      do_action('get_header');
      get_template_part('templates/header');//logo and main nav
 

      if ( is_front_page() ){
        get_template_part('templates/page', 'header-frontpage');
      } elseif (is_page() ) {
        get_template_part('templates/page', 'header');
      }
    ?>
    <div class="wrap container" role="document">
      <div class="content <?php if (! is_front_page() ){ ?>    large-collapse<?php } ?>" >
        <main class="main  <?php if (! is_front_page() && ! is_home() ){ ?><?php } ?>">
          <?php include Wrapper\template_path(); ?>
        </main><!-- /.main -->
        <?php if (Setup\display_sidebar()) : ?>
          <aside class="sidebar small-3 columns">
          <div class="page-section">
            <?php include Wrapper\sidebar_path(); ?>
            </div>
          </aside><!-- /.sidebar -->
        <?php endif; ?>
      </div><!-- /.content -->
    </div><!-- /.wrap -->


    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>
    </div>
    </div>
    </div>
  </body>
</html>
