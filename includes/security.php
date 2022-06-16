<?php

/**
 * Only allow administrators in wp-admin
 */
function restrict_wp_admin() {

  global $pagenow;

  if (!in_array($pagenow, ['admin-post.php', 'admin-ajax.php'])) {

    $user = wp_get_current_user();

    if (!$user || !$user->roles || !in_array('administrator', $user->roles)) {
      wp_die('Sorry, only administrators are allowed in this part of the website');
    }

  }

}
add_action('admin_init', 'restrict_wp_admin');


/**
 * Only show toolbar to administrators
 */
function restrict_toolbar() {

  $user = wp_get_current_user();

  $toolbar = ($user && $user->roles && in_array('administrator', $user->roles));
  show_admin_bar($toolbar);

}
add_action('after_setup_theme', 'restrict_toolbar');