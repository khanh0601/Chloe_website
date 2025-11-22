







const mainScript = () => {
  gsap.registerPlugin(ScrollTrigger);
  $("html").css("scroll-behavior", "auto");
  $("html").css("height", "auto");
  const lenis = new Lenis({
    lerp: 0.15,
    smootth: false
  });
  function raf(time) {
    lenis.raf(time);
    requestAnimationFrame(raf);
  }
  requestAnimationFrame(raf);
  const viewport = {
    w: window.innerWidth,
    h: window.innerHeight,
  };
  class TriggerSetupHero {
    constructor() { }
    init(play) {
      play();
    }
  }
  class TriggerSetup {
    constructor(triggerEl) {
      this.tlTrigger;
      this.triggerEl = triggerEl;
    }
    setTrigger(setup) {
      if (viewport.w > 767) {
        this.tlTrigger = gsap.timeline({
          scrollTrigger: {
            trigger: this.triggerEl,
            start: "top bottom+=50%",
            end: "bottom top",
            once: true,
            onEnter: () => setup(),
          },
        });
      }
      else {
        setup();
      }
    }
  }
  function isInHeaderCheck(el) {
    const rect = $(el).get(0).getBoundingClientRect();
    const headerRect = $('.header').get(0).getBoundingClientRect();
    if (viewport.w < 768) {
      return (
        rect.bottom >= 0 &&
        rect.top - headerRect.height / 3 <= 0
      );
    }
    else {
      return Math.abs(rect.top - headerRect.top) <= 2;
    }
  }
  class Header extends TriggerSetupHero {
    constructor() {
      super();
      this.tl = null;
      this.init = false;
      this.debounceTimer = null;
      this.timeDebouce = viewport.w > 991 ? 10 : 20;
    }
    trigger() {
      this.setup();
      super.init(this.play.bind(this));
      this.interact();
    }
    setup() {
      this.tl = gsap.timeline();
    }
    play() {
      this.tl.play();
    }
    interact() {

    }
    toggleColorMode = (color) => {
      let elArr = Array.from($(`[data-section="${color}"]`));
      if (
        elArr.some(function (el) {
          return isInHeaderCheck(el);
        })
      ) {
        $(".header").addClass(`on-${color}`);
      } else if (!$(".header").hasClass("on-show-menu")) {
        $(".header").removeClass(`on-${color}`);

      }
    }
    toggleOnScroll = (inst) => {
      if (inst.scroll > $(".header").height() * (viewport.w > 767 ? 1 : 0.5)) {
        $(".header").addClass("on_scroll");
      } else {
        $(".header").removeClass("on_scroll");
      }
    }
    toggleHide = (inst) => {
      const scrollTop = document.documentElement.scrollTop || window.scrollY
      if ($('.header').hasClass('active')) return;
      const isScrollHeader = scrollTop > $('.header').height() * (viewport.w > 767 ? 5 : 1.5)
      let debounceTimer;

      debounceTimer && clearTimeout(debounceTimer);

      debounceTimer = setTimeout(() => {
        if (isScrollHeader) {
          if (inst.direction >= 1) {
            $('.header').addClass('on_hide');
          } else {
            $('.header').removeClass('on_hide');
          }
        } else {
          $('.header').removeClass('on_hide');
        }
      }, 100);
    }
  }
  const header = new Header();

  class HomeHero extends TriggerSetupHero {
    constructor() {
      super();
      this.tl = null;
    }
    trigger() {
      this.setup();
      super.init(this.play.bind(this));
    }
    setup() {
      this.tl = gsap.timeline({
        scrollTrigger: {
          trigger: this.triggerEl,
          start: 'top 20%',
          once: true,
        },
      });
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        pagination: {
          el: ".home_hero_pagination",
          clickable: true,
        },
        // autoplay: {
        //   delay: 2500,
        //   disableOnInteraction: false,
        // },
      });
    }
    play() {
      this.tl.play();
    }
  }
  const homeHero = new HomeHero();
  class HomeSeller extends TriggerSetup {
    constructor(triggerEl) {
      super(triggerEl);
    }
    trigger() {
      super.setTrigger(this.setup.bind(this));
    }
    setup() {
      var swiper1 = new Swiper(".home_seller_silder", {
        slidesPerView: 1.5,
        spaceBetween: parseRem(10),
        // loop: true,
        pagination: {
          el: ".home_seller_pagination",
          type: "progressbar",
        },
        speed: 400,
        // autoplay: {
        //   delay: 0,
        //   disableOnInteraction: false,
        //   // pauseOnMouseEnter: true
        // },
        breakpoints: {
          768: {
            slidesPerView: 2.7,
            spaceBetween: parseRem(15),
          },
          991: {
            slidesPerView: 4.3,
            spaceBetween: parseRem(20),
          },
        },
      });
    }
  }
  let homeSeller = new HomeSeller('.home_seller ');
  class HomeCookie extends TriggerSetup {
    constructor(triggerEl) {
      super(triggerEl);
    }
    trigger() {
      super.setTrigger(this.setup.bind(this));
    }
    setup() {
      var swiper2 = new Swiper(".home_cookie_slide_list", {
        slidesPerView: 1,
        initialSlide: 1,
        spaceBetween: parseRem(0),

      });
    }
  }
  let homeCookie = new HomeCookie('.home_cookie ');
  class HomeAbout extends TriggerSetup {
    constructor(triggerEl) {
      super(triggerEl);
    }
    trigger() {
      super.setTrigger(this.setup.bind(this));
    }
    setup() {
      var swiper3 = new Swiper(".home_about_slide", {
        slidesPerView: 1,
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
    }
  }
  let homeAbout = new HomeAbout('.home_about ');
  class HomeDiscover extends TriggerSetup {
    constructor(triggerEl) {
      super(triggerEl);
    }
    trigger() {
      super.setTrigger(this.setup.bind(this));
    }
    setup() {
      if (viewport.w < 767) {
        $('.home_discover_card_wrap').addClass('swiper');
        $('.home_discover_card').addClass('swiper-wrapper');
        $('.home_discover_card .home_seller_silder_item').addClass('swiper-slide');
        var swiper7 = new Swiper(".home_discover_card_wrap", {
          slidesPerView: '1.5',        // Hiển thị 6 slide cùng lúc
          spaceBetween: parseRem(10),        // Khoảng cách giữa các slide
          loop: true,
          speed: 5000,                 // Cần bật loop để autoplay mượt
          autoplay: {
            delay: 0,                // Thời gian giữa các slide (ms)
            disableOnInteraction: false // Vẫn tiếp tục chạy sau khi user tương tác
          },
        });
      } else {
        console.log(viewport.w)
      }
    }
  }
  let homeDiscover = new HomeDiscover('.home_discover ');
  class HomeCourse extends TriggerSetup {
    constructor(triggerEl) {
      super(triggerEl);
    }
    trigger() {
      super.setTrigger(this.setup.bind(this));
    }
    setup() {

    }
  }
  let homeCourse = new HomeCourse('.home_course ');
  class HomeReview extends TriggerSetup {
    constructor(triggerEl) {
      super(triggerEl);
    }
    trigger() {
      super.setTrigger(this.setup.bind(this));
    }
    setup() {
      var swiper4 = new Swiper(".home_review_right_slide", {
        slidesPerView: 1.2,
        spaceBetween: parseRem(20),
        // loop: true,
        breakpoints: {
          768: {
            slidesPerView: 2.2,
            spaceBetween: parseRem(24),
          },
          991: {
            slidesPerView: 2.7,
            spaceBetween: parseRem(40),
          },
        },
      });
    }
  }
  let homeReview = new HomeReview('.home_review ');
  class HomeContact extends TriggerSetup {
    constructor(triggerEl) {
      super(triggerEl);
    }
    trigger() {
      super.setTrigger(this.setup.bind(this));
      this.interact();
    }
    setup() {

    }
    interact() {
      $('#file-upload').on('change', function (e) {
        var fileName = e.target.files[0]?.name;

        if (fileName) {
          // Ẩn nội dung ban đầu
          $('.home_contact_form_upload_img').hide();
          $('.home_contact_form_upload_icon').hide();
          $('.upload-label span').hide();
          $('.upload-info').hide();

          // Hiện tên file
          if ($('.file-name-display').length === 0) {
            $('.upload-label').append('<div class="file-name-display txt_14">' + fileName + '</div>');
          } else {
            $('.file-name-display').text(fileName);
          }

          // Thêm nút xóa (optional)
          if ($('.remove-file').length === 0) {
            $('.upload-label').append('<button type="button" class="remove-file">×</button>');
          }
        }
      })
      $(document).on('click', '.remove-file', function (e) {
        e.preventDefault();
        e.stopPropagation();

        // Reset input file
        $('#file-upload').val('');

        // Hiện lại nội dung ban đầu
        $('.home_contact_form_upload_img').show();
        $('.home_contact_form_upload_icon').show();
        $('.upload-label span').show();
        $('.upload-info').show();

        // Xóa tên file và nút xóa
        $('.file-name-display').remove();
        $('.remove-file').remove();
      });
    }
  }
  let homeContact = new HomeContact('.home_contact ');
  class HomeWorkshop extends TriggerSetup {
    constructor(triggerEl) {
      super(triggerEl);
    }
    trigger() {
      super.setTrigger(this.setup.bind(this));
    }
    setup() {
      var swiper5 = new Swiper(".home_workshop_slide", {
        slidesPerView: 1.2,
        spaceBetween: parseRem(20),
        // loop: true,
        pagination: {
          el: ".home_workshop_pagination",
          type: "progressbar",
        },
        speed: 400,
        breakpoints: {
          768: {
            slidesPerView: 2.2,
            spaceBetween: parseRem(20),
          },
          991: {
            slidesPerView: 4.32,
            spaceBetween: parseRem(20),
          },
        },
      });
    }
  }
  let homeWorkshop = new HomeWorkshop('.home_workshop  ');
  class HomeCake extends TriggerSetup {
    constructor(triggerEl) {
      super(triggerEl);
    }
    trigger() {
      super.setTrigger(this.setup.bind(this));
    }
    setup() {
      var swiper6 = new Swiper(".home_cake_slide", {
        slidesPerView: 1.5,
        spaceBetween: parseRem(10),
        loop: true,
        speed: 5000,
        autoplay: {
          delay: 0,
          disableOnInteraction: false,
          // pauseOnMouseEnter: true
        },
        breakpoints: {
          768: {
            slidesPerView: 2.7,
            spaceBetween: parseRem(15),
          },
          991: {
            slidesPerView: 4.32,
            spaceBetween: parseRem(20),
          },
        },
      });
    }
  }
  let homeCake = new HomeCake('.home_cake  ');
  const SCRIPT = {
    homeScript: () => {
      console.log('homeScript');
      homeHero.trigger();
      homeSeller.trigger();
      homeCookie.trigger();
      homeAbout.trigger();
      homeDiscover.trigger();
      homeCourse.trigger();
      homeReview.trigger();
      homeContact.trigger();
      homeWorkshop.trigger();
      homeCake.trigger();
      return;
    },
  };
  function animationGlobal() {
    header.trigger();
    const pageName = $(".main").attr("data-barba-namespace");
    if (pageName) {
      SCRIPT[`${pageName}Script`]();
    }
    lenis.on("scroll", function (inst) {
      header.toggleOnScroll(lenis);
      header.toggleHide(inst);
      ScrollTrigger.refresh();

    });
  }
  if (window.scrollY > 0) {
    lenis.scrollTo("top", {
      duration: .001,
      onComplete: () => animationGlobal()
    });
  }
  else {
    animationGlobal();
  }
};
window.onload = mainScript;

