<?php
    /**
     * Template Name: HomePage
     * Description:
     *
     * Tip:
     *
     * @package WordPress
     * @subpackage chloe_pallete
     * @since chloe_pallete 1.0
     */

    get_header();
    wp_enqueue_style('home-css', get_template_directory_uri() . '/css/home.css');
    wp_enqueue_script('home-js', get_template_directory_uri() . '/js/home.js');

?>
    <div class='main' data-barba-namespace="home">
      <section class="home_hero">
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="home_hero_img img_fullfill">
                <img src="<?php echo get_template_directory_uri(); ?>/images/home_hero.webp" />
              </div>
              <div class="home_hero_des">
                <div
                  class="home_hero_des_subtitle block_title color_white txt_subtitle"
                >
                  ChloesPalette
                </div>
                <div class="home_hero_des_title color_white txt_72">
                  Make your birthday sweeter with a cake full of love!
                </div>
                <a href="#" class="btn_black btn home_hero_des_link txt_uppercase">
                  <div class="btn_txt_wrap">
                    <div class="btn_txt home_hero_des_link_txt txt_16">order now</div>
                    <div class="btn_txt home_hero_des_link_txt txt_16">order now</div>
                  </div>
                  <div class="btn_ic_wrap">
                    <div class="btn_ic home_hero_des_link_icon img_full">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-right.svg" alt="" />
                    </div>
                    <div class="btn_ic home_hero_des_link_icon img_full">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-right.svg" alt="" />
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="home_hero_img img_fullfill">
                <img src="<?php echo get_template_directory_uri(); ?>/images/home_hero.webp" />
              </div>
              <div class="home_hero_des">
                <div
                  class="home_hero_des_subtitle block_title color_white txt_subtitle"
                >
                  ChloesPalette
                </div>
                <div class="home_hero_des_title color_white txt_72">
                  Make your birthday sweeter with a cake full of love!
                </div>
                <a href="#" class="home_hero_des_link txt_uppercase">
                  <div class="home_hero_des_link_txt txt_16">order now</div>
                  <div class="home_hero_des_link_icon img_full">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-right.svg" alt="" />
                  </div>
                </a>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="home_hero_img img_fullfill">
                <img src="<?php echo get_template_directory_uri(); ?>/images/home_hero.webp" />
              </div>
              <div class="home_hero_des">
                <div
                  class="home_hero_des_subtitle block_title color_white txt_subtitle"
                >
                  ChloesPalette
                </div>
                <div class="home_hero_des_title color_white txt_72">
                  Make your birthday sweeter with a cake full of love!
                </div>
                <a href="#" class="home_hero_des_link">
                  <div class="home_hero_des_link_txt txt_uppercase txt_16">
                    order now
                  </div>
                  <div class="home_hero_des_link_icon img_full">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-right.svg" alt="" />
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="swiper-pagination home_hero_pagination"></div>
        </div>
      </section>
      <section class="home_seller overflow_hidden">
        <div class="kl_container">
          <div class="home_seller_inner">
            <div class="home_seller_content">
              <div
                class="home_seller_content_subtitle txt_subtitle txt_uppercase block_title"
              >
                best sellers
              </div>
              <div class="home_seller_content_title txt_title">
                Featured Products
              </div>
            </div>
            <div class="home_seller_category">
              <div
                class="home_seller_category_item txt_uppercase txt_14 txt_wh_500 block_title"
              >
                All
              </div>
              <div
                class="home_seller_category_item txt_uppercase txt_14 txt_wh_500"
              >
                Chantilly Cake
              </div>
              <div
                class="home_seller_category_item txt_uppercase txt_14 txt_wh_500"
              >
                Vintage Cake
              </div>
              <div
                class="home_seller_category_item txt_uppercase txt_14 txt_wh_500"
              >
                Kid Cake
              </div>
              <div
                class="home_seller_category_item txt_uppercase txt_14 txt_wh_500"
              >
                Wedding Cake
              </div>
              <div
                class="home_seller_category_item txt_uppercase txt_14 txt_wh_500"
              >
                Flower Cake
              </div>
            </div>
          </div>
          <div class="home_seller_silder swiper">
            <div class="home_seller_silder_wrap swiper-wrapper">
              <div class="home_seller_silder_item swiper-slide">
                <div class="home_seller_silder_item_top">
                  <div
                    class="home_seller_silder_item_top_type txt_uppercase txt_12"
                  >
                    Chantilly Cake
                  </div>
                  <div
                    class="home_seller_silder_item_top_soldout txt_uppercase txt_12 active"
                  >
                    SOLD OUT
                  </div>
                </div>
                <div class="home_seller_silder_item_img img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/image_cake.jpg" alt="" />
                </div>
                <div class="home_seller_silder_item_info">
                  <div class="home_seller_silder_item_info_title txt_subtitle">
                    Butter Croissant
                  </div>
                  <div
                    class="home_seller_silder_item_info_price txt_14 txt_wh_500"
                  >
                    <span>$160</span> - <span>$170</span>
                  </div>
                  <div class="home_seller_silder_item_info_cart_wrap">
                    <div class="home_seller_silder_item_info_cart img_full">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/cart.svg" alt="" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="home_seller_silder_item swiper-slide">
                <div class="home_seller_silder_item_top">
                  <div
                    class="home_seller_silder_item_top_type txt_uppercase txt_12"
                  >
                    Chantilly Cake
                  </div>
                  <div
                    class="home_seller_silder_item_top_soldout txt_uppercase txt_12"
                  >
                    SOLD OUT
                  </div>
                </div>
                <div class="home_seller_silder_item_img img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/image_cake.jpg" alt="" />
                </div>
                <div class="home_seller_silder_item_info">
                  <div class="home_seller_silder_item_info_title txt_subtitle">
                    Butter Croissant
                  </div>
                  <div
                    class="home_seller_silder_item_info_price txt_14 txt_wh_500"
                  >
                    <span>$160</span> - <span>$170</span>
                  </div>
                  <div class="home_seller_silder_item_info_cart_wrap">
                    <div class="home_seller_silder_item_info_cart img_full">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/cart.svg" alt="" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="home_seller_silder_item swiper-slide">
                <div class="home_seller_silder_item_top">
                  <div
                    class="home_seller_silder_item_top_type txt_uppercase txt_12"
                  >
                    Chantilly Cake
                  </div>
                  <div
                    class="home_seller_silder_item_top_soldout txt_uppercase txt_12"
                  >
                    SOLD OUT
                  </div>
                </div>
                <div class="home_seller_silder_item_img img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/image_cake.jpg" alt="" />
                </div>
                <div class="home_seller_silder_item_info">
                  <div class="home_seller_silder_item_info_title txt_subtitle">
                    Butter Croissant
                  </div>
                  <div
                    class="home_seller_silder_item_info_price txt_14 txt_wh_500"
                  >
                    <span>$160</span> - <span>$170</span>
                  </div>
                  <div class="home_seller_silder_item_info_cart_wrap">
                    <div class="home_seller_silder_item_info_cart img_full">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/cart.svg" alt="" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="home_seller_silder_item swiper-slide">
                <div class="home_seller_silder_item_top">
                  <div
                    class="home_seller_silder_item_top_type txt_uppercase txt_12"
                  >
                    Chantilly Cake
                  </div>
                  <div
                    class="home_seller_silder_item_top_soldout txt_uppercase txt_12"
                  >
                    SOLD OUT
                  </div>
                </div>
                <div class="home_seller_silder_item_img img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/image_cake.jpg" alt="" />
                </div>
                <div class="home_seller_silder_item_info">
                  <div class="home_seller_silder_item_info_title txt_subtitle">
                    Butter Croissant
                  </div>
                  <div
                    class="home_seller_silder_item_info_price txt_14 txt_wh_500"
                  >
                    <span>$160</span> - <span>$170</span>
                  </div>
                  <div class="home_seller_silder_item_info_cart_wrap">
                    <div class="home_seller_silder_item_info_cart img_full">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/cart.svg" alt="" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="home_seller_silder_item swiper-slide">
                <div class="home_seller_silder_item_top">
                  <div
                    class="home_seller_silder_item_top_type txt_uppercase txt_12"
                  >
                    Chantilly Cake
                  </div>
                  <div
                    class="home_seller_silder_item_top_soldout txt_uppercase txt_12"
                  >
                    SOLD OUT
                  </div>
                </div>
                <div class="home_seller_silder_item_img img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/image_cake.jpg" alt="" />
                </div>
                <div class="home_seller_silder_item_info">
                  <div class="home_seller_silder_item_info_title txt_subtitle">
                    Butter Croissant
                  </div>
                  <div
                    class="home_seller_silder_item_info_price txt_14 txt_wh_500"
                  >
                    <span>$160</span> - <span>$170</span>
                  </div>
                  <div class="home_seller_silder_item_info_cart_wrap">
                    <div class="home_seller_silder_item_info_cart img_full">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/cart.svg" alt="" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="home_seller_silder_item swiper-slide">
                <div class="home_seller_silder_item_top">
                  <div
                    class="home_seller_silder_item_top_type txt_uppercase txt_12"
                  >
                    Chantilly Cake
                  </div>
                  <div
                    class="home_seller_silder_item_top_soldout txt_uppercase txt_12 active"
                  >
                    SOLD OUT
                  </div>
                </div>
                <div class="home_seller_silder_item_img img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/image_cake.jpg" alt="" />
                </div>
                <div class="home_seller_silder_item_info">
                  <div class="home_seller_silder_item_info_title txt_subtitle">
                    Butter Croissant
                  </div>
                  <div
                    class="home_seller_silder_item_info_price txt_14 txt_wh_500"
                  >
                    <span>$160</span> - <span>$170</span>
                  </div>
                  <div class="home_seller_silder_item_info_cart_wrap">
                    <div class="home_seller_silder_item_info_cart img_full">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/cart.svg" alt="" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="home_seller_silder_item swiper-slide">
                <div class="home_seller_silder_item_top">
                  <div
                    class="home_seller_silder_item_top_type txt_uppercase txt_12"
                  >
                    Chantilly Cake
                  </div>
                  <div
                    class="home_seller_silder_item_top_soldout txt_uppercase txt_12 active"
                  >
                    SOLD OUT
                  </div>
                </div>
                <div class="home_seller_silder_item_img img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/image_cake.jpg" alt="" />
                </div>
                <div class="home_seller_silder_item_info">
                  <div class="home_seller_silder_item_info_title txt_subtitle">
                    Butter Croissant
                  </div>
                  <div
                    class="home_seller_silder_item_info_price txt_14 txt_wh_500"
                  >
                    <span>$160</span> - <span>$170</span>
                  </div>
                  <div class="home_seller_silder_item_info_cart_wrap">
                    <div class="home_seller_silder_item_info_cart img_full">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/cart.svg" alt="" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="home_seller_silder_item swiper-slide">
                <div class="home_seller_silder_item_top">
                  <div
                    class="home_seller_silder_item_top_type txt_uppercase txt_12"
                  >
                    Chantilly Cake
                  </div>
                  <div
                    class="home_seller_silder_item_top_soldout txt_uppercase txt_12 active"
                  >
                    SOLD OUT
                  </div>
                </div>
                <div class="home_seller_silder_item_img img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/image_cake.jpg" alt="" />
                </div>
                <div class="home_seller_silder_item_info">
                  <div class="home_seller_silder_item_info_title txt_subtitle">
                    Butter Croissant
                  </div>
                  <div
                    class="home_seller_silder_item_info_price txt_14 txt_wh_500"
                  >
                    <span>$160</span> - <span>$170</span>
                  </div>
                  <div class="home_seller_silder_item_info_cart_wrap">
                    <div class="home_seller_silder_item_info_cart img_full">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/cart.svg" alt="" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-pagination home_seller_pagination"></div>
          </div>
        </div>
      </section>
      <section class="home_cookies" data-cursor="explore">
        <div class="home_cookies_overlay"></div>
        <div class="home_cookies_bg">
          <div class="home_cookies_bg_inner">
          <div class="home_cookies_bg_item">
            <div class="home_cookies_bg_item_inner img_fullfill">
              <img src="<?php echo get_template_directory_uri(); ?>/images/home_cookies_bg.webp" alt="">
            </div>
            <div class="home_cookies_bg_item_info">
              <div class="home_cookies_bg_item_info_title_wrap">
                <div class="home_cookies_bg_item_info_title txt_48">Wedding Cake</div>
              </div>
              <a href="#" class="home_cookies_bg_item_info_link txt_16 hover_arr">
                Explore
                <div class="line_arr">
                  <div class="line line_main"></div>
                  <div class="line line_clone"></div>
                </div>
              </a>
            </div>
          </div>
          <div class="home_cookies_bg_item">
            <div class="home_cookies_bg_item_inner img_fullfill">
              <img src="<?php echo get_template_directory_uri(); ?>/images/home_cookies_bg2.webp" alt="">
            </div>
            <div class="home_cookies_bg_item_info">
              <div class="home_cookies_bg_item_info_title_wrap">
                <div class="home_cookies_bg_item_info_title txt_48">Kid Cake</div>
              </div>
              <a href="#" class="home_cookies_bg_item_info_link txt_16 hover_arr">
                Explore
                <div class="line_arr">
                  <div class="line line_main"></div>
                  <div class="line line_clone"></div>
                </div>
              </a>
            </div>
          </div>
          <div class="home_cookies_bg_item">
            <div class="home_cookies_bg_item_inner img_fullfill">
              <img src="<?php echo get_template_directory_uri(); ?>/images/home_cookies_bg.webp" alt="">
            </div>
            <div class="home_cookies_bg_item_info">
              <div class="home_cookies_bg_item_info_title_wrap">
                <div class="home_cookies_bg_item_info_title txt_48">Chantilly Cake</div>
              </div>
              <a href="#" class="home_cookies_bg_item_info_link txt_16 hover_arr">
                Explore
                <div class="line_arr">
                  <div class="line line_main"></div>
                  <div class="line line_clone"></div>
                </div>
              </a>
            </div>
          </div>
          <div class="home_cookies_bg_item">
            <div class="home_cookies_bg_item_inner img_fullfill">
              <img src="<?php echo get_template_directory_uri(); ?>/images/home_cookies_bg2.webp" alt="">
            </div>
            <div class="home_cookies_bg_item_info">
              <div class="home_cookies_bg_item_info_title_wrap">
                <div class="home_cookies_bg_item_info_title txt_48">Vintage Cake</div>
              </div>
              <a href="#" class="home_cookies_bg_item_info_link txt_16 hover_arr">
                Explore
                <div class="line_arr">
                  <div class="line line_main"></div>
                  <div class="line line_clone"></div>
                </div>
              </a>
            </div>
          </div>
          <div class="home_cookies_bg_item">
            <div class="home_cookies_bg_item_inner img_fullfill">
              <img src="<?php echo get_template_directory_uri(); ?>/images/home_cookies_bg.webp" alt="">
            </div>
            <div class="home_cookies_bg_item_info">
              <div class="home_cookies_bg_item_info_title_wrap">
                <div class="home_cookies_bg_item_info_title txt_48">Flower Cake</div>
              </div>
              <a href="#" class="home_cookies_bg_item_info_link txt_16 hover_arr">
                Explore
                <div class="line_arr">
                  <div class="line line_main"></div>
                  <div class="line line_clone"></div>
                </div>
              </a>
            </div>
          </div>
          </div>
        </div>
        <div class="home_cookies_content">
          <div class="kl_container">
            <div class="home_cookies_content_inner">
              <div class="home_cookies_content_item active">
                <div class="home_cookies_content_item_label txt_20">(01)</div>
                <div class="home_cookies_content_item_title txt_48">Wedding Cake</div>
              </div>
              <div class="home_cookies_content_item">
                <div class="home_cookies_content_item_label txt_20">(02)</div>
                <div class="home_cookies_content_item_title txt_48">Kid Cake</div>
              </div>
              <div class="home_cookies_content_item">
                <div class="home_cookies_content_item_label txt_20">(03)</div>
                <div class="home_cookies_content_item_title txt_48">Chantilly Cake</div>
              </div>
              <div class="home_cookies_content_item">
                <div class="home_cookies_content_item_label txt_20">(04)</div>
                <div class="home_cookies_content_item_title txt_48">Vintage Cake</div>
              </div>
              <div class="home_cookies_content_item">
                <div class="home_cookies_content_item_label txt_20">(05)</div>
                <div class="home_cookies_content_item_title txt_48">Flower Cake</div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="home_about overflow_hidden">
        <div class="kl_container">
          <div class="home_about_content">
            <div
              class="home_about_content_subtitle txt_center txt_subtitle block_title"
            >
              About chloes palette cakes
            </div>
            <div class="home_about_content_title txt_title txt_center">
              Where every cake becomes a work of art.
            </div>
          </div>
          <div class="home_about_inner">
            <div class="home_about_item">
              <div class="home_about_item_des txt_16">
                <p>
                  “Welcome to Chloes Palette Cakes where each cake is not just a
                  sweet treat, but a story crafted with inspiration, dedication, and
                  love.”
                </p>
                <p>
                  At Chloes Palette Cakes, we believe the perfect birthday cake lies
                  in the harmony of delicate flavors, unique aesthetics, and honest
                  emotion. Whether you dream of a pastel minimalist cake or an
                  elaborate themed design, our skilled team brings your vision to
                  life.
                </p>
              </div>
              <div class="home_about_item_border"></div>
            </div>
            <div class="home_about_item img_full">
              <div class="home_about_item_inner">
                <img src="<?php echo get_template_directory_uri(); ?>/images/home_about.webp" alt="" />
              </div>
            </div>
            <div class="home_about_item">
              <div class="home_about_item_des txt_16">
                <p>
                  We pour our hearts into every recipe, blending creativity with
                  love to make cakes that are as meaningful as they are beautiful.
                  From birthdays to weddings, each creation is a celebration of
                  happiness, made to bring smiles and sweet memories to every table.
                </p>
              </div>
              <a href="#" class="home_about_item_link">
                <div class="home_about_item_link_txt txt_uppercase txt_16">
                  Read more
                </div>
                <div class="home_hero_des_link_icon img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-right.svg" alt="" />
                </div>
              </a>
              <div class="home_about_item_border"></div>
            </div>
          </div>
        </div>
        <div class="kl_container">
          <div class="home_about_slide swiper">
            <div class="home_about_slide_wrap swiper-wrapper">
              <div class="home_about_slide_item swiper-slide">
                <div class="home_about_slide_item_img img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/home_about_slide.webp" alt="" />
                </div>
                <div class="home_about_slide_item_info">
                  <div class="home_about_slide_item_info_title txt_24">
                    Kid Cake
                  </div>
                  <div class="home_about_slide_item_info_des txt_14">
                    Making every birthday unforgettable!
                  </div>
                  <a href="#" class="home_about_slide_item_info_icon img_full">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Icon_right.svg" alt="" />
                  </a>
                </div>
              </div>
              <div class="home_about_slide_item swiper-slide">
                <div class="home_about_slide_item_img img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/home_about_slide.webp" alt="" />
                </div>
                <div class="home_about_slide_item_info">
                  <div class="home_about_slide_item_info_title txt_24">
                    Kid Cake
                  </div>
                  <div class="home_about_slide_item_info_des txt_14">
                    Making every birthday unforgettable!
                  </div>
                  <a href="#" class="home_about_slide_item_info_icon img_full">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Icon_right.svg" alt="" />
                  </a>
                </div>
              </div>
              <div class="home_about_slide_item swiper-slide">
                <div class="home_about_slide_item_img img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/home_about_slide.webp" alt="" />
                </div>
                <div class="home_about_slide_item_info">
                  <div class="home_about_slide_item_info_title txt_24">
                    Kid Cake
                  </div>
                  <div class="home_about_slide_item_info_des txt_14">
                    Making every birthday unforgettable!
                  </div>
                  <a href="#" class="home_about_slide_item_info_icon img_full">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Icon_right.svg" alt="" />
                  </a>
                </div>
              </div>
              <div class="home_about_slide_item swiper-slide">
                <div class="home_about_slide_item_img img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/home_about_slide.webp" alt="" />
                </div>
                <div class="home_about_slide_item_info">
                  <div class="home_about_slide_item_info_title txt_24">
                    Kid Cake
                  </div>
                  <div class="home_about_slide_item_info_des txt_14">
                    Making every birthday unforgettable!
                  </div>
                  <a href="#" class="home_about_slide_item_info_icon img_full">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Icon_right.svg" alt="" />
                  </a>
                </div>
              </div>
              <div class="home_about_slide_item swiper-slide">
                <div class="home_about_slide_item_img img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/home_about_slide.webp" alt="" />
                </div>
                <div class="home_about_slide_item_info">
                  <div class="home_about_slide_item_info_title txt_24">
                    Kid Cake
                  </div>
                  <div class="home_about_slide_item_info_des txt_14">
                    Making every birthday unforgettable!
                  </div>
                  <a href="#" class="home_about_slide_item_info_icon img_full">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Icon_right.svg" alt="" />
                  </a>
                </div>
              </div>
              <div class="home_about_slide_item swiper-slide">
                <div class="home_about_slide_item_img img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/home_about_slide.webp" alt="" />
                </div>
                <div class="home_about_slide_item_info">
                  <div class="home_about_slide_item_info_title txt_24">
                    Kid Cake
                  </div>
                  <div class="home_about_slide_item_info_des txt_14">
                    Making every birthday unforgettable!
                  </div>
                  <a href="#" class="home_about_slide_item_info_icon img_full">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Icon_right.svg" alt="" />
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="home_discover">
        <div class="kl_container">
          <div class="home_discover_subtitle txt_subtitle block_title">
            Trending
          </div>
          <div class="home_discover_title txt_title">To Discover </div>
          <div class="home_discover_card_wrap">
            <div class="home_discover_card kl_grid">
              <div class="home_seller_silder_item">
                <div class="home_seller_silder_item_top">
                  <div
                    class="home_seller_silder_item_top_type txt_uppercase txt_12"
                  >
                    Chantilly Cake
                  </div>
                  <div
                    class="home_seller_silder_item_top_soldout txt_uppercase txt_12 active"
                  >
                    SOLD OUT
                  </div>
                </div>
                <div class="home_seller_silder_item_img img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/image_cake.jpg" alt="" />
                </div>
                <div class="home_seller_silder_item_info">
                  <div class="home_seller_silder_item_info_title txt_subtitle">
                    Butter Croissant
                  </div>
                  <div class="home_seller_silder_item_info_price txt_14 txt_wh_500">
                    <span>$160</span> - <span>$170</span>
                  </div>
                  <div class="home_seller_silder_item_info_cart_wrap">
                    <div class="home_seller_silder_item_info_cart img_full">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/cart.svg" alt="" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="home_seller_silder_item">
                <div class="home_seller_silder_item_top">
                  <div
                    class="home_seller_silder_item_top_type txt_uppercase txt_12"
                  >
                    Chantilly Cake
                  </div>
                  <div
                    class="home_seller_silder_item_top_soldout txt_uppercase txt_12 active"
                  >
                    SOLD OUT
                  </div>
                </div>
                <div class="home_seller_silder_item_img img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/image_cake.jpg" alt="" />
                </div>
                <div class="home_seller_silder_item_info">
                  <div class="home_seller_silder_item_info_title txt_subtitle">
                    Butter Croissant
                  </div>
                  <div class="home_seller_silder_item_info_price txt_14 txt_wh_500">
                    <span>$160</span> - <span>$170</span>
                  </div>
                  <div class="home_seller_silder_item_info_cart_wrap">
                    <div class="home_seller_silder_item_info_cart img_full">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/cart.svg" alt="" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="home_seller_silder_item">
                <div class="home_seller_silder_item_top">
                  <div
                    class="home_seller_silder_item_top_type txt_uppercase txt_12"
                  >
                    Chantilly Cake
                  </div>
                  <div
                    class="home_seller_silder_item_top_soldout txt_uppercase txt_12 active"
                  >
                    SOLD OUT
                  </div>
                </div>
                <div class="home_seller_silder_item_img img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/image_cake.jpg" alt="" />
                </div>
                <div class="home_seller_silder_item_info">
                  <div class="home_seller_silder_item_info_title txt_subtitle">
                    Butter Croissant
                  </div>
                  <div class="home_seller_silder_item_info_price txt_14 txt_wh_500">
                    <span>$160</span> - <span>$170</span>
                  </div>
                  <div class="home_seller_silder_item_info_cart_wrap">
                    <div class="home_seller_silder_item_info_cart img_full">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/cart.svg" alt="" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="home_seller_silder_item">
                <div class="home_seller_silder_item_top">
                  <div
                    class="home_seller_silder_item_top_type txt_uppercase txt_12"
                  >
                    Chantilly Cake
                  </div>
                  <div
                    class="home_seller_silder_item_top_soldout txt_uppercase txt_12 active"
                  >
                    SOLD OUT
                  </div>
                </div>
                <div class="home_seller_silder_item_img img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/image_cake.jpg" alt="" />
                </div>
                <div class="home_seller_silder_item_info">
                  <div class="home_seller_silder_item_info_title txt_subtitle">
                    Butter Croissant
                  </div>
                  <div class="home_seller_silder_item_info_price txt_14 txt_wh_500">
                    <span>$160</span> - <span>$170</span>
                  </div>
                  <div class="home_seller_silder_item_info_cart_wrap">
                    <div class="home_seller_silder_item_info_cart img_full">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/cart.svg" alt="" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="home_seller_silder_item">
                <div class="home_seller_silder_item_top">
                  <div
                    class="home_seller_silder_item_top_type txt_uppercase txt_12"
                  >
                    Chantilly Cake
                  </div>
                  <div
                    class="home_seller_silder_item_top_soldout txt_uppercase txt_12 active"
                  >
                    SOLD OUT
                  </div>
                </div>
                <div class="home_seller_silder_item_img img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/image_cake.jpg" alt="" />
                </div>
                <div class="home_seller_silder_item_info">
                  <div class="home_seller_silder_item_info_title txt_subtitle">
                    Butter Croissant
                  </div>
                  <div class="home_seller_silder_item_info_price txt_14 txt_wh_500">
                    <span>$160</span> - <span>$170</span>
                  </div>
                  <div class="home_seller_silder_item_info_cart_wrap">
                    <div class="home_seller_silder_item_info_cart img_full">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/cart.svg" alt="" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="home_seller_silder_item">
                <div class="home_seller_silder_item_top">
                  <div
                    class="home_seller_silder_item_top_type txt_uppercase txt_12"
                  >
                    Chantilly Cake
                  </div>
                  <div
                    class="home_seller_silder_item_top_soldout txt_uppercase txt_12 active"
                  >
                    SOLD OUT
                  </div>
                </div>
                <div class="home_seller_silder_item_img img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/image_cake.jpg" alt="" />
                </div>
                <div class="home_seller_silder_item_info">
                  <div class="home_seller_silder_item_info_title txt_subtitle">
                    Butter Croissant
                  </div>
                  <div class="home_seller_silder_item_info_price txt_14 txt_wh_500">
                    <span>$160</span> - <span>$170</span>
                  </div>
                  <div class="home_seller_silder_item_info_cart_wrap">
                    <div class="home_seller_silder_item_info_cart img_full">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/cart.svg" alt="" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="home_course">
        <div class="home_course_img img_full">
          <img src="<?php echo get_template_directory_uri(); ?>/images/home_course.webp" alt="" />
        </div>
        <div class="home_course_info">
          <div class="home_course_info_txt txt_64 txt_wh_500 txt_center">
            Every cake is a sweet gift made with love and care. Let us help you
            create unforgettable moments from the flavor to the feeling, it all
            begins with one beautiful cake.
          </div>
          <a href="#" class="home_hero_des_link txt_uppercase">
            <div class="home_hero_des_link_txt txt_16">order now</div>
            <div class="home_hero_des_link_icon img_full">
              <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-right.svg" alt="" />
            </div>
          </a>
        </div>
      </section>
      <section class="home_review overflow_hidden">
        <div class="kl_container">
          <div class="home_review_inner kl_grid">
            <div class="home_review_left">
              <div class="home_review_left_info">
                <div class="home_review_left_subtitle txt_subtitle block_title">
                  review
                </div>
                <div class="home_review_left_title txt_title">
                  What Our Customers Are Saying
                </div>
              </div>
              <div class="home_review_left_amount">
                <div class="home_review_left_amount_icon img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/icon_start.svg" alt="" />
                </div>
                <div class="home_review_left_amount_txt txt_14 txt_uppercase">
                  2500+ reviews
                </div>
              </div>
            </div>
            <div class="home_review_right right_full">
              <div class="home_review_right_img img_full">
                <img src="<?php echo get_template_directory_uri(); ?>/images/home_review.webp" alt="" />
              </div>
              <div class="home_review_right_slide swiper">
                <div class="home_review_right_slide_wrap swiper-wrapper">
                  <div class="home_review_right_slide_item swiper-slide">
                    <div class="home_review_right_slide_item_icon_wrap">
                      <div class="home_review_right_slide_item_icon img_full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon_star_clone.svg" alt="" />
                      </div>
                      <div class="home_review_right_slide_item_icon img_full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon_star_clone.svg" alt="" />
                      </div>
                      <div class="home_review_right_slide_item_icon img_full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon_star_clone.svg" alt="" />
                      </div>
                      <div class="home_review_right_slide_item_icon img_full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon_star_clone.svg" alt="" />
                      </div>
                      <div class="home_review_right_slide_item_icon img_full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon_star_clone.svg" alt="" />
                      </div>
                    </div>
                    <div class="home_review_right_slide_item_content txt_18">
                      A hidden secret in Richmond ☺️ Try their jalapeno poppers!
                      All their croissants are great. It is best to go early to
                      avoid disappointment as they do run out of things very
                      quickly!
                    </div>
                    <div class="home_review_right_slide_item_author txt_16">
                      Arthur S Google Review
                    </div>
                  </div>
                  <div class="home_review_right_slide_item swiper-slide">
                    <div class="home_review_right_slide_item_icon_wrap">
                      <div class="home_review_right_slide_item_icon img_full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon_star_clone.svg" alt="" />
                      </div>
                      <div class="home_review_right_slide_item_icon img_full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon_star_clone.svg" alt="" />
                      </div>
                      <div class="home_review_right_slide_item_icon img_full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon_star_clone.svg" alt="" />
                      </div>
                      <div class="home_review_right_slide_item_icon img_full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon_star_clone.svg" alt="" />
                      </div>
                      <div class="home_review_right_slide_item_icon img_full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon_star_clone.svg" alt="" />
                      </div>
                    </div>
                    <div class="home_review_right_slide_item_content txt_18">
                      A hidden secret in Richmond ☺️ Try their jalapeno poppers!
                      All their croissants are great. It is best to go early to
                      avoid disappointment as they do run out of things very
                      quickly!
                    </div>
                    <div class="home_review_right_slide_item_author txt_16">
                      Arthur S Google Review
                    </div>
                  </div>
                  <div class="home_review_right_slide_item swiper-slide">
                    <div class="home_review_right_slide_item_icon_wrap">
                      <div class="home_review_right_slide_item_icon img_full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon_star_clone.svg" alt="" />
                      </div>
                      <div class="home_review_right_slide_item_icon img_full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon_star_clone.svg" alt="" />
                      </div>
                      <div class="home_review_right_slide_item_icon img_full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon_star_clone.svg" alt="" />
                      </div>
                      <div class="home_review_right_slide_item_icon img_full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon_star_clone.svg" alt="" />
                      </div>
                      <div class="home_review_right_slide_item_icon img_full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon_star_clone.svg" alt="" />
                      </div>
                    </div>
                    <div class="home_review_right_slide_item_content txt_18">
                      A hidden secret in Richmond ☺️ Try their jalapeno poppers!
                      All their croissants are great. It is best to go early to
                      avoid disappointment as they do run out of things very
                      quickly!
                    </div>
                    <div class="home_review_right_slide_item_author txt_16">
                      Arthur S Google Review
                    </div>
                  </div>
                  <div class="home_review_right_slide_item swiper-slide">
                    <div class="home_review_right_slide_item_icon_wrap">
                      <div class="home_review_right_slide_item_icon img_full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon_star_clone.svg" alt="" />
                      </div>
                      <div class="home_review_right_slide_item_icon img_full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon_star_clone.svg" alt="" />
                      </div>
                      <div class="home_review_right_slide_item_icon img_full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon_star_clone.svg" alt="" />
                      </div>
                      <div class="home_review_right_slide_item_icon img_full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon_star_clone.svg" alt="" />
                      </div>
                      <div class="home_review_right_slide_item_icon img_full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon_star_clone.svg" alt="" />
                      </div>
                    </div>
                    <div class="home_review_right_slide_item_content txt_18">
                      A hidden secret in Richmond ☺️ Try their jalapeno poppers!
                      All their croissants are great. It is best to go early to
                      avoid disappointment as they do run out of things very
                      quickly!
                    </div>
                    <div class="home_review_right_slide_item_author txt_16">
                      Arthur S Google Review
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="home_contact">
        <div class="home_contact_img img_full">
          <img src="<?php echo get_template_directory_uri(); ?>/images/home_background_contact.webp" alt="" />
        </div>
        <div class="home_contact_form">
          <div
            class="home_contact_form_subtitle txt_subtitle color_white block_title"
          >
            How to order
          </div>
          <div class="home_contact_form_title txt_title color_white">
            Delicious cakes are waiting for you order now!
          </div>
          <div class="home_contact_form_name">
            <input type="text" name="name" placeholder="Name *" required />
          </div>
          <div class="home_contact_form_info">
            <input
              type="email"
              name="email"
              placeholder="Email Address *"
              required
            />
            <input type="tel" name="phone" placeholder="Phone *" required />
          </div>
          <div class="home_contact_form_info">
            <input type="text" name="date" placeholder="Date Needed *" required>
            <input type="text" name="time" placeholder="Time Needed *" required>
          </div>
          <div class="home_contact_form_info">
            <input
              type="number"
              name="servings"
              placeholder="Number of Servings *"
              required
            />
            <div class="home_contact_form_info_select">
              <select name="flavor" required>
                <option value="">Cake Flavour + Filling *</option>
                <option value="vanilla">Vanilla</option>
                <option value="chocolate">Chocolate</option>
                <option value="strawberry">Strawberry</option>
              </select>
              <div class="home_contact_form_info_img">
                <img src="<?php echo get_template_directory_uri(); ?>/images/icon_arrow_down.svg" alt="">
              </div>
            </div>
          </div>
          <div class="home_contact_form_design">
            <textarea
            name="design"
            placeholder="Cake Design *"
            rows="2"
            required
            ></textarea>
          </div>
          <div class="home_contact_form_upload">
            <label for="file-upload" class="upload-label">
              <div class="home_contact_form_upload_img img_full desktop">
                <img src="<?php echo get_template_directory_uri(); ?>/images/icon_image.svg" alt="">
              </div>
              <span class="txt_14">UPLOAD A FILE</span>
              <div class="home_contact_form_upload_icon img_full">
                <img src="<?php echo get_template_directory_uri(); ?>/images/icon_uploat.svg" alt="">
              </div>
              <input
              type="file"
              id="file-upload"
              name="file"
              accept=".png,.jpg,.gif"
              hidden
              />
            </label>
            <p class="upload-info txt_14">PNG, JPG, GIF up to 5MB</p>
          </div>
          <button type="submit" class="home_hero_des_link txt_uppercase">
            <div class="home_hero_des_link_txt txt_16">submit</div>
            <div class="home_hero_des_link_icon img_full">
              <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-right.svg" alt="" />
            </div>
          </button>
        </div>
      </section>
      <section class="home_workshop overflow_hidden">
        <div class="kl_container home_workshop_inner">
          <div class="home_workshop_info">
            <div class="home_workshop_info_subtitle txt_subtitle block_title">OUR WORKSHOPS</div>
            <div class="home_workshop_info_title txt_title">Master the art of cake decorating</div>
          </div>
          <div class="home_workshop_slide swiper">
            <div class="home_workshop_slide_swap swiper-wrapper">
              <div class="home_workshop_slide_item swiper-slide">
                <div class="home_workshop_slide_item_img img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/home_workshop.webp" alt="">
                </div>
                <div class="home_workshop_slide_item_info">
                  <div class="home_workshop_slide_item_info_item txt_uppercase txt_14 txt_wh_500">WoRKSHOPS </div>
                  <div class="home_workshop_slide_item_info_item txt_uppercase txt_14 txt_wh_500"> JAN 22, 2025</div>
                  <div class="home_workshop_slide_item_info_item txt_uppercase txt_14 txt_wh_500">Cost: $110</div>
                </div>
                <div class="home_workshop_slide_item_title txt_title_color txt_wh_500 txt_24">Vintage Cake Workshop</div>
                <div class="home_workshop_slide_item_des txt_16">Unleash your inner cake artist at our Vintage Cake Masterclass! Perfect for passionate bakers ready to level up their decorating skills and create edible art with heart.</div>
              </div>
              <div class="home_workshop_slide_item swiper-slide">
                <div class="home_workshop_slide_item_img img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/home_workshop.webp" alt="">
                </div>
                <div class="home_workshop_slide_item_info">
                  <div class="home_workshop_slide_item_info_item txt_uppercase txt_14 txt_wh_500">WORKSHOPS </div>
                  <div class="home_workshop_slide_item_info_item txt_uppercase txt_14 txt_wh_500"> JAN 22, 2025</div>
                  <div class="home_workshop_slide_item_info_item txt_uppercase txt_14 txt_wh_500">Cost: $110</div>
                </div>
                <div class="home_workshop_slide_item_title txt_title_color txt_wh_500 txt_24">Vintage Cake Workshop</div>
                <div class="home_workshop_slide_item_des txt_16">Unleash your inner cake artist at our Vintage Cake Masterclass! Perfect for passionate bakers ready to level up their decorating skills and create edible art with heart.</div>
              </div>
              <div class="home_workshop_slide_item swiper-slide">
                <div class="home_workshop_slide_item_img img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/home_workshop.webp" alt="">
                </div>
                <div class="home_workshop_slide_item_info">
                  <div class="home_workshop_slide_item_info_item txt_uppercase txt_14 txt_wh_500">WORKSHOPS </div>
                  <div class="home_workshop_slide_item_info_item txt_uppercase txt_14 txt_wh_500"> JAN 22, 2025</div>
                  <div class="home_workshop_slide_item_info_item txt_uppercase txt_14 txt_wh_500">Cost: $110</div>
                </div>
                <div class="home_workshop_slide_item_title txt_title_color txt_wh_500 txt_24">Vintage Cake Workshop</div>
                <div class="home_workshop_slide_item_des txt_16">Unleash your inner cake artist at our Vintage Cake Masterclass! Perfect for passionate bakers ready to level up their decorating skills and create edible art with heart.</div>
              </div>
              <div class="home_workshop_slide_item swiper-slide">
                <div class="home_workshop_slide_item_img img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/home_workshop.webp" alt="">
                </div>
                <div class="home_workshop_slide_item_info">
                  <div class="home_workshop_slide_item_info_item txt_uppercase txt_14 txt_wh_500">WORKSHOPS </div>
                  <div class="home_workshop_slide_item_info_item txt_uppercase txt_14 txt_wh_500"> JAN 22, 2025</div>
                  <div class="home_workshop_slide_item_info_item txt_uppercase txt_14 txt_wh_500">Cost: $110</div>
                </div>
                <div class="home_workshop_slide_item_title txt_title_color txt_wh_500 txt_24">Vintage Cake Workshop</div>
                <div class="home_workshop_slide_item_des txt_16">Unleash your inner cake artist at our Vintage Cake Masterclass! Perfect for passionate bakers ready to level up their decorating skills and create edible art with heart.</div>
              </div>
              <div class="home_workshop_slide_item swiper-slide">
                <div class="home_workshop_slide_item_img img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/home_workshop.webp" alt="">
                </div>
                <div class="home_workshop_slide_item_info">
                  <div class="home_workshop_slide_item_info_item txt_uppercase txt_14 txt_wh_500">WORKSHOPS </div>
                  <div class="home_workshop_slide_item_info_item txt_uppercase txt_14 txt_wh_500"> JAN 22, 2025</div>
                  <div class="home_workshop_slide_item_info_item txt_uppercase txt_14 txt_wh_500">Cost: $110</div>
                </div>
                <div class="home_workshop_slide_item_title txt_title_color txt_wh_500 txt_24">Vintage Cake Workshop</div>
                <div class="home_workshop_slide_item_des txt_16">Unleash your inner cake artist at our Vintage Cake Masterclass! Perfect for passionate bakers ready to level up their decorating skills and create edible art with heart.</div>
              </div>
              <div class="home_workshop_slide_item swiper-slide">
                <div class="home_workshop_slide_item_img img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/home_workshop.webp" alt="">
                </div>
                <div class="home_workshop_slide_item_info">
                  <div class="home_workshop_slide_item_info_item txt_uppercase txt_14 txt_wh_500">WORKSHOPS </div>
                  <div class="home_workshop_slide_item_info_item txt_uppercase txt_14 txt_wh_500"> JAN 22, 2025</div>
                  <div class="home_workshop_slide_item_info_item txt_uppercase txt_14 txt_wh_500">Cost: $110</div>
                </div>
                <div class="home_workshop_slide_item_title txt_title_color txt_wh_500 txt_24">Vintage Cake Workshop</div>
                <div class="home_workshop_slide_item_des txt_16">Unleash your inner cake artist at our Vintage Cake Masterclass! Perfect for passionate bakers ready to level up their decorating skills and create edible art with heart.</div>
              </div>
            </div>
            <div class="swiper-pagination home_workshop_pagination"></div>
          </div>
        </div>
      </section>
      <section class="home_cake overflow_hidden">
        <div class="kl_container">
          <div class="home_cake_slide swiper">
            <div class="home_cake_slide_wrap swiper-wrapper">
              <div class="home_cake_slide_item swiper-slide img_full">
                <img src="<?php echo get_template_directory_uri(); ?>/images/home_cake.webp" alt="">
              </div>
              <div class="home_cake_slide_item swiper-slide img_full">
                <img src="<?php echo get_template_directory_uri(); ?>/images/home_cake.webp" alt="">
              </div>
              <div class="home_cake_slide_item swiper-slide img_full">
                <img src="<?php echo get_template_directory_uri(); ?>/images/home_cake.webp" alt="">
              </div>
              <div class="home_cake_slide_item swiper-slide img_full">
                <img src="<?php echo get_template_directory_uri(); ?>/images/home_cake.webp" alt="">
              </div>
              <div class="home_cake_slide_item swiper-slide img_full">
                <img src="<?php echo get_template_directory_uri(); ?>/images/home_cake.webp" alt="">
              </div>
              <div class="home_cake_slide_item swiper-slide img_full">
                <img src="<?php echo get_template_directory_uri(); ?>/images/home_cake.webp" alt="">
              </div>
              <div class="home_cake_slide_item swiper-slide img_full">
                <img src="<?php echo get_template_directory_uri(); ?>/images/home_cake.webp" alt="">
              </div>
              <div class="home_cake_slide_item swiper-slide img_full">
                <img src="<?php echo get_template_directory_uri(); ?>/images/home_cake.webp" alt="">
              </div>
              <div class="home_cake_slide_item swiper-slide img_full">
                <img src="<?php echo get_template_directory_uri(); ?>/images/home_cake.webp" alt="">
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>


<?php get_footer(); ?>
