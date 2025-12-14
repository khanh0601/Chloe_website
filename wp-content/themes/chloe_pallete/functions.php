<?php
include 'typerocket/init.php';
require dirname( __FILE__ ) . '/inc/init.php';

add_filter('tr_theme_options_page', function() {
    return get_template_directory() . '/theme-options.php';
});

load_theme_textdomain( 'chloe_pallete', get_template_directory().'/languages' );
add_theme_support( 'post-thumbnails' );

add_action('wp_head', function() {
  $fonts = [
      'Figtree-Regular.woff2',
      'Figtree-Medium.woff2', 
      'Figtree-SemiBold.woff2',
      'Anton-Regular.woff2'
  ];
  
  foreach ($fonts as $font) {
      printf(
          '<link rel="preload" href="%s/fonts/%s" as="font" type="font/woff2" crossorigin="anonymous">',
          get_template_directory_uri(),
          $font
      );
  }
}, 1);
//Media Support
add_image_size( 'post-default', 900, 480, true ); // 480 pixels wide by 370 pixels tall, soft proportional crop mode
//add_image_size( 'post-news', 410, 460, true );


add_action('init','theme_widgets_init');

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function theme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'mytheme' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

  register_sidebar( array(
    'name'          => __( 'Footer', 'mytheme' ),
    'id'            => 'footer-1',
    'description'   => 'Widgets added to this region will appear beneath the header and above the main content.',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
}

// This theme uses wp_nav_menu() in two locations.
register_nav_menus( array(
	'primary'		=> __( 'Primary Menu', 'mytheme' ),
  'secondary'   => __( 'Secondary Menu', 'mytheme' ),
  'footer'   => __( 'Footer Menu', 'mytheme' ),
) );


add_filter('next_posts_link_attributes', 'posts_link_attributes_next');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_prev');

function posts_link_attributes_next() {
    return 'class="next"';
}
function posts_link_attributes_prev() {
    return 'class="prev"';
}

add_filter('show_admin_bar', '__return_false');

function remove_core_updates(){
  global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
//add_filter('pre_site_transient_update_core','remove_core_updates');
//add_filter('pre_site_transient_update_plugins','remove_core_updates');
//add_filter('pre_site_transient_update_themes','remove_core_updates');

function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   * 
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('←'),
    'next_text'       => __('→'),
    'type'            => 'array',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if (is_array($paginate_links)) {
    echo "<nav class='pagination'>";
        echo '<ul class="page-numbers">';
        foreach ( $paginate_links as $page ) {
          echo "<li>$page</li>";
        }
       echo '</ul>';
     
    echo "</nav>";
  }
}

function custom_search_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   * 
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => '&paged=%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('←'),
    'next_text'       => __('→'),
    'type'            => 'array',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if (is_array($paginate_links)) {
    echo "<nav class='woocommerce-pagination'>";
        echo '<ul class="page-numbers">';
        foreach ( $paginate_links as $page ) {
          echo "<li>$page</li>";
        }
       echo '</ul>';
     
    echo "</nav>";
  }
}

function custom_ajax_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  //global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => '&paged=%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => false,
    'type'            => 'array',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if (is_array($paginate_links)) {
    echo "<nav class='pagination ajax-pagination'>";
        echo '<ul class="page-numbers">';
        foreach ( $paginate_links as $page ) {
          echo "<li>$page</li>";
        }
       echo '</ul>';
     
    echo "</nav>";
  }
}

function custom_pagination2($numpages = '', $pagerange = '', $paged=''){

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  
    echo '<div class="isotope-pager">';
    echo get_previous_posts_link( '<i class="fa fa-angle-left" aria-hidden="true"></i>' );
    echo '<span class="pager prev">'.$paged.'<small> \ '.$numpages.'</small></span>';
    echo get_next_posts_link( '<i class="fa fa-angle-right" aria-hidden="true"></i>' ); 
    echo '</div>';
  
}

function searchFilter($query) {
    if ($query->is_search && !is_admin()) {
        $query->set('post_type', array('product','post','project','solution'));
    };
    return $query;
};

//add_filter('pre_get_posts','searchFilter');



add_filter('post_gallery','customFormatGallery',10,2);

