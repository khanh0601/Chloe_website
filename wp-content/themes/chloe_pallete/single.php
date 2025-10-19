<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

global $disableFullpage;
$disableFullpage= true;
global $pageClass;
$pageClass= "page-news-bg";

get_header();

$blog_page_link= get_permalink(get_option( 'page_for_posts' ));

$categories = get_categories([
    'hide_empty'       => 0,
]);


while ( have_posts() ) : the_post(); 

$cur_post_id= get_the_ID();
$cur_post_type= get_post_type();
$cur_post_link= get_permalink();
$cur_post_title =get_the_title();
$cur_post_content =get_the_content();
$description = get_the_excerpt();
$post_date = date('d-m-Y', strtotime($post->post_date));
$term = get_the_category($cur_post_id);
if(!empty($term)){
    $term = $term[0];
}
$cur_cat_id=$term->term_id;

$images = wp_get_attachment_image_src(get_post_thumbnail_id($cur_post_id),'full', false, false);
if(empty($images)){
    $images =get_template_directory_uri()."/images/default-".$post->post_type.".jpg";
}
else{
    $images= $images[0];
}

endwhile; 

$share_link =get_permalink();



$sectionImageID = tr_taxonomies_field('banner','category', $cur_cat_id);
$sectionImage =  wp_get_attachment_image_src($sectionImageID,'full', false, false)[0];

$allCate = get_categories(['hide_empty'      => true]);

?>


<section  class=" animatedParent animateOnce section-post-detail section-top dark" data-title="<?= $title ?>" >

    <div class="section-padding  div_zindex">
        <div class="container-d">
            <div class=" section-page-nav animated <?= defaultAnimation(0) ?>">
                <ul>
                <?php foreach ($allCate as $key => $category) { ?>
                    <li class="<?= $category->term_id==$cur_cat_id?"active":"" ?>"><a href="<?=  get_category_link( $category->term_id ) ?>"><?= $category->name  ?></a></li>
                <?php } ?>
                </ul>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="section-content-wrapper post-detail ">
                        <div class="inner relative">
                            <h1 class="page-title font-2  post-title <?= defaultAnimation(1,"fadeInUpShort") ?>"><?= $cur_post_title ?></h1>
                            <div class="post-attrs attr-items <?= defaultAnimation(1,"fadeInUpShort") ?>">
                                <div class="attr post-cate">
                                    <?= $term->name ?>
                                </div>
                                <div class="attr date-time attr  "><i class="fal fa-calendar-alt"></i> <?= $post_date ?></div>
                            </div>

                            <div class="editor-content font-1 <?= defaultAnimation(2,"fadeInUpShort") ?>">
                                <?= apply_filters('the_content', $cur_post_content) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php 
    $args = array(
        'numberposts' => 9,
        'exclude' => array($cur_post_id),
        'post_type' => $cur_post_type,
        'post_status' => 'publish',
        'suppress_filters' => true,
        'category' => $cur_cat_id,
    );
    $recent_posts = wp_get_recent_posts( $args, OBJECT );
?>
<?php if(!empty($recent_posts)) { ?>
<section  class="section-post-other animatedParent animateOnce  fp-noscroll fp-auto-height-responsive overflow-hide"  data-nav="false" >
    <div class="container-d">
        <hr>
        <div class="section-padding pt-3">
            <h3 class="section-title font-2 line-0  text-center animated fadeInUpShort delay-250"><strong><?= __( 'Tin liên quan', 'tbs' ) ?></strong></h3>
            <div class="items post-list  animated fadeInUpShort delay-500">
                <div class="swiper swiper-default post-slide <?= !empty($cateId)?"post-slide-cate":"" ?>" >
                  <div class="swiper-wrapper">
                    <?php

                        $index=0;
                        foreach ($recent_posts as $key => $post) {
                            echo '<div class="swiper-slide" >';
                            $index++;
                            nmc_get_template_part( 'partials/content-news', ["post"=>$post,"index"=>$index] );
                            echo '</div>';
                        }
                    ?>
                    <?php wp_reset_postdata(); ?>

                  </div>
                  <div class="slide-control">
                      <div class="swiper-pagination  mt-4"></div>
                  </div>
                </div>
            </div>
        </div>

    </div>
</section>
<?php } ?>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".menu-item.menu-tin-tuc").addClass('current-menu-item');
    });
</script>

<?php 
get_footer();
