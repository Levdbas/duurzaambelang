<?php

/**
 * Extend parent site context
 *
 * @package WordPress
 * @subpackage WP_Lemon\Child
 */

namespace WP_Lemon\Child\Classes;

use WP_Lemon\Classes\WP_Lemon_Site;

use function HighGround\Bulldozer\helpers\asset;

/**
 * Extend the parent site object and maybe override some methods.
 */
class WP_Lemon_Child_Site extends WP_Lemon_Site
{
   /**
    * Fires parents constructor and adds child context.
    */
   public function __construct()
   {
      parent::__construct();
      add_filter('timber/context', array($this, 'add_child_context'));
   }

   /**
    * Add our new context to the Site Object.
    *
    * @param array $parent_context  The parent context.
    * @return array
    */
   public function add_child_context($parent_context): array
   {
      $child_context = [];
      $context = array_merge($parent_context, $child_context);
      return $context;
   }

   /*    public static function get_logos(): array
   {
      parent::$logos = [
         'header' => [
            'width'  => '140',
            'height' => '75',
         ],
         'footer' => [
            'width'  => '260',
            'height' => '91',
         ],
      ];

      return parent::$logos;
   } */
}
