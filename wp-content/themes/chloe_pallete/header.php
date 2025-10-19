<?php

/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 */

?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?> xmlns:fb="http://ogp.me/ns/fb#">
<!--<![endif]-->

<head>
<meta charset="UTF-8" />
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="format-detection" content="telephone=no">

<title><?php  wp_title(''); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />

<link href="<?= get_template_directory_uri(); ?>/plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?= get_template_directory_uri(); ?>/plugin/font-awesome/css/all.min.css" rel="stylesheet" >

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Display:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/style.css?v=<?= SITE_VERSION ?>">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


<?php
  $currentLang = get_locale();
  $currentLang= explode("_",$currentLang)[0];

	wp_enqueue_script('jquery', array(), SITE_VERSION, true);

  wp_enqueue_script('bootstrap_bundle', get_template_directory_uri() . '/plugin/bootstrap/js/bootstrap.bundle.min.js',array(),null,true);
  wp_enqueue_script('bootbox', get_template_directory_uri() . '/js/bootbox.min.js',array(),null,true);
  
  wp_enqueue_style( 'bootstrapvalidator', get_template_directory_uri() . '/plugin/bootstrapvalidator/bootstrapValidator.min.css' );
  wp_enqueue_script('formValidation', get_template_directory_uri() . '/plugin/bootstrapvalidator/formValidation.min.js',array(),null,true);
  wp_enqueue_script('bootstrapvalidator', get_template_directory_uri() . '/plugin/bootstrapvalidator/bootstrap.min.js',array(),null,true);
  if( $currentLang=="vi"){
    wp_enqueue_script('bootstrapvalidator_lang', get_template_directory_uri() . '/plugin/bootstrapvalidator/language/vi_VN.js',array(),null,true);  
  }
  
  
  wp_enqueue_script('ajaxform', get_template_directory_uri() . '/js/ajax-form.min.js',array(),SITE_VERSION,true);
  
  wp_enqueue_script('fancybox', get_template_directory_uri() . '/plugin/fancybox/jquery.fancybox.min.js',array(),SITE_VERSION,true);
  wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/plugin/fancybox/jquery.fancybox.min.css' );

  wp_enqueue_style( 'animations', get_template_directory_uri() . '/plugin/css3-animate-it/css/animations.css',20 );
  wp_enqueue_script('animations', get_template_directory_uri() . '/plugin/css3-animate-it/js/css3-animate-it.js',array(),"1.0.1",true);
  
  wp_enqueue_style( 'fullpage', get_template_directory_uri() . '/plugin/fullpage/jquery.fullpage.min.css');
  wp_enqueue_script('fullpage', get_template_directory_uri() . '/plugin/fullpage/jquery.fullpage.min.js',array(),SITE_VERSION,true);
  wp_enqueue_script('fullpage_scrolloverflow', get_template_directory_uri() . '/plugin/fullpage/vendors/scrolloverflow.min.js',array(),SITE_VERSION,true);

  wp_enqueue_style( 'swiper', get_template_directory_uri() . '/plugin/swiper/swiper-bundle.min.css');
  wp_enqueue_script('swiper', get_template_directory_uri() . '/plugin/swiper/swiper-bundle.min.js',array(),SITE_VERSION,true);
  
  wp_enqueue_script('nicescroll', get_template_directory_uri() . '/plugin/jquery.nicescroll/dist/jquery.nicescroll.min.js',array(),SITE_VERSION,true);



  wp_enqueue_style( 'plyr', get_template_directory_uri() . '/plugin/plyr/plyr.css',20 );
  wp_enqueue_script('plyr', get_template_directory_uri() . '/plugin/plyr/plyr.min.js',array(),null,true);
  wp_enqueue_script('splitType', get_template_directory_uri() . '/js/split-type.js',array(),null,true);

  wp_enqueue_script('inlineSVG', get_template_directory_uri() . '/js/inlineSVG.min.js',array(),SITE_VERSION,true);

  wp_enqueue_script('default', get_template_directory_uri() . '/js/default.js',array(),SITE_VERSION,true);

	wp_head();

