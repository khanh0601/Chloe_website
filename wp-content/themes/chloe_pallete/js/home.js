
// Popup Notification System (Global)
window.Popup = {
  show: function(type, title, message, options = {}) {
    const { confirmText = 'OK', cancelText = 'Cancel', onConfirm, onCancel, autoClose } = options;
    const isConfirm = type === 'confirm';
    
    // Remove existing popup if any
    $('.popup-overlay').remove();
    
    // Create popup HTML
    const iconMap = {
      success: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z" fill="currentColor"/></svg>',
      error: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" fill="currentColor"/></svg>',
      warning: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 21h22L12 2 1 21zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z" fill="currentColor"/></svg>',
      confirm: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" fill="currentColor"/></svg>'
    };
    
    const buttonsHtml = isConfirm 
      ? `
        <button class="popup-button secondary" data-action="cancel">${cancelText}</button>
        <button class="popup-button primary" data-action="confirm">${confirmText}</button>
      `
      : `<button class="popup-button primary" data-action="close">${confirmText}</button>`;
    
    const popupHtml = `
      <div class="popup-overlay">
        <div class="popup-container">
          <div class="popup-icon ${type}">${iconMap[type] || iconMap.warning}</div>
          <div class="popup-title">${title}</div>
          <div class="popup-message">${message}</div>
          <div class="popup-buttons">${buttonsHtml}</div>
        </div>
      </div>
    `;
    
    $('body').append(popupHtml);
    const $popup = $('.popup-overlay');
    
    // Show popup
    setTimeout(() => $popup.addClass('show'), 10);
    
    // Handle button clicks
    $popup.on('click', '.popup-button[data-action="confirm"]', function() {
      window.Popup.hide();
      if (onConfirm) onConfirm();
    });
    
    $popup.on('click', '.popup-button[data-action="cancel"]', function() {
      window.Popup.hide();
      if (onCancel) onCancel();
    });
    
    $popup.on('click', '.popup-button[data-action="close"]', function() {
      window.Popup.hide();
      if (onConfirm) onConfirm();
    });
    
    // Close on overlay click (not on container click)
    $popup.on('click', function(e) {
      if ($(e.target).hasClass('popup-overlay')) {
        window.Popup.hide();
        if (onCancel) onCancel();
      }
    });
    
    // Auto close for success/error if specified
    if (autoClose && !isConfirm) {
      setTimeout(() => {
        window.Popup.hide();
        if (onConfirm) onConfirm();
      }, autoClose);
    }
    
    // Return promise for async/await usage
    return new Promise((resolve) => {
      const originalOnConfirm = onConfirm;
      const originalOnCancel = onCancel;
      
      $popup.off('click', '.popup-button[data-action="confirm"]').on('click', '.popup-button[data-action="confirm"]', function() {
        window.Popup.hide();
        if (originalOnConfirm) originalOnConfirm();
        resolve(true);
      });
      
      $popup.off('click', '.popup-button[data-action="cancel"]').on('click', '.popup-button[data-action="cancel"]', function() {
        window.Popup.hide();
        if (originalOnCancel) originalOnCancel();
        resolve(false);
      });
      
      $popup.off('click', '.popup-button[data-action="close"]').on('click', '.popup-button[data-action="close"]', function() {
        window.Popup.hide();
        if (originalOnConfirm) originalOnConfirm();
        resolve(true);
      });
    });
  },
  
  hide: function() {
    const $popup = $('.popup-overlay');
    $popup.removeClass('show');
    setTimeout(() => $popup.remove(), 300);
  },
  
  success: function(title, message, options = {}) {
    return this.show('success', title, message, { ...options, autoClose: options.autoClose || 3000 });
  },
  
  error: function(title, message, options = {}) {
    return this.show('error', title, message, options);
  },
  
  warning: function(title, message, options = {}) {
    return this.show('warning', title, message, options);
  },
  
  confirm: function(title, message, options = {}) {
    return this.show('confirm', title, message, options);
  }
};

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
    }
    deactiveMenuTablet = () => {
      // lenis.start();
      $('body').removeClass('menu-open')
      gsap.fromTo('.header_menu', { clipPath: 'polygon(0% 0%, 100% 0, 100% 100%, 0% 100%)' }, {
        duration: 1, clipPath: 'polygon(0% 0%, 0% 0%, 0% 100%, 0% 100%)', ease: "circ.inOut"
      });
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
      this.interact();
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
    
    interact() {
      // Add to cart functionality
      $(document).on('click', '.home_seller_silder_item_info_cart_wrap', function(e) {
        e.preventDefault();
        e.stopPropagation(); // Prevent link navigation
        
        const $cartWrap = $(this);
        
        // Chặn click nếu đang loading
        if ($cartWrap.hasClass('loading') || $cartWrap.hasClass('disabled')) {
          return false;
        }
        
        console.log('click');
        const $productItem = $cartWrap.closest('.home_seller_silder_item');
        const productId = $cartWrap.data('product-id') || $productItem.data('product-id');
        const productType = $cartWrap.data('product-type') || $productItem.data('product-type') || 'simple';
        
        // Parse variation ID - handle both string and number
        let defaultVariationId = $cartWrap.data('default-variation-id') || $productItem.data('default-variation-id');
        if (defaultVariationId) {
          defaultVariationId = parseInt(defaultVariationId, 10) || 0;
        } else {
          defaultVariationId = 0;
        }
        
        // Parse variation attributes
        let defaultVariationAttributes = $cartWrap.data('default-variation-attributes') || $productItem.data('default-variation-attributes') || null;
        if (defaultVariationAttributes && typeof defaultVariationAttributes === 'string') {
          try {
            defaultVariationAttributes = JSON.parse(defaultVariationAttributes);
          } catch (e) {
            console.warn('Error parsing variation attributes:', e);
            defaultVariationAttributes = null;
          }
        }
        
        // Debug log
        console.log('Product Type:', productType);
        console.log('Default Variation ID:', defaultVariationId);
        console.log('Default Variation Attributes:', defaultVariationAttributes);
        
        if (!productId) {
          window.Popup.error('Error', 'Product ID not found');
          return;
        }
        
        // Check if product is sold out
        const isSoldOut = $productItem.find('.home_seller_silder_item_top_soldout.active').length > 0;
        
        if (isSoldOut) {
          window.Popup.warning('Out of Stock', 'This product is currently sold out');
          return;
        }
        
        // Check if variable product without default variation
        if (productType === 'variable' && !defaultVariationId) {
          // Redirect to product page to select variation
          const productUrl = $productItem.attr('href');
          if (productUrl) {
            window.Popup.warning('Selection Required', 'Please select product options on the product page', {
              autoClose: 2000,
              onConfirm: function() {
                window.location.href = productUrl;
              }
            });
            setTimeout(() => {
              window.location.href = productUrl;
            }, 2000);
          } else {
            window.Popup.warning('Selection Required', 'Please visit the product page to select options');
          }
          return;
        }
        
        // Disable button to prevent double click và thêm loading state
        $cartWrap.addClass('loading disabled');
        $cartWrap.css('pointer-events', 'none');
        
        // Ẩn icon cart và hiện loading spinner
        const $cartIcon = $cartWrap.find('.home_seller_silder_item_info_cart');
        $cartIcon.hide();
        
        // Tạo loading spinner nếu chưa có
        if ($cartWrap.find('.cart-loading-spinner').length === 0) {
          $cartWrap.append('<div class="cart-loading-spinner"></div>');
        }
        $cartWrap.find('.cart-loading-spinner').show();
        
        // Check if WooCommerce is available
        if (typeof wc_add_to_cart_params === 'undefined') {
          window.Popup.error('Configuration Error', 'WooCommerce is not properly configured');
          // Reset loading state
          $cartWrap.removeClass('loading disabled');
          $cartWrap.css('pointer-events', '');
          $cartWrap.find('.home_seller_silder_item_info_cart').show();
          $cartWrap.find('.cart-loading-spinner').hide();
          return;
        }
        
        // Prepare data for AJAX
        const data = {
          action: 'custom_add_to_cart',
          product_id: productId,
          quantity: 1,
          nonce: wc_add_to_cart_params.custom_add_to_cart_nonce || ''
        };
        
        // Add variation data if variable product
        if (productType === 'variable' && defaultVariationId) {
          data.variation_id = defaultVariationId;
          
          // Parse variation attributes if provided
          if (defaultVariationAttributes) {
            try {
              const variationAttrs = typeof defaultVariationAttributes === 'string' 
                ? JSON.parse(defaultVariationAttributes) 
                : defaultVariationAttributes;
              data.variation = variationAttrs;
            } catch (e) {
              console.warn('Error parsing variation attributes:', e);
            }
          }
          
          console.log('Adding variable product with variation_id:', defaultVariationId);
          console.log('Variation attributes:', data.variation);
        }
        
        // Send AJAX request
        $.ajax({
          type: 'POST',
          url: wc_add_to_cart_params.ajax_url,
          data: data,
          beforeSend: function() {
            // Optional: Add loading state visual
          },
          success: function(response) {
            if (!response.success) {
              let errorMsg = 'Unable to add product to cart.';
              if (response.data && response.data.message) {
                errorMsg = response.data.message;
              }
              
              window.Popup.error('Error', errorMsg);
              
              if (response.data && response.data.product_url) {
                // If product requires options, redirect to product page
                // Reset loading state trước khi redirect
                $cartWrap.removeClass('loading disabled');
                $cartWrap.css('pointer-events', '');
                $cartWrap.find('.home_seller_silder_item_info_cart').show();
                $cartWrap.find('.cart-loading-spinner').hide();
                setTimeout(() => {
                  window.location = response.data.product_url;
                }, 1500);
                return;
              } else {
                // Reset loading state
                $cartWrap.removeClass('loading disabled');
                $cartWrap.css('pointer-events', '');
                $cartWrap.find('.home_seller_silder_item_info_cart').show();
                $cartWrap.find('.cart-loading-spinner').hide();
                return;
              }
            }
            
            // Update cart UI - gọi refreshCartContent để đảm bảo cart được render đầy đủ
            if (typeof window.refreshCartContent === 'function') {
              // Gọi global function để refresh cart từ server
              window.refreshCartContent();
            } else if (response.data && response.data.fragments) {
              // Fallback: sử dụng fragments nếu refreshCartContent không có
              if (typeof updateCartUI === 'function') {
                updateCartUI(response.data.fragments, response.data.cart_hash);
              } else {
                // Fallback: update manually
                if (response.data.fragments['.header_icon_item_num .cart-count']) {
                  $('.header_icon_item_num .cart-count').text(response.data.fragments['.header_icon_item_num .cart-count']);
                }
                if (response.data.fragments['.menu_cart_title']) {
                  $('.menu_cart_title').html(response.data.fragments['.menu_cart_title']);
                }
                if (response.data.fragments['.menu_cart_content']) {
                  $('.menu_cart_content').html(response.data.fragments['.menu_cart_content']);
                }
                if (response.data.fragments['.menu_cart_button_total_txt']) {
                  $('.menu_cart_button_total_txt').html(response.data.fragments['.menu_cart_button_total_txt']);
                }
                if (response.data.fragments['.menu_cart_button_total_price']) {
                  $('.menu_cart_button_total_price').html(response.data.fragments['.menu_cart_button_total_price']);
                }
                if (response.data.fragments['.menu_cart_button_check']) {
                  const $checkoutBtn = $('.menu_cart_button_check');
                  if ($checkoutBtn.length === 0) {
                    $('.menu_cart_button_total').after(response.data.fragments['.menu_cart_button_check']);
                  }
                }
              }
              
              // Fallback: Update cart count directly if fragment doesn't work
              if (response.data.cart_count !== undefined) {
                const $cartCount = $('.header_icon_item_num .cart-count');
                if ($cartCount.length) {
                  $cartCount.text(response.data.cart_count);
                }
              }
              
              // Trigger WooCommerce event
              $(document.body).trigger('added_to_cart', [
                response.data.fragments, 
                response.data.cart_hash || '', 
                $cartWrap
              ]);
            }
            
            // Show success message
            window.Popup.success('Success', 'Product added to cart!', { autoClose: 2000 });
            
            // Reset button after delay
            setTimeout(function() {
              $cartWrap.removeClass('loading disabled');
              $cartWrap.css('pointer-events', '');
              $cartWrap.find('.home_seller_silder_item_info_cart').show();
              $cartWrap.find('.cart-loading-spinner').hide();
            }, 500);
          },
          error: function(xhr, status, error) {
            let errorMsg = 'Error adding product to cart. Please try again.';
            try {
              const errorResponse = JSON.parse(xhr.responseText);
              if (errorResponse.message) {
                errorMsg = errorResponse.message;
              } else if (errorResponse.data && errorResponse.data.message) {
                errorMsg = errorResponse.data.message;
              }
            } catch (e) {
              // Use default error message
            }
            
            window.Popup.error('Error', errorMsg);
            // Reset loading state
            $cartWrap.removeClass('loading disabled');
            $cartWrap.css('pointer-events', '');
            $cartWrap.find('.home_seller_silder_item_info_cart').show();
            $cartWrap.find('.cart-loading-spinner').hide();
          },
          dataType: 'json'
        });
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
      this.interact();
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
    interact() {
      const self = this;
      
      // Filter toggle
      $('.filter-toggle').on('click', function(e) {
        e.stopPropagation();
        $(this).toggleClass('active');
        $(this).next('.filter-dropdown').toggleClass('active');
      
        $('.filter-toggle').not(this).removeClass('active');
        $('.filter-dropdown').not($(this).next()).removeClass('active');
      });
      
      $('.filter-dropdown').on('click', function(e) {
        e.stopPropagation();
      });
      
      $(document).on('click', function(e) {
        if (!$(e.target).closest('.shop_content_list_search_left, .shop_content_list_search_right_sortby').length) {
          $('.filter-toggle').removeClass('active');
          $('.filter-dropdown').removeClass('active');
        }
      });
      
      // Category filter functionality
      let selectedCategories = []; // Array to store selected category slugs
      
      // // Load saved categories from localStorage
      // const savedCategories = localStorage.getItem('shop_categories');
      // if (savedCategories) {
      //   try {
      //     selectedCategories = JSON.parse(savedCategories);
      //     // Check saved categories in checkboxes
      //     selectedCategories.forEach(function(slug) {
      //       $(`.shop_category input[type="checkbox"][value="${slug}"]`).prop('checked', true).parent('label').addClass('active');
      //     });
      //   } catch (e) {
      //     console.error('Error parsing saved categories:', e);
      //   }
      // }
      
      $('.shop_category input[type="checkbox"]').on('change', function() {
        const $checkbox = $(this);
        const categorySlug = $checkbox.val();
        
        // Update button text based on selected categories
        const checkedCount = $('.shop_category input[type="checkbox"]:checked').length;
        const $buttonText = $('.shop_content_list_search_left .filter-toggle span:first');
        
        if (checkedCount === 0) {
          $buttonText.text('Cake categories');
        } else if (checkedCount === 1) {
          const categoryName = $('.shop_category input[type="checkbox"]:checked').parent('label').text().trim();
          $buttonText.text(categoryName);
        } else {
          $buttonText.text(checkedCount + ' categories');
        }
        
        $checkbox.parent('label').toggleClass('active', $checkbox.is(':checked'));
        if ($checkbox.is(':checked')) {
          if (selectedCategories.indexOf(categorySlug) === -1) {
            selectedCategories.push(categorySlug);
          }
        } else {
          selectedCategories = selectedCategories.filter(function(slug) {
            return slug !== categorySlug;
          });
        }
        
        // Save to localStorage
        localStorage.setItem('shop_categories', JSON.stringify(selectedCategories));
        
        // Trigger search/filter with current categories
        performSearch($searchInput.val().trim(), currentOrderby, selectedCategories);
      });
      
      // Sort functionality
      let currentOrderby = 'newest'; // Default sort
      const $sortRadios = $('input[name="sort"]');
      
      // Load saved sort preference or set default
      const savedSort = localStorage.getItem('shop_sort') || 'newest';
      if ($sortRadios.filter(`[value="${savedSort}"]`).length) {
        $sortRadios.filter(`[value="${savedSort}"]`).prop('checked', true);
        currentOrderby = savedSort;
      } else {
        $sortRadios.first().prop('checked', true);
      }
      
      $sortRadios.on('change', function() {
        const selectedSort = $(this).val();
        $('.shop_content_list_search_right_sortby button span').text(selectedSort);
        currentOrderby = selectedSort;
        localStorage.setItem('shop_sort', selectedSort);
        
        // Close dropdown
        $('.filter-toggle').removeClass('active');
        $('.filter-dropdown').removeClass('active');
        
        // Trigger search/sort
        performSearch($searchInput.val().trim(), currentOrderby, selectedCategories);
      });
      
      // Search functionality with debounce
      let searchTimeout = null;
      const $searchInput = $('.search-input');
      const $productsContainer = $('.shop_content_list_card');
      const $paginationContainer = $('.shop_content_list_paging');
      
      function performSearch(searchTerm, orderby = currentOrderby, categories = selectedCategories) {
        // Show loading state
        $productsContainer.html('<div class="shop_content_list_card_loading txt_16" style="text-align: center; padding: 2rem;">Loading...</div>');
        
        $.ajax({
          url: typeof ajaxurl !== 'undefined' ? ajaxurl : '/wp-admin/admin-ajax.php',
          type: 'POST',
          data: {
            action: 'custom_search_products',
            search: searchTerm,
            orderby: orderby,
            categories: categories,
            paged: 1,
            per_page: 12
          },
          success: function(response) {
            if (response.success) {
              // Update products
              $productsContainer.html(response.data.products_html);
              
              // Update pagination
              if (response.data.pagination_html) {
                $paginationContainer.html(response.data.pagination_html);
              } else {
                $paginationContainer.empty();
              }
              
              // Re-initialize animations for new items
              self.setupProductsAnimation();
            } else {
              $productsContainer.html('<div class="shop_content_list_card_empty txt_16">Error loading products.</div>');
            }
          },
          error: function() {
            $productsContainer.html('<div class="shop_content_list_card_empty txt_16">Error loading products.</div>');
          }
        });
      }
      
      $searchInput.on('input', function() {
        const searchTerm = $(this).val().trim();
        
        // Clear previous timeout
        if (searchTimeout) {
          clearTimeout(searchTimeout);
        }
        
        // Debounce: wait 500ms after user stops typing
        searchTimeout = setTimeout(function() {
          if (searchTerm.length >= 2 || searchTerm.length === 0) {
            performSearch(searchTerm, currentOrderby, selectedCategories);
          }
        }, 500);
      });
      
      // Handle pagination clicks (for AJAX pagination)
      $(document).on('click', '.shop_content_list_paging a', function(e) {
        e.preventDefault();
        const $link = $(this);
        
        if ($link.hasClass('disabled') || $link.css('pointer-events') === 'none') {
          return;
        }
        
        // Extract page number from link text or href
        let paged = 1;
        const href = $link.attr('href');
        const linkText = $link.text().trim();
        
        if (href && href !== '#') {
          try {
            const urlParams = new URLSearchParams(href.split('?')[1] || '');
            paged = parseInt(urlParams.get('paged')) || parseInt(urlParams.get('page')) || 1;
          } catch (e) {
            // Try to extract from link text if it's a number
            if (!isNaN(linkText)) {
              paged = parseInt(linkText);
            }
          }
        } else if (!isNaN(linkText)) {
          paged = parseInt(linkText);
        }
        
        const searchTerm = $searchInput.val().trim();
        
        // Show loading
        $productsContainer.html('<div class="shop_content_list_card_loading txt_16" style="text-align: center; padding: 2rem;">Loading...</div>');
        
        $.ajax({
          url: typeof ajaxurl !== 'undefined' ? ajaxurl : '/wp-admin/admin-ajax.php',
          type: 'POST',
          data: {
            action: 'custom_search_products',
            search: searchTerm,
            orderby: currentOrderby,
            categories: selectedCategories,
            paged: paged,
            per_page: 12
          },
          success: function(response) {
            if (response.success) {
              $productsContainer.html(response.data.products_html);
              if (response.data.pagination_html) {
                $paginationContainer.html(response.data.pagination_html);
              } else {
                $paginationContainer.empty();
              }
              self.setupProductsAnimation();
              
              // Scroll to top of products
              $('html, body').animate({
                scrollTop: $productsContainer.offset().top - 100
              }, 300);
            }
          },
          error: function() {
            $productsContainer.html('<div class="shop_content_list_card_empty txt_16">Error loading products.</div>');
          }
        });
      });
    }
    
    setupProductsAnimation() {
      // Re-setup animations for product items
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
            new FadeIn({ el: el, type: 'bottom' }),
            new ScaleInset({ el: $(el).find('.shop_content_list_card_item_img').get(0) }),
            ...Array.from($(el).find('.shop_content_list_card_item_top .txt_12')).flatMap((el, idx) => new FadeIn({ el: el, delay: '<=.1', type: 'bottom' })),
            new FadeIn({ el: $(el).find('.shop_content_list_card_item_info'), type: 'bottom' }),
            new FadeSplitText({ el: $(el).find('.shop_content_list_card_item_info_title').get(0), onMask: true, delay: .1 }),
            new FadeIn({ el: $(el).find('.shop_content_list_card_item_info_price'), delay: .1, type: 'bottom' }),
          ].filter(Boolean)
        })
      });
      
      if (this.tlItem) {
        this.tlItem.play();
      }
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
  class OurStoryAbout extends TriggerSetup {
    constructor(triggerEl) {
      super(triggerEl);
    }
    trigger() {
      super.setTrigger(this.setup.bind(this));
    }
    setup() {
      let tlTitle = new gsap.timeline({
        scrollTrigger: {
          trigger: '.story_about_title',
          start: "top+=45% bottom",
          once: true,
        },
      });
      new MasterTimeline({
        timeline: tlTitle,
        triggerInit: this.triggerEl,
        tweenArr: [
          ...Array.from($('.story_about_title *')).flatMap(el => new FadeSplitText({ el: el, onMask: true })),
        ]
      })
      let tlImg = new gsap.timeline({
        scrollTrigger: {
          trigger: '.story_about_content',
          start: "top+=45% bottom",
          once: true,
        },
      });
      new MasterTimeline({
        timeline: tlImg,
        triggerInit: this.triggerEl,
        tweenArr: [
          new ScaleInset({ el: $('.story_about_content_img').get(0) }),
        ]
      })
      let tlImg2 = new gsap.timeline({
        scrollTrigger: {
          trigger: '.story_about_content_item_img',
          start: "top+=45% bottom",
          once: true,
          markers: true,
        },
      });
      new MasterTimeline({
        timeline: tlImg2,
        triggerInit: this.triggerEl,
        tweenArr: [
          new ScaleInset({ el: $('.story_about_content_item_img').get(0) }),
        ]
      })
      let tlContent = new gsap.timeline({
        scrollTrigger: {
          trigger: '.story_about_content_des',
          start: "top+=45% bottom",
          once: true,
        },
      });
      new MasterTimeline({
        timeline: tlContent,
        triggerInit: this.triggerEl,
        tweenArr: [
          ...Array.from($('.story_about_content_des *')).flatMap(el => new FadeSplitText({ el: el, onMask: true })),
        ]
      })
    }
  }
  let ourStoryAbout = new OurStoryAbout('.story_about');
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

      if($('.product_related_silder').length > 0) {
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
      }
      this.tl = gsap.timeline({
        paused: true,
      });
      new MasterTimeline({
        timeline: this.tl,
        triggerInit: this.triggerEl,
        tweenArr: [
          new FadeIn({ el: $('.productdetail_breadcrum_inner').get(0), type: 'bottom' }),
          new ScaleInset({ el: $('.productdetail_img_inner').get(0) }),
          new FadeIn({ el: $('.productdetail_content_info_subtitle').get(0), type: 'bottom' }),
          new FadeSplitText({ el: $('.productdetail_content_info_title').get(0), onMask: true }),
          ...Array.from($('.productdetail_content_info_detail')).flatMap(el => {
            return [
              new FadeIn({ el: $(el).get(0), type: 'bottom' }),
            ]
          }),
          new FadeIn({ el: $('.productdetail_quantity').get(0), type: 'bottom' }),
          new FadeIn({ el: $('.productdetail_cart_button').get(0), type: 'bottom' }),
        ]
      })
    }
    interact() {
      
      $('input[type="radio"]').on('change', function() {
        var name = $(this).attr('name');
        var value = $(this).val();
        var displayId = name.replace('attribute_', '') + 'Display';
        $('#' + displayId).text(value);
    });

    // Handle variation price update via AJAX và update display
    $('.variation-selector').on('change', function() {
        // Update display
        const attrName = $(this).data('attribute-name') || $(this).attr('data-attribute-name');
        if (attrName) {
          const attrId = attrName.replace('attribute_', '');
          const $displayEl = $('#' + attrId + 'Display');
          if ($displayEl.length) {
            $displayEl.text($(this).val());
          }
        }
        // Update price
        updateVariationPriceAjax();
    });

    // Debounce function để tránh gọi quá nhiều lần
    let priceUpdateTimeout;
    function updateVariationPriceAjax() {
        // Clear timeout trước đó
        if (priceUpdateTimeout) {
            clearTimeout(priceUpdateTimeout);
        }
        
        // Debounce: chỉ gọi sau 300ms khi user ngừng thay đổi
        priceUpdateTimeout = setTimeout(function() {
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
        }, 300); // 300ms debounce
    }

    if ($('.variation-selector').length > 0) {
        updateVariationPriceAjax();
        
        // Listen for variation changes
        $(document).on('change', '.variation-selector', function() {
            updateVariationPriceAjax();
        });
    }

    $('input[name="size"]').on('change', function () {
      const $displayEl = $('#sizeDisplay');
      if ($displayEl.length) {
        $displayEl.text($(this).val());
      }
    });

    // Xử lý cho Cake Flavour
    $('input[name="flavor"]').on('change', function () {
      const $displayEl = $('#flavorDisplay');
      if ($displayEl.length) {
        $displayEl.text($(this).val());
      }
    });


    // Xử lý quantity buttons
    const $quantityInput = $('.productdetail_quantity_input_value');
    const $quantityHidden = $('input[name="quantity"]');
    const $minusBtn = $('.productdetail_quantity_button.minus');
    const $plusBtn = $('.productdetail_quantity_button.plus');

    if ($minusBtn.length && $plusBtn.length && $quantityInput.length && $quantityHidden.length) {
      let currentQuantity = parseInt($quantityInput.text()) || 1;
      const minQty = parseInt($quantityHidden.attr('min')) || 1;
      const maxQty = parseInt($quantityHidden.attr('max')) || 100;

      $minusBtn.on('click', function (e) {
        e.preventDefault();
        if (currentQuantity > minQty) {
          currentQuantity--;
          $quantityInput.text(currentQuantity);
          $quantityHidden.val(currentQuantity);
        }
      });

      $plusBtn.on('click', function (e) {
        e.preventDefault();
        if (currentQuantity < maxQty) {
          currentQuantity++;
          $quantityInput.text(currentQuantity);
          $quantityHidden.val(currentQuantity);
        }
      });
    }

    // Hàm tìm variation ID dựa trên các attributes đã chọn
    const findVariationId = (selectedAttributes, variationsData) => {
      if (!variationsData || variationsData.length === 0) {
        return 0;
      }

      // Tìm variation khớp với các attributes đã chọn
      for (let i = 0; i < variationsData.length; i++) {
        const variation = variationsData[i];
        let match = true;
        const variationAttr = variation.attributes || {};

        // Kiểm tra số lượng attributes phải khớp (ít nhất bằng nhau)
        const selectedAttrCount = Object.keys(selectedAttributes).length;
        const variationAttrCount = Object.keys(variationAttr).length;

        // Variation có thể có nhiều attributes hơn (nhưng phải có ít nhất các attributes đã chọn)
        if (selectedAttrCount === 0 || variationAttrCount === 0) {
          continue;
        }

        // Kiểm tra từng attribute đã chọn
        let matchedCount = 0;
        for (const attrName in selectedAttributes) {
          const selectedValue = selectedAttributes[attrName];

          // Kiểm tra xem variation có attribute này không
          if (!variationAttr.hasOwnProperty(attrName)) {
            match = false;
            break;
          }

          // So sánh giá trị (case-insensitive và trim whitespace)
          const variationValue = String(variationAttr[attrName] || '').trim();
          const selectedValueTrimmed = String(selectedValue || '').trim();

          // So sánh chính xác hoặc case-insensitive
          if (variationValue === selectedValueTrimmed ||
            variationValue.toLowerCase() === selectedValueTrimmed.toLowerCase()) {
            matchedCount++;
          } else {
            match = false;
            break;
          }
        }

        // Phải khớp tất cả các attributes đã chọn
        if (match && matchedCount === selectedAttrCount) {
          return variation.variation_id;
        }
      }

      return 0;
    };

    // Hàm lấy các attributes đã chọn
    const getSelectedAttributes = () => {
      const attributes = {};
      const $variationSelectors = $('.variation-selector:checked');

      $variationSelectors.each(function () {
        const attrName = $(this).data('attribute-name') || $(this).attr('data-attribute-name');
        if (attrName) {
          attributes[attrName] = $(this).val();
        }
      });

      return attributes;
    };

    // Hàm tìm variation ID từ map (nhanh hơn)
    const findVariationIdFromMap = (selectedAttributes, variationMap) => {
      if (!variationMap || Object.keys(variationMap).length === 0) {
        return 0;
      }

      // Tạo key từ selected attributes
      const keys = Object.keys(selectedAttributes).sort();
      let mapKey = '';
      keys.forEach(key => {
        mapKey += key + ':' + selectedAttributes[key] + '|';
      });
      mapKey = mapKey.slice(0, -1); // Remove last |

      // Tìm trong map
      if (variationMap[mapKey]) {
        return variationMap[mapKey];
      }

      return 0;
    };

    // Xử lý Add to Cart
    $('.productdetail_cart_button').on('click', function (e) {
      e.preventDefault();

      const $button = $(this);
      const productId = $('#product_id').val();
      const quantity = parseInt($('input[name="quantity"]').val()) || 1;
      const variationsData = $('#variations_data').val();

      // Kiểm tra product ID
      if (!productId) {
        window.Popup.error('Error', 'Product ID not found');
        return;
      }

      // Disable button để tránh double click
      $button.addClass('loading disabled');

      let data = {
        product_id: productId,
        quantity: quantity
      };

      // Nếu là variable product, tìm variation ID
      if (variationsData && variationsData.trim() !== '') {
        try {
          const selectedAttributes = getSelectedAttributes();

          // Kiểm tra nếu có variation selectors thì phải chọn đủ
          const $variationSelectors = $('.variation-selector');
          if ($variationSelectors.length > 0) {
            if (Object.keys(selectedAttributes).length === 0) {
              window.Popup.warning('Selection Required', 'Please select product options');
              $button.removeClass('loading disabled');
              return;
            }

            let variationId = 0;

            // Thử tìm từ variation map trước (nhanh nhất)
            const variationMapData = $('#variation_map').val();
            if (variationMapData && variationMapData.trim() !== '') {
              try {
                const variationMap = JSON.parse(variationMapData);
                variationId = findVariationIdFromMap(selectedAttributes, variationMap);
              } catch (e) {
                // Silent fail
              }
            }

            // Nếu không tìm được từ map, thử tìm từ variations data
            if (variationId === 0) {
              try {
                const variations = JSON.parse(variationsData);
                variationId = findVariationId(selectedAttributes, variations);
              } catch (e) {
                // Silent fail
              }
            }

            // Nếu vẫn không tìm được, bỏ qua - sẽ để server xử lý
            // Không dùng async: false vì nó block browser
            if (variationId === 0) {
              console.warn('Variation ID not found client-side, server will try to find it');
            }

            // Phải có variation_id cho variable product
            if (variationId > 0) {
              data.variation_id = variationId;
              data.variation = selectedAttributes;
            } else {
              // Nếu không tìm được, vẫn gửi attributes để server tìm
              data.variation = selectedAttributes;
              // Server sẽ tự tìm variation_id từ attributes
            }
          }
        } catch (e) {
          console.error('Error parsing variations data:', e);
          // Nếu lỗi parse, vẫn cho phép add simple product
        }
      }

      // Kiểm tra wc_add_to_cart_params
      if (typeof wc_add_to_cart_params === 'undefined') {
        window.Popup.error('Configuration Error', 'WooCommerce is not properly configured');
        $button.removeClass('loading disabled');
        return;
      }

      // Add nonce for security
      data.action = 'custom_add_to_cart';
      data.nonce = wc_add_to_cart_params.custom_add_to_cart_nonce || '';

      // Gửi AJAX request to custom handler
      const ajaxUrl = wc_add_to_cart_params.ajax_url;

      $.ajax({
        type: 'POST',
        url: ajaxUrl,
        data: data,
        beforeSend: function () {
          $button.find('.productdetail_cart_button_txt').text('Adding...');
        },
        success: function (response) {
          // Custom handler returns {success: true/false, data: {...}}
          if (!response.success) {
            let errorMsg = 'Unable to add product to cart.';
            if (response.data && response.data.message) {
              errorMsg = response.data.message;
            }
            
            window.Popup.error('Error', errorMsg);
            
            if (response.data && response.data.product_url) {
              window.location = response.data.product_url;
              return;
            } else {
              $button.find('.productdetail_cart_button_txt').text('Add to cart');
              $button.removeClass('loading disabled');
              return;
            }
          }

          // Cập nhật cart UI với fragments
          if (response.data && response.data.fragments) {
            // Use the updateCartUI function from initCartInteractions
            if (typeof updateCartUI === 'function') {
              updateCartUI(response.data.fragments, response.data.cart_hash);
            } else {
              // Fallback: update manually
              if (response.data.fragments['.header_icon_item_num .cart-count']) {
                $('.header_icon_item_num .cart-count').html(response.data.fragments['.header_icon_item_num .cart-count']);
              }
              if (response.data.fragments['.menu_cart_title']) {
                $('.menu_cart_title').html(response.data.fragments['.menu_cart_title']);
              }
              if (response.data.fragments['.menu_cart_content']) {
                $('.menu_cart_content').html(response.data.fragments['.menu_cart_content']);
              }
              if (response.data.fragments['.menu_cart_button_total_txt']) {
                $('.menu_cart_button_total_txt').html(response.data.fragments['.menu_cart_button_total_txt']);
              }
              if (response.data.fragments['.menu_cart_button_total_price']) {
                $('.menu_cart_button_total_price').html(response.data.fragments['.menu_cart_button_total_price']);
              }
              if (response.data.fragments['.menu_cart_button_check']) {
                const $checkoutBtn = $('.menu_cart_button_check');
                if ($checkoutBtn.length === 0) {
                  $('.menu_cart_button_total').after(response.data.fragments['.menu_cart_button_check']);
                }
              }
            }
            
            // Trigger WooCommerce event
            $(document.body).trigger('added_to_cart', [
              response.data.fragments, 
              response.data.cart_hash || '', 
              $button
            ]);
          }

          // Hiển thị thông báo thành công
          $button.find('.productdetail_cart_button_txt').text('Added!');

          // Reset button sau 500ms (nhanh hơn)
          setTimeout(function () {
            $button.find('.productdetail_cart_button_txt').text('Add to cart');
            $button.removeClass('loading disabled');
          }, 500);

          // Reload chỉ khi cần thiết (nếu có redirect setting)
          if (wc_add_to_cart_params.cart_redirect_after_add === 'yes') {
            window.location = wc_add_to_cart_params.cart_url;
          } else {
            // Không reload, chỉ cập nhật UI
            // Cart đã được cập nhật qua fragments
          }
        },
        error: function (xhr, status, error) {
          // Thử parse response nếu có
          let errorMsg = 'Error adding product to cart. Please try again.';
          try {
            const errorResponse = JSON.parse(xhr.responseText);
            if (errorResponse.message) {
              errorMsg = errorResponse.message;
            } else if (errorResponse.data && errorResponse.data.message) {
              errorMsg = errorResponse.data.message;
            }
          } catch (e) {
            // Use default error message
          }
          
          Popup.error('Error', errorMsg);
          $button.find('.productdetail_cart_button_txt').text('Add to cart');
          $button.removeClass('loading disabled');
        },
        dataType: 'json'
      });
    });

    }
    play() {
      this.tl.play();
    }
  }
  let productDetailHero = new ProductDetailHero();
  class CustomCakeHero extends TriggerSetupHero {
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
      this.tl = gsap.timeline({
        paused: true,
      });
      new MasterTimeline({
        timeline: this.tl,
        triggerInit: this.triggerEl,
        tweenArr: [
          new ScaleInset({ el: $('.customcake_content_img').get(0) }),
          new FadeIn({ el: $('.customcake_content_info_subtitle').get(0), type: 'bottom' }),
          new FadeSplitText({ el: $('.customcake_content_info_title').get(0), onMask: true }),
          ...Array.from($('.home_contact_form input, .home_contact_form textarea, .home_contact_form select')).flatMap(el => {
            return [
              new FadeIn({ el: $(el).get(0), type: 'bottom' }),
            ]
          }),
          new FadeIn({ el: $('.home_contact_form_upload').get(0), type: 'bottom' }),
          new FadeIn({ el: $('.home_hero_des_link').get(0), type: 'bottom' }),
        ]
      })
    }
    interact() {
      // Handle form submission
      $('.home_hero_des_link').on('click', (e) => {
        e.preventDefault();
        
        const $form = $('.home_contact_form');
        const $nameInput = $form.find('input[name="name"]');
        const $emailInput = $form.find('input[name="email"]');
        const $phoneInput = $form.find('input[name="phone"]');
        const $dateInput = $form.find('input[name="date"]');
        const $timeInput = $form.find('input[name="time"]');
        const $servingsInput = $form.find('input[name="servings"]');
        const $flavorSelect = $form.find('select[name="flavor"]');
        const $designTextarea = $form.find('textarea[name="design"]');
        const $fileInput = $form.find('input[name="file"]');
        
        // Get form values
        const name = $nameInput.val().trim();
        const email = $emailInput.val().trim();
        const phone = $phoneInput.val().trim();
        const date = $dateInput.val().trim();
        const time = $timeInput.val().trim();
        const servings = $servingsInput.val().trim();
        const flavor = $flavorSelect.val();
        const design = $designTextarea.val().trim();
        const file = $fileInput[0].files[0];
        
        // Remove previous error classes
        $nameInput.removeClass('error');
        $emailInput.removeClass('error');
        $phoneInput.removeClass('error');
        $dateInput.removeClass('error');
        $timeInput.removeClass('error');
        $servingsInput.removeClass('error');
        $flavorSelect.removeClass('error');
        $designTextarea.removeClass('error');
        
        // Validation - collect all errors
        const errors = [];
        let firstErrorField = null;
        
        // Validate name
        if (!name) {
          errors.push('Name is required.');
          $nameInput.addClass('error');
          if (!firstErrorField) firstErrorField = $nameInput;
        }
        
        // Validate email
        if (!email) {
          errors.push('Email is required.');
          $emailInput.addClass('error');
          if (!firstErrorField) firstErrorField = $emailInput;
        } else if (!this.isValidEmail(email)) {
          errors.push('Please enter a valid email address.');
          $emailInput.addClass('error');
          if (!firstErrorField) firstErrorField = $emailInput;
        }
        
        // Validate phone
        if (!phone) {
          errors.push('Phone is required.');
          $phoneInput.addClass('error');
          if (!firstErrorField) firstErrorField = $phoneInput;
        }
        
        // Validate date
        if (!date) {
          errors.push('Date Needed is required.');
          $dateInput.addClass('error');
          if (!firstErrorField) firstErrorField = $dateInput;
        }
        
        // Validate time
        if (!time) {
          errors.push('Time Needed is required.');
          $timeInput.addClass('error');
          if (!firstErrorField) firstErrorField = $timeInput;
        }
        
        // Validate servings
        if (!servings) {
          errors.push('Number of Servings is required.');
          $servingsInput.addClass('error');
          if (!firstErrorField) firstErrorField = $servingsInput;
        } else if (isNaN(servings) || parseInt(servings) <= 0) {
          errors.push('Number of Servings must be a positive number.');
          $servingsInput.addClass('error');
          if (!firstErrorField) firstErrorField = $servingsInput;
        }
        
        // Validate flavor
        if (!flavor) {
          errors.push('Cake Flavour + Filling is required.');
          $flavorSelect.addClass('error');
          if (!firstErrorField) firstErrorField = $flavorSelect;
        }
        
        // Validate design
        if (!design) {
          errors.push('Cake Design is required.');
          $designTextarea.addClass('error');
          if (!firstErrorField) firstErrorField = $designTextarea;
        }
        
        // Validate file if uploaded
        if (file) {
          // Check file type
          const allowedTypes = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif'];
          if (!allowedTypes.includes(file.type)) {
            errors.push('File must be PNG, JPG, or GIF format.');
          }
          // Check file size (5MB = 5 * 1024 * 1024 bytes)
          const maxSize = 5 * 1024 * 1024;
          if (file.size > maxSize) {
            errors.push('File size must be less than 5MB.');
          }
        }
        
        if (errors.length > 0) {
          // Focus on first error field
          if (firstErrorField) {
            firstErrorField.focus();
          }
          
          // Display all errors - format with line breaks
          const errorMessage = errors.map((error, index) => `${index + 1}. ${error}`).join('\n');
          if (window.Popup) {
            window.Popup.error('Validation Error', errorMessage);
          } else {
            alert(errorMessage);
          }
          return;
        }
        
        // If validation passes, submit the form
        console.log('Form is valid:', { name, email, phone, date, time, servings, flavor, design, file: file ? file.name : 'none' });
        
        // Find the form element and submit
        const $formElement = $form.closest('form');
        if ($formElement.length > 0) {
          $formElement.submit();
        } else {
          // If no form wrapper, you might need to handle submission via AJAX
          console.warn('No form element found. Form submission may need to be handled via AJAX.');
        }
      });
    }
    isValidEmail(email) {
      // Email validation regex
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    }
    play() {
      this.tl.play();
    }
  }
  let customCakeHero = new CustomCakeHero();
  class WorkshopHero extends TriggerSetupHero {
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
      console.log('setup khanhs');
      this.tl = gsap.timeline({
        paused: true,
      });
      new MasterTimeline({
        timeline: this.tl,
        triggerInit: this.triggerEl,
        tweenArr: [
          new FadeSplitText({ el: $('.workshop_content_title').get(0), onMask: true, breakType: 'chars' }),
          ...Array.from($('.workshop_content_list_card_item')).flatMap(el => {
            return [
              new ScaleInset({ el: $(el).find('.workshop_content_list_card_item_img').get(0) }),
              new FadeIn({ el: $(el).find('.workshop_content_list_card_item_info').get(0), type: 'bottom' }),
              new FadeSplitText({ el: $(el).find('.workshop_content_list_card_item_title').get(0), onMask: true }),
              new FadeSplitText({ el: $(el).find('.workshop_content_list_card_item_des').get(0), onMask: true }),
            ]
          }),
        ]
      })
    }
    play() {
      this.tl.play();
    }
  }
  let workshopHero = new WorkshopHero();
  class ContactHero extends TriggerSetupHero {
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
      this.tl = gsap.timeline({
        paused: true,
      });
      new MasterTimeline({
        timeline: this.tl,
        triggerInit: this.triggerEl,
        tweenArr: [
          new ScaleInset({ el: $('.contact_content_left').get(0) }),
          new FadeSplitText({ el: $('.contact_content_right_item_title').get(0), onMask: true }),
          new FadeSplitText({ el: $('.contact_content_right_item_des').get(0), onMask: true }),
          ...Array.from($('.contact_content_right_item_card')).flatMap(el => {
            return [
              new FadeIn({ el: $(el).find('.contact_content_right_item_card_label').get(0), type: 'bottom' }),
              new FadeIn({ el: $(el).find('.contact_content_right_item_card_des').get(0), type: 'bottom' }),
            ]
          }),
          new FadeIn({ el: $('.contact_content_right_item_social_label').get(0), type: 'bottom' }),
          new FadeIn({ el: $('.contact_content_right_item_social_content').get(0), type: 'bottom' }),
          new FadeIn({ el: $('.contact_content_right_item_work .contact_content_right_item_social_label').get(0), type: 'bottom' }),
          new FadeIn({ el: $('.contact_content_right_item_work_des').get(0), type: 'bottom' }),
          new FadeIn({ el: $('.contact_content_right_item:last-child').get(0), type: 'bottom' }),
        ]
      })
    }
    interact() {
      // Handle form submission
      $('.contact_content_right_item_form_button').on('click', (e) => {
        
        // Find Contact Form 7 form
        const $formContainer = $('.contact_content_right_item_form');
        const $cf7Form = $formContainer.find('form.wpcf7-form');
        
        if ($cf7Form.length === 0) {
          console.error('Contact Form 7 form not found');
          return;
        }
        
        // Find form inputs (CF7 might use different selectors)
        const $nameInput = $cf7Form.find('input[name*="name"], input[type="text"]').first();
        const $emailInput = $cf7Form.find('input[name*="email"], input[type="email"]').first();
        const $messageTextarea = $cf7Form.find('textarea[name*="message"], textarea').first();
        
        // Get form values
        const name = $nameInput.val().trim();
        const email = $emailInput.val().trim();
        const message = $messageTextarea.val().trim();
        
        // Remove previous error classes
        $nameInput.removeClass('error');
        $emailInput.removeClass('error');
        $messageTextarea.removeClass('error');
        
        // Validation - collect all errors
        const errors = [];
        let firstErrorField = null;
        
        // Validate name
        if (!name) {
          errors.push('Full name is required.');
          $nameInput.addClass('error');
          if (!firstErrorField) firstErrorField = $nameInput;
        }
        
        // Validate email
        if (!email) {
          errors.push('Email is required.');
          $emailInput.addClass('error');
          if (!firstErrorField) firstErrorField = $emailInput;
        } else if (!this.isValidEmail(email)) {
          errors.push('Please enter a valid email address.');
          $emailInput.addClass('error');
          if (!firstErrorField) firstErrorField = $emailInput;
        }
        
        if (errors.length > 0) {
          e.preventDefault();
          
          // Focus on first error field
          if (firstErrorField) {
            firstErrorField.focus();
          }
          
          // Display all errors - format with line breaks
          const errorMessage = errors.map((error, index) => `${index + 1}. ${error}`).join('\n');
          if (window.Popup) {
            window.Popup.error('Validation Error', errorMessage);
          } else {
            alert(errorMessage);
          }
          return;
        }
      });
    }
    isValidEmail(email) {
      // Email validation regex
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    }
    play() {
      this.tl.play();
    }
  }
  let contactHero = new ContactHero();
  class CheckoutHero extends TriggerSetupHero {
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
      this.tl = gsap.timeline({
        paused: true,
      });
    }
    interact() {
      // Copy transfer message to clipboard
      $('.message_transfer').on('click', function() {
        navigator.clipboard.writeText($('.message_transfer').text());
        $('.checkout_deli_bank_button').toggleClass('active');
        setTimeout(() => {
          $('.checkout_deli_bank_button').removeClass('active');
        }, 1000);
      });
      
      // Show/hide bank transfer info based on payment method
      $('input[name="payment_method"]').on('change', function() {
        const paymentMethod = $(this).val();
        if(paymentMethod === 'bank') {
          $('.checkout_deli_bank_content').slideDown();
        } else {
          $('.checkout_deli_bank_content').slideUp();
        }
      });
      
      // Handle form submission
      $('.checkout_deli form').on('submit', function(e) {
        e.preventDefault();
        
        const $form = $(this);
        const $submitBtn = $form.find('button[type="submit"]');
        
        // Get form values
        const name = $('#name').val().trim();
        const phone = $('#phone').val().trim();
        const email = $('#email').val().trim();
        const address = $('#address').val().trim();
        const note = $('#note').val().trim();
        const office_hours = $('#office_hours').is(':checked') ? 'yes' : '';
        const payment_method = $('input[name="payment_method"]:checked').val();
        
        // Validate form - all fields are required
        if (!name) {
          if (window.Popup) {
            window.Popup.error('Validation Error', 'Name is required.');
          } else {
            alert('Name is required.');
          }
          $('#name').focus();
          return;
        }
        
        if (!phone) {
          if (window.Popup) {
            window.Popup.error('Validation Error', 'Phone number is required.');
          } else {
            alert('Phone number is required.');
          }
          $('#phone').focus();
          return;
        }
        
        if (!email) {
          if (window.Popup) {
            window.Popup.error('Validation Error', 'Email is required.');
          } else {
            alert('Email is required.');
          }
          $('#email').focus();
          return;
        }
        
        // Validate email format
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
          if (window.Popup) {
            window.Popup.error('Validation Error', 'Please enter a valid email address.');
          } else {
            alert('Please enter a valid email address.');
          }
          $('#email').focus();
          return;
        }
        
        if (!address) {
          if (window.Popup) {
            window.Popup.error('Validation Error', 'Address is required.');
          } else {
            alert('Address is required.');
          }
          $('#address').focus();
          return;
        }
        
        // Validate cart is not empty
        if (typeof wc_add_to_cart_params === 'undefined' || !wc_add_to_cart_params.ajax_url) {
          if (window.Popup) {
            window.Popup.error('Error', 'WooCommerce is not properly configured.');
          } else {
            alert('WooCommerce is not properly configured.');
          }
          return;
        }
        
        // Disable submit button
        $submitBtn.prop('disabled', true).addClass('loading');
        const originalText = $submitBtn.find('.btn_txt').first().text();
        $submitBtn.find('.btn_txt').text('Processing...');
        
        // Submit order via AJAX
        $.ajax({
          type: 'POST',
          url: wc_add_to_cart_params.ajax_url,
          data: {
            action: 'custom_create_order',
            name: name,
            phone: phone,
            email: email,
            address: address,
            note: note,
            office_hours: office_hours,
            payment_method: payment_method
          },
          success: function(response) {
            if (response.success && response.data) {
              // Show success message
              if (window.Popup) {
                window.Popup.success('Success', 'Order created successfully! Redirecting...', {
                  autoClose: 1500,
                  onConfirm: function() {
                    // Redirect to thank you page
                    if (response.data.redirect_url) {
                      window.location.href = response.data.redirect_url;
                    } else {
                      window.location.href = '/';
                    }
                  }
                });
                // Auto redirect after popup closes
                setTimeout(() => {
                  if (response.data.redirect_url) {
                    window.location.href = response.data.redirect_url;
                  } else {
                    window.location.href = wc_add_to_cart_params.cart_url || home_url;
                  }
                }, 2000);
              } else {
                alert('Order created successfully!');
                if (response.data.redirect_url) {
                  window.location.href = response.data.redirect_url;
                }
              }
            } else {
              // Show error message
              const errorMsg = response.data?.message || 'Failed to create order. Please try again.';
              if (window.Popup) {
                window.Popup.error('Error', errorMsg);
              } else {
                alert(errorMsg);
              }
              
              // Re-enable submit button
              $submitBtn.prop('disabled', false).removeClass('loading');
              $submitBtn.find('.btn_txt').text(originalText);
            }
          },
          error: function(xhr, status, error) {
            let errorMsg = 'Error creating order. Please try again.';
            try {
              const errorResponse = JSON.parse(xhr.responseText);
              if (errorResponse.data && errorResponse.data.message) {
                errorMsg = errorResponse.data.message;
              }
            } catch (e) {
              // Use default error message
            }
            
            if (window.Popup) {
              window.Popup.error('Error', errorMsg);
            } else {
              alert(errorMsg);
            }
            
            // Re-enable submit button
            $submitBtn.prop('disabled', false).removeClass('loading');
            $submitBtn.find('.btn_txt').text(originalText);
          },
          dataType: 'json'
        });
      });
    }
    play() {
      this.tl.play();
    }
  }
  const checkoutHero = new CheckoutHero();
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
      ourStoryAbout.trigger();
      homeCourse.trigger();
      return;
    },
    productDetailScript: () => {
      productDetailHero.trigger();
      return;
    },
    checkoutScript: () => {
      checkoutHero.trigger();
      return;
    },
    workshopScript: () => {
      workshopHero.trigger();
      return;
    },
    contactScript: () => {
      contactHero.trigger();
      return;
    },
    customCakeScript: () => {
      customCakeHero.trigger();
      return;
    },
  };
  // Helper function to update cart UI (global scope để có thể dùng từ add to cart)
  /**
   * Global function để refresh cart content từ server
   * Có thể được gọi từ bất kỳ đâu sau khi add/update/remove cart
   */
  window.refreshCartContent = function() {
    console.log('refreshCartContent called');
    if (typeof wc_add_to_cart_params === 'undefined') {
      console.warn('WooCommerce params not available');
      return;
    }

    $.ajax({
      type: 'POST',
      url: wc_add_to_cart_params.ajax_url,
      data: {
        action: 'get_cart_content'
      },
      success: function(response) {
        console.log('Cart refresh response:', response);
        if (response.success && response.data) {
          const data = response.data;
          console.log('Cart data:', {
            cart_content_length: data.cart_content ? data.cart_content.length : 0,
            cart_count: data.cart_count,
            has_cart_content: !!data.cart_content
          });
          
          // Update cart count
          if (data.cart_count_text !== undefined) {
            $('.header_icon_item_num .cart-count').text(data.cart_count_text);
          }
          
          // Update cart title
          if (data.cart_title) {
            $('.menu_cart_title').html(data.cart_title);
          }
          
          // Update cart content - QUAN TRỌNG NHẤT
          if (data.cart_content) {
            const $cartContent = $('.menu_cart_content');
            if ($cartContent.length) {
              console.log('Updating cart content with:', data.cart_content.substring(0, 100) + '...');
              $cartContent.html(data.cart_content);
              // Trigger event để các handler khác biết cart đã được update
              $(document.body).trigger('cart_content_refreshed');
            } else {
              console.warn('Cart content element not found: .menu_cart_content');
            }
          } else {
            console.warn('No cart_content in response data');
          }
          
          // Update cart totals
          if (data.cart_total_txt) {
            $('.menu_cart_button_total_txt').html(data.cart_total_txt);
          }
          if (data.cart_total_price) {
            $('.menu_cart_button_total_price').html(data.cart_total_price);
          }
          
          // Update checkout button
          if (data.checkout_button) {
            const $checkoutBtn = $('.menu_cart_button_check');
            if ($checkoutBtn.length === 0) {
              $('.menu_cart_button_total').after(data.checkout_button);
            } else {
              $checkoutBtn.replaceWith(data.checkout_button);
            }
          } else {
            // Remove checkout button if cart is empty
            $('.menu_cart_button_check').remove();
          }
          
          // Trigger WooCommerce event
          $(document.body).trigger('updated_cart_totals', [data]);
        }
      },
      error: function(xhr, status, error) {
        console.error('Error refreshing cart:', error, xhr.responseText);
      }
    });
  };

  // Refresh cart khi mở cart menu
  $(document).on('click', '.header_icon_item_wrap.cart, .cart', function() {
    console.log('Cart icon clicked, refreshing cart content...');
    // Delay một chút để đảm bảo cart menu đã được mở
    setTimeout(function() {
      if (typeof window.refreshCartContent === 'function') {
        window.refreshCartContent();
      }
    }, 200);
  });

  // Observer để detect khi cart menu được mở (khi class active được thêm vào)
  $(document).ready(function() {
    if (typeof MutationObserver !== 'undefined') {
      const $menuCart = $('.menu_cart');
      if ($menuCart.length) {
        const cartObserver = new MutationObserver(function(mutations) {
          mutations.forEach(function(mutation) {
            if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
              const target = mutation.target;
              if ($(target).hasClass('menu_cart') && $(target).hasClass('active')) {
                // Chỉ refresh nếu chưa refresh gần đây (tránh refresh nhiều lần)
                if (!$(target).data('refreshing')) {
                  $(target).data('refreshing', true);
                  console.log('Cart menu opened, refreshing content...');
                  if (typeof window.refreshCartContent === 'function') {
                    window.refreshCartContent();
                  }
                  // Reset flag sau 500ms
                  setTimeout(function() {
                    $(target).data('refreshing', false);
                  }, 500);
                }
              }
            }
          });
        });

        cartObserver.observe($menuCart[0], {
          attributes: true,
          attributeFilter: ['class']
        });
      }
    }
  });

  function updateCartUI(fragments, cartHash) {
      if (!fragments) return;

      // Update cart count in header - use .text() instead of .html() for better reliability
      if (fragments['.header_icon_item_num .cart-count']) {
        const $cartCount = $('.header_icon_item_num .cart-count');
        if ($cartCount.length) {
          // Extract just the number from the fragment (in case it has HTML)
          const countText = $(fragments['.header_icon_item_num .cart-count']).text() || fragments['.header_icon_item_num .cart-count'];
          $cartCount.text(countText);
        }
      }

      if (fragments['.menu_cart_title']) {
        $('.menu_cart_title').html(fragments['.menu_cart_title']);
      }
      if (fragments['.menu_cart_button_total_txt']) {
        $('.menu_cart_button_total_txt').html(fragments['.menu_cart_button_total_txt']);
      }
      if (fragments['.menu_cart_button_total_price']) {
        $('.menu_cart_button_total_price').html(fragments['.menu_cart_button_total_price']);
      }
      if (fragments['.menu_cart_content']) {
        const $cartContent = $('.menu_cart_content');
        if ($cartContent.length) {
          // Clear existing content first to ensure clean update
          $cartContent.empty();
          // Append new content - fragment contains the HTML for cart items
          $cartContent.html(fragments['.menu_cart_content']);
          
          // Re-initialize cart interactions after content update
          // This ensures event handlers are attached to new elements
          if (typeof initCartInteractions === 'function') {
            // Note: initCartInteractions uses event delegation, so it should work
            // But we trigger a custom event to ensure any dependent code runs
            $(document.body).trigger('menu_cart_content_updated');
          }
        }
      }
      if (fragments['.menu_cart_button_check']) {
        const $checkoutBtn = $('.menu_cart_button_check');
        if (fragments['.menu_cart_button_check'] === '') {
          $checkoutBtn.remove();
        } else {
          if ($checkoutBtn.length === 0) {
            $('.menu_cart_button_total').after(fragments['.menu_cart_button_check']);
          } else {
            // Update existing button if it exists
            $checkoutBtn.replaceWith(fragments['.menu_cart_button_check']);
          }
        }
      }
    }

  // Cart interactions
  function initCartInteractions() {
    // Debounce timers and pending quantities for each cart item
    const debounceTimers = {};
    const pendingQuantities = {}; // Store the latest pending quantity for each item
    const initialQuantities = {}; // Store initial quantity before any changes
    const isAjaxRunning = {}; // Track if AJAX request is currently running
    
    // Debounce helper function - chỉ debounce AJAX, không debounce UI update
    function debounceAjaxCall(cartItemKey, ajaxFn, delay = 300) {
      // Clear existing timer for this cart item
      if (debounceTimers[cartItemKey]) {
        clearTimeout(debounceTimers[cartItemKey]);
      }
      
      // Set new timer - chỉ gọi AJAX sau khi delay
      debounceTimers[cartItemKey] = setTimeout(() => {
        delete debounceTimers[cartItemKey];
        ajaxFn();
      }, delay);
    }
    
    // Update quantity
    $(document).on('click', '.menu_cart_content_item_info_amount_reduce, .menu_cart_content_item_info_amount_increate', function(e) {
      e.preventDefault();
      const $button = $(this);
      const $cartItem = $button.closest('.menu_cart_content_item');
      const cartItemKey = $button.data('cart-item-key');
      const action = $button.data('action');
      const $quantityEl = $cartItem.find('.menu_cart_content_item_info_amount_txt');
      
      // Prevent action nếu AJAX đang chạy (không phải đang debounce)
      if (isAjaxRunning[cartItemKey]) {
        return;
      }
      
      // Get current quantity - ưu tiên lấy từ pending quantity (đã update trong lần click trước)
      // Nếu không có, lấy từ DOM
      let currentQty;
      if (pendingQuantities[cartItemKey] !== undefined) {
        currentQty = pendingQuantities[cartItemKey];
      } else {
        currentQty = parseInt($quantityEl.attr('data-quantity')) || parseInt($quantityEl.text().trim()) || 1;
        initialQuantities[cartItemKey] = currentQty; // Lưu giá trị ban đầu cho lần click đầu tiên
      }
      
      // Calculate new quantity
      if (action === 'increase') {
        currentQty++;
      } else if (action === 'decrease' && currentQty > 1) {
        currentQty--;
      } else {
        return; // Không thể giảm xuống dưới 1
      }

      // Lưu pending quantity (giá trị mới nhất sẽ được gửi lên server)
      pendingQuantities[cartItemKey] = currentQty;
      
      // UI UPDATE NGAY LẬP TỨC - không cần chờ
      $quantityEl.text(currentQty).attr('data-quantity', currentQty);

      // Debounce AJAX call - chỉ gửi request sau 300ms không có click mới
      debounceAjaxCall(cartItemKey, function() {
        const finalQty = pendingQuantities[cartItemKey] || currentQty;
        const originalQty = initialQuantities[cartItemKey] || finalQty;
        
        // Mark AJAX as running
        isAjaxRunning[cartItemKey] = true;
        
        // Disable buttons khi AJAX đang chạy
        $cartItem.find('.menu_cart_content_item_info_amount_reduce, .menu_cart_content_item_info_amount_increate').addClass('disabled');
        
        // Update via AJAX
        if (typeof wc_add_to_cart_params !== 'undefined') {
          $.ajax({
            type: 'POST',
            url: wc_add_to_cart_params.ajax_url,
            data: {
              action: 'custom_update_cart_quantity',
              cart_item_key: cartItemKey,
              quantity: finalQty
            },
            success: function(response) {
              // Mark AJAX as done
              isAjaxRunning[cartItemKey] = false;
              
              if (response.success && response.data) {
                // Gọi refreshCartContent để đảm bảo cart được render đầy đủ
                if (typeof window.refreshCartContent === 'function') {
                  window.refreshCartContent();
                } else if (response.data.fragments) {
                  // Fallback: sử dụng fragments
                  updateCartUI(response.data.fragments, response.data.cart_hash);
                }
                
                // Update initial quantity for next operation
                initialQuantities[cartItemKey] = finalQty;
                delete pendingQuantities[cartItemKey];
              } else {
                // On error, restore original quantity
                $quantityEl.text(originalQty).attr('data-quantity', originalQty);
                window.Popup.error('Error', response.data?.message || 'Error updating quantity. Please try again.');
                initialQuantities[cartItemKey] = originalQty;
                delete pendingQuantities[cartItemKey];
              }
              
              // Re-enable buttons
              $cartItem.find('.menu_cart_content_item_info_amount_reduce, .menu_cart_content_item_info_amount_increate').removeClass('disabled');
            },
            error: function() {
              // Mark AJAX as done
              isAjaxRunning[cartItemKey] = false;
              
              // On error, restore original quantity
              $quantityEl.text(originalQty).attr('data-quantity', originalQty);
              window.Popup.error('Error', 'Error updating quantity. Please try again.');
              $cartItem.find('.menu_cart_content_item_info_amount_reduce, .menu_cart_content_item_info_amount_increate').removeClass('disabled');
              initialQuantities[cartItemKey] = originalQty;
              delete pendingQuantities[cartItemKey];
            },
            dataType: 'json'
          });
        } else {
          // Fallback: reload page
          location.reload();
        }
      }, 300); // 300ms debounce delay cho AJAX
    });

    // Remove item
    $(document).on('click', '.menu_cart_content_item_remove', function(e) {
      e.preventDefault();
      const $button = $(this);
      const $cartItem = $button.closest('.menu_cart_content_item');
      const cartItemKey = $button.data('cart-item-key');
      
      // Show confirm popup
      window.Popup.confirm(
        'Remove Item',
        'Are you sure you want to remove this item from cart?',
        {
          confirmText: 'Remove',
          cancelText: 'Cancel',
          onConfirm: function() {
            $button.addClass('disabled');
            
            // Animate item removal
            $cartItem.addClass('removing');
            $cartItem.css({
              'opacity': '0',
              'transform': 'translateX(100px)',
              'transition': 'all 0.3s ease'
            });

            if (typeof wc_add_to_cart_params !== 'undefined') {
              // Use custom AJAX handler instead of WooCommerce endpoint
              const removeUrl = wc_add_to_cart_params.ajax_url;
              
              console.log('Removing cart item:', cartItemKey);
              console.log('Remove URL:', removeUrl);
              
              $.ajax({
                type: 'POST',
                url: removeUrl,
                data: {
                  action: 'custom_remove_from_cart',
                  cart_item_key: cartItemKey,
                  nonce: wc_add_to_cart_params.custom_add_to_cart_nonce || ''
                },
                success: function(response) {
                  console.log('Remove from cart response:', response);
                  
                  // Custom handler returns {success: true/false, data: {fragments: {...}, cart_hash: '...'}}
                  if (!response.success) {
                    // Restore item on error
                    $cartItem.css({
                      'opacity': '1',
                      'transform': 'translateX(0)'
                    }).removeClass('removing');
                    $button.removeClass('disabled');
                    
                    const errorMsg = response.data?.message || 'Failed to remove item from cart. Please try again.';
                    window.Popup.error('Error', errorMsg);
                    return;
                  }
                  
                  // Remove element from DOM immediately after animation
                  setTimeout(() => {
                    $cartItem.remove();
                    
                    // Gọi refreshCartContent để đảm bảo cart được render đầy đủ
                    if (typeof window.refreshCartContent === 'function') {
                      window.refreshCartContent();
                    } else if (response.data && response.data.fragments) {
                      // Fallback: sử dụng fragments
                      if (typeof updateCartUI === 'function') {
                        updateCartUI(response.data.fragments, response.data.cart_hash);
                      } else {
                        // Fallback: update manually
                        if (response.data.fragments['.header_icon_item_num .cart-count']) {
                          $('.header_icon_item_num .cart-count').text(response.data.fragments['.header_icon_item_num .cart-count']);
                        }
                        if (response.data.fragments['.menu_cart_title']) {
                          $('.menu_cart_title').html(response.data.fragments['.menu_cart_title']);
                        }
                        if (response.data.fragments['.menu_cart_content']) {
                          $('.menu_cart_content').html(response.data.fragments['.menu_cart_content']);
                        }
                        if (response.data.fragments['.menu_cart_button_total_txt']) {
                          $('.menu_cart_button_total_txt').html(response.data.fragments['.menu_cart_button_total_txt']);
                        }
                        if (response.data.fragments['.menu_cart_button_total_price']) {
                          $('.menu_cart_button_total_price').html(response.data.fragments['.menu_cart_button_total_price']);
                        }
                        if (response.data.fragments['.menu_cart_button_check']) {
                          const $checkoutBtn = $('.menu_cart_button_check');
                          if (response.data.fragments['.menu_cart_button_check'] === '') {
                            $checkoutBtn.remove();
                          } else {
                            if ($checkoutBtn.length === 0) {
                              $('.menu_cart_button_total').after(response.data.fragments['.menu_cart_button_check']);
                            } else {
                              $checkoutBtn.replaceWith(response.data.fragments['.menu_cart_button_check']);
                            }
                          }
                        }
                      }
                    }
                    
                    // Fallback: Update cart count directly if fragments don't work
                    if (response.data && response.data.cart_count !== undefined) {
                      $('.header_icon_item_num .cart-count').text(response.data.cart_count);
                    }
                    
                    // Trigger event
                    $(document.body).trigger('removed_from_cart', [response.data?.fragments || {}, response.data?.cart_hash || '', $button]);
                    
                    // Show success message
                    window.Popup.success('Success', 'Item removed from cart', { autoClose: 2000 });
                  }, 300);
                },
                error: function(xhr, status, error) {
                  console.error('Remove from cart error:', xhr, status, error);
                  
                  // Restore item on error
                  $cartItem.css({
                    'opacity': '1',
                    'transform': 'translateX(0)'
                  }).removeClass('removing');
                  $button.removeClass('disabled');
                  
                  // Try to parse error message
                  let errorMsg = 'Error removing item. Please try again.';
                  try {
                    const errorResponse = JSON.parse(xhr.responseText);
                    if (errorResponse.message) {
                      errorMsg = errorResponse.message;
                    } else if (errorResponse.data && errorResponse.data.message) {
                      errorMsg = errorResponse.data.message;
                    }
                  } catch (e) {
                    // Use default error message
                  }
                  
                  window.Popup.error('Error', errorMsg);
                },
                dataType: 'json'
              });
            } else {
              // Fallback: reload page
              location.reload();
            }
          },
          onCancel: function() {
            // Do nothing on cancel
          }
        }
      );
    });

    // Listen for cart updates from WooCommerce (no reload)
    $(document.body).on('added_to_cart updated_cart_totals removed_from_cart', function(event, fragments, cart_hash) {
      if (fragments) {
        updateCartUI(fragments, cart_hash);
      }
    });
  }

  function animationGlobal() {
    cursor.init();
    header.trigger();
    footer.trigger();
    initCartInteractions();
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

