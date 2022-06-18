<?php

/**
 * Testing "block templating"
 * NEEDS REWRITING!
 */
/*add_filter('allowed_block_types', function($block_types, $post) {

    $allowed_blocks = [
      'core/paragraph',
      'core/buttons',
    ];

    if($post->post_type == 'page') {
      return $allowed_blocks;
    }
	  return $block_types;
  
}, 10, 2);*/

/**
 * Unregister default Pattern Categories
 */
function wuffi_unregister_pattern_categories() {
    unregister_block_pattern_category('buttons');
    unregister_block_pattern_category('columns');
    unregister_block_pattern_category('gallery');
    unregister_block_pattern_category('header');
    unregister_block_pattern_category('text');
    unregister_block_pattern_category('query');
    unregister_block_pattern_category('featured');
}
add_action('init', 'wuffi_unregister_pattern_categories');

/**
 * Register pattern category
 */
function wuffi_register_pattern_category() {
    if ( function_exists( 'register_block_pattern_category' ) ) {
        register_block_pattern_category(
          'hero',
          array( 'label' => __( 'Wuffi Patterns', 'wuffi' ) )
       );
    }
}
add_action('init', 'wuffi_register_pattern_category');