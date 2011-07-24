<div id="menucontainer">
	<div id="menu">
		<?php $args = array(
		'depth'        => 2,
		'show_date'    => '',
		'date_format'  => get_option('date_format'),
		'child_of'     => 0,
		'exclude'      => '47',
		'include'      => '',
		'title_li'     => '',
		'echo'         => 1,
		'authors'      => '',
		'sort_column'  => 'menu_order, post_title',
		'link_before'  => '',
		'link_after'   => '',
		'walker' 		=> '' ); 
		wp_list_pages( $args ); ?>
	</div>
</div>