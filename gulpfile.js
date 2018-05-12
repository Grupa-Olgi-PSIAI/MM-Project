var gulp = require('gulp');
var minify = require('gulp-minify');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');

var less = require('gulp-less');
var path = require('path');

gulp.task('less', function () {
    return gulp.src('./less/**/*.less')
        .pipe(less({
            paths: [path.join(__dirname, 'less', 'includes')]
        }))
        .pipe(gulp.dest('./public/css'));
});

gulp.task('compress', function () {
    gulp.src('lib/*.js')
        .pipe(minify({
            ext: {
                src: '-debug.js',
                min: '.js'
            },
            exclude: ['tasks'],
            ignoreFiles: ['.combo.js', '-min.js']
        }))
        .pipe(gulp.dest('dist'))
});

gulp.task('minjs', function () {
    gulp.src('./public/js/*.js')
        .pipe(concat('min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./public/dist/'))
});

var cssmin = require('gulp-cssmin');
var rename = require('gulp-rename');

gulp.task('mincss', function () {
    gulp.src('./public/css/*.css')
        .pipe(cssmin())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('./public/dist/'));
});

gulp.task('default', ['less', 'minjs', 'compress', 'mincss' ]);
