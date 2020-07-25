<?php 

/*
@package barber-website-theme

	=====================
		ADMIN PAGE
	=====================
*/

function barber_add_admin_page(){

	//Generate Barber Website Admin Page
	add_menu_page('Barber Website Theme Options', 'Barber', 'manage_options', 'barber_website', 'barber_theme_create_page', 'dashicons-editor-unlink', 110);//First parameter - Page title. Second parameter - menu title. Third parameter - Capability(capability to display options to specific users). Fourth parameter - menu slug(parameter that appears in the navigation bar to avoid errors). Fifth parameter - a function name. Sixth parameter - icon url(wordpress premade icons in https://developer.wordpress.org/resource/dashicons/#art) Need to choose the icon and paste the icon name to the Sixth parameter place. Seventh parameter - the position of a menu that specifies a location.

	//Generate Barber Admin Sub Pages
	//Barber Theme Options
	add_submenu_page('barber_website', 'Barber Theme Options', 'Theme Options', 'manage_options', 'barber_website', 'barber_theme_create_page');

	//Barber Contact Form Options
	add_submenu_page('barber_website', 'Barber Contact Form', 'Contact Form', 'manage_options', 'barber_website_theme_contact', 'barber_contact_form_page');

	//Barber CSS Options
	add_submenu_page('barber_website', 'Barber CSS Options', 'Custom CSS', 'manage_options', 'barber_website_css', 'barber_theme_settings_page');

}

add_action('admin_menu', 'barber_add_admin_page');//Activate this function. First value - when to trigger this function (in this case during the generation of admin_menu). Second value - the name of the function that must be triggered.

//Activate custom settings
add_action( 'admin_init', 'barber_custom_settings' );//adding into barber_add_admin_page, because of the safety precautions


//Activate custom settings
function barber_custom_settings(){

	//Theme Support Options
	register_setting('barber-theme-support', 'post_formats');

	add_settings_section( 'barber-theme-options', 'Theme Options', 'barber_theme_options', 'barber_website_theme' );

	add_settings_field( 'post_formats', 'Post Formats', 'barber_post_formats', 'barber_website_theme', 'barber-theme-options' );

	//Custom Header in Theme Support Options
	register_setting('barber-theme-support', 'custom_header');	

	add_settings_field('custom-header', 'Custom Header', 'barber_custom_header', 'barber_website_theme', 'barber-theme-options');
/*
	//Custom Background in Theme Support Options
	register_setting('barber-theme-support', 'custom_background');
	
	add_settings_field('custom-background', 'Custom Background', 'barber_custom_background', 'barber_website_theme', 'barber-theme-options');
*/

	//Contact Form Options
	register_setting( 'barber-contact-options', 'activate_contact' );//barber-contact-form.php and custom-post-type.php files.

	add_settings_section( 'barber-contact-section', 'Contact Form', 'barber_contact_section', 'barber_website_theme_contact' );

	add_settings_field( 'activate-form', 'Activate Contact Form', 'barber_activate_contact', 'barber_website_theme_contact', 'barber-contact-section' );

	//Custom CSS Options
	register_setting( 'barber-custom-css-options', 'website_css', 'barber_sanitize_custom_css');//barber-custom-css.php
	//PUT IN header.php that it will be displayed and will work.

	add_settings_section( 'barber-custom-css-section', 'Custom CSS', 'barber_custom_css_section_callback', 'barber_website_css' ); //barber_website_css - from function barber_add_admin_page(), //Barber CSS Options section.
	//barber-custom-css.php

	add_settings_field( 'custom-css', 'Insert your Custom CSS', 'barber_custom_css_callback', 'barber_website_css', 'barber-custom-css-section' );
}


//Post Formats
function barber_post_formats(){
	$options =  get_option( 'post_formats' );
	$formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
	$output = '';
	foreach ($formats as $format){
		$checked = ( @$options[$format] == 1 ? 'checked' : '');//@ - means if this variable exists
		$output .= '<label><input type="checkbox" id="' . $format . '" name="post_formats['.$format.']" value="1" '. $checked .' />' . $format . '</label><br>';
	}
	echo $output;//in a callback function for specific settings field have to echo
}//dashboard -> Barber -> Theme Options to turn on or off in POSTS -> All posts -> Find post


function barber_custom_header(){
	$options = get_option( 'custom_header' );
	$output = '';

	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.' /> Activate the Custom Header</label>';
}//Activate a theme support in inc -> theme-support.php file

/*
function barber_custom_background(){
	$options = get_option( 'custom_background' );
	$output = '';

	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.' /> Activate the Custom Background</label>';
}//Activate a theme support in inc -> theme-support.php file
*/


//Barber Theme Options
function barber_theme_options(){
	echo 'Activate and Deactivate specific Theme Support Options';
}


//Contact Options Functions
function barber_contact_section(){
	echo 'Activate and Deactivate the Built-in Contact Form';
}

//Custom Contact Form
function barber_activate_contact(){//variables from function barber_custom_settings Theme Support Options
	$options =  get_option( 'activate_contact' );
	$checked = ( @$options == 1 ? 'checked' : '');

	echo '<label><input type="checkbox" id="activate_contact" name="activate_contact" value="1" '. $checked .' /></label>';
}//Appears in WP dashboard -> Barber


//Barber CSS Info
function barber_custom_css_section_callback(){
	echo 'Customize Barber Theme with your own CSS';
}

//Barber CSS Options
function barber_custom_css_callback(){
	$css = get_option( 'website_css' );
	$css = ( empty($css) ? '/* Barber Theme Custom CSS */' : $css );
	//echo '<textarea placeholder="Sunset Custom Css" >'.$css.'</textarea>';
	echo '<div id="customCss">'.$css.'</div><textarea id="website_css" name="website_css" style="display:none;visibility:hidden;">'.$css.'</textarea>';
}//div id must be the same as in admin-js -> barber.custom_css.js in ace.edit() section.
//Contact CSS Options

//Barber CSS Sanitization
function barber_sanitize_custom_css ($input){//Custom CSS Options,register_setting Third parameter.
	//$output = esc_textarea( $input );//sanitize an input. Function incodes all the information in database. //sanitize the input of textarea
	$output = sanitize_textarea_field( $input );//UPDATE FOR esc_textarea($input);
	return $output;
}


//Template submenu functions
function barber_theme_create_page(){ //the same name as Fifth Value in function barber_add_admin_page().
	//echo '<h1>Barber Theme Options</h1>';
	require_once( get_template_directory() . '/inc/templates/barber-admin.php' );
}

//Barber Contact Options
function barber_contact_form_page(){
	require_once( get_template_directory() . '/inc/templates/barber-contact-form.php' );
}

//Barber CSS Options
function barber_theme_settings_page() {
	require_once( get_template_directory() . '/inc/templates/barber-custom-css.php' );
}