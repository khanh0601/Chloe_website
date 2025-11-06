var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        pagination: {
          el: ".home_hero_pagination",
          clickable: true,
        },
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
      });

      var swiper1 = new Swiper(".home_about_slide", {
        slidesPerView: 1.5,
        spaceBetween: parseRem(20),
        loop: true,
        speed: 7000,
        autoplay: {
          delay: 0,
          disableOnInteraction: false,
        },
        breakpoints: {
          768: {
            slidesPerView: 2.8,
            spaceBetween: parseRem(15),
          },
          991: {
            slidesPerView: 3.8,
            spaceBetween: parseRem(20),
          },
        },
      });
      if (viewport.w < 992) {
        $('.story_choose_right_wrap').addClass('swiper');
        $('.story_choose_right').addClass('swiper-wrapper');
        $('.story_choose_right_item').addClass('swiper-slide');
        var swiper2 = new Swiper(".story_choose_right_wrap", {
          slidesPerView: 1,        // Hiển thị 6 slide cùng lúc
          spaceBetween: parseRem(10),        // Khoảng cách giữa các slide
          loop: false,
          autoplay: {
            delay: 3000,                // Thời gian giữa các slide (ms)
            disableOnInteraction: false // Vẫn tiếp tục chạy sau khi user tương tác
          },
          pagination: {
          el: ".story_choose_right_panigation",
          clickable: true,
        },
        breakpoints: {
          768: {
            slidesPerView: 2,
            spaceBetween: parseRem(25),
          },
        },
        });
      }