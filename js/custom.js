/**
	Custom JS
	
	1. DROPDOWN MENU
	2. FIXED TOP MENU BAR
	3. TOP SLIDER
	5. COUNTER
	6. DOCTORS TEAM SLIDER(SLICK SLIDER)
	7. TESTIMONIAL SLIDER(SLICK SLIDER)
	8. PRELOADER
	9. SCROLL TOP BUTTON
	10. ACCORDION
**/

jQuery(function($){

  /* ----------------------------------------------------------- */
  /*  1. DROPDOWN MENU
  /* ----------------------------------------------------------- */

   // for hover dropdown menu
  $('ul.nav li.dropdown').hover(function() {
      $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(200);
    }, function() {
      $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(200);
    });

	/* ----------------------------------------------------------- */
	/*  2. Fixed Top Menubar
	/* ----------------------------------------------------------- */

	// For fixed top bar
       $(window).scroll(function(){
        if($(window).scrollTop() >50 /*or $(window).height()*/){
            $(".navbar-fixed-top").addClass('past-main');
            $(".navbar-right .dropdown-menu").css('top','70px');   
        }
    else{    	
      $(".navbar-fixed-top").removeClass('past-main');
      $(".navbar-right .dropdown-menu").css('top','75px');
      }
    });

    /* ----------------------------------------------------------- */
	/*  3. Top Slider
	/* ----------------------------------------------------------- */     
	     $('.top-slider').slick({
		  dots: false,
		  arrows:true,
		  autoplay: true,
		  speed: 500,
		  fade: true,
		  cssEase: 'linear'
		});
    /* ----------------------------------------------------------- */



	
	/* ----------------------------------------------------------- */
	/*  9. SCROLL TOP BUTTON
	/* ----------------------------------------------------------- */

	//Check to see if the window is top if not then display button

	  $(window).scroll(function(){
	    if ($(this).scrollTop() > 300) {
	      $('.scrollToTop').fadeIn();
	    } else {
	      $('.scrollToTop').fadeOut();
	    }
	  });
	   
	  //Click event to scroll to top

	  $('.scrollToTop').click(function(){
	    $('html, body').animate({scrollTop : 0},800);
	    return false;
	  });

	/* ----------------------------------------------------------- */
	/*  10. Bootstrap Accordion
	/* ----------------------------------------------------------- */  

	
	$('#accordion .panel-collapse').on('shown.bs.collapse', function () {
	$(this).prev().find(".fa").removeClass("fa-plus").addClass("fa-minus");
	});
	
	//The reverse of the above on hidden event:
	
	$('#accordion .panel-collapse').on('hidden.bs.collapse', function () {
	$(this).prev().find(".fa").removeClass("fa-minus").addClass("fa-plus");
	});	
	
});
