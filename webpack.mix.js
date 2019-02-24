let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/admin/app.js', 'public/admin/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .styles([
        'node_modules/ladda/dist/ladda.min.css',
    ], 'public/admin/css/app.css');
;

const WebpackShellPlugin = require('webpack-shell-plugin');

// Add shell command plugin configured to create JavaScript language file
mix.webpackConfig({
    plugins:
        [
            new WebpackShellPlugin({
                onBuildStart: ['php artisan lang:js public/js/messages.js --quiet'],
                onBuildEnd: []
            })
        ]
});
