<article id="post-<?php the_ID(); ?>" <?php post_class('image-format'); ?>>

	<?php 
		the_title('<h5 class="text-center">', '</h5>'); 

		if( has_post_thumbnail() ):
			$urlImg = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
		endif; 
	?>


	<div class="image" style="background-image: url(<?php echo $urlImg; ?>);"></div>


	<?php the_content(); ?>


	<div class="row">
		<div class="col-lg-6 col-md-6 col-xs-6 text-left">
			<?php previous_post_link(); ?>
		</div><!-- .col-lg-6 -->
		<div class="col-lg-6 col-md-6 col-xs-6 text-right">
			<?php next_post_link(); ?>
		</div><!-- .col-lg-6 -->
	</div><!-- .row -->

</article>