<?php
/**
 * Template Name: Chi tiết Bài viết
 * Description:
 *
 * Tip:
 *
 * @package WordPress
 * @subpackage chloe_pallete
 * @since chloe_pallete 1.0
 */

get_header();
wp_enqueue_style( 'workshop_detail-css', get_template_directory_uri() . '/css/workshop_detail.css');
wp_enqueue_script( 'workshop_detail-js', get_template_directory_uri() . '/js/workshop_detail.js');

$pageID = get_queried_object_id();
    $workshop_detail_des = tr_posts_field('workshop_detail_des', $pageID);
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
                <div class="productdetail_breadcrum_item current txt_14">Vintage cake masterclass</div>
            </div>
        </div>
    </section>
    <section class="workshopdetail_content">
        <div class="kl_container">
            <div class="workshopdetail_content_title txt_title">Vintage cake masterclass</div>
            <div class="workshopdetail_content_img img_full">
                <img src="<?php echo get_template_directory_uri(); ?>/images/workshop_detail.webp" alt="">
            </div>
            <div class="workshopdetail_content_info">
                <div class="workshopdetail_content_info_item">
                    <div class="workshopdetail_content_info_item_title txt_center txt_14 txt_uppercase txt_wh_500">WORKSHOPS </div>
                    <div class="workshopdetail_content_info_item_des txt_16 txt_center txt_wh_500">Vintage Cake</div>
                </div>
                <div class="workshopdetail_content_info_item">
                    <div class="workshopdetail_content_info_item_title txt_center txt_14 txt_uppercase txt_wh_500">Date </div>
                    <div class="workshopdetail_content_info_item_des txt_16 txt_center txt_wh_500">November 7, 2025 –<br> 7:00PM-9:30PM</div>
                </div>
                <div class="workshopdetail_content_info_item">
                    <div class="workshopdetail_content_info_item_title txt_center txt_14 txt_uppercase txt_wh_500">Location </div>
                    <div class="workshopdetail_content_info_item_des txt_16 txt_center txt_wh_500">173 King St E, Toronto, ON, M5A <br>1J4</div>
                </div>
                <div class="workshopdetail_content_info_item">
                    <div class="workshopdetail_content_info_item_title txt_center txt_14 txt_uppercase txt_wh_500">Cost </div>
                    <div class="workshopdetail_content_info_item_des txt_16 txt_center txt_wh_500">$110</div>
                </div>
                <a href="#" class="workshopdetail_content_info_button">
                    <div class="workshopdetail_content_info_button_txt txt_16 txt_uppercase txt_wh_500 color_white">Join now</div>
                    <div class="workshopdetail_content_info_button_icon img_full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-right-white.svg" alt="">
                    </div>
                </a>
            </div>
            <div class="workshopdetail_content_des_wrap">
                <div class="workshopdetail_content_des"><?= wp_kses_post($workshop_detail_des) ?></div>
                <a href="#" class="workshopdetail_content_info_button bottom">
                        <div class="workshopdetail_content_info_button_txt txt_16 txt_uppercase txt_wh_500 color_white">Join now</div>
                        <div class="workshopdetail_content_info_button_icon img_full">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-right-white.svg" alt="">
                        </div>
                </a>
            </div>
        </div>
    </section>
<?php get_footer(); ?>