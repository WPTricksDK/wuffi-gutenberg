<?php

/**
 * Add "Copy" link to posts/pages
 */
function copy_post_link($actions, $post)
{

  if (!current_user_can('edit_posts')) {
    return $actions;
  }

  $url = wp_nonce_url(
    add_query_arg(['action' => 'copy_post', 'post' => $post->ID], 'admin.php'),
    basename(__FILE__),
    'copy_nonce'
  );

  $actions['copy'] = '<a href="' . $url . '" rel="permalink">Copy</a>';

  return $actions;
}
add_filter('post_row_actions', 'copy_post_link', 10, 2);
add_filter('page_row_actions', 'copy_post_link', 10, 2);


/**
 * Perform post copy
 */
function copy_post()
{

  if (empty($_GET['post']) || !isset($_GET['copy_nonce']) || !wp_verify_nonce($_GET['copy_nonce'], basename(__FILE__))) {
    wp_die('Invalid request');
  }

  $post_id = absint($_GET['post']);
  $post = get_post($post_id);

  if ($post) {

    $copy = wp_insert_post([
      'comment_status' => $post->comment_status,
      'ping_status'    => $post->ping_status,
      'post_author'    => get_current_user_id(),
      'post_content'   => $post->post_content,
      'post_excerpt'   => $post->post_excerpt,
      'post_name'      => $post->post_name,
      'post_parent'    => $post->post_parent,
      'post_password'  => $post->post_password,
      'post_status'    => 'draft',
      'post_title'     => $post->post_title . ' (copy)',
      'post_type'      => $post->post_type,
      'to_ping'        => $post->to_ping,
      'menu_order'     => $post->menu_order
    ]);

    $taxonomies = get_object_taxonomies(get_post_type($post)); // Returns array of taxonomy names for post type, ex array("category", "post_tag");
    if ($taxonomies) {
      foreach ($taxonomies as $taxonomy) {
        $terms = wp_get_object_terms($post_id, $taxonomy, ['fields' => 'slugs']);
        wp_set_object_terms($copy, $terms, $taxonomy, false);
      }
    }

    // Duplicate all post meta
    $meta = get_post_meta($post_id);
    if ($meta) {
      foreach ($meta as $meta_key => $meta_values) {

        if ('_wp_old_slug' == $meta_key) {
          continue;
        }

        foreach ($meta_values as $meta_value) {
          add_post_meta($copy, $meta_key, $meta_value);
        }
      }
    }
    
    // Copy ACF data if plugin is installed
    if (class_exists('ACF')) {
      
      $acf = get_fields($post_id) ?? [];

      foreach ($acf as $selector => $value) {
        update_field($selector, $value, $copy);
      }

    }

    wp_safe_redirect(
      add_query_arg(
        ['post_type' => ('post' !== get_post_type($post) ? get_post_type($post) : false), 'saved' => 'post_copy_created'],
        admin_url('edit.php')
      )
    );
  } else {
    wp_die('Content copy failed');
  }
}
add_action('admin_action_copy_post', 'copy_post');


/**
 * Output post copy success message
 */
function copy_admin_notice()
{

  $screen = get_current_screen();
  if ('edit' !== $screen->base) {
    return;
  }

  if (isset($_GET['saved']) && 'post_copy_created' == $_GET['saved']) {
    echo '<div class="notice notice-success is-dismissible"><p>Content was copied successfully</p></div>';
  }
}
add_action('admin_notices', 'copy_admin_notice');
