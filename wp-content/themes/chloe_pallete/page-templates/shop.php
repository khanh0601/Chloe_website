<?php
/**
 * Template Name: shop
 * Description:
 *
 * Tip:
 *
 * @package WordPress
 * @subpackage chloe_pallete
 * @since chloe_pallete 1.0
 */
// truyền class vào header khi gọi ở template page này được khôg
$pageClass = 'on_dark';

get_header(null, array('pageClass' => $pageClass));
wp_enqueue_style( 'shop-css', get_template_directory_uri() . '/css/shop.css');

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
              <?php
              // Get all product categories
              $product_categories = get_terms( array(
                'taxonomy'   => 'product_cat',
                'hide_empty' => false, // Show all categories even if empty
                'orderby'    => 'name',
                'order'      => 'ASC',
              ) );
              
              if ( ! empty( $product_categories ) && ! is_wp_error( $product_categories ) ) :
                foreach ( $product_categories as $category ) :
                  // Skip uncategorized category
                  if ( $category->slug === 'uncategorized' ) {
                    continue;
                  }
              ?>
                <label>
                  <input type="checkbox" name="category" value="<?php echo esc_attr( $category->slug ); ?>" />
                  <?php echo esc_html( $category->name ); ?>
                </label>
              <?php
                endforeach;
              else :
              ?>
                <label>No categories found</label>
              <?php
              endif;
              ?>
            </div>
          </div>
          <div class="shop_content_list_search_right">
            <div class="shop_content_list_search_right_sortby">
              <button class="filter-toggle txt_16" type="button">
                <span>Sort by</span>
                <div class="filter-icon img_full"
                  ><img src="<?php echo get_template_directory_uri(); ?>/images/icon_plus.svg" alt=""
                /></div>
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
          <?php
          // Get pagination
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $products_per_page = 12; // Số products mỗi trang
          
          // Query arguments
          $args = array(
            'post_type'      => 'product',
            'posts_per_page' => $products_per_page,
            'paged'          => $paged,
            'post_status'    => 'publish',
            'orderby'        => 'date',
            'order'          => 'DESC'
          );
          
          // Query products
          $products_query = new WP_Query($args);
          
          if ($products_query->have_posts()) :
            while ($products_query->have_posts()) : $products_query->the_post();
              global $product;
              
              // Get product categories
              $categories = get_the_terms(get_the_ID(), 'product_cat');
              $category_name = '';
              if ($categories && !is_wp_error($categories)) {
                foreach ($categories as $cat) {
                  if ($cat->slug !== 'uncategorized') {
                    $category_name = $cat->name;
                    break;
                  }
                }
              }
              
              // Check if product is in stock
              $is_in_stock = $product->is_in_stock();
              
              // Get product image
              $image_id = $product->get_image_id();
              $image_url = '';
              if ($image_id) {
                $image_url = wp_get_attachment_image_url($image_id, 'full');
              }
              if (!$image_url) {
                $image_url = wc_placeholder_img_src();
              }
              
              // Get product price
              $regular_price = $product->get_regular_price();
              $sale_price = $product->get_sale_price();
              
              // Format price display
              if ($product->is_type('variable')) {
                // Variable product - show price range
                $min_price = $product->get_variation_price('min');
                $max_price = $product->get_variation_price('max');
                if ($min_price == $max_price) {
                  $price_display = '<span>' . wc_price($min_price) . '</span>';
                } else {
                  $price_display = '<span>' . wc_price($min_price) . '</span> - <span>' . wc_price($max_price) . '</span>';
                }
              } else {
                // Simple product
                if ($sale_price && $sale_price < $regular_price) {
                  $price_display = '<span>' . wc_price($sale_price) . '</span> - <span>' . wc_price($regular_price) . '</span>';
                } else {
                  $price_display = '<span>' . wc_price($regular_price) . '</span>';
                }
              }
              ?>
              <a href="<?php the_permalink(); ?>" class="shop_content_list_card_item">
                <div class="shop_content_list_card_item_top">
                  <?php if ($category_name) : ?>
                    <div class="shop_content_list_card_item_top_type txt_uppercase txt_12">
                      <?php echo esc_html($category_name); ?>
                    </div>
                  <?php endif; ?>
                  <div class="shop_content_list_card_item_top_soldout txt_uppercase txt_12 <?php echo !$is_in_stock ? 'active' : ''; ?>">
                    SOLD OUT
                  </div>
                </div>
                <div class="shop_content_list_card_item_img img_full">
                  <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?>" />
                </div>
                <div class="shop_content_list_card_item_info">
                  <div class="shop_content_list_card_item_info_title txt_subtitle">
                    <?php the_title(); ?>
                  </div>
                  <div class="shop_content_list_card_item_info_price txt_14 txt_wh_500">
                    <?php echo $price_display; ?>
                  </div>
                  <div class="shop_content_list_card_item_info_cart_wrap">
                    <div class="shop_content_list_card_item_info_cart img_full">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/cart.svg" alt="" />
                    </div>
                  </div>
                </div>
              </a>
              <?php
            endwhile;
            wp_reset_postdata();
          else :
            ?>
            <div class="shop_content_list_card_empty txt_16">
              No products found.
            </div>
            <?php
          endif;
          ?>
        </div>
        <?php if (isset($products_query) && $products_query->max_num_pages > 1) : ?>
        <div class="shop_content_list_paging">
          <?php
          $current_page = max(1, $paged);
          $total_pages = $products_query->max_num_pages;
          
          // Prev link
          if ($current_page > 1) {
            $prev_url = get_pagenum_link($current_page - 1);
            echo '<a href="' . esc_url($prev_url) . '" class="shop_content_list_paging_prev txt_16 txt_title_color">Prev</a>';
          } else {
            echo '<span class="shop_content_list_paging_prev txt_16 txt_title_color" style="opacity: 0.5; pointer-events: none;">Prev</span>';
          }
          
          // Page numbers
          echo '<div class="shop_content_list_paging_num">';
          
          // Always show first page
          if ($current_page > 3) {
            echo '<a href="' . esc_url(get_pagenum_link(1)) . '" class="shop_content_list_paging_num_txt txt_16">1</a>';
            if ($current_page > 4) {
              echo '<span class="shop_content_list_paging_num_txt txt_16">...</span>';
            }
          }
          
          // Show pages around current page
          $start = max(1, $current_page - 2);
          $end = min($total_pages, $current_page + 2);
          
          for ($i = $start; $i <= $end; $i++) {
            $url = get_pagenum_link($i);
            $active_class = ($i == $current_page) ? ' active' : '';
            echo '<a href="' . esc_url($url) . '" class="shop_content_list_paging_num_txt txt_16' . $active_class . '">' . $i . '</a>';
          }
          
          // Always show last page
          if ($current_page < $total_pages - 2) {
            if ($current_page < $total_pages - 3) {
              echo '<span class="shop_content_list_paging_num_txt txt_16">...</span>';
            }
            echo '<a href="' . esc_url(get_pagenum_link($total_pages)) . '" class="shop_content_list_paging_num_txt txt_16">' . $total_pages . '</a>';
          }
          
          echo '</div>';
          
          // Next link
          if ($current_page < $total_pages) {
            $next_url = get_pagenum_link($current_page + 1);
            echo '<a href="' . esc_url($next_url) . '" class="shop_content_list_paging_prev txt_16 txt_title_color">Next</a>';
          } else {
            echo '<span class="shop_content_list_paging_prev txt_16 txt_title_color" style="opacity: 0.5; pointer-events: none;">Next</span>';
          }
          ?>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
</div>

<?php get_footer(); ?>
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