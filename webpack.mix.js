let mix = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js')
   .copy('public/js/app.js', 'public_html/js/app.js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .copy('public/css/app.css','public_html/css/app.css');
