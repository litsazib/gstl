<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		            	natsort($bg_images); //Sorts the array into a natural order
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

$of_options[] = array( 	"name" 		=> "Home Settings",
						"type" 		=> "heading"
				);
					
$of_options[] = array( 	"name" 		=> "Hello there!",
						"desc" 		=> "",
						"id" 		=> "introduction",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Welcome To The GSTL Theme Option</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);

$of_options[] = array( 	"name" 		=> "Logo Uploader",
						"desc" 		=> "Upload your site logo hear.Best Image site width:378px height:87px",
						"id" 		=> "media_upload_35",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "",
						"type" 		=> "upload"
				);

$of_options[] = array( 	"name" 		=> "Special Offer Image",
						"desc" 		=> "Upload your special offer Image on spacial offer section,actual image site width:349px height:558px",
						"id" 		=> "media_upload_356",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "",
						"mod"		=> "min",
						"type" 		=> "media"
				);
$of_options[] = array( 	"name" 		=> "Banner Image",
						"desc" 		=> "Upload your banner Image on home page,actual image site width:1902px height:776px",
						"id" 		=> "banner_image",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "",
						"mod"		=> "min",
						"type" 		=> "media"
				);
$of_options[] = array( 	"name" 		=> "Banner Top Image",
						"desc" 		=> "Upload your banner top image ,actual image site width:573px height:626px",
						"id" 		=> "banner_top_image",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "",
						"mod"		=> "min",
						"type" 		=> "media"
				);


//Use the clean theme 				
$of_options[] = array( 	"name" 		=> "Show Banner Title",
						"desc" 		=> "Banner title show or hidden",
						"id" 		=> "switch_ex4",
						"std" 		=> 1,
						"folds"		=> 1,
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Fast Title",
						"desc" 		=> "Use this inner html tag H1",
						"id" 		=> "fast_title",
						"std" 		=> "Are you too busy to clean?",
						"fold" 		=> "switch_ex4", /* the switch hook */
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Second Title",
						"desc" 		=> "Use this inner html tag H3",
						"id" 		=> "sec_title",
						"std" 		=> "No JOB is too BIG",
						"fold" 		=> "switch_ex4", /* the switch hook */
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "banner description",
						"desc" 		=> "Change banner description ",
						"id" 		=> "description",
						"std" 		=> "We are a team based in South East London
specialising in a commercial and residential cleaning. ",
						"fold" 		=> "switch_ex4", /* the switch hook */
						"type" 		=> "textarea"
				);
$url =  ADMIN_DIR . 'assets/images/';
$of_options[] = array( 	"name" 		=> "Special Offer Icon",
						"desc" 		=> "Special offer Icon image select hear",
						"id" 		=> "special_icon",
						"std" 		=> "big_brush.png",
						"type" 		=> "images",
						"options" 	=> array(											
											'brush.css' 	=> $url . 'brush.png',
											'big_brush.css' 	=> $url . 'big_brush.png',
											'accept.css' 	=> $url . 'accept.png',
											'wrench.css' 	=> $url . 'wrench.png'
										)
				);				
$of_options[] = array( 	"name" 		=> "Special Offer Title",
						"desc" 		=> "Change Special offce Title ",
						"id" 		=> "special_title",
						"std" 		=> "special offer",
						"type" 		=> "text"
				);	
$of_options[] = array( 	"name" 		=> "Special Offer Description",
						"desc" 		=> "Change Special description ",
						"id" 		=> "special_desc",
						"std" 		=> "Sign up for a contract for 3 months or more and you get 10% off your fee for the 1st month
New customers only",
						"type" 		=> "textarea"
				);				
				
$of_options[] = array( 	"name" 		=> "Staffs title",
						"desc" 		=> "Change Staffs Section Title ",
						"id" 		=> "staff_title",
						"std" 		=> "Clever Staffs ",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Staffs  Description ",
						"desc" 		=> "Staffs section description heir ",
						"id" 		=> "staff_desc",
						"std" 		=> "Totam rem aperiam, eaque ipsa quae inventore veritatis quasi architech beatae vitae dicta sunt exleo. nemo enim ipsam voluptatem quia.",
						"type" 		=> "textarea"
				);
$of_options[] = array( 	"name" 		=> "Serve  Title ",
						"desc" 		=> "serve section title heir ",
						"id" 		=> "serve",
						"std" 		=> "industries we serve",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Serve  Description  ",
						"desc" 		=> "serve section description heir ",
						"id" 		=> "serve_desc",
						"std" 		=> "Architecto beatae vitae dicta sunt explicabo........",
						"type" 		=> "textarea"
				);
//	Slider Control 
$of_options[] = array( 	"name" 		=> "Slider Section ",
			"type" 		=> "heading"
	);
