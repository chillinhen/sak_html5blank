<?php /* Template Name: Startseite */ get_header(); ?>

<!-- Page Content -->
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
		<?php get_template_part('partials/carousel', 'oben');?>
		<div class="site-content">
			<div class="main-content"> 
			<!-- ToDo -->
			   <?php #get_template_part('partials/article', 'main'); ?>
			   <?php the_content();?>
			</div>
			<!-- Sidebar Aktuelles ToDO -->
			<aside class="sidebar">
				<h2 class="category-link"><?php _e('News', 'html5blank'); ?></h2>
				<?php #get_template_part('partials/news');?>
			</aside>
		</div>
	<?php endwhile;?>
<?php endif; ?>
<!-- Panels -->
<?php get_template_part('partials/panels','related');?>


<?php get_footer(); ?>