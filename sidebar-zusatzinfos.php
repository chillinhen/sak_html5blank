<aside class="sidebar">
    <?php
    //Post Thumbnail
    if (has_post_thumbnail()) :?>
    <div class="widget">
       <?php the_post_thumbnail('wpbs-article');?>
        </div>
    <?php endif;?>
    <?php
    // Auf einen Blick?>
    
    <?php
    if (get_field('auf_einen_blick')):
    $wysiwig = '<div class="widget">' . do_shortcode(get_field('auf_einen_blick', false, false)) . '</div>';
    else: $wysiwig = ''; endif;?>

    <?php echo $wysiwig; ?>
    
    
    <?php get_template_part('partials/panel', 'sonderinfos'); ?>
    <?php get_template_part('partials/panel', 'kontakt'); ?>
</aside>