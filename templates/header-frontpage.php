<?php if (is_front_page()){ ?>
<div class="header-background" <?php if (get_field('accent_background_color')){
  echo'style="background-color:' . get_field('accent_background_color') . '"';
  } ?>>
<?php } ?>
  <header>
    <div class="row">
      <div class="site-logo-wrapper columns">
        <?php if (is_front_page()){ echo '<h1 class="site-logo-headline">'; }?><a class="brand site-logo" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a><?php if (is_front_page()){ echo '</h1>'; }?>
      </div>
    </div>
    <div class="title-bar" data-responsive-toggle="example-menu" data-hide-for="medium">
      <button class="menu-icon" type="button" data-toggle>
      <div class="title-bar-title"></div>
      </button>
    </div>
    <div class="top-bar" id="example-menu">
      <div class="row">
        <div class="top-bar-inner columns main-nav-wrapper">
          <ul class="dropdown vertical medium-horizontal menu main-nav" data-dropdown-menu>
            <?php if (has_nav_menu('primary_navigation')) :?>
            <?php wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'container' => '', 'items_wrap' => '%3$s',]);?>
            <?php endif;?>
          </ul>
        </div>
      </div>
    </div>
  </header>