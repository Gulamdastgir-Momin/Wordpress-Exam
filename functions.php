<?php
/**
 * Enqueue scripts and styles.
 */
function wpbootstrap_enqueue_styles()
{
    wp_register_style('bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap');

    wp_register_style("css", get_stylesheet_directory_uri() . '/assets/css/style.css');
    wp_enqueue_style('css');

    wp_register_style("header_css", get_stylesheet_directory_uri() . '/assets/css/header.css');
    wp_enqueue_style('header_css');

    wp_register_style("media_css", get_stylesheet_directory_uri() . '/assets/css/media.css');
    wp_enqueue_style('media_css');

    wp_register_style("swiper-min_css", get_stylesheet_directory_uri() . '/assets/css/swiper-bundle.min.css');
    wp_enqueue_style('swiper-min_css');

    wp_register_script('jquery', get_stylesheet_directory_uri() . "/assets/js/jquery-3.6.3.min.js");
    wp_enqueue_script('jquery');

    wp_register_script('bootstrap', get_stylesheet_directory_uri() . "/assets/js/bootstrap.bundle.min.js");
    wp_enqueue_style('bootstrap');

    wp_register_script('jquery_min', get_stylesheet_directory_uri() . "/assets/js/jquery.min.js");
    wp_enqueue_style('jquery_min');

    wp_register_script('setting', get_stylesheet_directory_uri() . "/assets/js/setting.js");
    wp_enqueue_script('setting');

    wp_register_script('swiper_js', get_stylesheet_directory_uri() . "/assets/js/swiper-bundle.min.js");
    wp_enqueue_script('swiper_js');

    wp_enqueue_script('ajax', get_stylesheet_directory_uri() . '/assets/js/ajax.js', array('jquery'));
    wp_localize_script('ajax', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'wpbootstrap_enqueue_styles');

/*
 * created load more post function
 */
function load_more_posts()
{
    $all_posts = new WP_Query(array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_pages' => -1,
        'paged' => 2
    ));
    $response = '';
    if ($all_posts->have_posts()) {
        ob_start();
        while ($all_posts->have_posts()) {
            $all_posts->the_post();
            $response .= get_template_part('template-parts/blog-card');
        }
        $output = ob_get_contents();
        ob_end_clean();
    }
    echo wp_send_json($output);
    wp_reset_postdata();
    exit();
}
add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');


/* Rest Api for latest post */
function get_latest_post(){
    $posts = new WP_Query(array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_pages' => 3,
        'paged' => 1
    ));
    wp_send_json($posts);
    exit();
}
add_action('rest_api_init',function(){
    register_rest_route('exam/v2','/post_info',array(
        'methods' => 'GET',
        'callback' => 'get_latest_post'
    ));
});

/*
* Custom Service Post Type
*/
function create_service_post_page()
{
    $labels = [
        'name' => __('Service','wpmu'),
        'singular_name' => __('Service','wpmu'),
        'add_new' => __('Add New','wpmu'),
        'add_new_item' => __('Add New Service','wpmu'),
        'edit_item' => __('Edit Service','wpmu'),
        'new_item' => __('New Service','wpmu'),
        'all_items' => __('All Services','wpmu'),
        'view_items' => __('View Services','wpmu'),
        'search_items' => __('Search Services','wpmu'),
        'not_found' => __('No Services Found','wpmu'),
        'not_found_in_trash' => __('No Services found in trash','wpmu'),
        'menu_name'=> __('Service','wpmu')
    ];
    register_post_type(
        'Service',
        array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'custom-fields',
                'thumbnail',
                'page-attributes'
            ),
            'taxonomies' => array(
                'Service Category',
                'category',
            ),
            'menu_icon' => 'dashicons-admin-generic',
            'menu_position' => 5,
            'rewrite'=> array('slug'=>'service')
        )
        );
}

add_action('init','create_service_post_page');