<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<title><?php bloginfo('name'); ?><?php wp_title('|'); ?></title><!-- To set a page title go to dashboard Settings -> General -> write in a Site Title a title. It can be seen with an inspect -->
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta charset="<?php bloginfo( 'charset' ); //print the bloinfo charset?>">
		<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- for responsive devices to print full screen -->
		<link rel="profile" href="http://gmpg.org/xfn/11"> <!-- necessary for html5 validation  -->
		<?php if( is_singular() && pings_open( get_queried_object() ) ): //check if this page is not an archive, search result or generic blog loop ?>
			<link rel="pingback" href="<?php bloginfo('pingback_url'); //pingback_url - for page to scale up on search engine result page (SERP)?>">
		<?php endif; ?>
		<?php wp_head(); ?>
	</head>

	<?php 
		//ON WORDPRESS DASHBOARD -> BARBER -> CUSTOM CSS a custom css code could be written
		$custom_css = esc_attr(get_option( 'website_css' ));//website_css - unique handler from function-admin.php //Custom CSS Options
			if(!empty($custom_css) ):
				echo '<style>' . $custom_css . '</style>';
			endif;

		if (is_front_page() ): //is_home() detects if we are in the home page. If it is true it returns a true statement, otherwise returns false.
		//if your page is not your blog page, built in function is_front_page. Wordpress will recognise a hidden front page that is specified inside DASHBOARD -> settings -> reading.

		//SO IF THE HOME PAGE IS PRESSED IT WILL SHOW my-class, IF PRESS OTHER PAGE IT WILL SHOW no-barber-class IN INSPECT
			$barber_classes = array(
				'barber-class', 'my-class' //barber-class - in navbar.scss
			);
		else:
			$barber_classes = array(
				'no-barber-class'
			);
		endif;
		//to print actual class as example just on the home page

		/*write an if statement and copy a variable $awesome_classes to <body <?php body_class()?>> instead of array*/
	?>

	<body <?php body_class(
		//body_class($barber_classes);
		//array( 'barber-class', 'my-class' )  //through an array we can insert class'es
	); //if we change page the class of the body will change and it's going to print a custom class based on the page. With this class there is an ability to style a page in a different way based on the content the user sees?>
	>

		<header class="navigation">
		    <div class="navigation-menu row">
		        <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">HOME</a>

				<div <?php body_class(
						body_class($barber_classes)
						//array( 'barber-class', 'my-class' )  //through an array we can insert class'es
					); //if we change page the class of the body will change and it's going to print a custom class based on the page. With this class there is an ability to style a page in a different way based on the content the user sees?>>

					<div class="nav-toggle">
						<span></span>
					</div><!-- .nav-toggle -->

					<nav class="nav">
						<?php //theme-support.php function barber_register_nav_menu
							wp_nav_menu(
								array(
									'theme_location'	=> 'primary',
									'container'			=> false,
									'menu_class'		=> 'menu',
									'walker'			=> new Barber_Walker_Nav_primary()
								)
							);
						?>
					</nav>
				</div><!-- body_class -->
		    </div><!-- / row -->
		</header>


		<div class="header-section">
			<div class="image-section">
				<div class="header-image" style="background-image: url(<?php header_image(); //header_image(); - php built in function automatically prints the header image?>);"></div><!-- add add_theme_support('custom-header'); in theme-support.php-->
			</div><!-- .image-section -->

			<div class="text-content">
				<div class="text-content2">
					<h1>Your dream style</h1>
					<p><?php bloginfo( 'description' ); //prints info from WP Dashboard -> Settings -> General -> Site title, Tagline?></p>
				</div><!-- .text-content2 -->
			</div><!-- .text-content -->

			<div class="header-social-media">
				<?php echo social_btn();//function in theme-support.php ?><!-- .socials -->
			</div><!-- .header-social-media -->
		</div><!-- .header-section -->