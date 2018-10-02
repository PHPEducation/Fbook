let mix = require('laravel-mix');

const themepath = 'themes/demo';
const distpath = themepath + '/dist/';

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

mix.js(['resources/assets/js/app.js',
    'node_modules/jquery-legacy/node_modules/jquery/dist/jquery.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.min.js',
    'node_modules/owl.carousel/dist/owl.carousel.min.js',
    'node_modules/wow.js/dist/wow.min.js',
    'node_modules/jquery-parallax.js/parallax.min.js',
    'node_modules/jquery-countdown/dist/jquery.countdown.min.js',
    'node_modules/flexslider/jquery.flexslider.js',
    'node_modules/chosen-jquery/lib/chosen.jquery.min.js',
    'node_modules/jquery.counterup/jquery.counterup.min.js',
    'node_modules/waypoints/src/waypoint.js',
    ], 'public/js/app.js')
   .sass('resources/assets/sass/app.scss', 'public/css');
mix.styles([
    'node_modules/bootstrap/dist/css/bootstrap.min.css',
    'node_modules/owl.carousel/dist/assets/owl.carousel.css',
    'node_modules/font-awesome/css/font-awesome.min.css',
    'node_modules/flexslider/flexslider.css',
    'node_modules/chosen-jquery/lib/chosen.min.css',
    'node_modules/animate.css/animate.min.css',
], 'public/css/app.css');
