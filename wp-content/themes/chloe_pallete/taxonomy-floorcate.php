<?php
get_header();

$cate = get_queried_object();
$allPost=[];
if (have_posts()) {
  while (have_posts()) {
    the_post();
    $allPost[]= $post;
  }
}

$terms = get_terms( array(
    'taxonomy'   => 'floorcate',
    'hide_empty' => false,
) );

?>
<?php
    $sectionId = $cate->term_id;
    $sectionTitle= $cate->name;
    $sectionImage = tr_taxonomies_field('map','floorcate', $sectionId );

?>
<section class=" animatedParent animateOnce fp-noscroll fp-auto-height-responsive section-masterplan section-floor dark section-with-nav" data-anchor="<?= $isFrontPage?"mat-bang":"tbs" ?>" style="" data-title="<?= __("Mặt bằng","tbs") ?>">
    <div class="section-content-wrapper section-padding">
        <div class="container-fluid">
            <div class="inner  pb-0 relative">
                <div class="content">
                     <h2 class="section-title <?= defaultAnimation(1) ?>"><strong><?= $sectionTitle ?></strong></h2>
                </div>
                <div class="content-right text-start">
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <?= $sectionTitle ?>
                    </button>
                    <ul class="dropdown-menu" >
                      <?php foreach ($terms as $key => $term) { ?>
                        <li><a class="dropdown-item" href="<?= get_term_link($term) ?>"><?= $term->name ?></a></li>
                      <?php } ?>
                    </ul>
                  </div>
                  <?php if(!empty( $sectionImage)) { ?>
                  <div class=" ps-4 d-none d-lg-block">
                      <div class="my-2 my-lg-4 text-uppercase"><?= __("Hướng & vị trí","tbs") ?></div>

                    <div class="section-image"> <?= wp_get_attachment_image( $sectionImage, 'full', false, ["class"=>"img-fluid "] ) ?></div>
                  </div>
                   <?php } ?>
                </div>
            </div>

        </div>
    </div>

    <div class="section-tabs">
      <div class="text-note font-1">
            <?= __("Hover và Click vào mặt bằng để xem chi tiết","tbs") ?>
        </div>
      <ul class="nav nav-tabs"  role="tablist">
        <?php
        $index =0;
        foreach ($allPost as $key => $post) {
          $index++;
        ?>
          <li class="nav-item" role="presentation">
            <button class="nav-link <?= $index==1?"active":"" ?>" id="floor-<?= $post->ID ?>-tab" data-bs-toggle="tab" data-bs-target="#floor-<?= $post->ID ?>" type="button" role="tab" aria-controls="floor-<?= $post->ID ?>" aria-selected="true"><?= $post->post_title ?></button>
        </li>
        <?php } ?>
      </ul>
    </div>
    <div class="tab-content" >
      <?php
        $index =0;
        foreach ($allPost as $key => $post) {
          $index++;
          $subdivision_bg = tr_posts_field('subdivision_bg',$post->ID);
          $subdivision_image = wp_get_attachment_image_src($subdivision_bg,'full');
          $sectionItems = tr_posts_field('prod_items',$post->ID);

          $legend = tr_posts_field('legend',$post->ID);

        ?>
      <div class="tab-pane fade <?= $index==1?"show active":"" ?>" id="floor-<?= $post->ID ?>" role="tabpanel" aria-labelledby="floor-<?= $post->ID ?>-tab">
        <div class="masterplan-map-outter div_zindex order-last-m">
          <div class="masterplan-map-inner">
            <div class="masterplan-map-wrapper d-flex ">
                <div class="masterplan-map d-bg-ani " style="background-image: url('<?=  $subdivision_image[0];  ?>')">
                    <div class="inner " >
                        <?php $s=0; $delay=0; $maps=""; ?>
                        <?php foreach ($sectionItems as $key => $value) {

                            $prodId = $value["prod"];
                            $position = $value["position"];
                            $position = explode(",",$position);
                            if(count($position) != 2 || empty($prodId)){
                                continue;
                            }
                            $delay+= 250;
                            $maps.='<g class="item-hover trigger-product-detail" data-url="'.$prodId.'" data-key="'.$key.'" data-thap="'.$sectionTitle.'" data-tang="'.$post->post_title.'" data-id="item-'.$key.'-hover">'.$value["coordinates"].'</g>';
                            ?>
                            <div class="item" data-id="item-<?= $key ?>-hover" style="left:<?= $position[1]- $s ?>px; top:<?= $position[0]-$s ?>px;">
                                <div class="text-inner">
                                    <h3 class="title font-1">
                                      <span class="line"></span>
                                      <?= __("Căn hộ","tbs") ?><strong><?= $value["title"] ?></strong>
                                    </h3>
                                    <div class="content">
                                        <div class="d-flex justify-content-between attr">
                                            <?= __("Diện tích tim tường","tbs") ?>: <strong><?= tr_posts_field("acreage_1",$prodId) ?></strong>
                                        </div>
                                        <div class="d-flex justify-content-between attr">
                                            <?= __("Diện tích thông thủy","tbs") ?>: <strong><?= tr_posts_field("acreage_2",$prodId) ?></strong>
                                        </div>
                                        <div class="d-flex justify-content-between attr">
                                            <?= __("Phòng ngủ","tbs") ?>: <strong><?= tr_posts_field("bed",$prodId) ?></strong>
                                        </div>
                                        <div class="d-flex justify-content-between attr">
                                            <?= __("Phòng tắm","tbs") ?>: <strong><?= tr_posts_field("bath",$prodId) ?></strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="svg-map">
                            <svg width="<?= $subdivision_image[1] ?>" height="<?= $subdivision_image[2] ?>" viewBox="0 0 <?= $subdivision_image[1] ?> <?= $subdivision_image[2] ?>" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <?= $maps ?>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="map-legend">
            <div class="inner">
              <h2 class="section-title"><?= __("Mặt bằng","tbs") ?><strong class="d-block mt-1"><?= $post->post_title ?></strong></h2>
              <ul>
                <?php foreach ($legend as $key => $value) { ?>
                <li><span class="icon" style="background: <?= $value["color"] ?>;"></span><?= $value["title"] ?></li>
                <?php } ?>
              </ul>
            </div>
          </div>
      </div>

      </div>
      <?php } ?>

    </div>


</section>
<?php
get_footer();