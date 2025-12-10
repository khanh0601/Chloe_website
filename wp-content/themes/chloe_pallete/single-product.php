<?php
$pageClass = 'on_dark';
get_header(null, array('pageClass' => $pageClass));
wp_enqueue_style( 'product_detail-css', get_template_directory_uri() . '/css/product_detail.css');

// Enqueue WooCommerce add to cart script
if (function_exists('wc_get_template')) {
    wp_enqueue_script('wc-add-to-cart');
}

// Localize script with WooCommerce AJAX URL for home.js
$wc_ajax_url = '';
if (class_exists('WC_AJAX')) {
    $wc_ajax_url = WC_AJAX::get_endpoint('%%endpoint%%');
} else {
    // Fallback: construct WC AJAX URL manually
    $wc_ajax_url = add_query_arg('wc-ajax', '%%endpoint%%', home_url('/', 'relative'));
}

// Create nonce for custom add to cart
$custom_add_to_cart_nonce = wp_create_nonce('custom_add_to_cart_nonce');

// Localize for home-js since add to cart code is in home.js
wp_localize_script('home-js', 'wc_add_to_cart_params', array(
    'ajax_url' => admin_url('admin-ajax.php'),
    'wc_ajax_url' => $wc_ajax_url,
    'cart_url' => function_exists('wc_get_cart_url') ? wc_get_cart_url() : '',
    'cart_redirect_after_add' => get_option('woocommerce_cart_redirect_after_add', 'no'),
    'custom_add_to_cart_nonce' => $custom_add_to_cart_nonce
));

// Lấy thông tin product hiện tại
global $product;
$product_id = get_the_ID();
$product_name = get_the_title();

// Lấy category của product
$categories = get_the_terms( $product_id, 'product_cat' );
$category_name = '';
$category_link = '';

if ( $categories && ! is_wp_error( $categories ) ) {
    foreach ( $categories as $cat ) {
        if ( $cat->slug !== 'uncategorized' ) {
            $category_name = $cat->name;
            $category_link = get_term_link( $cat );
            break;
        }
    }
}

