<?php
/**
 * Template Name: HomePage
 * Description:
 *
 * Tip:
 *
 * @package WordPress
 * @subpackage tbs
 * @since tbs 1.0
 */

get_header();
wp_enqueue_style( 'home-css', get_template_directory_uri() . '/css/home.css');
wp_enqueue_script( 'home-js', get_template_directory_uri() . '/js/home.js');

?>
<section class="home_hero">
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="home_hero_img img_full">
                <img src= "<?php echo get_template_directory_uri(); ?>/images/home_hero.webp" />
            </div>
            <div class="home_hero_des">
                <div class="home_hero_des_subtitle block_title color_white txt_subtitle">ChloesPalette</div>
                <div class="home_hero_des_title color_white txt_72">Make your birthday sweeter with a cake full of love!</div>
                <a href="#" class="home_hero_des_link txt_uppercase">
                    <div class="home_hero_des_link_txt txt_16">order now</div>
                    <div class="home_hero_des_link_icon img_full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-right.svg" alt="">
                    </div>
                </a>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="home_hero_img img_full">
                <img src="<?php echo get_template_directory_uri(); ?>/images/home_hero.webp" />
            </div>
            <div class="home_hero_des">
                <div class="home_hero_des_subtitle block_title color_white txt_subtitle">ChloesPalette</div>
                <div class="home_hero_des_title color_white txt_72">Make your birthday sweeter with a cake full of love!</div>
                <a href="#" class="home_hero_des_link txt_uppercase">
                    <div class="home_hero_des_link_txt txt_16">order now</div>
                    <div class="home_hero_des_link_icon img_full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-right.svg" alt="">
                    </div>
                </a>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="home_hero_img img_full">
                <img src="<?php echo get_template_directory_uri(); ?>/images/home_hero.webp" />
            </div>
            <div class="home_hero_des">
                <div class="home_hero_des_subtitle block_title color_white txt_subtitle">ChloesPalette</div>
                <div class="home_hero_des_title color_white txt_72">Make your birthday sweeter with a cake full of love!</div>
                <a href="#" class="home_hero_des_link">
                    <div class="home_hero_des_link_txt txt_uppercase txt_16">order now</div>
                    <div class="home_hero_des_link_icon img_full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-right.svg" alt="">
                    </div>
                </a>
            </div>
          </div>
        </div>
        <div class="swiper-pagination home_hero_pagination"></div>
      </div>
    </section>
    <section class="home_seller">
      <div class="kl_container home_seller_inner">
        <div class="home_seller_content">
          <div class="home_seller_content_subtitle txt_subtitle txt_uppercase block_title">best sellers</div>
          <div class="home_seller_content_title txt_title">Featured Products</div>
        </div>
        <div class="home_seller_category">
          <div class="home_seller_category_item txt_uppercase txt_14 txt_wh_500 block_title">All</div>
          <div class="home_seller_category_item txt_uppercase txt_14 txt_wh_500">Chantilly Cake</div>
          <div class="home_seller_category_item txt_uppercase txt_14 txt_wh_500">Vintage Cake</div>
          <div class="home_seller_category_item txt_uppercase txt_14 txt_wh_500">Kid Cake</div>
          <div class="home_seller_category_item txt_uppercase txt_14 txt_wh_500">Wedding Cake</div>
          <div class="home_seller_category_item txt_uppercase txt_14 txt_wh_500">Flower Cake</div>
        </div>
      </div>
      <div class="home_seller_silder swiper">
        <div class="home_seller_silder_wrap swiper-wrapper">
          <div class="home_seller_silder_item swiper-slide">
            <div class="home_seller_silder_item_top">
              <div class="home_seller_silder_item_top_type txt_uppercase txt_12">Chantilly Cake</div>
              <div class="home_seller_silder_item_top_soldout txt_uppercase txt_12 active">SOLD OUT</div>
            </div>
            <div class="home_seller_silder_item_img img_full">
              <img src="<?php echo get_template_directory_uri(); ?>/images/image_cake.jpg" alt="">
            </div>
            <div class="home_seller_silder_item_info">
              <div class="home_seller_silder_item_info_title txt_subtitle">Butter Croissant</div>
              <div class="home_seller_silder_item_info_price txt_14 txt_wh_500">
                <span>$160</span> - <span>$170</span>
              </div>
              <div class="home_seller_silder_item_info_cart_wrap">
                <div class="home_seller_silder_item_info_cart img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/cart.svg" alt="">
                </div>
              </div>
            </div>
          </div>
          <div class="home_seller_silder_item swiper-slide">
            <div class="home_seller_silder_item_top">
              <div class="home_seller_silder_item_top_type txt_uppercase txt_12">Chantilly Cake</div>
              <div class="home_seller_silder_item_top_soldout txt_uppercase txt_12">SOLD OUT</div>
            </div>
            <div class="home_seller_silder_item_img img_full">
              <img src="<?php echo get_template_directory_uri(); ?>/images/image_cake.jpg" alt="">
            </div>
            <div class="home_seller_silder_item_info">
              <div class="home_seller_silder_item_info_title txt_subtitle">Butter Croissant</div>
              <div class="home_seller_silder_item_info_price txt_14 txt_wh_500">
                <span>$160</span> - <span>$170</span>
              </div>
              <div class="home_seller_silder_item_info_cart_wrap">
                <div class="home_seller_silder_item_info_cart img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/cart.svg" alt="">
                </div>
              </div>
            </div>
          </div>
          <div class="home_seller_silder_item swiper-slide">
            <div class="home_seller_silder_item_top">
              <div class="home_seller_silder_item_top_type txt_uppercase txt_12">Chantilly Cake</div>
              <div class="home_seller_silder_item_top_soldout txt_uppercase txt_12">SOLD OUT</div>
            </div>
            <div class="home_seller_silder_item_img img_full">
              <img src="<?php echo get_template_directory_uri(); ?>/images/image_cake.jpg" alt="">
            </div>
            <div class="home_seller_silder_item_info">
              <div class="home_seller_silder_item_info_title txt_subtitle">Butter Croissant</div>
              <div class="home_seller_silder_item_info_price txt_14 txt_wh_500">
                <span>$160</span> - <span>$170</span>
              </div>
              <div class="home_seller_silder_item_info_cart_wrap">
                <div class="home_seller_silder_item_info_cart img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/cart.svg" alt="">
                </div>
              </div>
            </div>
          </div>
          <div class="home_seller_silder_item swiper-slide">
            <div class="home_seller_silder_item_top">
              <div class="home_seller_silder_item_top_type txt_uppercase txt_12">Chantilly Cake</div>
              <div class="home_seller_silder_item_top_soldout txt_uppercase txt_12">SOLD OUT</div>
            </div>
            <div class="home_seller_silder_item_img img_full">
              <img src="<?php echo get_template_directory_uri(); ?>/images/image_cake.jpg" alt="">
            </div>
            <div class="home_seller_silder_item_info">
              <div class="home_seller_silder_item_info_title txt_subtitle">Butter Croissant</div>
              <div class="home_seller_silder_item_info_price txt_14 txt_wh_500">
                <span>$160</span> - <span>$170</span>
              </div>
              <div class="home_seller_silder_item_info_cart_wrap">
                <div class="home_seller_silder_item_info_cart img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/cart.svg" alt="">
                </div>
              </div>
            </div>
          </div>
          <div class="home_seller_silder_item swiper-slide">
            <div class="home_seller_silder_item_top">
              <div class="home_seller_silder_item_top_type txt_uppercase txt_12">Chantilly Cake</div>
              <div class="home_seller_silder_item_top_soldout txt_uppercase txt_12">SOLD OUT</div>
            </div>
            <div class="home_seller_silder_item_img img_full">
              <img src="<?php echo get_template_directory_uri(); ?>/images/image_cake.jpg" alt="">
            </div>
            <div class="home_seller_silder_item_info">
              <div class="home_seller_silder_item_info_title txt_subtitle">Butter Croissant</div>
              <div class="home_seller_silder_item_info_price txt_14 txt_wh_500">
                <span>$160</span> - <span>$170</span>
              </div>
              <div class="home_seller_silder_item_info_cart_wrap">
                <div class="home_seller_silder_item_info_cart img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/cart.svg" alt="">
                </div>
              </div>
            </div>
          </div>
          <div class="home_seller_silder_item swiper-slide">
            <div class="home_seller_silder_item_top">
              <div class="home_seller_silder_item_top_type txt_uppercase txt_12">Chantilly Cake</div>
              <div class="home_seller_silder_item_top_soldout txt_uppercase txt_12 active">SOLD OUT</div>
            </div>
            <div class="home_seller_silder_item_img img_full">
              <img src="<?php echo get_template_directory_uri(); ?>/images/image_cake.jpg" alt="">
            </div>
            <div class="home_seller_silder_item_info">
              <div class="home_seller_silder_item_info_title txt_subtitle">Butter Croissant</div>
              <div class="home_seller_silder_item_info_price txt_14 txt_wh_500">
                <span>$160</span> - <span>$170</span>
              </div>
              <div class="home_seller_silder_item_info_cart_wrap">
                <div class="home_seller_silder_item_info_cart img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/cart.svg" alt="">
                </div>
              </div>
            </div>
          </div>
          <div class="home_seller_silder_item swiper-slide">
            <div class="home_seller_silder_item_top">
              <div class="home_seller_silder_item_top_type txt_uppercase txt_12">Chantilly Cake</div>
              <div class="home_seller_silder_item_top_soldout txt_uppercase txt_12 active">SOLD OUT</div>
            </div>
            <div class="home_seller_silder_item_img img_full">
              <img src="<?php echo get_template_directory_uri(); ?>/images/image_cake.jpg" alt="">
            </div>
            <div class="home_seller_silder_item_info">
              <div class="home_seller_silder_item_info_title txt_subtitle">Butter Croissant</div>
              <div class="home_seller_silder_item_info_price txt_14 txt_wh_500">
                <span>$160</span> - <span>$170</span>
              </div>
              <div class="home_seller_silder_item_info_cart_wrap">
                <div class="home_seller_silder_item_info_cart img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/cart.svg" alt="">
                </div>
              </div>
            </div>
          </div>
          <div class="home_seller_silder_item swiper-slide">
            <div class="home_seller_silder_item_top">
              <div class="home_seller_silder_item_top_type txt_uppercase txt_12">Chantilly Cake</div>
              <div class="home_seller_silder_item_top_soldout txt_uppercase txt_12 active">SOLD OUT</div>
            </div>
            <div class="home_seller_silder_item_img img_full">
              <img src="<?php echo get_template_directory_uri(); ?>/images/image_cake.jpg" alt="">
            </div>
            <div class="home_seller_silder_item_info">
              <div class="home_seller_silder_item_info_title txt_subtitle">Butter Croissant</div>
              <div class="home_seller_silder_item_info_price txt_14 txt_wh_500">
                <span>$160</span> - <span>$170</span>
              </div>
              <div class="home_seller_silder_item_info_cart_wrap">
                <div class="home_seller_silder_item_info_cart img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/cart.svg" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-pagination home_seller_pagination"></div>
      </div>
    </section>
    <section class="home_cookie">
      <div class="home_cookie_img_wrap">
        <div class="home_cookie_img img_abs">
          <img src="<?php echo get_template_directory_uri(); ?>/images/home_cookie.webp" alt="">
          <div class="home_cookie_img_block"></div>
        </div>
      </div>
      <div class="kl_container home_cookie_slide_wrap">
        <div class="home_cookie_slide">
          <div class="home_cookie_slide_list swiper">
            <div class="home_cookie_slide_list_wrap swiper-wrapper">
              <div class="home_cookie_slide_list_item swiper-slide">
                <div class="home_cookie_slide_list_item_title txt_center color_white txt_70">Cookies and Muffins</div>
                <div class="home_cookie_slide_list_item_des txt_center color_white txt_18">12 products</div>
              </div>
              <div class="home_cookie_slide_list_item swiper-slide">
                <div class="home_cookie_slide_list_item_title txt_center color_white txt_70">Cookies and Muffins</div>
                <div class="home_cookie_slide_list_item_des txt_center color_white txt_18">12 products</div>
              </div>
              <div class="home_cookie_slide_list_item swiper-slide">
                <div class="home_cookie_slide_list_item_title txt_center color_white txt_70">Cookies and Muffins</div>
                <div class="home_cookie_slide_list_item_des txt_center color_white txt_18">12 products</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="home_about">
      <div class="home_about_content">
        <div class="home_about_content_subtitle txt_center txt_subtitle block_title">About chloes palette cakes  </div>
        <div class="home_about_content_title txt_title txt_center">Where every cake becomes a work of art.</div>
      </div>
      <div class="home_about_inner">
        <div class="home_about_item">
          <div class="home_about_item_des txt_16">
            <p>“Welcome to Chloes Palette Cakes where each cake is not just a sweet treat, but a story crafted with inspiration, dedication, and love.”</p>
            <p>At Chloes Palette Cakes, we believe the perfect birthday cake lies in the harmony of delicate flavors, unique aesthetics, and honest emotion. Whether you dream of a pastel minimalist cake or an elaborate themed design, our skilled team brings your vision to life.</p>
          </div>
          <div class="home_about_item_border"></div>
        </div>
        <div class="home_about_item img_full">
          <img src="<?php echo get_template_directory_uri(); ?>/images/home_about.webp" alt="">
        </div>
        <div class="home_about_item">
          <div class="home_about_item_des txt_16">
            <p>“We pour our hearts into every recipe, blending creativity with love to make cakes that are as meaningful as they are beautiful. From birthdays to weddings, each creation is a celebration of happiness, made to bring smiles and sweet memories to every table.</p>
          </div>
          <a href="#" class="home_about_item_link ">
            <div class="home_about_item_link_txt txt_uppercase txt_16">Read more</div>
            <div class="home_hero_des_link_icon img_full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-right.svg" alt="">
            </div>
          </a>
          <div class="home_about_item_border"></div>
        </div>

      </div>
      <div class="home_about_slide swiper">
        <div class="home_about_slide_wrap swiper-wrapper">
          <div class="home_about_slide_item swiper-slide">
            <div class="home_about_slide_item_img img_full"> 
              <img src="<?php echo get_template_directory_uri(); ?>/images/home_about_slide.webp" alt="">
            </div>
            <div class="home_about_slide_item_info">
              <div class="home_about_slide_item_info_title txt_24">Kid Cake</div>
              <div class="home_about_slide_item_info_des txt_14">Making every birthday unforgettable!</div>
              <a href="#" class="home_about_slide_item_info_icon img_full">
                <img src="<?php echo get_template_directory_uri(); ?>/images/Icon_right.svg" alt="">
              </a>
            </div>
          </div>
           <div class="home_about_slide_item swiper-slide">
            <div class="home_about_slide_item_img img_full"> 
              <img src="<?php echo get_template_directory_uri(); ?>/images/home_about_slide.webp" alt="">
            </div>
            <div class="home_about_slide_item_info">
              <div class="home_about_slide_item_info_title txt_24">Kid Cake</div>
              <div class="home_about_slide_item_info_des txt_14">Making every birthday unforgettable!</div>
              <a href="#" class="home_about_slide_item_info_icon img_full">
                <img src="<?php echo get_template_directory_uri(); ?>/images/Icon_right.svg" alt="">
              </a>
            </div>
          </div>
           <div class="home_about_slide_item swiper-slide">
            <div class="home_about_slide_item_img img_full"> 
              <img src="<?php echo get_template_directory_uri(); ?>/images/home_about_slide.webp" alt="">
            </div>
            <div class="home_about_slide_item_info">
              <div class="home_about_slide_item_info_title txt_24">Kid Cake</div>
              <div class="home_about_slide_item_info_des txt_14">Making every birthday unforgettable!</div>
              <a href="#" class="home_about_slide_item_info_icon img_full">
                <img src="<?php echo get_template_directory_uri(); ?>/images/Icon_right.svg" alt="">
              </a>
            </div>
          </div>
           <div class="home_about_slide_item swiper-slide">
            <div class="home_about_slide_item_img img_full"> 
              <img src="<?php echo get_template_directory_uri(); ?>/images/home_about_slide.webp" alt="">
            </div>
            <div class="home_about_slide_item_info">
              <div class="home_about_slide_item_info_title txt_24">Kid Cake</div>
              <div class="home_about_slide_item_info_des txt_14">Making every birthday unforgettable!</div>
              <a href="#" class="home_about_slide_item_info_icon img_full">
                <img src="<?php echo get_template_directory_uri(); ?>/images/Icon_right.svg" alt="">
              </a>
            </div>
          </div>
           <div class="home_about_slide_item swiper-slide">
            <div class="home_about_slide_item_img img_full"> 
              <img src="<?php echo get_template_directory_uri(); ?>/images/home_about_slide.webp" alt="">
            </div>
            <div class="home_about_slide_item_info">
              <div class="home_about_slide_item_info_title txt_24">Kid Cake</div>
              <div class="home_about_slide_item_info_des txt_14">Making every birthday unforgettable!</div>
              <a href="#" class="home_about_slide_item_info_icon img_full">
                <img src="<?php echo get_template_directory_uri(); ?>/images/Icon_right.svg" alt="">
              </a>
            </div>
          </div>
           <div class="home_about_slide_item swiper-slide">
            <div class="home_about_slide_item_img img_full"> 
              <img src="<?php echo get_template_directory_uri(); ?>/images/home_about_slide.webp" alt="">
            </div>
            <div class="home_about_slide_item_info">
              <div class="home_about_slide_item_info_title txt_24">Kid Cake</div>
              <div class="home_about_slide_item_info_des txt_14">Making every birthday unforgettable!</div>
              <a href="#" class="home_about_slide_item_info_icon img_full">
                <img src="<?php echo get_template_directory_uri(); ?>/images/Icon_right.svg" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>


<?php get_footer(); ?>
