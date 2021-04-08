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

mix.js('resources/js/app.js', 'public/js')
.combine(['resources/js/plugins/micromodal.min.js','resources/js/plugins/flatpickr.js','resources/js/plugins/Chart.bundle.min.js'],'public/js/plugins.js')
.browserSync({
    host: '127.0.0.1',
    proxy: 'localhost', // your domain test
    open: false,
  })
.postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
