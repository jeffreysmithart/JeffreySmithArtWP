<article class="small-12 columns blog-explore">
<div class="row">
	<div class="small-6 columns tags">
		<h4 class="section-headline">Explore Tags</h4>
		<?php include( locate_template( 'templates/tag-list.php')); ?>
	</div>
	<div class="small-6 columns categories">
		<h4 class="section-headline">Explore Categories</h4>
		<ul>
		<?php wp_list_categories( array('orderby' => 'count', 'order' => 'DESC', 'number'=>5, 'title_li'=>'') ); ?> 
		</ul>
	</div>
	</div>
</article>