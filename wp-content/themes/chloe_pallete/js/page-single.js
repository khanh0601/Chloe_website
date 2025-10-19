(function($) {
  'use strict';
	$(function(e) {
		

		$(".news-list").slick({
			infinite: false,
			dots: true,
			arrows:false,
		  	slidesToShow: 4,
		  	speed: 300,
		  	slidesToScroll: 4,
		  	responsive: [
			    {
			      breakpoint: 1024,
			      settings: {
			        slidesToShow: 3,
			        slidesToScroll: 3,
			      }
			    },
			    {
			      breakpoint: 600,
			      settings: {
			        slidesToShow: 2,
			        slidesToScroll: 2
			      }
			    },
			    {
			      breakpoint: 480,
			      settings: {
			        slidesToShow: 1,
			        slidesToScroll: 1
			      }
			    }
			    // You can unslick at a given breakpoint now by adding:
			    // settings: "unslick"
			    // instead of a settings object
			  ]
		}).removeClass("hide");

		
	});
})(jQuery);
