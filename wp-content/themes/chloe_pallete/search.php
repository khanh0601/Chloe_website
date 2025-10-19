<?php 

global $disableFullpage;
$disableFullpage= true;

get_header(); 
$banner = get_template_directory_uri()."/images/banner-child.jpg";
?>

<section class="tertiary-bg">
<section class="section-banner section-banner-post relative section-top " >
     <a class="section-logo" href="<?= home_url() ?>">
        <img src="<?= get_template_directory_uri() ?>/images/logo-full.svg" alt="TBS Group" class="img-fluid" />
    </a>
    <div class="item-thumb"  >
        <img src="<?= $banner ?>" alt="" title="<?= $cur_post_title ?>" class="img-fluid w-100">
    </div>
</section>

<section class="default section_content ">
    <div class="bg"></div>
    <div class=" section-padding ">
        <div class="container">
            <h2 class="section-title"><span class="text-g"><?= __( 'Search', 'tbs' ) ?></span></h2>
            <h1 class="page-title box-title box-title-color">
                <div class="inner"><?php printf( __( 'Kết quả tìm kiếm: <strong>“%s”</strong>', 'tbs' ), get_search_query() ); ?></div>
            </h1>
            <div class="main-content-wrapper">
                <div class="page-content page-news page-search">
                    <div class="main-content">
                    <?php if ( have_posts() ) : ?>
                        <div class="post-list ">
                            <?php
                                while ( have_posts() ) : the_post();
                                    $images = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full', false, false);
                                    $title= $post->post_title;
                                    $excerpt = get_the_excerpt();
                                    $link= get_permalink();
                                    $postType =get_post_type();
                                    $html = '<div id="post-'.get_the_id().'" class="post-item">';
                                    /*$html .= '<div class="post-image">';
                                    $html .= '<a title="'.$title.'" href="'.$link.'"><img class="img-responsive" title="'.$title.'" alt="'.$title.'" src="'.$images[0].'" /><span class="overlay"></span></a>';
                                    $html .= '</div>';*/
                                    $html .= '<h3 class="post-title">';
                                    $html .= '<a title="'.$title.'" href="'.$link.'">'.$title.'</a>';
                                    $html .= '</h3>';
                                    $html .= '<p>';
                                    $html .= $excerpt;
                                    $html .= '</p>';
                                    $html .= '<div class="text-right"><a class=" btn-detail" href="'.$link.'" title="">'.__( 'Learn more', 'tbs' ).'</a></div>';
                                    $html .= '</div>';

                                    //echo $html.$html.$html.$html.$html.$html.$html.$html.$html.$html.$html.$html;
                                    echo $html;
                                endwhile;
                            ?>

                        </div>
                    <?php  endif; ?>

                    <!-- pagination here -->
                     <?php
                          if (function_exists('custom_pagination')) {
                            custom_pagination();
                          }
                        ?>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
</section>


<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".products .row .col-sm-3:nth-child(4n)").after('<div class="clearfix"></div>');
    });
</script>



<?php

get_footer();