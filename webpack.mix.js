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
    .js('resources/js/delete.js', 'public/js')
    .postCss('resources/css/mycss.css', 'public/css')
    .postCss('resources/css/profiles.css', 'public/css')
    .postCss('resources/css/job.css', 'public/css')

    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
