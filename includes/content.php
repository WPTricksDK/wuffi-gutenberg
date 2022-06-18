<?php

/**
 * Register menus
 */
register_nav_menus([
  'primary' => 'Primary',
  'footer' => 'Footer',
]);


/**
 * Add theme support
 */
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('woocommerce');


/**
 * Add custom image sizes
 */
add_image_size('icon', 64, 64);
add_image_size('small', 160, 160);
