<?php
$posts = get_field('linked_posts');

if ($posts):
	foreach ($posts as $post): // variable must be called $post (IMPORTANT) ?>
		<?php setup_postdata($post); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('panel'); ?>>
			<h3 class="clearfix">
				<a href="<?php echo the_permalink();?>">
					<?php the_title(); ?>
				</a>
			</h3>
			<div class="text">
				<?php the_excerpt();?>
			</div>
			<!-- show Button 'learn more' per custom field -->
			<?php get_template_part('partials/button', 'more_info'); ?>
				<a class="more-link-corner" href="<?php echo the_permalink();?>">
			</a>
		</article>
	<?php endforeach; wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>