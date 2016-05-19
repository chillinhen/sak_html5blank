<?php
$sideInfo = get_field('zusatzinfos');
$specialInfo = get_field('sonderinfos');
$contactInfo = get_field('kontaktdaten');
?>
<aside class="sidebar">
	<?php //Post Thumbnail
		if (has_post_thumbnail()) :
			the_post_thumbnail('wpbs-article');
		endif;
	?>
	<?php // Auf einen Blick
	$sideInfo = get_field('auf_einen_blick');
	if ($sideInfo): ?>
		<div class="widget acf-sideinfo">
			<?php #echo $sideInfo; ?>
		</div>
	<?php endif; ?>
	<?php // Sonderinfos
	if ($specialInfo):
		// override $post
		$post = $specialInfo;
		setup_postdata($post);
		get_template_part('partials/panels-sidebar',get_post_format());
		wp_reset_postdata(); 
	endif;
	?>
	<?php // Kontaktdaten
	if ($contactInfo):
		// override $post
		$post = $contactInfo;
		setup_postdata($post);
		get_template_part('partials/panels-sidebar',get_post_format());
		wp_reset_postdata(); 
	endif;
	?>
</aside>