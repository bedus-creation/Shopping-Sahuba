let mix = require('laravel-mix');


mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

// Dropzone
mix.js('resources/lib/dropzone/app.js', 'public/lib/dropzone');