?>
<div class="main" data-barba-namespace="productDetail">
    <section class="productdetail_breadcrum">
        <div class="kl_container">
            <div class="productdetail_breadcrum_inner">
                <a href="/" class="productdetail_breadcrum_item border_line  txt_14">
                    <div class="productdetail_breadcrum_item_overlay"></div>
                    Home</a>
                <a href="/shop" class="productdetail_breadcrum_item border_line txt_14">
                    <div class="productdetail_breadcrum_item_overlay"></div>
                    Shop</a>
                <?php if ( $category_name && $category_link ) : ?>
                <a href="<?php echo esc_url( $category_link ); ?>" class="productdetail_breadcrum_item border_line txt_14">
                    <div class="productdetail_breadcrum_item_overlay"></div>
                    <?php echo esc_html( $category_name ); ?></a>
                <?php endif; ?>
                <div class="productdetail_breadcrum_item current txt_14"><?php echo esc_html( $product_name ); ?></div>
            </div>
        </div>
    </section>
    <section class="productdetail_content">
        <div class="kl_container">
            <div class="productdetail_content_inner kl_grid">
            <div class="productdetail_img">
                <div class="productdetail_img_inner img_fullfill">
                    <?php 
                    // Get product ID and object
                    $product_id = get_the_ID();
                    $product = wc_get_product($product_id);
                    
                    // Check if product exists
                    if (!$product) {
                        return;
                    }
                    
                    // Get product image
                    if (has_post_thumbnail()) {
                        echo '<img src="' . get_the_post_thumbnail_url($product_id, 'full') . '" alt="' . get_the_title() . '">';
                    } else {
                        echo '<img src="' . get_template_directory_uri() . '/images/product_detail.webp" alt="' . get_the_title() . '">';
                    } ?>
                </div>
            </div>
            <div class="productdetail_content_info">
                <div class="productdetail_content_info_head">
                    <?php 
                    // Get product categories
                    $categories = get_the_terms($product_id, 'product_cat');
                    if ($categories && !is_wp_error($categories)) {
                        $category_name = $categories[0]->name;
                        echo '<div class="productdetail_content_info_subtitle txt_subtitle block_title">' . esc_html($category_name) . '</div>';
                    }
                    ?>
                    <div class="productdetail_content_info_title txt_title"><?php echo get_the_title(); ?></div>
                </div>
                <div class="productdetail_content_info_detail">
                    <div class="productdetail_content_info_price" id="product-price-wrapper">
                        <?php
                        // Display default price (will be updated via AJAX)
                        $price = $product->get_price();
                        $regular_price = $product->get_regular_price();
                        $sale_price = $product->get_sale_price();
                        
                        if ($sale_price) {
                            echo '<div class="productdetail_content_info_price_item txt_24">$' . esc_html($sale_price) . '</div>';
                            echo '<div class="productdetail_content_info_price_item price_old txt_16">$' . esc_html($regular_price) . '</div>';
                            
                            if ($regular_price > 0) {
                                $discount = round((($regular_price - $sale_price) / $regular_price) * 100);
                                echo '<div class="productdetail_content_info_price_item price_discount txt_title_color">-' . $discount . '%</div>';
                            }
                        } else {
                            echo '<div class="productdetail_content_info_price_item txt_24">$' . esc_html($price) . '</div>';
                        }
                        ?>
                    </div>
                    
                    <?php 
                    // Get short description
                    $short_description = $product->get_short_description();
                    if ($short_description) {
                        echo '<div class="productdetail_content_info_component txt_16">' . wp_kses_post($short_description) . '</div>';
                    }
                    ?>
                </div>

                <?php
                // Store product ID for JavaScript (always needed)
                ?>
                <input type="hidden" id="product_id" value="<?php echo esc_attr($product_id); ?>">
                <?php
                
                // Check if variable product
                if ($product->is_type('variable')) {
                    $attributes = $product->get_variation_attributes();
                    $available_variations = $product->get_available_variations();
                    
                    // Store variations data in JSON for JavaScript
                    ?>
                    <input type="hidden" id="variations_data" value='<?php echo json_encode($available_variations); ?>'>
                    
                    <?php
                    // Tạo map variation IDs dựa trên attributes
                    $variation_map = array();
                    foreach ($available_variations as $variation) {
                        $variation_id = $variation['variation_id'];
                        $variation_attrs = $variation['attributes'];
                        
                        // Tạo key từ attributes
                        $map_key = '';
                        foreach ($variation_attrs as $attr_key => $attr_value) {
                            $map_key .= $attr_key . ':' . $attr_value . '|';
                        }
                        $map_key = rtrim($map_key, '|');
                        
                        if ($map_key) {
                            $variation_map[$map_key] = $variation_id;
                        }
                    }
                    ?>
                    <input type="hidden" id="variation_map" value='<?php echo json_encode($variation_map); ?>'>
                    
                    <?php
                    if (!empty($attributes)) {
                        // Build a map of attribute names to slugs from actual variation data
                        $attribute_slug_map = array();
                        foreach ($available_variations as $variation) {
                            if (isset($variation['attributes']) && is_array($variation['attributes'])) {
                                foreach ($variation['attributes'] as $attr_key => $attr_value) {
                                    // Remove 'attribute_' prefix to get the base attribute name
                                    $base_attr_name = str_replace('attribute_', '', $attr_key);
                                    // Remove 'pa_' prefix if present
                                    $base_attr_name = str_replace('pa_', '', $base_attr_name);
                                    
                                    if (!isset($attribute_slug_map[$base_attr_name])) {
                                        $attribute_slug_map[$base_attr_name] = array();
                                    }
                                    
                                    // Get the term name from slug for taxonomy attributes
                                    $taxonomy_name = 'pa_' . $base_attr_name;
                                    if (taxonomy_exists($taxonomy_name) && !empty($attr_value)) {
                                        $term = get_term_by('slug', $attr_value, $taxonomy_name);
                                        if ($term && !is_wp_error($term)) {
                                            $attribute_slug_map[$base_attr_name][$term->name] = $attr_value;
                                        }
                                    } else if (!empty($attr_value)) {
                                        // Custom attribute - slug is the value itself
                                        $attribute_slug_map[$base_attr_name][$attr_value] = $attr_value;
                                    }
                                }
                            }
                        }
                        
                        foreach ($attributes as $attribute_name => $options) {
                            if (empty($options)) {
                                continue;
                            }
                            
                            // Get attribute label
                            $attribute_label = wc_attribute_label($attribute_name);
                            $attr_id = sanitize_title($attribute_name);
                            
                            // WooCommerce uses wc_variation_attribute_name() to get the proper format
                            // This handles both taxonomy (pa_size) and custom attributes
                            $woo_attr_name = wc_variation_attribute_name($attribute_name);
                            
                            // Get slug map for this attribute
                            $option_slug_map = isset($attribute_slug_map[$attribute_name]) 
                                ? $attribute_slug_map[$attribute_name] 
                                : array();
                            ?>
                            <div class="productdetail_content_info_detail">
                                <div class="productdetail_content_info_sensa_wrap">
                                    <div class="productdetail_content_info_sensa txt_16 txt_title_color">
                                        <?php echo esc_html($attribute_label); ?>:
                                    </div>
                                    <div class="productdetail_content_info_sensa_txt txt_16" id="<?php echo $attr_id; ?>Display">
                                        <?php echo esc_html($options[0]); ?>
                                    </div>
                                </div>
                                <div class="productdetail_content_info_detail_fill">
                                    <?php foreach ($options as $index => $option) : 
                                        // Use slug from map if available, otherwise use option name
                                        $option_value = isset($option_slug_map[$option]) 
                                            ? $option_slug_map[$option] 
                                            : $option;
                                    ?>
                                        <div class="productdetail_content_info_detail_fill_item" data-cursor="hidden">
                                            <input type="radio" 
                                                    class="variation-selector"
                                                    name="attribute_<?php echo $attr_id; ?>" 
                                                    id="<?php echo $attr_id . '_' . ($index + 1); ?>" 
                                                    value="<?php echo esc_attr($option_value); ?>"
                                                    data-attribute-name="<?php echo esc_attr($woo_attr_name); ?>"
                                                    data-option-name="<?php echo esc_attr($option); ?>"
                                                    <?php echo $index === 0 ? 'checked' : ''; ?>>
                                            <label for="<?php echo $attr_id . '_' . ($index + 1); ?>" 
                                                    class="txt_16 txt_title_color">
                                                <?php echo esc_html($option); ?>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                } else {
                    // Simple product - no variations data needed
                    ?>
                    <input type="hidden" id="variations_data" value="">
                    <?php
                    
                    // Simple product - display attributes normally
                    $attributes = $product->get_attributes();
                    
                    if (!empty($attributes)) {
                        foreach ($attributes as $attribute) {
                            $attribute_name = $attribute->get_name();
                            $attribute_label = wc_attribute_label($attribute_name);
                            
                            if ($attribute->is_taxonomy()) {
                                $terms = wc_get_product_terms($product_id, $attribute_name, array('fields' => 'all'));
                                
                                if (!empty($terms) && !is_wp_error($terms)) {
                                    $attr_id = sanitize_title($attribute_name);
                                    ?>
                                    <div class="productdetail_content_info_detail">
                                        <div class="productdetail_content_info_sensa_wrap">
                                            <div class="productdetail_content_info_sensa txt_16 txt_title_color">
                                                <?php echo esc_html($attribute_label); ?>:
                                            </div>
                                            <div class="productdetail_content_info_sensa_txt txt_16" id="<?php echo $attr_id; ?>Display">
                                                <?php echo esc_html($terms[0]->name); ?>
                                            </div>
                                        </div>
                                        <div class="productdetail_content_info_detail_fill">
                                            <?php foreach ($terms as $index => $term) : ?>
                                                <div class="productdetail_content_info_detail_fill_item" data-cursor="hidden">
                                                    <input type="radio" 
                                                            name="<?php echo $attr_id; ?>" 
                                                            id="<?php echo $attr_id . '_' . ($index + 1); ?>" 
                                                            value="<?php echo esc_attr($term->name); ?>" 
                                                            <?php echo $index === 0 ? 'checked' : ''; ?>>
                                                    <label for="<?php echo $attr_id . '_' . ($index + 1); ?>" 
                                                            class="txt_16 txt_title_color">
                                                        <?php echo esc_html($term->name); ?>
                                                    </label>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        }
                    }
                }
                ?>
            <div class="productdetail_quantity">
                <div class="productdetail_quantity_title txt_16 txt_title_color">Quantity</div>
                <div class="productdetail_quantity_inner">
                    <div class="productdetail_quantity_button minus img_full" data-cursor="hidden">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/tru.svg" alt="">
                    </div>
                    <div class="productdetail_quantity_input">
                        <input type="hidden" name="quantity" value="1" min="1" max="100">
                        <span class="productdetail_quantity_input_value txt_16 txt_title_color">1</span>
                    </div>
                    <div class="productdetail_quantity_button plus img_full" data-cursor="hidden">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/plus.svg" alt="">
                    </div>
                </div>
            </div>
            <a href="#" data-cursor="hidden" class="productdetail_cart_button btn">
                <div class="btn_txt_wrap">
                    <div class="btn_txt productdetail_cart_button_txt txt_16">Add to cart</div>
                    <div class="btn_txt productdetail_cart_button_txt txt_16">Add to cart</div>
                </div>
                <div class="btn_ic_wrap">
                    <div class="btn_ic productdetail_cart_button_ic img_full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-right-white.svg" alt="" />
                    </div>
                    <div class="btn_ic productdetail_cart_button_ic img_full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-right-white.svg" alt="" />
                    </div>
                </div>
            </a>
            </div>
        </div>
    </section>

    <section class=" product_related_silder home_seller overflow_hidden">
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
                <a data-cursor="txtLink" href="<?php echo esc_url( $category_link ?: '/shop' ); ?>" class="home_seller_shop_link hover-un">
                    <div class="home_seller_shop_link_txt_wrap">
                        <div class="home_seller_shop_link_txt txt_16 txt_uppercase txt_wh_500 txt_title_color">Shop now</div>
                        <div class="line-anim line-anim-hover"><div class="line-anim-inner line-anim-inner-hover"></div></div>
                    </div>    
                    <div class="home_seller_shop_link_icon img_full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-right.svg" alt="">
                    </div>
                </a>
            </div>
            </div>
            <div class="home_seller_silder swiper">
            <div class="home_seller_silder_wrap swiper-wrapper">
                <?php
                // Lấy category slugs để query related products
                $category_slugs_for_query = array();
                if ( $categories && ! is_wp_error( $categories ) ) {
                    foreach ( $categories as $cat ) {
                        if ( $cat->slug !== 'uncategorized' ) {
                            $category_slugs_for_query[] = $cat->slug;
                        }
                    }
                }

                // Query related products
                $related_args = array(
                    'post_type'      => 'product',
                    'posts_per_page' => 8,
                    'post_status'    => 'publish',
                    'post__not_in'   => array( $product_id ), // Loại trừ product hiện tại
                    'orderby'        => 'rand',
                    'order'          => 'DESC'
                );

                // Nếu có category, query theo category
                if ( ! empty( $category_slugs_for_query ) ) {
                    $related_args['tax_query'] = array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field'    => 'slug',
                            'terms'    => $category_slugs_for_query,
                        ),
                    );
                }

                $related_products = new WP_Query( $related_args );

                if ( $related_products->have_posts() ) :
                    while ( $related_products->have_posts() ) : $related_products->the_post();
                        global $product;

                        // Lấy category của product
                        $rel_categories = get_the_terms( get_the_ID(), 'product_cat' );
                        $rel_category_name = '';
                        if ( $rel_categories && ! is_wp_error( $rel_categories ) ) {
                            foreach ( $rel_categories as $cat ) {
                                if ( $cat->slug !== 'uncategorized' ) {
                                    $rel_category_name = $cat->name;
                                    break;
                                }
                            }
                        }

                        // Kiểm tra tồn kho
                        $rel_is_in_stock = $product->is_in_stock();

                        // Lấy hình ảnh
                        $rel_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                        if ( ! $rel_image_url ) {
                            $rel_image_url = wc_placeholder_img_src();
                        }

                        // Lấy giá
                        $rel_regular_price = $product->get_regular_price();
                        $rel_sale_price = $product->get_sale_price();

                        if ( $rel_sale_price ) {
                            $rel_price_display = '<span>$' . intval( $rel_sale_price ) . '</span> - <span>$' . intval( $rel_regular_price ) . '</span>';
                        } else {
                            $rel_price_display = '<span>$' . intval( $rel_regular_price ) . '</span>';
                        }
                        ?>
                        <a href="<?php the_permalink(); ?>" class="home_seller_silder_item swiper-slide">
                            <div class="home_seller_silder_item_top">
                                <div class="home_seller_silder_item_top_type txt_uppercase txt_12">
                                    <?php echo esc_html( $rel_category_name ); ?>
                                </div>
                                <div class="home_seller_silder_item_top_soldout txt_uppercase txt_12 <?php echo ! $rel_is_in_stock ? 'active' : ''; ?>">
                                    SOLD OUT
                                </div>
                            </div>
                            <div class="home_seller_silder_item_img img_full">
                                <img src="<?php echo esc_url( $rel_image_url ); ?>" alt="<?php the_title_attribute(); ?>" />
                            </div>
                            <div class="home_seller_silder_item_info">
                                <div class="home_seller_silder_item_info_title txt_subtitle">
                                    <?php the_title(); ?>
                                </div>
                                <div class="home_seller_silder_item_info_price txt_14 txt_wh_500">
                                    <?php echo $rel_price_display; ?>
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
                    echo '<p>No related products found.</p>';
                endif;
                ?>
            </div>
            <div class="swiper-pagination home_seller_pagination"></div>
            </div>
        </div>
    </section>
</div>
<?php get_footer(); ?>