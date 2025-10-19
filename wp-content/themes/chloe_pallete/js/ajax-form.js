( function($) {
  'use strict';

$(function(e) {
    //setTimeout(function(){ $(window).trigger('resize'); }, 1000);

    $(".register").formValidation({
        framework: 'bootstrap',
        locale:'vi_VN',
        excluded: [':disabled'],
    }).on('success.form.fv', function(e) {
              // Prevent form submission
        e.preventDefault();
        var $form = $(e.target),
            fv    = $form.data('formValidation');

        var dText =$(".submit",$form).html();
        $(".submit",$form).html('<i class="fal fa-spinner fa-spin fa-fw"></i>').prop('disabled', true);
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: "action=contactform&"+$form.serialize()+"&source="+encodeURIComponent(window.location.href),
            success: function(data) {
              window.location.href=thankurl;

              var jObject = jQuery.parseJSON(data);
              if(jObject && jObject.status==1){
                /*var dialog = bootbox.dialog({
                    //size:'large',
                    onEscape:true,
                    backdrop:true,
                    message: app.message.register_success,
                    className:'popup-thanks popup-success',
                    callback: function(){
                      $("input",$form).val("");
                      $("select",$form).val("");
                    },
                    onEscape: function(){
                      $("input",$form).val("");
                      $("select",$form).val("");
                    }
                });*/
                window.location.href=thankurl;
              }
              else{
                var dialog = bootbox.dialog({
                    //size:'large',
                    onEscape:true,
                    backdrop:true,
                    message: app.message.register_false,
                    className:'popup-thanks popup-false'
                });
              }
            },
            complete:function(){
               $(".submit",$form).html(dText).prop('disabled', false);
               //$("#registerModal").modal("hide");
            }
        });
    });   

    /*setInterval(function() {
      $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: "action=checkpopup",
            success: function(data) {
              var jObject = jQuery.parseJSON(data);
              if(jObject && jObject.status==1){
                $("#registerModal").modal("show");
              }
              
            },
            complete:function(){
              
            }
        });
    }, 10000);
    */

    var afterLoadProduct= function(id){
      //
      if($(".product-detail-slide").length>0){
          $(".product-detail-slide").each(function(index, el) {
            var $ethis= $(this);
            var swiper = new Swiper(this, {
              loop:false,
              autoplay: false,
              slidesPerView: 1,
              pagination: {
                el: $(".swiper-pagination",$ethis.next()).get( 0 ),
                clickable: true,
                 dynamicBullets: true,
              },
              navigation: {
                nextEl: $(".swiper-button-next",$ethis.next()).get(0),
                prevEl: $(".swiper-button-prev",$ethis.next()).get(0)
              },
              breakpoints: {
                // when window width is >= 1200
                1200: {
                  pagination:false,

                },
              }
            });
          });

        }
      $(".product-detail [data-fancybox]").fancybox();
    };

    $(".trigger-product-detail").click(function(){
      var id = $(this).data("url");
      var thap = $(this).data("thap");
      var tang = $(this).data("tang");

      $.ajax({
          url: ajaxurl,
          type: 'POST',
          data: "action=get_prod&id="+id+"&thap="+thap+"&tang="+tang,
          success: function(data) {

            var jObject = jQuery.parseJSON(data);
            if(jObject && jObject.status==1){
                  var dialog = bootbox.dialog({
                  //size:'large',
                  onEscape:true,
                  backdrop:true,
                  closeButton: false,
                  message: jObject.content,
                  className:'popup-full modal-product-detail'
              });
              afterLoadProduct(id);
            }


          },
          complete:function(){

          }
      });

      /*var url = $(this).data("url");
      if(url){
        window.location.href = url;
      }*/
    });

    $(document).on("change",".select-product-change", function(){
      var id = $(this).val();
      $.ajax({
          url: ajaxurl,
          type: 'POST',
          data: "action=get_prod&id="+id,
          success: function(data) {

            var jObject = jQuery.parseJSON(data);
            if(jObject && jObject.status==1){
                if($(".modal-product-detail").length>0){
                  $(".modal-product-detail .bootbox-body").html(jObject.content);
                }
                else{
                  var dialog = bootbox.dialog({
                      //size:'large',
                      onEscape:true,
                      backdrop:true,
                      message: jObject.content,
                      className:'popup-full'
                  });
                }
                afterLoadProduct(id);


            }


          },
          complete:function(){

          }
      });
    });

    
    

  });
})(jQuery);
