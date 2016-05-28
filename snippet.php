
<section role="content">
	<?php get_template_part('partials/banner'); ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="site-content">
			<div id="breadcrumb"><?php breadcrumb_trail(); ?></div>
			<div class="full-content">
				<?php get_template_part('partials/article', 'page'); ?>
			
			<?php if( have_rows('accordion') ): ?>
				<div class="accordion">
					<?php // loop through rows (parent repeater)
					while( have_rows('accordion') ): the_row(); ?>
					<h3 class="collapseHeadline">
						<a aria-expanded="false" data-toggle="collapse" href="#<?php the_sub_field('accordion_id');?>" class="collapsed">
						<?php the_sub_field('headline'); ?>
						</a>
					</h3>
					<div id="<?php the_sub_field('accordion_id');?>" class="collapse">
						<?php the_sub_field('text'); 
					
						$panel = get_sub_field('panels');
					
					if( $panel ): ?>
					<div class="panels">
					    <?php foreach( $panel as $post): // variable must be called $post (IMPORTANT) ?>
					        <?php setup_postdata($post); ?>
					        <?php echo '... hier ein panel ---';#get_template_part('partials/panels','thumbnails'); ?>
					    <?php endforeach; ?>
					    </ul>
					    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					<?php endif; ?>
					</div>
					</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
			</div>
		</div>
	<?php endwhile; ?>
</section>



