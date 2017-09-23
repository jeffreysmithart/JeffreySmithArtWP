(function($) {
  "use strict";

  function watchForThumbnailClick() {
    $(document).on('click','.thumbnails .zoom', function(e){
      e.preventDefault();
      var photo_fullsize = $(this).find('img').attr('src').replace('-180x180','');
      var title =  $(this).find('img').attr('alt');    
      $('.woocommerce-main-image ').attr('href',photo_fullsize);
      $('.woocommerce-main-image ').attr('title',title);
      $('.woocommerce-main-image img').attr('alt',title);
      $('.woocommerce-main-image img').attr('src', photo_fullsize);
      $('.woocommerce-main-image img').attr('srcset','');
    });
  }
  //build thumbanil of main image below the main
  function buildThumbnails() {
    var mainImage = $('.woocommerce-main-image img');
    var mainHref = mainImage.attr('href');
    var mainSrc = mainImage.attr('src').replace('-600x600', '-180x180');
    var mainAlt = mainImage.attr('alt');
    var mainTitle = mainImage.attr('title');
    $('.thumbnails').append('<a href="' + mainHref + '" class="zoom"><img alt="'+ mainAlt+ '" src="' + mainSrc + '" title="' + mainTitle + '" class="attachment-shop_thumbnail size-shop_thumbnail" ></a>');
  }

  $(document).ready(function(){
    // buildThumbnails();
    // watchForThumbnailClick();
  });

})(jQuery);