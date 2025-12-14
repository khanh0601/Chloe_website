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
    $uncategorized = get_term_by('slug', 'uncategorized', 'product_cat');
    $exclude_ids = $uncategorized ? array($uncategorized->term_id) : array();
    $intro = get_terms(array(
        'taxonomy'   => 'product_cat',
        'hide_empty' => false,
        'orderby'    => 'name',
        'order'      => 'ASC',
        'exclude'    => $exclude_ids,
    ));
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
                class="home_seller_category_item active txt_uppercase txt_14 txt_wh_500"
                data-category="all"
              >
                All
              </div>
              <?php
                // Lấy category Uncategorized để loại trừ
                $uncategorized = get_term_by( 'slug', 'uncategorized', 'product_cat' );
                $exclude_ids = $uncategorized ? array( $uncategorized->term_id ) : array();

                // Lấy tất cả product categories
                $product_categories = get_terms( array(
                    'taxonomy'   => 'product_cat',
                    'hide_empty' => false,
                    'orderby'    => 'name',
                    'order'      => 'ASC',
                    'exclude'    => $exclude_ids,
                ) );

                if ( ! empty( $product_categories ) && ! is_wp_error( $product_categories ) ) :
                  foreach ( $product_categories as $category ) :
              ?>
                <div
                  class="home_seller_category_item txt_uppercase txt_14 txt_wh_500"
                  data-category="<?php echo esc_attr( $category->slug ); ?>"
                >
                  <?php echo esc_html( $category->name ); ?>
                </div>
              <?php
                  endforeach;
                endif;
              ?>
            </div>
          </div>
          <div class="home_seller_silder swiper">
            <div class="home_seller_silder_wrap swiper-wrapper">
              <?php
                // Query để lấy tất cả products
                $args = array(
                    'post_type'      => 'product',
                    'posts_per_page' => -1,
                    'post_status'    => 'publish',
                    'orderby'        => 'date',
                    'order'          => 'DESC'
                );

                $seller_products = new WP_Query( $args );

                if ( $seller_products->have_posts() ) :
                    while ( $seller_products->have_posts() ) : $seller_products->the_post();
                        global $product;

                        // Lấy categories của product
                        $categories = get_the_terms( get_the_ID(), 'product_cat' );
                        $category_name = '';
                        $category_slugs = array();

                        if ( $categories && ! is_wp_error( $categories ) ) {
                            foreach ( $categories as $cat ) {
                                if ( $cat->slug !== 'uncategorized' ) {
                                    if ( empty( $category_name ) ) {
                                        $category_name = $cat->name;
                                    }
                                    $category_slugs[] = $cat->slug;
                                }
                            }
                        }

                        // Kiểm tra tồn kho
                        $is_in_stock = $product->is_in_stock();

                        // Lấy hình ảnh
                        $image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                        if ( ! $image_url ) {
                            $image_url = wc_placeholder_img_src();
                        }

                        // Lấy giá
                        // Kiểm tra nếu là variable product
                        if ( $product->is_type( 'variable' ) ) {
                            // Lấy giá từ variations
                            $min_regular_price = $product->get_variation_regular_price( 'min' );
                            $max_regular_price = $product->get_variation_regular_price( 'max' );
                            $min_sale_price = $product->get_variation_sale_price( 'min' );
                            $max_sale_price = $product->get_variation_sale_price( 'max' );
                            
                            // Kiểm tra nếu có sale price
                            if ( $min_sale_price && $min_sale_price < $min_regular_price ) {
                                // Có sale price
                                if ( $min_sale_price == $max_sale_price && $min_regular_price == $max_regular_price ) {
                                    // Giá đồng nhất
                                    $price_display = '<span>$' . intval( $min_sale_price ) . '</span> - <span>$' . intval( $min_regular_price ) . '</span>';
                                } else {
                                    // Giá có khoảng
                                    $price_display = '<span>$' . intval( $min_sale_price ) . '</span> - <span>$' . intval( $max_regular_price ) . '</span>';
                                }
                            } else {
                                // Không có sale price
                                if ( $min_regular_price == $max_regular_price ) {
                                    $price_display = '<span>$' . intval( $min_regular_price ) . '</span>';
                                } else {
                                    $price_display = '<span>$' . intval( $min_regular_price ) . '</span> - <span>$' . intval( $max_regular_price ) . '</span>';
                                }
                            }
                        } else {
                            // Simple product hoặc các loại khác
                            $regular_price = $product->get_regular_price();
                            $sale_price = $product->get_sale_price();

                            if ( $sale_price ) {
                                $price_display = '<span>$' . intval( $sale_price ) . '</span> - <span>$' . intval( $regular_price ) . '</span>';
                            } else {
                                $price_display = '<span>$' . intval( $regular_price ) . '</span>';
                            }
                        }

                        // Tạo data-category attribute
                        $data_categories = implode( ' ', $category_slugs );
                        
                        // Lấy product type và default variation ID nếu là variable product
                        $product_type = $product->get_type();
                        $default_variation_id = 0;
                        $default_variation_attributes = array();
                        
                        if ( $product->is_type( 'variable' ) ) {
                            // Lấy default attributes
                            $default_attributes = $product->get_default_attributes();
                            
                            if ( ! empty( $default_attributes ) ) {
                                // Tìm variation ID từ default attributes
                                $data_store = WC_Data_Store::load( 'product' );
                                $default_variation_id = $data_store->find_matching_product_variation( $product, $default_attributes );
                                
                                if ( $default_variation_id ) {
                                    // Format variation attributes
                                    foreach ( $default_attributes as $key => $value ) {
                                        $attr_key = strpos( $key, 'attribute_' ) === 0 ? $key : 'attribute_' . $key;
                                        $default_variation_attributes[ $attr_key ] = $value;
                                    }
                                }
                            }
                            
                            // Nếu không có default variation, lấy variation đầu tiên có sẵn
                            if ( ! $default_variation_id ) {
                                // Lấy tất cả variation IDs
                                $variation_ids = $product->get_children();
                                
                                if ( ! empty( $variation_ids ) ) {
                                    // Tìm variation đầu tiên có sẵn (in stock, purchasable)
                                    foreach ( $variation_ids as $variation_id ) {
                                        $variation = wc_get_product( $variation_id );
                                        
                                        if ( $variation && $variation->exists() && $variation->is_purchasable() && $variation->is_in_stock() ) {
                                            $default_variation_id = $variation_id;
                                            
                                            // Lấy attributes từ variation
                                            $variation_attrs = $variation->get_variation_attributes();
                                            if ( ! empty( $variation_attrs ) ) {
                                                foreach ( $variation_attrs as $key => $value ) {
                                                    $attr_key = strpos( $key, 'attribute_' ) === 0 ? $key : 'attribute_' . $key;
                                                    $default_variation_attributes[ $attr_key ] = $value;
                                                }
                                            }
                                            break; // Lấy variation đầu tiên tìm được
                                        }
                                    }
                                }
                            }
                        }
                        ?>
                        <a
                          href="<?php the_permalink(); ?>"
                          class="home_seller_silder_item swiper-slide"
                          data-categories="<?php echo esc_attr( $data_categories ); ?>"
                          data-product-id="<?php echo esc_attr( get_the_ID() ); ?>"
                          data-product-type="<?php echo esc_attr( $product_type ); ?>"
                          <?php if ( $default_variation_id ) : ?>
                          data-default-variation-id="<?php echo esc_attr( $default_variation_id ); ?>"
                          data-default-variation-attributes="<?php echo esc_attr( json_encode( $default_variation_attributes ) ); ?>"
                          <?php endif; ?>
                        >
                          <div class="home_seller_silder_item_top">
                            <div class="home_seller_silder_item_top_type txt_uppercase txt_12">
                              <?php echo esc_html( $category_name ); ?>
                            </div>
                            <div class="home_seller_silder_item_top_soldout txt_uppercase txt_12 <?php echo ! $is_in_stock ? 'active' : ''; ?>">
                              SOLD OUT
                            </div>
                          </div>
                          <div class="home_seller_silder_item_img img_full">
                            <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php the_title_attribute(); ?>" />
                          </div>
                          <div class="home_seller_silder_item_info">
                            <div class="home_seller_silder_item_info_title txt_16">
                              <?php the_title(); ?>
                            </div>
                            <div class="home_seller_silder_item_info_price txt_14 txt_wh_500">
                              <?php echo $price_display; ?>
                            </div>
                            <div class="home_seller_silder_item_info_cart_wrap" 
                                 data-product-id="<?php echo esc_attr( get_the_ID() ); ?>"
                                 data-product-type="<?php echo esc_attr( $product_type ); ?>"
                                 <?php if ( $default_variation_id ) : ?>
                                 data-default-variation-id="<?php echo esc_attr( $default_variation_id ); ?>"
                                 data-default-variation-attributes="<?php echo esc_attr( json_encode( $default_variation_attributes ) ); ?>"
                                 <?php endif; ?>>
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
                    echo '<p>No products found.</p>';
                endif;
              ?>
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
                <?php
                $image_url = get_field('image_full_screen', 'product_cat_' . $item->term_id);
                if ($image_url) : ?>
                  <img src="<?= esc_url($image_url) ?>" alt="<?= esc_attr($item->name) ?>">
                <?php else : ?>
                  <img src="<?= get_template_directory_uri() ?>/images/placeholder.jpg" alt="<?= esc_attr($item->name) ?>">
                <?php endif; ?>
                </div>
                <div class="home_cookies_bg_item_info">
                  <div class="home_cookies_bg_item_info_title_wrap">
                    <div class="home_cookies_bg_item_info_title txt_48"> <?= esc_html($item->name) ?></div>
                  </div>
                  <a href="<?= esc_url(get_term_link($item)) ?>" class="home_cookies_bg_item_info_link txt_16 hover_arr">
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
                <?php foreach ($intro as $index => $item): ?>
                <div class="home_cookies_content_item <?= $index === 0 ? 'active' : '' ?>">

                  <div class="home_cookies_content_item_label txt_20">
                  (<?= str_pad($index + 1, 2, '0', STR_PAD_LEFT) ?>)
                </div>
                  <div class="home_cookies_content_item_title txt_48" data-category-link="<?= esc_url(get_term_link($item)) ?>"> <?= esc_html($item->name) ?></div>
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
                  $workshop_name = get_the_title();
                  $workshop_date = get_field('date', get_the_ID());
                  $workshop_cost = get_field('cost', get_the_ID());
                  $post_thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');
                  $post_excerpt = get_field('short_description', get_the_ID());
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
                <div class="home_workshop_slide_item_des txt_16"><?php echo wp_kses_post($post_excerpt); ?></div>
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
                <a href="<?= esc_url($item['link_instagram']) ?>" class="home_cake_slide_item swiper-slide img_full">
                  <img src="<?= esc_url(wp_get_attachment_url($item['image'])) ?>" alt="">
                  <div class="home_cake_slide_item_overlay">
                    <div class="home_cake_slide_item_overlay_icon img_full">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/icon_instagram.svg" alt="">
                    </div>
                  </div>
                </a>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </section>
    </div>


<?php get_footer(); ?>
