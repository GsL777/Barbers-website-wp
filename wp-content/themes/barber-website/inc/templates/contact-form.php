
<!-- FILES INCLUDE barber-website.js, function.php(to add ajax.php), shortcodes.php, ajax.php, theme-support.php, custom-post-type.php, footer.scss -->

<!-- in modeling-contact-form.php write a comment <p>Use this <strong>shortcode</strong> to activate the Contact Form inside a Page or Post</p>
<p><code>[contact_form]</code></p> -->

<form id="ContactForm" class="contact-form" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
	<h2 class="text-center">Contact Us</h2>
	<div class="form-row">
		<div class="col-md-6">
			<div class="form-group">
				<input type="text" class="form-control js-input" name="name" id="name">
				<label for="name">Name</label>
				<span class="input-highlight"></span>

				<small class="text-danger form-control-msg">Your name is Required</small>
			</div><!-- .form-group -->
			<div class="form-group">
				<input type="email" class="form-control js-input" name="email" id="email">
				<label for="email">Email</label>
				<span class="input-highlight"></span>

				<small class="text-danger form-control-msg">Your Email is Required</small>
			</div><!-- .form-group -->
		</div><!-- .col-md-6 -->
		<div class="col-md-6">
			<div class="form-group">
				<textarea name="message" id="message" class="form-control"></textarea>
				<label for="message">Message</label>
				<span class="input-highlight"></span>

				<small class="text-danger form-control-msg">A message is Required</small>
			</div><!-- .form-group -->
		</div><!-- .col-md-6 -->
	</div>
	<div class="col-md-10 mx-auto mt-4">
		<button type="submit" class="btn btn-lg btn-danger btn-block button-send">Submit</button>

		<small class="text-info form-control-msg js-form-submission">Submission in process, please wait...</small>
		<small class="text-success form-control-msg js-form-success">Message was successfully submitted!</small>
		<small class="text-danger form-control-msg js-form-error">There was a problem with the Contact Form, please try again!</small>
	</div>
</form><!-- .contact-form -->