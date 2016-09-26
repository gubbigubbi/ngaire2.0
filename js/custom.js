// Custom functions relevant to this project only
jQuery(function($) {
   /*--------------------------------------------------------------
   6.0 CF7 submission
   --------------------------------------------------------------*/      
      // Adding Font Awsome spinner, hidden by default
   $('.wpcf7-form').after('<i class="icon ion-gear-b icon-spin ajax-loader-custom" style="visibility: hidden"></i>');
   
   // Show new spinner on Send button click
   $('.wpcf7-submit').on('click', function () {
       $('.ajax-loader-custom').css({ visibility: 'visible' });
   });
   
   // Hide new spinner on result
   $(document).on('wpcf7:invalid wpcf7:spam wpcf7:mailsent wpcf7:mailfailed', function () {
       $('.ajax-loader-custom').css({ visibility: 'hidden' });
   });
   
});