<?php

define('THEME_VERSION', wp_get_theme()->Version);
define('THEME_PATH', get_template_directory());


/**
 * Start session
 */
if (!session_id()) { 
  session_start(); 
}


/**
 * Woocommerce helpers
 */
if (class_exists('WooCommerce')) {

  // Ensure WC session
  if (class_exists('WC_Session_Handler') && !WC()->session) {
    WC()->session = new WC_Session_Handler();
    WC()->session->init();  
  }

  // Use cookie instead of $_SESSION
	WC()->session->set_customer_session_cookie(true); 

  // Force Stripe to use 3D-Secure
  add_filter('wc_stripe_require_3ds', '__return_true');

}


/**
 * Run Composer autoload
 */
if (file_exists(THEME_PATH.'/vendor')) {
  require_once 'vendor/autoload.php';
}


/**
 * Automatically load files
 */
$autoload = ['/includes/View.php', '/includes/*.php', '/includes/*/*.php', '/blocks/*/*/*.php'];
foreach ($autoload as $path) {

  $relative = THEME_PATH.$path;
  $files = (is_file($relative)) ? [$relative] : glob($relative);

  foreach($files as $file) { 
    require_once $file; 
  }

}


/**
 * Load .env variables
 */
loadEnv();


/**
 * Enqueue CSS and JS files
 */
function include_scripts() {
  wp_enqueue_style('app', get_template_directory_uri().'/public/app.css', [], THEME_VERSION);
  wp_enqueue_script('app', get_template_directory_uri().'/public/app.js', [], THEME_VERSION, true);
}
add_action('wp_enqueue_scripts', 'include_scripts');

/**
 * Testing "block templating"
 * NEEDS REWRITING!
 */
add_filter('allowed_block_types', function($block_types, $post) {

    $allowed_blocks = [
      'core/paragraph',
      'core/buttons'
    ];

    if($post->post_type == 'page') {
      return $allowed_blocks;
    }
	  return $block_types;
  
}, 10, 2);