function customFormatGallery($string,$attr){
    global $post;
    $output = "<div class='row gutter-5'>";
    $posts = get_posts(array('include' => $attr['ids'],'post_type' => 'attachment'));

    foreach($posts as $imagePost){
        $output .= "<a class='col-sm-4 item fancybox fancy-gallery' rel='gallery' href='".wp_get_attachment_image_src($imagePost->ID, 'full')[0]."'>";
        $output .= "<img src='".wp_get_attachment_image_src($imagePost->ID, 'medium')[0]."'/>";
        $output .= "</a>";
    }

    $output .= "</div>";
    return $output;
}

function remove_dashboard_meta() {
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8

        remove_action('welcome_panel', 'wp_welcome_panel');
}
add_action( 'admin_init', 'remove_dashboard_meta' );

function custom_loginlogo() {
echo '<style type="text/css">
body #login h1 a {background-image: url('.get_bloginfo('template_directory').'/images/logo-backend.svg); background-size:contain; width:180px; }
</style>';
}
add_action('login_head', 'custom_loginlogo');

//Custom post perpage
function custom_posts_per_page( $query ) {
    if ( $query->is_archive() && $query->is_main_query() && isset($query->query_vars['post_type']) && in_array($query->query_vars['post_type'] , ["video","gallery"])  ) {
        $query->set( 'posts_per_page', -1 );
    }
}
//add_action( 'pre_get_posts', 'custom_posts_per_page' );

function site_picture_add_dashboard_widgets() {

  wp_add_dashboard_widget(
                 'site_picture_dashboard_widget',         // Widget slug.
                 'Thông tin kích thước hình ảnh',         // Title.
                 'site_picture_information' // Display function.
    );
    
}

add_action( 'wp_dashboard_setup', 'site_picture_add_dashboard_widgets' );

/**
 * Create the function to output the contents of our Dashboard Widget.
 */
function site_picture_information() {

  // Display whatever it is you want to show.
	echo '';
 
}


function archive_posttype() {



}
add_action( 'template_redirect', 'archive_posttype' );

// Debug: Xem template nào đang load
add_filter( 'template_include', function( $template ) {
    if ( is_product_category() ) {
        error_log( 'Template being used: ' . $template );
    }
    return $template;
}, 99 );

// Debug: Xem số sản phẩm được query
add_action( 'woocommerce_before_shop_loop', function() {
    global $wp_query;
    echo '<div style="background: yellow; padding: 10px; margin: 10px 0;">';
    echo 'DEBUG INFO:<br>';
    echo 'Found posts: ' . $wp_query->found_posts . '<br>';
    echo 'Post count: ' . $wp_query->post_count . '<br>';
    echo 'Is product category: ' . ( is_product_category() ? 'YES' : 'NO' ) . '<br>';
    echo '</div>';
});
// AJAX handler for getting variation price
add_action('wp_ajax_get_variation_price', 'get_variation_price_ajax');
add_action('wp_ajax_nopriv_get_variation_price', 'get_variation_price_ajax');

function get_variation_price_ajax() {
    check_ajax_referer('variation_price_nonce', 'nonce');
    
    $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
    $attributes = isset($_POST['attributes']) ? $_POST['attributes'] : array();
    
    if (!$product_id) {
        wp_send_json_error('Invalid product ID');
    }
    
    $product = wc_get_product($product_id);
    
    if (!$product || !$product->is_type('variable')) {
        wp_send_json_error('Invalid variable product');
    }
    
    // Find matching variation
    $data_store = WC_Data_Store::load('product');
    $variation_id = $data_store->find_matching_product_variation($product, $attributes);
    
    if (!$variation_id) {
        wp_send_json_error('No matching variation found');
    }
    
    $variation = wc_get_product($variation_id);
    
    $response = array(
        'variation_id' => $variation_id,
        'price' => $variation->get_price(),
        'regular_price' => $variation->get_regular_price(),
        'sale_price' => $variation->get_sale_price(),
        'price_html' => $variation->get_price_html(),
        'is_on_sale' => $variation->is_on_sale(),
        'display_price' => wc_get_price_to_display($variation),
        'display_regular_price' => wc_get_price_to_display($variation, array('price' => $variation->get_regular_price())),
    );
    
    wp_send_json_success($response);
}

// Custom AJAX handler for adding product to cart
add_action('wp_ajax_custom_add_to_cart', 'custom_add_to_cart_ajax');
add_action('wp_ajax_nopriv_custom_add_to_cart', 'custom_add_to_cart_ajax');

// Custom remove from cart AJAX handler
add_action('wp_ajax_custom_remove_from_cart', 'custom_remove_from_cart_ajax');
add_action('wp_ajax_nopriv_custom_remove_from_cart', 'custom_remove_from_cart_ajax');

