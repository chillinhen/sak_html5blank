<?php
//create custom posts
//
//carousels
function my_custom_post_carousel() {
    $labels = array(
        "name" => "Carousel",
        "singular_name" => "Carousel",
    );
    $args = array(
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "show_ui" => true,
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array("slug" => "carousel-item", "with_front" => true),
        "query_var" => true,
        "menu_position" => 12, 
        "menu_icon" => "http://overflow-hillen.de/library/img/backend/ico_carousel.svg", 
        "supports" => array("title", "editor", "custom-fields", "revisions", "author", "page-attributes"), "taxonomies" => array("category"));
    register_post_type("carousel-item", $args);
}

add_action('init', 'my_custom_post_carousel');

//Karten
function my_custom_post_maps() {
    $labels = array(
        "name" => "Karten",
        "singular_name" => "Karte",
    );

    $args = array(
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "show_ui" => true,
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array("slug" => "karten", "with_front" => true),
        "query_var" => true,
        "supports" => array("title", "editor", "revisions", "author", "page-attributes"), "taxonomies" => array("category"));
    register_post_type("karten", $args);
}

add_action('init', 'my_custom_post_maps');

?>