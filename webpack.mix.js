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
mix.copy('bower_components/select2-tab-fix/src/select2-tab-fix.min.js', 'public/js/select2-tab-fix/');
mix.copy('node_modules/jquery-mask-plugin/dist/', 'public/js/mask/');
//mix.copy('node_modules/vee-validate/dist/', 'public/js/vee-validate/');
//mix.copy('node_modules/vue-material/dist/vue-material.css', 'public/css/vue-material/');
//mix.copy('node_modules/vue-material/dist/vue-material.css.map', 'public/css/vue-material/');
// mix.js('./resources/assets/js/app.js', 'public/js/app.js')
mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/bootstrap-sass/assets/stylesheets/_bootstrap.scss', 'public/css');

