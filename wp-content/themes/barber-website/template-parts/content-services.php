<article id="post-<?php the_ID(); ?>" class="<?php post_class(); ?>">
	
	<div class="services-title">
		<?php the_title('<h3 class="text-center">','</h3>'); ?>

		<div class="separator-line">
			<div class="left-line">
				<div class="line"></div>
			</div><!-- .separator-line -->

			<i class="fa fa-scissors fa-rotate-270"></i>

			<div class="right-line">
				<div class="line"></div>
			</div><!-- .right-line -->
		</div><!-- .separator-line -->

		<p><?php the_content(); ?></p>

	</div><!-- .services-title -->

</article>