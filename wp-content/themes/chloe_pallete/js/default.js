var vh = window.innerHeight * 0.01;
// Then we set the value in the --vh custom property to the root of the document
document.documentElement.style.setProperty('--vh', `${vh}px`);

window.addEventListener('resize', () => {
  // We execute the same script as before
  let vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty('--vh', `${vh}px`);
});


( function($) {
  'use strict';

  if($("body").hasClass('home-page')){
    window.onbeforeunload = function () {
      //$("body").addClass("d-none");
      window.scrollTo({
        top: 0,
        left: 0,
        behavior: 'instant'
      });
    }
  }

  $.fancybox.defaults.transitionEffect = "slide";


  $(function(e) {

    var fullpage_api;
    var page_firsttime_load= true;
    /*-------------------------------------------------------------------------------
        Sticky-Header
      -------------------------------------------------------------------------------*/
    function triggerSticky(){
      var sticky = $('#header'),
        scroll = $(window).scrollTop();

      if (scroll >= 50){
        sticky.addClass('sticky');
        //$("#gotop").removeClass('d-none');
      }
      else{
        sticky.removeClass('sticky');
        //$("#gotop").addClass('d-none');
      }

      if($("#footer").length > 0){
        if (scroll + $(window).height() - 50 > $("#footer").position().top) {
            $("body").addClass("sticky-footer");
        } else {
            $("body").removeClass("sticky-footer");
        }
      }


    }
    $(window).scroll(function(){
        triggerSticky();
    });
    triggerSticky();

    function scrollToAnchor(link){
      if(link.charAt(0)=="#"){
          var anchor = link.substring(1);
          if($('section[data-anchor="'+anchor+'"]').length>0){
            if(!$("body").hasClass('disable-fullpage')){
              var index = $("#fullpage > section").index($('section[data-anchor="'+anchor+'"]'));
              $.fn.fullpage.moveTo(index + 1);

            }
            else{
              $([document.documentElement, document.body]).animate({
                scrollTop: $('section[data-anchor="'+anchor+'"]').offset().top
              }, 800);
            }
            return false;
          }
      }
      return true;
    }

    if(!$("body").hasClass('home-page')){
      $(".overlay-menu .menu a, #fullpageMenu a, .btn-scroll, .menu-logo").click(function(event) {
        if($(this).hasClass("btn-scroll") && $(this).hasClass("disable-xs") && $(window).width() < 768) {
          return false;
        }
        var link = $(this).attr('href');
        if(link.charAt(0)=="#"){
          var anchor = link.substring(1);
          if($('section[data-anchor="'+anchor+'"]').length>0){
            if(!$("body").hasClass('disable-fullpage')){
              var index = $("#fullpage > section").index($('section[data-anchor="'+anchor+'"]'));
              $.fn.fullpage.moveTo(index + 1);

            }
            else{
              $([document.documentElement, document.body]).animate({
                scrollTop: $('section[data-anchor="'+anchor+'"]').offset().top
              }, 800);
            }
            return false;
          }
        }
      });

    }
    else{
      $(".overlay-menu .menu a, .navbar-brand, #fullpageMenu a, .btn-scroll, .menu-logo").click(function(event) {
        if($(this).hasClass("btn-scroll") && $(this).hasClass("disable-xs") && $(window).width() < 768) {
          return false;
        }
        var link = $(this).attr('href');
        if(link.charAt(0)=="#"){
          var anchor = link.substring(1);
          if($('section[data-anchor="'+anchor+'"]').length>0){
            $("body").removeClass("menu-open");
            $(".js__toggle-menu > span").html("Menu");
            var index = $("#fullpage > section").index($('section[data-anchor="'+anchor+'"]'));
            $.fn.fullpage.moveTo(index + 1);
            return false;
          }
        }
        if($(this).not("a")){
          window.location.href= $(this).attr("href");
        }
        //fullpage_api.moveTo(2, 3);
      });


      /*setTimeout(function(){
        if($("#intro_section").hasClass("fp-completely")){
          if($(window).width()> 1199){
           $.fn.fullpage.moveTo(2);
          }
          else{
            $([document.documentElement, document.body]).animate({
              scrollTop: $("#intro_section").next().offset().top - $("#header").height()
            }, 800);
          }
        }
      }, 10000);*/
    }

    $('body').on('click',function(event){
      //console.log(event.target);
       if(!$(event.target).is('#navbarContent')
        && !$(event.target).is('.navbar-toggler')
        && !$(event.target).is('.navbar-toggler .navbar-toggler-icon')
        && !$(event.target).parent().is('.menu-item-has-children')
        && $(".offcanvas-collapse").hasClass('open') ){
         $('.offcanvas-collapse').removeClass('open');
       }
    });

    $("#gotop").click(function(event) {
      if(!$("#fullpage").hasClass('fullpage-wrapper')){
        //var target = $(this).attr('href').substring(1);
        $([document.documentElement, document.body]).animate({
              //scrollTop: $("section[data-anchor='"+target+"']").offset().top
              scrollTop:0
        }, 500);
        return false;
      }
      else{
        $.fn.fullpage.moveTo(1);
      }
    });



    $(window).resize(function(event) {
      calcBannerSize();
    });
    calcBannerSize();

    function calcBannerSize(){
        var navH = $("#header").outerHeight();
        var h = $(window).width() * 980 / 1920 ;
        var fh=$(window).height() - navH;
        document.documentElement.style.setProperty('--navH', `${navH}px`);

        if($(window).width()>=1200 ){
          h = $("body").hasClass('disable-fullpage')? $(window).height(): "100%";

        }
        fh = $(window).height();



        $(".home-slide").css('height',fh);
        $(".product-slide").css('height',h);
        //$(".utilities-image-wrapper").css('height',$(window).height());
        $(".utilities-slide-out-wrapper").css('max-height',$(window).height());
        $(".subdivision-map-wrapper").css('height',$(window).height());


        if($(".section-masterplan").length>0){
          var w= $(window).width();
          var h= $(window).height();
          var wR= w/1920;
          var hR= h/980;
          $(".section-masterplan").each(function(){
            var $ethis = $(this);
              if(w < 1200){
                $(".masterplan-map",$ethis).css('transform','scale('+wR+')');
                $(".masterplan-map",$ethis).css({ left: w / 2 - 960, top: (w * 980 /1920)/2 - 490 });
              }
              else{
                if(wR>=hR){
                  $(".masterplan-map",$ethis).css('transform','scale('+wR+')');
                  $(".masterplan-map",$ethis).css({ left: w / 2 - 960, top: h / 2 - 490 });
                }
                else{
                   $(".masterplan-map",$ethis).css('transform','scale('+hR+')');
                   $(".masterplan-map",$ethis).css({ left: w / 2 - 960, top: h / 2 - 490} );
                }
              }
          });



        }



        if($(".fullpage-map").length>0){
          var w= $(window).width();
          var h= $(window).height();
          var imgW = 1920;
          var imgH = 980;
          var wR= w/imgW;
          var hR= h/imgH;

          if(w < 1200){
            $(".fullpage-map").css('transform','scale('+wR+')');
            $(".fullpage-map").css({ left: w / 2 - imgW/2, top: (w * imgH /imgW)/2 - imgH / 2 });
          }
          else{
            if(wR>=hR){
              $(".fullpage-map").css('transform','scale('+wR+')');
              $(".fullpage-map").css({ left: w / 2 - imgW/2, top: h / 2 - imgH /2  });
            }
            else{
               $(".fullpage-map").css('transform','scale('+hR+')');
               $(".fullpage-map").css({ left: w / 2 - imgW/2, top: h / 2 - imgH / 2} );
            }
          }
        }


    }

     $('.dropdown-toggle').dropdown();


    $(".js__toggle-menu").click(function () {
      $("body").toggleClass("menu-open");
      if($("body").hasClass("menu-open")){
        $(".js__toggle-menu > span").html("Close");
      }
      else{
        $(".js__toggle-menu > span").html("Menu");
      }
      return false;
    });
    $(".parent-width-child").each(function () {
      var $child = $(this);
      var $parent = $(this).closest(".parent-width-parent");
      $child.width($parent.width());
      $(window).resize(function () {
        $child.width($parent.width());
      });
    });
    $(".overlay-menu .menu .menu-item a").click(function () {
      //$("body").removeClass("menu-open");
      //$(".js__toggle-menu > span").html("Menu");
    });

    /*$(".overlay-menu .menu li").each(function(index, el) {
      if(index==0){
        return;
      }
      var num = ('0' + (index)).slice(-2);
      $(this).prepend("<i>"+(num)+"</i>");
    });*/


    var responsiveWidth = 1199;
    if(!$("body").hasClass('disable-fullpage')){
      var menu = $("#fullpageMenu").length >0 ? "#fullpageMenu":false;
      var sections = $("#fullpage > section");
      if(menu && sections.length>0){
        var navIndex =0;
        $.each(sections, function(index, val) {
           var title= $(this).data("title");
           var anchor= $(this).data("anchor");
           var addnav= $(this).data("nav");
           if((addnav === undefined || addnav === true) &&
              anchor && anchor!="" &&
              title && title !=""
           ){
              navIndex++;
              //var num = ('0' + (navIndex)).slice(-2);
              var num= navIndex;
              $(menu).append("<li data-menuanchor='"+anchor+"' ><a href='#"+anchor+"'><span>"+num+"</span> <span class='title'>"+title+"</span></a></li>");
           }
        });
        if(navIndex<=1){
          $(menu).remove();
          menu= false;
        }
      }

      var scrollReady = false;
      if($("body").hasClass("ready")){
        scrollReady = true;
      }
      fullpage_api = $('#fullpage').fullpage({
        sectionSelector: 'section',
        normalScrollElements:'.scrollable-content',
        onLeave: function(index, nextIndex, direction) {

          if (sections[nextIndex - 1]) {
            if($(window).width() > responsiveWidth ){
              $(".animated", sections[nextIndex - 1]).removeClass('go');
            }
            $(sections[nextIndex - 1]).removeClass("down up").addClass(direction);
          }
          if($(window).width() > responsiveWidth ){
            //$(".b-static").removeClass('show go');
          }
          if(nextIndex-1>0){
            if($("body").hasClass("home-page")){

            }
          }
          else{
            if($("body").hasClass("home-page")){
              //$('#header').removeClass('show go');
              //$('.fixed-btn').removeClass('show go');

            }
          }
          if (sections[nextIndex - 1] && $(window).width() > responsiveWidth ) {
            setTimeout(function(){
              $(".animated", sections[nextIndex - 1]).addClass('go');
            }, 100);

            var triggerFunction= $(sections[nextIndex-1]).data("triggerfunction");
            if(triggerFunction !== undefined && typeof(window[triggerFunction]) === "function"){
              if(nextIndex==1 && page_firsttime_load){
                setTimeout(function(){
                  window[triggerFunction]();
                }, 2000);
              }
              else{
                window[triggerFunction]();
              }
            }
          }
        },
        afterLoad: function(origin, destination, direction) {
          //Color
          //$(".b-static").addClass('show go');
          if (sections[destination-1]) {
            if($(window).width() <= responsiveWidth){
              $(".animated", sections[destination-1]).addClass('go');
            }
            //$(".animated", sections[destination-1]).addClass('go');
            if($(sections[destination-1]).hasClass("section-light") || $(sections[destination-1]).hasClass("dark") ){
              $("body").addClass("light");
            }
            else{
              $("body").removeClass("light");
            }

          }
          if(destination-1>0){
            $('#header').addClass('sticky');
            if($("body").hasClass("home-page")){
              $('#header').addClass('show go');
              $('.fixed-btn').addClass('show go');
            }
          }
          else{
            $('#header').removeClass('sticky');
          }

          if($(sections[destination-1]).attr("id")=="footer") {
            if($("#footer video").length >0 && $("#footer video").get(0).paused==true ){
              $("#footer video").get(0).play();
            }
            $(".fixed-scroll-downs").addClass("up");
          }
          else{
            $(".fixed-scroll-downs").removeClass("up");
          }

          if(sections[destination-1] && $(sections[destination-1]).hasClass("section-location")){
            setTimeout(function(){
              $(".map-pin",$(sections[destination-1])).addClass("show");
            }, 100);

          }
          else{
            $(".map-pin",$(sections[destination-1])).removeClass("show");
          }

          if($(window).width() <= responsiveWidth){
            var triggerFunction= $(sections[destination-1]).data("triggerfunction");
            if(triggerFunction !== undefined && typeof(window[triggerFunction]) === "function"){

              if(destination==1 && page_firsttime_load){
                setTimeout(function(){
                  window[triggerFunction]();
                }, 500);
              }
              else{
                window[triggerFunction]();
              }

            }
          }


          var scrollVideoStatus = false;
          if(scrollVideoStatus===false && $("#bgvid").length>0){
            if($(sections[destination-1]).attr("id")=="section_video") {
              var video = document.getElementById("bgvid");
              if(video.paused == true){
                //video.play();
                jQuery(".bgvideo").addClass("d-none");
                jQuery(sections[destination-1]).addClass("video-status-play");
                scrollVideoStatus= true;
              }
              else{

              }
            }
          }

          //var video = document.getElementById("bgvid");

          if(window.location.hash){
            //history.replaceState(null, null, ' ');
          }

          if(menu){
            var addnav= $(sections[destination-1]).data("nav");

             if(addnav === undefined || addnav === true){
                $("#fullpageMenu").addClass('show');
             }
             else{

                $("#fullpageMenu").removeClass('show');
             }
          }

        },
        afterRender: function(){
          //var pluginContainer = this;
          //alert("The resulting DOM structure is ready");
        },
        //scrollOverflow: true,
        responsiveWidth: responsiveWidth,
        lockAnchors: true ,
        menu: menu,
        parallax: true,
        parallaxOptions: {
            type: 'reveal',
            percentage: 62,
            property: 'translate'
        },
        scrollingSpeed: 700
      });

      $.fn.fullpage.setAllowScrolling(false);
      $.fn.fullpage.setKeyboardScrolling(false);


      $("#fullpageMenu a").click(function(event) {
        var link = $(this).attr('href');
        if(link.charAt(0)=="#"){
          var anchor = link.substring(1);
          if($('section[data-anchor="'+anchor+'"]').length>0){
            var index = $("#fullpage > section").index($('section[data-anchor="'+anchor+'"]'));
            $.fn.fullpage.moveTo(index + 1);
            return false;
          }
        }
      });

       /*Intro*/
      $(".scroll-downs").click(function(){
        $.fn.fullpage.moveTo(2);
        return false;
      });

    }
    else{
      //$(".fullpage-nav").removeClass("show");
    }


    /*SLICK*/

    //home-slide
    if(typeof Swiper == 'function'){
        var swiperSpeed = 1200;


        if($(".home-slide").length>0){
          $(".home-slide").each(function(index, el) {

            var $ethis = $(this);
            var $slideVideo = $("video",$ethis);
            var swiper = new Swiper(this, {
              loop:true,
              speed: 1200,
              autoplay: {
                 delay: 5000,
              },
              pagination: false,
              navigation: false,
              effect: 'fade',
              fadeEffect: {
                crossFade: true
              },
               speed: 2000,
               disableOnInteraction: true,
            });

            /*
            swiper.on('slideChangeTransitionEnd', function () {
              if($slideVideo.length>0){
                $slideVideo.each(function(index, el) {
                   this.currentTime = 0;
                   this.pause();
                });
                if($(".swiper-slide-active video",$ethis).length > 0){
                  $(".swiper-slide-active video",$ethis).get(0).play();
                  swiper.autoplay.stop();
                }
                else{
                  swiper.autoplay.start();
                }
              }
            });
            */

          });

        }

        if($(".subsidiary-slide").length>0){
          $(".subsidiary-slide").each(function(index, el) {
            var swiper = new Swiper(this, {
              loop:false,
              pagination: {
                el: $(".swiper-pagination",$(this).closest(".section-slide")).get( 0 ),
                clickable: true,
                 dynamicBullets: true,
              },
              navigation: false,
               speed: swiperSpeed,
               slidesPerView: 2,
              spaceBetween: 10,
               breakpoints: {
                  // when window width is >= 1200
                  768: {
                    slidesPerView: 5,
                    slidesPerGroup :1,
                  },
                  // when window width is >= 1200
                  1200: {
                    slidesPerView: 7,
                    spaceBetween: 10
                  },
                }
            });
          });

        }

        if($(".section-slide").length>0){
          $(".section-slide").each(function(index, el) {
            var length = $(".swiper-slide",this).length;
            var swiper = new Swiper(this, {
              loop:false,
              pagination: false,
              navigation: false,
              speed: swiperSpeed,
              slidesPerView: 1,
              //freeMode: true,
              releaseOnEdges: true,
              mousewheel: true,
              on: {
                slideChange: function(){
                  var idx = this.activeIndex;
                  if(this.activeIndex != 0 && idx != length) $.fn.fullpage.setAllowScrolling(false);
                  if(length == 2 && idx == 0) $.fn.fullpage.setAllowScrolling(false)
                },
                slideChangeTransitionEnd: function(){
                  var idx = this.activeIndex;
                  if(idx == 0 || idx >= length-1) $.fn.fullpage.setAllowScrolling(true);
                }
              },
              enabled:false,
              breakpoints: {
                 1200: {
                     enabled: true,
                 }
              }
            });
          });

        }


        if($(".gallery-slide").length>0){
          $(".gallery-slide").each(function(index, el) {
            var swiper = new Swiper(this, {
              loop:true,
               autoplay: {
                 delay: 3000,
               },
              speed: swiperSpeed,
              pagination: false,
              navigation: {
                nextEl: $(".swiper-button-next",$(this).closest(".section-slide")).get( 0 ),
                prevEl: $(".swiper-button-prev",$(this).closest(".section-slide")).get( 0 )
              },
              slidesPerView: 1.2,
                spaceBetween: 10,
                // Responsive breakpoints
                breakpoints: {
                  // when window width is >= 1200
                  768: {
                    slidesPerView: 1.8,
                    slidesPerGroup :1,
                    spaceBetween: 20
                  },
                  // when window width is >= 1200
                  1200: {
                    slidesPerView: 2.6,
                    slidesPerGroup :1,
                    spaceBetween: 30
                  },
                }

            });
          });

        }

        if($(".gallery-slide-2").length>0){
          $(".gallery-slide-2").each(function(index, el) {
            var swiper = new Swiper(this, {
              loop:true,
               autoplay: {
                 delay: 3000,
               },
                speed: swiperSpeed,
              pagination: false,
              navigation: {
                nextEl: $(".swiper-button-next",$(this).closest(".section-slide")).get( 0 ),
                prevEl: $(".swiper-button-prev",$(this).closest(".section-slide")).get( 0 )
              },
              slidesPerView: 1,
                spaceBetween: 10,
                // Responsive breakpoints
                breakpoints: {
                  // when window width is >= 1200
                  768: {
                    slidesPerView: 2,
                    slidesPerGroup :2,
                    spaceBetween: 20
                  },
                  // when window width is >= 1200
                  1200: {
                    slidesPerView: 2,
                    slidesPerGroup :2,
                    spaceBetween: 30
                  },
                }

            });
          });

        }


        if($(".library-slide").length>0){
          $(".library-slide").each(function(index, el) {
            var swiper = new Swiper(this, {
              //loop:true,
              autoplay: {
                 delay: 3000,
               },
               speed:swiperSpeed,
              /*pagination: {
                el: $(".swiper-pagination",$(this)).get( 0 ),
                clickable: true,
                 dynamicBullets: true,
              },*/
              navigation: {
                nextEl: $(".swiper-button-next",$(this).parent()).get( 0 ),
                prevEl: $(".swiper-button-prev",$(this).parent()).get( 0 )
              },

              /*mousewheel: true,*/
              //speed: 2000,
              slidesPerView: 1,
              spaceBetween: 10,
              // Responsive breakpoints
              breakpoints: {
                // when window width is >= 1200
                768: {
                  slidesPerView: 2,
                  slidesPerGroup :2,
                  spaceBetween: 20
                },
                // when window width is >= 1200
                1200: {
                  slidesPerView: 2,
                  slidesPerGroup :2,
                  spaceBetween: 35
                },
              }
            });
          });

        }

        if($(".slide-with-thumb").length>0){
          $(".slide-with-thumb").each(function(index, el) {
            var  mainslide= $(".main-slide",$(this)).get(0);
            var thumbSlide = $(".thumb-slide",$(this)).get(0);
            var swiper2 = new Swiper(thumbSlide, {
              //loop: true,
              /*autoplay: {
                 delay: 3000,
               },*/
              spaceBetween: 10,
              slidesPerView: 3,
              freeMode: true,
              watchSlidesProgress: true,
              breakpoints: {
                // when window width is >= 1200
                768: {
                  slidesPerView: 4,
                  slidesPerGroup :4,
                  spaceBetween: 10
                },
                // when window width is >= 1200
                1200: {
                  slidesPerView: 6,
                  slidesPerGroup :6,
                  spaceBetween: 12
                },
              }
            });

            var swiper = new Swiper(mainslide, {
              //loop:true,
              spaceBetween: 10,
              autoplay: {
                 delay: 3000,
              },
              pagination: false,
              navigation: {
                nextEl: $(".swiper-button-next",$(this)).get( 0 ),
                prevEl: $(".swiper-button-prev",$(this)).get( 0 )
              },
              /*effect: 'slide',
              fadeEffect: {
                crossFade: true
              },*/
              //speed: 2000,
              thumbs: {
                swiper: swiper2,
              },
            });

          });

        }

        if($(".post-slide").length>0){
          $(".post-slide").each(function(index, el) {
            var swiper = new Swiper(this, {
              //loop:true,
              autoplay: false,
              pagination: {
                el: $(".swiper-pagination",$(this)).get( 0 ),
                clickable: true,
              },
              navigation: false,
              /*mousewheel: true,*/
              speed: swiperSpeed,
              slidesPerView: 1.3,
              spaceBetween: 10,
              // Responsive breakpoints
              breakpoints: {
                // when window width is >= 1200
                768: {
                  slidesPerView: 2.5,
                  spaceBetween: 20
                },
                // when window width is >= 1200
                1200: {
                  slidesPerView: 3,
                  spaceBetween: 35
                },
              }
            });
          });

        }


        if($(".progress-slide").length>0){



          $(".progress-slide").each(function(index, el) {
            var $items = $(".item",this);
            var yearList={};

            var swiper = new Swiper(this, {
              //loop:true,
              autoplay: false,
              pagination: false,
              navigation: {
                nextEl: $(".swiper-button-next",$(this).parent()).get( 0 ),
                prevEl: $(".swiper-button-prev",$(this).parent()).get( 0 )
              },
              slidesPerView: 1.2,
              spaceBetween: 10,
              // Responsive breakpoints
              breakpoints: {
                // when window width is >= 1200
                768: {
                  slidesPerView: 1.2,
                  spaceBetween: 30
                },
                // when window width is >= 1200
                1200: {
                  slidesPerView: 1.8,
                  spaceBetween: 40,
                  /*grid: {
                    rows: 1,
                  },*/
                },
              }
            });

            $.each($items, function(index, val) {
               var year = $(this).data("year");
               var month = $(this).data("month");
               if(!yearList.hasOwnProperty(year)){
                yearList[year] =[];
               }
               if( yearList[year].indexOf(month) == -1) {
                yearList[year].push(month);
               }
            });


            var showProgress = function(){
              //return false;
              var y = $(".section-progress .years-list .items .item.active").data("id");
              //var m = $(".section-progress .month-list .items .item.active").data("id");
              $(".section-progress .post-list .progress-slide  .swiper-slide").addClass("d-none");
              //$(".section-progress .post-list .progress-slide  .item[data-year='"+y+"'][data-month='"+m+"']").closest(".swiper-slide").removeClass("d-none");
              $(".section-progress .post-list .progress-slide  .item[data-year='"+y+"']").closest(".swiper-slide").removeClass("d-none");

              //swiper.update();
              swiper.updateSize();
              swiper.updateSlides();
              swiper.updateProgress();
              swiper.updateSlidesClasses();
              //swiper.updateProgress();
              swiper.slideTo(0);
            }


            $.each(yearList, function(index, val) {
              var $yE =$('<a class="item" data-id="'+index+'" data-month="'+val.join()+'">'+index+'</a>');
              $yE.click(function(event) {
                $(".section-progress .years-list .item").removeClass("active");
                $(this).addClass("active");

                //Change Month
                $(".section-progress .month-list .item").addClass("d-none").removeClass("active");
                jQuery.each(val, function(i, o) {
                  $(".section-progress .month-list .item[data-id='"+o+"']").removeClass("d-none");
                });

                //Active Last Month
                $(".section-progress .month-list .item:not(.d-none)").last().addClass("active");
                showProgress();
                return false;
              });
              $(".section-progress .years-list .items").append($yE);
            });

            $(".section-progress .month-list .items .item").click(function(){
              $(".section-progress .month-list .items .item").removeClass("active");
              $(this).addClass("active");
              showProgress();
              return false;
            })

            $(".section-progress .years-list .items .item").last().trigger("click");

          });

        }

        if($(".activity-slide").length>0){
          $(".activity-slide").each(function(index, el) {
            var swiper = new Swiper(this, {
              //loop:true,
              autoplay: false,
              pagination: {
                el: $(".swiper-pagination",$(this)).get( 0 ),
                clickable: true,
              },
              navigation: false,
              /*mousewheel: true,*/
              speed: swiperSpeed,
              slidesPerView: 1,
              spaceBetween: 10,
              // Responsive breakpoints
              breakpoints: {
                // when window width is >= 1200
                768: {
                  slidesPerView: 2,
                  spaceBetween: 20
                },
                // when window width is >= 1200
                1200: {
                  slidesPerView: 2,
                  spaceBetween: 35
                },
              }
            });
          });

        }

        if($(".sustainable-development-slide").length>0){
          $(".sustainable-development-slide").each(function(index, el) {
            var swiper = new Swiper(this, {
              loop:true,
              autoplay: {
               delay: 3000,
              },
              pagination: {
                el: $(".swiper-pagination",$(this)).get( 0 ),
                clickable: true,
              },
              navigation: false,
              /*mousewheel: true,*/
              speed: swiperSpeed,
              slidesPerView: 1.2,
              spaceBetween: 0,
              // Responsive breakpoints
              breakpoints: {
                // when window width is >= 1200
                768: {
                  slidesPerView: 1.6,
                  spaceBetween: 0
                },
                // when window width is >= 1200
                1200: {
                  slidesPerView: 2.2,
                  spaceBetween: 0
                },
              }
            });
          });

        }

        if($(".awards-slide").length>0){
          $(".awards-slide").each(function(index, el) {
            var swiper = new Swiper(this, {
              //loop:true,
              autoplay: false,
              pagination: {
                el: $(".swiper-pagination",$(this).closest(".section-slide")).get( 0 ),
                clickable: true,
              },
              navigation: false,
              /*mousewheel: true,*/
              speed: swiperSpeed,
              slidesPerView: 2,
              grid: {
                rows: 2,
                fill: 'row'
              },
              spaceBetween: 20,
              // Responsive breakpoints
              breakpoints: {
                // when window width is >= 1200
                768: {
                  slidesPerView: 3,
                  grid: {
                    rows: 2,
                    fill: 'row'
                  },
                  spaceBetween: 40
                },
                1200: {
                  slidesPerView: 3,
                  grid: {
                    rows: 2,
                    fill: 'row'
                  },
                  spaceBetween: 60
                },
              }
            });
          });

        }

        if($(".awards-slide-2").length>0){
          $(".awards-slide-2").each(function(index, el) {
            var swiper = new Swiper(this, {
              //loop:true,
              autoplay: false,
              pagination: {
                el: $(".swiper-pagination",$(this).closest(".section-slide")).get( 0 ),
                clickable: true,
              },
              navigation: false,
              /*mousewheel: true,*/
              speed: swiperSpeed,
              slidesPerView: 2,
              spaceBetween: 15,
              // Responsive breakpoints
              breakpoints: {
                // when window width is >= 1200
                768: {
                  slidesPerView: 4,
                  spaceBetween: 25
                },
                1200: {
                  slidesPerView: 6,
                  spaceBetween: 35
                },
              }
            });
          });

        }

        if($(".partner-slide").length>0){
          $(".partner-slide").each(function(index, el) {
            var swiper = new Swiper(this, {
              //loop:true,
              autoplay: false,
              pagination: {
                el: $(".swiper-pagination",$(this).closest(".section-slide")).get( 0 ),
                clickable: true,
              },
              navigation: false,
              /*mousewheel: true,*/
              speed: swiperSpeed,
              slidesPerView: 2,
              grid: {
                rows: 2,
                fill: 'row'
              },
              spaceBetween: 16,
              // Responsive breakpoints
              breakpoints: {
                // when window width is >= 1200
                768: {
                  slidesPerView: 4,
                  grid: {
                    rows: 2,
                    fill: 'row'
                  },
                  spaceBetween: 24
                },
                1200: {
                  slidesPerView: 6,
                  grid: {
                    rows: 2,
                    fill: 'row'
                  },
                  spaceBetween: 36
                },
              }
            });
          });

        }

        if($(".value-slide").length>0){
          $(".value-slide").each(function(index, el) {
            var swiper = new Swiper(this, {
              //loop:true,
              autoplay: false,
              pagination: {
                el: $(".swiper-pagination",$(this).closest(".section-slide")).get( 0 ),
                clickable: true,
              },
              navigation: false,
              /*mousewheel: true,*/
              speed: swiperSpeed,
              slidesPerView: 1,
              spaceBetween: 10,
              // Responsive breakpoints
              breakpoints: {
                // when window width is >= 1200
                768: {
                  slidesPerView: 2,
                  spaceBetween: 40
                },
                1200: {
                  slidesPerView: 3,
                  spaceBetween: 60
                },
              }
            });
          });

        }






    }




    $(".form-popup .close:not(.close-modal)").click(function(event) {
      $(this).parent().removeClass("go");
    });

    var formModal = $("#formModal").get(0);
    formModal.addEventListener('hidden.bs.modal', function (event) {
      $(".animated",formModal).removeClass("go");
    });
    formModal.addEventListener('shown.bs.modal', function (event) {
      $(".animated",formModal).addClass("go");
    });

     $(".section-masterplan .item, .section-masterplan .note-item").hover(function() {
      //$(this).addClass("show");
      var id = $(this).data("id");
      $(".section-masterplan .item[data-id='"+id+"']").addClass('show');
      $(".section-masterplan .svg-map .item-hover[data-id='"+id+"']").addClass('show');
    }, function() {
      //$(this).removeClass("show");
      var id = $(this).data("id");
      $(".section-masterplan .item[data-id='"+id+"']").removeClass('show');
      $(".section-masterplan .svg-map .item-hover[data-id='"+id+"']").removeClass('show');
    });


    $(".section-masterplan .svg-map .item-hover").hover(function() {
      $(this).addClass("show");
      var id = $(this).data("id");
      $(".section-masterplan .item[data-id='"+id+"']").addClass('show');
    }, function() {
      $(this).removeClass("show");
      var id = $(this).data("id");
      $(".section-masterplan .item[data-id='"+id+"']").removeClass('show');
    });



    $(".product-map .svg-map .item-hover").hover(function() {
      $(this).addClass("show");
      var id = $(this).data("id");
      $(".product-map .item[data-id='"+id+"']").addClass('show');
    }, function() {
      $(this).removeClass("show");
      var id = $(this).data("id");
      $(".product-map .item[data-id='"+id+"']").removeClass('show');
    });

    $(".product-nav .item-hover").hover(function() {
      var id = $(this).data("id");
      $(".product-map .svg-map .item-hover[data-id='"+id+"']").addClass("show");
      $(".product-map .item[data-id='"+id+"']").addClass('show');
    }, function() {
      $(this).removeClass("show");
      var id = $(this).data("id");
      $(".product-map .svg-map .item-hover[data-id='"+id+"']").removeClass("show");
      $(".product-map .item[data-id='"+id+"']").removeClass('show');
    });

    $(".svg-item-link").click(function(){
      var url = $(this).attr("href");
      window.location.href = url;
      return false;
    });

    // Map Toltip
    $(".image-map-svg").each(function(index, el) {
        var $ethis = $(this);
        var $tooltip = $(".map-tooltip",$ethis);

        $('.item-maker', $ethis).hover(function() {
            var key = $(this).data("index");
            $('.item-maker[data-index="'+key+'"]', $ethis).addClass("active");
            showMakerTooltip(this,$tooltip,$ethis);
          }, function() {
            $('.item-maker', $ethis).removeClass('active');
            $tooltip.removeClass('active');
        });
    });


    function showMakerTooltip(ethis,$tooltip,$imgMap){
        var px = $(ethis).data("x");
        var py = $(ethis).data("y");
        var placement = $(ethis).data("placement");
        var w = $imgMap.width();
        var imgW = $imgMap.data("w");
        //var r = w / imgW;
        var r=1;

        var x = px*r;
        var y= py*r;

        $tooltip.css({
            left:  x + 15*r,
            top:   y - 15*r
        }).removeClass("bottom");

        if(placement=="bottom"){
            $tooltip.css({
                top:   y + 45*r
            }).addClass("bottom");
        }

        $tooltip.addClass('active');
        $tooltip.html("<span>"+$(ethis).data('title')+"<span>");
    }




    /*inlineSVG.init({
      svgSelector: 'img.svg', // the class attached to all images that should be inlined
      initClass: 'js-inlinesvg', // class added to <html>
    }, function () {

        $(".svg-ani").each(function(index, el) {
            var $ethis = $(this);
            var svgid = $(".inlined-svg",this).get(0);
            var myVivus = new Vivus(svgid,{start:"manual"});
            myVivus.finish();

            $ethis.hover(function() {
               myVivus.reset().play(2);
            }, function() {
               //myVivus.reset().play(2,function () {});
            });
        });
    });  */


    /*
    $(".post-slide-cate").mouseover(function() {
      $.fn.fullpage.setAllowScrolling(false);
    }).mouseout(function() {
      $.fn.fullpage.setAllowScrolling(true);
    });
    */

    //Loading Ovelay OtherSite
    if($("body").hasClass('home-page') || 1==1 ){
        //

        if($(".mask").length>0){
           $("body .mask").addClass("ready");
          setTimeout(function(){
            $("body .mask").addClass("up");
            $(".animated", $("section.fp-completely")).removeClass('go');
            if($("body").hasClass('disable-fullpage')){
              $(".animated", $("#fullpage section")).removeClass('go');
            }
            $("body .mask .animated").addClass('go');
            setTimeout(function(){
              $("body .mask").fadeOut( "fast", function() {
                $("body").addClass("ready");
                $('#header').addClass('show go');
                $('.fixed-btn').addClass('show go');
                $(".b-static").addClass('show go');

                if($("body").hasClass('disable-fullpage')){
                  $(window).trigger("scroll");
                }
                else{
                  $(".animated", $("section.fp-completely")).addClass('go');
                }
              });

              if(!$("body").hasClass('disable-fullpage')){
                $.fn.fullpage.setAllowScrolling(true);
                $.fn.fullpage.setKeyboardScrolling(true);
              }
              page_firsttime_load= false;

            }, 750);
          }, 1500);
        }
        else{
          $("body").addClass("ready");
          $('#header').addClass('show go');
          $('.fixed-btn').addClass('show go');
          $(".b-static").addClass('show go');

          if($("body").hasClass('disable-fullpage')){
            $(window).trigger("scroll");
          }
          else{
            $(".animated", $("section.fp-completely")).addClass('go');
          }
          if(!$("body").hasClass('disable-fullpage')){
            $.fn.fullpage.setAllowScrolling(true);
            $.fn.fullpage.setKeyboardScrolling(true);
          }
        }
    }

    //Trigger Fancybox
    $(".fancy-album").fancybox({
        margin : [72, 0]
    });
    $('body').on('click','.trigger-fancybox',function(event){
      var target = $(this).data("target");
      if($('.item-album a[data-fancybox="'+target+'"]').length>0){
        $('.item-album a[data-fancybox="'+target+'"]').first().trigger("click");
      }
      else{
        bootbox.alert("Album Đang cập nhật");
      }
      return false;

    })

    $(".trigger-link").click(function(){
      var url = $(this).attr("href");
      if(url && url!="" && url!="#"){
        if($(this).attr("target") && $(this).attr("target")=="_blank"){
          window.open(url);
        }
        else{
          window.location.href = url;
        }
      }

      return false;
    })

    //Tooltip
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    });


    jQuery(window).scroll(function() {
      if(jQuery(window).scrollTop() + $(window).height() > $("#footer").position().top){
        if($("#footer video").length >0 && $("#footer video").get(0).paused==true ){
          $("#footer video").get(0).play();
        }
      }
    });

    var niceScrollOpt={
      cursorcolor: "#112f60", // change cursor color in hex
      cursoropacitymin: 0, // change opacity when cursor is inactive (scrollabar "hidden" state), range from 1 to 0
      cursoropacitymax: 1, // change opacity when cursor is active (scrollabar "visible" state), range from 1 to 0
      cursorwidth: "8px", // cursor width in pixel (you can also write "5px")
      cursorborder: "0px solid transparent", // css definition for cursor border
      cursorborderradius: "4px",
      autohidemode: false,
      railalign: "left",
      railpadding: { top: 2, right: 0, left: 2, bottom: 2 },
      emulatetouch: false,
      sensitiverail: true,
      background: "#061f37",
      zindex:99999,
      hidecursordelay: 4000,
      boxzoom: false,
      grabcursorenabled:false,
      horizrailenabled:false

    };

    $(".do-nicescrol").each(function(index, el) {
      var wWidth = responsiveWidth;
      if($(this).attr("data-responsive")){
        wWidth = $(this).attr("data-responsive");
      }
      if($(window).width() > wWidth){
        $(this).niceScroll(niceScrollOpt);
      }
    });

    $(".dropdown-trigger-change .dropdown-menu a").click(function(event) {
      $(".dropdown-toggle",$(this).closest(".dropdown-trigger-change")).html($(this).html());
    });

    //$(".headerCarousel").wrap("<div class='headerCarousel-wrapper'></div>");

    //Video State

    var video_list = document.querySelectorAll('.custom-video');
    [...video_list].forEach(media => {

        media.addEventListener("playing", function() {
            media.classList.add("playing");
        });
        // Pause event
        media.addEventListener("pause", function() {
            media.classList.remove("playing");
        });

    });


    $(".custom-video").each(function(){
        var media = $(this).get(0);
        // Playing event

    });


    $(".js-split-text").each(function(){
      var ethis = $(this);
      var split = new SplitType(ethis, {
        split: 'words, lines'
      });

      if(split.lines && split.lines.length>0){
        var delay=250;
        $.each(split.lines, function(){
          $(".word ",this).addClass("delay-"+delay);
          delay+=250;
        });
      }
    });
    //console(split.lines)

    /*const resizeObserver = new ResizeObserver(
      debounce(([entry]) => {
        text.split()
      }, 500)
    )
    resizeObserver.observe(containerElement)*/

    $(".fixed-scroll-downs").click(function(){
      if(!$("body").hasClass('disable-fullpage')){
        if($(this).hasClass("up")){
          $.fn.fullpage.moveTo(1);

        }
        else{
          $.fn.fullpage.moveSectionDown();
        }
      }
      else{
        if($(this).hasClass("up")){
          $([document.documentElement, document.body]).animate({
            scrollTop: 0
          }, 800);
        }

      }

      return false
    });

    $(".overlay-menu .menu > li > a").click(function () {
          if ($(window).width() <= 1199) {
              if ($(this).next().is("ul")) {
                  if($(this).parent().hasClass("showsub")){
                    $(this).parent().removeClass("showsub");
                  }
                  else{
                    $(".overlay-menu .menu > li.showsub").removeClass("showsub");
                    $(this).parent().addClass("showsub");
                  }
                  return false;
              }
          }
      });


    /**/


    $(".do-nicescrol .accordion-collapse").each(function(){
      const $scroll = $(this).closest(".do-nicescrol");
      const myCollapsible = $(this).get(0);

      myCollapsible.addEventListener('hidden.bs.collapse', function () {
        $scroll.getNiceScroll().resize();
      });
      myCollapsible.addEventListener('shown.bs.collapse', function () {
        $scroll.getNiceScroll().resize();
      });
    });

    $(".overlay-menu .menu").addClass("menu-item-"+$(".overlay-menu .menu > li").length);



  });
})(jQuery);