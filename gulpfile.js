var gulp = require('gulp');
var less = require('gulp-less');
var pump = require('pump');
var rename = require('gulp-rename');
var minifyCSS = require('gulp-clean-css');

//Minify the css
gulp.task('minify-css', function() {
  return gulp.src('./assets/uikit/src/less/uikit.less').pipe(less()).pipe(rename('core.min.css')).pipe(minifyCSS()).pipe(gulp.dest('./assets/css/'));
});

//Don't minify the css
gulp.task('unminified-css', function() {
  return gulp.src('./assets/uikit/src/less/uikit.less').pipe(less()).pipe(rename('core.css')).pipe(gulp.dest('./assets/css/'));
});

//Watch for changes
gulp.task('watch', function() {
  return gulp.watch('./assets/uikit/src/**/*.less', ['minify-css', 'unminified-css']);
});