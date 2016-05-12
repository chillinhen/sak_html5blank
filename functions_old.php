<?php

/* ------------------------------------*\
  External Modules/Files
  \*------------------------------------ */
// init custom posts
require_once('inc/custom-posts.php');

// add ACF Theme Options and Fields
require_once ('acf/acf-include.php');
/* ------------------------------------*\
  Theme Support/ Update Theme Setup
  \*------------------------------------ */
add_action('after_setup_theme', 'spraachen_theme_setup');

function spraachen_theme_setup() {
    // remove unused filter & actions
    remove_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
    remove_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
    remove_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type
    // Localisation Support
    load_child_theme_textdomain('spraachen-org', get_stylesheet_directory() . '/languages');

    $locale = get_locale();
    $locale_file = get_stylesheet_directory_uri() . "/languages/$locale.php";

    //Theme Support image sizes
    add_image_size('wpbs-article', 300, 100, true); //Images for articles
    //add_image_size('wpbs-tile', 225, 175, true);// partner logos ToDo: nach Entscheidung ob Gallery genutzt wird
    add_image_size('wpbs-banner', 570, 400, true); // Banner
    //add_theme_support('post-thumbnails', array('post', 'custom-post'));ToDo Proof or Remove
    //replace deprecated wp_title
    add_theme_support('title-tag');

    function filter_title_part($title) {
        $name = get_bloginfo('name');
        global $post;
        $title = get_the_title();
        $parent = get_the_title($post->post_parent);
        return array($name, $parent, $title);
    }

    function sak_document_title_separator($sep) {
        // change separator for singular blog post
        if (is_singular(array('post', 'page'))) {
            $sep = '|';
        }

        return $sep;
    }

    add_filter('document_title_separator', 'sak_document_title_separator', 10);

    //init scripts
    function my_scripts() {
        if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
            //check if mobile
            if (wp_is_mobile()) {

                wp_register_script('responsive', get_stylesheet_directory_uri() . '/library/js/responsive.js', array('jquery'), '1.2', true);
                wp_enqueue_script('responsive');
            }
            // tooltips
            wp_register_script('qtip', get_stylesheet_directory_uri() . '/library/js/jquery.qtip.min.js', array('jquery'), false, true);
            wp_enqueue_script('qtip');

            wp_register_script('qtipcall', get_stylesheet_directory_uri() . '/library/js/qtipcall.js', array('jquery', 'qtip'), false, true);
            wp_enqueue_script('qtipcall');
            // lightbox
            wp_register_script('nivo-lightbox', get_stylesheet_directory_uri() . '/library/js/nivo-lightbox.min.js', array('jquery'), false, true);
            wp_enqueue_script('nivo-lightbox');
            // custom
            wp_register_script('custom', get_stylesheet_directory_uri() . '/library/js/custom.js', array('jquery'), false, true);
            wp_enqueue_script('custom');
        }
    }

    add_action('wp_enqueue_scripts', 'my_scripts');

    //init scripts
    function my_styles() {
        if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
            wp_register_style('parent-style', get_template_directory_uri() . '/style.css');
            wp_enqueue_style('parent-style');
            //fonts
            wp_register_style('googlefonts', 'http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic|Titillium+Web:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic', 'style', '1.0', 'all');
            wp_enqueue_style('googlefonts');
            //icons
            wp_register_style('fontawseome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', 'style', '4.4.0', 'all');
            wp_enqueue_style('fontawseome');
            //tooltips
            wp_register_style('qtip', 'http://cdn.jsdelivr.net/qtip2/2.2.1/jquery.qtip.min.css', null, false, false);
            wp_enqueue_style('qtip');
            //lightbox
            wp_register_style('nivo-lightbox', get_stylesheet_directory_uri() . '/library/css/nivo-lightbox.css', 'style', '1.0', 'all', array());
            wp_enqueue_style('nivo-lightbox');
            wp_register_style('myStyle', get_stylesheet_directory_uri() . '/library/css/myStyle.css', 'style', '1.0', 'all', array('parent-style'));
            wp_enqueue_style('myStyle');
            wp_register_style('print', get_stylesheet_directory_uri() . '/library/css/print.min.css', 'style', '1.0', 'print', array('myStyle'));
            wp_enqueue_style('print');
        }
    }
    

    add_action('wp_enqueue_scripts', 'my_styles');

    //remove current sidebars
    add_action('init', 'remove_sidebars');
    if (!function_exists('remove_sidebars')) {

        function remove_sidebars() {
            unregister_sidebar('widget-area-1');
            unregister_sidebar('widget-area-2');
        }
    }

    //add current sidebars
    add_action('init', 'add_new_sidebars');
    if (!function_exists('add_new_sidebars')) {

        function add_new_sidebars() {
            register_sidebar(array(
                'name' => __('Language Switch'),
                'id' => 'languages',
                'description' => __("... contains the Language Switch"),
                'before_widget' => '<div id="languages-menu">',
                'after_widget' => '</div>'
            ));
        }

    }

    // HTML5 Blank navigation - alternative Versions
