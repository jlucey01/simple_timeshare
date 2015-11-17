<?php
/*
* Plugin Name: Simple Timeshare
* Plugin URI: http://jm-pages.com/
* Description: This plugin provides Simple Timeshare entry and display.
* Version: 1.0 
* Author: John Lucey
* Author URI: http://jm-pages.com
* License: GPLv2 or later
*/

/* Register the Simple Timeshare Post Type*/
 
function register_cpt_simple_timeshare() {
 
    $labels = array(
        'name' => _x( 'Timeshare', 'timeshare' ),
        'singular_name' => _x( 'Timeshare', 'timeshare' ),
        'add_new' => _x( 'Add New', 'timeshare' ),
        'add_new_item' => _x( 'Add New Property', 'timeshare' ),
        'edit_item' => _x( 'Edit property', 'timeshare' ),
        'new_item' => _x( 'New Property', 'timeshare' ),
        'view_item' => _x( 'View Property', 'timeshare' ),
        'search_items' => _x( 'Search Properties', 'timeshare' ),
        'not_found' => _x( 'No Properties found', 'timeshare' ),
        'not_found_in_trash' => _x( 'No Properties found in Trash', 'timeshare' ),
        'parent_item_colon' => _x( 'Parent Property Review:', 'timeshare' ),
        'menu_name' => _x( 'Simple Timeshare', 'timeshare' ),
    );
 
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Properties filterable by status',
        'supports' => array( 'title', 'editor', 'thumbnail'),
        'taxonomies' => array( 'status' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-multisite',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
 
    register_post_type( 'timeshare', $args );
}
 

add_action( 'init', 'register_cpt_simple_timeshare' );



function status_taxonomy() {
    register_taxonomy(
        'status',
        'timeshare',
        array(
            'hierarchical' => true,
            'label' => 'Status',
            'query_var' => true,
            'rewrite' => array(
            'slug' => 'status',
            'with_front' => false
            )
        )
    );
}
add_action( 'init', 'status_taxonomy');

add_action( 'init', 'my_custom_init' );
function my_custom_init() {
    remove_post_type_support( 'timeshare', 'title' );
}





include("meta_box.php");
include("timeshare_options.php")

?>