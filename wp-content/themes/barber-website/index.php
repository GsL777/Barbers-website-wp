<?php get_header(); ?>

	<?php 

		if( have_posts() ):
			
			while( have_posts() ): the_post(); ?>
				
				<?php get_template_part('template-parts/content',get_post_format()); ?>
			
			<?php endwhile;
			
		endif;

	?>

	<?php wp_reset_postdata(); ?>


<?php get_footer(); ?>