// AJAX handler để render cart content
add_action('wp_ajax_get_cart_content', 'get_cart_content_ajax');
add_action('wp_ajax_nopriv_get_cart_content', 'get_cart_content_ajax');

/**
 * Function để render cart content HTML
 * Có thể được gọi từ nhiều nơi (AJAX, fragments, etc.)
 */
function render_cart_content() {
    // Initialize cart if not already done
    if (!WC()->cart) {
        wc_load_cart();
    }
    
    ob_start();
    if (!WC()->cart->is_empty()) {
        foreach (WC()->cart->get_cart() as $cart_item_key_loop => $cart_item) {
            $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key_loop);
            $product_id_loop = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key_loop);
            
            if ($_product && $_product->exists() && $cart_item['quantity'] > 0) {
                $product_name = $_product->get_name();
                $product_image = $_product->get_image('thumbnail');
                $product_price = $_product->get_price();
                $product_regular_price = $_product->get_regular_price();
                $product_sale_price = $_product->get_sale_price();
                $quantity = $cart_item['quantity'];
                
                $categories = get_the_terms($product_id_loop, 'product_cat');
                $category_name = '';
                if ($categories && !is_wp_error($categories)) {
                    foreach ($categories as $cat) {
                        if ($cat->slug !== 'uncategorized') {
                            $category_name = $cat->name;
                            break;
                        }
                    }
                }
                
                $variation_attributes = '';
                if (isset($cart_item['variation']) && !empty($cart_item['variation'])) {
                    $variation_attributes = wc_get_formatted_variation($cart_item['variation'], true);
                }
                ?>
                <div class="menu_cart_content_item" data-cart-item-key="<?php echo esc_attr($cart_item_key_loop); ?>">
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
                            <div class="menu_cart_content_item_info_amount_reduce img_full" data-cart-item-key="<?php echo esc_attr($cart_item_key_loop); ?>" data-action="decrease">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/tru.svg" alt="">
                            </div>
                            <div class="menu_cart_content_item_info_amount_txt txt_14" data-quantity="<?php echo esc_attr($quantity); ?>"><?php echo esc_html($quantity); ?></div>
                            <div class="menu_cart_content_item_info_amount_increate img_full" data-cart-item-key="<?php echo esc_attr($cart_item_key_loop); ?>" data-action="increase">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/plus.svg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="menu_cart_content_item_remove txt_14 hover-un" data-cursor="txtLink" data-cart-item-key="<?php echo esc_attr($cart_item_key_loop); ?>" data-action="remove">
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
    return ob_get_clean();
}

/**
 * AJAX handler để lấy cart content
 */
function get_cart_content_ajax() {
    // Initialize cart if not already done
    if (!WC()->cart) {
        wc_load_cart();
    }
    
    // Calculate totals
    WC()->cart->calculate_totals();
    
    $cart_count = WC()->cart->get_cart_contents_count();
    $cart_hash = WC()->cart->get_cart_hash();
    
    // Render cart content
    $cart_content = render_cart_content();
    
    // Get cart title
    $items_text = $cart_count == 1 ? 'item' : 'items';
    $cart_title = '<div class="menu_cart_title txt_32">Cart (' . esc_html($cart_count) . ')</div>';
    
    // Get cart totals
    $cart_total_txt = '<div class="menu_cart_button_total_txt txt_16 txt_title_color ">Subtotal (' . esc_html($cart_count) . ' ' . $items_text . ')</div>';
    $cart_total_price = '<div class="menu_cart_button_total_price txt_24 txt_wh_500 txt_title_color ">'.WC()->cart->get_cart_subtotal().'</div>';
    
    // Get checkout button
    $checkout_button = '';
    if (!WC()->cart->is_empty()) {
        $checkout_button = '<a href="' . esc_url(wc_get_checkout_url()) . '" class="menu_cart_button_check">
            <div class="menu_cart_button_check_txt txt_wh_500 color_white txt_16 txt_uppercase">Checkout now</div>
            <div class="menu_cart_button_check_icon img_full">
                <img src="' . get_template_directory_uri() . '/images/arrow-up-right-white.svg" alt="">
            </div>
        </a>';
    }
    
    wp_send_json_success(array(
        'cart_content' => $cart_content,
        'cart_title' => $cart_title,
        'cart_total_txt' => $cart_total_txt,
        'cart_total_price' => $cart_total_price,
        'checkout_button' => $checkout_button,
        'cart_count' => $cart_count,
        'cart_hash' => $cart_hash,
        'cart_count_text' => $cart_count
    ));
}

function custom_add_to_cart_ajax() {
    // Check nonce for security
    if (!check_ajax_referer('custom_add_to_cart_nonce', 'nonce', false)) {
        wp_send_json_error(array(
            'message' => 'Security check failed. Please refresh the page and try again.'
        ));
        return;
    }
    
    // Get and validate product ID
    $product_id = isset($_POST['product_id']) ? absint($_POST['product_id']) : 0;
    if (!$product_id) {
        wp_send_json_error(array(
            'message' => 'Invalid product ID.'
        ));
        return;
    }
    
    // Get product
    $product = wc_get_product($product_id);
    if (!$product) {
        wp_send_json_error(array(
            'message' => 'Product not found.'
        ));
        return;
    }
    
    // Get quantity
    $quantity = isset($_POST['quantity']) ? absint($_POST['quantity']) : 1;
    if ($quantity < 1) {
        $quantity = 1;
    }
    
    // Initialize cart if not already done
    if (!WC()->cart) {
        wc_load_cart();
    }
    
    $variation_id = 0;
    $variation = array();
    
    // Handle variable products
    if ($product->is_type('variable')) {
        // Get variation ID
        $variation_id = isset($_POST['variation_id']) ? absint($_POST['variation_id']) : 0;
        
        // Get variation attributes
        $posted_variation = isset($_POST['variation']) ? $_POST['variation'] : array();
        
        // If no variation_id provided, try to find it from attributes
        if (!$variation_id && !empty($posted_variation)) {
            $data_store = WC_Data_Store::load('product');
            $variation_id = $data_store->find_matching_product_variation($product, $posted_variation);
        }
        
        // Validate variation ID
        if (!$variation_id) {
            wp_send_json_error(array(
                'message' => 'Please select all product options.',
                'product_url' => $product->get_permalink()
            ));
            return;
        }
        
        // Get variation product
        $variation_product = wc_get_product($variation_id);
        if (!$variation_product || $variation_product->get_parent_id() != $product_id) {
            wp_send_json_error(array(
                'message' => 'Invalid variation selected.',
                'product_url' => $product->get_permalink()
            ));
            return;
        }
        
        // Check if variation is purchasable
        if (!$variation_product->is_purchasable()) {
            wp_send_json_error(array(
                'message' => 'This variation is not available for purchase.',
                'product_url' => $product->get_permalink()
            ));
            return;
        }
        
        // Check stock
        if (!$variation_product->is_in_stock()) {
            wp_send_json_error(array(
                'message' => 'This variation is out of stock.',
                'product_url' => $product->get_permalink()
            ));
            return;
        }
        
        // Format variation attributes properly
        $variation = array();
        if (!empty($posted_variation)) {
            foreach ($posted_variation as $key => $value) {
                // Ensure attribute_ prefix
                $attr_key = strpos($key, 'attribute_') === 0 ? $key : 'attribute_' . $key;
                $variation[$attr_key] = sanitize_text_field($value);
            }
        }
        
        // If variation attributes are empty, get them from variation product
        if (empty($variation)) {
            $variation_attributes = $variation_product->get_variation_attributes();
            foreach ($variation_attributes as $key => $value) {
                $variation[$key] = $value;
            }
        }
    } else if ($product->is_type('simple')) {
        // Simple product - check if purchasable
        if (!$product->is_purchasable()) {
            wp_send_json_error(array(
                'message' => 'This product is not available for purchase.',
                'product_url' => $product->get_permalink()
            ));
            return;
        }
        
        // Check stock
        if (!$product->is_in_stock()) {
            wp_send_json_error(array(
                'message' => 'This product is out of stock.',
                'product_url' => $product->get_permalink()
            ));
            return;
        }
    } else {
        wp_send_json_error(array(
            'message' => 'This product type is not supported.',
            'product_url' => $product->get_permalink()
        ));
        return;
    }
    
    // Try to add to cart
    try {
        $cart_item_key = WC()->cart->add_to_cart($product_id, $quantity, $variation_id, $variation);
        
        if ($cart_item_key) {
            // Calculate totals
            WC()->cart->calculate_totals();
            
            // Get cart fragments for response
            $fragments = apply_filters('woocommerce_add_to_cart_fragments', array());
            $cart_hash = WC()->cart->get_cart_hash();
            $cart_count = WC()->cart->get_cart_contents_count();
            
            // Add custom fragments for cart menu
            ob_start();
            echo esc_html($cart_count);
            $fragments['.header_icon_item_num .cart-count'] = ob_get_clean();
            
            ob_start();
            $items_text = $cart_count == 1 ? 'item' : 'items';
            echo '<div class="menu_cart_title txt_32">Cart (' . esc_html($cart_count) . ')</div>';
            $fragments['.menu_cart_title'] = ob_get_clean();
            
            ob_start();
            echo '<div class="menu_cart_button_total_txt txt_16 txt_title_color ">Subtotal (' . esc_html($cart_count) . ' ' . $items_text . ')</div>';
            $fragments['.menu_cart_button_total_txt'] = ob_get_clean();
            
            ob_start();
            echo '<div class="menu_cart_button_total_price txt_24 txt_wh_500 txt_title_color ">'.WC()->cart->get_cart_subtotal().'</div>';
            $fragments['.menu_cart_button_total_price'] = ob_get_clean();
            
            // Generate cart content HTML - sử dụng function render_cart_content()
            $fragments['.menu_cart_content'] = render_cart_content();
            
            // Checkout button
            ob_start();
            if (!WC()->cart->is_empty()) {
                ?>
                <a href="<?php echo esc_url(wc_get_checkout_url()); ?>" class="menu_cart_button_check">
                    <div class="menu_cart_button_check_txt txt_wh_500 color_white txt_16 txt_uppercase">Checkout now</div>
                    <div class="menu_cart_button_check_icon img_full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-right-white.svg" alt="">
                    </div>
                </a>
                <?php
            }
            $fragments['.menu_cart_button_check'] = ob_get_clean();
            
            wp_send_json_success(array(
                'message' => 'Product added to cart successfully.',
                'cart_item_key' => $cart_item_key,
                'fragments' => $fragments,
                'cart_hash' => $cart_hash,
                'cart_count' => $cart_count,
                'cart_total' => WC()->cart->get_cart_total()
            ));
        } else {
            wp_send_json_error(array(
                'message' => 'Failed to add product to cart. Please try again.',
                'product_url' => $product->get_permalink()
            ));
        }
    } catch (Exception $e) {
        wp_send_json_error(array(
            'message' => $e->getMessage() ? $e->getMessage() : 'An error occurred while adding the product to cart.',
            'product_url' => $product->get_permalink()
        ));
    }
}

// Custom AJAX handler for updating cart quantity
add_action('wp_ajax_custom_update_cart_quantity', 'custom_update_cart_quantity_ajax');
add_action('wp_ajax_nopriv_custom_update_cart_quantity', 'custom_update_cart_quantity_ajax');

function custom_update_cart_quantity_ajax() {
    // Initialize cart if not already done
    if (!WC()->cart) {
        wc_load_cart();
    }
    
    $cart_item_key = isset($_POST['cart_item_key']) ? sanitize_text_field($_POST['cart_item_key']) : '';
    $quantity = isset($_POST['quantity']) ? absint($_POST['quantity']) : 0;
    
    if (empty($cart_item_key)) {
        wp_send_json_error(array('message' => 'Invalid cart item key.'));
        return;
    }
    
    if ($quantity < 1) {
        wp_send_json_error(array('message' => 'Quantity must be at least 1.'));
        return;
    }
    
    // Update cart item quantity
    $updated = WC()->cart->set_quantity($cart_item_key, $quantity);
    
    if ($updated) {
        // Calculate totals
        WC()->cart->calculate_totals();
        
        // Get refreshed fragments
        $fragments = apply_filters('woocommerce_add_to_cart_fragments', array());
        $cart_hash = WC()->cart->get_cart_hash();
        
        // Add custom fragments for cart menu
        ob_start();
        $cart_count = WC()->cart->get_cart_contents_count();
        echo esc_html($cart_count);
        $fragments['.header_icon_item_num .cart-count'] = ob_get_clean();
        
        ob_start();
        $items_text = $cart_count == 1 ? 'item' : 'items';
        echo 'Cart (' . esc_html($cart_count) . ')';
        $fragments['.menu_cart_title'] = ob_get_clean();
        
        ob_start();
        echo 'Subtotal (' . esc_html($cart_count) . ' ' . $items_text . ')';
        $fragments['.menu_cart_button_total_txt'] = ob_get_clean();
        
        ob_start();
        echo WC()->cart->get_cart_subtotal();
        $fragments['.menu_cart_button_total_price'] = ob_get_clean();
        
        wp_send_json_success(array(
            'message' => 'Cart updated successfully.',
            'fragments' => $fragments,
            'cart_hash' => $cart_hash,
            'cart_count' => $cart_count,
            'cart_total' => WC()->cart->get_cart_subtotal(),
            'cart_total_formatted' => WC()->cart->get_cart_subtotal()
        ));
    } else {
        wp_send_json_error(array('message' => 'Failed to update cart. Please try again.'));
    }
}

// Custom checkout - Create order from cart
add_action('wp_ajax_custom_create_order', 'custom_create_order_ajax');
add_action('wp_ajax_nopriv_custom_create_order', 'custom_create_order_ajax');

// Search products AJAX
add_action('wp_ajax_custom_search_products', 'custom_search_products_ajax');
add_action('wp_ajax_nopriv_custom_search_products', 'custom_search_products_ajax');

function custom_create_order_ajax() {
    // Check if cart is empty
    if (!WC()->cart || WC()->cart->is_empty()) {
        wp_send_json_error(array('message' => 'Cart is empty.'));
        return;
    }
    
    // Get and sanitize form data
    $name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
    $phone = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $address = isset($_POST['address']) ? sanitize_textarea_field($_POST['address']) : '';
    $note = isset($_POST['note']) ? sanitize_textarea_field($_POST['note']) : '';
    $office_hours = isset($_POST['office_hours']) ? sanitize_text_field($_POST['office_hours']) : '';
    $payment_method = isset($_POST['payment_method']) ? sanitize_text_field($_POST['payment_method']) : 'cod';
    
    // Validate required fields
    if (empty($name)) {
        wp_send_json_error(array('message' => 'Name is required.'));
        return;
    }
    
    if (empty($phone)) {
        wp_send_json_error(array('message' => 'Phone number is required.'));
        return;
    }
    
    if (empty($email)) {
        wp_send_json_error(array('message' => 'Email is required.'));
        return;
    }
    
    // Validate email format
    if (!is_email($email)) {
        wp_send_json_error(array('message' => 'Invalid email address.'));
        return;
    }
    
    if (empty($address)) {
        wp_send_json_error(array('message' => 'Address is required.'));
        return;
    }
    
    try {
        // Create order
        $order = wc_create_order(array(
            'status' => 'pending',
            'created_via' => 'custom-checkout'
        ));
        
        if (is_wp_error($order)) {
            wp_send_json_error(array('message' => 'Failed to create order: ' . $order->get_error_message()));
            return;
        }
        
        // Add products from cart to order
        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
            $product = $cart_item['data'];
            $quantity = $cart_item['quantity'];
            
            $order->add_product(
                $product,
                $quantity,
                array(
                    'variation' => isset($cart_item['variation']) ? $cart_item['variation'] : array(),
                    'totals' => array(
                        'subtotal' => $cart_item['line_subtotal'],
                        'total' => $cart_item['line_total'],
                    )
                )
            );
        }
        
        // Set billing information
        $order->set_billing_first_name($name);
        $order->set_billing_last_name('');
        $order->set_billing_email($email);
        $order->set_billing_phone($phone);
        $order->set_billing_address_1($address);
        $order->set_billing_address_2('');
        $order->set_billing_city('');
        $order->set_billing_state('');
        $order->set_billing_postcode('');
        $order->set_billing_country('VN');
        
        // Set shipping information (same as billing)
        $order->set_shipping_first_name($name);
        $order->set_shipping_last_name('');
        $order->set_shipping_address_1($address);
        $order->set_shipping_address_2('');
        $order->set_shipping_city('');
        $order->set_shipping_state('');
        $order->set_shipping_postcode('');
        $order->set_shipping_country('VN');
        
        // Set payment method
        $order->set_payment_method($payment_method);
        $order->set_payment_method_title($payment_method === 'bank' ? 'Bank Transfer' : 'Cash on Delivery');
        
        // Add order notes
        $order_notes = array();
        if (!empty($note)) {
            $order_notes[] = 'Note: ' . $note;
        }
        if (!empty($office_hours)) {
            $order_notes[] = 'Office hours only: Yes';
        }
        if (!empty($order_notes)) {
            $order->set_customer_note(implode("\n", $order_notes));
        }
        
        // Calculate totals
        $order->calculate_totals();
        
        // Save order
        $order->save();
        
        // Get order ID
        $order_id = $order->get_id();
        
        // Allow customization via hook
        do_action('custom_order_created', $order_id, array(
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            'note' => $note,
            'office_hours' => $office_hours,
            'payment_method' => $payment_method
        ));
        
        // Get thank you page URL using WooCommerce method
        $thank_you_url = $order->get_checkout_order_received_url();
        
        // Clear cart
        WC()->cart->empty_cart();
        
        wp_send_json_success(array(
            'message' => 'Order created successfully.',
            'order_id' => $order_id,
            'redirect_url' => $thank_you_url
        ));
        
    } catch (Exception $e) {
        wp_send_json_error(array('message' => 'Error creating order: ' . $e->getMessage()));
    }
}

