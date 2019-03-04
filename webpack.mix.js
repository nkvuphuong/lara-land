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

mix
    .js('resources/assets/js/admin/app.js', 'public/admin/js')
    .combine([
            'node_modules/jquery/dist/jquery.min.js',
            'public/admin/js/app.js',
            'bower_components/select2/dist/js/select2.full.min.js',
            'public/vendor/jsvalidation/js/jsvalidation.min.js',
            'node_modules/toastr/build/toastr.min.js',
            'public/js/messages.js',
        ],
        'public/admin/js/all.js')
    .styles([
        'node_modules/ladda/dist/ladda.min.css',
        'bower_components/select2/dist/css/select2.css',
        'node_modules/toastr/build/toastr.min.css'
    ], 'public/admin/css/app.css')
// .js('resources/assets/js/app.js', 'public/js')
// .sass('resources/assets/sass/app.scss', 'public/css')
// scripts([
//     'node_modules/ladda/js/ladda.d.ts',
//     'node_modules/sweetalert/dist/sweetalert.min.js',
// ], 'public/admin/js/app.js')
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
