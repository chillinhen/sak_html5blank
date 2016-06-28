<?php
$selected = get_field('uebersicht');
$parent = $post->ID;
$filter = array(
    'post_type' => 'page',
    'post_parent' => $parent,
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC',
);
$subLoop = new WP_Query($filter);
?>

    <?php if ($subLoop->have_posts()) : ?>
    <div class="<?php echo $selected; ?> subpages">
        <?php while ($subLoop->have_posts()) : $subLoop->the_post(); ?>
            <?php
            if ($selected == 'panels') :
                get_template_part('partials/panels', 'thumbnails');
            elseif ($selected == 'accordion') :
                get_template_part('partials/article', 'accordion');
            endif;
            ?>
    <?php endwhile;
    wp_reset_postdata(); ?>
    </div>
<?php endif; ?>