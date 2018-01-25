jQuery(function($) {
/*--------------------------------------------------------------
1.0 b-lazy
--------------------------------------------------------------*/ 
    
   (function(){
      var bLazy = new Blazy({ 
          success: function(ele){
              // Image has loaded
              // Do your business here
          }
        , error: function(ele, msg){
          console.log(msg);
              if(msg === 'missing'){
                  // Data-src is missing
              }
              else if(msg === 'invalid'){
                  // Data-src is invalid
              }  
          }
      });
   })();

/*--------------------------------------------------------------
2.0 WOW.js
--------------------------------------------------------------*/

// no longer included by default

/*--------------------------------------------------------------
3.0 Nav on scroll
--------------------------------------------------------------*/   

    function debounce(func, wait, immediate) {
      var timeout;
      return function() {
        var context = this, args = arguments;
        var later = function() {
          timeout = null;
          if (!immediate) func.apply(context, args);
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
      };
    };
    
   // Constructor
   function HeaderScroll(target, targetOffset, toggleAddClass, toggleRemoveClass) { // scroll object
      this.target = $(target);
      this.targetOffset = targetOffset;
      this.toggleAddClass = toggleAddClass;
      this.toggleRemoveClass = toggleRemoveClass;
   }
   
   var HeaderScrollPrimaryFixed = new HeaderScroll('.navbar-primary', $("#content").offset().top, 'navbar-scrolled', 'navbar-is-at-top'); // new instance
   
   // Prototype
   HeaderScroll.prototype.scroll = function() { // our method
      var scroll = $(window).scrollTop();
      target = this.target;
      targetOffset = this.targetOffset;
      if (scroll >= targetOffset) {
         target.addClass(this.toggleAddClass);
         target.removeClass(this.toggleRemoveClass);   
     } else {
         target.removeClass(this.toggleAddClass);
         target.addClass(this.toggleRemoveClass);   
     }   
   }

  var debouncedFn = debounce(function() {
    console.log('scrolled');
    HeaderScrollPrimaryFixed.scroll();
  }, 250);

  window.addEventListener('scroll', debouncedFn);
   
   
	/*--------------------------------------------------------------
	4.0 Slick
	--------------------------------------------------------------*/

	(function() {
		var screenWidth = $(window).width();

		$('.slick').slick({
			infinite: true,
			autoplay: true,
			dots: true,
			arrows: false,
			autoplaySpeed: 10000,
			slidesToShow: 1,
			slidesToScroll: 1
		});

		$('.slick-multiple').slick({
			infinite: true,
			autoplay: true,
			dots: true,
			arrows: false,
			autoplaySpeed: 10000,
			slidesToShow: 2,
			slidesToScroll: 1
		});
	})();
    
   /*--------------------------------------------------------------
	5.0 Slide/Push Menus
	--------------------------------------------------------------*/
	/**
	 * Push left instantiation and action.
	 */
	var slideLeft = new Menu({
		wrapper: '#o-wrapper',
		type: 'slide-left',
		menuOpenerClass: '.c-button',
		maskId: '#c-mask'
	});

	var slideLeftBtn = document.querySelector('#c-button--toggle');
  
	slideLeftBtn.addEventListener('click', function(e) {
		e.preventDefault;
		$('.c-button').toggleClass('is-active');
		 slideLeft.open();
	});

	$('.c-menu__close').click(function() {
		$('.c-button').toggleClass('is-active');
	});

	(function() { // made the anchor not the li item clickable
		$(".c-menu__items > .menu-item-has-children > a").on("click", function(e) {
			e.preventDefault();
			var anchor = $(this);
			anchor.toggleClass('down');
			var subMenu = $(this).next('.sub-menu');
			subMenu.toggleClass('show');
		});
	})();
    

   $('.modal-footer-trigger').click(function(){
      $('#modal-footer').modal('show');
   });
   
   $( ".search-trigger" ).click(function(e) {
     e.preventDefault();
     $( ".search-bar" ).slideToggle( 300, function() {
       // Animation complete.
     });
     
   });
   
   /*--------------------------------------------------------------
   6.0 CF7 submission
   --------------------------------------------------------------*/
   $('.wpcf7-submit').attr('data-loading-text','Loading');
   // Show new spinner on Send button click
   $('.wpcf7-submit').on('click', function () {
         var txt = $(this).val();
         $(this).button('loading');         
   });
   
   // Hide new spinner on result
   $(document).on('wpcf7:invalid wpcf7:spam wpcf7:mailsent wpcf7:mailfailed', function () {
      $('.wpcf7-submit').removeAttr('disabled', 'disabled').val('Submitted');
   });

   /*--------------------------------------------------------------
   7.0 Colorbox
   --------------------------------------------------------------*/   
   (function(){
      $(".gallery-icon a").colorbox({
         maxWidth:'95%',
         maxHeight:'95%',
         rel:"gallery",
         transition: "fade",
         title: function(){
             return $(this).children('img').attr('alt');
         }
      });
   })();
   
   /*--------------------------------------------------------------
   8.0 Smooth Scroll
   --------------------------------------------------------------*/   
   
   (function(){
      $('.local-link').click(function() {
         if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
         var target = $(this.hash);
         var header = $('.navbar-sticky').height();
         console.log(header);
         target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
         if (target.length) {
            $('html, body').animate({
               scrollTop: target.offset().top - header
               }, 1000);
               return false;
            }
         }
      });
   })();   

   /*--------------------------------------------------------------
   9.0 Isotope js
   --------------------------------------------------------------*/    
   $('.isotope-grid').isotope({
     // options
     itemSelector: '.wow',
     layoutMode: 'fitRows'
   });
   
   $('.isotope-filters .single-filter').click(function(){
        $('.isotope-filters .single-filter').removeClass('focus');
        $(this).addClass('focus');
   
        var selector = $(this).attr('data-filter');

        $('.isotope-grid').isotope({
            filter: selector,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
         });
         return false;
   });
   
   /*--------------------------------------------------------------
   10.0 Images loaded
   --------------------------------------------------------------*/
   
   $('#content').imagesLoaded( function() {
      // images have loaded
      $('body').addClass('loaded');
   });

});