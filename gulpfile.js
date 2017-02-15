var elixir = require('laravel-elixir');
var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
 mix.task('multiple-sass', 'resources/assets/sass/frontend/*.scss'); // run task of gulp
 mix.sass('backend/*.scss', 'public/css/backend/main.css');
 mix.sass('frontend/global/*.scss', 'public/css/frontend/main.css');
 mix.browserify('frontend/main.js','public/js/frontend/main.js');
 mix.browserSync({
  proxy: 'http://localhost:8080/clean_project/public' // edit proxy server for development here
 });
});

gulp.task('multiple-sass', function(){
 return gulp.src('resources/assets/sass/frontend/*.scss')
     .pipe(sass())
     .pipe(autoprefixer())
     .pipe(gulp.dest('public/css/frontend'));
});