global $hotline; 
$hotline = tr_options_field('tr_theme_options.company_phone');
if(is_array($hotline)){
  $hotline=  $hotline[array_rand($hotline)];
}


    $facebook= tr_options_field('tr_theme_options.facebook');
    $tiktok= tr_options_field('tr_theme_options.tiktok');
    $youtube= tr_options_field('tr_theme_options.youtube');

    $link_360= tr_options_field('tr_theme_options.link_360');

  
  $currentLang = get_locale();
  $currentLang= explode("_",$currentLang)[0];
  $homeUrl = home_url();
  $isFrontPage = is_front_page();

  $languages=[
    ["url"=>"#","slug"=>"vi"],
    ["url"=>"#","slug"=>"en"],
  ];
  if(function_exists("pll_the_languages")){
    $languages =   pll_the_languages( array(
           'show_flags' => 0,
           'hide_current'=>0,
           'raw'=>1
      ));  
  }
  
 ?>

 <script type="text/javascript">
    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    var homeurl = "<?php echo $homeUrl ?>";
    var thankurl = "<?php echo getPageTemplateUrl('thanks'); ?>";
    var template_directory = "<?php echo get_template_directory_uri(); ?>";
    var app = {
      message:{
        content_empty:'<?= __("Nội dung đang cập nhật","tbs") ?>',
        register_success:'<?= __("<p>Cám ơn Quý khách đã liên hệ!</p><p>Chúng tôi sẽ liên hệ Quý khách trong thời gian sớm nhất<p>Xin cảm ơn!</p>","tbs") ?>',
        register_duplicate:'<?= __("<p>Đăng ký không thành công.</p><p>Tài khoản Email hoặc Số điện thoại đã được liên hệ.</p>","tbs") ?>',
        register_false:'<?= __("<p>Đăng ký không thành công.</p><p>Vui lòng liên hệ qua hotline.</p>","tbs") ?>',
        term_false:'<?= __("DIEU_KHOAN_LOI_XAC_NHAN","tbs") ?>',
        term_success:'<?= __("DIEU_KHOAN_HOAN_THANH","tbs") ?>',
        term_success_button:'<?= __("Hoàn thành","tbs") ?>'
      },
      variable: {lang:'vi_VN'},
    }
</script>
 <!-- Internet Explorer condition - HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]--> 

<?= tr_options_field('tr_theme_options.script_header');?>


</head>

<?php 
  global $disableFullpage;
  global $pageClass;
