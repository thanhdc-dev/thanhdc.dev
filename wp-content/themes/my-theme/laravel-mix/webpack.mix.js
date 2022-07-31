const mix = require('laravel-mix');
mix.js('resources/js/app.js', 'js')
    .sass('resources/sass/style.scss', 'css', {
        sourceMap: true
    })
    .sass('resources/sass/woocommerce.scss', 'css', {
        sourceMap: true
    })
    .setPublicPath('../public');

mix.browserSync('http://wpazmobile.test/');