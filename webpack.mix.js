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

const paths = {
    'adminlte_path': './vendor/almasaeed2010/adminlte/',
    'chartjs': './node_modules/chart.js/',
    'chartjs_plugin_datalabels': './node_modules/chartjs-plugin-datalabels/',
};

// Copy bootstrap and AdminLTE files to public directory
mix.copyDirectory(paths.adminlte_path + 'bower_components/', 'public/theme/adminlte/bower_components')
.copyDirectory(paths.adminlte_path + 'dist/', 'public/theme/adminlte/dist')
.copyDirectory(paths.adminlte_path + 'plugins/', 'public/theme/adminlte/plugins');

mix.copy(paths.chartjs + 'dist/Chart**', 'public/lib/chartjs/')
.copy(paths.chartjs_plugin_datalabels + 'dist/chartjs**', 'public/lib/chartjs/');

mix.js('resources/assets/js/app.js', 'public/js')
.sass('resources/assets/sass/app.scss', 'public/css');
