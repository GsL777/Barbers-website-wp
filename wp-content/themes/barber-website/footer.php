		<?php 
			if (is_front_page() ): //is_home() detects if we are in the home page. If it is true it returns a true statement, otherwise returns false.
			//if your page is not your blog page, built in function is_front_page. Wordpress will recognise a hidden front page that is specified inside DASHBOARD -> settings -> reading.

			//SO IF THE HOME PAGE IS PRESSED IT WILL SHOW my-class, IF PRESS OTHER PAGE IT WILL SHOW no-barber-class IN INSPECT

				$barber_classes = array(
					'barber-class', 'my-class'
				);
			else: 
				$barber_classes = array(
					'no-barber-class'
				);
			endif;
		?>


		<footer class="footer-section">
			<div class="container">
				<div class="footer-link row text-center nav">

					<div <?php body_class(
						body_class($barber_classes)
						//array( 'barber-class', 'my-class' )  //through an array we can insert class'es
						//no-barber-class in main.css
					); ?>>

						<?php 
							wp_nav_menu(
								array(
									'theme_location'	=> 'secondary',//theme_location - has to be the same name as specified in functions.php (register_nav_menu (first value - string $location)).
									'menu_class'		=> 'footer-column'
								) 
							);
						?>
					</div><!-- body_class -->
				</div><!-- .footer-link -->

				<div class="footer-description row">
					<div class="description-text col-lg-6 col-md-12">

					<?php 
						$args = array(
							'type'				=> 'post',
							'order'				=> 'ASC',
							'category_name'		=> 'footer-description',
							'posts_per_page'	=> 4
						);

						$lastBlog = new WP_Query($args);

						if( $lastBlog->have_posts() ):
							while( $lastBlog->have_posts() ): $lastBlog->the_post(); ?>

								<?php the_content('<p>','</p>' ); ?>

							<?php endwhile;
						endif;

						wp_reset_postdata();
					?>

					</div><!-- .description-text -->

					<div class="wrap col-lg-6 col-md-12">
						<div class="container">

						<?php 

							$args = array(
							'page_id'			=> '12'
						);

						$lastBlog = new WP_Query($args);

						if( $lastBlog->have_posts() ):
							while( $lastBlog->have_posts() ): $lastBlog->the_post();

								get_template_part('template-parts/content', 'page');

							endwhile;
						endif;

						wp_reset_postdata();
						?> 

						</div><!-- .container -->
					</div><!-- .wrap -->
				</div><!-- .footer-description-->

				<div class="footer-social-media">
					<ul>
						<?php 
							$facebook = 'https://www.facebook.com/login/';
							$twitter = 'https://twitter.com/login?lang=en-gb';
							$google = 'https://accounts.google.com/signin/v2/identifier?hl=en&passive=true&continue=http%3A%2F%2Fsupport.google.com%2Fplus%2Fanswer%2F1301225%3Fco%3DGENIE.Platform%253DDesktop%26hl%3Den&flowName=GlifWebSignIn&flowEntry=ServiceLogin';
							$linkedin = 'https://www.linkedin.com/';
							$instagram = 'https://www.instagram.com/accounts/login/';
						?>

						<a target="_blank" href="<?php echo $facebook; ?>" target="_blank" rel="nofollow"><li class="facebook" ></li></a>
						<a target="_blank" href="<?php echo $twitter; ?>"><li class="twitter"></li></a>
						<a target="_blank" href="<?php echo $google; ?>"><li class="google"></li></a>
						<a target="_blank" href="<?php echo $linkedin; ?>"><li class="linkedin"></li></a>
						<a target="_blank" href="<?php echo $instagram; ?>"><li class="instagram"></li></a>
					</ul>
				</div><!-- .footer-social-media -->

				<?php 
					date_default_timezone_set('Europe/Vilnius'); 
					$this_year = date('Y');
				?>

				<div class="footer-copyright text-center py-3">
					<p>&copy; 2019 - <?php echo $this_year; ?> Copyright</p>
				</div><!-- .footer-copyright -->
			</div><!-- .container -->
		</footer>


		<div id="cookie">
			<div id="cookie-close">x</div>
			This website is using cookies. <a href="#" target="_blank">More info</a>. <a class="cookie-agree">I agree</a>
		</div><!-- #cookie -->

		<?php wp_footer(); ?>

	</body>
</html>