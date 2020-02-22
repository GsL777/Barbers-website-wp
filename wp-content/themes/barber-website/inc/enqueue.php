<?php 

/*
	@package barber-website-theme

	==============================
		ADMIN ENQUEUE FUNCTIONS
	==============================
*/


//CSS for a custom theme in Wordpress dashboard
function barber_load_admin_scripts( $hook ) {
	//echo $hook;

	//Admin font
	wp_register_style( 'raleway-admin', 'https://fonts.googleapis.com/css?family=Raleway:200,300,500' );

	//ADMIN-CSS register css admin section
	wp_register_style( 'barber_admin', get_template_directory_uri() . '/assets/admin-css/barber.admin.css', array(), '1.0.0', 'all' );
		wp_enqueue_style( 'barber_admin' );
	
	//ADMIN-JS register js admin section
	//wp_register_script( 'barber-admin-script', get_template_directory_uri() . '/assets/admin-js/barber.admin.js', array('jquery'), '1.0.0', true );

	$pages_array  = array(
		'toplevel_page_barber_website',
		'barber_page_website_theme',
		'barber_page_website_theme_contact',
		'barber_page_barber_website_css'
	);

	//Limit usage to apply one style on the specific wordpress dasboard panel page need to apply variable $hook in function.
	//if('toplevel_page_barber_website' == $hook) {//toplevel_page_barber_website - copied from admin panel barber -> General

	if (in_array($hook, $pages_array) ) {
		wp_enqueue_style( 'raleway-admin' );
		wp_enqueue_style( 'barber_admin');
	}

	if('toplevel_page_barber_website' == $hook){
		wp_enqueue_media();//built in function that automatically handle calling and activation process of all the scripts and all the source code that needs for use of media uploader
		wp_enqueue_script( 'barber-admin-script' );
	}

	//ACE
	if('barber_page_barber_website_css' == $hook){
 
		wp_enqueue_style( 'raleway-admin' );
		wp_enqueue_style( 'barber_admin');

		wp_enqueue_style( 'ace', get_template_directory_uri() . '/assets/admin-css/barber.ace.css', array(), '1.0.0', 'all' );//downloaded from https://ace.c9.io/#nav=embedding site to insert code editor to a website.

		wp_enqueue_script( 'ace', get_template_directory_uri() . '/assets/admin-js/ace/ace.js', array('jquery'), '1.2.1', true );//using just wp_enqueue_script function instead of using wp_register_style and then wp_enqueue_style.
		wp_enqueue_script( 'barber-custom-css-script', get_template_directory_uri() . '/assets/admin-js/barber.custom_css.js', array('jquery'), '1.0.0', true );
	}

}

//Just for printing in admin panel instead of everywhere. enqueue - 
add_action( 'admin_enqueue_scripts', 'barber_load_admin_scripts' );



/*
	==============================
		FRONT-END ENQUEUE FUNCTIONS
	==============================
*/

function barber_load_scripts(){
		//css
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.1.1', 'all' ); //bootstrap.min.css
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css.map', array(), '4.1.1', 'all' ); //bootstrap.min.css.map
	wp_enqueue_style('barber-website', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0', 'all');
	wp_enqueue_style ('fontawesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.css', array(), '5.1.0', 'all');

	//fonts (Part 15 - WordPress Theme Development)
/*	
	wp_enqueue_style( 'playfair', 'https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' );//activate in sass -> main.css -> font-family: 'Playfair', Arial, Verdana, sans-serif; 
*/   


// font-family: 'oswald', sans-serif;
// font-family: Roboto;
// font: 400 1em/50px "FontAwesome";

		//js
	//wp_deregister_script( 'jquery' );//takes of the script from the head
	wp_enqueue_script('jqueryjs', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '1.11.3', true);
	wp_enqueue_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '4.1.1', true); //popper.min.js
	wp_enqueue_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js.map', array('jquery'), '4.1.1', true); //popper.min.js.map
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.1.1', true);
	wp_enqueue_script('customjs', get_template_directory_uri() . '/assets/js/barber-website.js', array('jquery'), '1.0.0', true);
}

add_action( 'wp_enqueue_scripts', 'barber_load_scripts' );
