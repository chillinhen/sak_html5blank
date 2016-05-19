<!-- panel loop -->
<?php
$parent = $post->ID;
$filter = array(
    'post_type' => 'page',
    'post_parent' => $parent,
    'posts_per_page' => 12,
    'orderby' => 'menu_order',
    'order' => 'ASC',
);
$panelLoop = new WP_Query($filter);
?>
<?php if ($panelLoop->have_posts()) : ?>
        <div class="panels subpages">

            <?php while ($panelLoop->have_posts()) : $panelLoop->the_post(); ?> 
                <?php get_template_part('partials/panels', 'thumbnails'); ?>
                <?php
            endwhile;
            wp_reset_postdata();
            ?>

        </div> 
<?php endif; ?>