<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

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


/* ------------------------------------*\
  Theme Support
  \*------------------------------------ */

if (!isset($content_width)) {
    $content_width = 1170;
}

if (function_exists('add_theme_support')) {
	//HTML % support
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
    add_image_size('wpbs-article', 300, 100, true);
    add_image_size('wpbs-banner', '', 200, true);
    
    //add SVG
    function add_svg($svg_mime) {
        $svg_mime['svg'] = 'image/svg+xml';
        return $svg_mime;
    }

    add_filter('upload_mimes', 'add_svg');


    //replace deprecated wp_titlechr
    add_theme_support('title-tag');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    add_theme_support('custom-background', array(
        'default-color' => 'FFF',
        'default-image' => get_template_directory_uri() . '/img/default/default-bg.png'
    ));
    
    //Add support for Custom Logo
    add_theme_support('custom-logo', array(
        'height' => 184,
        'width' => 375,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description'),
    ));

    /***** End Test Hooks *******************/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/* ------------------------------------*\
  Functions
  \*------------------------------------ */

//Output Custom Logo
function theme_prefix_the_custom_logo() {

    if (function_exists('the_custom_logo')) {
        the_custom_logo();
    }
}
// Fall Back Custom Logo
function sak_custom_logo_fb(){
    if(the_custom_logo()):
                        echo '<h1>Hier kommt das Logo hin</h1>';
                    else :
                        echo '<h1>Wo ist das Logo?</h1>';
                    endif;
                    
}

//replace deprecated wp_title
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


// HTML5 Blank navigation
function html5blank_nav() {
    wp_nav_menu(
            array(
                'theme_location' => 'main-menu',
                'menu' => '',
                'container' => 'div',
                'container_class' => 'menu-{menu slug}-container',
                'container_id' => '',
                'menu_class' => 'menu',
                'menu_id' => '',
                'echo' => true,
                'fallback_cb' => 'wp_page_menu',
                'before' => '',
                'after' => '',
                'link_before' => '',
                'link_after' => '',
                'items_wrap' => '<ul class="nav nav-tabs nav-justified">%3$s</ul>',
                'depth' => 0,
                'walker' => ''
            )
    );
}


// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts() {
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

        wp_register_script('conditionizr', get_template_directory_uri() . '/library/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
        //wp_enqueue_script('conditionizr'); // Enqueue it!

        wp_register_script('modernizr', get_template_directory_uri() . '/library/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        //wp_enqueue_script('modernizr'); // Enqueue it!

        wp_register_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array(), '3.3.6', true); // Modernizr
        wp_enqueue_script('bootstrap'); // Enqueue it!

//        if (wp_is_mobile()) {
//
//           wp_register_script('responsive', get_stylesheet_directory_uri() . '/library/js/responsive.js', array('jquery'), '1.2', true);
//           wp_enqueue_script('responsive');
//            
//        }
        // tooltips
        wp_register_script('qtip', get_stylesheet_directory_uri() . '/library/js/jquery.qtip.min.js', array('jquery'), false, true);
        wp_enqueue_script('qtip');

        wp_register_script('qtipcall', get_stylesheet_directory_uri() . '/library/js/qtipcall.js', array('jquery', 'qtip'), false, true);
        wp_enqueue_script('qtipcall');
        
        // lightbox
        wp_register_script('nivo-lightbox', get_stylesheet_directory_uri() . '/library/js/nivo-lightbox.min.js', array('jquery'), false, true);
        wp_enqueue_script('nivo-lightbox');
        
        // maps
        //wp_register_script('googleapi', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', array('jquery'), false, true);
        //wp_enqueue_script('googleapi');
        
        //wp_register_script('custom-map', get_stylesheet_directory_uri() . '/library/js/custom-maps.js', array('jquery','googleapi'), false, true);
        //wp_enqueue_script('custom-map');
        
        wp_register_script('webfontloader','https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js', array ('jquery'), false, false);
        wp_enqueue_script('webfontloader');
        
        wp_register_script('fonts',get_stylesheet_directory_uri() . '/library/js/fonts.js', array ('jquery'), false, false);
        wp_enqueue_script('fonts');

        wp_register_script('html5blankscripts', get_template_directory_uri() . '/library/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('html5blankscripts'); // Enqueue it!
    }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts() {
    if (is_page('pagenamehere')) {
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
       // wp_enqueue_script('scriptname'); // Enqueue it!
    }
}

// Load HTML5 Blank styles
function html5blank_styles() {
    wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!
    //bootstrap
    wp_register_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css', array(), '3.3.6', 'all');
    wp_enqueue_style('bootstrap'); // Enqueue it!

    //icons
    wp_register_style('fontawseome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', 'style', '4.4.0', 'all');
    wp_enqueue_style('fontawseome');
    //tooltips
    wp_register_style('qtip', 'http://cdn.jsdelivr.net/qtip2/2.2.1/jquery.qtip.min.css', null, false, false);
    wp_enqueue_style('qtip');
    //lightbox
    wp_register_style('nivo-lightbox', get_stylesheet_directory_uri() . '/library/css/nivo-lightbox.css', 'style', '1.0', 'all', array());
    wp_enqueue_style('nivo-lightbox');

    wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!
    wp_register_style('screen', get_stylesheet_directory_uri() . '/library/css/screen.css', 'style', '1.0', 'all', array('html5blank'));
    wp_enqueue_style('screen');
    wp_register_style('print', get_stylesheet_directory_uri() . '/library/css/print.min.css', 'style', '1.0', 'print', array('screen'));
    wp_enqueue_style('print');
}

// Register HTML5 Blank Navigation
function register_html5_menu() {
    register_nav_menus(array(// Using array to specify more menus if needed
        'main-menu' => __('Main Menu', 'html5blank'), // Main Navigation
        'service-menu' => __('Service Menu', 'html5blank'), // Sidebar Navigation
        'footer-links' => __('Footer Links', 'html5blank'), // Extra Navigation if needed (duplicate as many as you need!)
         'off-canvas' => __('Responsive', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '') {
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var) {
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist) {
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes) {
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar')) {
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => __('Language Switch'),
        'id' => 'languages',
        'description' => __("... contains the Language Switch"),
        'before_widget' => '<div id="languages-menu">',
        'after_widget' => '</div>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination() {
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) { // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length) {
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '') {
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more) {
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar() {
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag) {
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions($html) {
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar($avatar_defaults) {
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments() {
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND ( get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ('div' == $args['style']) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty($args['has_children']) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
    <?php if ('div' != $args['style']) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
        <div class="comment-author vcard">
        <?php if ($args['avatar_size'] != 0) echo get_avatar($comment, $args['180']); ?>
        <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
        </div>
            <?php if ($comment->comment_approved == '0') : ?>
            <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
            <br />
        <?php endif; ?>

        <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)) ?>">
        <?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'), '  ', '');
    ?>
        </div>

            <?php comment_text() ?>

        <div class="reply">
        <?php comment_reply_link(array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
        </div>
            <?php if ('div' != $args['style']) : ?>
        </div>
        <?php endif; ?>
        <?php
    }
    

//Trim the excerpt
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

    //Shortcodes in ACF
function my_acf_format_value_for_api($value, $post_id, $field) {
    return str_replace(']]>', ']]>', apply_filters('the_content', $value));
}

function my_on_init() {
    if (!is_admin()) {
        add_filter('acf/format_value_for_api/type=wysiwyg', 'my_acf_format_value_for_api', 10, 3);
    }
}
add_action('init', 'my_on_init');

/* ------------------------------------*\
      Actions + Filters + ShortCodes
      \*------------------------------------ */

// Add Actions
    #add_action('after_setup_theme', 'sak_custom_logo');
    
    add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
    add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
    add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
    add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
    add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
    add_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type
    add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
    add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination
// Remove Actions
    remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
    remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
    remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
    remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
    remove_action('wp_head', 'index_rel_link'); // Index link
    remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
    remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
    remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
    remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    remove_action('wp_head', 'rel_canonical');
    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
    add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
    add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
    #add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
    #add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
    add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
    add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
    #add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
    #add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
    add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
#add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
    add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
    add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
    add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images
// Remove Filters
    remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether
// Shortcodes
    #add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
    #add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.
// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

    /* ------------------------------------*\
      Custom Post Types
      \*------------------------------------ */

// Create 1 Custom Post type for a Demo, called HTML5-Blank
    function create_post_type_html5() {
        register_taxonomy_for_object_type('category', 'html5-blank'); // Register Taxonomies for Category
        register_taxonomy_for_object_type('post_tag', 'html5-blank');
        register_post_type('html5-blank', // Register Custom Post Type
                array(
            'labels' => array(
                'name' => __('HTML5 Blank Custom Post', 'html5blank'), // Rename these to suit
                'singular_name' => __('HTML5 Blank Custom Post', 'html5blank'),
                'add_new' => __('Add New', 'html5blank'),
                'add_new_item' => __('Add New HTML5 Blank Custom Post', 'html5blank'),
                'edit' => __('Edit', 'html5blank'),
                'edit_item' => __('Edit HTML5 Blank Custom Post', 'html5blank'),
                'new_item' => __('New HTML5 Blank Custom Post', 'html5blank'),
                'view' => __('View HTML5 Blank Custom Post', 'html5blank'),
                'view_item' => __('View HTML5 Blank Custom Post', 'html5blank'),
                'search_items' => __('Search HTML5 Blank Custom Post', 'html5blank'),
                'not_found' => __('No HTML5 Blank Custom Posts found', 'html5blank'),
                'not_found_in_trash' => __('No HTML5 Blank Custom Posts found in Trash', 'html5blank')
            ),
            'public' => true,
            'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail'
            ), // Go to Dashboard Custom HTML5 Blank post for supports
            'can_export' => true, // Allows export in Tools > Export
            'taxonomies' => array(
                'post_tag',
                'category'
            ) // Add Category and Post Tags support
        ));
    }

    /* ------------------------------------*\
      ShortCode Functions
      \*------------------------------------ */
      #include('inc/post-gallery-2.php');


