<?php
/**
 * Template Name: HomePage
 * Description:
 *
 * Tip:
 *
 * @package WordPress
 * @subpackage tbs
 * @since tbs 1.0
 */

get_header();


$pageID = get_queried_object_id();
$home_banner = tr_posts_field('home_banner',$pageID);
$home_banner_content = tr_posts_field('home_banner_content',$pageID);
$home_banner_video = tr_posts_field('home_banner_video',$pageID);
$home_banner_video_poster = tr_posts_field('home_banner_video_poster',$pageID);
$banner_content = tr_posts_field('banner_content',$pageID);
$banner_link = tr_posts_field('banner_link',$pageID);

$poster="";
if(!empty($home_banner_video_poster)){
    $poster = wp_get_attachment_image_src($home_banner_video_poster,'full', false, false)[0];
}


?>


<section class="animatedParent animateOnce fp-auto-height-responsive section-home-slide dark <?= !empty($home_banner_video)?"with-video":"" ?>  section-top  disable-lazy-load"  data-anchor="tbs" data-title="<?= __("TBS Group","tbs") ?>" >
    <?php if(!empty($home_banner_video)) {
        $bannerVideo = getYoutubeID($home_banner_video);
    ?>
        <div class="bg item-video video-background">
            <div class="plyr__video-embed" id="player" data-poster="<?= $poster ?>">
              <iframe
                src="https://www.youtube.com/embed/<?= $bannerVideo ?>?playlist=<?= $bannerVideo ?>&autoplay=1&loop=1&mute=1&controls=0&playsinline=1&iv_load_policy=3&vq=hd720&enablejsapi=1"
                allowfullscreen
                allowtransparency
                allow="autoplay"
              ></iframe>
            </div>
            <script type="text/javascript">
                jQuery(document).ready(function(){
                    const player = new Plyr('#player',{
                      controls: ['play-large','mute'],
                      //volume: 0,
                      autoplay: true,
                      muted: true,
                      youtube:{
                        mute:1,
                        autoplay:1
                      }
                    });
                    if(jQuery("#player").data("poster")!=""){
                        setTimeout(() => {
                            player.poster = jQuery("#player").data("poster");
                        }, 500)
                    }
                })
            </script>
        </div>
    <?php } else { ?>
    <div class="swiper home-slide d-bg-ani" data-swiper-autoplay="2000">
        <div class="bg"></div>
      <div class="swiper-wrapper">
        <?php foreach ($home_banner as $key => $value) {
            $img = wp_get_attachment_image_src($value["image"],'full', false, false)[0];
            $img_mobile= $img;
            if(!empty($value["image_mobile"])){
                $img_mobile = wp_get_attachment_image_src($value["image_mobile"],'full', false, false)[0];
            }
        ?>
        <?php if(!empty($value["link"])) { ?>
            <a class="swiper-slide item cover" <?= !empty($value["link"])?"href='".$value["link"]."'":"" ?>>
        <?php } else{ ?>
            <div class="swiper-slide item cover">
        <?php } ?>
            <picture class="item-thumb">
              <source media="(min-width:1200px)" srcset="<?= $img ?>">
              <img class="w-100" src="<?= $img_mobile ?>" alt="<?= __("tbs","tbs") ?>" >
            </picture>
        <?php if(!empty($value["link"])) { ?>
            </a>
        <?php }else { ?>
        </div>
        <?php }?>
        <?php } ?>
      </div>

    </div>
    <?php } ?>
    <div class="section-content-wrapper text-center">
        <div class="container-d">
            <div class="banner-logo">
                <img src="<?= get_template_directory_uri() ?>/images/logo.svg" alt="TBS Group" class="img-fluid" />
            </div>
            <h2 class="section-title <?= defaultAnimation(1) ?>"><?= $banner_content ?></h2>
            <?php if(!empty($banner_link)){ ?>
            <a class="btn fw-bold btn-lg btn-outline" href="<?= $banner_link ?>"><span><?= __("Xem thêm","tbs") ?></span></a>
            <?php } ?>

        </div>
    </div>
</section>

<?php
    $sectionTitle = tr_posts_field('about_title',$pageID);
    $sectionContent = tr_posts_field('about_description',$pageID);
    $sectionItems = tr_posts_field('about_items',$pageID);
