const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);

mix.scripts([
    'public/front/js/modernizr-2.8.3.min.js',
    'public/front/js/jquery.min.js',
    'public/front/js/bootstrap.min.js',
    'public/front/js/owl.carousel.min.js',
    'public/front/js/slick.min.js',
    'public/front/js/isotope.pkgd.min.js',
    'public/front/js/imagesloaded.pkgd.min.js',
    'public/front/js/wow.min.js',
    'public/front/js/waypoints.min.js',
    'public/front/js/jquery.counterup.min.js',
    'public/front/js/jquery.magnific-popup.min.js',
    'public/front/js/rsmenu-main.js',
    'public/front/js/time-circle.js',
    'public/front/js/plugins.js',
    'public/front/js/main.js'
], 'public/front/js/front.js');

mix.styles([
    'public/front/css/bootstrap.min.css',
    'public/front/css/animate.css',
    'public/front/css/owl.carousel.css',
    'public/front/css/slick.css',
    'public/front/css/magnific-popup.css',
    'public/front/css/off-canvas.css'
    
], 'public/front/css/front.css');

mix.styles([
    'public/front/css/style.css',
    'public/front/css/spacing.css',
    'public/front/css/responsive.css'
    
], 'public/front/css/front2.css');

mix.styles([
    'public/back/assets/css/app.min.css',
    'public/back/assets/css/style.css',
    'public/back/assets/css/components.css',
    'public/back/assets/css/custom.css'
    
], 'public/back/assets/css/back.css');

mix.scripts([
    'public/back/assets/js/app.min.js',
    'public/back/assets/js/scripts.js',
    'public/back/assets/js/custom.js'
], 'public/back/assets/js/back.js');

