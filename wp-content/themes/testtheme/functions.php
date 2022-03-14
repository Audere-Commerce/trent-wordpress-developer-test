<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( 'twentytwenty' ),
        wp_get_theme()->get('1.0.0')
    );
}

add_action( 'wp_footer', 'add_test_theme_script' );
function add_test_theme_script() {
    wp_enqueue_script(
        'test-theme',
        get_stylesheet_directory_uri() . '/assets/js/test-theme.js',
        array('jquery')
    );
}

function wporg_custom_post_type() {
    register_post_type('faq',
        array(
            'labels'      => array(
                'name'          => __('FAQs', 'faqs'),
                'singular_name' => __('FAQ', 'faqs'),
            ),
            'public'      => true,
            'has_archive' => true,
        )
    );
}
add_action('init', 'custom_post_faq');

function custom_post_faq() {
    $labels = array(
        'name'               => _x( 'FAQs', 'post type general name' ),
        'singular_name'      => _x( 'Faq', 'post type singular name' ),
        'add_new'            => _x( 'Add New', 'book' ),
        'add_new_item'       => __( 'Add New FAQ' ),
        'edit_item'          => __( 'Edit FAQ' ),
        'new_item'           => __( 'New FAQ' ),
        'all_items'          => __( 'All FAQs' ),
        'view_item'          => __( 'View FAQ' ),
        'search_items'       => __( 'Search FAQ' ),
        'not_found'          => __( 'No FAQs found' ),
        'not_found_in_trash' => __( 'No FAQs found in the Trash' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'FAQs'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Holds our FAQs and FAQ specific data',
        'menu_icon'     => 'dashicons-format-aside',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array( 'title', 'editor', 'image' ),
        'has_archive'   => false,
    );
    register_post_type( 'faq', $args );
}
add_action( 'init', 'custom_post_faq' );

include('custom-shortcodes.php');