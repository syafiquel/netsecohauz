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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/scripts.js', 'public/js')
    .js('resources/js/custom.js', 'public/js')
    .js('resources/js/stisla.js', 'public/js')
    .js('node_modules/datatables.net/js/jquery.dataTables.js', 'public/js')
    .js('node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js', 'public/js')
    .js('node_modules/datatables.net-select-bs4/js/select.bootstrap4.js', 'public/js')
    .js('node_modules/qrcode/build/qrcode.js', 'public/js')
    .js('resources/js/modules-datatables.js', 'public/js')
    .js('resources/js/bootstrap-modal.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .css('resources/css/style.css', 'public/css')
    .css('resources/css/components.css', 'public/css')
    .css('node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css', 'public/css')
    .css('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css', 'public/css')
    .sourceMaps();
