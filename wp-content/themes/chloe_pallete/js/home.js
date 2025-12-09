
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
    constructor() { }
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
          case "txtLink":
            $(".cursor-inner").addClass("on-hover-sm");
            let targetEl;
            if (
              $("[data-cursor]:hover").attr("data-cursor-txtLink") == "parent"
            ) {
              targetEl = $("[data-cursor]:hover").parent();
            } else if (
              $("[data-cursor]:hover").attr("data-cursor-txtLink") == "child"
            ) {
              targetEl = $("[data-cursor]:hover").find(
                "[data-cursor-txtLink-child]"
              );
            } else {
              targetEl = $("[data-cursor]:hover");
            }

            let targetGap = parseRem(8);
            if ($("[data-cursor]:hover").attr("data-cursor-txtLink-gap")) {
              targetGap = $("[data-cursor]:hover").attr("data-cursor-txtLink-gap");
            }
            if ($("[data-cursor]:hover").attr("data-cursor-txtLink-trans")) {
              $('[data-cursor]:hover[data-cursor-txtLink-trans] .txt').css('transform', `translateX(8px)`)
            }
            this.targetX =
              targetEl.get(0).getBoundingClientRect().left -
              parseRem(targetGap) -
              $(".cursor-inner.on-hover-sm").width() / 2;
            this.targetY =
              targetEl.get(0).getBoundingClientRect().top +
              targetEl.get(0).getBoundingClientRect().height / 2;
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
      $(".cursor-inner").removeClass("on-hover-sm");
    }
  }
  let cursor = new Cursor();
  const isInViewport = (el, orientation = 'vertical') => {
    if (!el) return;
    const rect = el.getBoundingClientRect();
    if (orientation == 'horizontal') {
          return (
             rect.left <= (window.innerWidth) &&
             rect.right >= 0
          );
    } else {
          return (
             rect.top <= (window.innerHeight) &&
             rect.bottom >= 0
          );
    }
 }
  class ParallaxImage {
    constructor({ el, scaleOffset = 0.1 }) {
       this.el = el;
       this.elWrap = null;
       this.scaleOffset = scaleOffset;
       viewport.w > 991 ? this.init() : null;
    }
    init() {
       this.elWrap = this.el.parentElement;
       this.elWrapHeight = this.elWrap.offsetHeight;
       this.setup();
    }
    setup() {
       const scalePercent = 100 + 5 + ((this.scaleOffset - 0.1) * 100);
       gsap.set(this.el, {
          width: scalePercent + '%',
          xPercent: (scalePercent - 100) / 2 * -1,
          height: $(this.el).hasClass('img-abs') || $(this.el).hasClass('img-fill') ? scalePercent + '%' : 'auto'
       });
       this.scrub();
    }
    scrub() {
       let dist = this.el.offsetHeight - this.elWrapHeight;
       let total = this.elWrapHeight + window.innerHeight;
       this.updateOnScroll(dist, total);
       lenis.on('scroll', () => {
          this.updateOnScroll(dist, total);
       });
    }
    updateOnScroll(dist, total) {
       if (this.el) {
          if (isInViewport(this.elWrap) ) {
             let percent = (this.elWrap.getBoundingClientRect().top + window.innerHeight) / total;
             gsap.quickSetter(this.el, 'y', 'px')(-dist * (1 - percent) * 1.2);
             gsap.set(this.el, { scale: 1 + this.scaleOffset - (percent * this.scaleOffset) });
             }
          }
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
  class Footer extends TriggerSetup {
    constructor(triggerEl) {
      super(triggerEl);
    }
    trigger() {
      super.setTrigger(this.setup.bind(this));
    }
    setup() {
      let tl = gsap.timeline({
        scrollTrigger: {
          trigger: '.footer_top',
          start: "top+=65% bottom",
          once: true,
        },
      });
      $('.footer_top_item').each((i, el) => {
        new MasterTimeline({
          timeline: tl,
          tweenArr: [
            new FadeIn({ el: $(el).find('.footer_top_item_icon '), delay: '<=.1', type: 'bottom' }),
            new FadeSplitText({ el: $(el).find('.footer_top_item_title').get(0), onMask: true, delay: .1 }),
            new FadeSplitText({ el: $(el).find('.footer_top_item_des').get(0), delay: .1 }),
          ]
        })
      })
      let tlSite = gsap.timeline({
        scrollTrigger: {
          trigger: '.footer_site',
          start: "top+=55% bottom",
          once: true,
        },
      });
      new MasterTimeline({
        timeline: tlSite,
        tweenArr: [
          new FadeSplitText({ el: $('.footer_site_left_title').get(0), onMask: true, delay: .1 }),
          new FadeSplitText({ el: $('.footer_site_left_des').get(0), onMask: true, delay: .1 }),
          new FadeIn({ el: $('.footer_site_left_form'), delay: .1 }),
        ]
      })
      $('.footer_site_right_col').each((i, el) => {
        new MasterTimeline({
          timeline: tlSite,
          tweenArr: [
            new FadeIn({ el: $(el).find('.footer_site_right_col_title') }),
            ...Array.from($(el).find('.footer_site_right_col_item')).flatMap((el, idx) => new FadeIn({ el: $(el).get(0), delay: '<=.1', type: 'bottom' })),
          ]
        })
      })
      let tlSlogan = gsap.timeline({
        scrollTrigger: {
          trigger: '.footer_slogan',
          start: "top+=55% bottom",
          once: true,
        },
      });
      new MasterTimeline({
        timeline: tlSlogan,
        tweenArr: [
          new FadeSplitText({ el: $('.footer_slogan_txt').get(0), isDisableRevert: true, breakType: 'chars', onMask: true }),
          new FadeIn({ el: $('.footer_copyright_left'), delay: .3 }),
          ...Array.from($('.footer_copyright_right_img')).flatMap((el, idx) => new FadeIn({ el: el, delay: .3, type: 'bottom' })),
        ]
      })
    }
  }
  let footer = new Footer('.footer ');
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
        paused: true,
      }
      );
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        effect: "fade",
        pagination: {
          el: ".home_hero_pagination",
          clickable: true,
        },
        // autoplay: {
        //   delay: 2500,
        //   disableOnInteraction: false,
        // },
      });
      new MasterTimeline({
        timeline: this.tl,
        triggerInit: '.home_hero',
        tweenArr: [
          new FadeIn({ el: $('.home_hero .swiper-slide:first-child .home_hero_des_subtitle') }),
          new FadeSplitText({ el: $('.home_hero .swiper-slide:first-child .home_hero_des_title').get(0), onMask: true, delay: .1 }),
          new FadeIn({ el: $('.home_hero .swiper-slide:first-child .home_hero_des_link'), delay: .1 }),
        ]
      })
    }
    play() {
      console.log('play')
      this.tl.play();
    }
  }
  const homeHero = new HomeHero();
  class HomeSeller extends TriggerSetup {
    constructor(triggerEl) {
      super(triggerEl);
      this.tl = null;
      this.sellerSwiper = null; // Thêm để lưu swiper instance
    }
    
    trigger() {
      super.setTrigger(this.setup.bind(this));
    }
    
    setup() {
      // Lưu swiper vào class property
      this.sellerSwiper = new Swiper(".home_seller_silder", {
        slidesPerView: 1.5,
        spaceBetween: parseRem(10),
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
      $('.home_seller_category_item').on('click', (e) => {
        const selectedCategory = $(e.currentTarget).data('category');
        
        // Update active state
        $('.home_seller_category_item').removeClass('active');
        $(e.currentTarget).addClass('active');
        
        // Filter products
        if (selectedCategory === 'all') {
          $('.home_seller_silder_item').each((idx, item) => {
            this.activeItem(item); 
          });
        } else {
          $('.home_seller_silder_item').each((idx, item) => {
            const productCategories = $(item).data('categories') ? $(item).data('categories').split(' ') : [];
            
            if (productCategories.includes(selectedCategory)) {
              this.activeItem(item); // ✅ Có thể gọi được method
            } else {
              $(item).hide();
            }
          });
        }
        
        // Update Swiper sau khi filter
        setTimeout(() => {
          this.sellerSwiper.update();
        }, 100);
      });
      
      // Animation setup code...
      this.tl = gsap.timeline({
        scrollTrigger: {
          trigger: '.home_seller_inner',
          start: "top+=75% bottom",
          once: true,
        }
      });
      
      new MasterTimeline({
        timeline: this.tl,
        triggerInit: this.triggerEl,
        tweenArr: [
          new FadeIn({ el: $('.home_seller_content_subtitle') }),
          new FadeSplitText({ el: $('.home_seller_content_title').get(0), onMask: true, delay: .1 }),
          ...Array.from($('.home_seller_category_item')).flatMap((el, idx) => new FadeIn({ el: el, delay: idx == 0 ? '<=0' : '<=.1' })),
        ]
      });
      
      let tlItemList = new gsap.timeline({
        scrollTrigger: {
          trigger: '.home_seller_silder_wrap',
          start: "top+=75% bottom",
          once: true,
        }
      });
      
      $(this.triggerEl).find(".home_seller_silder_item").each((i, el) => {
        new MasterTimeline({
          timeline: tlItemList,
          triggerInit: this.triggerEl,
          tweenArr: [
            new ScaleInset({ el: $(el).find('.home_seller_silder_item_img').get(0) }),
            ...Array.from($(el).find('.home_seller_silder_item_top .txt_12')).flatMap((el, idx) => new FadeIn({ el: el, delay: '<=.1', type: 'bottom' })),
            new FadeIn({ el: $(el).find('.home_seller_silder_item_info'), type: 'bottom' }),
            new FadeSplitText({ el: $(el).find('.home_seller_silder_item_info_title').get(0), onMask: true, delay: .1 }),
            new FadeIn({ el: $(el).find('.home_seller_silder_item_info_price'), delay: .1, type: 'bottom' }),
          ].filter(Boolean)
        });
      });
    }
    
    activeItem(el) {
      $(el).show();
      const itemTl = gsap.timeline();
      new MasterTimeline({
        timeline: itemTl,
        tweenArr: [
          new ScaleInset({ el: $(el).find('.home_seller_silder_item_img').get(0) }),
          ...Array.from($(el).find('.home_seller_silder_item_top .txt_12')).flatMap((el, idx) => new FadeIn({ el: el, delay: '<=.1', type: 'bottom' })),
          new FadeIn({ el: $(el).find('.home_seller_silder_item_info'), type: 'bottom' }),
          new FadeSplitText({ el: $(el).find('.home_seller_silder_item_info_title').get(0), onMask: true, delay: .1 }),
          new FadeIn({ el: $(el).find('.home_seller_silder_item_info_price'), delay: .1, type: 'bottom' }),
        ].filter(Boolean)
      });
    }
  }
  
  let homeSeller = new HomeSeller('.home_seller');
  class HomeCookie extends TriggerSetup {
    constructor(triggerEl) {
      super(triggerEl);
    }
    trigger() {
      super.setTrigger(this.setup.bind(this));
      this.interact();
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
          ...Array.from($('.home_cookies_content_item')).flatMap((el, idx) => {
            return [
              new FadeSplitText({ el: $(el).find('.home_cookies_content_item_label').get(0), delay: idx == 0 ? '<=0' : `<=.05*${idx}` }),
              new FadeSplitText({ el: $(el).find('.home_cookies_content_item_title').get(0) }),
            ]
          }),
        ]
      })
      if (viewport.w > 991) {
        activeItem(['.home_cookies_content_item'], 0);
        let listBg = $(".home_cookies_bg_item");
        let listItemMenu = ['.home_cookies_content_item'];
        let triggered = new Array(listBg.length).fill(false);
        let wasFullyScaled = new Array(listBg.length).fill(false);
        gsap.set(listBg, { scale: 0 });
        gsap.set(listBg[0], { scale: 1 });
        let tl = gsap.timeline({
          scrollTrigger: {
            trigger: $(".home_cookies"),
            start: "top top",
            end: "bottom bottom",
            scrub: 1,
            onUpdate: (self) => {
              if (self.progress == 1) {
                activeItem(listItemMenu, listBg.length - 1);
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
          tl.to($(el).find('.home_cookies_bg_item_inner'), { yPercent: -20, duration: 1, ease: "none" })

        })
      }

    }
    interact() {
      if(viewport.w > 991) {
        $('.home_cookies_content_inner').on('click', (e) => {
          let linkCategory = $('.home_cookies_content_item.active .home_cookies_content_item_title').data('category-link');
          window.location.href = linkCategory;
        });
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
      let tl = gsap.timeline({
        scrollTrigger: {
          trigger: this.triggerEl,
          start: "top+=35% bottom",
          once: true,
        },
      });
      new MasterTimeline({
        timeline: tl,
        tweenArr: [
          new FadeIn({ el: $('.home_about_content_subtitle') }),
          new FadeSplitText({ el: $('.home_about_content_title').get(0), onMask: true, delay: .1 }),
        ]
      })
      let tlItem = new gsap.timeline({
        scrollTrigger: {
          trigger: '.home_about_inner',
          start: "top+=75% bottom",
          once: true,
        }
      });
      $('.home_about_item').each((i, el) => {
        new MasterTimeline({
          timeline: tlItem,
          tweenArr: [
            ...($(el).find('.home_about_item_des p').length > 0 ? Array.from($(el).find('.home_about_item_des p')).map((p, idx) => new FadeSplitText({ el: $(p).get(0), delay: idx == 0 ? '<=.4' : `<=.05*${idx}` })) : []),
            $(el).find('.home_about_item_inner').length > 0 ? new ScaleInset({ el: $(el).find('.home_about_item_inner').get(0), delay: .1 }) : null,
            $(el).find('.home_about_item_link').length > 0 ? new FadeIn({ el: $(el).find('.home_about_item_link'), delay: .8 }) : null,
            $(el).find('.home_about_item_border').length > 0 ? new FadeIn({ el: $(el).find('.home_about_item_border'), delay: .8 }) : null,
          ].filter(Boolean)
        })
      })
      // new ParallaxImage({ el: $('.home_about_item_inner img').get(0) });
      $(this.triggerEl).find('.home_about_slide_item').each((i, el) => {
        let tlItem = new gsap.timeline({
          scrollTrigger: {
            trigger: el,
            start: "top+=75% bottom",
            once: true,
          }
        });
        new MasterTimeline({
          timeline: tlItem,
          tweenArr: [
            new ScaleInset({ el: $(el).find('.home_about_slide_item_img').get(0), delay: .1 }),
            new FadeIn({ el: $(el).find('.home_about_slide_item_info'), delay: .1 }),
            new FadeSplitText({ el: $(el).find('.home_about_slide_item_info_title').get(0), onMask: true, delay: .1 }),
            new FadeSplitText({ el: $(el).find('.home_about_slide_item_info_des').get(0), delay: .1 }),
            new ScaleInset({ el: $(el).find('.home_about_slide_item_info_icon').get(0), delay: .2 }),
          ]
        })
      })
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
      }
      let tl = gsap.timeline({
        scrollTrigger: {
          trigger: this.triggerEl,
          start: "top+=35% bottom",
          once: true,
        },
      });
      new MasterTimeline({
        timeline: tl,
        tweenArr: [
          new FadeIn({ el: $('.home_discover_subtitle') }),
          new FadeSplitText({ el: $('.home_discover_title').get(0), onMask: true, delay: .1 }),
        ]
      })
      $(this.triggerEl).find(".home_seller_silder_item").each((i, el) => {
        let tlItemList = new gsap.timeline({
          scrollTrigger: {
            trigger: el,
            start: "top+=75% bottom",
            once: true,
          }
        }
        );
        new MasterTimeline({
          timeline: tlItemList,
          triggerInit: this.triggerEl,
          tweenArr: [
            new ScaleInset({ el: $(el).find('.home_seller_silder_item_img').get(0) }),
            ...Array.from($(el).find('.home_seller_silder_item_top .txt_12')).flatMap((el, idx) => new FadeIn({ el: el, delay: '<=.1', type: 'bottom' })),
            new FadeIn({ el: $(el).find('.home_seller_silder_item_info'), type: 'bottom' }),
            new FadeSplitText({ el: $(el).find('.home_seller_silder_item_info_title').get(0), onMask: true, delay: .1 }),
            new FadeIn({ el: $(el).find('.home_seller_silder_item_info_price'), delay: .1, type: 'bottom' }),
          ].filter(Boolean)
        })
      })
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
      let tlScrub = gsap.timeline({
        scrollTrigger: {
          trigger: this.triggerEl,
          start: 'center bottom+=10%',
          end: `center top+=40%`,
          scrub: 1,
        },
      });
      let title = new SplitType($(this.triggerEl).find('.home_course_info_txt').get(0), { type: 'chars, words, lines', lineClass: 'split-line' });
      let tl = gsap.timeline({
        scrollTrigger: {
          trigger: this.triggerEl,
          start: "top+=45% bottom",
          once: true,
        },
      });
      tl
        .fromTo(title.words, { autoAlpha: 0, yPercent: 100 }, { autoAlpha: 1, duration: 0.5, yPercent: 0, stagger: .025, ease: "none" })
        .fromTo($('.home_course .home_hero_des_link'), { autoAlpha: 0, yPercent: 100 }, { autoAlpha: 1, yPercent: 0, ease: "none", duration: .6 }, '>=.2')
      tlScrub.fromTo('.home_course_info_txt .char', { color: 'rgba(255,255,255, 0.5)' }, { color: 'rgba(255,255,255, 1)', stagger: .03, ease: "none" })
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
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
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
      let tl = gsap.timeline({
        scrollTrigger: {
          trigger: this.triggerEl,
          start: "top+=35% bottom",
          once: true,
        },
      });
      new MasterTimeline({
        timeline: tl,
        tweenArr: [
          new FadeIn({ el: $('.home_review_left_subtitle') }),
          new ScaleInset({ el: $('.home_review_right_img').get(0) }),
          new FadeSplitText({ el: $('.home_review_left_title').get(0), onMask: true, delay: .1 }),
          new FadeIn({ el: $('.home_review_left_amount'), delay: .1 }),
        ]
      })
      let tlListItem = new gsap.timeline({
        scrollTrigger: {
          trigger: '.home_review_right_slide',
          start: "top+=75% bottom",
          once: true,
        }
      });
      $('.home_review_right_slide_item').each((i, el) => {
        new MasterTimeline({
          timeline: tlListItem,
          tweenArr: [
            new FadeIn({ el: $(el).find('.home_review_right_slide_item_icon_wrap') }),
            ...Array.from($(el).find('.home_review_right_slide_item_content p')).flatMap((el, idx) => new FadeSplitText({ el: el, onMask: true })),
            new FadeSplitText({ el: $(el).find('.home_review_right_slide_item_author').get(0) }),
          ]
        })
      })
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
      let tl = gsap.timeline({
        scrollTrigger: {
          trigger: this.triggerEl,
          start: "top+=35% bottom",
          once: true,
        },
      });
      new MasterTimeline({
        timeline: tl,
        tweenArr: [
          new FadeIn({ el: $('.home_contact_form_subtitle ') }),
          new FadeSplitText({ el: $('.home_contact_form_title ').get(0), onMask: true, delay: .1 }),
          new FadeIn({ el: $('.home_contact_form_name input') }),
          new FadeIn({ el: $('.home_contact_form_info input') }),
          new FadeIn({ el: $('.home_contact_form_info_select select') }),
          new FadeIn({ el: $('.home_contact_form_design textarea') }),
          new FadeIn({ el: $('.home_contact_form_upload') }),
          new FadeIn({ el: $('.home_contact .home_hero_des_link') })
        ]
      })
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
      let tl = gsap.timeline({
        scrollTrigger: {
          trigger: this.triggerEl,
          start: "top+=35% bottom",
          once: true,
        },
      });
      new MasterTimeline({
        timeline: tl,
        tweenArr: [
          new FadeIn({ el: $('.home_workshop_info_subtitle') }),
          new FadeSplitText({ el: $('.home_workshop_info_title').get(0), onMask: true, delay: .1 }),
        ]
      })
      let tlItem = new gsap.timeline({
        scrollTrigger: {
          trigger: '.home_workshop_slide',
          start: "top+=70% bottom",
          once: true,
        }
      });
      $('.home_workshop_slide_item').each((i, el) => {
        new MasterTimeline({
          timeline: tlItem,
          stagger: 0,
          tweenArr: [
            new ScaleInset({ el: $(el).find('.home_workshop_slide_item_img').get(0) }),
            new FadeIn({ el: $(el).find('.home_workshop_slide_item_info') }),
            new FadeSplitText({ el: $(el).find('.home_workshop_slide_item_title').get(0), onMask: true,}),
            new FadeIn({ el: $(el).find('.home_workshop_slide_item_des'), type: 'bottom' }),
          ]
        })
      })
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
      let tlItem = new gsap.timeline({
        scrollTrigger: {
          trigger: '.home_cake_slide',
          start: "top+=15% bottom",
          once: true,
        }
      });
      $('.home_cake_slide_item').each((i, el) => {
        new MasterTimeline({
          timeline: tlItem,
          tweenArr: [
            new FadeIn({ el: $(el).get(0), type: 'left' }, { delay: .1 }),
          ]
        })
      })
    }
  }
  let homeCake = new HomeCake('.home_cake');
  class ShopHero extends TriggerSetupHero {
    constructor() {
      super();
      this.tl = null;
      this.tlItem = null;
    }
    trigger() {
      this.setup();
      super.init(this.play.bind(this));
    }
    setup() {
      this.tl = gsap.timeline({
        paused: true,
      }
      );
      new MasterTimeline({
        timeline: this.tl,
        triggerInit: '.shop_content',
        tweenArr: [
          new FadeSplitText({ el: $('.shop_content_title').get(0), breakType: 'chars', onMask: true, delay: .1 }),
          new FadeIn({ el: $('.shop_content_list_search_left') }),
          new FadeIn({ el: $('.shop_content_list_search_right_sortby') }),
          new FadeIn({ el: $('.shop_content_list_search_right_search') }),
        ]
      })
      this.tlItem = new gsap.timeline({
        scrollTrigger: {
          trigger: '.shop_content_list_card',
          start: "top+=45% bottom",
          once: true,
        },
        paused: true,
      });
      $(".shop_content_list_card_item").each((i, el) => {
        new MasterTimeline({
          timeline: this.tlItem,
          triggerInit: this.triggerEl,
          tweenArr: [
            new FadeIn({ el:el, type: 'bottom' }),
            new ScaleInset({ el: $(el).find('.shop_content_list_card_item_img').get(0) }),
            ...Array.from($(el).find('.shop_content_list_card_item_top .txt_12')).flatMap((el, idx) => new FadeIn({ el: el, delay: '<=.1', type: 'bottom' })),
            new FadeIn({ el: $(el).find('.shop_content_list_card_item_info'), type: 'bottom' }),
            new FadeSplitText({ el: $(el).find('.shop_content_list_card_item_info_title').get(0), onMask: true, delay: .1 }),
            new FadeIn({ el: $(el).find('.shop_content_list_card_item_info_price'), delay: .1, type: 'bottom' }),
          ].filter(Boolean)
        })
      })
      let tlPaging = new gsap.timeline({
        scrollTrigger: {
          trigger: '.shop_content_list_paging',
          start: "top+=45% bottom",
          once: true,
        },
      });
      requestAnimationFrame(() => {
        new MasterTimeline({
          timeline: tlPaging,
          triggerInit: this.triggerEl,
          tweenArr: [
            new FadeIn({ el:'.shop_content_list_paging', type: 'bottom' }),
          ]
        })
      })
    }
    play() {
      console.log('play')
      this.tl.play();
      this.tlItem.play();
    }
  }

  let shopHero = new ShopHero('.shop_hero');
  class OurStoryChoose extends TriggerSetup {
    constructor(triggerEl) {
      super(triggerEl);
    }
    trigger() {
      super.setTrigger(this.setup.bind(this));
    }
    setup() {
      let tlTitle = new gsap.timeline({
        scrollTrigger: {
          trigger: '.story_choose_left_info',
          start: "top+=35% bottom",
          once: true,
        },
      });
      new MasterTimeline({
        timeline: tlTitle,
        triggerInit: this.triggerEl,
        tweenArr: [
          new FadeIn({ el: $('.story_choose_left_subtitle'), type: 'bottom' }),
          new FadeSplitText({ el: $('.story_choose_left_title').get(0), onMask: true, delay: .1 }),
        ]
      })
      $('.story_choose_right_item').each((i, el) => {
        let tlItem = new gsap.timeline({
          scrollTrigger: {
            trigger: el,
            start: "top+=45% bottom",
            once: true,
          }
        });

        new MasterTimeline({
          timeline: tlItem,
          triggerInit: this.triggerEl,
          tweenArr: [
            new FadeIn({ el: $(el).find('.story_choose_right_item_num'), type: 'bottom' }),
            new FadeSplitText({ el: $(el).find('.story_choose_right_item_title').get(0),delay: .1, onMask: true, delay: .1 }),
            new FadeSplitText({ el: $(el).find('.story_choose_right_item_des').get(0),delay: .1, onMask: true, delay: .1 }),
            new FadeIn({ el: $(el).find('.story_choose_right_item_link'),delay: .2, type: 'bottom' }),
            new ScaleLine({ el: $(el).find('.story_choose_right_item_line').get(0) }),
          ]
        })
      })
      let tlImg = new gsap.timeline({
        scrollTrigger: {
          trigger: '.story_choose_left_img',
          start: "top+=25% bottom",
          once: true,
        }
      });
      new MasterTimeline({
        timeline: tlImg,
        triggerInit: this.triggerEl,
        tweenArr: [
          new ScaleInset({ el: $('.story_choose_left_img').get(0) }),
        ]
      })
    }
  }
  let ourStoryChoose = new OurStoryChoose('.story_choose');
  class ProductDetailHero extends TriggerSetupHero {
    constructor() {
      super();
      this.tl = null;
      this.tlItem = null;
    }
    trigger() {
      this.setup();
      this.interact();
      super.init(this.play.bind(this));
    }
    setup() {
      let sellerSwiper = new Swiper(".product_related_silder .home_seller_silder", {
        slidesPerView: 1.5,
        spaceBetween: parseRem(10),
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
      this.tl = gsap.timeline({
        paused: true,
      });
    }
    interact() {
      // $('.productdetail_content_info_sensa_item').on('click', function() {
      //   $(this).toggleClass('active');
      // });
      // document.querySelectorAll('input[name="size"]').forEach(input => {
      //   input.addEventListener('change', function() {
      //       document.getElementById('sizeDisplay').textContent = this.value;
      //     });
      // });
      
      // // Xử lý cho Cake Flavour
      // document.querySelectorAll('input[name="flavor"]').forEach(input => {
      //     input.addEventListener('change', function() {
      //         document.getElementById('flavorDisplay').textContent = this.value;
      //     });
      // });
      $('input[type="radio"]').on('change', function() {
        var name = $(this).attr('name');
        var value = $(this).val();
        var displayId = name.replace('attribute_', '') + 'Display';
        $('#' + displayId).text(value);
    });

    // Handle variation price update via AJAX
    $('.variation-selector').on('change', function() {
        updateVariationPriceAjax();
    });

    function updateVariationPriceAjax() {
        var selectedAttributes = {};
        
        $('.variation-selector:checked').each(function() {
            var attrName = $(this).data('attribute-name');
            var attrValue = $(this).val();
            selectedAttributes[attrName] = attrValue;
        });

        var productId = $('#product_id').val();

        $.ajax({
            url: ajaxurl || '/wp-admin/admin-ajax.php',
            type: 'POST',
            data: {
                action: 'get_variation_price',
                nonce: typeof variationNonce !== 'undefined' ? variationNonce : '',
                product_id: productId,
                attributes: selectedAttributes
            },
            beforeSend: function() {
                $('#product-price-wrapper').addClass('loading');
            },
            success: function(response) {
                if (response.success) {
                    var data = response.data;
                    var priceHtml = '';

                    if (data.is_on_sale && data.regular_price > data.sale_price) {
                        var discount = Math.round(((data.regular_price - data.sale_price) / data.regular_price) * 100);
                        
                        priceHtml += '<div class="productdetail_content_info_price_item txt_24">$' + parseFloat(data.sale_price).toFixed(2) + '</div>';
                        priceHtml += '<div class="productdetail_content_info_price_item price_old txt_16">$' + parseFloat(data.regular_price).toFixed(2) + '</div>';
                        priceHtml += '<div class="productdetail_content_info_price_item price_discount txt_title_color">-' + discount + '%</div>';
                    } else {
                        priceHtml += '<div class="productdetail_content_info_price_item txt_24">$' + parseFloat(data.price).toFixed(2) + '</div>';
                    }

                    $('#product-price-wrapper').html(priceHtml);
                }
            },
            complete: function() {
                $('#product-price-wrapper').removeClass('loading');
            }
        });
    }

    // Trigger initial price update
    if ($('.variation-selector').length > 0) {
        updateVariationPriceAjax();
    }

    }
    play() {
      this.tl.play();
    }
  }
  const productDetailHero = new ProductDetailHero('.product_detail_hero');
  const SCRIPT = {
    homeScript: () => {
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
    shopScript: () => {
      shopHero.trigger();
      return;
    },
    ourStoryScript: () => {
      homeHero.trigger();
      homeAbout.trigger();
      ourStoryChoose.trigger();
      homeCourse.trigger();
      return;
    },
    productDetailScript: () => {
      productDetailHero.trigger();
      return;
    },
  };
  function animationGlobal() {
    cursor.init();
    header.trigger();
    footer.trigger();
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

