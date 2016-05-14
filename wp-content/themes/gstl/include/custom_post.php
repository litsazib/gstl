<?php
	//Services Custom Post 
function clean_theme_costom_post(){
	register_post_type('service', array(
	'public'=>true,
	'label'=>'Service',
	'menu_icon'=>'dashicons-screenoptions',
	'labels'=>array(
		'name'=>'Services',
		'singular_name'=>'Services',
		'add_new'=>'Please add new service',
	
	),	
	'supports'=>array('title','thumbnail','editor')
	));	
//Clever Staffs Custom Post
	register_post_type('Staffs', array(
	'public'=>true,
	'label'=>'Staffs',
	'menu_icon'=>'dashicons-id',
	'labels'=>array(
		'name'=>'Staffs',
		'singular_name'=>'Staffs',
		'add_new'=>'Please add new Staffs',
	
	),	
	'supports'=>array('title','thumbnail')
	));	

	
}
add_action('init','clean_theme_costom_post');
 


?>

