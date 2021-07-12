const { src, dest, series, parallel, watch } = require('gulp');
var sass = require('gulp-sass')(require('sass'));
const gcmq = require('gulp-group-css-media-queries');
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');
const buble = require('gulp-buble');
const uglify = require('gulp-uglify');
const del = require('del');
const gulpif = require('gulp-if');
const sourcemaps = require('gulp-sourcemaps');
const browserSync = require('browser-sync').create();

const isDev = (process.argv.indexOf('--dev') !== -1);
const isProd = !isDev;
const isSync = (process.argv.indexOf('--sync') !== -1);

function clean() {
    return del('../dist/', {force: true});
}

function style() {
    return src(['../src/scss/app.scss'])
        .pipe(gulpif(isDev, sourcemaps.init()))
        .pipe(sass().on('error', sass.logError))
        .pipe(gcmq())
        .pipe(autoprefixer({cascade: false}))
        .pipe(gulpif(isProd, cleanCSS({ level: 2 })))
        .pipe(gulpif(isDev, sourcemaps.write('../maps')))
        .pipe(dest('../dist/css/'))
        .pipe(gulpif(isSync, browserSync.stream()))
}

function script() {
    return src( '../src/js/**/*.js' )
        .pipe(buble())
        .pipe(gulpif(isProd, uglify()))
        .pipe(dest('../dist/js/'))
        .pipe(gulpif(isSync, browserSync.stream()))
}

function server(){

    let files = [
        '../src/scss/**/*.scss',
        '../src/js/**/*.js',
        '../**/*.php'
    ];

    let Url = "http://localhost/callbackform/";

    if (isSync) {
        browserSync.init(files, {
            proxy: Url,
            notify: true
        });
    }

    watch('../src/scss/**/*.scss', style);
    watch('../src/js/**/*.js', script);
}

    exports.clean = clean;
    exports.style = style;
    exports.script = script;
    exports.server = server;

    let build = series(clean, parallel(style, script));
    exports.build = build;
    exports.dev = series(build, server);