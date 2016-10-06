<?php /* Template Name: Uebersicht */ get_header(); ?>
<?php get_template_part('partials/banner'); ?>
<div class="site-content">
    <?php if (have_posts()): ?>
        <div class="main-content">
            <?php while (have_posts()) : the_post(); ?>

                <?php get_template_part('partials/article', 'page'); ?>

                <?php get_sidebar('zusatzinfos'); ?>
            <?php endwhile ?>
        </div>
    <?php else:
        ?>
        <div class="main-content">
            <?php get_template_part('partials/article', '404'); ?>
        </div>

    <?php endif; ?>
</div>
<!-- Children -->
<?php get_template_part('partials/subpages'); ?>

<?php get_footer(); ?>