<?php /* Template Name: Uebersicht */ get_header(); ?>
<!-- Page Content -->
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
		<?php get_template_part('partials/banner'); ?>
		<div class="site-content">
			<div class="main-content"> 
			<!-- ToDo -->
			   <?php get_template_part('partials/article', 'page'); ?>
			</div>
		</div>
	<?php endwhile;?>
<?php endif; ?>
<!-- Panels -->
<?php get_template_part('partials/panels','subpages');?>
<?php get_footer(); ?>