function sak_main_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="nav nav-tabs nav-justified">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}
    //additional menu - enable when needed
    add_action('init', 'my_menus');
    if (!function_exists('my_menus')) {

        function my_menus() {
            register_nav_menus(
                    array(
                        'service-menu' => 'Service Menu'
                    )
            );
        }

    }

    //trim the excerpt
    remove_filter('get_the_excerpt', 'wp_trim_excerpt');
    add_filter('get_the_excerpt', 'my_trim_excerpt');

    function my_trim_excerpt($text) {
        $raw_excerpt = $text;
        if ('' == $text) {
            $text = get_the_content('');
            $text = strip_shortcodes($text);
            $text = apply_filters('the_content', $text);
            $text = str_replace(']]>', ']]&gt;', $text);
            $text = strip_tags($text, '<em><strong><i><b><a><img><br><p><li><ul><ol><td><tr><tbody><table><h5><h4><h3><h2><h1>');
            $excerpt_length = apply_filters('excerpt_length', 55);
            $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
            $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
            if (count($words) > $excerpt_length) {
                array_pop($words);
                $text = implode(' ', $words);
                $text = $text . $excerpt_more;
            } else {
                $text = implode(' ', $words);
            }
        }
        return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
    }

    //modify the more-tag
    add_action('the_content_more_link', 'modify_read_more_link', 10, 2);

    function modify_read_more_link() {
        $moreLink = __('continue reading', 'spraachen-org');
        return '<a class="more-link" href="' . get_permalink() . '">' . $moreLink . '</a>';
    }

    //show only language switch if there is an equivalent
    add_filter('the_content', 'is_translation_available', 11);

    function is_translation_available($content) {
        if (!is_page())
            return $content;
        global $polylang;
        $translationIds = $polylang->model->get_translations('post', get_the_ID());
//        $translationIds = PLL()->model->post->get_translations('post', get_the_ID());
        $currentLang = pll_get_post(get_the_ID(), pll_current_language());
        $newContent = '<div class="languages-menu">';

        foreach ($translationIds as $key => $translationID) {
            if ($translationID != $currentLang) {

                $availableLang = $polylang->model->get_languages_list();
                #$availableLang = PLL()->model->post->get_languages_list();
                foreach ($availableLang as $lang) {
                    if ($key == $lang->slug) {

                        $newContent.= '<a class="post-translation" href="' . get_permalink($translationID) . '">';
                        //$newContent.= $lang->slug;
                        if ($lang->slug == 'zh') {
                            $newContent.= '文';
                        } else {
                            $newContent.= $lang->slug;
                        }
                        //$newContent. = ($lang->slug == 'zh') ? "文" : $lang->slug;
                        $newContent.= '</a>';
                    }
                }
            }
        }
        $newContent.= '</div>';
        $newContent.= $content;
        return $newContent;
    }

}

//additional functions - maybe remove later
add_filter('wp_kses_allowed_html', 'author_cap_filter', 1, 1);

function author_cap_filter($allowedposttags) {

//Here put your conditions, depending your context
    if (!current_user_can('publish_posts'))
        return $allowedposttags;

// Here add tags and attributes you want to allow

    $allowedposttags['iframe'] = array(
        'align' => true,
        'width' => true,
        'height' => true,
        'frameborder' => true,
        'name' => true,
        'src' => true,
        'id' => true,
        'class' => true,
        'style' => true,
        'scrolling' => true,
        'marginwidth' => true,
        'marginheight' => true,
    );
    return $allowedposttags;
}

//allow svg upload
function svg_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'svg_mime_types');

//add the current browserclass in body
function mv_browser_body_class($classes) {
    global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
    if ($is_lynx)
        $classes[] = 'lynx';
    elseif ($is_gecko)
        $classes[] = 'gecko';
    elseif ($is_opera)
        $classes[] = 'opera';
    elseif ($is_NS4)
        $classes[] = 'ns4';
    elseif ($is_safari)
        $classes[] = 'safari';
    elseif ($is_chrome)
        $classes[] = 'chrome';
    elseif ($is_IE) {
        $classes[] = 'ie';
        if (preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
            $classes[] = 'ie' . $browser_version[1];
    } else
        $classes[] = 'unknown';
    if ($is_iphone)
        $classes[] = 'iphone';
    if (stristr($_SERVER['HTTP_USER_AGENT'], "mac")) {
        $classes[] = 'osx';
    } elseif (stristr($_SERVER['HTTP_USER_AGENT'], "linux")) {
        $classes[] = 'linux';
    } elseif (stristr($_SERVER['HTTP_USER_AGENT'], "windows")) {
        $classes[] = 'windows';
    }
    return $classes;
}

add_filter('body_class', 'mv_browser_body_class');

//search Filter only for pages and posts
add_filter('pre_get_posts', 'SearchFilter');

function SearchFilter($query) {
    if (!is_admin()) {
        if ($query->is_search) {
            $query->set('post_type', 'page');
        }
        return $query;
    }
}

?>