$of_options[] = array( 	"name" 		=> "Hello there!",
						"desc" 		=> "",
						"id" 		=> "slider",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Easy Change your Home page slider</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);

$of_options[] = array( 	"name" 		=> "Slider 1",
						"desc" 		=> "Upload your Fast Slider hear.Best Image site width:378px height:87px",
						"id" 		=> "slider1",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "",
						"type" 		=> "upload"
				);
$of_options[] = array( 	"name" 		=> "Slider 2",
						"desc" 		=> "Upload your Fast Slider hear.Best Image site width:378px height:87px",
						"id" 		=> "slider2",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "",
						"type" 		=> "upload"
				);
$of_options[] = array( 	"name" 		=> "Slider 3",
						"desc" 		=> "Upload your Fast Slider hear.Best Image site width:378px height:87px",
						"id" 		=> "slider3",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "",
						"type" 		=> "upload"
				);
$of_options[] = array( 	"name" 		=> "Slider 4",
						"desc" 		=> "Upload your Fast Slider hear.Best Image site width:378px height:87px",
						"id" 		=> "slider4",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "",
						"type" 		=> "upload"
				);
$of_options[] = array( 	"name" 		=> "Slider 5",
						"desc" 		=> "Upload your Fast Slider hear.Best Image site width:378px height:87px",
						"id" 		=> "slider5",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "",
						"type" 		=> "upload"
				);
				
//	Footer Section 
$of_options[] = array( 	"name" 		=> "Footer Section ",
						"type" 		=> "heading"
				);
$of_options[] = array( 	"name" 		=> "Footer Text ",
						"desc" 		=> "Footer description heir ",
						"id" 		=> "footer_des",
						"std" 		=> "contact us now for a free non obligation quote and to discuss your requirements",
						"type" 		=> "textarea"
				);
$of_options[] = array( 	"name" 		=> "CALL NOW Text ",
						"desc" 		=> "Call Now Change ",
						"id" 		=> "call",
						"std" 		=> "CALL NOW: 0788 876 8563",
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Copyright Text ",
						"desc" 		=> "Change your site copyright information ",
						"id" 		=> "copy",
						"std" 		=> "Copyright © 2016 Tim & Wilson. Powered by NinjaAnimations.com",
						"type" 		=> "text"
				);
				
//social link
$of_options[] = array( 	"name" 		=> "Social Link ",
			"type" 		=> "heading"
	);
$of_options[] = array( 	"name" 		=> "Social Link ",
						"desc" 		=> "change your social link ",
						"id" 		=> "social_link",
						"std" 		=> 1,
						"folds"		=> 1,
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Facebook",
						"desc" 		=> "facebook link hear,Ex:http://facebook.con/your_name",
						"id" 		=> "facebook",
						"std" 		=> "#",
						"fold" 		=> "social_link", /* the switch hook */
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Twitter",
						"desc" 		=> "twitter link hear,Ex:http://twitter.con/your_name",
						"id" 		=> "twitter",
						"std" 		=> "#",
						"fold" 		=> "social_link", /* the switch hook */
						"type" 		=> "text"
				);
$of_options[] = array( 	"name" 		=> "Google plus",
						"desc" 		=> "google+ link hear,Ex:http://google-plus.con/your_name ",
						"id" 		=> "gplus",
						"std" 		=> "# ",
						"fold" 		=> "social_link", /* the switch hook */
						"type" 		=> "text"
				);
				
				
				
				
/*
*
*
*
*
*/				
$of_options[] = array( 	"name" 		=> "General Settings",
						"type" 		=> "heading"
				);
					
$url =  ADMIN_DIR . 'assets/images/';
$of_options[] = array( 	"name" 		=> "Main Layout",
						"desc" 		=> "Select main content and sidebar alignment. Choose between 1, 2 or 3 column layout.",
						"id" 		=> "layout",
						"std" 		=> "2c-l-fixed.css",
						"type" 		=> "images",
						"options" 	=> array(
							'1col-fixed.css' 	=> $url . '1col.png',
							'2c-r-fixed.css' 	=> $url . '2cr.png',
							'2c-l-fixed.css' 	=> $url . '2cl.png',
							'3c-fixed.css' 		=> $url . '3cm.png',
							'3c-r-fixed.css' 	=> $url . '3cr.png'
						)
				);
				
$of_options[] = array( 	"name" 		=> "Tracking Code",
						"desc" 		=> "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
						"id" 		=> "google_analytics",
						"std" 		=> "",
						"type" 		=> "textarea"
				);
				
