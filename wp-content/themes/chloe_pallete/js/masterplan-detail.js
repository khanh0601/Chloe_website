
( function($) {
  'use strict';
  $(function(e) {
    
    $('.dropdown-lo .dropdown-menu a').click(function(event) {
      var title = $(this).html();
      var id = $(this).data("id");
      loadTang(id,false);
      $(".dropdown-lo  button").html(title);
      $(this).parent().toggleClass('show').parent().toggleClass('show');
      return false;
    });

    $('.dropdown-tang').on('click', '.dropdown-menu a', function(event) {
      var title = $(this).html();
      var id = $(this).data("id");
      loadCanHo(id,false);
      $(".dropdown-tang button").html(title);
      $(this).parent().toggleClass('show').parent().toggleClass('show');
      return false;
    });

    $('.dropdown-canho').on('click', '.dropdown-menu a', function(event) {
       var url = $(this).data("url");
      window.location.href = url;
      return false;
    });
    if($('.dropdown-lo').data("default") !="0" ){
      if($('.dropdown-lo').data("default") !=0 && $('.dropdown-lo .dropdown-item[data-id="'+$('.dropdown-lo').data("default")+'"]').length ){
        $('.dropdown-lo button').html($('.dropdown-lo .dropdown-item[data-id="'+$('.dropdown-lo').data("default")+'"]').html());
      }
      loadTang($('.dropdown-lo').data("default"),true);
      loadCanHo($('.dropdown-tang').data("default"),true);
    }

    function loadTang(idLo,firstTime=false){
      $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: "action=loadtang&idLo="+idLo,
            success: function(data) {
              $('.dropdown-tang .dropdown-menu').html(data);              
            },
            complete:function(){
               if(firstTime){
                if($('.dropdown-tang').data("default") !=0 && $('.dropdown-tang .dropdown-item[data-id="'+$('.dropdown-tang').data("default")+'"]').length ){
                  $('.dropdown-tang button').html($('.dropdown-tang .dropdown-item[data-id="'+$('.dropdown-tang').data("default")+'"]').html());
                }
               }
            }
        });
    }
    function loadCanHo(idTang,firstTime=false){
      $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: "action=loadcanho&idTang="+idTang,
            success: function(data) {
              $('.dropdown-canho .dropdown-menu').html(data);
              
            },
            complete:function(){
               if(firstTime){
                if($('.dropdown-canho').data("default") !=0 && $('.dropdown-canho .dropdown-item[data-id="'+$('.dropdown-canho').data("default")+'"]').length ){
                  $('.dropdown-canho button').html($('.dropdown-canho .dropdown-item[data-id="'+$('.dropdown-canho').data("default")+'"]').html());
                }
               }
            }
        });
    }

    /*$(".furniture-slide").slick({
      infinite: true,
      dots: false,
      arrows:true,
        slidesToShow: 1,
        speed: 300,
        slidesToScroll: 1,
    });

    $('.nav-tabs a[href="#tabnoithatcodien2d"]').on('shown.bs.tab', function(event){
      //$(window).trigger('resize');
    $('#tabnoithatcodien2d .furniture-slide').slick('setPosition');
    });
     $('.nav-tabs a[href="#tabnoithathiendai2d"]').on('shown.bs.tab', function(event){
      //$(window).trigger('resize');
    $('#tabnoithathiendai2d .furniture-slide').slick('setPosition');
    });*/

    var panos =[];
    var panoInit= false;
    $(".furniture-slide-3d .item img").each(function(index, el) {
      panos.push({
        url: $(this).attr("src"),
        desc: '',
        target: {
          //longitude: 3.848,
          //latitude: -0.244,
          zoom: 0
        }
      });
    });

   


    $('.nav-tabs a[href="#tabnoithatcodien"]').on('shown.bs.tab', function(event){
      //$(window).trigger('resize');
      var panoIndex=0;
      var panoLoading = false;
      if(panoInit==false && panos.length>0){
        var PSV = new PhotoSphereViewer({
          container: 'photosphere',
          panorama: panos[panoIndex].url,
          caption: panos[panoIndex].desc,
          //loading_img: 'assets/photosphere-logo.gif',
          longitude_range: [-7 * Math.PI / 8, 7 * Math.PI / 8],
          latitude_range: [-3 * Math.PI / 4, 3 * Math.PI / 4],
          anim_speed: '-2rpm',
          default_fov: 100,
          fisheye: false,
          move_speed: 1.1,
          time_anim: false,
          navbar: [
            'autorotate', 'zoom', 'download',
            {
              title: 'Prev image',
              className: 'custom-button',
              content: '<i class="fa fa-long-arrow-left" aria-hidden="true"></i>',
              onClick: (function() {

                return function() {
                  if (panoLoading) {
                    return;
                  }

                  panoLoading = true;
                  panoIndex = panoIndex == 0 ? panos.length-1 : panoIndex - 1;
                  console.log(panoIndex);
                  //PSV.clearMarkers();
                  PSV.setPanorama(panos[panoIndex].url, panos[panoIndex].target, true)
                    .then(function() {
                      //PSV.setCaption(panos[i].desc);
                      panoLoading = false;
                    });
                }
              }())
            },
            {
              title: 'Next image',
              className: 'custom-button',
              content: '<i class="fa fa-long-arrow-right" aria-hidden="true"></i>',
              onClick: (function() {
                

                return function() {
                  if (panoLoading) {
                    return;
                  }
                  panoLoading = true;
                  panoIndex = panoIndex == panos.length -1? 0 : panoIndex +1;
                  //PSV.clearMarkers();
                  PSV.setPanorama(panos[panoIndex].url, panos[panoIndex].target, true)
                    .then(function() {
                      //PSV.setCaption(panos[i].desc);
                      panoLoading = false;
                    });
                }
              }())
            },
            //'caption', 
            'gyroscope', 
            'stereo', 
            'fullscreen'
          ]
        });
        panoInit = true;
      }
    });


    var panosHienDai =[];
    var panoHienDaiInit= false;
    $(".furniture2-slide-3d .item img").each(function(index, el) {
      panosHienDai.push({
        url: $(this).attr("src"),
        desc: '',
        target: {
          //longitude: 3.848,
          //latitude: -0.244,
          zoom: 0
        }
      });
    });


    $('.nav-tabs a[href="#tabnoithathiendai"]').on('shown.bs.tab', function(event){
      //$(window).trigger('resize');
      var panoHienDaiIndex=0;
      var panoHienDaiLoading = false;
      if(panoHienDaiInit==false && panosHienDai.length>0){
        var PSVHienDai = new PhotoSphereViewer({
          container: 'photosphere2',
          panorama: panosHienDai[panoHienDaiIndex].url,
          caption: panosHienDai[panoHienDaiIndex].desc,
          //loading_img: 'assets/photosphere-logo.gif',
          longitude_range: [-7 * Math.PI / 8, 7 * Math.PI / 8],
          latitude_range: [-3 * Math.PI / 4, 3 * Math.PI / 4],
          anim_speed: '-2rpm',
          default_fov: 100,
          fisheye: false,
          move_speed: 1.1,
          time_anim: false,
          navbar: [
            'autorotate', 'zoom', 'download', 
            {
              title: 'Prev image',
              className: 'custom-button',
              content: '<i class="fa fa-long-arrow-left" aria-hidden="true"></i>',
              onClick: (function() {

                return function() {
                  if (panoHienDaiLoading) {
                    return;
                  }

                  panoHienDaiLoading = true;
                  panoHienDaiIndex = panoHienDaiIndex == 0 ? panosHienDai.length-1 : panoHienDaiIndex - 1;
                  PSVHienDai.setPanorama(panosHienDai[panoHienDaiIndex].url, panosHienDai[panoHienDaiIndex].target, true)
                    .then(function() {
                      panoHienDaiLoading = false;
                    });
                }
              }())
            },
            {
              title: 'Next image',
              className: 'custom-button',
              content: '<i class="fa fa-long-arrow-right" aria-hidden="true"></i>',
              onClick: (function() {
                

                return function() {
                  if (panoHienDaiLoading) {
                    return;
                  }
                  panoHienDaiLoading = true;
                  panoHienDaiIndex = panoHienDaiIndex == panosHienDai.length -1? 0 : panoHienDaiIndex +1;
                  //PSV.clearMarkers();
                  PSVHienDai.setPanorama(panosHienDai[panoHienDaiIndex].url, panosHienDai[panoHienDaiIndex].target, true)
                    .then(function() {
                      panoHienDaiLoading = false;
                    });
                }
              }())
            },
            //'caption', 
            'gyroscope', 
            'stereo', 
            'fullscreen'
          ]
        });
        panoHienDaiInit = true;
      }
    });
  
  });
})(jQuery);