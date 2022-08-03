<?php

/**
 * ACF Block declaration
 *
 * @package WordPress
 * @subpackage WP_Lemon\Child
 */

namespace WP_Lemon\Child\Blocks;

use HighGround\Bulldozer\BlockRenderer;

/**
 * Example block that can be copied for making extra blocks.
 * Change the HomeHero_Block class on rule 11 and below the class and uncomment the class call.
 * Don't include the render callback in the block register since we add that in our main BlockRenderer abstract class.
 */
class HomeHero_Block extends BlockRenderer
{


	/**
	 * Register a new ACF Block.
	 *
	 * The array is passed to the acf_register_block_type() function that registers the block with ACF.
	 *
	 * @link https://www.advancedcustomfields.com/resources/acf_register_block_type/
	 * @return array
	 */
	public function block_register(): array
	{
		$block = [
			'name'        => 'home-hero',
			'title'       => __('Home Hero', 'wp-lemon-child'),
			'description' => __('Hero starter on homepage', 'wp-lemon-child'),
			'category'    => 'home',
			'align'       => 'full',
			'post_types'   => ['page'],
			'icon'        => 'welcome-view-site',
			'keywords'    => [
				_x('Keyword', 'Block keyword', 'wp-lemon-child'),
				_x('Keyword', 'Block keyword', 'wp-lemon-child'),
				_x('Keyword', 'Block keyword', 'wp-lemon-child'),
				_x('Keyword', 'Block keyword', 'wp-lemon-child'),
			],
			'supports'    => [
				'mode'  => false,
				'align' => false,
				'jsx'   => true,
			],
		];
		return $block;
	}


	/**
	 * Extend the base context of our block.
	 * With this function we can add for home-hero a query or
	 * other custom content.
	 *
	 * @param array $context      Holds the block data.
	 * @return array  $context    Returns the array with the extra content that merges into the original block context.
	 */
	public function block_context($context): array
	{
		$allowed_blocks  = ['core/heading'];

		$args = [
			// 'fluid'       => true,
			'InnerBlocks' => '<InnerBlocks allowedBlocks="' . esc_attr(wp_json_encode($allowed_blocks)) . '" />',
			'video'		=> get_stylesheet_directory_uri() . '/resources/videos/loop.mp4',
		];

		return array_merge($context, $args);
	}


	/**
	 * Register fields to the block.
	 *
	 * The array is passed to the acf_register_block_type() function that registers the block with ACF.
	 *
	 * @link https://github.com/StoutLogic/acf-builder
	 * @return FieldsBuilder
	 */
	public function add_fields(): object
	{
		$this->registered_fields
			->addImage(
				'image',
				[
					'label' => _x('Image', 'Block field label', 'wp-lemon'),
					'instructions' => '',
					'return_format' => 'id',
					'preview_size' => 'thumbnail',
					'library' => 'all',
					'wpml_cf_preferences' => 1,
				]
			);
		return $this->registered_fields;
	}
}

/**
 * Enable the class
 */
new HomeHero_Block();
