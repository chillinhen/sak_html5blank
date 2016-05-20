			<!-- ToDo replace width repeater ??? -->
			<?php #get_template_part('partials/related', 'articles'); ?>
			<!-- footer -->
			<footer id="footer" role="contentinfo">
				<div class="service-links">
					<?php wp_nav_menu(array('theme_location' => 'service-menu', 'menu_class' => 'footer-menu left', 'container' => '', 'fallback_cb' => 'my_menu')); ?>
				</div>
				<div class="sitemap">
					<?php _e('Sitemap','html5blank'); ?>
					<?php wp_nav_menu(array('theme_location' => 'main_nav', 'menu_class' => 'footer-main-menu', 'container' => '', 'fallback_cb' => 'my_menu')); ?>
				</div>
				<div class="footer-info">
					<?php wp_nav_menu(array('theme_location' => 'footer_links', 'menu_class' => 'menu clearfix'));?>
					<address>
						&copy; <?php strip_tags(the_field('adresse','option'));?>
					</address>
					<div class="footer-logo">
						<svg><use xlink:href="#logo-only"></use></svg>
					</div>
					
				</div>
			</footer>
			<!-- /footer -->

		</main>
		<!-- copyright -->
		<p class="copyright container">
			&copy; <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>
		</p>
		<!-- /copyright -->
		
		<div class="scroll-to-top"><i class="fa fa-angle-up fa-2x"></i></div>
		<!-- /container -->

		<?php wp_footer(); ?>

		<!-- analytics -->
                 <?php $analytics = get_field('analytics', 'option');
                if ($analytics): ?>
		<script>
                    <?php echo strip_tags($analytics); ?>
		</script>
                <?php endif; ?>
                <!-- analytics -->  

	</body>
</html>
