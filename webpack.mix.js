let mix = require('laravel-mix');


/** Config */
mix.setPublicPath('public');
mix.setResourceRoot('./');

mix.options({ 
    postCss: [require('tailwindcss')] 
});

if (mix.inProduction()) {
    mix.minify(['public/app.css', 'public/app.js']).version();
}


/** Assets */
mix.sass('assets/sass/app.scss', '');
mix.js('assets/js/*/*.js', '');
