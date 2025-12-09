<?php
    /**
     * The Template for displaying product archives, including the main shop page which is a post type archive
     *
     * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
     *
     * HOWEVER, on occasion WooCommerce will need to update template files and you
     * (the theme developer) will need to copy the new files to your theme to
     * maintain compatibility. We try to do this as little as possible, but it does
     * happen. When this occurs the version of the template file will be bumped and
     * the readme will list any important changes.
     *
     * @see https://woocommerce.com/document/template-structure/
     * @package WooCommerce\Templates
     * @version 8.6.0
     */
    get_header();
    wp_enqueue_style('shop-css', get_template_directory_uri() . '/css/shop.css');
    wp_enqueue_script('shop-js', get_template_directory_uri() . '/js/shop.js');
?>
<div class="main" data-barba-namespace="shop">
  <section class="shop_content">
    <div class="kl_container">
      <div class="shop_content_title txt_center txt_500_wh">Shop</div>
      <div class="shop_content_list">
        <div class="shop_content_list_search">
          <div class="shop_content_list_search_left">
            <button class="filter-toggle txt_16" type="button">
              <span>Cake categories</span>
              <span class="filter-icon img_full"
                ><img src="<?php echo get_template_directory_uri(); ?>/images/icon_plus.svg" alt=""
              /></span>
            </button>
            <div class="filter-dropdown shop_category txt_16">
              <label
                ><input type="checkbox" name="category" value="birthday" />
                Birthday Cakes</label
              >
              <label
                ><input type="checkbox" name="category" value="wedding" />
                Wedding Cakes</label
              >
              <label
                ><input type="checkbox" name="category" value="custom" />
                Custom Cakes</label
              >
              <label
                ><input type="checkbox" name="category" value="cupcakes" />
                Cupcakes</label
              >
            </div>
          </div>
          <div class="shop_content_list_search_right">
            <div class="shop_content_list_search_right_sortby">
              <button class="filter-toggle txt_16" type="button">
                <span>Sort by</span>
                <span class="filter-icon img_full"
                  ><img src="<?php echo get_template_directory_uri(); ?>/images/icon_plus.svg" alt=""
                /></span>
              </button>
              <div class="filter-dropdown txt_16">
                <label
                  ><input type="radio" name="sort" value="popular" /> Most
                  Popular</label
                >
                <label
                  ><input type="radio" name="sort" value="newest" />
                  Newest</label
                >
                <label
                  ><input type="radio" name="sort" value="price-low" /> Price:
                  Low to High</label
                >
                <label
                  ><input type="radio" name="sort" value="price-high" />
                  Price: High to Low</label
                >
                <label
                  ><input type="radio" name="sort" value="name" /> Name:
                  A-Z</label
                >
              </div>
            </div>
            <div class="shop_content_list_search_right_search">
              <input
                type="text"
                placeholder="Search for cake, categories..."
                class="search-input"
              />
              <div
                class="shop_content_list_search_right_search_icon svg_full"
              >
                <svg
                  width="100%"
                  viewBox="0 0 20 20"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M17.5 17.5L13.875 13.875M15.8333 9.16667C15.8333 12.8486 12.8486 15.8333 9.16667 15.8333C5.48477 15.8333 2.5 12.8486 2.5 9.16667C2.5 5.48477 5.48477 2.5 9.16667 2.5C12.8486 2.5 15.8333 5.48477 15.8333 9.16667Z"
                    stroke="currentColor"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  ></path>
                </svg>
              </div>
            </div>
          </div>
        </div>
        <div class="shop_content_list_card">
          <div class="shop_content_list_card_item">
            <div class="shop_content_list_card_item_top">
              <div
                class="shop_content_list_card_item_top_type txt_uppercase txt_12"
              >
                Chantilly Cake
              </div>
              <div
                class="shop_content_list_card_item_top_soldout txt_uppercase txt_12 active"
              >
                SOLD OUT
              </div>
            </div>
            <div class="shop_content_list_card_item_img img_full">
              <img src="<?php echo get_template_directory_uri(); ?>/images/image_cake.jpg" alt="" />
            </div>
            <div class="shop_content_list_card_item_info">
              <div class="shop_content_list_card_item_info_title txt_subtitle">
                Butter Croissant
              </div>
              <div
                class="shop_content_list_card_item_info_price txt_14 txt_wh_500"
              >
                <span>$160</span> - <span>$170</span>
              </div>
              <div class="shop_content_list_card_item_info_cart_wrap">
                <div class="shop_content_list_card_item_info_cart img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/cart.svg" alt="" />
                </div>
              </div>
            </div>
          </div>
          <div class="shop_content_list_card_item">
            <div class="shop_content_list_card_item_top">
              <div
                class="shop_content_list_card_item_top_type txt_uppercase txt_12"
              >
                Chantilly Cake
              </div>
              <div
                class="shop_content_list_card_item_top_soldout txt_uppercase txt_12"
              >
                SOLD OUT
              </div>
            </div>
            <div class="shop_content_list_card_item_img img_full">
              <img src="<?php echo get_template_directory_uri(); ?>/images/image_cake.jpg" alt="" />
            </div>
            <div class="shop_content_list_card_item_info">
              <div class="shop_content_list_card_item_info_title txt_subtitle">
                Butter Croissant
              </div>
              <div
                class="shop_content_list_card_item_info_price txt_14 txt_wh_500"
              >
                <span>$160</span> - <span>$170</span>
              </div>
              <div class="shop_content_list_card_item_info_cart_wrap">
                <div class="shop_content_list_card_item_info_cart img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/cart.svg" alt="" />
                </div>
              </div>
            </div>
          </div>
          <div class="shop_content_list_card_item ">
            <div class="shop_content_list_card_item_top">
              <div
                class="shop_content_list_card_item_top_type txt_uppercase txt_12"
              >
                Chantilly Cake
              </div>
              <div
                class="shop_content_list_card_item_top_soldout txt_uppercase txt_12"
              >
                SOLD OUT
              </div>
            </div>
            <div class="shop_content_list_card_item_img img_full">
              <img src="<?php echo get_template_directory_uri(); ?>/images/image_cake.jpg" alt="" />
            </div>
            <div class="shop_content_list_card_item_info">
              <div class="shop_content_list_card_item_info_title txt_subtitle">
                Butter Croissant
              </div>
              <div
                class="shop_content_list_card_item_info_price txt_14 txt_wh_500"
              >
                <span>$160</span> - <span>$170</span>
              </div>
              <div class="shop_content_list_card_item_info_cart_wrap">
                <div class="shop_content_list_card_item_info_cart img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/cart.svg" alt="" />
                </div>
              </div>
            </div>
          </div>
          <div class="shop_content_list_card_item ">
            <div class="shop_content_list_card_item_top">
              <div
                class="shop_content_list_card_item_top_type txt_uppercase txt_12"
              >
                Chantilly Cake
              </div>
              <div
                class="shop_content_list_card_item_top_soldout txt_uppercase txt_12"
              >
                SOLD OUT
              </div>
            </div>
            <div class="shop_content_list_card_item_img img_full">
              <img src="<?php echo get_template_directory_uri(); ?>/images/image_cake.jpg" alt="" />
            </div>
            <div class="shop_content_list_card_item_info">
              <div class="shop_content_list_card_item_info_title txt_subtitle">
                Butter Croissant
              </div>
              <div
                class="shop_content_list_card_item_info_price txt_14 txt_wh_500"
              >
                <span>$160</span> - <span>$170</span>
              </div>
              <div class="shop_content_list_card_item_info_cart_wrap">
                <div class="shop_content_list_card_item_info_cart img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/cart.svg" alt="" />
                </div>
              </div>
            </div>
          </div>
          <div class="shop_content_list_card_item ">
            <div class="shop_content_list_card_item_top">
              <div
                class="shop_content_list_card_item_top_type txt_uppercase txt_12"
              >
                Chantilly Cake
              </div>
              <div
                class="shop_content_list_card_item_top_soldout txt_uppercase txt_12"
              >
                SOLD OUT
              </div>
            </div>
            <div class="shop_content_list_card_item_img img_full">
              <img src="<?php echo get_template_directory_uri(); ?>/images/image_cake.jpg" alt="" />
            </div>
            <div class="shop_content_list_card_item_info">
              <div class="shop_content_list_card_item_info_title txt_subtitle">
                Butter Croissant
              </div>
              <div
                class="shop_content_list_card_item_info_price txt_14 txt_wh_500"
              >
                <span>$160</span> - <span>$170</span>
              </div>
              <div class="shop_content_list_card_item_info_cart_wrap">
                <div class="shop_content_list_card_item_info_cart img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/cart.svg" alt="" />
                </div>
              </div>
            </div>
          </div>
          <div class="shop_content_list_card_item ">
            <div class="shop_content_list_card_item_top">
              <div
                class="shop_content_list_card_item_top_type txt_uppercase txt_12"
              >
                Chantilly Cake
              </div>
              <div
                class="shop_content_list_card_item_top_soldout txt_uppercase txt_12 active"
              >
                SOLD OUT
              </div>
            </div>
            <div class="shop_content_list_card_item_img img_full">
              <img src="<?php echo get_template_directory_uri(); ?>/images/image_cake.jpg" alt="" />
            </div>
            <div class="shop_content_list_card_item_info">
              <div class="shop_content_list_card_item_info_title txt_subtitle">
                Butter Croissant
              </div>
              <div
                class="shop_content_list_card_item_info_price txt_14 txt_wh_500"
              >
                <span>$160</span> - <span>$170</span>
              </div>
              <div class="shop_content_list_card_item_info_cart_wrap">
                <div class="shop_content_list_card_item_info_cart img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/cart.svg" alt="" />
                </div>
              </div>
            </div>
          </div>
          <div class="shop_content_list_card_item ">
            <div class="shop_content_list_card_item_top">
              <div
                class="shop_content_list_card_item_top_type txt_uppercase txt_12"
              >
                Chantilly Cake
              </div>
              <div
                class="shop_content_list_card_item_top_soldout txt_uppercase txt_12 active"
              >
                SOLD OUT
              </div>
            </div>
            <div class="shop_content_list_card_item_img img_full">
              <img src="<?php echo get_template_directory_uri(); ?>/images/image_cake.jpg" alt="" />
            </div>
            <div class="shop_content_list_card_item_info">
              <div class="shop_content_list_card_item_info_title txt_subtitle">
                Butter Croissant
              </div>
              <div
                class="shop_content_list_card_item_info_price txt_14 txt_wh_500"
              >
                <span>$160</span> - <span>$170</span>
              </div>
              <div class="shop_content_list_card_item_info_cart_wrap">
                <div class="shop_content_list_card_item_info_cart img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/cart.svg" alt="" />
                </div>
              </div>
            </div>
          </div>
          <div class="shop_content_list_card_item ">
            <div class="shop_content_list_card_item_top">
              <div
                class="shop_content_list_card_item_top_type txt_uppercase txt_12"
              >
                Chantilly Cake
              </div>
              <div
                class="shop_content_list_card_item_top_soldout txt_uppercase txt_12 active"
              >
                SOLD OUT
              </div>
            </div>
            <div class="shop_content_list_card_item_img img_full">
              <img src="<?php echo get_template_directory_uri(); ?>/images/image_cake.jpg" alt="" />
            </div>
            <div class="shop_content_list_card_item_info">
              <div class="shop_content_list_card_item_info_title txt_subtitle">
                Butter Croissant
              </div>
              <div
                class="shop_content_list_card_item_info_price txt_14 txt_wh_500"
              >
                <span>$160</span> - <span>$170</span>
              </div>
              <div class="shop_content_list_card_item_info_cart_wrap">
                <div class="shop_content_list_card_item_info_cart img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/cart.svg" alt="" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="shop_content_list_paging">
          <a href="#" class="shop_content_list_paging_prev txt_16 txt_title_color">Prev</a>
          <div class="shop_content_list_paging_num">
              <a href="#" class="shop_content_list_paging_num_txt txt_16">1</a>
              <a href="#" class="shop_content_list_paging_num_txt txt_16">...</a>
              <a href="#" class="shop_content_list_paging_num_txt txt_16">14</a>
              <a href="#" class="shop_content_list_paging_num_txt txt_16">15</a>
              <a href="#" class="shop_content_list_paging_num_txt txt_16 active">16</a>
              <a href="#" class="shop_content_list_paging_num_txt txt_16">...</a>
              <a href="#" class="shop_content_list_paging_num_txt txt_16">30</a>
          </div>
          <a href="#" class="shop_content_list_paging_prev txt_16 txt_title_color">Next</a>
        </div>
      </div>
    </div>
  </section>
</div>

<?php get_footer(); ?>