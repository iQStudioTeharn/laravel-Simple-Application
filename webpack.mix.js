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

mix.sass('resources/sass/app.scss', 'public/css')
.sass('resources/sass/costumize.scss', 'public/css')
.js('resources/js/app.js', 'public/js');
mix.styles([
    'public/css/blog-post.css',
    'public/css/bootstrap.css',
    'public/css/font-awesome.css',
    'public/css/metisMenu.css',
    'public/css/sb-admin-2.css',
],'public/css/libs.css')
.scripts([
    'public/js/jquery.js',
    'public/js/bootstrap.js',
    'public/js/metisMenu.js',
    'public/js/sb-admin-2.js',
    'public/js/scripts.js',
],'public/js/libs.js');