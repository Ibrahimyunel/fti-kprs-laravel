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

//  mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);

//  mix.scripts([
//     'resources/js/navbar.js',
//     'resources/js/register.js',
//     'resources/js/login.js'
//   ], 'public/js/all.js');
  
mix.sass('resources/sass/style.scss', 'public/css');

// mix.sass('resources/sass/app.scss', 'public/css');
  