// Include gulp
var gulp = require('gulp');

// Include Our Plugins
var jshint = require('gulp-jshint');
var sass = require('gulp-sass');
// sass sourcemaps
var sourcemaps = require('gulp-sourcemaps');
// auto prefixer
var autoprefixer = require('gulp-autoprefixer');

// Concat and minify css
var concat = require('gulp-concat');
var minify = require('gulp-minify-css');
var merge = require('merge-stream');
var order = require('gulp-order');

// JS Stuff
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');

// live reload
var livereload = require('gulp-livereload');

// Autoprefixer task
var autoprefixerOptions = {
    browser: ['last 2 versions', '> 5%', 'Firefox ESR']
};

// Lint Task
gulp.task('lint', function() {
    return gulp.src('src/js/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

// Compile Our Sass
gulp.task('sass', function() {
    return gulp
        .src('sass/style.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({ outputStyle: 'compressed' }))
        .on('error', sass.logError)
        
        .pipe(autoprefixer(autoprefixerOptions))
        .pipe(rename('style.css'))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(''))
        .pipe(livereload());
});

// Concatenate & Minify CSS
gulp.task('styles', function() {
    var scssStream = gulp
    .src('sass/style.scss')
    .pipe(sass())
    .pipe(concat('scss-files.scss'));
    
    var cssStream = gulp
    .src('src/css/**.css')
    .pipe(concat('css-files.css'));
    
    var mergedStream = merge(cssStream, scssStream)
        .pipe(order([
            'scss-files.scss',
            'css-files.css',
        ]))
        .pipe(concat('style.css'))
        .pipe(minify())
        .pipe(gulp.dest(''));

    return mergedStream;
    
});

// Concatenate & Minify JS
gulp.task('scripts', function() {
    return gulp
        .src(['src/js/vendor/**.js', 'src/js/app.js'])
        .pipe(concat('all.js'))
        .pipe(gulp.dest('assets'))
        .pipe(rename('all.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('assets/js'));
});

// Watch Files For Changes
gulp.task('watch', function() {
    livereload.listen();
    gulp.watch('**/*.php', livereload.reload); // watch for php changes 
    //gulp.watch('js/*.js', ['lint', 'scripts']);
    gulp.watch('**/*.scss', ['sass']);
});

// Default Task
gulp.task('default', ['sass', 'watch']);