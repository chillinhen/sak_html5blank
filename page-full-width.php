<?php /* Template Name: Full Width Page */get_header(); ?>

<section role="content">			
<?php get_template_part('partials/banner'); ?>
<?php if (have_posts()) : ?>
	<div class="site-content">
		<div id="breadcrumb"><?php breadcrumb_trail(); ?></div>
		<div class="full-content" role="main">
			<?php while (have_posts()) : the_post(); get_template_part('partials/article','page'); endwhile; ?>	
		</div>
	</div>
<?php else : ?>
	<div class="site-content">
		<div class="full-content">
			<?php get_template_part('partials/404'); ?>
		</div>
	</div>
<?php endif; ?>
</section>

<?php get_footer(); ?>