?>
<section class=" animatedParent animateOnce fp-auto-height-responsive fp-noscroll section-cover section-subsidiary dark" data-anchor="<?= sanitize_title(__("Công ty đầu tư","tbs")) ?>"  data-title="<?= __("Công ty đầu tư","tbs") ?>">
    <div class="h-100 d-flex flex-column">
        <div class="section-content-wrapper div_zindex section-padding text-center" >
            <div class="container-d">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="section-title"><?= $sectionTitle ?></div>
                        <div class="section-content fz-20"><?= apply_filters("the_content",$sectionContent) ?></div>
                        <a class="btn btn-over fw-bold btn-lg btn-detail" href="<?= getPageTemplateUrl("aboutus") ?>"><span><?= __("Xem thêm","tbs") ?></span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-slide-wrapper section-padding-lg">
            <div class="container-d">
                <div class="section-slide " >
                      <div class="swiper swiper-default subsidiary-slide scrollable-content " >
                        <div class="swiper-wrapper">
                            <?php foreach ($sectionItems as $key => $value) {

                            ?>
                            <div class="swiper-slide" >
                                <?php if(!empty($value["link"])) { ?>
                                <a class="item" href="<?= $value["link"] ?>" target="_blank" rel="noopener">
                                    <?= wp_get_attachment_image($value["image"], 'full', false, ["class"=>"img-fluid", "alt"=>$value["title"]] ) ?>
                                </a>
                                <?php } else { ?>
                                <div class="item">
                                    <?= wp_get_attachment_image($value["image"], 'full', false, ["class"=>"img-fluid","alt"=>$value["title"]] ) ?>
                                </div>
                                <?php } ?>
                            </div>
                            <?php } ?>

                        </div>

                    </div>
                    <div class="slide-control ">
                        <div class="swiper-pagination mt-4"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>

