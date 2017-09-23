'use strict';

(function($) {


	var originalPosts = $('.portfolio-grid').html();
	var postsQueried = false;
	var urlBase = '/wp-json/wp/v2/portfolio';
	var updateUrl = window.location.origin + window.location.pathname;
	var portCat = 'portfolio-category',
			portCatParam = null,
			portMedium = 'portfolio-medium',
			portMediumParam = null,
			portTags = 'portfolio-tags',
			portTagsParam = null;

	var getPosts = function( cb, myurl) {
    
    var theUrl = rootUrl + urlBase + myurl;
    // console.log('getPosts called', theUrl);

    jQuery.ajax({
        type: 'get',
        url: theUrl,
        // data: data,
        success: cb,
        complete: function(response){
        	// console.log(response);
        }
    });

	};

	function ChangeUrl(title, url) {
    if (typeof (history.pushState) !== "undefined") {
        var obj = { Title: title, Url: updateUrl+url };
        history.pushState(obj, obj.Title, obj.Url);
    } else {
        // alert("Browser does not support HTML5.");
    }
}

function removeLoad() {
	var loader = $('#loader');
	loader.removeClass('active');
	TweenMax.to(loader, 0.25, {alpha:0});
}

function animateContent( element ) {
	TweenMax.fromTo( jQuery(element), 0.75, {alpha: 0, y:"50px"}, {delay: 0, alpha: 1, y:"0", ease: Power2.easeOut});
}

function animateLoadIn() {
	var loader = $('#loader');
	loader.addClass('active');
	TweenMax.fromTo( loader, 0.5, {alpha: 0, height:0, borderRadius:"50%"}, {delay: 0, borderRadius:"4px", alpha: 1, height:"100%", ease: Power4.easeIn});
}

function animateLoadOut() {
	var loader = $('#loader');
	TweenMax.fromTo( loader, 0.5, { height:"100%"}, {delay: 0,  height:0,  ease: Power4.easeIn, onComplete:removeLoad});
	
}


var postCallback = function(data, textStatus, xhr){
	var obj;
	if (typeof data === "object"){
			obj = data;
		} else {
			obj = JSON.parse( data);
		}
	 var newDiv  = document.createElement('div');
jQuery(newDiv).addClass('row');
		// console.log(obj.length);
		if (obj.length > 0){
		for ( var i = 0; i < obj.length; i++ ){	
			var newPost = '<div class="columns medium-6 small-12 portfolio-grid-item">';
					newPost += '<a href="' + obj[i].link + '">' + '<div class="portfolio-grid-item-inner" >';
					newPost += '<img src="' + obj[i].better_featured_image.source_url + '" alt="' + obj[i].better_featured_image.alt_text +'" >';
					newPost += '<h2>' + obj[i].title.rendered + '</h2><h4>'+ obj[i].acf.item_medium + '</h4><p class="learn-more">Learn More</p></div>';
					jQuery(newPost).appendTo(newDiv);
 		}
 		jQuery('.portfolio-grid').html(newDiv);
		animateContent();
		animateLoadOut();
		
 		// console.log(newDiv);
 	} else {
 		jQuery('.portfolio-grid').prepend('<div class="primary callout" id="no-results"><h4 class="text-center">No results found</h4></div>');
 		animateLoadOut();
 	}
 	$('.posts-navigation').fadeOut();
};





function selectChange(){
jQuery('.portfolio-selector-wrapper').on('change', 'select', function(){
	$('#no-results').remove();
	var url = "";
	var queryCount = 0;
	var query = jQuery(this).attr('id');
	var queryVal = jQuery(this).val();
	// console.log(query === portCat);

	if ( query === portCat ) {
		// console.log(queryVal);
		if (queryVal > 0){
			portCatParam = query + "=";
			portCatParam += queryVal;
		} else {
			portCatParam = null;
		}
		// console.log(portCatParam);
	}
	else if (query === portMedium ) {
		// console.log(queryVal);
		if ( queryVal > 0  ){
			portMediumParam = (query + "=");
			portMediumParam += queryVal;
		} else {
			portMediumParam = null;
		}
		// console.log(portMediumParam);
	}
	else if (query === portTags ) {
		// console.log(queryVal);
		if (queryVal > 0){
			portTagsParam = query + "=";
			portTagsParam += queryVal;
		} else {
			portTagsParam = null;
		}
		// console.log(portTagsParam);
	}

	if (portCatParam != null ){
		
		if (queryCount > 0 ){
			url += '&';
		} else {
			url += '?';
		}
		url += portCatParam;
		queryCount++;
		// console.log(url);
	}
	if (portMediumParam != null ){
		if (queryCount > 0 ){
			url += '&';
		} else {
			url += '?';
		}
		url += portMediumParam;
		queryCount++;
		// console.log(url);
	}
	if (portTagsParam != null ){
		if (queryCount > 0 ){
			url += '&';
		} else {
			url += '?';
		}
		url += portTagsParam;
		queryCount++;
		// console.log(url);
	}
	// console.log(postsQueried,portCatParam,portMediumParam,portTagsParam);
	if (portCatParam != null || portMediumParam != null || portTagsParam != null){
		// console.log(url);
		getPosts(postCallback, url);
		postsQueried = true;
		animateLoadIn();
		// ChangeUrl("Portfolio | Jeffrey Smith Art", url);
	} else if ( postsQueried === true ){
		// console.log("no filter");
			// getPosts(postCallback, url);
			jQuery('.portfolio-grid').html(originalPosts);
			$('.posts-navigation').fadeIn();
			animateContent();
		}
});
}

function checkSelects() {
	$('.portfolio-selector-wrapper select').each(function(){
		var url = "";
		var queryCount = 0;
		var query = jQuery(this).attr('id');
		var queryVal = jQuery(this).val();
		// console.log(query === portCat);

		if ( query === portCat ) {
			// console.log(queryVal);
			if (queryVal > 0){
				portCatParam = query + "=";
				portCatParam += queryVal;
			} else {
				portCatParam = null;
			}
			// console.log(portCatParam);
		}
		else if (query === portMedium ) {
			// console.log(queryVal);
			if ( queryVal > 0 ){
				portMediumParam = (query + "=");
				portMediumParam += queryVal;
			} else {
				portMediumParam = null;
			}
			// console.log(portMediumParam);
		}
		else if (query === portTags ) {
			// console.log(queryVal);
			if (queryVal > 0){
				portTagsParam = query + "=";
				portTagsParam += queryVal;
			} else {
				portTagsParam = null;
			}
			// console.log(portTagsParam);
		}

		if (portCatParam != null ){
			
			if (queryCount > 0 ){
				url += '&';
			} else {
				url += '?';
			}
			url += portCatParam;
			queryCount++;
			// console.log(url);
		}
		if (portMediumParam != null ){
			if (queryCount > 0 ){
				url += '&';
			} else {
				url += '?';
			}
			url += portMediumParam;
			queryCount++;
			// console.log(url);
		}
		if (portTagsParam != null ){
			if (queryCount > 0 ){
				url += '&';
			} else {
				url += '?';
			}
			url += portTagsParam;
			queryCount++;
			// console.log(url);
		}
		// console.log(postsQueried,portCatParam,portMediumParam,portTagsParam);
		if (portCatParam != null || portMediumParam != null || portTagsParam != null){
			// console.log(url);
			getPosts(postCallback, url);
			postsQueried = true;
		} else if ( postsQueried === true ){
			getPosts(postCallback, url);
		}
		
	});
	
}



$(document).ready(function(){
	selectChange();
	checkSelects();
	if ( jQuery('.portfolio-grid').length > 0 ) {
		animateContent('.portfolio-grid');
	}

	if ( jQuery('ul.products').length > 0 ) {
		console.log("products!");
		animateContent('ul.products');
	}
});

// $(window).on('load', function(){
// 	console.log("products!");
// 		if ( jQuery('ul.products').length > 0 ) {
// 		console.log("products!");
// 		animateContent('ul.products');
// 	}
// });

})(jQuery);