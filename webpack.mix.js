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

mix.js('resources/assets/sbydev/js/app.js', 'public/themes/sbydev-default/js')
   .js('resources/assets/admin/js/admin.js', 'public/admin-assets/js')
   .sass('resources/assets/admin/sass/admin.scss', 'public/admin-assets/css')
   // .sass('resources/assets/sbydev/sass/app.scss', 'public/themes/sbydev-default/css')
