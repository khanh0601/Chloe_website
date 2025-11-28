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
$pageID = get_queried_object_id();
// Banner Chính
$banner = tr_posts_field('banner', $pageID); // Mỗi item: ['image', 'subtitle', 'title', 'order', 'link']

// About Cake
$about_subtitle = tr_posts_field('about_subtitle', $pageID);
$about_title = tr_posts_field('about_title', $pageID);
$about_text_1 = tr_posts_field('about_text_1', $pageID);
$about_image = wp_get_attachment_url(tr_posts_field('about_image', $pageID));
$about_text_2 = tr_posts_field('about_text_2', $pageID);
$about_readmore = tr_posts_field('about_readmore', $pageID);
$about_link = tr_posts_field('about_link', $pageID);

// Choose Us
$choose_subtitle = tr_posts_field('choose_subtitle', $pageID);
$choose_title = tr_posts_field('choose_title', $pageID);
$choose_image = wp_get_attachment_url(tr_posts_field('choose_image', $pageID));
$choose_items = tr_posts_field('choose_items', $pageID); // Mỗi item: ['num', 'title', 'des', 'read_more', 'link']

// Message Cake
$message_image = wp_get_attachment_url(tr_posts_field('message_image', $pageID));
$message_des = tr_posts_field('message_des', $pageID);
$message_order = tr_posts_field('message_order', $pageID);
$message_link = tr_posts_field('message_link', $pageID);

// Our Mission
$mission_title = tr_posts_field('mission_title', $pageID);
$mission_des = tr_posts_field('mission_des', $pageID);
$mission_image1 = wp_get_attachment_url(tr_posts_field('mission_image1', $pageID));
$mission_image2 = wp_get_attachment_url(tr_posts_field('mission_image2', $pageID));
?>
  <div class="main" data-barba-namespace="ourStory">
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
    <section class="story_choose">
        <div class="kl_container">
            <div class="story_choose_inner kl_grid">
                <div class="story_choose_left">
                    <div class="story_choose_left_info">
                        <div class="story_choose_left_subtitle txt_subtitle block_title"><?= wp_kses_post($choose_subtitle) ?></div>
                        <div class="story_choose_left_title txt_title"><?= wp_kses_post($choose_title) ?></div>
                    </div>
                    <div class="story_choose_left_img img_full">
                        <img src="<?php echo $choose_image ?>" alt="">
                    </div>
                </div>
                <div class="story_choose_right_wrap">
                  <div class="story_choose_right">
                    <?php if (!empty($choose_items)) : ?>
                      <?php foreach ($choose_items as $item): ?>
                        <div class="story_choose_right_item">
                            <div class="story_choose_right_item_num txt_16"><?= $item['num'] ?></div>
                            <div class="story_choose_right_item_title txt_32 txt_title_color"><?= $item['title'] ?></div>
                            <div class="story_choose_right_item_des txt_16"><?= $item['des'] ?></div>
                            <a href="<?= $item['link'] ?>" data-cursor="txtLink" class="story_choose_right_item_link txt_wh_500 txt_16 txt_title_color hover-un">
                              <?= $item['read_more'] ?>
                              <div class="line-anim line-anim-hover"><div class="line-anim-inner line-anim-inner-hover"></div></div>
                            </a>
                            <div class="story_choose_right_item_line"></div>
                        </div>
                      <?php endforeach; ?>
                    <?php endif; ?> 
                  </div>
                  <div class="story_choose_right_panigation swiper-pagination tablet"></div>
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
    <section class="story_about">
        <div class="kl_container">
          <div class="story_about_inner">
            <div class="story_about_title txt_40">
                <?= wp_kses_post($mission_title) ?>
            </div>
            <div class="story_about_content">
              <div class="story_about_content_img img_full middle">
                <img src="<?php echo $mission_image2 ?>" alt="">
              </div>
              <div class="story_about_content_inner">
                <div class="story_about_content_des txt_16">
                  <?= wp_kses_post($mission_des) ?>
                </div>
                <div class="story_about_content_item_img img_full">
                  <img src="<?php echo $mission_image1 ?>" alt="">
                </div>
              </div>
            </div>
          </div>

        </div>
    </section>
  </div>
<?php get_footer(); ?>