<?php get_header();?>
<section role="content">
	<?php get_template_part('partials/banner'); ?>
	<?php if (have_posts()) : ?>
		<div class="site-content">
			<div id="breadcrumb"><?php breadcrumb_trail(); ?></div>
			<div class="main-content"> 
				<?php while (have_posts()) : the_post(); ?>
					
						<?php get_template_part('partials/article', 'page'); ?>
					 			
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
			</div>	
			<?php get_sidebar('zusatzinfos'); ?>
		</div>
    <!-- ToDo replace width repeater ??? -->
<?php get_template_part('partials/related', 'articles'); ?>
	<?php endif; wp_reset_query();?>
</section>
<?php get_footer(); ?>
