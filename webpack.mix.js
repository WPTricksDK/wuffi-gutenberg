let mix = require('laravel-mix');
const fs = require('fs');

/** Load Gutenberg components */
const config = {
  externals: {
    react: 'React',
    'react-dom': 'ReactDOM',
    tinymce: 'tinymce',
    jquery: 'jQuery',
    moment: 'moment',
    lodash: 'lodash',
    'lodash-es': 'lodash',

    // Gutenberg Components
    '@wordpress/blocks': 'wp.blocks',
    '@wordpress/components': 'wp.components',
    '@wordpress/compose': 'wp.compose',
    '@wordpress/data': 'wp.data',
    '@wordpress/editor': 'wp.editor',
    '@wordpress/element': 'wp.element',
    '@wordpress/hooks': 'wp.hooks',
    '@wordpress/i18n': 'wp.i18n',
    '@wordpress/plugins': 'wp.plugins'
  },
  // @link https://webpack.js.org/configuration/devtool/#devtool
  devtool: 'source-map'
};

/** Config */
mix.setPublicPath('public');
mix.setResourceRoot('./');

mix.options({ 
    postCss: [require('tailwindcss')] 
});

if (mix.inProduction()) {
    mix.minify(['public/app.css', 'public/app.js']).version();
}




mix.js('assets/js/app.js', '');
mix.sass('assets/sass/app.scss', '');

/**
 * Load all GUTENBERG assets
 * Wildcards are allowed since we're using the Node FS module
*/
fs.readdirSync("assets/js/blocks/").forEach(fileName => mix.js(`assets/js/blocks/${fileName}`, ''));
