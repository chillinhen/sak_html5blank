<?php 
// get carousel ids
$ids = get_field('carousel_item', false, false);

$carouselQuery = new WP_Query(array(
	#'post_type'      	=> 'carousel',
	#'posts_per_page'	=> 3,
	'post__in'			=> $ids,
	#'post_status'		=> 'any',
	#'orderby'        	=> 'post__in',
));

if ($carouselQuery->have_posts()) : ?>
    <?php
    while ($carouselQuery->have_posts()) : $carouselQuery->the_post();
    the_title();
        #get_template_part('partials/carousel', 'item');
    endwhile;
    wp_reset_postdata();
    ?>
<?php endif; ?>