function custom_search_products_ajax() {
    $search_term = isset($_POST['search']) ? sanitize_text_field($_POST['search']) : '';
    $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;
    $products_per_page = isset($_POST['per_page']) ? intval($_POST['per_page']) : 12;
    $orderby = isset($_POST['orderby']) ? sanitize_text_field($_POST['orderby']) : 'newest';
    $categories = isset($_POST['categories']) && is_array($_POST['categories']) ? array_map('sanitize_text_field', $_POST['categories']) : array();
    
    // Set default orderby and order
    $orderby_param = 'date';
    $order = 'DESC';
    
    // Map sort values to WooCommerce orderby/order
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => $products_per_page,
        'paged'          => $paged,
        'post_status'    => 'publish',
        's'              => $search_term
    );
    
    // Add category filter using tax_query
    if (!empty($categories)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => $categories,
                'operator' => 'IN'
            )
        );
    }
    
    switch ($orderby) {
        case 'popular':
            // Sort by total sales (popularity)
            $args['meta_key'] = 'total_sales';
            $args['orderby'] = 'meta_value_num';
            $args['order'] = 'DESC';
            break;
        case 'newest':
            $args['orderby'] = 'date';
            $args['order'] = 'DESC';
            break;
        case 'price-low':
            // Sort by price ascending
            $args['meta_key'] = '_price';
            $args['orderby'] = 'meta_value_num';
            $args['order'] = 'ASC';
            break;
        case 'price-high':
            // Sort by price descending
            $args['meta_key'] = '_price';
            $args['orderby'] = 'meta_value_num';
            $args['order'] = 'DESC';
            break;
        case 'name':
            $args['orderby'] = 'title';
            $args['order'] = 'ASC';
            break;
        default:
            $args['orderby'] = 'date';
            $args['order'] = 'DESC';
            break;
    }
    
    $products_query = new WP_Query($args);
    
    ob_start();
    
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
                $min_price = $product->get_variation_price('min');
                $max_price = $product->get_variation_price('max');
                if ($min_price == $max_price) {
                    $price_display = '<span>' . wc_price($min_price) . '</span>';
                } else {
                    $price_display = '<span>' . wc_price($min_price) . '</span> - <span>' . wc_price($max_price) . '</span>';
                }
            } else {
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
    
    $products_html = ob_get_clean();
    
    // Generate pagination HTML
    ob_start();
    if ($products_query->max_num_pages > 1) {
        $current_page = max(1, $paged);
        $total_pages = $products_query->max_num_pages;
        
        echo '<div class="shop_content_list_paging">';
        
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
        
        echo '</div>';
    }
    $pagination_html = ob_get_clean();
    
    wp_send_json_success(array(
        'products_html' => $products_html,
        'pagination_html' => $pagination_html,
        'total_pages' => $products_query->max_num_pages,
        'found_posts' => $products_query->found_posts
    ));
}

