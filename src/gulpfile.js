
    'use strict';
var gulp = require('gulp'),
    minifyCss = require('gulp-minify-css'),
    wiredep = require('wiredep').stream,
    useref = require('gulp-useref'),
    gulpif = require('gulp-if'),
    uglify = require('gulp-uglify'),
    less = require('gulp-less'),
    path = require('path'),
    uncss = require('gulp-uncss'),
    img64 = require('gulp-img64'),
    imagemin = require('gulp-imagemin'),
    autoprefixer = require('gulp-autoprefixer'),
    rev = require('gulp-rev-append'),
    pngquant = require('imagemin-pngquant'),
    browserSync = require('browser-sync'),
    reload = browserSync.reload;

// Build
gulp.task('build', function () {
    return gulp.src('app/guest/s/default/index.php')
        .pipe(useref())
        .pipe(gulpif('*.js', uglify()))
        .pipe(gulpif('*.css', minifyCss()))
        .pipe(gulp.dest('dist/guest/s/default'));
});
//UNCSS
gulp.task('mincss', function () {
    return gulp.src('dist/css/*.css')
        .pipe(uncss({
            html: ['http://wifiportal.dev:88/dist/guest/s/default/?id=9c:b7:0d:7e:71:f1&ap=04:18:d6:e6:49:f5&t=1440364742&url=http://www.pravda.com.ua/&ssid=Open']
        }))
        .pipe(minifyCss({compatibility: 'ie8'}))
        .pipe(gulp.dest('dist/css'))
});


// Develop
// BrowserSync
gulp.task('browser-sync', function() {
    //watch files
    var files = [
        'app/guest/s/default/index.php',
        'app/style/css/*.css',
    ];
    //initialize browsersync
    browserSync.init(files, {
        proxy: "http://wifiportal.dev:88/app/guest/s/default/?id=9c:b7:0d:7e:71:f1&ap=04:18:d6:e6:49:f5&t=1440364742&url=http://www.pravda.com.ua/&ssid=Open"
    });
});
// Bower
gulp.task('bower', function () {
    gulp.src('app/guest/s/default/index.php')
        .pipe(wiredep({
            directory : 'app/bower_components'
        }))
        .pipe(gulp.dest('app/guest/s/default'))
        .pipe(browserSync.reload({
            stream: true
        }));
});
//Css
gulp.task('less', function () {
    return gulp.src('app/style/less/*.less')
        .pipe(less({
            paths: [ path.join(__dirname, 'less', 'includes') ]
        }))
        .pipe(autoprefixer({
            browsers: ['last 4 versions'],
            cascade: false
        }))
        .pipe(uncss({
            html: ['http://wifiportal.dev:88/app/guest/s/default/?id=9c:b7:0d:7e:71:f1&ap=04:18:d6:e6:49:f5&t=1440364742&url=http://www.pravda.com.ua/&ssid=Open']
        }))
        .pipe(gulp.dest('app/style/css'))
        .pipe(browserSync.reload({
            stream: true
        }));
});
gulp.task('rev', function() {
    gulp.src('app/guest/s/default/index.php')
        .pipe(rev())
        .pipe(gulp.dest('app/guest/s/default'))
        .pipe(browserSync.reload({
            stream: true
        }));
});
//UNCSS
gulp.task('notused', function () {
    return gulp.src('app/style/css/*.css')
        .pipe(uncss({
            html: ['http://wifiportal.dev:88/app/guest/s/default/?id=9c:b7:0d:7e:71:f1&ap=04:18:d6:e6:49:f5&t=1440364742&url=http://www.pravda.com.ua/&ssid=Open']
        }))
        .pipe(gulp.dest('app/style'))
        .pipe(browserSync.reload({
            stream: true
        }));
});
//Base64
gulp.task('tobase64', function () {
    gulp.src('app/guest/s/default/index.php')
        .pipe(img64())
        .pipe(gulp.dest('app/guest/s/default'))
        .pipe(browserSync.reload({
            stream: true
        }));
});
//OptimizeIMG
gulp.task('optimizeimg', function () {
    return gulp.src('src/images/*')
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .pipe(gulp.dest('dist/images'))
        .pipe(browserSync.reload({
            stream: true
        }));
});

gulp.task('default', function(){

});


gulp.task('watch',['browser-sync'], function(){
    gulp.watch('bower.json', ['bower'])
    gulp.watch('app/style/less/*.less', ['less', 'rev'])
    gulp.watch('app/style/less/lib/*.less', ['less', 'rev'])
    gulp.watch('app/guest/s/default/index.php', ['browser-sync'])
});