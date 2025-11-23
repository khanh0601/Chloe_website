
const mainScript = () => {
  gsap.registerPlugin(ScrollTrigger);
  $("html").css("scroll-behavior", "auto");
  $("html").css("height", "auto");
  function activeItem(elArr, index) {
      elArr.forEach((el, idx) => {
          $(el).removeClass('active').eq(index).addClass('active')
      })
  }
  let lenis = new Lenis({});
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
  const isTouchDevice = () => {
    return (
    "ontouchstart" in window ||
    navigator.maxTouchPoints > 0 ||
    navigator.msMaxTouchPoints > 0
    );
};
  if (!isTouchDevice()) {
    $("html").attr("data-has-cursor", "true");
    window.addEventListener("pointermove", function (e) {
    updatePointer(e);
    });
} else {
    $("html").attr("data-has-cursor", "false");
    window.addEventListener("pointerdown", function (e) {
    updatePointer(e);
    });
}
  function updatePointer(e) {
    pointer.x = e.clientX;
    pointer.y = e.clientY;
    pointer.xNor = (e.clientX / $(window).width() - 0.5) * 2;
    pointer.yNor = (e.clientY / $(window).height() - 0.5) * 2;
    if (cursor.userMoved != true) {
    cursor.userMoved = true;
    cursor.init();
    }
}
class Loading {
  constructor() {}
  isDoneLoading() {
  return true;
  }
}
let load = new Loading();
const pointer = {
  x: $(window).width() / 2,
  y: $(window).height() / 2,
  xNor: $(window).width() / 2 / $(window).width(),
  yNor: $(window).height() / 2 / $(window).height(),
};
const xSetter = (el) => gsap.quickSetter(el, "x", `px`);
    const ySetter = (el) => gsap.quickSetter(el, "y", `px`);
    const xGetter = (el) => gsap.getProperty(el, "x");
    const yGetter = (el) => gsap.getProperty(el, "y");
    const lerp = (a, b, t = 0.08) => {
        return a + (b - a) * t;
    };
class Cursor {
  constructor() {
  this.targetX = pointer.x;
  this.targetY = pointer.y;
  this.userMoved = false;
  xSetter(".cursor-main")(this.targetX);
  ySetter(".cursor-main")(this.targetY);
  }
  init() {
  requestAnimationFrame(this.update.bind(this));
  $(".cursor-main .cursor-inner").addClass("active");
  }
  isUserMoved() {
  return this.userMoved;
  }
  update() {
  if (this.userMoved || load.isDoneLoading()) {
      this.updatePosition();
  }
  requestAnimationFrame(this.update.bind(this));
  }
  updatePosition() {
  this.targetX = pointer.x;
  this.targetY = pointer.y;
  let targetInnerX = xGetter(".cursor-main");
  let targetInnerY = yGetter(".cursor-main");

  if ($("[data-cursor]:hover").length) {
      this.onHover();
  } else {
      this.reset();
  }

  if (
      Math.hypot(this.targetX - targetInnerX, this.targetY - targetInnerY) >
      1 ||
      Math.abs(lenis.velocity) > 0.1
  ) {
      xSetter(".cursor-main")(lerp(targetInnerX, this.targetX, 0.1));
      ySetter(".cursor-main")(
      lerp(targetInnerY, this.targetY - lenis.velocity / 16, 0.1)
      );
  }
  }
  onHover() {
  let type = $("[data-cursor]:hover").attr("data-cursor");
  let gotBtnSize = false;
  if ($("[data-cursor]:hover").length) {
      switch (type) {
      case "explore": 
          $(".cursor").addClass("on-hover-explore");
          break;
      case "drag": 
          $(".cursor").addClass("on-hover-drag");
      break;
      case "detail": 
          $(".cursor").addClass("on-hover-detail");
      break;
      case "hidden": 
          $(".cursor").addClass("on-hover-hidden");
          break;
      default:
          break;
      }
  } else {
      gotBtnSize = false;
  }
  }
  reset() {
  $(".cursor").removeClass("on-hover-explore");
  $(".cursor").removeClass("on-hover-hidden");
  $(".cursor").removeClass("on-hover-drag");
  $(".cursor").removeClass("on-hover-detail");
  }
}
let cursor = new Cursor();
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
      let menu_item = new SplitType('.header_menu_item ', { types: 'lines, words', lineClass: 'kv_line' });
    }
    play() {
      this.tl.play();
    }
    interact() {
      $(".navbar-toggler-icon-wrap").on("click", (e) => {
        e.preventDefault();
        if ($('body').hasClass('menu-open')) {
          $('body').removeClass('menu-open');
          this.deactiveMenuTablet();
        }
        else {
          $('body').addClass('menu-open');
          this.activeMenuTablet();
        }
      })
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
    activeMenuTablet = () => {
      // lenis.stop();
      gsap.fromTo('.header_menu', { clipPath: 'polygon(100% 0%, 100% 0%, 100% 100%, 100% 100%)' }, {
        duration: 1, clipPath: 'polygon(0% 0%, 100% 0, 100% 100%, 0% 100%)', ease: "circ.inOut"
      });
      gsap.fromTo('.header_menu_item .word', { autoAlpha: 0, yPercent: 100 }, { duration: .8, autoAlpha: 1, yPercent: 0, stagger: .025 });
    }
    deactiveMenuTablet = () => {
      // lenis.start();
      $('body').removeClass('menu-open')
      gsap.fromTo('.header_menu', { clipPath: 'polygon(0% 0%, 100% 0, 100% 100%, 0% 100%)' }, {
        duration: 1, clipPath: 'polygon(0% 0%, 0% 0%, 0% 100%, 0% 100%)', ease: "circ.inOut"
      });
      gsap.fromTo('.header_menu_item .word', { autoAlpha: 1, yPercent: 0 }, { duration: .6, autoAlpha: 0, yPercent: 100, stagger: .025 });
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
          start: 'top-=1px bottom',
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
      // new MasterTimeline({
      //   triggerInit: this.triggerEl,
      //   timeline: this.tl,
      //   tweenArr: [
      //     new FadeSplitText({ el: $('.swiper-slide:first-child .home_hero_des_subtitle'), onMask: true }),
      //     new FadeSplitText({ el: $('.swiper-slide:first-child .home_hero_des_title'), onMask: true }),
      //     new FadeSplitText({ el: $('.swiper-slide:first-child .home_hero_des_link'), onMask: true }),
      //     new FadeIn({ el: $('.swiper-slide:first-child .home_hero_des_link') }),
      //   ]
      // })
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
      let tl = gsap.timeline({
          scrollTrigger: {
              trigger: this.triggerEl,
              start: "top top+=45%",
              once: true,
          },
      })
      new MasterTimeline({
          timeline: tl,
          tweenArr: [
              ...Array.from($('.home-senses-menu-item-txt')).flatMap((el, idx) => new FadeSplitText({ el: el, onMask: true, delay: idx == 0? '<=0' : '<=.1' })),
          ]
      })
      if(viewport.w > 991) {
          activeItem(['.home_cookies_content_item'], 0);
          let listBg = $(".home_cookies_bg_item");
          let listItemMenu = ['.home_cookies_content_item'];
          let triggered = new Array(listBg.length).fill(false);
          let wasFullyScaled = new Array(listBg.length).fill(false);
          gsap.set(listBg, {scale: 0});
          gsap.set(listBg[0], {scale: 1});
          let tl = gsap.timeline({
              scrollTrigger: {
                  trigger: $(".home_cookies"),
                  start: "top top",
                  end: "bottom bottom",
                  scrub: 1,
                  onUpdate: (self) => {
                      if(self.progress == 1 ){
                          activeItem(listItemMenu, listBg.length -1);
                      }
                      listBg.each((i, el) => {
                          const currentScale = gsap.getProperty(el, "scale");
                          if (!triggered[i] && currentScale >= .3) {
                              triggered[i] = true;
                              wasFullyScaled[i] = true;
                              console.log(`➡ Element ${i} scaled to 1`);
                              activeItem(listItemMenu, i);
                          }
                          if (wasFullyScaled[i] && currentScale < .3) {
                              wasFullyScaled[i] = false;
                      
                              const prevIndex = i - 1;
                              if (prevIndex >= 0 && triggered[prevIndex]) {
                                  console.log(`⬅ Scroll up: Element ${i} scaling down — trigger previous index ${prevIndex}`);
                                  activeItem(listItemMenu, prevIndex);
                              }
                              triggered[i] = false;
                          }
                      });
                      
                  }
              },
          })
          listBg.each((i, el) => {
              switch (i) {
                  case 0:
                      tl.to(el, {
                          scale: 2,
                          ease: "none",
                          duration: 0.5,
                      });
                      break;
                  case listBg.length - 1:
                      tl.to(el, {
                          scale: 1,
                          ease: "none",
                          duration: 0.5,
                      }, '-=0.5');
                      break;
                  default:
                      tl.to(el, {
                          scale: 2,
                          ease: "none",
                          duration: 1,
                      }, '-=0.5');
                      break;
                  }
          })
      }
      else {
          let listBg = $(".home_cookies_bg_item");
          listBg.each((i, el) => {
              let tl = new gsap.timeline({
                  scrollTrigger: {
                      trigger: el,
                      start: "top bottom",
                      end: "bottom top",
                      scrub: 1,
                  },
              });
              tl.to($(el).find('.home_cookies_bg_item_inner'), { yPercent: -20, duration: 1, ease: "none"})

          })
      }
      
  }
  }
  let homeCookie = new HomeCookie('.home_cookies ');
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
          slidesPerView: '1.5',        
          spaceBetween: parseRem(10),        
          loop: true,
          speed: 7000,
          autoplay: {
            reverseDirection: true,
            delay: 0,                
            disableOnInteraction: false 
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
    cursor.init();
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

