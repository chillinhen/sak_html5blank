


if ($subLoop->have_posts()) : ?>
<div class="<?php echo $selection; echo $columnGrid; ?>">
    <?php while ($subLoop->have_posts()) : $subLoop->the_post(); 
            if ($selection == 'panels') :
                get_template_part('partials/panels', 'thumbnails');
            elseif ($selection == 'accordion') :
                get_template_part('partials/article', 'accordion');
            endif;
    endwhile; wp_reset_postdata(); ?>
</div>
<?php endif; endif; ?>


