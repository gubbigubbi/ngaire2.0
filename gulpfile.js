// TODO: Add babel es6/7 etc
/**
 * 1. Gulp Core
 */
var gulp = require('gulp');

/**
 * 2 Our SASS Plugins, autoprefix and variables
 */
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var concat = require('gulp-concat');
var minify = require('gulp-minify-css');
var merge = require('merge-stream');
var order = require('gulp-order');

    /**
     * 2.1 Global variables
     */
    var paths = {
       sassSrc: './sass/style.scss',
       cssDist: ''
    }

    /**
     * 2.2 Autoprefixer
     */
    var autoprefixer = require('gulp-autoprefixer');
    var autoprefixerOptions = {
        browsers: ['last 2 version', '> 5%']
    };

    /**
     * 2.3 SASS Variables
     */


    var sassOptions = {
        errLogToConsole: true,
        outputStyle: 'expanded'
    };

/**
 * 3.0 Javascript plugins & variables
 */

var jshint = require('gulp-jshint');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');

/**
 * 4.0 Livereload
 */
var livereload = require('gulp-livereload');

/**
 * 5. Tasks
 */

    /**
     * 5.1 Linting
    */

    gulp.task('lint', function() {
        return gulp.src('src/js/*.js')
            .pipe(jshint())
            .pipe(jshint.reporter('default'));
    });


    /**
     * 5.2 SASS Compile & autoprefix
     */

    gulp.task('sass', function() {
        return gulp
            .src(paths.sassSrc)
            .pipe(sourcemaps.init())
            .pipe(sass(sassOptions)).on('error', sass.logError)
            .pipe(autoprefixer(autoprefixerOptions))
            .pipe(sourcemaps.write())
            .pipe(rename('style.css'))
            .pipe(gulp.dest(paths.cssDist))
            .pipe(livereload());
    });

    /**
     * 5.3 CSS Minify & Concat
     */

    gulp.task('styles', function() {
        var scssStream = gulp
        .src('sass/style.scss')
        .pipe(sass())
        .on('error', sass.logError)
        .pipe(autoprefixer(autoprefixerOptions))
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

    /**
     * 5.4 Javascript concatenate & minify
     */


    gulp.task('scripts', function() {
        return gulp
            .src(['src/js/vendor/**.js', 'src/js/app.js'])
            .pipe(concat('all.js'))
            .pipe(rename('all.min.js'))
            .pipe(uglify())
            .pipe(gulp.dest('assets/js'));
    });

    /**
     * 5.5 Watch files for changes
     */

    gulp.task('watch', function() {
        livereload.listen();
        gulp.watch('**/*.php', livereload.reload); // watch for php changes 
        gulp.watch('./src/js/*.js', ['lint', 'scripts']); // watch for js changes
        gulp.watch('**/*.scss', ['sass'], function(files){

        });
    });

    /**
     * 5.6 Our default task
     */

    gulp.task('default', ['sass', 'watch']);