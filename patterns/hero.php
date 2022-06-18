<?php

function wuffi_hero_component() {
    register_block_pattern(
        'wuffi-patterns/hero-component',
        array(
            'title'       => __( 'Hero', 'wuffi-patterns' ),
            'description' => _x( 'This is a hero component', 'Does it need further explanation?', 'wuffi-patterns' ),
            'content'     => "<!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"60%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:60%\"><!-- wp:heading -->\n<h2>Grow your barking skills today</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Duis sed nisl egestas faucibus euismod. Integer ultricies suscipit in vulputate aliquet fermentum eu. Amet malesuada quis ac mi risus congue non sed.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"style\":{\"border\":{\"radius\":\"0px\"}}} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\" style=\"border-radius:0px\">Learn more</a></div>\n<!-- /wp:button -->\n\n<!-- wp:button {\"style\":{\"border\":{\"radius\":\"0px\"}}} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\" style=\"border-radius:0px\">See what we do</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"40%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:40%\"><!-- wp:image {\"id\":30,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-full\"><img src=\"https://gutenberg.test/wp-content/uploads/2022/06/charles-deluvio-UVfSXI8D0Pc-unsplash-1.png\" alt=\"\" class=\"wp-image-30\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph -->",
            'categories'  => array('hero'),
        )
    );

}    
add_action( 'init', 'wuffi_hero_component' );