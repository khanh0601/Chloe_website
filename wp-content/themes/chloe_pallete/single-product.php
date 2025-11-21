<?php
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
        <div class="productdetail_content_inner kl_grid">
            <div class="productdetail_img">
                <div class="productdetail_img_inner img_full">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/product_detail.webp" alt="">
                </div>
            </div>
            <div class="productdetail_content_info">
                <div class="productdetail_content_info_head">
                    <div class="productdetail_content_info_subtitle txt_subtitle block_title">Birthday Cake</div>
                    <div class="productdetail_content_info_title txt_title">Butter Croissant</div>
                </div>
                <div class="productdetail_content_info_detail">
                    <div class="productdetail_content_info_price">
                        <div class="productdetail_content_info_price_item txt_24">$160</div>
                        <div class="productdetail_content_info_price_item price_old txt_16">$170</div>
                        <div class="productdetail_content_info_price_item price_discount txt_title_color">-30%</div>
                    </div>
                    <div class="productdetail_content_info_component txt_16">Mango, Pandan & Cream Cheese</div>
                    <div class="productdetail_content_info_des txt_16">A refreshing cake made with layers of light mango mousse that brings a sweet, tropical flavor. Secret Garden becomes even more special with the combination of soft pandan sponge cake and fragrant cream cheese layers.</div>
                </div>
                <div class="productdetail_content_info_detail">
                    <div class="productdetail_content_info_sensa_wrap">
                        <div class="productdetail_content_info_sensa txt_16 txt_title_color">Cake Sensation:</div>
                        <div class="productdetail_content_info_sensa_txt txt_16">No selection</div>
                    </div>
                    <div class="productdetail_content_info_sensa_list">
                        <div class="productdetail_content_info_sensa_item txt_14 txt_title_color">Fresh</div>
                        <div class="productdetail_content_info_sensa_item txt_14 txt_title_color">Fragrant</div>
                        <div class="productdetail_content_info_sensa_item txt_14 txt_title_color">Gently sweet</div>
                    </div>

                </div>
                <div class="productdetail_content_info_detail">
                     <div class="productdetail_content_info_sensa_wrap">
                        <div class="productdetail_content_info_sensa txt_16 txt_title_color">Cake Size:</div>
                        <div class="productdetail_content_info_sensa_txt txt_16" id="sizeDisplay">6" + 4" - 2 Tier - 20 servings | $268</div>
                    </div>
                    <div class="productdetail_content_info_detail_fill">
                        <div class="productdetail_content_info_detail_fill_item">
                            <input type="radio" name="size" id="size1" value='6" + 4" - 2 Tier - 20 servings | $268 ' checked>
                            <label for="size1" class="txt_16 txt_title_color">
                                6" + 4" - 2 Tier - 20 servings | $268
                            </label>
                        </div>
                        <div class="productdetail_content_info_detail_fill_item">
                            <input type="radio" name="size" id="size2" value=' 8" + 6" - 2 Tier - 35 servings | $360'>
                            <label for="size2" class="txt_16 txt_title_color">
                                8" + 6" - 2 Tier - 35 servings | $360
                            </label>
                        </div>
                        <div class="productdetail_content_info_detail_fill_item">
                            <input type="radio" name="size" id="size3" value='8" + 6" + 4" - 3 Tier - 42 Servings | $440'>
                            <label for="size3" class="txt_16 txt_title_color">
                                8" + 6" + 4" - 3 Tier - 42 Servings | $440
                            </label>
                        </div>
                        <div class="productdetail_content_info_detail_fill_item">
                            <input type="radio" name="size" id="size4" value='6" + 4" - 2 Tier - 20 servings | $268 '>
                            <label for="size4" class="txt_16 txt_title_color">
                                6" + 4" - 2 Tier - 20 servings | $268
                            </label>
                        </div>
                    </div>
                </div>
                <div class="productdetail_content_info_detail">
                     <div class="productdetail_content_info_sensa_wrap">
                        <div class="productdetail_content_info_sensa txt_16 txt_title_color">Cake Flavour/Filling:</div>
                        <div class="productdetail_content_info_sensa_txt txt_16" id="flavorDisplay">Chocolate + Cookies Cream</div>
                    </div>
                    <div class="productdetail_content_info_detail_fill">
                        <div class="productdetail_content_info_detail_fill_item">
                            <input type="radio" name="flavor" id="flavor1" value="Chocolate + Cookies Cream" checked>
                            <label for="flavor1" class="txt_16 txt_title_color">
                                Chocolate + Cookies Cream
                            </label>
                        </div>
                        <div class="productdetail_content_info_detail_fill_item">
                            <input type="radio" name="flavor" id="flavor2" value=" Funfetti + Vanilla">
                            <label for="flavor2" class="txt_16 txt_title_color">
                                Funfetti + Vanilla
                            </label>
                        </div>
                        <div class="productdetail_content_info_detail_fill_item">
                            <input type="radio" name="flavor" id="flavor3" value="Lemon + Raspberry">
                            <label for="flavor3" class="txt_16 txt_title_color">
                                Lemon + Raspberry
                            </label>
                        </div>
                        <div class="productdetail_content_info_detail_fill_item">
                            <input type="radio" name="flavor" id="flavor4" value=" Red Velvet + Cream Cheese">
                            <label for="flavor4" class="txt_16 txt_title_color">
                                Red Velvet + Cream Cheese
                            </label>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<section class="home_seller overflow_hidden">
    <div class="kl_container">
        <div class="home_seller_inner">
        <div class="home_seller_content">
            <div
            class="home_seller_content_subtitle txt_subtitle txt_uppercase block_title"
            >
            Related products
            </div>
            <div class="home_seller_content_title txt_title">
            Related products
            </div>
        </div>
        <div class="home_seller_shop">
            <a href="#" class="home_seller_shop_link">
                <div class="home_seller_shop_link_txt txt_16 txt_uppercase txt_wh_500 txt_title_color">Shop now</div>
                <div class="home_seller_shop_link_icon img_full">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-right.svg" alt="">
                </div>
            </a>
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
        <!-- <div class="swiper-pagination home_seller_pagination"></div> -->
        </div>
    </div>
</section>
<?php get_footer(); ?>