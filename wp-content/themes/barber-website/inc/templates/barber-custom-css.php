<!-- Custom Barber Custom CSS on WordPress dashboard-->
<!-- Files included: barber.ace.css, barber.admin.css, ace (downloaded folder), barberb.custom_css.js, function-admin.php, enqueue.php, header.php  -->
<h1>Barber Custom CSS</h1>

<?php settings_errors();//function that will print an error ?>

<form id="save-custom-css-form" method="post" action="options.php" class="barber-general-form">
	<?php settings_fields('barber-custom-css-options'); ?>
	<?php do_settings_sections('barber_website_css');?>
	<?php submit_button(); ?>
</form>