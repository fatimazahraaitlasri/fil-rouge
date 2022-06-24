const mix = require("laravel-mix");
const path = require("path");

mix.disableSuccessNotifications();
mix.setPublicPath("public");

function findFiles(dir) {
    const fs = require("fs");
    return fs.readdirSync(dir).filter((file) => {
        return fs.statSync(`${dir}/${file}`).isFile();
    });
}

mix.webpackConfig({
    resolve: {
        alias: {
            "@": path.resolve("app/resources/sass"),
        },
    },
});

function buildSass(dir, dest) {
    const source = `app/${dir}`;
    findFiles(source).forEach(function (file) {
        if (!file.startsWith("_")) {
            mix.sass(`${source}/${file}`, dest);
        }
    });
}

function buildJS(dir, dest) {
    const source = `app/${dir}`;
    findFiles(source).forEach(function (file) {
        mix.js(`${source}/${file}`, dest);
    });
}

buildSass("resources/sass", "css");

mix.options({
    processCssUrls: false,
});

mix.browserSync({
    proxy: "http://localhost/fil-rouge-youcode",
    notify: false,
    open: false, // todo enable open for dev later
});
