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
       new WOW().init();
   })();

/*--------------------------------------------------------------
3.0 Nav on scroll
--------------------------------------------------------------*/   
   
   function HeaderScroll(target, targetOffset) { // scroll object
      this.target = $(target);
      this.targetOffset = targetOffset;
   }
   
   var HeaderScrollPrimary = new HeaderScroll('.navbar-primary', $(".site-header").offset().top + 1); // new instance

   HeaderScroll.prototype.scroll = function() { // our method
      var scroll = $(window).scrollTop();
      target = this.target;
      targetOffset = this.targetOffset;
      if (scroll >= targetOffset) {
         target.addClass("navbar-fixed-top");      
     } else {
         target.removeClass("navbar-fixed-top");       
     }   
   }
   
   var screenWidth = $(window).width();
    
   $(window).scroll(function() { // call the method when scrolling
      if (screenWidth > 767) {
        HeaderScrollPrimary.scroll();
      }
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
			arrows: false,
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
	var pushLeft = new Menu({
		wrapper: '#o-wrapper',
		type: 'push-left',
		menuOpenerClass: '.c-button',
		maskId: '#c-mask'
	});

	var pushLeftBtn = document.querySelector('#c-button--push-left');

	pushLeftBtn.addEventListener('click', function(e) {
		e.preventDefault;
		$('.c-button').toggleClass('is-active');
		setTimeout(function() {
			pushLeft.open();
		}, 300);

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
    

});