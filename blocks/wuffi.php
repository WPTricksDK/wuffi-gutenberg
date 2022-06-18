<?php

function wuffi_testblock() {
	wp_enqueue_script('wuffi_testblock', get_template_directory_uri() . '/public/wuffi.js', ['wp-blocks', 'wp-i18n', 'wp-element']);
}
add_action('enqueue_block_assets', 'wuffi_testblock');