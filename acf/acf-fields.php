<?php 
function my_acf_add_local_field_groups() {
	//SEO
	get_template_part('/acf/acf','seo');
	// Startseiten.Beiträge
	get_template_part('/acF/acf-related','start');
	//Banner
	get_template_part('/acf/acf','banner');
	//Termine
	get_template_part('/acf/acf','events');
	//Sidebar
	get_template_part('/acf/acf','ataglance');
}
add_action('acf/init', 'my_acf_add_local_field_groups');
?>