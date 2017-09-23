 
 <div class="off-canvas position-right" id="offCanvas" data-off-canvas data-position="right">
        
        <!-- Close button -->
        <button class="close-button" aria-label="Close menu" type="button" data-close>
          <span aria-hidden="true">&times;</span>
        </button>

        <!-- Menu -->

        <ul class=" vertical menu mobile-nav" data-accordion-menu>
            <?php if (has_nav_menu('primary_navigation')) :?>
            <?php wp_nav_menu(['theme_location' => 'primary_navigation',
                              'menu_class' => 'nav', 'container' => '', 
                              'items_wrap' => '%3$s',]);?>
            <?php endif;?>
          </ul>

     <!-- Search Widget -->
     <div class="row column">
       <?php  dynamic_sidebar('sidebar-search');?>    
     </div>
    
    <div class="social-follow">
    <h3 class="section-headline">Find Me</h3>
     <div class="a2a_kit a2a_kit_size_32 a2a_default_style a2a_follow text-center">
      <a class="a2a_button_facebook" data-a2a-follow="jeffreysmithart"></a><a class="a2a_button_instagram" data-a2a-follow="jeffreysmithart"></a><a class="a2a_button_pinterest" data-a2a-follow="jeffreysmithart"></a>
    </div>
  </div>

    </div>