$of_options[] = array( 	"name" 		=> "Footer Text",
						"desc" 		=> "You can use the following shortcodes in your footer text: [wp-link] [theme-link] [loginout-link] [blog-title] [blog-link] [the-year]",
						"id" 		=> "footer_text",
						"std" 		=> "Powered by [wp-link]. Built on the [theme-link].",
						"type" 		=> "textarea"
				);
				
$of_options[] = array( 	"name" 		=> "Styling Options",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Theme Stylesheet",
						"desc" 		=> "Select your themes alternative color scheme.",
						"id" 		=> "alt_stylesheet",
						"std" 		=> "default.css",
						"type" 		=> "select",
						"options" 	=> $alt_stylesheets
				);
				
$of_options[] = array( 	"name" 		=> "Body Background Color",
						"desc" 		=> "Pick a background color for the theme (default: #fff).",
						"id" 		=> "body_background",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Header Background Color",
						"desc" 		=> "Pick a background color for the header (default: #fff).",
						"id" 		=> "header_background",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Footer Background Color",
						"desc" 		=> "Pick a background color for the footer (default: #fff).",
						"id" 		=> "footer_background",
						"std" 		=> "",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Body Font",
						"desc" 		=> "Specify the body font properties",
						"id" 		=> "body_font",
						"std" 		=> array('size' => '12px','face' => 'arial','style' => 'normal','color' => '#000000'),
						"type" 		=> "typography"
				);  
				
$of_options[] = array( 	"name" 		=> "Custom CSS",
						"desc" 		=> "Quickly add some CSS to your theme by adding it to this block.",
						"id" 		=> "custom_css",
						"std" 		=> "",
						"type" 		=> "textarea"
				);
				
$of_options[] = array( 	"name" 		=> "Example Options",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Typography",
						"desc" 		=> "This is a typographic specific option.",
						"id" 		=> "typography",
						"std" 		=> array(
											'size'  => '12px',
											'face'  => 'verdana',
											'style' => 'bold italic',
											'color' => '#123456'
										),
						"type" 		=> "typography"
				);  
				
$of_options[] = array( 	"name" 		=> "Border",
						"desc" 		=> "This is a border specific option.",
						"id" 		=> "border",
						"std" 		=> array(
											'width' => '2',
											'style' => 'dotted',
											'color' => '#444444'
										),
						"type" 		=> "border"
				);
				
$of_options[] = array( 	"name" 		=> "Colorpicker",
						"desc" 		=> "No color selected.",
						"id" 		=> "example_colorpicker",
						"std" 		=> "",
						"type" 		=> "color"
					); 
					
$of_options[] = array( 	"name" 		=> "Colorpicker (default #2098a8)",
						"desc" 		=> "Color selected.",
						"id" 		=> "example_colorpicker_2",
						"std" 		=> "#2098a8",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "Input Text",
						"desc" 		=> "A text input field.",
						"id" 		=> "test_text",
						"std" 		=> "Default Value",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Input Checkbox (false)",
						"desc" 		=> "Example checkbox with false selected.",
						"id" 		=> "example_checkbox_false",
						"std" 		=> 0,
						"type" 		=> "checkbox"
				);
				
$of_options[] = array( 	"name" 		=> "Input Checkbox (true)",
						"desc" 		=> "Example checkbox with true selected.",
						"id" 		=> "example_checkbox_true",
						"std" 		=> 1,
						"type" 		=> "checkbox"
				);
				
$of_options[] = array( 	"name" 		=> "Normal Select",
						"desc" 		=> "Normal Select Box.",
						"id" 		=> "example_select",
						"std" 		=> "three",
						"type" 		=> "select",
						"options" 	=> $of_options_select
				);
				
$of_options[] = array( 	"name" 		=> "Mini Select",
						"desc" 		=> "A mini select box.",
						"id" 		=> "example_select_2",
						"std" 		=> "two",
						"type" 		=> "select",
						"mod" 		=> "mini",
						"options" 	=> $of_options_radio
				); 
				
$of_options[] = array( 	"name" 		=> "Google Font Select",
						"desc" 		=> "Some description. Note that this is a custom text added added from options file.",
						"id" 		=> "g_select",
						"std" 		=> "Select a font",
						"type" 		=> "select_google_font",
						"preview" 	=> array(
										"text" => "This is my preview text!", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						),
						"options" 	=> array(
										"none" => "Select a font",//please, always use this key: "none"
										"Lato" => "Lato",
										"Loved by the King" => "Loved By the King",
										"Tangerine" => "Tangerine",
										"Terminal Dosis" => "Terminal Dosis"
						)
				);
				
