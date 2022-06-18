<?php

function wuffi_header_component() {
    register_block_pattern(
        'wuffi-patterns/header-component',
        array(
            'title'       => __( 'Header Component', 'wuffi-patterns' ),
            'description' => _x( 'This is a hero component', 'Does it need further explanation?', 'wuffi-patterns' ),
            'content'     => "<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"33.33%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:33.33%\"><!-- wp:heading -->\n<h2>Titel</h2>\n<!-- /wp:heading --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"66.66%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:66.66%\"><!-- wp:paragraph -->\n<p>Her kommer brødtekst</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
            'categories'  => array('header'),
        )
    );

}    
add_action( 'init', 'wuffi_header_component' );