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