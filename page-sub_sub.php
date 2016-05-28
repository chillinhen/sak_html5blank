<?php /* Template Name: sak_Produktseite mit Unterthemen - Variante 02 */ get_header();?>
	<section role="content">
		<?php get_template_part('partials/banner'); ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="site-content">
				<div id="breadcrumb"><?php breadcrumb_trail(); ?></div>
				<div class="full-content">
					<?php get_template_part('partials/article', 'page'); ?>
				</div>
				<?php if( have_rows('accordion') ): ?>
					<div class="accordion">
						<?php $panel = get_sub_field('panels');
						if( $panel ): ?>
							<div class="panels">
							<?php foreach( $panel as $post): // variable must be called $post (IMPORTANT) ?>
							    <?php setup_postdata($post); ?>
							    <?php echo '... hier ein panel ---';#get_template_part('partials/panels','thumbnails'); ?>
							<?php endforeach; wp_reset_postdata();?>
							
							</div>
							<?php endif;?>
					</div>
					<?php endif;?>
		<?php endwhile; ?>
	</section>
<?php get_footer(); ?>