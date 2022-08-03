<?php

/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage WP_Lemon\Child
 */

namespace WP_Lemon\Child;

use HighGround\Bulldozer\Autoloader;
use HighGround\Bulldozer\Bulldozer;
use WP_Lemon\Child\Classes\WP_Lemon_Child_Site;

/**
 * Start loading files once wp-lemon is completely loaded.
 *
 * @return void
 */
function parent_loaded()
{
	$autoloader = new Autoloader();
	$autoloader->child(['models', 'blocks']); // order in which our folders get autoloaded.

	$includes = [
		'library/classes/class-child-site.php',
		'library/child-setup.php',
		'library/hooks.php',
	];

	foreach ($includes as $file) {
		$filepath = locate_template($file);
		if (!$filepath) {
			/* translators: %s: file to include */
			Bulldozer::frontend_error(sprintf(__('Error locating %s for inclusion', 'wp-lemon'), $file));
		}
		require_once $filepath;
	}
	unset($file, $filepath);

	new WP_Lemon_Child_Site();
}
add_action('parent_loaded', __NAMESPACE__ . '\\parent_loaded');
