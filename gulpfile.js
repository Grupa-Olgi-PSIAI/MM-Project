let gulp = require('gulp');
let concat = require('gulp-concat');
let uglify = require('gulp-uglify');

gulp.task('minjs', function () {
    gulp.src('./public/js/*.js')
        .pipe(concat('min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./public/dist/'))
});

gulp.task('default', ['minjs']);
