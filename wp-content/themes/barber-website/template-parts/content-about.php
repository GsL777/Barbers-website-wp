<article id="post-<?php the_ID(); ?>" class="<?php post_class(); ?>">
	
	<div class="about-title">
		<?php the_title('<h3 class="text-center">','</h3>' ); ?>
	</div><!-- .about-title -->

	<div class="container">
		<div class="separator-line">
			<div class="left-line">
				<div class="line"></div>
			</div><!-- .left-line -->

			<i class="fa fa-scissors fa-rotate-270"></i>

			<div class="right-line">
				<div class="line"></div>
			</div><!-- .right-line -->
		</div><!-- .separator-line -->

		<div class="about-description">
			<p><?php the_content(); ?></p>
		</div><!-- .about-description -->
	</div><!-- .container -->

</article>