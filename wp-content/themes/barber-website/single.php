<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

		<?php 
			if(have_posts()):

				while(have_posts()): the_post(); ?>

					<?php get_template_part( 'template-parts/single', get_post_format() ); 

				endwhile;

			endif;
		?>

		</div><!-- .col-lg-12 -->

	</div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>