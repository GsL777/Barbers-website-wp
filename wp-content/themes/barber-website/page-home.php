	<?php get_header(); ?>

	<!-- ABOUT SECTION START -->
	<section id="about" class="about-section smooth-scroll">
		<?php 
			$args = array(
				'type'				=> 'post',
				//'cat'				=> '2',
				'order'				=> 'ASC',
				'category_name'		=> 'about',
				'posts_per_page'	=> 1
			);

			$lastBlog = new WP_Query($args);

			if( $lastBlog->have_posts() ):
				while( $lastBlog->have_posts() ): $lastBlog->the_post(); 

					get_template_part('template-parts/content', 'about');

				endwhile;

			endif;

			wp_reset_postdata();
		 ?>
	</section>
	<!-- ABOUT SECTION END -->


	<!-- SERVICES SECTION START -->
	<section id="services" class="services-section smooth-scroll">
		<div class="container">
			<?php 
				$args = array(
					'type'				=> 'post',
					'order' 			=> 'ASC',
					'category_name'		=> 'service',
					'posts_per_page'	=> 1
				);

				$lastBlog = new WP_Query($args);

				if( $lastBlog->have_posts() ):
					while( $lastBlog->have_posts() ): $lastBlog->the_post();

						get_template_part('template-parts/content', 'services'); 

					endwhile;
					
				endif;

				wp_reset_postdata();
			?>

			<div class="row">
				<?php 
					$args = array(
						'type'				=> 'post',
						'order'				=> 'ASC',
						'category_name'		=> 'services',
						'posts_per_page'	=> 4
					);

					$lastBlog = new WP_Query($args);

					if( $lastBlog->have_posts() ):
						while( $lastBlog->have_posts() ): $lastBlog->the_post(); 
				?>

							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="services">
									<?php the_title('<p>','</p>' ); ?>
								</div><!-- .services -->
							</div><!-- .col-md-3 -->

				<?php 
						endwhile;

					endif;

					wp_reset_postdata();
				?>

			</div><!-- .row -->
		</div><!-- .container -->
	</section>


	<style>.services-section:after{background-image: url("http://localhost/Barber-website/wp-content/themes/barber-website/assets/img/barber-brush-person-compressed.jpg");}</style>	
	<!-- SERVICES SECTION END -->


	<!-- COUNT STATS START -->
	<section class="counter-section" data-wow-duration="1.4s">
		<div class="container">
			<div class="row">
				<?php 
					$args = array( 
						'type'				=> 'post',
						'posts_per_page'	=> 4,
						'category_name'		=> 'count',
						'order'				=> 'ASC'
					);

					$blogLoop = new WP_Query( $args ); 

					if( $blogLoop->have_posts() ): 

						$i = 0;

						while( $blogLoop->have_posts() ): $blogLoop->the_post(); 

								if($i==0): $fontIcon = 'fa fa-star'; $count = 20;
									elseif($i > 0 && $i < 2): $fontIcon = 'fa fa-scissors'; $count = 4000;
									elseif($i > 1 && $i < 3): $fontIcon = 'fa fa-smile-o'; $count = 3000;
									elseif($i >= 3): $fontIcon = 'fa fa-trophy'; $count = 10;
								endif;
				?>

							<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 stats">
								<i class="<?php echo $fontIcon; ?>" aria-hidden="true"></i>
								<div class="counting" data-count="<?php echo $count; ?>"><?php the_content(); ?></div>
								<?php the_title('<h5>', '</h5>'); ?>
							</div><!-- .stats -->

				<?php 
						$i++; endwhile;

					endif;

					wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).

					//wp_reset_query() - ensure that the main query has been reset to the original main query. (USE wp_reset_query() - immediately after every loop using query_posts()).
				?>

			</div><!-- .row -->
		</div><!-- .container -->
	</section>
	<!-- COUNT STATS END -->


	<!-- OUR TEAM SECTION START -->
	<section id="team" class="team-section smooth-scroll">
		<div class="container">
			<div class="title">
				<h3 class="text-center">Our team</h3>
			</div><!-- .title -->

			<ul class="gallery-container">

			<?php 

				$currentPage = (get_query_var('paged')) ? get_query_var('paged') : 1;

				$args = array(
					'posts_per_page'	=> 6, 
					'category_name'		=> 'teammate',
					'order'				=> 'ASC',
					'paged'				=> $currentPage
				);

				query_posts($args);

				if(have_posts() ): 

					while( have_posts() ): the_post(); 

			?>

						<li class="team-gallery">
							<a href="<?php the_permalink(); ?>">
								<?php if( has_post_thumbnail() ):
									$urlImg = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
								endif; ?>

								<div class="our-team-image" style="background-image: url(<?php echo $urlImg; ?>);"></div>

								<?php the_title('<h5>', '</h5>'); ?>

								<?php the_excerpt('<p>', '</p>'); ?>
							</a>
						</li>

			<?php 
					endwhile;

				endif;

				wp_reset_query();
			?>

			</ul>
		</div><!-- .container -->
	</section>
	<!-- OUR TEAM SECTION END -->


	<!-- PRICING SECTION START -->
	<section id="pricing" class="pricing-section smooth-scroll">
		<div class="container">

			<?php 
				$args = array(
					'type'				=> 'post',
					'order'				=> 'ASC',
					'category_name'		=> 'pricing',
					'posts_per_page'	=> 1
				);

				$lastBlog = new WP_Query($args);

				if( $lastBlog->have_posts() ):
					while( $lastBlog->have_posts() ): $lastBlog->the_post(); 

						get_template_part('template-parts/content', 'pricing');

					endwhile;

				endif;

				wp_reset_postdata();
			?>

			<div class="prices row">
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="pricing-menu">

					<?php 
						$args = array( 
							'type'				=> 'post',
							'posts_per_page'	=> 4,
							'category_name'		=> 'pricing-service',
							'order'				=> 'ASC'
						);

						$blogLoop = new WP_Query( $args ); 

						if( $blogLoop->have_posts() ):

							$i = 0;

							while( $blogLoop->have_posts() ): $blogLoop->the_post(); 

									if($i==0): $fontIcon = 'fa fa-scissors';
										elseif($i > 0 && $i < 2): $fontIcon = 'fa fa-scissors';
									endif;
					?>

								<div class="pricing-data">
									<i class="<?php echo $fontIcon; ?>"></i>
									<div class="service">
										<?php the_title('<h5>', '</h5>'); ?>
									</div><!-- .service -->
									<div class="price">
										<?php the_excerpt('<p>', '</p>'); ?>
									</div><!-- .price -->
								</div><!-- .pricing-data -->
								<div class="pricing-text">
									<?php the_content('<p>', '</p>'); ?>
								</div><!-- .pricing-text -->

					<?php 
							$i++; endwhile;

						endif;

						wp_reset_postdata();
					?>

					</div><!-- .pricing-menu -->
			    </div><!-- .col-sm-6 -->

			    <div class="col-md-6 col-sm-12 col-xs-12">
					<div class="pricing-menu">

					<?php 
						$args = array( 
							'type'				=> 'post',
							'posts_per_page'	=> 4,
							'category_name'		=> 'pricing-service',
							'order'				=> 'ASC',
							'offset'			=> 4
						);

						$blogLoop = new WP_Query( $args ); 

						if( $blogLoop->have_posts() ):

							$i = 0;

							while( $blogLoop->have_posts() ): $blogLoop->the_post(); 

									if($i==0): $fontIcon = 'fa fa-scissors';
										elseif($i > 0 && $i < 2): $fontIcon = 'fa fa-scissors';

									endif;
					?>

								<div class="pricing-data">
									<i class="<?php echo $fontIcon; ?>"></i>
									<div class="service">
										<?php the_title('<h5>', '</h5>'); ?>
									</div><!-- .service -->
									<div class="price">
										<?php the_excerpt('<p>', '</p>'); ?>
									</div><!-- .price -->
								</div><!-- .pricing-data -->
								<div class="pricing-text">
									<?php the_content('<p>', '</p>'); ?>
								</div><!-- .pricing-text -->

					<?php 
							$i++; endwhile;

						endif;

						wp_reset_postdata();
					?>

					</div><!-- .pricing-menu -->
			    </div><!-- .col-sm-6 -->

			</div><!-- .row -->
		</div><!-- .container -->
	</section>


	<style>.pricing-section:after {background-image: url("http://localhost/Barber-website/wp-content/themes/barber-website/assets/img/barber-brush-person-compressed.jpg");}</style>
	<!-- PRICING SECTION END -->


	<!-- LOCATION SECTION START -->
	<section id="location" class="location-section smooth-scroll">
		<div class="container">
			<div class="location">
				<div class="col-lg-12">
					<div class="row">

					<?php 
						$args = array( 
							'type'				=> 'post',
							'posts_per_page'	=> 2,
							'category_name'		=> 'location-content',
							'order'				=> 'ASC'
						);

						$blogLoop = new WP_Query( $args ); 

						if( $blogLoop->have_posts() ):

							$i = 0;

							while( $blogLoop->have_posts() ): $blogLoop->the_post(); 

									if($i==0): $fontIcon = 'fa fa-map-marker';
										elseif($i > 0 && $i < 2): $fontIcon = 'fa fa-mobile';
									endif;
					?>

								<div class="col-md-6 location-content">
									<div class="font-image">
										<i class="icons1 <?php echo $fontIcon; ?>"></i>
									</div><!-- .font-image -->
									<div class="font-description">
										<?php the_title('<span>', '</span>'); ?>
										<?php the_content('<p>', '</p>'); ?>
									</div><!-- .font-description -->
								</div><!-- .location-content -->

					<?php 
							$i++; endwhile;

						endif;

						wp_reset_postdata();
					?>

					</div><!-- .row -->
				</div><!-- .col-lg-12 -->

				<div class="col-lg-12">
					<div class="row">

					<?php 
						$args = array( 
							'type'				=> 'post',
							'posts_per_page'	=> 2,
							'category_name'		=> 'location-content',
							'order'				=> 'ASC',
							'offset'			=> 2
						);

						$blogLoop = new WP_Query( $args ); 

						if( $blogLoop->have_posts() ):

							$i = 0;

							while( $blogLoop->have_posts() ): $blogLoop->the_post(); 

									if($i==0): $fontIcon = 'fa fa-envelope';
										elseif($i > 0 && $i < 2): $fontIcon = 'fa fa-clock-o';
									endif;
					?>

								<div class="col-md-6 location-content">
									<div class="font-image">
										<i class="icons2 <?php echo $fontIcon; ?>" aria-hidden="true"></i>
									</div><!-- .font-image -->
									<div class="font-description">
										<?php the_title('<span>', '</span>'); ?>
										<?php the_content('<p>', '</p>'); ?>
									</div><!-- .font-description -->
								</div><!-- .location-content -->

					<?php 
							$i++; endwhile;

						endif;

						wp_reset_postdata();
					?>

					</div><!-- .row -->

				</div><!-- .col-lg-12 -->
			</div><!-- .location -->

			<div class="map">
				<?php 
					$args = array(
						'type'				=> 'post',
						'order'				=> 'ASC',
						'category_name'		=> 'map',
						'posts_per_page'	=> 1
					);

					$lastBlog = new WP_Query($args);

					if( $lastBlog->have_posts() ):
						while( $lastBlog->have_posts() ): $lastBlog->the_post(); 

							the_content();

						endwhile;

					endif;

					wp_reset_postdata();
				?>
			</div><!-- .map -->

		</div><!-- .container -->
	</section>
	<!-- LOCATION SECTION END -->

	<?php get_footer(); ?>