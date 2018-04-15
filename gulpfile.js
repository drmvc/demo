'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var prefix = require('gulp-autoprefixer');
var uglify = require('gulp-uglify');
var gutil = require('gulp-util');
var del = require('del');
var gulpif = require('gulp-if');
var minifyCss = require('gulp-minify-css');
var rename = require("gulp-rename");
var named = require('vinyl-named');
var dotenv = require('dotenv').config();

gulp.task('default', ['img', 'sass', 'js']);

gulp.task('clean:img', function () {
    return del(['public/assets/img']);
});

gulp.task('img', ['clean:img'], function () {
    return gulp.src('app/resources/img/**/*')
        .pipe(gulp.dest('public/assets/img'));
});

gulp.task('clean:css', function () {
    return del(['public/assets/css']);
});

gulp.task('sass', ['clean:css'], function () {
    gulp.src(['app/resources/sass/*.scss'], {base: 'app/resources/sass/'})
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(prefix('last 3 version'))
        .pipe(gulpif(process.env.DEV_MODE !== 'true', minifyCss({processImportFrom: ['!fonts.googleapis.com']})))
        .on('error', gutil.log)
        .pipe(gulpif(process.env.DEV_MODE === 'true', sourcemaps.write('maps')))
        .pipe(gulp.dest('public/assets/css'));

    gulp.src(['node_modules/ubuntu-fontface/fonts/*'])
        .pipe(gulp.dest('public/assets/css/fonts/'));
});

gulp.task('clean:js', function () {
    return del(['public/assets/js']);
});

gulp.task('js', ['clean:js'], function () {
    gulp.src(['app/resources/js/**/*.js'])
        .pipe(named())
        .pipe(gulpif(process.env.DEV_MODE !== 'true', uglify()))
        .pipe(gulp.dest('public/assets/js'));

    gulp.src([
        'node_modules/bootstrap/dist/js/bootstrap.min.js',
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/popper.js/dist/umd/popper.min.js',
        'node_modules/masonry-layout/dist/masonry.pkgd.min.js'])
        .pipe(gulp.dest('public/assets/js'));
});
