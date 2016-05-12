<?php 
function my_acf_add_local_field_groups() {
	//SEO
	get_template_part('/acf/acf','seo');
}
add_action('acf/init', 'my_acf_add_local_field_groups');
?>