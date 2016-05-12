<?php 
//Sprachfilter
$lang = strtolower(get_locale());
if ($lang == 'de_de') : $filter = 'de';
	elseif ($lang == 'en_us') : $filter = 'en';
	elseif ($lang == 'zh_cn') : $filter = 'zh';
endif;

$newsArgs = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'category_name' => 'aktuelles-' . $filter,
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $newQuery = new WP_Query($newsArgs);
?>
 <?php if ($newQuery->have_posts()) : ?>
 	<h2 class="category-link"><?php _e('News', 'html5blank'); ?></h2>
 	<div id="newsCarousel" class="carousel slide" data-ride="" data-pause="hover">
 	    <div class="carousel-inner">
 	     <?php while ($newQuery->have_posts()) : $newQuery->the_post(); ?>
 	     	<div class="item news-item"><?php the_title();#get_template_part('partials/article', 'news');?></div>
 	     <?php endwhile; wp_reset_postdata(); ?>
 	     <!--    		 Controls -->
 	     <a class="left carousel-control" href="#newsCarousel" data-slide="prev">
 	         <i class="fa fa-angle-left"></i>
 	     </a>
 	     <a class="right carousel-control" href="#newsCarousel" data-slide="next">
 	         <i class="fa fa-angle-right"></i>
 	     </a>
 	    </div>
 	</div>
 <?php endif; ?>