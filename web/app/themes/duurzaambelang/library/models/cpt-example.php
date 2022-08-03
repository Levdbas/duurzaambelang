<?php

/**
 * Custum post type file
 *
 * @package WordPress
 * @subpackage WP_Lemon\Child
 */

namespace WP_Lemon\Child\Models;

/**
 * Example post type
 *
 * @return void
 */
function cpt_example()
{
	$labels = [
		'name'                  => _x('Post Types', 'Post Type General Name', 'wp-lemon-child'),
		'singular_name'         => _x('Post Type', 'Post Type Singular Name', 'wp-lemon-child'),
		'menu_name'             => __('Post Types', 'wp-lemon-child'),
		'name_admin_bar'        => __('Post Type', 'wp-lemon-child'),
		'all_items'             => __('All Items', 'wp-lemon-child'),
		'add_new_item'          => __('Add New Item', 'wp-lemon-child'),
		'add_new'               => __('Add New', 'wp-lemon-child'),
		'new_item'              => __('New Item', 'wp-lemon-child'),
		'edit_item'             => __('Edit Item', 'wp-lemon-child'),
		'update_item'           => __('Update Item', 'wp-lemon-child'),
		'view_item'             => __('View Item', 'wp-lemon-child'),
	];
	$args = [
		'label'                  => __('Post Type', 'wp-lemon-child'),
		'description'            => __('Post Type Description', 'wp-lemon-child'),
		'labels'                 => $labels,
		'supports'               => ['title', 'editor', 'thumbnail'],
		'taxonomies'             => ['category'],
		'hierarchical'           => false,
		'public'                 => true,
		'show_ui'                => true,
		'show_in_menu'           => true,
		'menu_position'          => 5,
		'rewrite'                => ['slug' => 'example'],
		'menu_icon'              => 'dashicons-businessman',
		'show_in_admin_bar'      => true,
		'show_in_nav_menus'      => true,
		'show_in_rest'           => true,
		'can_export'             => true,
		'has_archive'            => false,
		'exclude_from_search'    => false,
		'publicly_queryable'     => true,
		'capability_type'        => 'page',
		'maybe_has_archive_page' => true,
		'enable_overview_block'  => true,
		'enable_latest_block'    => true,
	];
	register_post_type('example', $args); // unique singular post type name.
}
// add_action('init', __NAMESPACE__ . '\\cpt_example', 0);