$of_options[] = array( 	"name" 		=> "Google Font Select2",
						"desc" 		=> "Some description.",
						"id" 		=> "g_select2",
						"std" 		=> "Select a font",
						"type" 		=> "select_google_font",
						"options" 	=> array(
										"none" => "Select a font",//please, always use this key: "none"
										"Lato" => "Lato",
										"Loved by the King" => "Loved By the King",
										"Tangerine" => "Tangerine",
										"Terminal Dosis" => "Terminal Dosis"
									)
				);
				
$of_options[] = array( 	"name" 		=> "Input Radio (one)",
						"desc" 		=> "Radio select with default of 'one'.",
						"id" 		=> "example_radio",
						"std" 		=> "one",
						"type" 		=> "radio",
						"options" 	=> $of_options_radio
				);
				
$url =  ADMIN_DIR . 'assets/images/';
$of_options[] = array( 	"name" 		=> "Image Select",
						"desc" 		=> "Use radio buttons as images.",
						"id" 		=> "images",
						"std" 		=> "warning.css",
						"type" 		=> "images",
						"options" 	=> array(
											'warning.css' 	=> $url . 'warning.png',
											'accept.css' 	=> $url . 'accept.png',
											'wrench.css' 	=> $url . 'wrench.png'
										)
				);
				
$of_options[] = array( 	"name" 		=> "Textarea",
						"desc" 		=> "Textarea description.",
						"id" 		=> "example_textarea",
						"std" 		=> "Default Text",
						"type" 		=> "textarea"
				);
				
$of_options[] = array( 	"name" 		=> "Multicheck",
						"desc" 		=> "Multicheck description.",
						"id" 		=> "example_multicheck",
						"std" 		=> array("three","two"),
						"type" 		=> "multicheck",
						"options" 	=> $of_options_radio
				);
				
$of_options[] = array( 	"name" 		=> "Select a Category",
						"desc" 		=> "A list of all the categories being used on the site.",
						"id" 		=> "example_category",
						"std" 		=> "Select a category:",
						"type" 		=> "select",
						"options" 	=> $of_categories
				);
				
//Advanced Settings
$of_options[] = array( 	"name" 		=> "Advanced Settings",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Folding Checkbox",
						"desc" 		=> "This checkbox will hide/show a couple of options group. Try it out!",
						"id" 		=> "offline",
						"std" 		=> 0,
						"folds" 	=> 1,
						"type" 		=> "checkbox"
				);
				
$of_options[] = array( 	"name" 		=> "Hidden option 1",
						"desc" 		=> "This is a sample hidden option 1",
						"id" 		=> "hidden_option_1",
						"std" 		=> "Hi, I\'m just a text input",
						"fold" 		=> "offline", /* the checkbox hook */
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Hidden option 2",
						"desc" 		=> "This is a sample hidden option 2",
						"id" 		=> "hidden_option_2",
						"std" 		=> "Hi, I\'m just a text input",
						"fold" 		=> "offline", /* the checkbox hook */
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Hello there!",
						"desc" 		=> "",
						"id" 		=> "introduction_2",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Grouped Options.</h3>
						You can group a bunch of options under a single heading by removing the 'name' value from the options array except for the first option in the group.",
						"icon" 		=> true,
						"type" 		=> "info"
				);
				
				$of_options[] = array( 	"name" 		=> "Some pretty colors for you",
										"desc" 		=> "Color 1.",
										"id" 		=> "example_colorpicker_3",
										"std" 		=> "#2098a8",
										"type" 		=> "color"
								);
								
				$of_options[] = array( 	"name" 		=> "",
										"desc" 		=> "Color 2.",
										"id" 		=> "example_colorpicker_4",
										"std" 		=> "#2098a8",
										"type" 		=> "color"
								);
								
				$of_options[] = array( 	"name" 		=> "",
										"desc" 		=> "Color 3.",
										"id" 		=> "example_colorpicker_5",
										"std" 		=> "#2098a8",
										"type" 		=> "color"
								);
								
				$of_options[] = array( 	"name" 		=> "",
										"desc" 		=> "Color 4.",
										"id" 		=> "example_colorpicker_6",
										"std" 		=> "#2098a8",
										"type" 		=> "color"
								);
				
// Backup Options
$of_options[] = array( 	"name" 		=> "Backup Options",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-slider.png"
				);
				
$of_options[] = array( 	"name" 		=> "Backup and Restore Options",
						"id" 		=> "of_backup",
						"std" 		=> "",
						"type" 		=> "backup",
						"desc" 		=> 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
				);
				
$of_options[] = array( 	"name" 		=> "Transfer Theme Options Data",
						"id" 		=> "of_transfer",
						"std" 		=> "",
						"type" 		=> "transfer",
						"desc" 		=> 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
				);
				
	}//End function: of_options()
}//End chack if function exists: of_options()
?>
