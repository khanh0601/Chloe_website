<?php
/**
 * Template Name: our story
 * Description:
 *
 * Tip:
 *
 * @package WordPress
 * @subpackage chloe_pallete
 * @since chloe_pallete 1.0
 */

get_header();
wp_enqueue_style( 'our_story-css', get_template_directory_uri() . '/css/our_story.css');
wp_enqueue_script( 'our_story-js', get_template_directory_uri() . '/js/our_story.js');

?>
    <section class="home_hero">
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="home_hero_img img_full">
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
              <div class="home_hero_img img_full">
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
              <div class="home_hero_img img_full">
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
    <section class="story_choose">
        <div class="kl_container">
            <div class="story_choose_inner kl_grid">
                <div class="story_choose_left">
                    <div class="story_choose_left_info">
                        <div class="story_choose_left_subtitle txt_subtitle block_title">WHY CHOOSE US?</div>
                        <div class="story_choose_left_title txt_title">The art of French pastry, perfected for you</div>
                    </div>
                    <div class="story_choose_left_img img_full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/story_choose.webp" alt="">
                    </div>
                </div>
                <div class="story_choose_right_wrap">
                  <div class="story_choose_right">
                      <div class="story_choose_right_item">
                          <div class="story_choose_right_item_num">01</div>
                          <div class="story_choose_right_item_title txt_32 txt_title_color">Premium Quality</div>
                          <div class="story_choose_right_item_des txt_16">Every ingredient is carefully sourced and crafted to meet the highest standards.</div>
                          <a href="#" class="story_choose_right_item_link txt_wh_500 txt_16 txt_title_color">Read more</a>
                      </div>
                      <div class="story_choose_right_item">
                          <div class="story_choose_right_item_num">01</div>
                          <div class="story_choose_right_item_title txt_32 txt_title_color">Premium Quality</div>
                          <div class="story_choose_right_item_des txt_16">Every ingredient is carefully sourced and crafted to meet the highest standards.</div>
                          <a href="#" class="story_choose_right_item_link txt_wh_500 txt_16 txt_title_color">Read more</a>
                      </div>
                      <div class="story_choose_right_item">
                          <div class="story_choose_right_item_num">01</div>
                          <div class="story_choose_right_item_title txt_32 txt_title_color">Premium Quality</div>
                          <div class="story_choose_right_item_des txt_16">Every ingredient is carefully sourced and crafted to meet the highest standards.</div>
                          <a href="#" class="story_choose_right_item_link txt_wh_500 txt_16 txt_title_color">Read more</a>
                      </div>
                      <div class="story_choose_right_item">
                          <div class="story_choose_right_item_num">01</div>
                          <div class="story_choose_right_item_title txt_32 txt_title_color">Premium Quality</div>
                          <div class="story_choose_right_item_des txt_16">Every ingredient is carefully sourced and crafted to meet the highest standards.</div>
                          <a href="#" class="story_choose_right_item_link txt_wh_500 txt_16 txt_title_color">Read more</a>
                      </div>
                      <div class="story_choose_right_item">
                          <div class="story_choose_right_item_num">01</div>
                          <div class="story_choose_right_item_title txt_32 txt_title_color">Premium Quality</div>
                          <div class="story_choose_right_item_des txt_16">Every ingredient is carefully sourced and crafted to meet the highest standards.</div>
                          <a href="#" class="story_choose_right_item_link txt_wh_500 txt_16 txt_title_color">Read more</a>
                      </div>
                      <div class="story_choose_right_item">
                          <div class="story_choose_right_item_num">01</div>
                          <div class="story_choose_right_item_title txt_32 txt_title_color">Premium Quality</div>
                          <div class="story_choose_right_item_des txt_16">Every ingredient is carefully sourced and crafted to meet the highest standards.</div>
                          <a href="#" class="story_choose_right_item_link txt_wh_500 txt_16 txt_title_color">Read more</a>
                      </div>
                  </div>
                  <div class="story_choose_right_panigation swiper-pagination tablet"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="home_course">
        <div class="home_course_img img_full">
          <img src="<?php echo get_template_directory_uri(); ?>/images/home_course.webp" alt="" />
        </div>
        <div class="home_course_info">
          <div class="home_course_info_txt txt_64 txt_wh_500">
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
    <section class="story_about">
        <div class="kl_container">
          <div class="story_about_inner">
            <div class="story_about_title txt_40">
                <span>✺</span>Our mission to create a bakery and café that nourishes the bodies, minds, and spirits of the communities we serve- our neighborhood, our retail and wholesale customers.
            </div>
            <div class="story_about_content">
              <div class="story_about_content_img img_full middle">
                <img src="<?php echo get_template_directory_uri(); ?>/images/story_about_1.webp" alt="">
              </div>
              <div class="story_about_content_inner">
                <div class="story_about_content_des txt_16">
                  <p>Explore our unique art space and immerse in a world of color and thought. We believe that art is more than just a product, it's a beautiful spiritual experience. Each book is a portal to a different mind, a unique perspective waiting to be absorbed, interpreted, and reimagined.</p>
                  <p>Let our shelves be your gateway to a world of creativity, discovery, and endless inspiration. After all, in the realm of art, every page is a masterpiece waiting to be uncovered.</p>
                </div>
                <div class="story_about_content_item_img img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/story_about_2.webp" alt="">
                </div>
              </div>
            </div>
          </div>

        </div>
    </section>
<?php get_footer(); ?>