<section class=" animatedParent animateOnce fp-auto-height-responsive fp-noscroll section-cover section-activity" data-anchor="<?= sanitize_title(__("Lĩnh vực hoạt động","tbs")) ?>" data-title="<?= __("Lĩnh vực hoạt động","tbs") ?>">
    <div class="section-content-wrapper  div_zindex section-padding">
        <div class="container-d">
            <h2 class="section-title text-center">Lĩnh vực hoạt động</h2>
            <div class="section-slide-wrapper">
                <div class="section-slide " >
                    <div class="swiper swiper-default activity-slide  " >
                        <div class="swiper-wrapper">
                            <div class="swiper-slide" >
                                <div class="item" data-count="2">
                                    <div class="item-thumb fit-ratio">
                                        <img src="<?= get_template_directory_uri() ?>/images/tmp/img-tbs-industrial.png" alt="TBS Group" class="img-fluid" />
                                    </div>
                                    <div class="item-body">
                                        <div class="logo">
                                            <img src="<?= get_template_directory_uri() ?>/images/tmp/industrial.png" alt="TBS Group" class="img-fluid" />
                                        </div>
                                        <div class="description ellips">Được thành lập từ năm 1989, TBS Group hiện nay là một trong những công ty sản xuất công nghiệp hàng đầu tại Việt Nam với 2 trụ cột chính là: Giày - Túi xách, hệ thống sản xuất trải dài Bắc vào Nam...</div>
                                        <div class="links">
                                            <a href="#" >Ngành Giày</a>
                                            <a href="#" >Ngành Túi xách</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" >
                                <div class="item"  data-count="3">
                                    <div class="item-thumb fit-ratio">
                                        <img src="<?= get_template_directory_uri() ?>/images/tmp/img-tbs-land.png" alt="TBS Group" class="img-fluid" />
                                    </div>
                                    <div class="item-body">
                                        <div class="logo">
                                            <img src="<?= get_template_directory_uri() ?>/images/tmp/tbl-land.png" alt="TBS Group" class="img-fluid" />
                                        </div>
                                        <div class="description ellips">Được thành lập từ năm 1989, TBS Group hiện nay là một trong những công ty sản xuất công nghiệp hàng đầu tại Việt Nam với 2 trụ cột chính là: Giày - Túi xách, hệ thống sản xuất trải dài Bắc vào Nam...</div>
                                        <div class="links">
                                            <a href="#" >Ngành Giày</a>
                                            <a href="#" >Ngành Túi xách</a>
                                            <a href="#" >Thương mại & Dịch vụ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide-control ">
                        <div class="swiper-pagination mt-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class=" animatedParent animateOnce fp-auto-height-responsive fp-noscroll section-cover section-sustainable-development" data-anchor="<?= sanitize_title(__("Phát triển bền vững","tbs")) ?>" data-title="<?= __("Phát triển bền vững","tbs") ?>">
    <div class="section-content-wrapper  div_zindex section-padding">
        <div class="container-d">
            <h2 class="section-title text-center">Phát triển bền vững<br>
                <span class="lg d-block">VÌ CON NGƯỜI – VÌ MÔI TRƯỜNG – VÌ CỘNG ĐỒNG</span>
            </h2>
            <div class="section-content">
                <div class="row gutter-xxl align-items-center">
                    <div class="col-lg-4">
                        <h3 class="section-subtitle color-3">SỨC KHỎE & <br>AN TOÀN LAO ĐỘNG</h3>
                        <div class="description mt-4">
                            <p>Sức khoẻ và sự an toàn của nhân viên công ty và đối tác là một trong những vấn đề quan trọng và được quan tâm nhất của TBS.</p>
                            <p><strong>Các hoạt động vì sức khoẻ và an toàn lao động:</strong></p>
                            <ul>
                                <li>Cung cấp và duy trì môi trường làm việc khỏe mạnh và an toàn cho nhân viên của công ty.</li>
                                <li>Bảo vệ sức khỏe và an toàn của nhân viên, nhà thầu, và khách tham quan công ty.</li>
                            </ul>
                        </div>
                        <a class="btn btn-primary mt-4" href="#"><span>xem thêm</span></a>
                    </div>
                    <div class="col-lg-8">
                        <div class="section-slide " >
                            <div class="swiper swiper-default sustainable-development-slide  sustainable-development-items" >
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide" >
                                        <div class="item-wrapper">
                                            <div class="item" >
                                                <div class="item-thumb ">
                                                    <img src="<?= get_template_directory_uri() ?>/images/tmp/ptbv-suc-khoe.png" alt="TBS Group" class="img-fluid" />
                                                </div>
                                                <div class="item-body">
                                                    <h3 class="title sm">SỨC KHỎE & <br>AN TOÀN LAO ĐỘNG</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" >
                                        <div class="item-wrapper">
                                            <div class="item" >
                                                <div class="item-thumb">
                                                    <img src="<?= get_template_directory_uri() ?>/images/tmp/ptbv-moi-truong.png" alt="TBS Group" class="img-fluid" />
                                                </div>
                                                <div class="item-body">
                                                    <h3 class="title sm">SỨC KHỎE & <br>AN TOÀN LAO ĐỘNG</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" >
                                        <div class="item-wrapper">
                                            <div class="item" >
                                                <div class="item-thumb ">
                                                    <img src="<?= get_template_directory_uri() ?>/images/tmp/ptbv-moi-truong.png" alt="TBS Group" class="img-fluid" />
                                                </div>
                                                <div class="item-body">
                                                    <h3 class="title sm">SỨC KHỎE & <br>AN TOÀN LAO ĐỘNG</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class=" animatedParent animateOnce fp-auto-height-responsive fp-noscroll section-cover section-awards" data-anchor="<?= sanitize_title(__("Giải thưởng","tbs")) ?>" data-title="<?= __("Giải thưởng","tbs") ?>">
    <div class="section-content-wrapper  div_zindex">
        <div class="p-left-xl">
            <div class="row gutter-0 align-items-center">
                <div class="col-lg-7">
                    <div class="section-content-inner section-padding">
                        <h2 class="section-title">Giải thưởng</h2>
                        <div class="section-slide " >
                            <div class="swiper swiper-default awards-slide awards-items  " >
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide" >
                                        <div class="item">
                                            <div class="item-thumb">
                                                <img src="<?= get_template_directory_uri() ?>/images/tmp/gt/gt-1.png" alt="TBS Group" class="img-fluid" />
                                            </div>
                                            <div class="item-body">
                                                <h4 class="title md">TOP THƯƠNG HIỆU MẠNH VIỆT 2024</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" >
                                        <div class="item">
                                            <div class="item-thumb">
                                                <img src="<?= get_template_directory_uri() ?>/images/tmp/gt/gt-2.png" alt="TBS Group" class="img-fluid" />
                                            </div>
                                            <div class="item-body">
                                                <h4 class="title md">TOP THƯƠNG HIỆU MẠNH VIỆT 2024</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" >
                                        <div class="item">
                                            <div class="item-thumb">
                                                <img src="<?= get_template_directory_uri() ?>/images/tmp/gt/gt-3.png" alt="TBS Group" class="img-fluid" />
                                            </div>
                                            <div class="item-body">
                                                <h4 class="title md">TOP THƯƠNG HIỆU MẠNH VIỆT 2024</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" >
                                        <div class="item">
                                            <div class="item-thumb">
                                                <img src="<?= get_template_directory_uri() ?>/images/tmp/gt/gt-4.png" alt="TBS Group" class="img-fluid" />
                                            </div>
                                            <div class="item-body">
                                                <h4 class="title md">TOP THƯƠNG HIỆU MẠNH VIỆT 2024</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" >
                                        <div class="item">
                                            <div class="item-thumb">
                                                <img src="<?= get_template_directory_uri() ?>/images/tmp/gt/gt-5.png" alt="TBS Group" class="img-fluid" />
                                            </div>
                                            <div class="item-body">
                                                <h4 class="title md">TOP THƯƠNG HIỆU MẠNH VIỆT 2024</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" >
                                        <div class="item">
                                            <div class="item-thumb">
                                                <img src="<?= get_template_directory_uri() ?>/images/tmp/gt/gt-6.png" alt="TBS Group" class="img-fluid" />
                                            </div>
                                            <div class="item-body">
                                                <h4 class="title md">TOP THƯƠNG HIỆU MẠNH VIỆT 2024</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="slide-control ">
                                <div class="swiper-pagination mt-4"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="section-image full-h-lg clip-thumb-wrapper">
                        <div class="item-thumb clip-thumb clip-left">
                            <img src="<?= get_template_directory_uri() ?>/images/tmp/bg-gt.png" alt="TBS Group" class="img-fluid" />
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>




<?php

nmc_get_template_part( 'partials/section-news', [
    'sId' => "news",
    'anchor'=>"tin-tuc",
    'title'=> __("Tin tức","tbs")
] );

?>


<?php get_footer("home"); ?>
