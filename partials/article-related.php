<?php
global $more;
$more = 0;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('related'); ?> role="article">
    <?php if ( is_front_page() ) : 
   if ( has_post_thumbnail() ) : 
	the_post_thumbnail('wpbs-article');
    endif;
     endif;?>
    <h3 class="page-title" itemprop="headline"><?php the_title(); ?></h3>

<?php the_excerpt(); ?>
 <!-- show Button 'learn more' per custom field -->
    <?php get_template_part('partials/button', 'more_info'); ?>
    <footer class="clearfix">
	<?php #get_template_part('partials/edit', 'infos'); ?>
    </footer> <!-- end article footer -->

</article> <!-- end article -->