<?php 
acf_add_local_field_group(array (
	'key' => 'group_56de6227787b9',
	'title' => 'Banner',
	'fields' => array (
		array (
			'key' => 'field_56dd527cc4f83',
			'label' => 'Banner Headline',
			'name' => 'banner_headline',
			'type' => 'text',
			'instructions' => 'Wenn dieses Feld nicht ausgefüllt ist, wird hier die normale Überschrift angezeigt.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 66,
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_56dd52993449c',
			'label' => 'Banner SubHeadline',
			'name' => 'banner_sub_headline',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 66,
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_56f3b3bb0797b',
			'label' => 'Banner Bild',
			'name' => 'banner_bild',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => 33,
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
			array (
				'param' => 'page_template',
				'operator' => '!=',
				'value' => 'page-home.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => 'Hier bitte Überschriften eintragen und Bild auswählen:',
));
?>