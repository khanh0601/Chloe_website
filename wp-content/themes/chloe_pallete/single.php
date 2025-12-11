<?php
    /**
     * The Template for displaying all single posts.
     *
     * @package WordPress
     * @subpackage chloe_pallete
     * @since chloe_pallete 1.0
     */

    $pageClass = 'on_dark';

    get_header(null, array('pageClass' => $pageClass));
    wp_enqueue_style('workshop_detail-css', get_template_directory_uri() . '/css/workshop_detail.css');
    wp_enqueue_script('workshop_detail-js', get_template_directory_uri() . '/js/workshop_detail.js');

    $pageID = get_queried_object_id();
    // Lấy ACF fields - KHÔNG CÓ GROUP, LẤY TRỰC TIẾP
    $workshop_name     = get_field('workshops', get_the_ID());
    $post_excerpt      = get_field('short_description', get_the_ID());
    $workshop_date     = get_field('date', get_the_ID());
    $workshop_time     = get_field('time', get_the_ID());
    $workshop_location = get_field('location', get_the_ID());
    $workshop_cost     = get_field('cost', get_the_ID());

    // Lấy dữ liệu bài viết
    $post_title     = get_the_title();
    $post_thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');
    $post_content   = get_the_content();

    // Lấy category/term của post
    // $categories = get_the_terms(get_the_ID(), 'category');
    $category_link = $categories ? get_term_link($categories[0]) : '#';
    $category_name = $categories ? $categories[0]->name : 'Workshop';

    $workshop_query = new WP_Query($args);
?>
    <section class="productdetail_breadcrum">
        <div class="kl_container">
            <div class="productdetail_breadcrum_inner">
                <a href="/" class="productdetail_breadcrum_item border_line  txt_14">
                    <div class="productdetail_breadcrum_item_overlay"></div>
                    Home</a>
                <a href="#" class="productdetail_breadcrum_item border_line txt_14">
                    <div class="productdetail_breadcrum_item_overlay"></div>
                    Workshop</a>
                <div class="productdetail_breadcrum_item current txt_14"><?php echo esc_html($post_title); ?></div>
            </div>
        </div>
    </section>
    <section class="workshopdetail_content">
        <div class="kl_container">
            <div class="workshopdetail_content_title txt_title"><?php echo esc_html($post_title); ?></div>
            <div class="workshopdetail_content_img img_full">
                 <?php if ($post_thumbnail): ?>
                    <img src="<?php echo esc_url($post_thumbnail); ?>" alt="<?php echo esc_attr($post_title); ?>">
                <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/workshop_detail.webp" alt="">
                <?php endif; ?>
            </div>
            <div class="workshopdetail_content_info">
                <div class="workshopdetail_content_info_item">
                    <div class="workshopdetail_content_info_item_title txt_center txt_14 txt_uppercase txt_wh_500">WORKSHOPS </div>
                    <div class="workshopdetail_content_info_item_des txt_16 txt_center txt_wh_500">                                                                                                    <?php echo esc_html($workshop_name ?: 'Vintage Cake 1'); ?></div>
                </div>
                <div class="workshopdetail_content_info_item">
                    <div class="workshopdetail_content_info_item_title txt_center txt_14 txt_uppercase txt_wh_500">Date </div>
                    <div class="workshopdetail_content_info_item_des txt_16 txt_center txt_wh_500"><?php echo $workshop_date ? nl2br(esc_html($workshop_date)) : 'TBA'; ?> -<br><?php echo $workshop_time ? nl2br(esc_html($workshop_time)) : 'time'; ?></div>
                </div>
                <div class="workshopdetail_content_info_item">
                    <div class="workshopdetail_content_info_item_title txt_center txt_14 txt_uppercase txt_wh_500">Location </div>
                    <div class="workshopdetail_content_info_item_des txt_16 txt_center txt_wh_500">                                                                                                    <?php echo $workshop_location ? nl2br(esc_html($workshop_location)) : 'TBA'; ?></div>
                </div>
                <div class="workshopdetail_content_info_item">
                    <div class="workshopdetail_content_info_item_title txt_center txt_14 txt_uppercase txt_wh_500">Cost </div>
                    <div class="workshopdetail_content_info_item_des txt_16 txt_center txt_wh_500"><?php echo esc_html($workshop_cost ?: '$110'); ?></div>
                </div>
                <a href="#" data-cursor="hidden" class="btn workshopdetail_content_info_button">
                    <div class="btn_txt_wrap">
                        <div class="btn_txt color_white txt_16 txt_wh_500">Join now</div>
                        <div class="btn_txt color_white txt_16 txt_wh_500">Join now</div>
                    </div>
                    <div class="btn_ic_wrap">
                        <div class="btn_ic home_hero_des_link_icon img_full">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-right-white.svg" alt="" />
                        </div>
                        <div class="btn_ic home_hero_des_link_icon img_full">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-right-white.svg" alt="" />
                        </div>
                    </div>
                </a>
            </div>
            <div class="workshopdetail_content_des_wrap">
                <div class="workshopdetail_content_des_title txt_24"><?php echo wp_kses_post($post_excerpt ?: 'Short Description'); ?></div>
                <div class="workshopdetail_content_des txt_16">                                                                <?php echo wp_kses_post($post_content); ?></div>
                <a href="#" data-cursor="hidden" class="btn workshopdetail_content_info_button bottom">
                    <div class="btn_txt_wrap">
                        <div class="btn_txt home_hero_des_link_txt color_white txt_16 txt_wh_500">Join now</div>
                        <div class="btn_txt home_hero_des_link_txt color_white txt_16 txt_wh_500">Join now</div>
                    </div>
                    <div class="btn_ic_wrap">
                        <div class="btn_ic home_hero_des_link_icon img_full">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-right-white.svg" alt="" />
                        </div>
                        <div class="btn_ic home_hero_des_link_icon img_full">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-right-white.svg" alt="" />
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
<?php get_footer(); ?>