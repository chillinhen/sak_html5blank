<?php /* Template Name: Startseite */ get_header(); ?>

<?php if (have_posts()): ?>
    
    <div class="site-content">
        <?php while (have_posts()) : the_post(); ?>
            <div class="main-content">
                <?php the_content(); ?>
            </div>
        <!-- Sidebar Aktuelles ToDO -->
            <aside class="sidebar">
                <h2 class="category-link"><?php _e('News', 'html5blank'); ?></h2>
                <?php #get_template_part('partials/news');?>
            </aside>
            <?php endwhile;
        ?>
    </div>
<?php else:
    ?>
    <div class="main-content">
        <?php get_template_part('partials/article', '404'); ?>
    </div>
<?php endif; ?>
<!-- Panels -->
<?php get_template_part('partials/carousel'); ?>
<?php get_template_part('partials/panels','related');?>
<?php get_footer(); ?>