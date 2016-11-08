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
   (function(){
      
      var wow = new WOW(
        {
          boxClass:     'wow',      // animated element css class (default is wow)
          animateClass: 'animated', // animation css class (default is animated)
          offset:       0,          // distance to the element when triggering the animation (default is 0)
          mobile:       false,       // trigger animations on mobile devices (default is true)
        }
      );
      wow.init();
   })();

/*--------------------------------------------------------------
3.0 Nav on scroll
--------------------------------------------------------------*/   
   
   // Constructor
   function HeaderScroll(target, targetOffset, toggleAddClass, toggleRemoveClass) { // scroll object
      this.target = $(target);
      this.targetOffset = targetOffset;
      this.toggleAddClass = toggleAddClass;
      this.toggleRemoveClass = toggleRemoveClass;
   }
   
   var HeaderScrollPrimarySticky = new HeaderScroll('.navbar-primary.navbar-sticky', $(".site-header").offset().top + 1, 'navbar-fixed-top', 'navbar-is-at-top'); // new instance
   var HeaderScrollPrimaryFixed = new HeaderScroll('.navbar-primary.navbar-fixed-top', $(".site-header").offset().top + 1, 'navbar-scrolled', 'navbar-is-at-top'); // new instance
   
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
   
   var screenWidth = $(window).width();
    
   $(window).scroll(function() { // call the method when scrolling
      if (screenWidth > 767) {
        HeaderScrollPrimarySticky.scroll();
      }
   });
   
   $(window).scroll(function() {
      HeaderScrollPrimaryFixed.scroll();
   });
   
	/*--------------------------------------------------------------
	4.0 Slick
	--------------------------------------------------------------*/

	(function() {
		var screenWidth = $(window).width();

		$('.slick').slick({
			infinite: true,
			autoplay: true,
			dots: true,
			arrows: true,
			autoplaySpeed: 6000,
			slidesToShow: 1,
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
       $('.wpcf7-submit').val('Submit Again');
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
   8.0 Smooth Scroll and Director js
   --------------------------------------------------------------*/   
   
   (function(){
      $('a[href*="#"]:not([href="#"])').click(function() {
         if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
         var target = $(this.hash);
         var header = $('.navbar-fixed-top').height();
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
   
   (function(){

      var page = function () {console.log("page"); };
      
      var routes = {
        '/':  page,
      };
      
      var router = Router(routes);
      router.init(['/']);
   
   });

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
        
    

});