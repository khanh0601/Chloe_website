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
    $pageID = get_queried_object_id();

    // Banner Chính
    $banner = tr_posts_field('banner', $pageID); // Mỗi item: ['image', 'subtitle', 'title', 'order', 'link']

    // Best seller
    $seller_subtitle = tr_posts_field('seller_subtitle', $pageID);
    $seller_title = tr_posts_field('seller_title', $pageID);

    // Introduce Cake
    $intro = tr_posts_field('intro', $pageID); // Mỗi item: ['num', 'title', 'image']

    // About Cake
    $about_subtitle = tr_posts_field('about_subtitle', $pageID);
    $about_title = tr_posts_field('about_title', $pageID);
    $about_text_1 = tr_posts_field('about_text_1', $pageID);
    $about_image = wp_get_attachment_url(tr_posts_field('about_image', $pageID));
    $about_text_2 = tr_posts_field('about_text_2', $pageID);
    $about_readmore = tr_posts_field('about_readmore', $pageID);
    $about_link = tr_posts_field('about_link', $pageID);

    // Trendding Cake
    $trend_subtitle = tr_posts_field('trend_subtitle', $pageID);
    $trend_title = tr_posts_field('trend_title', $pageID);

    // Message Cake
    $message_image = wp_get_attachment_url(tr_posts_field('message_image', $pageID));
    $message_des = tr_posts_field('message_des', $pageID);
    $message_order = tr_posts_field('message_order', $pageID);
    $message_link = tr_posts_field('message_link', $pageID);

    // Review Cake
    $review_subtitle = tr_posts_field('review_subtitle', $pageID);
    $review_title = tr_posts_field('review_title', $pageID);
    $review_amount = tr_posts_field('review_amount', $pageID);
    $review_image = wp_get_attachment_url(tr_posts_field('review_image', $pageID));
    $review_items = tr_posts_field('review_items', $pageID); // Mỗi item: ['des', 'author']

    // Form Cake
    $form_subtitle = tr_posts_field('form_subtitle', $pageID);
    $form_title = tr_posts_field('form_title', $pageID);

    // Workshop Cake
    $workshop_subtitle = tr_posts_field('workshop_subtitle', $pageID);
    $workshop_title = tr_posts_field('workshop_title', $pageID);

    // List Cake
    $cake_item = tr_posts_field('cake_item', $pageID); // Mỗi item: ['image']
