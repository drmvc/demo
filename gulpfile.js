'use strict';

var gulp = require('gulp');
var livereload = require('gulp-livereload');
var sass = require('gulp-sass');
var prefix = require('gulp-autoprefixer');
var uglify = require('gulp-uglify');
var gutil = require('gulp-util');
var del = require('del');
var gulpif = require('gulp-if');
var minifyCss = require('gulp-minify-css');
var sourcemaps = require('gulp-sourcemaps');
var named = require('vinyl-named');
var dotenv = require('dotenv').config();

gulp.task('default', ['img', 'scss', 'js']);

gulp.task('clean:img', function () {
    return del(['public/resources/img']);
});

gulp.task('img', ['clean:img'], function () {
    return gulp.src('resources/img/**/*')
        .pipe(gulp.dest('public/resources/img'));
});

gulp.task('clean:css', function () {
    return del(['public/resources/css']);
});

gulp.task('scss', ['clean:css'], function () {
    gulp.src(['resources/scss/theme.scss'], {base: 'resources/scss/'})
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(prefix('last 3 version'))
        .pipe(gulpif(process.env.DEV_MODE !== 'true', minifyCss({processImportFrom: ['!fonts.googleapis.com']})))
        .on('error', gutil.log)
        .pipe(gulpif(process.env.DEV_MODE === 'true', sourcemaps.write('maps')))
        .pipe(gulp.dest('public/resources/css'));

    gulp.src(['resources/scss/**/*.css'])
        .pipe(gulp.dest('public/resources/css'));

    gulp.src([
        'node_modules/ubuntu-fontface/fonts/*'
    ]).pipe(gulp.dest('public/resources/fonts/'));
});

gulp.task('clean:js', function () {
    return del(['public/resources/js']);
});

gulp.task('js', ['clean:js'], function () {
    gulp.src(['resources/js/**/*.js'])
        .pipe(named())
        .pipe(gulpif(process.env.DEV_MODE !== 'true', uglify()))
        .pipe(gulp.dest('public/resources/js'));

    gulp.src([
        'node_modules/bootstrap/dist/js/bootstrap.min.js',
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/popper.js/dist/umd/popper.min.js',
        'node_modules/masonry-layout/dist/masonry.pkgd.min.js'
    ]).pipe(gulp.dest('public/resources/js'));
});

gulp.task('watch', function () {
    livereload.listen();

    gulp.watch('resources/img/**', ['img']).on('change', livereload.changed);
    gulp.watch('resources/icons/**', ['icons']).on('change', livereload.changed);
    gulp.watch('resources/scss/**', ['scss']).on('change', livereload.changed);
    gulp.watch('resources/js/**', ['js']).on('change', livereload.changed);
});
