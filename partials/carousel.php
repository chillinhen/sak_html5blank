<?php 

$posts = get_field('carousel');
if( $posts ): ?>
	<div id="bannerCarousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="5000" data-pause="hover">
		<ol class="carousel-indicators">
			<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
				<?php setup_postdata($post); ?>
				<?php $counter = 0;?>
				<li data-target="#bannerCarousel" data-slide-to="<?php echo $counter; ?>"><?php echo $counter ++; ?> </li>
			<?php endforeach; ?>
		</ol>
		<div class="carousel-inner">
			<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
				<?php setup_postdata($post); ?>
				<?php get_template_part('partials/carousel', 'item'); ?>
			<?php endforeach; ?>
		</div>
		<!-- Controls -->
		<a class="left carousel-control" href="#bannerCarousel" data-slide="prev">
			<i class="fa fa-angle-left fa-2"></i>
			<span><?php _e('Prevs','html5blank' )?></span>
		</a>
		<a class="right carousel-control" href="#bannerCarousel" data-slide="next">
			<i class="fa fa-angle-right fa-2"></i>
			<span><?php _e('Next','html5blank' )?></span>
		</a>
	</div>
	<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>