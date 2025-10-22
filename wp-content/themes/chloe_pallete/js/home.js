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
var swiper2 = new Swiper(".home_cookie_slide_list", {
  slidesPerView: 1,
  initialSlide: 1,
  spaceBetween: parseRem(0),
  
});
var swiper3 = new Swiper(".home_about_slide", {
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
var swiper4 = new Swiper(".home_review_right_slide", {
  slidesPerView: 2,
  spaceBetween: parseRem(20),
  // loop: true,
  breakpoints: {
    768: {
      slidesPerView: 2.7,
      spaceBetween: parseRem(40),
    },
  },
});
var swiper5 = new Swiper(".home_workshop_slide", {
  slidesPerView: 1.5,
  spaceBetween: parseRem(10),
  // loop: true,
  pagination: {
    el: ".home_workshop_pagination",
    type: "progressbar",
  },
  speed: 400,
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

if (viewport.w < 767) {
  console.log('✓ Mobile swiper initializing...');
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
  

  class HomeHero extends TriggerSetupHero {
    constructor() {
      super();
    }
    trigger() {
      this.setup();
      super.init(this.play.bind(this));
    }
    setup() {
      
    }
    play() {
      this.tl.play();
    }
  }
  const homeHero = new HomeHero();
  class HomeInspiration extends TriggerSetup {
    constructor(triggerEl) {
      super(triggerEl);
    }
    trigger() {
      super.setTrigger(this.setup.bind(this));
    }
    setup() {
      let tl = gsap.timeline({
        scrollTrigger: {
          trigger: this.triggerEl,
          start: 'top 20%',
          once: true,
        },
        onComplete: () => {
          $('.cove_inspiration_list_img').addClass('on_hover')
        }
      });
      new MasterTimeline({
        timeline: tl,
        triggerInit: this.triggerEl,
        tweenArr: [
          new FadeSplitText({ el: $('.cove_inspiration_info_title').get(0), onMask: true }),
          ...$('.cove_inspiration_info_des ').map((idx, el) => new FadeIn({ el: el })),
          ...$('.cove_inspiration_list_img  ').map((idx, el) => new ScaleInset({ el: el })),
        ]
      });
    }
  }
  let homeInspiration = new HomeInspiration('.cove_inspiration');
  
  function animationGlobal() {
    globalJS();
    homeHero.trigger()
    ScrollTrigger.refresh();
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