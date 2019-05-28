const mix = require('laravel-mix');
const path = require('path');

mix.webpackConfig({
  resolve: {
    extensions: ['.js', '.vue', '.json'],
    alias: {
      '@': path.join(__dirname, '/resources/js')
    }
  }
});

mix.js('resources/js/admin.js', 'public/js')
  .sass('resources/sass/admin.scss', 'public/css')
  .sourceMaps();
