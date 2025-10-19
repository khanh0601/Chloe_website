(function($) {
  'use strict';
	$(function(e) {
		$('map').imageMapResize();
        var imagemapster = $(".imagemapster");
        if (imagemapster.length >= 1) {
        	$.each(imagemapster, function(index, val) {
        		var ethis = $(this);
        		ethis.find("area").hover(function () {
	                var opacity = ethis.data("opacity-s");
	                ethis.find(".mainimg").css("opacity", opacity + "");
	                var id = $(this).data("id");
	                var selecter = ".maphover img[data-id='" + id + "']";
	                ethis.find(selecter).addClass("active");
	            }, function () {
	                var opacity = ethis.data("opacity-e");
	                ethis.find(".mainimg").css("opacity", opacity + "");
	                var id = $(this).data("id");
	                var selecter = ".maphover img[data-id='" + id + "']";
	                ethis.find(selecter).removeClass("active");
	            })
        	});
        }
        $('.nav-tabs a').on('shown.bs.tab', function(event){
		  $('map').imageMapResize();
		});
	});
})(jQuery);
