(function($) {
  'use strict';
	$(function(e) {

		// On edge hit
		$('.page-banner-slide').on('init', function(event, slick, direction){
			var html ="<div class='section-content div_zindex '>"
	        + "<div class='container'>"
	        + "<div class='slide-description '> </div>"
	        + "<div class='text-center  '>"
	        + "<span class='text-uppercase'>"+app.message.banner_scroll+"</span><div class='arrow-down'><i class='fa fa-chevron-down'></i></div>"
	        + "</div>"
	        + "</div>"
	    	+ "</div>";
		   $(this).append(html);
		});

		 $(".page-banner-slide").slick({
			infinite: true,
			dots: true,
			arrows:false,
		  	slidesToShow: 1,
		  	speed: 300,
		  	slidesToScroll: 1,
		}).removeClass("d-none");
	});
})(jQuery);



