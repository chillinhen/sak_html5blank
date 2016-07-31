<aside class="sidebar">
    <?php
    //Post Thumbnail
    if (has_post_thumbnail()) :
        the_post_thumbnail('wpbs-article');
    endif;
    ?>
    <?php
    // Auf einen Blick?>
    
    <?php
    if (get_field('auf_einen_blick')):
        $wysiwig = do_shortcode(get_field('auf_einen_blick', false, false));
    else:
        $wysiwig = '';
    endif;
    ?>

<?php echo $wysiwig; ?>
    
    
    <?php get_template_part('partials/panel', 'sonderinfos'); ?>
    <?php get_template_part('partials/panel', 'kontakt'); ?>
</aside>