?>
    <div class='main' data-barba-namespace="home">
      <section class="home_hero">
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            <?php if (!empty($banner)) : ?>
              <?php foreach ($banner as $item): ?>
                <div class="swiper-slide">
                  <div class="home_hero_img img_fullfill">
                    <img src="<?= esc_url(wp_get_attachment_url($item['image'])) ?>" />
                  </div>
                  <div class="home_hero_des">
                    <div
                      class="home_hero_des_subtitle block_title color_white txt_subtitle"
                    >
                      <?= $item['subtitle'] ?>
                    </div>
                    <div class="home_hero_des_title color_white txt_72">
                      <?= $item['title'] ?>
                    </div>
                    <a href="<?= $item['link'] ?>" data-cursor="hidden" class="btn_black btn home_hero_des_link txt_uppercase">
                      <div class="btn_txt_wrap">
                        <div class="btn_txt home_hero_des_link_txt txt_16"><?= $item['order'] ?></div>
                        <div class="btn_txt home_hero_des_link_txt txt_16"><?= $item['order'] ?></div>
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
              <?php endforeach; ?>
            <?php endif; ?>
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
                <?= wp_kses_post($seller_subtitle) ?>
              </div>
              <div class="home_seller_content_title txt_title">
                <?= wp_kses_post($seller_title) ?>
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
                  <div class="home_seller_silder_item_info_title txt_16">
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
                  <div class="home_seller_silder_item_info_title txt_16">
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
                  <div class="home_seller_silder_item_info_title txt_16">
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
                  <div class="home_seller_silder_item_info_title txt_16">
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
                  <div class="home_seller_silder_item_info_title txt_16">
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
                  <div class="home_seller_silder_item_info_title txt_16">
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
                  <div class="home_seller_silder_item_info_title txt_16">
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
                  <div class="home_seller_silder_item_info_title txt_16">
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
            <?php if (!empty($intro)) : ?>
              <?php foreach ($intro as $item): ?>
              <div class="home_cookies_bg_item">
                <div class="home_cookies_bg_item_inner img_fullfill">
                  <img src="<?= esc_url(wp_get_attachment_url($item['image'])) ?>" alt="">
                </div>
                <div class="home_cookies_bg_item_info">
                  <div class="home_cookies_bg_item_info_title_wrap">
                    <div class="home_cookies_bg_item_info_title txt_48"><?= $item['title'] ?></div>
                  </div>
                  <a href="<?= $item['link'] ?>" class="home_cookies_bg_item_info_link txt_16 hover_arr">
                    Explore
                    <div class="line_arr">
                      <div class="line line_main"></div>
                      <div class="line line_clone"></div>
                    </div>
                  </a>
                </div>
              </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>
        <div class="home_cookies_content">
          <div class="kl_container">
            <div class="home_cookies_content_inner">
              <?php if (!empty($intro)) : ?>
                <?php foreach ($intro as $item): ?>
                <div class="home_cookies_content_item <?= $index === 0 ? 'active' : '' ?>">
                  <div class="home_cookies_content_item_label txt_20"><?= $item['num'] ?></div>
                  <div class="home_cookies_content_item_title txt_48"><?= $item['title'] ?></div>
                </div>
                <?php endforeach; ?>
              <?php endif; ?>
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
              <?= wp_kses_post($about_subtitle) ?>
            </div>
            <div class="home_about_content_title txt_title txt_center">
              <?= wp_kses_post($about_title) ?>
            </div>
          </div>
          <div class="home_about_inner">
            <div class="home_about_item">
              <div class="home_about_item_des txt_16">
                <?= wp_kses_post($about_text_1) ?>
              </div>
              <div class="home_about_item_border"></div>
            </div>
            <div class="home_about_item img_full">
              <div class="home_about_item_inner">
                <img src="<?php echo $about_image ?>" alt="" />
              </div>
            </div>
            <div class="home_about_item">
              <div class="home_about_item_des txt_16">
                <?= wp_kses_post($about_text_2) ?>
              </div>
              <a href="<?= wp_kses_post($about_link) ?>" class="home_about_item_link">
                <div class="home_about_item_link_txt txt_uppercase txt_16">
                  <?= wp_kses_post($about_readmore) ?>
                </div>
                <div class="home_hero_des_link_icon img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-right.svg" alt="" />
                </div>
              </a>
              <div class="home_about_item_border"></div>
            </div>
          </div>
        </div>
        <?php
          $uncategorized = get_term_by( 'slug', 'uncategorized', 'product_cat' );
          $exclude_ids = $uncategorized ? array( $uncategorized->term_id ) : array();
        // Lấy tất cả product categories
        $product_categories = get_terms( array(
            'taxonomy'   => 'product_cat',
            'hide_empty' => false, // Chỉ lấy category có sản phẩm
            'orderby'    => 'name',
            'order'      => 'ASC',
            'exclude'    => $exclude_ids,
        ) );

        if ( ! empty( $product_categories ) && ! is_wp_error( $product_categories ) ) :
        ?>
        <div class="kl_container">
          <div class="home_about_slide swiper">
            <div class="home_about_slide_wrap swiper-wrapper">
              <?php foreach ( $product_categories as $category ) : 
                  // Lấy thumbnail của category
                  $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
                  $image_url = $thumbnail_id ? wp_get_attachment_url( $thumbnail_id ) : get_template_directory_uri() . '/images/placeholder.webp';
                  
                  // Lấy link category
                  $category_link = get_term_link( $category );
              ?>
                <a href="<?php echo esc_url( $category_link ); ?>" class="home_about_slide_item swiper-slide">
                  <div class="home_about_slide_item_img img_full">
                    <img src="<?php echo esc_url( $image_url ); ?>" alt="" />
                  </div>
                  <div class="home_about_slide_item_info">
                    <div class="home_about_slide_item_info_title txt_24">
                      <?php echo esc_html( $category->name ); ?>
                    </div>
                    <div class="home_about_slide_item_info_des txt_14">
                      <?php echo esc_html( $category->description ); ?>
                    </div>
                    <div class="home_about_slide_item_info_icon img_full">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/Icon_right.svg" alt="" />
                    </div>
                  </div>
              </a>
                <?php endforeach; ?>
            </div>
          </div>
        </div>
        <?php endif; ?>
      </section>
      <section class="home_discover">
        <div class="kl_container">
          <div class="home_discover_subtitle txt_subtitle block_title">
            <?= wp_kses_post($trend_subtitle) ?>
          </div>
          <div class="home_discover_title txt_title"><?= wp_kses_post($trend_title) ?></div>
          <div class="home_discover_card_wrap">
            <div class="home_discover_card kl_grid">
              <?php
              $args = array(
                  'post_type'      => 'product',
                  'posts_per_page' => 6,
                  'post_status'    => 'publish',
                  'meta_query'     => array(
                      array(
                          'key'     => 'trending', // Tên field ACF
                          'value'   => '1', // hoặc 'true' tùy cách bạn setup ACF
                          'compare' => '='
                        )
                      ),
                      'orderby'        => 'date',
                      'order'          => 'DESC'
              );

              $trending_products = new WP_Query( $args );

              if ( $trending_products->have_posts() ) :
                  while ( $trending_products->have_posts() ) : $trending_products->the_post();
                      global $product;
                      $categories = get_the_terms( get_the_ID(), 'product_cat' );
                      $category_name = '';
                      if ( $categories && ! is_wp_error( $categories ) ) {
                          foreach ( $categories as $cat ) {
                              if ( $cat->slug !== 'uncategorized' ) {
                                  $category_name = $cat->name;
                                  break;
                              }
                          }
                      }
                      
                      $is_in_stock = $product->is_in_stock();
                      $image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                      if ( ! $image_url ) {
                          $image_url = wc_placeholder_img_src();
                      }
                      
                      // Lấy regular price và sale price
                      $regular_price = $product->get_regular_price();
                      $sale_price = $product->get_sale_price();
                      // Hiển thị giá
                      if ( $sale_price ) {
                          $price_display = '<span>$' . intval( $sale_price ) . '</span> - <span>$' . intval( $regular_price ) . '</span>';
                      } else {
                          $price_display = '<span>$' . intval( $regular_price ) . '</span>';
                      }
                      
                      ?>
                      <a href="<?php the_permalink(); ?>" class="home_seller_silder_item">
                        <div class="home_seller_silder_item_top">
                          <div
                            class="home_seller_silder_item_top_type txt_uppercase txt_12"
                          >
                            <?php echo esc_html( $category_name ); ?>
                          </div>
                          <div
                            class="home_seller_silder_item_top_soldout txt_uppercase txt_12 <?php echo ! $is_in_stock ? 'active' : ''; ?>"
                          >
                            SOLD OUT
                          </div>
                        </div>
                        <div class="home_seller_silder_item_img img_full">
                          <img src="<?php echo esc_url( $image_url ); ?>" alt="" />
                        </div>
                        <div class="home_seller_silder_item_info">
                          <div class="home_seller_silder_item_info_title txt_16">
                            <?php the_title(); ?>
                          </div>
                          <div class="home_seller_silder_item_info_price txt_14 txt_wh_500">
                            <?php echo $price_display; ?>
                          </div>
                          <div class="home_seller_silder_item_info_cart_wrap">
                            <div class="home_seller_silder_item_info_cart img_full">
                              <img src="<?php echo get_template_directory_uri(); ?>/images/cart.svg" alt="" />
                            </div>
                          </div>
                        </div>
                    </a>
                      <?php
                          endwhile;
                          wp_reset_postdata();
                      else :
                          echo 'Không có sản phẩm trending';
                      endif;
                      ?>
            </div>
          </div>
        </div>
      </section>
      <section class="home_course">
        <div class="home_course_img img_full">
          <img src="<?php echo $message_image ?>" alt="" />
        </div>
        <div class="home_course_info">
          <div class="home_course_info_txt txt_64 txt_wh_500 txt_center">
            <?= wp_kses_post($message_des) ?>
          </div>
          <a href="<?= wp_kses_post($message_link) ?>" data-cursor="hidden" class="btn_black btn home_hero_des_link txt_uppercase">
            <div class="btn_txt_wrap">
              <div class="btn_txt home_hero_des_link_txt txt_16"><?= wp_kses_post($message_order) ?></div>
              <div class="btn_txt home_hero_des_link_txt txt_16"><?= wp_kses_post($message_order) ?></div>
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
      </section>
      <section class="home_review overflow_hidden">
        <div class="kl_container">
          <div class="home_review_inner kl_grid">
            <div class="home_review_left">
              <div class="home_review_left_info">
                <div class="home_review_left_subtitle txt_subtitle block_title">
                  <?= wp_kses_post($review_subtitle) ?>
                </div>
                <div class="home_review_left_title txt_title">
                  <?= wp_kses_post($review_title) ?>
                </div>
              </div>
              <div class="home_review_left_amount">
                <div class="home_review_left_amount_icon img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/icon_start.svg" alt="" />
                </div>
                <div class="home_review_left_amount_txt txt_14 txt_uppercase">
                  <?= wp_kses_post($review_amount) ?>
                </div>
              </div>
            </div>
            <div class="home_review_right right_full">
              <div class="home_review_right_img img_full">
                <img src="<?php echo $review_image ?>" alt="" />
              </div>
              <div class="home_review_right_slide swiper">
                <div class="home_review_right_slide_wrap swiper-wrapper">
                  <?php if (!empty($review_items)) : ?>
                    <?php foreach ($review_items as $item): ?>
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
                        <?= $item['des'] ?>
                      </div>
                      <div class="home_review_right_slide_item_author txt_16">
                        <?= $item['author'] ?>
                      </div>
                    </div>
                    <?php endforeach; ?>
                  <?php endif; ?>
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
            <?= wp_kses_post($form_subtitle) ?>
          </div>
          <div class="home_contact_form_title txt_title color_white">
            <?= wp_kses_post($form_title) ?>
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
            <div class="btn_txt_wrap">
              <div class="btn_txt home_hero_des_link_txt txt_16">Submit</div>
              <div class="btn_txt home_hero_des_link_txt txt_16">Submit</div>
            </div>
            <div class="btn_ic_wrap">
              <div class="btn_ic home_hero_des_link_icon img_full">
                <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-right.svg" alt="" />
              </div>
              <div class="btn_ic home_hero_des_link_icon img_full">
                <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-right.svg" alt="" />
              </div>
            </div>
          </button>
        </div>
      </section>
      <section class="home_workshop overflow_hidden">
        <div class="kl_container home_workshop_inner">
          <div class="home_workshop_info">
            <div class="home_workshop_info_subtitle txt_subtitle block_title"><?= wp_kses_post($workshop_subtitle) ?></div>
            <div class="home_workshop_info_title txt_title"><?= wp_kses_post($workshop_title) ?></div>
          </div>
          <div class="home_workshop_slide swiper">
            <div class="home_workshop_slide_swap swiper-wrapper">
              <?php 
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 6, // Số bài viết mỗi trang
                    'paged' => $paged,
                    'category_name' => 'workshop', // Slug của category (hoặc dùng 'cat' => ID)
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                $workshop_query = new WP_Query($args);
              ?>
              <?php if ($workshop_query->have_posts()) : ?>
              <?php while ($workshop_query->have_posts()) : $workshop_query->the_post(); 
                  // Lấy ACF fields
                  $workshop_name = get_field('workshops', get_the_ID());
                  $workshop_date = get_field('date', get_the_ID());
                  $workshop_cost = get_field('cost', get_the_ID());
                  $post_thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');
                  $post_excerpt = get_the_excerpt();
              ?>
              <a href="<?php the_permalink(); ?>" class="home_workshop_slide_item swiper-slide">
                <div class="home_workshop_slide_item_img img_full">
                  <?php if ($post_thumbnail): ?>
                        <img src="<?php echo esc_url($post_thumbnail); ?>" alt="<?php the_title_attribute(); ?>">
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/home_workshop.webp" alt="">
                    <?php endif; ?>
                </div>
                <div class="home_workshop_slide_item_info">
                  <div class="home_workshop_slide_item_info_item txt_uppercase txt_14 txt_wh_500">WoRKSHOPS </div>
                  <div class="home_workshop_slide_item_info_item txt_uppercase txt_14 txt_wh_500"> <?php echo esc_html($workshop_date ?: get_the_date('M d, Y')); ?></div>
                  <div class="home_workshop_slide_item_info_item txt_uppercase txt_14 txt_wh_500">Cost: <?php echo esc_html($workshop_cost ?: '$110'); ?></div>
                </div>
                <div class="home_workshop_slide_item_title txt_title_color txt_wh_500 txt_24"><?php echo esc_html($workshop_name ?: 'WORKSHOPS'); ?> Workshop</div>
                <div class="home_workshop_slide_item_des txt_16"><?php echo esc_html($post_excerpt); ?></div>
              </a>
              <?php endwhile; ?>
              <?php else : ?>
                  <p>No workshops found.</p>
              <?php endif; ?>
            </div>
            <div class="swiper-pagination home_workshop_pagination"></div>
          </div>
        </div>
      </section>
      <section class="home_cake overflow_hidden">
        <div class="kl_container">
          <div class="home_cake_slide swiper">
            <div class="home_cake_slide_wrap swiper-wrapper">
              <?php if (!empty($cake_item)) : ?>
                <?php foreach ($cake_item as $item): ?>
                <div class="home_cake_slide_item swiper-slide img_full">
                  <img src="<?= esc_url(wp_get_attachment_url($item['image'])) ?>" alt="">
                </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </section>
    </div>


<?php get_footer(); ?>
