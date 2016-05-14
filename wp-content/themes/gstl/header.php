<?php
/**
Theme Name: GSTL
Theme URI: http://gstlbd.com/
Author: GRAND SOFT TECHNOLOGY
Author URI: http://gstlbd.com/
Description:Clean business theme 
Version: 1.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta <?php bloginfo( 'charset' ); ?>>
<title><?php if (is_single() || is_page()) { wp_title('',true); } else { bloginfo('description'); } ?> <?php bloginfo('name');?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- CUSTOM CSS -->	
<?php wp_head(); ?>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
<!--WRAPPER START-->
<div class="wrapper">
    <!--HEADER START-->
	<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="<?php echo site_url();?>"><img src="<?php echo get_stylesheet_directory_uri();?>/images/Company_logo2-copy-[Converted].png" alt=""></a>
    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
			<li class="active"><a href="#home">Home</a></li>
			<li><a href="#service">Services</a></li>
			<li><a href="#course">Courses</a></li>
			<li><a href="#team">Team</a></li>
			<li><a href="#Portfolio">Portfolio</a></li>
			<li><a href="#hosting">Hosting</a></li>
			<li><a href="#contact">Contact Us</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav> 