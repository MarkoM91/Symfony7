var Encore = require('@symfony/webpack-encore');



if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore

    .setOutputPath('public/build/') //folder with the file prepared for minification

    .setPublicPath('/build')

    .addEntry('js/app.js', './assets/js/app.js')
    .addStyleEntry('css/dashboard', '[./assets/css/dashboard.css]')
    .addStyleEntry('css/login', '[./assets/css/login.css]')

    .splitEntryChunks()

    .enableSingleRuntimeChunk()

    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())

    .enableVersioning(Encore.isProduction())


    .configureBabel(() => {}, {
        useBuiltIns: 'usage',
        corejs: 3
    })


;

module.exports = Encore.getWebpackConfig(),
{};
