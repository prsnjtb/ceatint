
$(document).ready( function() {
	function i() {
		windowHeight = $(window).innerHeight(),
		$('.banner-slider').css('height', windowHeight),
		$('slider-block').css('height', windowHeight)
	  }
	  i(),
	  $(window).resize(function () {
		i()
	  })
	  
	$('.jquery-reslider').reSlider({
		speed:1000,
		delay:5000,
		imgCount:3,
		dots:true,
		autoPlay:true
	})
	
	$('.top-block > ul').toggleClass('ul js');
    $('.top-block .js ul').hide();
    $('.top-block li').click(function (e) {
        $('.top-block li').not(this).find('ul').slideUp(200);
        $(this).find('ul').slideToggle(200);
		$('.clicker').toggleClass('active');
        e.stopPropagation();
    });
	$(document).click(function() {
		if ($('.top-block .js ul').is(':visible')) {
		  $('.top-block .js ul', this).slideUp();
		  $('.top-block').removeClass('active');
		}
	});
	
	jQuery('.right-floated > li').click(function(e) {	
			var jQuerythis = jQuery(this);
		  
			if (jQuerythis.hasClass('shows-floated')) {
				jQuerythis.removeClass('shows-floated');
			} else {
				jQuerythis.siblings().removeClass('shows-floated');
				jQuerythis.toggleClass('shows-floated');
			}
			e.stopPropagation();
	});
	
	$('.fade-in').addClass("hideme").viewportChecker({
		classToAdd: 'visible animated fadeIn', // Class to add to the elements when they are visible
	});
	
	$('.fade-in-left').addClass("hideme").viewportChecker({
		classToAdd: 'visible animated fadeInLeft', // Class to add to the elements when they are visible
	});
	
	$('.fade-in-right').addClass("hideme").viewportChecker({
		classToAdd: 'visible animated fadeInRight', // Class to add to the elements when they are visible
	});
	
	$('.fade-in-down').addClass("hideme").viewportChecker({
		classToAdd: 'visible animated fadeInDown', // Class to add to the elements when they are visible
	});
	
	$('.fade-in-up').addClass("hideme").viewportChecker({
		classToAdd: 'visible animated fadeInUp', // Class to add to the elements when they are visible
	});
	
	
	ScrollLoad ("scrollholder", "scroll", false);
	
	$(".sec-next").click(function() {
		$('html,body').animate({
			scrollTop: $(".hp-sec").offset().top - 56},1000);
	});
	
	$(".slidersOpenBtn").click(function() {
		$('.top-header .top-block').slideToggle();
	});
	
	$(".menuOpenBtn").click(function() {
		$('.main-header').toggleClass('menu-togl');
		$(this).toggleClass('togl');
		$('.top-header .top-block').slideUp();
	});
});
$(window).scroll(function() {    
    var scroll = $(window).scrollTop();
    if (scroll >= 58) {
        $("body").addClass("bodyTog");
    } else {
        $("body").removeClass("bodyTog");
    }
});

$(window).bind("load resize", function() {
    var width = $(window).width();
    if (width <= 767) {
		$(".find-distributor .distributors").detach().insertBefore('.find-distributor .map');
    }
    else {
        $(".find-distributor .distributors").detach().insertAfter('.find-distributor .map');
    }
});
