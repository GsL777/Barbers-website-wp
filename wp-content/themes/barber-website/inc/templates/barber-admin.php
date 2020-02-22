<!-- Custom Barber Theme Support on WordPress dashboard-->
<h1>Barber Theme Support</h1>

<?php settings_errors();//function that will print an error ?>

<form method="post" action="options.php" class="barber-general-form">
	<?php settings_fields( 'barber-theme-support' ); ?>
	<?php do_settings_sections('barber_website_theme');?>
	<?php submit_button(); ?>
</form>