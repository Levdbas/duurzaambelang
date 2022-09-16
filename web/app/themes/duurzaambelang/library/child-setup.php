<?php

/**
 * The starting point for the your child theme.
 *
 * @package WordPress
 * @subpackage WP_Lemon\Child
 */

namespace WP_Lemon\Child;

use HighGround\Bulldozer\Site_Icons;

/**
 * Theme initialize
 *
 * Fires on website load after the parent theme is loaded.
 *
 * - default text Domain
 * - navigation menus
 * - theme support
 *
 * @since 2.0
 * @return void
 */
function theme_initialize()
{
	load_child_theme_textdomain('wp-lemon-child', get_stylesheet_directory() . '/resources/languages/');
}
add_action('after_setup_theme', __NAMESPACE__ . '\\theme_initialize');

/**
 * Setup Site icons and manifest.
 */
$icons                   = new Site_Icons();
$icons->short_name       = 'Duurzaam Belang';
$icons->background_color = '#35472f';       // must be hex color.
$icons->theme_color      = '#35472f';       // must be hex color.
