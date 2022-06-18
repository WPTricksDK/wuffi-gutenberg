<?php

function wuffi_heroblock() {
	wp_enqueue_script('wuffi_heroblock', get_template_directory_uri() . '/public/hero.js', ['wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor']);
}
add_action('enqueue_block_assets', 'wuffi_heroblock');