/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages



        // TweenMax.fromTo( jQuery('.site-logo-wrapper'), 0.5, {alpha: 0}, {delay: 0, alpha: 1, ease: Power2.easeOut});
        // TweenMax.fromTo( jQuery('.site-logo-headline'), 0.5, {alpha: 0, x:"20px"}, {delay: 0.25, x:"0", alpha: 1, ease: Power2.easeOut});
        // TweenMax.fromTo( jQuery('.top-bar'), 0.5, {alpha: 0,x:"20px"}, {delay: 0.5,  x:"0", alpha: 1, ease: Power2.easeOut});
        // TweenMax.fromTo( jQuery('#breadcrumbs'), 0.5, {alpha: 0}, {delay: 0.5, alpha: 1, ease: Power2.easeOut});
        // TweenMax.fromTo( jQuery('.image-header img'), 0.75, {alpha: 0,  x:"-50px"}, {delay: 0.75,  x:"0",alpha: 1,  ease: Power2.easeOut, onComplete: function(){ jQuery('.image-header img').css('transform', 'initial'); } });

        // if ( jQuery('body').hasClass('page') && !jQuery('body').hasClass('home') ) {
        //   // TweenMax.fromTo( jQuery('.on-page-title'), 0.75, {alpha: 0,  y:"50px"}, {delay: 0.75,  y:"0",alpha: 1,  ease: Power2.easeOut, onComplete: function(){ jQuery('.on-page-title').css('transform', 'initial'); } });
        //   TweenMax.fromTo( jQuery('.on-page-title'), 0.75, {alpha: 0,  y:"0"}, {delay: 0.75,  y:"-100px",alpha: 1,  ease: Power2.easeOut  });
        //   TweenMax.fromTo( jQuery('main.main'), 0.75, {alpha: 0,  y:"50px"}, {delay: 0.75,  y:"0",alpha: 1,  ease: Power2.easeOut });
        // }

        // if (jQuery('.single article.post').length > 0) {
        //   TweenMax.fromTo( jQuery('.single article.post'), 0.75, {alpha: 0,  y:"100px"}, {delay: 0.25,  y:"0",alpha: 1,  ease: Power2.easeOut});
        //   TweenMax.fromTo( jQuery('.single article.post .featured-image-wrapper'), 0.75, {alpha: 0,  y:"25px"}, {delay: 0.35,  y:"0",alpha: 1,  ease: Power2.easeOut});
        //   TweenMax.fromTo( jQuery('.single article.post .main-content'), 0.75, {alpha: 0,  y:"50px"}, {delay: 0.45,  y:"0",alpha: 1,  ease: Power2.easeOut});
        // }

        // if (jQuery('.single .featured-image-inner').length > 0) {
        //   TweenMax.fromTo( jQuery('.featured-image-inner'), 0.75, {alpha: 0,  y:"50px"}, {delay: 0.25,  y:"0",alpha: 1,  ease: Power2.easeOut , onComplete: function(){ jQuery('.featured-image-inner').css('transform', 'initial'); }});
        //   TweenMax.fromTo( jQuery('.featured-image-wrapper'), 0.75, {alpha: 0,  y:"50px"}, {delay: 0.25,  y:"0",alpha: 1,  ease: Power2.easeOut , onComplete: function(){ jQuery('.featured-image-wrapper').css('transform', 'initial'); } });
        //   TweenMax.fromTo( jQuery('.featured-image-inner img '), 0.75, {alpha: 0,  y:"50px"}, {delay: 0.55,  y:"0",alpha: 1,  ease: Power2.easeOut});
        // }

        

        // if (jQuery('body').hasClass('blog') ) {
        //   TweenMax.fromTo( jQuery('.featured-post .medium-4 h2'), 0.75, {alpha: 0, y:"50px"}, {delay: 0.50, alpha: 1, y:"0", ease: Power2.easeOut});
        //    TweenMax.fromTo( jQuery('.featured-post .read-more-link'), 0.75, {alpha: 0, y:"50px"}, {delay: 0.75, alpha: 1, y:"0", ease: Power2.easeOut});
        // TweenMax.fromTo( jQuery('.featured-post .medium-8'), 0.75, {alpha: 0, y:"50px"}, {delay: 0.25, alpha: 1, y:"0", ease: Power2.easeOut});
        // }


        // $(document).foundation(); // Foundation JavaScript
        
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
        // TweenMax.fromTo( jQuery('.about-card h3'), 0.75, {alpha: 0, y:"50px"}, {delay: 0.6, alpha: 1, y:"0", ease: Power2.easeOut});
        // TweenMax.fromTo( jQuery('.about-card .button'), 0.75, {alpha: 0, y:"50px"}, {delay: 0.7, alpha: 1, y:"0", ease: Power2.easeOut});
        // TweenMax.fromTo( jQuery('.featured-painting'), 0.75, {alpha: 0, y:"50px"}, {delay: 0.5, alpha: 1, y:"0", ease: Power2.easeOut});
        // TweenMax.fromTo( jQuery('.page-header'), 0.75, {alpha: 0,  x:"-50px"}, {delay: 0,  x:"0",alpha: 1,  ease: Power2.easeOut});
     
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS

      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);


