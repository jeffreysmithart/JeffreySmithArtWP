<header class="global-header">
<div class="global-header--inner">
  <div class=" row medium-collapse align-middle" >
    <div class="columns medium-12 large-4" data-equalizer-watch>
      <div class="site-logo-wrapper">
        <div class="site-logo-headline"><a class="brand site-logo" href="<?= esc_url(home_url('/')); ?>">
          <?php require_once('logo.php'); ?>
        </a></div>
        
        <button type="button" class="button small secondary show-for-small-only menu-trigger" data-toggle="offCanvas">Menu</button>
      </div>
      </div><!-- /.column -->
      
      <div class="columns medium-12 large-8 hide-for-small-only" data-equalizer-watch>
        <div class=" hide-for-small-only row columns main-nav-wrapper">
          <ul class="medium-horizontal menu main-nav " >
            <?php if (has_nav_menu('primary_navigation')) :?>
            <?php wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'container' => '', 'items_wrap' => '%3$s',]);?>
            <?php endif;?>
            <li>
              <a data-open="searchBox" class="search-trigger">Search</a>
            </li>
          </ul>
        </div>
        </div><!--  /.column -->
        </div><!-- /.row -->
        </div><!-- /.global-header--inner -->
        <?php
            if ( !is_front_page()  && !is_archive() && ( is_subpage() || is_single() ) ) {
                get_template_part('templates/header', 'breadcrumbs');
            }
        ?>
      </header>
      <!-- reveal search box -->
      <div class="reveal" id="searchBox" aria-labelledby="searchBox" data-reveal data-h-offset="300" >
        <?php  dynamic_sidebar('sidebar-search');?>
        <button class="close-button" data-close aria-label="Close Accessible Modal" type="button">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>