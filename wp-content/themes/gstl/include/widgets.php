<?php 
function clean_theme_widgets(){
	register_sidebar(array(
		'name'=>'Address',
		'id'=>'more_info',
		'description'=>'Add your more information for services page ',
		'before_widget'=>' <div class="con_info">',
		'after_widget'=>'</div>',
		'before_title'=>'',
		'after_title'=>'</h5>',
	
	));
	
}
add_action('widgets_init','clean_theme_widgets');
?>