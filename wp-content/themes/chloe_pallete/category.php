<?php
global $disableFullpage;
$disableFullpage= true;
global $pageClass;
$pageClass= "page-news-bg";
get_header();
$cate = get_queried_object();


$allPost =[];

if ( have_posts() ) {
    while ( have_posts() ) {
        the_post(); 
        $allPost[] = $post;
    } // end while
} // end if

$firstPost=[];
$listPost=$allPost;

$sectionImageID = tr_taxonomies_field('banner','category', $cate->term_id);
$sectionImage =  wp_get_attachment_image_src($sectionImageID,'full', false, false)[0];
$sectionTitle =  tr_taxonomies_field('banner_title', 'category', $cate->term_id);

$allCate = get_categories(['hide_empty'      => true]);

?>

<section  class=" animatedParent animateOnce section-news-list section-top ">
    <div class=" section-padding  animated fadeInUpShort div_zindex">
        <div class="container-d">
            <div class=" section-page-nav animated <?= defaultAnimation(0) ?>">
                <ul>
                <?php foreach ($allCate as $key => $category) { ?>
                    <li class="<?= $category->term_id==$cate->term_id?"active":"" ?>"><a href="<?=  get_category_link( $category->term_id ) ?>"><?= $category->name  ?></a></li>
                <?php } ?>
                </ul>
            </div>
            <div class="section-content-wrapper ">


                <?php if(count($listPost)>0){ ?>
                <div class="items post-list row animated fadeInUpShort delay-500">
                     <?php foreach ($listPost as $key => $post) {
                        echo '<div class="col-sm-6 col-lg-4">';
                         nmc_get_template_part( 'partials/content-news', [
                            'post' => $post
                        ] );
                        echo '</div>';
                    } ?>
                </div>
                <?php } ?>

                <?php
                  if (function_exists('custom_pagination')) {
                    custom_pagination();
                  }
                ?>



            </div>

        </div>
    </div>
</section>



<?php get_footer(); ?>

