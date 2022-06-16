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

/**
 * Add support for custom <li> classes in wp_nav_menu()
 */
function nav_menu_item_class($classes, $item, $args) {
  if (isset($args->item_class)) { $classes[] = $args->item_class; }
  return $classes;
}
add_filter('nav_menu_css_class', 'nav_menu_item_class', 1, 3);


/**
 * Add support for custom <a> classes in wp_nav_menu()
 */
function nav_menu_anchor_class($classes, $item, $args) {
  if (isset($args->anchor_class)) { $classes['class'] = $args->anchor_class; }
  return $classes;
}
add_filter('nav_menu_link_attributes', 'nav_menu_anchor_class', 1, 3);
