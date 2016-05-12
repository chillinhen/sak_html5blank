			<!-- ToDo replace width repeater ??? -->
			<?php #get_template_part('partials/related', 'articles'); ?>
			<!-- footer -->
			<footer id="footer" role="contentinfo">
				<div class="footer-links-list">
					<?php wp_nav_menu(array('theme_location' => 'service-menu', 'menu_class' => 'footer-menu left', 'container' => '', 'fallback_cb' => 'my_menu')); ?>
				</div>
				<div class="sitemap">
					<?php _e('Sitemap','html5blank'); ?>
					<?php wp_nav_menu(array('theme_location' => 'main_nav', 'menu_class' => 'footer-main-menu clearfix', 'container' => '', 'fallback_cb' => 'my_menu')); ?>
				</div>
				<div class="footer-links">
					<?php wp_nav_menu(array('theme_location' => 'footer_links', 'menu_class' => 'menu clearfix'));?>
					<address>
						&copy; <?php strip_tags(the_field('adresse','option'));?>
					</address>
					<svg><use xlink:href="#logo-only"></use></svg>
				</div>
				<!-- copyright -->
				<p class="copyright">
					&copy; <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>. <?php _e('Powered by', 'html5blank'); ?>
					<a href="//wordpress.org" title="WordPress">WordPress</a> &amp; <a href="//html5blank.com" title="HTML5 Blank">HTML5 Blank</a>.
				</p>
				<!-- /copyright -->

			</footer>
			<!-- /footer -->

		</main>
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
