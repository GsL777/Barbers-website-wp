<?php 

/*
	@package barber-website-theme

	=============================
		THEME SUPPORT OPTIONS
	=============================
*/
	
//Barber Theme Options START
//Activates all the post format in dasboard posts -> Format bar on the right. TO ACTIVATE POST FORMATS GO TO newly created BARBER WEBSITE -> THEME OPTIONS -> select -> save changes and go to the posts.

/*
$options =  get_option( 'post_formats' );
$formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
$output = array();
foreach ($formats as $format){
	$output[] = ( @$options[$format] == 1 ? $format : '');
}

if( !empty($options) ){
	add_theme_support('post-formats', $output );
}
*/

//Simplified version of the code above. TO ACTIVATE POST FORMATS GO TO newly created BARBER WEBSITE -> THEME OPTIONS -> select -> save changes and go to the posts.
$options = get_option('post_formats'); 
if (!empty($options)) { 
	add_theme_support('post-formats', array_keys($options)); 
}


/*
	==========================================
		ACTIVE CUSTOM HEADER
	==========================================
*/

	//simple header activation in WP dashboard -> appearance menu
	//add_theme_support('custom-header');


//activation of checkboxes function barber_custom_header function-admin.php
$header = get_option('custom_header');
if(@$header == 1){
	add_theme_support('custom-header');
}

/*
	==========================================
		ACTIVE CUSTOM BACKGROUND
	==========================================
*/

	//simple background activation in WP dashboard -> appearance menu
	//add_theme_support('custom-background');

/*
//activation of checkboxes function barber_custom_background function-admin.php
$background = get_option('custom_background');
if(@$background == 1){
	add_theme_support('custom-background');
}
*/

/*Activate the post thumbnails START*/
add_theme_support( 'post-thumbnails' );//post-thumbnails - Lets to set Featured Image in Wordpress dashboard -> Posts. Developing content.php
/*Activate the post thumbnails END*/


/*Activate Nav Menu Option in WP dashboard START*/
function barber_register_nav_menu() {
	register_nav_menu( 'primary', 'Header Navigation Menu' );//First parameter - location unique name. For two word use _, but do not use -   . Second parameter - description. 
}//add a walker.php file and require in functions.php

add_action('after_setup_theme', 'barber_register_nav_menu');//call an action to activate a function.

/*Activate Nav Menu Option END*/


/*
	==========================================
		SIDEBAR FUNCTIONS
	==========================================
*/

function barber_sidebar_init(){//in sidebar.php and header.php files
	register_sidebar(
		array(
			'name'			=> esc_html__( 'Barber Sidebar', 'barbertheme' ),
			'id'			=> 'barber-sidebar',
			//'class'			=> 'sidebar-custom',//applies only in the backend
			'description'	=> 'Dynamic Right Sidebar',
			'before_widget' => '<section id="%1$s" class="barber-widget %2$s">',//%1$s - (%) are connected to the sprintf php function and to the id and ($) the class of a sidebar. The class change based on the class that is specified and the id changes based on the id that is specified.
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="barber-widget-title">',
			'after_title'   => '</h2>'

		)
	);
}

add_action('widgets_init', 'barber_sidebar_init');//to activate barber_sidebar_init function


/*
	==========================================
		ACTIVE FOOTER NAVIGATION MENU
	==========================================
*/

function barber_theme_setup() {

	add_theme_support('menus'); //activatíng menu's writing a string 

	//register_nav_menu('primary', 'Primary Header Navigation'); //first value - string $location, second option - string $description
	register_nav_menu('secondary', 'Footer Navigation');

}

add_action('init', 'barber_theme_setup'); //function to create the menus. Function is executed after the setup theme is triggered. Function will work 'after_setup_theme' or after the initialization 'init'.
/*Activate Footer navigation menu END*/


//function for testing CONTACT FORM email START
//FILES INCLUDE modeling-portfolio.js, function.php(to add ajax.php), contact-form.php, ajax.php, shortcodes.php, custom-post-type.php, contact.scss 

//TURN OFF IF IT IS NOT IN USE
/*
function mailtrap($phpmailer) {//code in ajax.php function modeling_save_contact();
  $phpmailer->isSMTP();
  $phpmailer->Host = 'smtp.mailtrap.io';
  $phpmailer->SMTPAuth = true;
  $phpmailer->Port = 2525;
  $phpmailer->Username = '5ef4715c46507e';
  $phpmailer->Password = '4fa836c30aacff';
}

add_action('phpmailer_init', 'mailtrap');
//function for testing CONTACT FORM email END
*/

/*
	===============================
		SOCIAL SHARE BUTTONS START
	===============================
*/

function social_btn(){
	// $title = get_the_title();
	// $permalink = get_permalink();

	//Compose the share links for Facebook, Twitter, LinkedIn, Instagram
	$facebook = sprintf('https://www.facebook.com/login/');
	// $facebook = 'https://www.facebook.com/sharer/sharer.php?u=' . $permalink;
	$twitter = sprintf('https://twitter.com/login?lang=en-gb');
	$google = sprintf('https://accounts.google.com/signin/v2/identifier?hl=en&passive=true&continue=http%3A%2F%2Fsupport.google.com%2Fplus%2Fanswer%2F1301225%3Fco%3DGENIE.Platform%253DDesktop%26hl%3Den&flowName=GlifWebSignIn&flowEntry=ServiceLogin');
	$linkedin = sprintf('https://www.linkedin.com/');
	$instagram = sprintf('https://www.instagram.com/accounts/login/');

	// Wrap the buttons
	$output = '<ul>';
		// Add the links inside the wrapper
		$output .= '<a href="' . $facebook . '" target="_blank" rel="nofollow"><li class="facebook"></li></a>';

		$output .= '<a href="' . $twitter . '" target="_blank" rel="nofollow"><li class="twitter"></li></a>';

		$output .= '<a href="' . $google . '" target="_blank" rel="nofollow"><li class="google"></li></a>';

		$output .= '<a href="' . $linkedin . '" target="_blank" rel="nofollow"><li class="linkedin"></li></a>';

		$output .= '<a href="' . $instagram . '" target="_blank" rel="nofollow"><li class="instagram"></li></a>';

	$output .= '</ul>';

	return $output;
}
/*
	===============================
		SOCIAL SHARE BUTTONS END
	===============================
*/

/*
	===============================
		YEAR START
	===============================
*/

	function year(){
		date_default_timezone_set('Europe/London'); 
		$this_year = date('Y');

		return $this_year;
	}
/*
	===============================
		YEAR END
	===============================
*/