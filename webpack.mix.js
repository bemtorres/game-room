const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .extract();

mix.version();

// const mix2 = require('laravel-mix');

// mix2.js('resources/js/app2.js', 'public/js2')
//     .vue()
//     .sass('resources/sass/app2.scss', 'public/css2')
//     .extract();

// mix2.version();