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

// mix.js('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css');

mix
    .setPublicPath('public/build')
    .setResourceRoot('/build/')
    .js('resources/js/app.js', 'js')
    .sass('resources/sass/app.scss', 'css')
    .version();

mix.styles(
    [
        'resources/css/owl.carousel.min.css',
        'resources/css/slick.css',
        'resources/css/meanmenu.min.css',
        'resources/css/style.css',
        'resources/css/responsive.css',
    ],
    'public/build/css/custom.css');