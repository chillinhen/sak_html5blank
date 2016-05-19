<?php /* Template Name: Produktseite */ get_header();?>
<section role="content">
	<?php get_template_part('partials/banner'); ?>
	<?php if (have_posts()) : ?>
		<div class="site-content´">
			<?php while (have_posts()) : the_post(); ?>
				<div class="main-content"> 
					<?php get_template_part('partials/article', 'page'); ?>
				 </div>				
			<?php endwhile; 		
			// event tables
			if( have_rows('termine') ): ?>
				<div class="events">
			    <?php while ( have_rows('termine') ) : the_row();			
			        $event_slug = get_sub_field('shortcode');
					echo do_shortcode($event_slug);					
			    endwhile; ?>			
			  </div><!-- / .events -->
				
			<?php endif;?>
			<!-- Contact Form -->
			<?php 
			$form_slug = get_field('kontaktformular');
			if($form_slug): echo do_shortcode($form_slug); endif; ?>			
			<!-- Sidebar -->
			<?php get_sidebar('zusatzinfos'); ?>
		</div>
	<?php endif; ?>
</section>
<?php get_footer(); ?>