<?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) {
    echo '<div class="social-share';
    if (is_singular('product')){
        echo ' social-share__prouct-single';
    }
    echo '"><h4 class="social-share__headline">Share this</h4>';
    ADDTOANY_SHARE_SAVE_KIT( array( 'use_current_page' => true ) );
    echo '</div>';
} ?>