document.querySelectorAll('input[name="size"]').forEach(input => {
    input.addEventListener('change', function() {
        document.getElementById('sizeDisplay').textContent = this.value;
    });
});

// Xử lý cho Cake Flavour
document.querySelectorAll('input[name="flavor"]').forEach(input => {
    input.addEventListener('change', function() {
        document.getElementById('flavorDisplay').textContent = this.value;
    });
});
var swiper1 = new Swiper(".home_seller_silder", {
        slidesPerView: 1.5,
        spaceBetween: parseRem(10),
        loop: true,
        // pagination: {
        //   el: ".home_seller_pagination",
        //   type: "progressbar",
        // },
        speed: 4000,
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
            slidesPerView: 4.3,
            spaceBetween: parseRem(20),
          },
        },
      });