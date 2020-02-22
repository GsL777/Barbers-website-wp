<?php 
/*

	@package barber-website-theme

	==========================================
		SHORTCODE OPTIONS
	==========================================

*/

//CONTACT FORM SHORTCODE
//FILES INCLUDE barber-portfolio.js, function.php(to add ajax.php), contact-form.php, barber-contact-form.php, function-admin.php, ajax.php, theme-support.php, custom-post-type.php, footer.scss
function barber_contact_form( $attr, $content = null ){//First parameter - the array that contains the attributes. Second parameter - is the content. Text wrapped around a shortcode. $content = null - default action not to trigger an error if [contact_form][/contact_form] is empty.

/*
[contact_form placement="top"]This is the content[/contact_form]

always use lowecase. Do not use _ or - and capital letters inside []
*/

	//get the attributes
	$attr = shortcode_atts(
		array(),//return empty array, because don't have anything
		$attr,
		'contact_form'//specify the type of shortcode code that the system have to recognise and in this case it is contact_form. contact_form - a shortcode name.
	);

	//return HTML
	ob_start();//ob_start(); - turn on output buffering (ob-stands for output buffering) and if it is turned on and it will prevent any outputs sent from the script to be injected or outputted immediately.
	include 'templates/contact-form.php';

	return ob_get_clean();//prevent (include 'templates/contact-form.php';) to be printed immediately. Files in barber-contact-form.php, content-contact.php
}

add_shortcode( 'contact_form', 'barber_contact_form' ); //First Variable - shortcode name, Second variable - the name of the function shortcode that must be called