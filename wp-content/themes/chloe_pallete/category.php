<?php
get_header();
wp_enqueue_style( 'workshop-css', get_template_directory_uri() . '/css/workshop.css');
wp_enqueue_script( 'workshop-js', get_template_directory_uri() . '/js/workshop.js');
$pageID = get_queried_object_id();
// Lấy category hiện tại
$current_category = get_queried_object();
$category_name = $current_category->name; // Tên category
$category_slug = $current_category->slug; // Slug category
// Lấy trang hiện tại cho pagination
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

// Query bài viết từ category Workshop
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 12, // Số bài viết mỗi trang
    'paged' => $paged,
    'category_name' => 'workshop', // Slug của category (hoặc dùng 'cat' => ID)
    'orderby' => 'date',
    'order' => 'DESC'
);
// THIẾU DÒNG NÀY - QUAN TRỌNG!
$workshop_query = new WP_Query($args);
?>
<section class="workshop_content">
    <div class="kl_container">
    <div class="workshop_content_title txt_center txt_wh_500"><?php echo esc_html($category_name); ?></div>
    <div class="workshop_content_list">
        <div class="workshop_content_list_card">
            <?php if ($workshop_query->have_posts()) : ?>
            <?php while ($workshop_query->have_posts()) : $workshop_query->the_post(); 
                // Lấy ACF fields
                $workshop_name = get_field('workshops', get_the_ID());
                $workshop_date = get_field('date', get_the_ID());
                $workshop_cost = get_field('cost', get_the_ID());
                $post_thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');
                $post_excerpt = get_the_excerpt();
            ?>
                <a href="<?php the_permalink(); ?>" class="workshop_content_list_card_item">   
                <div class="workshop_content_list_card_item_img img_full">
                    <?php if ($post_thumbnail): ?>
                        <img src="<?php echo esc_url($post_thumbnail); ?>" alt="<?php the_title_attribute(); ?>">
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/home_workshop.webp" alt="">
                    <?php endif; ?>
                </div>
                <div class="workshop_content_list_card_item_info">
                    <div class="workshop_content_list_card_item_info_item txt_uppercase txt_14 txt_wh_500">WoRKSHOPS</div>
                    <div class="workshop_content_list_card_item_info_item txt_uppercase txt_14 txt_wh_500"> <?php echo esc_html($workshop_date ?: get_the_date('M d, Y')); ?></div>
                    <div class="workshop_content_list_card_item_info_item txt_uppercase txt_14 txt_wh_500">Cost: <?php echo esc_html($workshop_cost ?: '$110'); ?></div>
                </div>
                <div class="workshop_content_list_card_item_title txt_title_color txt_wh_500 txt_24"><?php echo esc_html($workshop_name ?: 'WORKSHOPS'); ?> Workshop</div>
                <div class="workshop_content_list_card_item_des txt_16"><?php echo esc_html($post_excerpt); ?></div>
                </a>
            <?php endwhile; ?>
            <?php else : ?>
                <p>No workshops found.</p>
            <?php endif; ?>
        </div>
        <?php if ($workshop_query->max_num_pages > 1) : ?>
            <div class="workshop_content_list_paging">
                <?php
                $current_page = max(1, $paged);
                $total_pages = $workshop_query->max_num_pages;
                
                // Link Prev
                if ($current_page > 1) {
                    echo '<a href="' . get_pagenum_link($current_page - 1) . '" class="workshop_content_list_paging_prev txt_16 txt_title_color">Prev</a>';
                } else {
                    echo '<span class="workshop_content_list_paging_prev txt_16 txt_title_color disabled">Prev</span>';
                }
                ?>
                
                <div class="workshop_content_list_paging_num">
                    <?php
                    // Trang 1
                    $active = ($current_page == 1) ? 'active' : '';
                    echo '<a href="' . get_pagenum_link(1) . '" class="workshop_content_list_paging_num_txt txt_16 ' . $active . '">1</a>';
                    
                    // Dấu ... đầu
                    if ($current_page > 4) {
                        echo '<span class="workshop_content_list_paging_num_txt txt_16">...</span>';
                    }
                    
                    // Các trang giữa
                    $start = max(2, $current_page - 2);
                    $end = min($total_pages - 1, $current_page + 2);
                    
                    for ($i = $start; $i <= $end; $i++) {
                        $active = ($current_page == $i) ? 'active' : '';
                        echo '<a href="' . get_pagenum_link($i) . '" class="workshop_content_list_paging_num_txt txt_16 ' . $active . '">' . $i . '</a>';
                    }
                    
                    // Dấu ... cuối
                    if ($current_page < $total_pages - 3) {
                        echo '<span class="workshop_content_list_paging_num_txt txt_16">...</span>';
                    }
                    
                    // Trang cuối
                    if ($total_pages > 1) {
                        $active = ($current_page == $total_pages) ? 'active' : '';
                        echo '<a href="' . get_pagenum_link($total_pages) . '" class="workshop_content_list_paging_num_txt txt_16 ' . $active . '">' . $total_pages . '</a>';
                    }
                    ?>
                </div>
                
                <?php
                // Link Next
                if ($current_page < $total_pages) {
                    echo '<a href="' . get_pagenum_link($current_page + 1) . '" class="workshop_content_list_paging_prev txt_16 txt_title_color">Next</a>';
                } else {
                    echo '<span class="workshop_content_list_paging_prev txt_16 txt_title_color disabled">Next</span>';
                }
                ?>
            </div>
        <?php endif; ?>
    </div>
    </div>
</section>

<?php get_footer(); ?>