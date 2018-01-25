(function(d) {
    var wf = d.createElement('script'), s = d.scripts[0];
    wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
    s.parentNode.insertBefore(wf, s);
  })(document);

( function( $ ) {
    // Codes here.

    // colors
    function map_colors_to_customize($color) {
        wp.customize( $color, function( value ) {
            value.bind( function( to ) {
                $("body").get(0).style.setProperty("--"+$color, to);
            } );
        } );
    }

    var $colors = ['light', 'dark', 'text', 'neutral', 'grey'];

    for (var i in $colors) {
        var $color = 'color-'+$colors[i];
        map_colors_to_customize($color);
    }

    // fonts sizes
    function map_font_sizes_to_customize($font_size) {
        wp.customize( $font_size, function( value ) {
            value.bind( function( to ) {
                console.log($font_size);
                console.log(to);
                $("body").get(0).style.setProperty("--"+$font_size, to);
            } );
        } );
    }

    var $font_sizes = ['base', 'navbar', 'preheader', 'footer', 'buttons'];

    for (var i in $font_sizes) {
        var $font_size = 'font-size-'+$font_sizes[i];
  
        map_font_sizes_to_customize($font_size);
    }

    // fonts
    // Load a Google font by name.
    //var WebFont = require('webfontloader');

    var loadFont = function(font) {
        WebFont.load({
            google: {
                families: [font]
            }
        });
    };

    function map_fonts_to_customize($font) {
        wp.customize( $font, function( value ) {
    
            value.bind( function( to ) {
                if(to.length > 1) {
                    loadFont(to);
                    $("body").get(0).style.setProperty("--"+$font, to.replace(/\+/g, " "));
                }
            } );
        } );
    }

    var $fonts = ['main', 'headings'];

    for (var i in $fonts) {
        var $font = 'font-'+$fonts[i];
        map_fonts_to_customize($font);
    }

} )( jQuery );