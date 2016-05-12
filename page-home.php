<?php /* Template Name: Startseite */ get_header(); ?>

<?php 
/*ToDO*/
#get_template_part('partials/carousel', 'oben');?>

<!-- Page Content -->
<?php if (have_posts()) : ?>
<div class="site-content">
	<?php while (have_posts()) : the_post(); ?>
		<div id="main-content"> 
		<!-- ToDo -->
		   <?php #get_template_part('partials/article', 'main'); ?>
		   <?php the_content();?>
		</div>
	<?php endwhile;?>
</div>
<?php endif; ?>
<!-- Sidebar Aktuelles -->
<?php get_template_part('partials/news');?>
<?php get_template_part('partials/panels');?>
<?php get_footer(); ?>