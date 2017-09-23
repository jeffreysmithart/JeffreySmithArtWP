<?php 
$tags = get_tags(array('orderby' => 'count', 'order' => 'DESC', 'number'=>10));
if ($tags) {
	echo '<ul>';
foreach ($tags as $tag) {
echo '<li><a href="' . get_tag_link( $tag->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $tag->name ) . '" ' . '>' . $tag->name.'</a> </li> ';
}
echo '</ul>';
}
?>