( function($) {
  'use strict';

$(function(e) {
    

    function ajaxLoadPost(target,cat,page){
    	$.ajax({
            url: ajaxurl,
            type: 'POST',
            data: "action=pagination_data&page="+page+"&cat="+cat,
            success: function(data) {              	
              	$(target).html(data);
              	$(".animated", target).addClass('go')
            },
            complete:function(){
               
            }
        });
    }

    $(".ajax-load-post").each(function(index, el) {
    	var cat = $(this).data("id");
    	ajaxLoadPost($(this),cat,1);
    });
    $(".ajax-load-post").on('click', '.pagination a.page-numbers', function(event) {
    	var page= $(this).html();
    	var target = $(this).parents(".ajax-load-post");
    	var cat = $(target).data("id");
    	$(this).html('<i class="fa fa-spinner fa-spin fa-fw"></i>');
    	ajaxLoadPost(target,cat,page);
    	return false;
    });

  });
})(jQuery);
