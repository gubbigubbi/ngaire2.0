jQuery(function($) {
    // Set ur variables
    var $colors = ['light', 'dark', 'text', 'neutral', 'grey'];
    
    for (var i in $colors) {
        var $color = 'color-'+$colors[i];
        var $myAjax = myAjax[$color];

        $("body").get(0).style.setProperty("--"+$color, $myAjax);
    }

    // fonts sizes

    var $font_sizes = ['base', 'navbar', 'preheader', 'footer', 'buttons'];

    for (var i in $font_sizes) {
        var $font_size = 'font-size-'+$font_sizes[i];
        var $myAjax = myAjax[$font_size];
        $("body").get(0).style.setProperty("--"+$font_size, $myAjax);
    }

    // dont load via webloader do it on load via php
    var $fonts = ['main', 'headings'];

    for (var i in $fonts) {
        var $font = 'font-'+$fonts[i];
        var $myAjax = myAjax[$font];

            if($myAjax.length > 1) {
                //loadFont($myAjax);
                $("body").get(0).style.setProperty("--"+$font, $myAjax.replace(/\+/g, " "));
            }

    }
});