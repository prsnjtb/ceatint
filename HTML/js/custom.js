
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
	
	$(".accord-menu ul ul:first").show(); 
	$(".accord-menu > ul > li:first h3 .plus").text('-');
	$(".accord-menu h3").click(function () {
		//slide up all the link lists
		$(".accord-menu ul ul").slideUp();
		$('.plus',this).html('+');
		//slide down the link list below the h3 clicked - only if its closed
		if (!$(this).next().is(":visible")) {
			$(this).next().slideDown();
			//$(this).remove("span").append('<span class="minus">-</span>');
			$('.plus').html('+');
			$('.plus',this).html('-');
		}
	})
	
	$(".accord-treeMenu ul ul:first").show(); 
	$(".accord-treeMenu > ul > li:first h3 .arrow").html('<i class="fa fa-angle-up" aria-hidden="true"></i>');
	$(".accord-treeMenu h3").click(function () {
		//slide up all the link lists
		$(".accord-treeMenu ul ul").slideUp();
		$('.arrow',this).html('<i class="fa fa-angle-down" aria-hidden="true"></i>');
		//slide down the link list below the h3 clicked - only if its closed
		if (!$(this).next().is(":visible")) {
			$(this).next().slideDown();
			//$(this).remove("span").append('<span class="minus">-</span>');
			$('.arrow').html('<i class="fa fa-angle-down" aria-hidden="true"></i>');
			$('.arrow',this).html('<i class="fa fa-angle-up" aria-hidden="true"></i>');
		}
	})
	
	$('.treeMenu > li > a');
	
	$(".treeMenu > li").each(function () {
        $(this).find('ul').parent().addClass("expanded");
    });
	jQuery('.expanded').prepend('<span class="responsive-toggle"><p class="t-plus">+</p> <p class="t-minus">-</p></span>');
	jQuery('.t-minus').hide();
	jQuery('.treeMenu > li > a').click(function(e) {	
			var jQuerythis = jQuery(this);
		  
			if (jQuerythis.next().hasClass('shows')) {
				jQuerythis.next().removeClass('shows');
				jQuerythis.next().slideUp(350);
				jQuerythis.prev().find('.t-minus').hide();
				jQuerythis.prev().find('.t-plus').show();
				jQuerythis.parent().siblings().siblings().find('.t-minus').hide();
				jQuerythis.parent().siblings().siblings().find('.t-plus').show();
				
			} else {
				jQuerythis.parent().parent().find('ul').removeClass('shows');
				jQuerythis.parent().parent().find('ul').slideUp(350);
				jQuerythis.next().toggleClass('shows');
				jQuerythis.next().slideToggle(350);
				jQuerythis.prev().find('.t-plus').toggle();
				jQuerythis.prev().find('.t-minus').show();
				jQuerythis.parent().siblings().find('.t-plus').show();
				jQuerythis.parent().siblings().find('.t-minus').hide();
			}
			e.stopPropagation();
	});
	$('.one-sidebar').prepend('<span class="filter-togl"></span>');
	$(".filter-togl").click(function() {
		$('.sidebar').toggleClass('sidebar-togl');
		$(this).toggleClass('filter-tog');
	});
	
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

jQuery(function($){
equalheight = function(container){
 
var currentTallest = 0,
     currentRowStart = 0,
     rowDivs = new Array(),
     $el,
     topPosition = 0;
 jQuery(container).each(function() {
 
   $el = $(this);
   jQuery($el).height('auto')
   topPostion = $el.position().top;
 
   if (currentRowStart != topPostion) {
     for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
       rowDivs[currentDiv].height(currentTallest);
     }
     rowDivs.length = 0; // empty the array
     currentRowStart = topPostion;
     currentTallest = $el.height();
     rowDivs.push($el);
   } else {
     rowDivs.push($el);
     currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
  }
   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
     rowDivs[currentDiv].height(currentTallest);
   }
 });
}
 
jQuery(window).load(function() {
  equalheight('.inner-container .equalHeight');
});
 
jQuery(window).resize(function(){
  equalheight('.inner-container .equalHeight');
});
});