const mix = require('laravel-mix');

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

mix.sass('resources/views/admin/scss/style.scss', 'public/site/css/style.css')
    .scripts('node_modules/jquery/dist/jquery.js', 'public/site/js/jquery.js')
    .scripts('node_nodules/bootstrap/dist/js/bootstrap.bundle.js', 'public/site/js/bootstrap.js')
    .version();