?>
<body class="<?= $isFrontPage ?"home-page":"" ?> <?= !empty($disableFullpage)?"disable-fullpage":"" ?> <?= $pageClass ?>">
  <?= tr_options_field('tr_theme_options.script_body');?>
  <div class="overlay-menu intro-bg d-bg">
    <div class="bg"></div>
    <div class="container div_zindex ">
      <div class="row">

        <div class="col-lg-7 order-lg-last">
          <div class="main-menu-container">
            <?php wp_nav_menu( array( 'theme_location' => 'primary','container' => 'ul', 'menu_class' => 'menu font-2' ) ); ?>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="menu-logo-wrapper h-100 d-flex flex-column">
            <a class="d-none d-lg-block menu-logo mb-5" href="<?= $isFrontPage? "#tbs": $homeUrl ?>" >
              <img src="<?= get_template_directory_uri() ?>/images/logo-white.svg" alt="TBS Group" class="img-fluid" />
            </a>
            <div class="social mt-5  mt-lg-auto mb-4 d-flex">
                <a href="<?= $facebook ?>" target="_blank" rel="noopener" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="<?= $youtube ?>" target="_blank" rel="noopener" aria-label="Youtube"><i class="fab fa-youtube"></i></a>
                <a href="<?= $tiktok ?>" target="_blank" rel="noopener" aria-label="Tiktok"><i class="fab fa-tiktok"></i></a>
                <?php if(!empty($link_360)) { ?>
                <a href="<?= $link_360 ?>" class="svg-ani1">
                  <img class="svg" src="<?= get_template_directory_uri() . '/images/icon-360.svg' ?>"  alt="" />
                </a>
                <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Header -->
  <header id="header" class="b-static animated fadeInDownShort delay-250">
    <!-- Navigation -->
    <div class="header-bottom ">
      <div class="container-fluid">
        <nav class="navbar justify-content-between  ">
          <a class="navbar-brand" href="<?= $isFrontPage? "#tbs": $homeUrl ?>" >
            <svg width="136" height="67" viewBox="0 0 136 67" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M89.9918 43.3688L98.9112 41.4047L101.307 32.2488C100.553 32.4112 99.8431 32.5441 99.3698 32.6032C96.6777 33.0315 94.2223 32.869 91.826 32.3965C91.3822 32.7509 90.9829 32.9872 90.3764 32.9724C90.1693 32.9724 89.977 32.9429 89.7995 32.8986L87.7139 40.8583L87.4477 41.833C87.3293 42.7338 87.6252 43.8857 89.9918 43.3688Z" fill="url(#paint0_linear_293_3548)"/>
              <path d="M107.195 1.79785C107.062 1.79785 106.944 1.79785 106.84 1.82739L97.5658 3.52567L90.9688 28.6159C91.8858 28.9556 92.3592 29.6792 92.4627 30.4914C94.5188 30.964 97.6842 31.3184 101.752 30.5948C101.855 30.2994 108.63 4.64801 108.63 4.64801C109.266 2.19658 108.024 1.81262 107.195 1.81262V1.79785Z" fill="url(#paint1_linear_293_3548)"/>
              <path d="M101.989 48.6111L110.879 46.6913L116.559 25.2634L116.973 23.698C115.804 24.3478 114.429 25.4406 114.015 25.7507C111.574 27.5672 108.808 29.3688 105.953 30.4321C105.657 31.2148 104.903 31.7759 104.03 31.7612C103.868 31.7612 103.69 31.7316 103.527 31.6873L99.6963 46.1301L99.4301 47.09C99.3265 47.9908 99.6076 49.1132 101.974 48.6111H101.989Z" fill="url(#paint2_linear_293_3548)"/>
              <path d="M119.206 7.04047C119.058 7.04047 118.94 7.04047 118.821 7.07L109.577 8.72398L104.488 28.1434C104.873 28.2173 105.213 28.424 105.465 28.7046C105.598 28.6603 105.731 28.616 105.849 28.5717C109.665 27.1688 111.914 25.2785 114.487 23.595C114.739 23.4473 115.907 22.709 117.461 21.8524L120.626 9.84632C121.247 7.42443 120.034 7.04047 119.206 7.04047Z" fill="url(#paint3_linear_293_3548)"/>
              <path d="M117.179 41.818L126.069 39.8982L131.793 18.2931C131.32 18.3522 130.832 18.4408 130.433 18.5146C130.388 18.5294 130.344 18.5294 130.314 18.5441C129.856 18.6475 129.56 18.7066 129.56 18.7066C127.356 19.2678 124.398 20.2129 121.232 21.7783C121.129 22.5462 120.463 23.1369 119.679 23.1369C119.516 23.1369 119.354 23.0926 119.191 23.0483L114.887 39.3518L114.635 40.2969C114.532 41.1977 114.813 42.3201 117.179 41.8032V41.818Z" fill="url(#paint4_linear_293_3548)"/>
              <path d="M135.832 3.05293C136.453 0.631029 135.211 0.24707 134.397 0.24707C134.264 0.24707 134.146 0.24707 134.042 0.276606L124.812 1.94535L119.99 20.1982C120.271 20.2425 120.508 20.3311 120.715 20.5083C122.963 19.5336 125.789 18.559 129.634 17.732C130.137 17.6434 130.995 17.4809 132.075 17.3185L135.847 3.05293H135.832Z" fill="url(#paint5_linear_293_3548)"/>
              <path d="M97.0485 56.4971C97.0485 56.6743 97.0484 56.822 97.0337 56.9402C97.0189 57.0583 97.0041 57.1469 96.9745 57.2355C96.9449 57.3094 96.9153 57.3537 96.8857 57.3832C96.8414 57.4127 96.797 57.4275 96.7526 57.4275C96.6787 57.4275 96.5455 57.3832 96.3828 57.2798C96.2201 57.1764 95.9982 57.0583 95.7172 56.9402C95.4362 56.8073 95.0959 56.6891 94.7114 56.6005C94.3268 56.4824 93.883 56.4381 93.3801 56.4381C92.8328 56.4381 92.3299 56.5267 91.9009 56.7334C91.4572 56.9106 91.0874 57.1912 90.762 57.5161C90.4662 57.8705 90.2147 58.284 90.052 58.7714C89.8893 59.2587 89.8005 59.8051 89.8005 60.381C89.8005 61.0308 89.8893 61.6067 90.0668 62.0793C90.2295 62.5666 90.4809 62.9801 90.7768 63.305C91.0874 63.6447 91.472 63.881 91.9009 64.0582C92.3447 64.2206 92.818 64.3092 93.3357 64.3092C93.5872 64.3092 93.8387 64.2797 94.0901 64.2206C94.3416 64.1615 94.5782 64.0729 94.7705 63.9696V61.3409H92.6553C92.537 61.3409 92.4482 61.2819 92.4039 61.1489C92.3447 61.016 92.3299 60.7945 92.3299 60.4844C92.3299 60.322 92.3299 60.189 92.3447 60.0709C92.3447 59.9675 92.3891 59.8789 92.4039 59.8199C92.4334 59.746 92.4778 59.7017 92.5074 59.6722C92.537 59.6426 92.5962 59.6279 92.6553 59.6279H96.442C96.5455 59.6279 96.6195 59.6279 96.6935 59.6722C96.7674 59.7017 96.8414 59.7608 96.9005 59.8199C96.9449 59.8937 96.9893 59.9528 97.0189 60.0414C97.0484 60.13 97.0632 60.2481 97.0632 60.3515V64.8261C97.0632 65.0033 97.0337 65.151 96.9745 65.2691C96.9153 65.402 96.797 65.5202 96.6047 65.5792C96.4124 65.6678 96.1757 65.7417 95.9095 65.8155C95.6432 65.8894 95.3474 65.9632 95.0516 66.0223C94.7557 66.0813 94.4451 66.1256 94.1493 66.1552C93.8534 66.1847 93.5428 66.1995 93.2322 66.1995C92.3299 66.1995 91.5312 66.0666 90.8212 65.8155C90.1112 65.5645 89.5047 65.1805 89.0314 64.7079C88.5284 64.2058 88.1586 63.6151 87.9072 62.9063C87.6409 62.2122 87.5078 61.4148 87.5078 60.5139C87.5078 59.6131 87.6409 58.7713 87.922 58.0477C88.203 57.3241 88.5876 56.6891 89.1053 56.187C89.6082 55.6701 90.2295 55.2862 90.9543 55.0056C91.6791 54.7398 92.4778 54.6069 93.3653 54.6069C93.8534 54.6069 94.2972 54.6512 94.6966 54.7102C95.0959 54.7841 95.4362 54.8579 95.732 54.9465C96.0426 55.0499 96.2793 55.1533 96.4716 55.2566C96.6787 55.36 96.8118 55.4634 96.8857 55.5372C96.9597 55.6111 97.0337 55.7292 97.0632 55.8769C97.0928 56.0246 97.1076 56.2608 97.1076 56.5414" fill="#014129"/>
              <path d="M106.455 65.6973C106.455 65.7711 106.455 65.8154 106.411 65.8597C106.396 65.9188 106.337 65.9483 106.248 65.9779C106.159 66.0074 106.026 66.0074 105.864 66.037C105.701 66.0665 105.464 66.0665 105.168 66.0665C104.932 66.0665 104.739 66.0665 104.577 66.037C104.444 66.0222 104.325 66.0074 104.236 65.9779C104.148 65.9336 104.089 65.904 104.059 65.8597C104.029 65.8007 104 65.7416 103.97 65.6825L102.964 63.1573C102.846 62.8767 102.728 62.6404 102.595 62.4189C102.491 62.1974 102.358 62.0201 102.21 61.8725C102.062 61.7248 101.914 61.6067 101.722 61.5328C101.53 61.459 101.323 61.4147 101.071 61.4147H100.361V65.6973C100.361 65.6973 100.346 65.8007 100.302 65.8597C100.272 65.904 100.213 65.9336 100.11 65.9779C100.021 66.0074 99.9173 66.0222 99.7694 66.037C99.6215 66.0813 99.4292 66.0813 99.2073 66.0813C98.9854 66.0813 98.8079 66.0813 98.66 66.037C98.5121 66.037 98.3938 66.0222 98.305 65.9779C98.2163 65.9483 98.1571 65.904 98.1275 65.8597C98.0831 65.8007 98.0684 65.7564 98.0684 65.6973V55.4928C98.0684 55.2418 98.1275 55.0498 98.2606 54.9464C98.379 54.8431 98.5417 54.7692 98.734 54.7692H101.648C101.944 54.7692 102.18 54.7692 102.373 54.7692C102.565 54.784 102.728 54.7988 102.89 54.8135C103.349 54.8578 103.763 54.976 104.118 55.1237C104.473 55.2713 104.784 55.4781 105.035 55.7439C105.287 55.9802 105.494 56.2903 105.612 56.6447C105.745 56.9696 105.819 57.3831 105.819 57.8261C105.819 58.1953 105.775 58.535 105.686 58.8451C105.583 59.17 105.449 59.4358 105.257 59.6869C105.065 59.9231 104.843 60.1299 104.577 60.3071C104.31 60.4843 103.985 60.632 103.645 60.7501C103.808 60.824 103.97 60.9273 104.133 61.0455C104.281 61.1636 104.414 61.2965 104.547 61.4737C104.68 61.6362 104.799 61.8282 104.902 62.0349C105.02 62.2417 105.139 62.4927 105.242 62.7438L106.189 64.9589C106.278 65.1804 106.337 65.3429 106.366 65.4462C106.396 65.5349 106.411 65.6235 106.411 65.6678M103.512 58.0624C103.512 57.6932 103.423 57.3979 103.26 57.1321C103.083 56.881 102.816 56.7038 102.432 56.5857C102.314 56.5709 102.18 56.5413 102.033 56.5118C101.885 56.5118 101.678 56.4823 101.426 56.4823H100.405V59.6721H101.559C101.899 59.6721 102.166 59.6278 102.417 59.5539C102.654 59.4801 102.861 59.3767 103.024 59.2291C103.186 59.0962 103.305 58.9189 103.393 58.727C103.467 58.5202 103.512 58.2987 103.512 58.0476" fill="#014129"/>
              <path d="M117.18 60.2482C117.18 61.1785 117.062 62.0055 116.825 62.7439C116.604 63.4823 116.249 64.1025 115.79 64.6194C115.317 65.1215 114.755 65.5055 114.089 65.786C113.423 66.0371 112.625 66.1995 111.752 66.1995C110.879 66.1995 110.11 66.0666 109.459 65.8451C108.808 65.6236 108.261 65.2692 107.817 64.7966C107.388 64.3388 107.063 63.7333 106.841 63.0097C106.619 62.2861 106.516 61.4296 106.516 60.4549C106.516 59.5393 106.634 58.7123 106.856 57.9887C107.092 57.2651 107.433 56.6449 107.891 56.128C108.35 55.6259 108.912 55.2272 109.592 54.9613C110.258 54.6955 111.057 54.5479 111.944 54.5479C112.832 54.5479 113.556 54.666 114.207 54.8875C114.858 55.109 115.405 55.4634 115.834 55.9212C116.278 56.3938 116.604 56.9845 116.84 57.7081C117.062 58.4317 117.166 59.2735 117.166 60.2334M114.784 60.3515C114.784 59.7756 114.725 59.244 114.636 58.7566C114.548 58.2841 114.385 57.8706 114.163 57.5014C113.941 57.1765 113.645 56.8959 113.275 56.7187C112.906 56.5267 112.432 56.4233 111.87 56.4233C111.308 56.4233 110.85 56.5267 110.465 56.7482C110.095 56.955 109.785 57.2356 109.548 57.59C109.311 57.9592 109.149 58.3579 109.06 58.8305C108.971 59.303 108.927 59.8051 108.927 60.322C108.927 60.9275 108.971 61.5034 109.06 61.976C109.149 62.4781 109.311 62.8768 109.533 63.2312C109.755 63.5709 110.051 63.8515 110.421 64.0435C110.79 64.2207 111.249 64.3093 111.826 64.3093C112.403 64.3093 112.846 64.1911 113.231 63.9991C113.616 63.7924 113.911 63.4971 114.148 63.1426C114.385 62.7882 114.548 62.3747 114.636 61.8726C114.74 61.4148 114.784 60.8979 114.784 60.3515Z" fill="#014129"/>
              <path d="M127.238 61.8134C127.238 62.4928 127.15 63.113 126.943 63.6594C126.735 64.2058 126.44 64.6636 126.04 65.0476C125.641 65.4168 125.168 65.7121 124.576 65.8893C123.999 66.0961 123.333 66.1847 122.579 66.1847C121.884 66.1847 121.248 66.0961 120.671 65.9041C120.124 65.7416 119.635 65.4611 119.251 65.1066C118.866 64.7522 118.57 64.2944 118.363 63.7775C118.156 63.2311 118.053 62.6109 118.053 61.9021V55.0646C118.053 55.0646 118.068 54.9465 118.097 54.9022C118.127 54.8431 118.186 54.8136 118.289 54.7988C118.378 54.7693 118.496 54.7545 118.644 54.725C118.778 54.6954 118.97 54.6954 119.206 54.6954C119.443 54.6954 119.606 54.6954 119.754 54.725C119.887 54.7545 120.02 54.7545 120.094 54.7988C120.168 54.8136 120.257 54.8431 120.286 54.9022C120.331 54.9613 120.345 55.0056 120.345 55.0646V61.6953C120.345 62.1383 120.39 62.5371 120.508 62.8472C120.626 63.1868 120.774 63.4527 120.981 63.6594C121.189 63.8809 121.44 64.0434 121.721 64.132C122.002 64.2353 122.328 64.2944 122.683 64.2944C123.052 64.2944 123.363 64.2501 123.659 64.132C123.94 64.0286 124.176 63.8661 124.384 63.6594C124.576 63.4527 124.724 63.1868 124.842 62.8767C124.946 62.5814 125.005 62.2122 125.005 61.8282V55.0646C125.005 55.0646 125.005 54.9465 125.049 54.9022C125.094 54.8431 125.153 54.8136 125.227 54.7988C125.315 54.7693 125.434 54.7545 125.582 54.725C125.73 54.6954 125.922 54.6954 126.129 54.6954C126.336 54.6954 126.528 54.6954 126.676 54.725C126.824 54.7545 126.928 54.7545 127.017 54.7988C127.105 54.8136 127.164 54.8431 127.194 54.9022C127.224 54.9613 127.238 55.0056 127.238 55.0646V61.7987V61.8134Z" fill="#014129"/>
              <path d="M135.995 58.1806C135.995 58.8008 135.891 59.362 135.699 59.8493C135.507 60.3366 135.211 60.7501 134.841 61.0898C134.456 61.4294 133.998 61.6805 133.436 61.8577C132.903 62.0349 132.252 62.1087 131.513 62.1087H130.581V65.6973C130.581 65.6973 130.551 65.8007 130.522 65.8597C130.477 65.904 130.418 65.9336 130.329 65.9779C130.241 66.0074 130.122 66.0222 129.974 66.0369C129.827 66.0812 129.649 66.0813 129.427 66.0813C129.205 66.0813 129.028 66.0812 128.865 66.0369C128.717 66.0369 128.614 66.0222 128.51 65.9779C128.421 65.9483 128.362 65.904 128.333 65.8597C128.303 65.8007 128.273 65.7564 128.273 65.6973V55.5814C128.273 55.3009 128.333 55.0941 128.481 54.9612C128.628 54.8283 128.806 54.7545 129.043 54.7545H131.69C131.957 54.7545 132.208 54.7545 132.445 54.784C132.681 54.7988 132.977 54.8431 133.317 54.9021C133.658 54.976 133.998 55.1089 134.353 55.2713C134.693 55.4633 134.989 55.6848 135.226 55.9654C135.477 56.2312 135.669 56.5561 135.773 56.9253C135.906 57.2945 135.98 57.708 135.98 58.1658M133.598 58.343C133.598 57.959 133.524 57.6194 133.391 57.3683C133.258 57.1173 133.081 56.9253 132.888 56.7924C132.681 56.6743 132.474 56.6004 132.252 56.5709C132.031 56.5413 131.794 56.5118 131.557 56.5118H130.596V60.3366H131.616C131.986 60.3366 132.297 60.2776 132.533 60.189C132.785 60.0708 132.992 59.9379 133.14 59.7755C133.288 59.5982 133.421 59.3767 133.495 59.1405C133.569 58.8746 133.613 58.6236 133.613 58.343" fill="#014129"/>
              <path d="M73.4703 42.7782C68.5595 40.9175 66.8584 40.3711 66.8584 38.466C66.8584 36.561 68.7518 35.4534 71.6953 35.4534C74.343 35.4534 76.8872 36.0294 79.2539 37.1517L79.8751 37.4618L82.0643 29.5464L81.6205 29.3396C78.7657 28.0548 75.482 27.4198 71.8728 27.4198C63.0865 27.4198 57.2734 31.7615 57.2734 38.7909C57.2734 43.9891 60.853 47.5481 67.8939 49.9848C72.2722 51.565 73.7366 52.7464 73.7366 54.6809C73.7366 56.8813 71.7989 58.1366 68.3968 58.1366C65.468 58.1366 62.0807 57.6197 59.3147 56.2168L58.6638 55.8919L58.4567 55.8328C58.5011 55.4193 58.6047 54.9763 58.6047 54.5185C58.6047 50.2359 56.1936 46.8393 52.0963 45.2444C55.454 43.6052 57.3178 40.7698 57.3178 37.3142C57.3178 33.8585 55.5724 31.1413 52.5697 29.5316C49.9367 27.981 46.9488 27.4789 41.6386 27.4494H0V35.8522H9.99918V66.1702H19.6138V35.8522H29.8053V65.5647L30.2934 65.6385C31.6986 65.8453 34.7753 66.1997 39.5086 66.1997C46.3276 66.1997 51.0609 65.2841 54.0636 63.1428C55.5872 63.9402 59.3443 65.4613 63.9001 66.0077C64.9503 66.1259 66.0597 66.1997 67.1986 66.1997C67.3761 66.1997 68.6926 66.3769 72.4201 65.7714C80.4964 64.3094 83.5434 58.8897 83.5434 54.105C83.5434 48.7 80.3484 45.333 73.4851 42.8077M39.3015 34.7298C39.9376 34.656 40.8842 34.5821 42.319 34.5821C44.7744 34.5821 47.7032 35.2319 47.7032 38.3036C47.7032 40.8289 45.3809 42.3352 41.4759 42.3352H39.3015V34.7298ZM41.9788 58.7863C40.8694 58.7863 40.0115 58.7863 39.3015 58.742V49.4975H41.609C44.2271 49.4975 48.6055 50.1177 48.6055 54.1788C48.6055 58.2399 44.4638 58.7863 41.9936 58.7863" fill="#014129"/>
              <defs>
              <linearGradient id="paint0_linear_293_3548" x1="90.7476" y1="35.0128" x2="100.97" y2="38.3439" gradientUnits="userSpaceOnUse">
              <stop stop-color="#A6CE39"/>
              <stop offset="1" stop-color="#598527"/>
              </linearGradient>
              <linearGradient id="paint1_linear_293_3548" x1="97.1391" y1="9.19425" x2="107.84" y2="10.6924" gradientUnits="userSpaceOnUse">
              <stop stop-color="#A6CE39"/>
              <stop offset="1" stop-color="#598527"/>
              </linearGradient>
              <linearGradient id="paint2_linear_293_3548" x1="102.763" y1="31.1781" x2="114.264" y2="34.2563" gradientUnits="userSpaceOnUse">
              <stop stop-color="#A6CE39"/>
              <stop offset="1" stop-color="#598527"/>
              </linearGradient>
              <linearGradient id="paint3_linear_293_3548" x1="107.875" y1="16.0963" x2="119.375" y2="19.6858" gradientUnits="userSpaceOnUse">
              <stop stop-color="#A6CE39"/>
              <stop offset="1" stop-color="#598527"/>
              </linearGradient>
              <linearGradient id="paint4_linear_293_3548" x1="118.867" y1="25.2987" x2="129.345" y2="28.3758" gradientUnits="userSpaceOnUse">
              <stop stop-color="#A6CE39"/>
              <stop offset="1" stop-color="#598527"/>
              </linearGradient>
              <linearGradient id="paint5_linear_293_3548" x1="124.492" y1="7.14906" x2="134.457" y2="11.2483" gradientUnits="userSpaceOnUse">
              <stop stop-color="#A6CE39"/>
              <stop offset="1" stop-color="#598527"/>
              </linearGradient>
              </defs>
              </svg>


          </a>
          <div class="header-right font-1">
            <button class="navbar-toggler js__toggle-menu font-2" type="button">
                <div class="navbar-toggler-icon">
                  <span></span>
                  <span></span>
                  <span></span>
                </div>
            </button>
            <div class="dropdown dropdown-language font-1 d-none">
              <a class="dropdown-toggle" type="button" id="dropdownLanguage" data-bs-toggle="dropdown" aria-expanded="false">
                <?= $currentLang=="vi"?"VN": $currentLang ?>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownLanguage">
                <?php foreach ($languages as $key => $value) {?>
                  <li><a class="dropdown-item text-uppercase" href="<?= $value['url'] ?>"><?= $value["slug"] =="vi"?"VN":$value["slug"] ?></a></li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>

    

     <!-- Navigation end --> 
  </header>
  <!-- /Header --> 
  <div id="fullpage" class="fp-custom ">