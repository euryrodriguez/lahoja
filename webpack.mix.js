const mix = require('laravel-mix');

mix.webpackConfig({
    resolve: {
        alias: {
            jquery: "jquery/src/jquery"
        },
    },
    module: {
        noParse: /validate\.js/
    },
    devtool: false,
    stats: {
        colors: true,
        modules: true,
        reasons: true,
        errorDetails: true
    }
});

mix.js('resources/js/app.js', 'public/js/app.js')
    .sass('resources/sass/app.scss', 'public/css');

mix.styles(
    [
        'node_modules/bootswatch/dist/litera/bootstrap.min.css',
        'node_modules/ionicons/dist/css/ionicons.min.css',
        'node_modules/chosen-js/chosen.css',
        'node_modules/font-awesome/css/font-awesome.min.css',
        'node_modules/toastr/build/toastr.min.css',
        'node_modules/gijgo/css/gijgo.css',
        'resources/sass/app.scss'
    ],
    'public/css/app.css'
);
