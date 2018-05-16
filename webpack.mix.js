const { mix } = require('laravel-mix');

mix
    .js('resources/assets/js/dashboard.js', 'public/js')
    .postCss('resources/assets/css/dashboard.css', 'public/css')

	// Use versioning on the app if you build dashboard assets there
    // .version()

    .options({
        processCssUrls: false,
        postCss: [require('postcss-easy-import')],
    });