//   showElementsInView(){ 
//   console.log( "show elements in view" );

//   var docViewTop      = $(window).scrollTop();
//   var docViewBottom   = docViewTop + $(window).height();
//   var elemTop         = null;
//   var $currentElement = null;
//   var $bodyElements   = null;

//   for( var i = 0; i < $bodyElements.length; i++ ) {
//     $currentElement = $bodyElements[i];
//     elemTop = $currentElement.offset().top;

//     if( $currentElement.data('seen') !== 'true' && (elemTop <= docViewBottom) ) {
//       $currentElement.data('seen', 'true');
//       TweenMax.fromTo( $currentElement, 0.9, {opacity: 0, y:"150px"}, { opacity: 1, y: "0px", ease: Power2.easeOut } );
//     }
//   }
// };

})(jQuery); // Fully reference jQuery after this point.



(function($) {
    $(document).on('facetwp-loaded', function() {
      $('.control-pane').removeClass('active');
      var url = document.location.pathname;

      if(document.location.search.length > 0 && url.indexOf("portfolio") >= 0 ) {
    // query string exists
    // console.log("ran");
        // $('.control-pane').removeClass('active');
        $('html, body').animate({
            scrollTop: ($('.facetwp-template').offset().top - 100)
        }, 500);
        } 
    });

})(jQuery);

function  addFilter(){
    jQuery('.filter').each(function(){
      jQuery(this).on('click', function(e){
        e.preventDefault();
        e.stopPropagation();
        var clickAtt = jQuery(this).attr('data-filter');
        console.log(clickAtt);
        jQuery('.control-pane').each(function(){
          if (jQuery(this).hasClass(clickAtt)){
            jQuery(this).toggleClass('active');
            jQuery(this).siblings('.control-pane').removeClass('active');
          }
        });

      });
    });
    jQuery('.controls-sort').on('click', function(e){
      e.stopPropagation();
    });
    jQuery('.control-pane .close-button').on('click', function(){
      jQuery(this).parents('.control-pane').removeClass('active');
    });
  }

  function searchFocus() {
    jQuery(document).on("open.zf.reveal", function(t, e) {
        jQuery("#searchBox .search-form input[type=search]").focus()
    }), jQuery(document).on("closed.zf.reveal", function(t, e) {
        jQuery("#searchBox .search-form input[type=search]").blur()
    })
}
  
  jQuery(document).on("click", function(event){
    if (jQuery('.control-pane').length > 0){
        jQuery('.control-pane').removeClass('active');
      }
    });



jQuery(window).on('load', function(){
  jQuery(document).foundation(); // Foundation JavaScript
  addFilter();
  searchFocus();
});

