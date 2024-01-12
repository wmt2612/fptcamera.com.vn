let glob = require('glob');
let mix = require('laravel-mix');
let WebpackShellPlugin = require('webpack-shell-plugin');

require('laravel-mix-merge-manifest');

let configs = glob.sync('{./Modules/*/webpack.mix.js,./public/themes/*/webpack.mix.js}');

if (process.env.module !== undefined) {

    let module = process.env.module.charAt(0).toUpperCase() + process.env.module.slice(1);

    configs = [`./Modules/${module}/webpack.mix.js`];
}

if (process.env.theme !== undefined) {

    let theme = process.env.theme.charAt(0).toUpperCase() + process.env.theme.slice(1);
    configs = [`./public/themes/${theme}/webpack.mix.js`];
}
// console.log(theme)
// console.log(configs)

mix.setPublicPath('./')
    .options({ processCssUrls: false })
    .sourceMaps(true, 'eval-source-map')
    .mergeManifest();

let onBuildExit = [];

configs.forEach(config => {
    require(config);

    let module = config.match(/Modules\/(\w+?)\//);
    let theme = config.match(/public\/themes\/(\w+?)\//);

    console.log(theme)

    if (module !== null) {
        onBuildExit.push(`php artisan module:publish ${module[1]}`);
    }

    if (theme !== null) {
        onBuildExit.push(`php artisan stylist:publish ${theme[1]}`);
    }
});

mix.webpackConfig({
    plugins: [
        new WebpackShellPlugin({ onBuildExit }),
    ],
});
