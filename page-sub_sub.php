<?php /* Template Name: sak_Produktseite mit Unterthemen - Variante 02 */ get_header();?>
	<section role="content">
		<?php get_template_part('partials/banner'); ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="site-content">
				<div id="breadcrumb"><?php breadcrumb_trail(); ?></div>
				<div class="full-content">
					<?php get_template_part('partials/article', 'page'); ?>
				</div>
				
				<?php
				// check if the repeater field has rows of data
				if( have_rows('accordion') ): ?>
					<div class="accordion">
				 	
				   <?php  while ( have_rows('accordion') ) : the_row(); // loop through the rows of data?>
						
						<h3 class="collapseHeadline">
							<a aria-expanded="false" data-toggle="collapse" href="#<?php the_sub_field('accordion_id'); ?>">
								<span>
									<?php the_sub_field('headline'); //Headline ?>
								</span>
							</a>		
						</h3>
						<div id="<?php the_sub_field('accordion_id'); ?>" class="collapse">
							<?php the_sub_field('text'); ?>
					        <?php // related panels
					        $posts = get_sub_field('panels');
					        if( $posts ): ?>
					            <div class="panels">
					            <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
					                <?php setup_postdata($post); ?>
					        		<?php get_template_part('partials/panels', 'thumbnails'); ?>
					        		
					            <?php endforeach; ?>
					            </div>
					            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					        <?php endif; ?>
				        </div>
				
				   <?php endwhile;
				
				else :  // no rows found ?>
				
				   
				</div>
				<?php endif;
				?>
				
				<?php endwhile; ?>
	</section>
<?php get_footer(); ?>