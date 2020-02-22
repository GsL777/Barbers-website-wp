jQuery(document).ready( function($){
	var updateCSS = function(){ 
		$("#website_css").val( editor.getSession().getValue() ); //#website_css taken from function-admin.php function barber_custom_css_callback()
	}
	$("#save-custom-css-form").submit( updateCSS ); //from barber-custom-css.php id="". And call the var updateCSS.
});

var editor = ace.edit("customCss");
editor.setTheme("ace/theme/monokai");//WP DASHBOARD BARBER CUSTOM CSS themes from assets/admin-js -> ace
editor.getSession().setMode("ace/mode/css");//barber.custom_css.js, enqueue.php, barber-custom-css.php