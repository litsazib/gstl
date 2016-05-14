<?php
function gstl_style_js(){
	
	wp_register_style('theme_style',get_template_directory_uri() . 'style.css',array(),'1.0','all');
	wp_register_style('color',get_template_directory_uri() . '/css/color.css',array(),'1.0','all');
	wp_register_style('transitions',get_template_directory_uri() . '/css/transitions.css',array(),'1.0','all');	
	wp_register_style('bootstrap',get_template_directory_uri() . '/css/bootstrap.min.css',array(),'3.3.6','all');
	wp_register_style('bxslider',get_template_directory_uri() . '/css/jquery.bxslider.css',array(),'3.3.6','all');
	wp_register_style('carousel',get_template_directory_uri() . '/css/owl.carousel.css',array(),'3.3.6','all');
	wp_register_style('fontawesome',get_template_directory_uri() . '/css/font-awesome.min.css',array(),'3.3.6','all');
	wp_register_style('parallax',get_template_directory_uri() . '/css/parallax.css',array(),'3.3.6','all');
	wp_register_style('style',get_template_directory_uri() . '/css/style.css',array(),'3.3.6','all');
	wp_register_style('responsive',get_template_directory_uri() . '/css/bootstrap-responsive.css',array(),'3.3.6','all');
	
	wp_enqueue_style('theme_style');
	wp_enqueue_style('color');
	wp_enqueue_style('transitions');
	wp_enqueue_style('bootstrap');
	wp_enqueue_style('bxslider');
	wp_enqueue_style('carousel');
	wp_enqueue_style('fontawesome');
	wp_enqueue_style('parallax');
	wp_enqueue_style('style');
	wp_enqueue_style('responsive');


	

/*
	wp_enqueue_script('jquery',get_template_directory_uri().'/js/jquery-1.11.0.min.js',array('jquery'),'3.3.6',true);
	wp_enqueue_script('bootstrap',get_template_directory_uri().'/js/bootstrap.js',array('jquery'),'3.3.6',true);
	wp_enqueue_script('bxslider',get_template_directory_uri().'/js/jquery.bxslider.min.js',array('jquery'),'3.3.6',true);
	wp_enqueue_script('carousel',get_template_directory_uri().'/js/owl.carousel.js',array('jquery'),'3.3.6',true);
	wp_enqueue_script('modernizr',get_template_directory_uri().'/js/modernizr.js',array('jquery'),'3.3.6',true);
	wp_enqueue_script('skrollr',get_template_directory_uri().'/js/skrollr.min.js',array('jquery'),'3.3.6',true);
	wp_enqueue_script('functions',get_template_directory_uri().'/js/functions.js',array('jquery'),'3.3.6',true);
	wp_enqueue_script('jquery');
	*/
}
add_action('wp_enqueue_scripts','gstl_style_js');





?>