// Add custom cart fragments for remove from cart
add_filter('woocommerce_add_to_cart_fragments', 'custom_cart_fragments', 10, 1);
function custom_cart_fragments($fragments) {
    // Initialize cart if not already done
    if (!WC()->cart) {
        wc_load_cart();
    }
    
    $cart_count = WC()->cart->get_cart_contents_count();
    
    // Add cart count fragment
    ob_start();
    echo esc_html($cart_count);
    $fragments['.header_icon_item_num .cart-count'] = ob_get_clean();
    
    // Add cart title fragment
    ob_start();
    echo '<div class="menu_cart_title txt_32">Cart (' . esc_html($cart_count) . ')</div>';
    $fragments['.menu_cart_title'] = ob_get_clean();
    
    // Add cart content fragment
    ob_start();
    if (!WC()->cart->is_empty()) {
        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
            $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
            $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
            
            if ($_product && $_product->exists() && $cart_item['quantity'] > 0) {
                $product_name = $_product->get_name();
                $product_image = $_product->get_image('thumbnail');
                $product_price = $_product->get_price();
                $product_regular_price = $_product->get_regular_price();
                $product_sale_price = $_product->get_sale_price();
                $quantity = $cart_item['quantity'];
                
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
    $fragments['.menu_cart_content'] = ob_get_clean();
    
    // Add subtotal text fragment
    ob_start();
    $items_text = $cart_count == 1 ? 'item' : 'items';
    echo 'Subtotal (' . esc_html($cart_count) . ' ' . $items_text . ')';
    $fragments['.menu_cart_button_total_txt'] = ob_get_clean();
    
    // Add subtotal price fragment
    ob_start();
    echo WC()->cart->get_cart_subtotal();
    $fragments['.menu_cart_button_total_price'] = ob_get_clean();
    
    // Add checkout button fragment
    ob_start();
    if (!WC()->cart->is_empty()) {
        ?>
        <a href="<?php echo esc_url(wc_get_checkout_url()); ?>" class="menu_cart_button_check">
            <div class="menu_cart_button_check_txt txt_wh_500 color_white txt_16 txt_uppercase">Checkout now</div>
            <div class="menu_cart_button_check_icon img_full">
                <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-right-white.svg" alt="">
            </div>
        </a>
        <?php
    } else {
        echo '';
    }
    $fragments['.menu_cart_button_check'] = ob_get_clean();
    
    return $fragments;
}

function custom_remove_from_cart_ajax() {
    // Get cart item key
    $cart_item_key = isset($_POST['cart_item_key']) ? wc_clean(wp_unslash($_POST['cart_item_key'])) : '';
    
    if (!$cart_item_key) {
        wp_send_json_error(array(
            'message' => 'Cart item key is required.'
        ));
        return;
    }
    
    // Initialize cart if not already done
    if (!WC()->cart) {
        wc_load_cart();
    }
    
    // Remove item from cart
    $removed = WC()->cart->remove_cart_item($cart_item_key);
    
    if ($removed) {
        // Calculate totals
        WC()->cart->calculate_totals();
        
        // Get cart fragments using our custom filter
        $fragments = apply_filters('woocommerce_add_to_cart_fragments', array());
        $cart_hash = WC()->cart->get_cart_hash();
        $cart_count = WC()->cart->get_cart_contents_count();
        
        wp_send_json_success(array(
            'message' => 'Item removed from cart successfully.',
            'fragments' => $fragments,
            'cart_hash' => $cart_hash,
            'cart_count' => $cart_count,
            'cart_total' => WC()->cart->get_cart_subtotal()
        ));
    } else {
        wp_send_json_error(array(
            'message' => 'Failed to remove item from cart. Item may not exist.'
        ));
    }
}

// Contact Form 7: Remove automatic <p> and <span> tags
add_filter('wpcf7_autop_or_not', '__return_false');

// Contact Form 7: Remove <span> wrapper from form elements
add_filter('wpcf7_form_elements', function($content) {
    // Use DOMDocument for more accurate parsing
    if (class_exists('DOMDocument')) {
        libxml_use_internal_errors(true);
        $dom = new DOMDocument();
        $dom->loadHTML('<?xml encoding="UTF-8">' . $content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        
        $xpath = new DOMXPath($dom);
        // Find all span elements with wpcf7-form-control-wrap class
        $spans = $xpath->query('//span[contains(@class, "wpcf7-form-control-wrap")]');
        
        foreach ($spans as $span) {
            // Move all children of span to its parent
            $parent = $span->parentNode;
            if ($parent) {
                while ($span->firstChild) {
                    $parent->insertBefore($span->firstChild, $span);
                }
                $parent->removeChild($span);
            }
        }
        
        $content = $dom->saveHTML();
        // Remove XML declaration if present
        $content = preg_replace('/^<\?xml[^>]*\?>/', '', $content);
    } else {
        // Fallback to regex if DOMDocument is not available
        // Remove span wrapper with wpcf7-form-control-wrap class (more comprehensive pattern)
        $content = preg_replace('/<span\s+[^>]*class\s*=\s*["\'][^"\']*wpcf7-form-control-wrap[^"\']*["\'][^>]*>(.*?)<\/span>/is', '$1', $content);
        
        // Remove any remaining span tags that might wrap form controls
        $content = preg_replace('/<span\s+[^>]*data-name\s*=\s*["\'][^"\']*["\'][^>]*>(.*?)<\/span>/is', '$1', $content);
    }
    
    // Remove <br /> tags
    $content = str_replace('<br />', '', $content);
    $content = str_replace('<br/>', '', $content);
    $content = str_replace('<br>', '', $content);
    
    return $content;
});