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

  var swiper1 = new Swiper(".home_seller_silder", {
  slidesPerView: 4.32,
    spaceBetween: parseRem(20),
    // loop: true,
    pagination: {
      el: ".home_seller_pagination",
      type: "progressbar",
    },
    speed: 5000,
    autoplay: {
          delay: 0,
          disableOnInteraction: false,
          // pauseOnMouseEnter: true
      },
  });
  var swiper2 = new Swiper(".home_cookie_slide_list", {
    slidesPerView: 'auto' ,
    initialSlide: 1,
    spaceBetween: parseRem(0),
    // loop: true,
    // pagination: {
    //   el: ".home_seller_pagination",
    //   type: "progressbar",
    // },
    // speed: 5000,
    // autoplay: {
    //       delay: 0,
    //       disableOnInteraction: false,
    //   },
  });
      var swiper3 = new Swiper(".home_about_slide", {
    slidesPerView: 3.8,
    spaceBetween: parseRem(20),
    loop: true,
    // pagination: {
    //   el: ".swiper-pagination",
    //   clickable: true,
    // },
    speed: 5000,
    autoplay: {
          delay: 0,
          disableOnInteraction: false,
          // pauseOnMouseEnter: true
      },
  });