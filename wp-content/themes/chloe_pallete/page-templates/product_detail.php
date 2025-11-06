<?php
/**
 * Template Name: product_detail
 * Description:
 *
 * Tip:
 *
 * @package WordPress
 * @subpackage chloe_pallete
 * @since chloe_pallete 1.0
 */

get_header();
wp_enqueue_style( 'product_detail-css', get_template_directory_uri() . '/css/product_detail.css');
wp_enqueue_script( 'product_detail-js', get_template_directory_uri() . '/js/product_detail.js');

?>
<section class="productdetail_breadcrum">
    <div class="kl_container">
        <div class="productdetail_breadcrum_inner">
            <a href="/" class="productdetail_breadcrum_item border_line  txt_14">
                <div class="productdetail_breadcrum_item_overlay"></div>
                Home</a>
            <a href="#" class="productdetail_breadcrum_item border_line txt_14">
                <div class="productdetail_breadcrum_item_overlay"></div>
                Shop</a>
            <a href="#" class="productdetail_breadcrum_item border_line txt_14">
                <div class="productdetail_breadcrum_item_overlay"></div>
                Chantilly cake</a>
            <div class="productdetail_breadcrum_item current txt_14">Butter croissant</div>
        </div>
    </div>
</section>
<section class="productdetail_content">
    <div class="kl_container">
        <div class="productdetail_content_inner">
            <div class="productdetail_img">
                <div class="productdetail_img_inner img_full">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/product_detaial.webp" alt="">
                </div>
            </div>
            <div class="productdetail_content_info">
                <div class="productdetail_content_info_head">
                    <div class="productdetail_content_info_subtitle"></div>
                    <div class="productdetail_content_info_title"></div>
                </div>
                <div class="productdetail_content_info_detail">
                    <div class="productdetail_content_info_price">
                        <div class="productdetail_content_info_price_new"></div>
                        <div class="productdetail_content_info_price_old"></div>
                        <div class="productdetail_content_info_price_discount"></div>
                    </div>
                    <div class="productdetail_content_info_component"></div>
                    <div class="productdetail_content_info_des"></div>
                </div>
                <div class="productdetail_content_info_detail">
                    <div class="productdetail_content_info_sensa_wrap">
                        <div class="productdetail_content_info_sensa"></div>
                        <div class="productdetail_content_info_sensa_txt"></div>
                    </div>
                    <div class="productdetail_content_info_sensa_list">
                        <div class="productdetail_content_info_sensa_item"></div>
                        <div class="productdetail_content_info_sensa_item"></div>
                        <div class="productdetail_content_info_sensa_item"></div>
                    </div>

                </div>
                <div class="productdetail_content_info_detail">
                     <div class="productdetail_content_info_sensa_wrap">
                        <div class="productdetail_content_info_sensa"></div>
                        <div class="productdetail_content_info_sensa_txt"></div>
                    </div>
                </div>
                <div class="productdetail_content_info_detail">
                     <div class="productdetail_content_info_sensa_wrap">
                        <div class="productdetail_content_info_sensa"></div>
                        <div class="productdetail_content_info_sensa_txt"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>