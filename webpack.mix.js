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
mix.copy('node_modules/bootstrap-sass/', 'resources/assets/sass/bootstrap-sass/');
mix.copy('node_modules/jquery-mask-plugin/', 'public/js/jquery-mask-plugin/');
mix.copy('node_modules/vue-material/dist/vue-material.css', 'public/css/vue-material/');
mix.copy('node_modules/vue-material/dist/vue-material.css.map', 'public/css/vue-material/');
mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/bootstrap-sass/assets/stylesheets/_bootstrap.scss', 'public/css');

