<?php

//custom name for each flexible layout section
function my_acf_flexible_content_layout_title( $title, $field, $layout, $i ) {
	
	// remove layout title from text 
	// load text sub field
	if( $text = get_sub_field('layout_title') ) {

		$old_title = $title;
		$title = '';
		$title .= '<span>' . $text . ' (' . $old_title . ')</span>';
		
	}
	
	// return
	return $title;
	
}

// name
add_filter('acf/fields/flexible_content/layout_title/name=layout_selector', 'my_acf_flexible_content_layout_title', 10, 4);


//add ACF options page(s)
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page('Theme Settings');
	// acf_add_options_page('More Theme Settings');

}

