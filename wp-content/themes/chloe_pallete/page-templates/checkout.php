<?php
/**
 * Template Name: check out
 * Description:
 *
 * Tip:
 *
 * @package WordPress
 * @subpackage chloe_pallete
 * @since chloe_pallete 1.0
 */

 $pageClass = 'on_dark';

 get_header(null, array('pageClass' => $pageClass));
wp_enqueue_style( 'contact-css', get_template_directory_uri() . '/css/checkout.css');
// wp_enqueue_script( 'contact-js', get_template_directory_uri() . '/js/.js');

?>
    <div class="main" data-barba-namespace="checkout">
      <section class="checkout">
        <div class="menu_cart_inner" data-lenis-prevent>
          <div class="menu_cart_head">
            <div class="menu_cart_title txt_32">
              <?php 
              $cart_count = WC()->cart->get_cart_contents_count();
              echo 'Cart (' . esc_html($cart_count) . ')';
              ?>
            </div>
          </div>
          <div class="menu_cart_content">
            <?php
            if (function_exists('WC') && !WC()->cart->is_empty()) {
              foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
                
                if ($_product && $_product->exists() && $cart_item['quantity'] > 0) {
                  // Lấy thông tin sản phẩm
                  $product_name = $_product->get_name();
                  $product_permalink = $_product->get_permalink();
                  $product_image = $_product->get_image('thumbnail');
                  $product_price = $_product->get_price();
                  $product_regular_price = $_product->get_regular_price();
                  $product_sale_price = $_product->get_sale_price();
                  $quantity = $cart_item['quantity'];
                  $line_total = $cart_item['line_total'];
                  
                  // Lấy category
                  $categories = get_the_terms($product_id, 'product_cat');
                  $category_name = '';
                  if ($categories && !is_wp_error($categories)) {
                    foreach ($categories as $cat) {
                      if ($cat->slug !== 'uncategorized') {
                        $category_name = $cat->name;
                        break;
                      }
                    }
                  }
                  
                  // Lấy variation attributes nếu có
                  $variation_attributes = '';
                  if (isset($cart_item['variation']) && !empty($cart_item['variation'])) {
                    $variation_attributes = wc_get_formatted_variation($cart_item['variation'], true);
                  }
                  ?>
                  <div class="menu_cart_content_item" data-cart-item-key="<?php echo esc_attr($cart_item_key); ?>">
                    <div class="menu_cart_content_item_img img_abs">
                      <div class="menu_cart_content_item_img_overlay"></div>
                      <?php 
                      $thumbnail = $_product->get_image('thumbnail');
                      if ($thumbnail) {
                        echo $thumbnail;
                      } else {
                        echo '<img src="' . get_template_directory_uri() . '/images/img_cart.webp" alt="">';
                      }
                      ?>
                    </div>
                    <div class="menu_cart_content_item_info">
                      <?php if ($category_name) : ?>
                        <div class="menu_cart_content_item_info_cate txt_12"><?php echo esc_html($category_name); ?></div>
                      <?php endif; ?>
                      <div class="menu_cart_content_item_info_name txt_title_color txt_wh_500 txt_16">
                        <?php echo esc_html($product_name); ?>
                        <?php if ($variation_attributes) : ?>
                          <div class="menu_cart_content_item_info_variation txt_12"><?php echo $variation_attributes; ?></div>
                        <?php endif; ?>
                      </div>
                      <div class="menu_cart_content_item_info_price txt_14">
                        <?php if ($product_sale_price && $product_sale_price < $product_regular_price) : ?>
                          <div class="menu_cart_content_item_info_price_new txt_14"><?php echo wc_price($product_sale_price); ?></div>
                          -
                          <div class="menu_cart_content_item_info_price_old txt_14"><?php echo wc_price($product_regular_price); ?></div>
                        <?php else : ?>
                          <div class="menu_cart_content_item_info_price_new txt_14"><?php echo wc_price($product_price); ?></div>
                        <?php endif; ?>
                      </div>
                      <div class="menu_cart_content_item_info_amount txt_14">
                        <div class="menu_cart_content_item_info_amount_reduce img_full" data-cart-item-key="<?php echo esc_attr($cart_item_key); ?>" data-action="decrease">
                          <img src="<?php echo get_template_directory_uri(); ?>/images/tru.svg" alt="">
                        </div>
                        <div class="menu_cart_content_item_info_amount_txt txt_14" data-quantity="<?php echo esc_attr($quantity); ?>"><?php echo esc_html($quantity); ?></div>
                        <div class="menu_cart_content_item_info_amount_increate img_full" data-cart-item-key="<?php echo esc_attr($cart_item_key); ?>" data-action="increase">
                          <img src="<?php echo get_template_directory_uri(); ?>/images/plus.svg" alt="">
                        </div>
                      </div>
                    </div>
                    <div class="menu_cart_content_item_remove txt_14 hover-un" data-cursor="txtLink" data-cart-item-key="<?php echo esc_attr($cart_item_key); ?>" data-action="remove">
                      Remove
                      <div class="line-anim line-anim-hover"><div class="line-anim-inner line-anim-inner-hover"></div></div>
                    </div>
                  </div>
                  <?php
                }
              }
            } else {
              ?>
              <div class="menu_cart_content_empty txt_16 txt_title_color">
                Your cart is empty.
              </div>
              <?php
            }
            ?>
          </div>
          <div class="menu_cart_button">
            <div class="menu_cart_button_total">
              <div class="menu_cart_button_total_txt txt_16 txt_title_color">
                <?php 
                $cart_count = WC()->cart->get_cart_contents_count();
                $items_text = $cart_count == 1 ? 'item' : 'items';
                echo 'Subtotal (' . esc_html($cart_count) . ' ' . $items_text . ')';
                ?>
              </div>
              <div class="menu_cart_button_total_price txt_24 txt_wh_500 txt_title_color">
                <?php echo WC()->cart->get_cart_subtotal(); ?>
              </div>
            </div>
          </div>
      </div>
      <div class="checkout_deli">
        <form action="#" method="post">
          <div class="checkout_deli_title txt_44 ">Delivery Information</div>
          <div class="checkout_deli_info">
            <div class="checkout_deli_info_title txt_20 ">Personal information</div>
            <div class="checkout_deli_info_form">
              <div class="checkout_deli_info_form_row">
                <input type="text" id="name" name="name" placeholder="Name *" required>
              </div>
              <div class="checkout_deli_info_form_row2">
                <input type="tel" id="phone" placeholder="Phone number" name="phone">
                <input type="email" id="email" placeholder="Email" name="email">
              </div>
            </div>
          </div>
          <div class="checkout_deli_info">
            <div class="checkout_deli_info_title txt_20 ">Address</div>
            <div class="checkout_deli_info_form">
              <div class="checkout_deli_info_form_row">
                <input type="text" id="address" placeholder="Address" name="address">
              </div>
              <div class="checkout_deli_info_form_row">
                <textarea id="note" name="note" placeholder="Note (Optional)" rows="4"></textarea>
              </div>
              <div class="checkout_deli_info_check txt_14">
                <input type="checkbox" id="office_hours" name="office_hours">
                <label for="office_hours">
                  Office hours only
                </label>
              </div>
            </div>
          </div>
          <div class="checkout_deli_info">
            <div class="checkout_deli_info_title txt_20 ">Payment method</div>
            <div class="checkout_deli_info_form payment">
              <div class="checkout_deli_info_form_check">
                <input type="radio" id="cod" name="payment_method" value="cod" checked>
                <label for="cod">
                  Cash on Delivery (COD)
                </label>
              </div>
              <div class="checkout_deli_info_form_check">
                <input type="radio" id="bank" name="payment_method" value="bank">
                <label for="bank">
                  Bank Transfer
                </label>
              </div>
            </div>
          </div>
          <div class="checkout_deli_bank_content">
            <div class="checkout_deli_des txt_16">To complete your order, kindly transfer money according to the information provided below.</div>
            <div class="checkout_deli_bank">
              <div class="checkout_deli_bank_account">
                <div class="checkout_deli_bank_account_img img_full">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/qr.png" alt="">
                </div>
                <div class="checkout_deli_bank_account_info">
                  <div class="checkout_deli_bank_account_info_bank txt_24">Vietcombank</div>
                  <div class="checkout_deli_bank_account_info_name txt_16">Anna</div>
                  <div class="checkout_deli_bank_account_info_num txt_16">007 100 083-22-88</div>
                </div>
              </div>
              <div class="checkout_deli_bank_button txt_14">Copied</div>
              <div class="checkout_deli_bank_note txt_16">Please fill in the transfer details as follows: <strong class="message_transfer">Anna- 0123 456 789</strong></div>
            </div>
          </div>
          <button type="submit" href="#" class="menu_cart_button_check btn" data-cursor="hidden">
                <div class="btn_txt_wrap">
                  <div class="btn_txt menu_cart_button_check_txt txt_wh_500 color_white txt_16 txt_uppercase">Checkout now</div>
                  <div class="btn_txt menu_cart_button_check_txt txt_wh_500 color_white txt_16 txt_uppercase">Checkout now</div>
                </div>
                <div class="btn_ic_wrap">
                  <div class="btn_ic  menu_cart_button_check_icon img_full">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-right-white.svg" alt="">
                  </div>
                  <div class=" btn_ic  menu_cart_button_check_icon img_full">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-right-white.svg" alt="">
                  </div>
                </div>
          </button>
        </form>
        </div>
      </section>
    </div>
<?php get_footer(); ?>